const PROYECTO_TABLE = new DataTable("#proyecto", {
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
    url: `${base_url}/Project/getProject`,
    dataSrc: "",
  },
  columns: [
    { data: "nombre" },
    { data: "descripcion" },
    { data: "fecha_inicio" },
    { data: "fecha_fin" },
    { data: "estado" },
    { data: "opc" },
  ],
  // dom: "lfrtip",
  paging: true,
  // responsive: true,
  iDisplayLength: 7,
  order: [[0, "desc"]],
});

const PROYECTOPAPELERA_TABLE = new DataTable("#proyectoPapelera", {
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
    url: `${base_url}/Project/getRecycleBinProject`,
    dataSrc: "",
  },
  columns: [
    { data: "nombre" },
    { data: "descripcion" },
    { data: "fecha_inicio" },
    { data: "fecha_fin" },
    { data: "estado" },
    { data: "opc" },
  ],
  // dom: "lfrtip",
  paging: true,
  // responsive: true,
  iDisplayLength: 7,
  order: [[0, "desc"]],
});

function modalAddProjectModal() {
  const myModal = new bootstrap.Modal("#addProjectModal");

  myModal.show();
}
function modalRecycleBinProject() {
  const myModal = new bootstrap.Modal("#modalRecycleBinProject");

  myModal.show();
}
function closeRecycleBinProjectModal() {
  let btn = document.getElementById("btnCloseRecycleBinProjectmodal");
  btn.click();
}

function closeModalAddProjectModal() {
  let btn = document.getElementById("btnCloseAddProjectmodal");
  btn.click();
}

function closeModalEditProjectModal() {
  let btn = document.getElementById("btnCloseEditProjectmodal");
  btn.click();
}

async function addProject(e) {
  e.preventDefault(); // Evita el envío normal del formulario

  let formAddProject = document.getElementById("formAddProject");
  const formData = new FormData(formAddProject);

  try {
    let query = await fetch(base_url + "/Project/registerProject", {
      method: "POST",
      body: formData,
    });

    let response = await query.json();

    if (response.status) {
      Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        text: response.msg,
        showConfirmButton: false,
        timer: 1500,
      });
      closeModalAddProjectModal(); // Cierra el modal
      PROYECTO_TABLE.ajax.reload(); // Recarga la tabla
      document.querySelectorAll("input").forEach((input) => (input.value = "")); // Limpia los campos
    } else {
      Swal.fire({
        icon: "error",
        title: response.title || "Error",
        text: response.msg,
        showConfirmButton: false,
        timer: 1500,
      });
    }
  } catch (error) {
    Swal.fire({
      icon: "error",
      title: "No disponible!",
      text: "Intente nuevamente...",
      showConfirmButton: false,
      timer: 1500,
    });
  }
}

async function updateProject(e) {
  e.preventDefault();

  let formAddProject = document.getElementById("formEditProject");
  // let { checked } = document.getElementById("isAdmin");

  const formData = new FormData(formAddProject);
  // formData.append("admin", checked ? 1 : 0);

  let query = await fetch(base_url + "/Project/updateProject", {
    method: "POST",
    body: formData,
  }).catch(() => {
    Swal.fire({
      icon: "error",
      title: "No disponible!",
      text: "Intente nuevamente...",
      showConfirmButton: false,
      timer: 1500,
    });
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
    closeModalEditProjectModal();
    PROYECTO_TABLE.ajax.reload();
    document.querySelectorAll("input").forEach((input) => (input.value = ""));
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

async function modalEditarProyecto(id_proyecto) {
  let query = await fetch(`${base_url}/Project/getProject/${id_proyecto}`);
  let data = await query.json();
  console.log(id_proyecto);

  const myModal = new bootstrap.Modal("#modalEditProject");
  myModal.show();

   let selectEditState = document.getElementById("selectEditState");

  let formProject = document.getElementById("formEditProject");

  formProject.querySelectorAll("input").item(0).value = id_proyecto;
  formProject.querySelectorAll("input").item(1).value = data.nombre;
  formProject.querySelectorAll("input").item(2).value = data.descripcion;
  formProject.querySelectorAll("input").item(3).value = data.fecha_inicio;
  formProject.querySelectorAll("input").item(4).value = data.fecha_fin;
  selectEditState.value = data.estado;
}

async function cancelarProyecto(id) {
  let query = await fetch(`${base_url}/Project/cancelProject/${id}`);
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
    PROYECTO_TABLE.ajax.reload();
    PROYECTOPAPELERA_TABLE.ajax.reload();
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
async function restaurarProyecto(id) {
  let query = await fetch(`${base_url}/Project/restoreProject/${id}`);
  let { status, title, msg } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Restaurado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });
    PROYECTO_TABLE.ajax.reload();
    PROYECTOPAPELERA_TABLE.ajax.reload();
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
