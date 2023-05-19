@extends('adminPanel.master')
@section('title', 'Tableau de bord')

@section('content')
  <div class="report-container">
    <canvas id="blogsChartCanvas"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const blogsChartCanvas = document.getElementById('blogsChartCanvas');

    // Retrieve the data for the line chart
    axios.get('/adminPanel/getChartData')
      .then(function (response) {
        const data = response.data;
        createLineChart(blogsChartCanvas, data.labels, data.data);
      })
      .catch(function (error) {
        console.log(error);
      });

    // Create the line chart
    function createLineChart(canvas, labels, data) {
      const ctx = canvas.getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [{
            label: 'Dataset 1',
            data: data,
            fill: false,
            borderColor: 'rgba(255, 0, 0, 1)',
            backgroundColor: 'rgba(255, 0, 0, 0.5)',
            borderWidth: 1,
            pointStyle: 'rectRot',
            pointRadius: 5,
            pointBorderColor: 'rgb(0, 0, 0)'
          }]
        },
        options: {
          plugins: {
            legend: {
              labels: {
                usePointStyle: true
              }
            }
          }
        }
      });
    }
  </script>
@endsection
