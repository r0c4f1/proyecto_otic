const ctx = document.getElementById("myChart");
const ctx2 = document.getElementById("myChart2");
const ctx3 = document.getElementById("myChart3");

function estadisticas(labels, data, element, type, label, fn) {
  const miChart = new Chart(element, {
    type,
    data: {
      labels,
      datasets: [
        {
          label,
          data,
          borderWidth: 2,
          backgroundColor: [
            'rgb(250, 95, 95)', // Color para la primera barra
            'rgb(54, 163, 235)',// Color para la segunda barra
            'rgb(75, 192, 75)', // Color para la tercera barra
            'rgba(255, 206, 86, 1)'// Color para la cuarta barra
             
          ],
          borderColor: [
            'rgb(250, 95, 95)',
            'rgb(54, 163, 235)',
            'rgb(75, 192, 75)',
            'rgba(255, 206, 86, 1)'
          ],
        },
      ],
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
        },
      },
    },
  });

  element.addEventListener("click", (event) => {
    const puntos = miChart.getElementsAtEventForMode(
      event,
      "nearest",
      {
        intersect: true,
      },
      true
    );

    if (puntos.length) {
      const puntoIndice = puntos[0].index;
      const etiqueta = miChart.data.labels[puntoIndice];
      const valor = miChart.data.datasets[0].data[puntoIndice];

      // Evento personalizado
      fn(etiqueta, valor);
      console.log(`Has hecho clic en: ${etiqueta} con un valor de ${valor}`);
      // Aquí puedes agregar más lógica o llamar a una función personalizada
    }
  });
}

// /*si quieren ver los mas tipos de diseños de charts
// https://www.chartjs.org/docs/latest/charts/bar.html */

// estadisticas(
//   ["juan", "pedro", "alberto", "ana"],
//   [12, 2, 23, 34],
//   ctx2,
//   "line"
// );
// estadisticas(
//   ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
//   [12, 2, 23, 34, 45, 56, 92],
//   ctx3,
//   "bar"
// );

function manejador(etiqueta, valor) {
  let titleModalGender = document.getElementById("titleModalGender");

  titleModalGender.textContent = `Personal (${etiqueta})`;
  console.log(etiqueta);
  const myModal = new bootstrap.Modal("#modalIndicadorGeneroPersonal");

  myModal.show();
}
function manejadorProyecto(etiqueta, valor) {
  let titleModalProject = document.getElementById("titleModalProject");
  titleModalProject.textContent = `Proyecto (${etiqueta})`;
  console.log(etiqueta);
  const myModal = new bootstrap.Modal("#modalIndicadorProyecto");
  myModal.show();
}

document.addEventListener("DOMContentLoaded", async (e) => {
  let queryIndicatorGender = await fetch(`${base_url}/Home/getGenderIndicator`);
  let data = await queryIndicatorGender.json();
  let mujeres = 0;
  let hombres = 0;

  for (let i = 0; i < data.length; i++) {
    if (data[i].sexo == "F") mujeres = data[i].cantidad;
    else hombres = data[i].cantidad;
  }

  estadisticas(
    ["Hombre", "Mujer"],
    [hombres, mujeres],
    ctx,
    "doughnut",
    "Personal",
    manejador
  );
  let queryIndicatorProject = await fetch(`${base_url}/Home/getProjectIndicator`);
  let dataProject = await queryIndicatorProject.json();
  console.log("Datos de proyecto:", dataProject);

  let pendiente = dataProject.find(item => item.estado === "Pendiente")?.cantidad || 0;
  let enProgreso = dataProject.find(item => item.estado === "En Progreso")?.cantidad || 0;
  let finalizado = dataProject.find(item => item.estado === "Finalizado")?.cantidad || 0;
console.log("Pendiente:", pendiente, "En Progreso:", enProgreso, "Finalizado:");

  estadisticas(
    ["Pendiente", "En Progreso", "Finalizado"],
    [pendiente, enProgreso, finalizado],
    ctx2,
    "bar",
    "Estado del Proyecto",
    manejadorProyecto
  );
});
