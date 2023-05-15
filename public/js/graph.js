

// // Bar chart
// new Chart(document.getElementById("chartjs-dashboard-bar"), {
//   type: "bar",
//   data: {
//     labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jlt", "Aou", "Sep", "Oct", "Nov", "Déc"],
//     datasets: [{
//       label: "ains",
//       backgroundColor: window.theme.primary,
//       borderColor: window.theme.primary,
//       hoverBackgroundColor: window.theme.primary,
//       hoverBorderColor: window.theme.primary,
//       data: [34, 67, 21, 45, 12, 15, 35, 23, 40, 36, 28, 19],
//       barPercentage: .75,
//       categoryPercentage: .5
//     },
//     {
//       label: "Dépenses",
//       backgroundColor: window.theme.warning,
//       borderColor: window.theme.warning,
//       hoverBackgroundColor: window.theme.warning,
//       hoverBorderColor: window.theme.warning,
//       data: [0, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
//       barPercentage: .75,
//       categoryPercentage: .5
//     },

//     ]
//   },
//   options: {
//     maintainAspectRatio: false,
//     legend: {
//       display: false
//     },
//     scales: {
//       yAxes: [{
//         gridLines: {
//           display: false
//         },
//         stacked: false,
//         ticks: {
//           stepSize: 20
//         }
//       }],
//       xAxes: [{
//         stacked: false,
//         gridLines: {
//           color: "transparent"
//         }
//       }]
//     }
//   }
// });


// Line chart
function drawLineChart(url = null) {
  let seeds = null;
  $.ajax({
    type: "get",
    url: url,
    data: {},
    dataType: "json",
    success: function (response) {
      var livraisonsArray = Object.values(response.livraisons);

      var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
      var gradient = ctx.createLinearGradient(0, 0, 0, 225);
      gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
      gradient.addColorStop(1, "rgba(215, 227, 244, 0.2)");
      new Chart(document.getElementById("chartjs-dashboard-line"), {
        type: "line",
        data: {
          labels: ["Jan", "Fév", "Mar", "Avr", "Mai", "Jui", "Jlt", "Aou", "Sep", "Oct", "Nov", "Déc"],
          datasets: [
            {
              label: "Livraisons",
              fill: true,
              backgroundColor: gradient,
              borderColor: window.theme.primary,
              data: livraisonsArray,
            },
          ]
        },
        options: {
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            intersect: false
          },
          hover: {
            intersect: true
          },
          plugins: {
            filler: {
              propagate: false
            }
          },
          scales: {
            xAxes: [{
              reverse: true,
              gridLines: {
                color: "rgba(0,0,0,0.0)"
              }
            }],
            yAxes: [{
              ticks: {
                stepSize: 1000
              },
              display: true,
              borderDash: [3, 3],
              gridLines: {
                color: "rgba(0,0,0,0.0)"
              }
            }]
          }
        }
      });
    }
  });
  // console.log(seeds);
}

//Pie cart
function drawPieChart(url = null) {
  $.ajax({
    type: "get",
    url: url,
    data: {},
    dataType: "json",
    success: function (response) {
      console.log(response);
      // Pie chart
      new Chart(document.getElementById("chartjs-dashboard-pie"), {
        type: "pie",
        data: {
          labels: ["Livraisons", "Transferts TOM", "Transferts WALL"],
          datasets: [{
            data: [
              response.livraisons,
              response.autres,
            ],
            backgroundColor: [
              window.theme.primary,
              window.theme.warning,
              window.theme.danger
            ],
            borderWidth: 1
          }]
        },
        options: {
          responsive: !window.MSInputMethodContext,
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          cutoutPercentage: 75
        }
      });
    }
  });
}

