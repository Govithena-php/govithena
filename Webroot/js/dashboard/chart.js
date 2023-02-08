
const data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
        label: 'My First Dataset',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(255, 99, 132)',
        tension: 0.1,
        yAxisID: 'y'

    },
    {
        label: 'My Second Dataset',
        data: [75, 20, 23, 31, 46, 95, 50],
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1,
        yAxisID: 'y1'
    }
],
};

const config = {
    type: 'line',
    data: data,
    options: {
      responsive: true,
      interaction: {
        mode: 'index',
        intersect: false,
      },
      stacked: false,
      plugins: {
        title: {
          display: true,
          text: 'Chart.js Line Chart - Multi Axis'
        }
      },
      scales: {
        y: {
          type: 'linear',
          display: true,
          position: 'left',
        },
        y1: {
          type: 'linear',
          display: true,
          position: 'right',
            grid: {
            drawOnChartArea: true,
          },
        },
      }
    },
  };

  const pieData = {
    labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
    datasets: [
      {
        label: 'Dataset 1',
        data: [300, 50, 100, 40, 120],
        backgroundColor: ['rgb(255, 99, 132)', 'rgb(255, 159, 64)', 'rgb(255, 205, 86)', 'rgb(75, 192, 192)', 'rgb(54, 162, 235)'],
      }
    ]
  };

  const pieConfig = {
    type: 'pie',
    data: pieData,
    options: {
      responsive: true,
      maintainAspectRatio: true,
      plugins: {
        legend: {
          position: 'top',
        },
        title: {
          display: true,
          text: 'Chart.js Pie Chart'
        }
      }
    },
  };

const ctx = document.getElementById('myChart');
const pieChart = document.getElementById('pieChart');

new Chart(ctx, config);
new Chart(pieChart, pieConfig);
