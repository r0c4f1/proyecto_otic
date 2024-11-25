const TYPEINCIDENT_TABLE = new DataTable("#type", {
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
    url: `${base_url}/TypeIncident/getTypeIncident`,
    dataSrc: "",
  },
  columns: [{ data: "nombre_tipo" }, { data: "categoria" }, { data: "opc" }],
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

function modalAddTypeIncident() {
  const myModal = new bootstrap.Modal("#addTypeIncident");

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

async function addTypeIncident(e) {
  e.preventDefault(); // Evita el envío normal del formulario

  let formAddTypeIncident = document.getElementById("formAddTypeIncident");
  const formData = new FormData(formAddTypeIncident);

  try {
    let query = await fetch(base_url + "/TypeIncident/registerTypeIncident", {
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
      TYPEINCIDENT_TABLE.ajax.reload(); // Recarga la tabla
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

async function updateTypeIncident(e) {
  e.preventDefault();

  let formUpdateTypeIncident = document.getElementById("formEditTypeIncident");
  // let { checked } = document.getElementById("isAdmin");

  const formData = new FormData(formUpdateTypeIncident);
  // formData.append("admin", checked ? 1 : 0);

  let query = await fetch(base_url + "/TypeIncident/updateTypeIncident", {
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
    TYPEINCIDENT_TABLE.ajax.reload();
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

async function modalEditTypeIncident(id) {
  const myModal = new bootstrap.Modal("#modalEditTypeIncident");
  myModal.show();

  let formEditTypeIncident = document.getElementById("formEditTypeIncident");
  let inputs = formEditTypeIncident.querySelectorAll("input");
  let selectCategory = document.getElementById("selectCategory");

  let query = await fetch(`${base_url}/TypeIncident/getTypeIncident/${id}`);
  let { categoria, nombre_tipo } = await query.json();

  inputs.item(0).value = id;
  selectCategory.value = categoria;
  inputs.item(1).value = nombre_tipo;
}

function confirmed(id) {
  //AHORA CUANDO LE DAS AL BOTON DE BORRAR LO RECIBE AQUI
  Swal.fire({
    title: "Estas Seguro?",
    text: "Este cambio no sera reversible",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Confirmar!",
  }).then((result) => {
    if (result.isConfirmed) {
      //SI LE DAS QUE SI LLAMA A LA FUNCION DE BORRAR QUE YA CONOCEMOS
      cancelTypeIncident(id);
    }
  });
}

async function cancelTypeIncident(id) {
  //ESTA ES LA DE BORRAR QUE YA CONOCEMOS
  let query = await fetch(`${base_url}/TypeIncident/cancelTypeIncident/${id}`);
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
    TYPEINCIDENT_TABLE.ajax.reload();
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
