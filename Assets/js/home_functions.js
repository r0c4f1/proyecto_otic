const ctx = document.getElementById("myChart");
const ctx2 = document.getElementById("myChart2");
const ctx3 = document.getElementById("myChart3");

function estadisticas(
  labels,
  data,
  element,
  type = "doughnut",
  label = "# of Votes"
) {
  new Chart(element, {
    type,
    data: {
      labels,
      datasets: [
        {
          label,
          data,
          borderWidth: 2,
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
}

/*si quieren ver los mas tipos de diseños de charts
https://www.chartjs.org/docs/latest/charts/bar.html */

estadisticas(["juan", "pedro", "alberto", "ana"], [1, 2, 3, 4], ctx);

estadisticas(
  ["juan", "pedro", "alberto", "ana"],
  [12, 2, 23, 34],
  ctx2,
  "line"
);
estadisticas(
  ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio"],
  [12, 2, 23, 34, 45, 56, 92],

  ctx3,
  "bar"
);

// let dataEmpleadosIngresados = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

// let data = new Date("08/09/2024").getMonth();
// console.log(data);
// dataEmpleadosIngresados[data] += 1;

// console.log(dataEmpleadosIngresados);

// new Chart(ctx2, {
//   type: "line",
//   data: {
//     labels: ["Chavez", "mbappe", "messi", "ronaldo", "cr7", "neymar", "kane"],
//     datasets: [
//       {
//         label: "# of Votes",
//         data: [40, 200, 100, 65, 82, 2, 9],
//         borderWidth: 2,
//         backgroundColor: "#b90000",
//       },
//     ],
//   },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true,
//       },
//     },
//   },
// });
