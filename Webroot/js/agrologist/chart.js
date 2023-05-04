
// const data = {
//   labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//   datasets: [
//     {
//         label: 'My First Dataset',
//         data: [65, 59, 80, 81, 56, 55, 40],
//         fill: false,
//         borderColor: 'rgb(255, 99, 132)',
//         tension: 0.1,
//         yAxisID: 'y'

//     },
//     {
//         label: 'My Second Dataset',
//         data: [75, 20, 23, 31, 46, 95, 50],
//         fill: false,
//         borderColor: 'rgb(75, 192, 192)',
//         tension: 0.1,
//         yAxisID: 'y1'
//     }
// ],
// };

// const config = {
//     type: 'line',
//     data: data,
//     options: {
//       responsive: true,
//       interaction: {
//         mode: 'index',
//         intersect: false,
//       },
//       stacked: false,
//       plugins: {
//         title: {
//           display: true,
//           text: 'Chart.js Line Chart - Multi Axis'
//         }
//       },
//       scales: {
//         y: {
//           type: 'linear',
//           display: true,
//           position: 'left',
//         },
//         y1: {
//           type: 'linear',
//           display: true,
//           position: 'right',
//             grid: {
//             drawOnChartArea: true,
//           },
//         },
//       }
//     },
//   };


  // const pieProfitCrop = {
  //   labels: ['Papaya', 'Brinjal', 'Greengrams', 'Rice', 'Pumpkin'],
  //   datasets: [
  //     {
  //       label: 'Dataset 1',
  //       data: [300, 50, 100, 40, 120],
  //       backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)'],
  //     }
  //   ]
  // };

  const pieCropSuccess = {
    labels: ['Papaya', 'Brinjal', 'Ladies Fingers', 'Rice', 'Pumpkin'],
    datasets: [
      {
        label: 'Dataset 1',
        data: [40, 50, 100, 300, 120],
        backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)'],
      }
    ]
  };

  const pieCropFailure= {
    labels: ['Pineapple', 'Pea', 'Onion', 'Corn', 'Sweet Potato'],
    datasets: [
      {
        label: 'Dataset 1',
        data: [100, 200, 100, 200, 120],
        backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)'],
      }
    ]
  };


  // const pieConfigProfitCrop = {
  //   type: 'pie',
  //   data: pieProfitCrop,
  //   options: {
  //     responsive: true,
  //     maintainAspectRatio: true,
  //     plugins: {
  //       legend: {
  //         position: 'top',
  //       },
  //       title: {
  //         display: true,
  //         text: 'Profit per Crop'
  //       }
  //     }
  //   },
  // };

  const pieConfigCropSuccess = {
    type: 'pie',
    data: pieCropSuccess,
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Success per Crop'
        }
      }
    },
  };

  const pieConfigCropFailure = {
    type: 'pie',
    data: pieCropFailure,
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Failure per Crop'
        }
      }
    },
  };

// const ctx = document.getElementById('myChart');
// const pieChart = document.getElementById('pieChart');

const ctx1 = document.getElementById('myChart1');
const pieChart1 = document.getElementById('pieChart1');

const pieChart2 = document.getElementById('pieChart2');

const pieChart3 = document.getElementById('pieChart3');

// new Chart(ctx, config);

// new Chart(pieChart, pieConfigProfitCrop);
//new Chart(ctx1, config);
new Chart(pieChart1, pieConfigCropSuccess);

new Chart(pieChart2, pieConfigCropFailure);

new Chart(pieChart3, pieConfig);


const ctx5 = document.getElementById('mylineChart');
new Chart(ctx5, config);