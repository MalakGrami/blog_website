document.addEventListener("DOMContentLoaded", function() {
    var blogsChartCanvas = document.getElementById('blogsChartCanvas');
  
    // Retrieve the data for the line chart
    axios.get('/adminPanel/')
      .then(function (response) {
        var data = response.data;
        createLineChart(blogsChartCanvas, data.labels, data.data);
      })
      .catch(function (error) {
        console.log(error);
      });
  
    // Create the line chart
    function createLineChart(canvas, labels, data) {
      var ctx = canvas.getContext('2d');
      var blogsChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Number of Blogs',
            data: data,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              precision: 0, // Show integers on the y-axis
              suggestedMax: Math.max(...data) + 1 // Set suggested maximum based on data
            }
          }
        }
      });
    }
  });
  