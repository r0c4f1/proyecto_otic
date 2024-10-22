let formLogin = document.getElementById("formLogin");
let formRegister = document.getElementById("formRegister");
let i = document.getElementById("navMenu");
let a = document.getElementById("loginBtn");
let b = document.getElementById("registerBtn");
let x = document.getElementById("login");
let y = document.getElementById("register");

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

formRegister.addEventListener("submit", (e) => {
  e.preventDefault();

  let formData = new FormData(formRegister);

  fetch(base_url + "/Auth/RegisterUser", {
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
