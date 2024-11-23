const RECURSOS_TABLE = new DataTable("#recursos", {
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
      url: `${base_url}/Resources/getResources`,
      dataSrc: "",
    },
    columns: [
      { data: "nombre" },
      { data: "tipo" },
      { data: "cantidad" },
      { data: "disponible" },
      { data: "opc" },
    ],
    // dom: "lfrtip",
    paging: true,
    // responsive: true,
    iDisplayLength: 7,
    order: [[0, "desc"]],
  });
  
  async function editar(id) {
    let query = await fetch(`${base_url}/Resources/getResources/${id}`);
    let data = await query.json();
     
    let formResource = document.getElementById("formEditResource");
  
    formResource.querySelectorAll("input").item(0).value = data.id_recurso;
    formResource.querySelectorAll("input").item(1).value = data.nombre;
    formResource.querySelectorAll("input").item(2).value = data.tipo;
    formResource.querySelectorAll("input").item(3).value = data.cantidad;
    formResource.querySelectorAll("input").item(4).value = data.disponible;
   
    
  
    console.log(data);
  
    const myModal = new bootstrap.Modal("#resourceModal", {
      keyboard: false,
    });
  
    myModal.show();
  }
  
  async function eliminar(id) {
    const formData = new FormData();
    formData.append("id_recurso", id);
    formData.append("status", 0);
  
    let query = await fetch(`${base_url}/Resources/cancelResource`, {
      method: "POST",
      body: formData,
    });
  
    let { status, msg } = await query.json();
  
    if (status) {
      RECURSOS_TABLE.ajax.reload();
      Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        text: msg,
        showConfirmButton: false,
        timer: 1500,
      });
         } else {
      Swal.fire({
        toast: true,
        position: "top-end",
        icon: "error",
        text: msg,
        showConfirmButton: false,
        timer: 1500,
      });
    }
  
   
  }
  
  function modalAddResourceModal() {
    const myModal = new bootstrap.Modal("#addResourceModal");
  
    myModal.show();
  }
  
  function closeModalAddResourceModal() {
    let btn = document.getElementById("btnCloseAddResourceModal");
    btn.click();
  }
  
  function closeModalEditResourceModal() {
    let btn = document.getElementById("btnCloseEditResourceModal");
    btn.click();
  }
  
  async function addResource(e) {
    e.preventDefault();
  
    let formAddResource = document.getElementById("formAddResource");
    let { checked } = document.getElementById("isAvailable");
  
    const formData = new FormData(formAddResource);
    formData.append("disponible", checked ? 1 : 0);
  
    let query = await fetch(base_url + "/Resources/registerResource", {
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
  
    let { status, msg } = await query.json();
  
    if (status) {
      Swal.fire({
        toast: true,
        position: "top-end",
        icon: "success",
        text: "Registrado Correctamente",
        showConfirmButton: false,
        timer: 1500,
      });
      closeModalAddResourceModal();
      RECURSOS_TABLE.ajax.reload();
      document.querySelectorAll("input").forEach((input) => (input.value = ""));
    } else {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: msg,
        showConfirmButton: false,
        timer: 1500,
      });
    }
  }
  
  async function updateResource(e) {
    e.preventDefault();
  
    let formAddResource = document.getElementById("formEditResource");
    let { checked } = document.getElementById("isAvailable");
  
    const formData = new FormData(formAddResource);
    formData.append("disponible", checked ? 1 : 0);
  
    let query = await fetch(base_url + "/Resources/updateResource", {
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
      closeModalEditResourceModal();
      RECURSOS_TABLE.ajax.reload();
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
  
  async function verifyId(e) {
    let id = e.target;
  
    const formData = new FormData();
  
    formData.append("id_usuario", id.value);
  
    let query = await fetch(`${base_url}/Users/verifyId`, {
      method: "POST",
      body: formData,
    });
  
    let { status, msg } = await query.json();
  
    if (!status) {
      Swal.fire({
        icon: "error",
        title: "Error",
        text: msg,
        showConfirmButton: false,
        timer: 1500,
      });
    }
  }
  
 
  