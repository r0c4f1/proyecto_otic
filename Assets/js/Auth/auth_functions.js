let formLogin = document.getElementById("formLogin");
let formRegister = document.getElementById("formRegister");
let i = document.getElementById("navMenu");
let a = document.getElementById("loginBtn");
let b = document.getElementById("registerBtn");
let x = document.getElementById("login");
let y = document.getElementById("register");
let claveRepetida = document.getElementById("claveRepetida");

function myMenuFunction() {
  if (i.className === "nav-menu") {
    i.className += " responsive";
  } else {
    i.className = "nav-menu";
  }
}

function login() {
  x.style.left = "4px";
  y.style.right = "-520px";
  a.className += " white-btn";
  b.className = "btn";
  x.style.opacity = 1;
  y.style.opacity = 0;
}

function register() {
  x.style.left = "-510px";
  y.style.right = "5px";
  a.className = "btn";
  b.className += " white-btn";
  x.style.opacity = 0;
  y.style.opacity = 1;
}

formLogin.addEventListener("submit", (e) => {
  e.preventDefault();

  let formData = new FormData(formLogin);

  fetch(base_url + "/Auth/LoginUser", {
    method: "POST",
    body: formData,
  })
    .then((res) => res.json())
    .then((res) => {
      if (res.status) {
        location.href = base_url + "/Home";
      } else {
        Swal.fire({
          icon: "error",
          title: res.title,
          text: res.msg,
          showConfirmButton: false,
          timer: 1500,
        });
      }
    })
    .catch(() => {
      Swal.fire({
        icon: "error",
        title: "No disponible!",
        text: "Intente nuevamente...",
        showConfirmButton: false,
        timer: 1500,
      });
    });
});

formRegister.addEventListener("submit", async (e) => {
  e.preventDefault();

  let formData = new FormData(formRegister);

  let query = await fetch(base_url + "/Auth/registerUser", {
    method: "POST",
    body: formData,
  });

  let { status, title, msg } = await query.json();

  if (status) {
    Swal.fire({
      toast: true,
      position: "top-end",
      icon: "success",
      text: "Registrado Correctamente",
      showConfirmButton: false,
      timer: 1500,
    });

    login();

    document.querySelectorAll("input").forEach((input) => (input.value = ""));
  } else {
    Swal.fire({
      icon: "error",
      title: title,
      text: msg,
      showConfirmButton: false,
      timer: 1500,
    });
  }
});

claveRepetida.addEventListener("keyup", () => {
  let clave = formRegister.children.item(4).children.item(0).value;
  let button = formRegister.querySelector("button");

  if (claveRepetida.value == clave) button.removeAttribute("disabled");
  else button.setAttribute("disabled", true);
});
