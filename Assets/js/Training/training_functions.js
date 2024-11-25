const CAPACITACION_TABLE = new DataTable("#capacitaciones", {
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
    url: `${base_url}/Training/getTraining`,
    dataSrc: "",
  },
  columns: [
    { data: "tema" },
    { data: "fecha" },
    { data: "duracion" },
    { data: "opc" },
  ],
  // dom: "lfrtip",
  paging: true,
  // responsive: true,
  iDisplayLength: 7,
  order: [[0, "desc"]],
});

let selectCapacitacion = document.getElementById("selectCapacitacion");
let temaInscritos = document.getElementById("temaInscritos");
let listaInscritos = document.getElementById("listaInscritos");
let buscador = document.getElementById("buscador");
let btnInscribirse = document.getElementById("btnInscribirse");
let formRegisterUserTraining = document.getElementById(
  "formRegisterUserTraining"
);
let formAddTraining = document.getElementById("formAddTraining");
let formEditTraining = document.getElementById("formEditTraining");

let datosFiltro = [];

function recargaData() {
  selectCapacitacion.value = 0;

  temaInscritos.textContent = "Inscritos (Vacio)";
  listaInscritos.innerHTML = "";
  buscador.disabled = true;
  btnInscribirse.disabled = true;
  fillSelect();
}

async function fillSelect() {
  let query = await fetch(`${base_url}/Training/getTraining`);
  let data = await query.json();
  selectCapacitacion.innerHTML = `
    <option value='0'>---</option>
  `;

  for (let i = 0; i < data.length; i++) {
    let option = document.createElement("option");
    let fragment = document.createDocumentFragment();
    option.value = data[i].id_capacitacion;
    option.textContent = data[i].tema;
    fragment.appendChild(option);
    selectCapacitacion.appendChild(fragment);
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

function modalAddUserTraining() {
  const myModal = new bootstrap.Modal("#addUserTraining");

  myModal.show();
}

function modalAddTraining() {
  const myModal = new bootstrap.Modal("#addTraining");

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
      cancelarCapacitacion(id);
    }
  });}

async function cancelarCapacitacion(id) {
  let query = await fetch(`${base_url}/Training/cancelTraining/${id}`);
  let { status, title, msg } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Elminado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    CAPACITACION_TABLE.ajax.reload();
    recargaData();
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

async function modalEditarCapacitacion(id) {
  const myModal = new bootstrap.Modal("#modalEditTraining");
  myModal.show();
  let inputs = formEditTraining.querySelectorAll("input");

  let query = await fetch(`${base_url}/Training/getTraining/${id}`);
  let { tema, fecha, duracion } = await query.json();

  inputs.item(0).value = id;
  inputs.item(1).value = tema;
  inputs.item(2).value = fecha;
  inputs.item(3).value = duracion;
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

formRegisterUserTraining.addEventListener("submit", async (e) => {
  e.preventDefault();

  let btnCloseModalDddUserTraining = document.getElementById(
    "btnCloseModalDddUserTraining"
  );
  let formData = new FormData(formRegisterUserTraining);
  formData.append("id_capacitacion", selectCapacitacion.value);

  let query = await fetch(`${base_url}/Training/registerTrainingUser`, {
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

formAddTraining.addEventListener("submit", async (e) => {
  e.preventDefault();

  let btnCloseModalAddTraining = document.getElementById(
    "btnCloseModalAddTraining"
  );
  let formData = new FormData(formAddTraining);

  let query = await fetch(`${base_url}/Training/addTraining`, {
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
    CAPACITACION_TABLE.ajax.reload();
    recargaData();
    btnCloseModalAddTraining.click();
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

formEditTraining.addEventListener("submit", async (e) => {
  e.preventDefault();

  let btnCloseModalEditTraining = document.getElementById(
    "btnCloseModalEditTraining"
  );
  let formData = new FormData(formEditTraining);

  let query = await fetch(`${base_url}/Training/editTraining`, {
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
    CAPACITACION_TABLE.ajax.reload();
    recargaData();
    btnCloseModalEditTraining.click();
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

selectCapacitacion.addEventListener("change", async (e) => {
  let option = selectCapacitacion.selectedOptions[0].textContent;
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
