$(document).ready(function(){
  $.ajax({
    url: "http://localhost/dwo/data4.php",
    method: "GET",
    success: function(data4) {
      console.log(data4);
      var category = [];
      var total = [];

      for(var i in data4) {
        category.push(data4[i].category);
        total.push(data4[i].total);
      }

      var ctx = document.getElementById("myBarChart");

      var myBarChart = new Chart(ctx, {
        type: 'bar',
  data: {
    labels: category,
    datasets: [{
      label: "Total Pendapatan",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: total,
    }],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 20,
        right: 35,
        top: 35,
        bottom: 0
      }
    },
    scales: {
      xAxes: [{
        time: {
        },
        gridLines: {
          display: false,
          drawBorder: false
        },
        ticks: {
          maxTicksLimit: 10
        },
        maxBarThickness: 25,
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1500000000,
          maxTicksLimit: 6,
          padding: 5,
          callback: function(value, index, values) {
            return '$' + number_format(value);
          }
        },
        gridLines: {
          color: "rgb(234, 236, 244)",
          zeroLineColor: "rgb(234, 236, 244)",
          drawBorder: false,
          borderDash: [2],
          zeroLineBorderDash: [2]
        }
      }],
    },
    legend: {
      display: false
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: '#6e707e',
      titleFontSize: 15,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 5,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 15,
      callbacks: {
        label: function(tooltipItem, chart) {
          var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
          return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
        }
      }
    },
  }
});
    },
    error: function(data4) {
      console.log(data4);
    }
  });
});


