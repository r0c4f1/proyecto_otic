const INCIDENTS_TABLE = new DataTable("#incidencias", {
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
    url: `${base_url}/Incidents/getIncidents`,
    dataSrc: "",
  },
  columns: [
    { data: "descripcion" },
    { data: "fecha_reporte" },
    { data: "categoria" },
    { data: "opc" },
  ],
  // dom: "lfrtip",
  paging: true,
  // responsive: true,
  iDisplayLength: 5,
  order: [[0, "desc"]],
});

let temaAsignacion = document.getElementById("asignacion");
let selectAsignados = document.getElementById("selectAsignados");
let listaAsignados = document.getElementById("listaAsignados");
let cantRecurso = document.getElementById("cantRecurso");
let buscador = document.getElementById("buscador");
let datosFiltro = [];
let selectTipoIncident = document.getElementById("tipoIncident");
let selectTipoIncidentEdit = document.getElementById("tipoIncidentEdit");
let selectRecurso = document.getElementById("recurso");
let btnCloseModalAddIncident = document.getElementById("btnCloseAddIncident");
let btnCloseEditIncident = document.getElementById("btnCloseEditIncident");
let btnGuardarIncidentAssignment = document.getElementById(
  "btnGuardarIncidentAssignment"
);
let btnCloseAddIncidentAssignment = document.getElementById(
  "btnCloseAddIncidentAssignment"
);
// let formRegisterUserTraining = document.getElementById(

//   "formRegisterUserTraining"
// );
let formAddIncident = document.getElementById("formAddIncident");
let formEditIncident = document.getElementById("formEditIncident");
let formAddIncidentAssignment = document.getElementById(
  "formAddIncidentAssignment"
);
let formAsignados = document.getElementById("formAsignados");
// let formEditTraining = document.getElementById("formEditTraining");
async function modalAddIncidentAssignment(id) {
  let queryResource = await fetch(`${base_url}/Resources/getResources`);
  let dataResource = await queryResource.json();

  let input_equipo = formAddIncidentAssignment.querySelector("input");
  input_equipo.value = id;

  let fragment = document.createDocumentFragment();

  selectRecurso.innerHTML = "<option value=''> --- </option>";

  for (let i = 0; i < dataResource.length; i++) {
    let option = document.createElement("option");
    option.value = dataResource[i].id_recurso;
    option.textContent = dataResource[i].nombre;
    fragment.appendChild(option);
  }

  selectRecurso.appendChild(fragment);

  const myModal = new bootstrap.Modal("#addIncidentAssignment");

  myModal.show();
}

async function modalSeeAssignedIncident(id) {
  let query = await fetch(`${base_url}/Incidents/getAssignment/${id}`);
  let data = await query.json();

  let inputs = formAsignados.querySelectorAll("input");
  let textarea = formAsignados.querySelector("textarea");

  textarea.value = data.descripcion;
  inputs.item(0).value = data.fecha_asignacion;
  inputs.item(1).value = data.estado;
  inputs.item(2).value = data.nombre_equipoDeTrabajo;
  inputs.item(3).value = data.nombre;
  inputs.item(4).value = data.numero_recursos;

  const myModal = new bootstrap.Modal("#modalAsignados");

  myModal.show();
}

async function modalEditarIncidencia(id) {
  let query = await fetch(`${base_url}/Incidents/getIncidents/${id}`);
  let data = await query.json();

  let queryCategoria = await fetch(
    `${base_url}/TypeIncident/getCategoryTypeIncident`
  );
  let dataCategoria = await queryCategoria.json();
  let fragment = document.createDocumentFragment();

  selectTipoIncidentEdit.innerHTML = "<option value='0'> --- </option>";

  for (let i = 0; i < dataCategoria.length; i++) {
    let option = document.createElement("option");
    option.value = dataCategoria[i].id_tipo;
    option.textContent = dataCategoria[i].categoria;
    fragment.appendChild(option);
  }

  selectTipoIncidentEdit.appendChild(fragment);

  let inputs = formEditIncident.querySelectorAll("input");
  let textarea = formEditIncident.querySelector("textarea");

  textarea.value = data.descripcion;
  inputs.item(0).value = data.id_incidencia;
  inputs.item(1).value = data.fecha_reporte;
  inputs.item(2).value = data.fecha_solucion;

  selectTipoIncidentEdit.value = data.id_tipo;

  const myModal = new bootstrap.Modal("#editIncident");

  myModal.show();
}

async function modalAddIncident() {
  let query = await fetch(`${base_url}/TypeIncident/getCategoryTypeIncident`);
  let data = await query.json();
  let fragment = document.createDocumentFragment();
  selectTipoIncident.innerHTML = "<option value='0'> --- </option>";

  for (let i = 0; i < data.length; i++) {
    let option = document.createElement("option");
    option.value = data[i].id_tipo;
    option.textContent = data[i].categoria;
    fragment.appendChild(option);
  }

  selectTipoIncident.appendChild(fragment);

  const myModal = new bootstrap.Modal("#addIncident");

  myModal.show();
}

function recargaData() {
  selectAsignados.value = 0;

  temaAsignacion.textContent = "Inscritos (Vacio)";
  listaAsignados.innerHTML = "";
  buscador.disabled = true;
  fillSelect();
}

async function fillSelect() {
  let query = await fetch(`${base_url}/Incidents/getIncidents`);
  let data = await query.json();
  selectAsignados.innerHTML = `
      <option value='0'>---</option>
    `;

  for (let i = 0; i < data.length; i++) {
    let option = document.createElement("option");
    let fragment = document.createDocumentFragment();
    option.value = data[i].id_incidencia;
    option.textContent = data[i].descripcion;
    fragment.appendChild(option);
    selectAsignados.appendChild(fragment);
  }

  temaAsignacion.textContent = `(Vacio) Asignados`;
}

async function llenarCard() {
  let query = await fetch(`${base_url}/Teams/getTeams`);
  let data = await query.json();

  datosFiltro.push(...data);

  let card = ``;
  let option = selectAsignados.value;

  for (let i = 0; i < data.length; i++) {
    if (data[i].id_asignacion !== null) {
      card += `
      <div class="card ms-3 border border-success mt-2" style="width: 45%; overflow: hidden;">
          <header class="card-header fw-bold text-white bg-success">
              <h6 class="text-wrap w-100 mt-2">Equipo</h6>
          </header>
          <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Nombre</b>: ${data[i].nombre_equipoDeTrabajo} </li>
              <li class="list-group-item text-end">
                  <button class="btn btn-warning mt-1" style="width: max-content" onclick="modalSeeAssignedIncident(${data[i].id_asignacion})"
                  id="btnAsignar">Ver Asignacion</button>
              </li>
          </ul>
        
      </div>
  `;
    } else {
      card += `
      <div class="card ms-3 border border-success mt-2" style="width: 45%; overflow: hidden;">
          <header class="card-header fw-bold text-white bg-success">
              <h6 class="text-wrap w-100 mt-2">Equipo</h6>
          </header>
          <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Nombre</b>: ${data[i].nombre_equipoDeTrabajo} </li>
              <li class="list-group-item text-end">
                  <button class="btn btn-success mt-1" style="width: max-content" onclick="modalAddIncidentAssignment(${data[i].id_equipoDeTrabajo})"
                  id="btnAsignar">Asignar</button>
              </li>
          </ul>
        
      </div>
  `;
    }
  }

  if (data.length < 1) return;

  listaAsignados.innerHTML = card;
  buscador.disabled = false;
  temaAsignacion.textContent = `Asignados (caso ${option})`;
}

function filtroListaInscritos(e) {
  let data = datosFiltro.filter((item) => {
    item.nombre_equipoDeTrabajo = item.nombre_equipoDeTrabajo.toLowerCase();

    const campos = [item.nombre_equipoDeTrabajo];
    return campos.some((campo) => campo.includes(e.target.value));
  });

  let card = ``;

  for (let i = 0; i < data.length; i++) {
    if (data[i].id_asignacion !== null) {
      card += `
      <div class="card ms-3 border border-success mt-2" style="width: 45%; overflow: hidden;">
          <header class="card-header fw-bold text-white bg-success">
              <h6 class="text-wrap w-100 mt-2">Equipo</h6>
          </header>
          <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Nombre</b>: ${data[i].nombre_equipoDeTrabajo} </li>
              <li class="list-group-item text-end">
                  <button class="btn btn-warning mt-1" style="width: max-content" onclick="modalSeeAssignedIncident(${data[i].id_asignacion})"
                  id="btnAsignar">Ver Asignacion</button>
              </li>
          </ul>
        
      </div>
  `;
    } else {
      card += `
      <div class="card ms-3 border border-success mt-2" style="width: 45%; overflow: hidden;">
          <header class="card-header fw-bold text-white bg-success">
              <h6 class="text-wrap w-100 mt-2">Equipo</h6>
          </header>
          <ul class="list-group list-group-flush">
              <li class="list-group-item"><b>Nombre</b>: ${data[i].nombre_equipoDeTrabajo} </li>
              <li class="list-group-item text-end">
                  <button class="btn btn-success mt-1" style="width: max-content" onclick="modalAddIncidentAssignment(${data[i].id_equipoDeTrabajo})"
                  id="btnAsignar">Asignar</button>
              </li>
          </ul>
        
      </div>
  `;
    }
  }

  listaAsignados.innerHTML = card;
}

async function cancelarIncidencia(id) {
  let query = await fetch(`${base_url}/Incidents/delIncidents/${id}`);
  let { status, msg, title } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Eliminado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    INCIDENTS_TABLE.ajax.reload();
    btnCloseModalAddIncident.click();
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

selectAsignados.addEventListener("change", async (e) => {
  let option = selectAsignados.selectedOptions[0].textContent;
  datosFiltro = [];

  if (option == "---") {
    temaAsignacion.textContent = "(Vacio) Asignados";
    listaAsignados.innerHTML = "";
    buscador.disabled = true;
    return;
  }

  llenarCard();
});

formAddIncident.addEventListener("submit", async (e) => {
  e.preventDefault();

  let formData = new FormData(formAddIncident);

  let query = await fetch(`${base_url}/Incidents/setIncidents`, {
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
    recargaData();
    INCIDENTS_TABLE.ajax.reload();
    btnCloseModalAddIncident.click();
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

formEditIncident.addEventListener("submit", async (e) => {
  e.preventDefault();

  let formData = new FormData(formEditIncident);

  let query = await fetch(`${base_url}/Incidents/updateIncidents`, {
    method: "POST",
    body: formData,
  });
  let { status, msg, title } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Actualizado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    recargaData();
    INCIDENTS_TABLE.ajax.reload();
    btnCloseEditIncident.click();
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

formAddIncidentAssignment.addEventListener("submit", async (e) => {
  e.preventDefault();
  let formData = new FormData(formAddIncidentAssignment);
  formData.append("id_incidencia", selectAsignados.value);

  let query = await fetch(`${base_url}/Incidents/assignIncident`, {
    method: "POST",
    body: formData,
  });
  let { status, msg, title } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Asignado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    recargaData();
    btnCloseAddIncidentAssignment.click();
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

selectRecurso.addEventListener("change", async (e) => {
  let query = await fetch(
    `${base_url}/Resources/getResources/${selectRecurso.value}`
  );
  let dataResource = await query.json();

  if (dataResource.disponible) {
    cantRecurso.ariaValueMax = dataResource.cantidad;

    cantRecurso.removeAttribute("disabled");
  } else {
    cantRecurso.ariaValueMax = 0;
    cantRecurso.setAttribute("disabled", true);
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "error",
      text: "No disponible en este momento",
      showConfirmButton: false,
      timer: 2000,
    });
  }
  cantRecurso.value = "";
});

cantRecurso.addEventListener("focusout", (e) => {
  console.log(
    e.target.value > cantRecurso.ariaValueMax,
    e.target.value,
    cantRecurso.ariaValueMax
  );

  if (parseInt(e.target.value) > parseInt(cantRecurso.ariaValueMax)) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "error",
      text: `Cantidad Maxima de este recurso: ${cantRecurso.ariaValueMax}`,
      showConfirmButton: false,
      timer: 1500,
    });

    btnGuardarIncidentAssignment.setAttribute("disabled", true);
    return;
  }

  btnGuardarIncidentAssignment.removeAttribute("disabled");
});

window.addEventListener("DOMContentLoaded", () => {
  fillSelect();
});
