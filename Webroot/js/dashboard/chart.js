
const data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
        label: 'Investments',
        data: [65, 59, 80, 81, 56, 55, 40],
        fill: false,
        borderColor: 'rgb(255, 99, 132)',
        tension: 0.1,
        yAxisID: 'y'

    },
    {
        label: 'Gain',
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
          text: 'Investments VS Gain'
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
    labels: ['Fruits', 'Grains', 'Other', 'Vegetable', 'Spices'],
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
          text: 'Profit vs Category'
        }
      }
    },
  };

const ctx = document.getElementById('myChart');
const pieChart = document.getElementById('pieChart');

new Chart(ctx, config);
new Chart(pieChart, pieConfig);
