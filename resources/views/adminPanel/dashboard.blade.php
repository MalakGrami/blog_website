@extends('adminPanel.master')
@section('title', 'Blog Detail')
@section('content')
<!DOCTYPE html>
<html>
<head>
    
    <style>
        /* Adjust the chart container size */
        #myChart {
            width: 450px;
            height: 350px;
            margin: 20px; /* Add margin to the chart container */
            position: fixed; /* Position the chart container */
            bottom: 0; /* Align the chart container to the bottom */
            left: 80px; /* Align the chart container to the right */
        }
    </style>
    
    @vite('resources/js/graph.js')
</head>
<body>
    <div id="myChart"></div>
    
    <script>
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var chartData = @json($chartData);

            var data = google.visualization.arrayToDataTable([
                ['Date', 'Count'],
                ...chartData.labels.map((label, index) => [new Date(label), chartData.data[index]])
            ]);

            var options = {
                title: 'Blog Posts',
                chartArea: { width: '80%', height: '70%' }, // Adjust the chart area size as desired
                hAxis: {
                    title: 'Date',
                    format: 'MMM d', // Display date in a specific format
                    textStyle: {
                        color: '#333', // Set the color of the axis text
                        fontSize: 12 // Set the font size of the axis text
                    },
                    titleTextStyle: {
                        color: '#666', // Set the color of the axis title
                        fontSize: 14, // Set the font size of the axis title
                        bold: true // Make the axis title bold
                    },
                    gridlines: {
                        color: 'transparent' // Hide the vertical gridlines
                    }
                },
                vAxis: {
                    title: 'Count',
                    minValue: 0,
                    textStyle: {
                        color: '#333', // Set the color of the axis text
                        fontSize: 12 // Set the font size of the axis text
                    },
                    titleTextStyle: {
                        color: '#666', // Set the color of the axis title
                        fontSize: 14, // Set the font size of the axis title
                        bold: true // Make the axis title bold
                    },
                    gridlines: {
                        color: '#eee' // Set the color of the horizontal gridlines
                    }
                },
                titleTextStyle: {
                    color: '#888', // Set the color of the chart title
                    fontSize: 18, // Set the font size of the chart title
                    bold: true // Make the chart title bold
                },
                colors: ['#2f1a82'], // Set the color of the line
                backgroundColor: '#f5f5f5', // Set the background color of the chart
                legend: {
                    position: 'none' // Hide the legend
                }
            };

            var chart = new google.visualization.LineChart(document.getElementById('myChart'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>
@endsection
