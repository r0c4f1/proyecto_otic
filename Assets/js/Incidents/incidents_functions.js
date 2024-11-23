const EQUIPODETRABAJO_TABLE = new DataTable("#incidencias", {
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
    { data: "id_tipo" },
    { data: "opc" },
  ],
  // dom: "lfrtip",
  paging: true,
  // responsive: true,
  iDisplayLength: 7,
  order: [[0, "desc"]],
});

let temaAsignacion = document.getElementById("asignacion");
let selectAsignados = document.getElementById("selectAsignados");
let listaAsignados = document.getElementById("listaAsignados");
let buscador = document.getElementById("buscador");
let btnAsignar = document.getElementById("btnAsignar");
let datosFiltro = [];
// let formRegisterUserTraining = document.getElementById(

//   "formRegisterUserTraining"
// );
// let formAddTraining = document.getElementById("formAddTraining");
// let formEditTraining = document.getElementById("formEditTraining");

function recargaData() {
  selectAsignados.value = 0;

  temaAsignacion.textContent = "Inscritos (Vacio)";
  listaAsignados.innerHTML = "";
  buscador.disabled = true;
  btnAsignar.disabled = true;
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
  let query = await fetch(
    `${base_url}/Incidents/getAsignedIncidents/${selectAsignados.value}`
  );
  let data = await query.json();

  datosFiltro.push(...data);

  let card = ``;
  let option = selectAsignados.value;

  for (let i = 0; i < data.length; i++) {
    card += `
                <div class="card ms-3 border border-success mt-2" style="width: 45%;">
                    <header class="card-header fw-bold text-white bg-success">
                        <h6 class="text-wrap w-100 mt-2">Equipo</h6>
                    </header>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Nombre</b>: ${
                          data[i].nombre_equipoDeTrabajo
                        } </li>
                        <li class="list-group-item"><b>Estado</b>: ${
                          data[i].status === 1 ? "Activo" : "Inactivo"
                        } </li>
                    </ul>
                </div>
            `;
  }

  if (data.length < 1) return;

  listaAsignados.innerHTML = card;
  buscador.disabled = false;
  btnAsignar.disabled = false;
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
    card += `
      <div class="card ms-3 border border-success mt-2" style="width: 45%;">
        <header class="card-header fw-bold text-white bg-success">
          <h6 class="text-wrap w-100 mt-2">Equipo</h6>
        </header>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <b>Nombre</b>: ${data[i].nombre_equipoDeTrabajo}
          </li>
          <li class="list-group-item">
            <b>Estado</b>: ${data[i].status === 1 ? "Activo" : "Inactivo"}
          </li>
        </ul>
      </div>
    `;
  }

  listaAsignados.innerHTML = card;
}

selectAsignados.addEventListener("change", async (e) => {
  let option = selectAsignados.selectedOptions[0].textContent;
  datosFiltro = [];

  if (option == "---") {
    temaAsignacion.textContent = "(Vacio) Asignados";
    listaAsignados.innerHTML = "";
    buscador.disabled = true;
    btnAsignar.disabled = true;
    return;
  }

  llenarCard();
});

window.addEventListener("DOMContentLoaded", () => {
  fillSelect();
});
