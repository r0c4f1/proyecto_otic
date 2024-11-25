const EQUIPODETRABAJO_TABLE = new DataTable("#equipodetrabajo", {
  layout: {
    topEnd: false,
    topStart: {
      search: {
        placeholder: "Search",
      },
    },
  },
  language: {
    url: `${base_url}/Assets/js/plugins/datatables/es-ES.json`,
  },
  ajax: {
    url: `${base_url}/Teams/getTeams`,
    dataSrc: "",
  },
  columns: [{ data: "nombre_equipoDeTrabajo" }, { data: "opc" }],
  // dom: "lfrtip",
  paging: true,
  // responsive: true,
  iDisplayLength: 7,
  order: [[0, "desc"]],
});

let selectTeams = document.getElementById("selectTeams");
let temaInscritos = document.getElementById("temaInscritos");
let listaInscritos = document.getElementById("listaInscritos");
let buscador = document.getElementById("buscador");
let btnInscribirse = document.getElementById("btnInscribirse");
let formRegisterUserTraining = document.getElementById(
  "formRegisterUserTraining"
);
let formAddTeams = document.getElementById("formAddTeams");
let formEditTeams = document.getElementById("formEditTeams");

let datosFiltro = [];

function recargaData() {
  selectTeams.value = 0;

  temaInscritos.textContent = "Inscritos (Vacio)";
  listaInscritos.innerHTML = "";
  buscador.disabled = true;
  btnInscribirse.disabled = true;
  fillSelect();
}

async function fillSelect() {
  let query = await fetch(`${base_url}/Teams/getTeams`);
  let data = await query.json();
  selectTeams.innerHTML = `
    <option value='0'>---</option>
  `;

  for (let i = 0; i < data.length; i++) {
    let option = document.createElement("option");
    let fragment = document.createDocumentFragment();
    option.value = data[i].id_equipoDeTrabajo;
    option.textContent = data[i].nombre_equipoDeTrabajo;
    fragment.appendChild(option);
    selectTeams.appendChild(fragment);
  }

  temaInscritos.textContent = `Inscritos (Vacio)`;
}

function filtroListaInscritos(e) {
  let data = datosFiltro.filter((item) => {
    item.nombres = item.nombres.toLowerCase();
    item.apellidos = item.apellidos.toLowerCase();
    item.email = item.email.toLowerCase();
    let nombreCompleto = `${item.nombres} ${item.apellidos}`;

    const campos = [nombreCompleto, item.email, item.telefono, item.id_usuario];
    return campos.some((campo) => campo.includes(e.target.value));
  });

  let card = ``;

  for (let i = 0; i < data.length; i++) {
    card += `
        <div class="card ms-3 border border-success mt-2" style="width: 45%;">
            <header  class="card-header fw-bold text-white bg-success">
                <h6 class="text-wrap w-100 mt-2">${data[i].nombres} ${data[i].apellidos} 
                </h6>
            </header>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Correo</b>: ${data[i].email}</li>
                <li class="list-group-item"><b>Cedula</b>: ${data[i].id_usuario}</li>
                <li class="list-group-item"><b>Telefono</b>: ${data[i].telefono}</li>
                <li class="list-group-item"><b>Sexo</b>: ${data[i].sexo}</li>
            </ul>
        </div>
    `;
  }

  listaInscritos.innerHTML = card;
}

function modalAddUserTeams() {
  const myModal = new bootstrap.Modal("#addUserTeams");

  myModal.show();
}

function modalAddTeams() {
  const myModal = new bootstrap.Modal("#addTeams");

  myModal.show();
}

function confirmed(id){
  Swal.fire({
    title: "Estas Seguro?",
    text: "Este cambio no sera reversible",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Confirmar!"
  }).then((result) => {
    if (result.isConfirmed) {
      cancelarEquipoDeTrabajo(id);
    }
  });}

async function cancelarEquipoDeTrabajo(id) {
  let query = await fetch(`${base_url}/Teams/cancelTeams/${id}`);
  let { status, title, msg } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Eliminado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    EQUIPODETRABAJO_TABLE.ajax.reload();
    // recargaData();
  } else {
    Swal.fire({
      icon: "error",
      title,
      text: msg,
      showConfirmButton: false,
      timer: 1500,
    });
  }
}

async function modalEditarEquipoDeTrabajo(id) {
  const myModal = new bootstrap.Modal("#modalEditTeams");
  myModal.show();
  let inputs = formEditTeams.querySelectorAll("input");
  console.log(id);

  let query = await fetch(`${base_url}/Teams/getTeams/${id}`);
  let { nombre_equipoDeTrabajo } = await query.json();

  inputs.item(0).value = id;
  inputs.item(1).value = nombre_equipoDeTrabajo;
}

async function llenarCard() {
  let query = await fetch(
    `${base_url}/Training/getRegisteredUsers/${selectCapacitacion.value}`
  );
  let data = await query.json();

  datosFiltro.push(...data);

  let card = ``;

  for (let i = 0; i < data.length; i++) {
    card += `
              <div class="card ms-3 border border-success mt-2" style="width: 45%;">
                  <header class="card-header fw-bold text-white bg-success">
                      <h6 class="text-wrap w-100 mt-2">${data[i].nombres} ${data[i].apellidos} 
                      </h6>
                  </header>
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item"><b>Correo</b>: ${data[i].email}</li>
                      <li class="list-group-item"><b>Cedula</b>: ${data[i].id_usuario}</li>
                      <li class="list-group-item"><b>Telefono</b>: ${data[i].telefono}</li>
                      <li class="list-group-item"><b>Sexo</b>: ${data[i].sexo}</li>
                  </ul>
              </div>
          `;
  }

  listaInscritos.innerHTML = card;
  buscador.disabled = false;
  btnInscribirse.disabled = false;
  temaInscritos.textContent = `Inscritos (${option})`;
}

formRegisterUserTeams.addEventListener("submit", async (e) => {
  e.preventDefault();

  let btnCloseModalDddUserTraining = document.getElementById(
    "btnCloseModalAddUserTeams"
  );
  let formData = new FormData(formRegisterUserTraining);
  formData.append("id_equipoDeTrabajo", selectTeams.value);

  let query = await fetch(`${base_url}/Teams/registerTeamsUser`, {
    method: "POST",
    body: formData,
  });

  let { status, msg, title } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Agregado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    datosFiltro = [];
    llenarCard();
    btnCloseModalDddUserTraining.click();
  } else {
    Swal.fire({
      icon: "error",
      title,
      text: msg,
      showConfirmButton: false,
      timer: 1500,
    });
  }
});

formAddTeams.addEventListener("submit", async (e) => {
  e.preventDefault();

  let btnCloseModalAddTeams = document.getElementById("btnCloseModalAddTeams");
  let formData = new FormData(formAddTeams);

  let query = await fetch(`${base_url}/Teams/addTeams`, {
    method: "POST",
    body: formData,
  });

  let { status, msg, title } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Agregado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    EQUIPODETRABAJO_TABLE.ajax.reload();
    // recargaData();
    btnCloseModalAddTeams.click();
  } else {
    Swal.fire({
      icon: "error",
      title,
      text: msg,
      showConfirmButton: false,
      timer: 1500,
    });
  }
});

formEditTeams.addEventListener("submit", async (e) => {
  e.preventDefault();

  let btnCloseModalEditTeams = document.getElementById(
    "btnCloseModalEditTeams"
  );
  let formData = new FormData(formEditTeams);

  let query = await fetch(`${base_url}/Teams/editTeams`, {
    method: "POST",
    body: formData,
  });

  let { status, msg, title } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Editado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    EQUIPODETRABAJO_TABLE.ajax.reload();
    //el recargar data es para que se vacien los inscritos, eso es lo que daba el problema
    // recargaData();
    btnCloseModalEditTeams.click();
  } else {
    Swal.fire({
      icon: "error",
      title,
      text: msg,
      showConfirmButton: false,
      timer: 1500,
    });
  }
});

selectTeams.addEventListener("change", async (e) => {
  let option = selectTeams.selectedOptions[0].textContent;
  datosFiltro = [];

  if (option == "---") {
    temaInscritos.textContent = "Inscritos (Vacio)";
    listaInscritos.innerHTML = "";
    buscador.disabled = true;
    btnInscribirse.disabled = true;
    return;
  }

  llenarCard();
});

window.addEventListener("DOMContentLoaded", () => {
  fillSelect();
});
