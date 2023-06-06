@extends('adminPanel.master')
@section('title', 'Dashboard')
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
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        // Pass the chartData from PHP to JavaScript
        var chartData = @json($chartData);
    </script>
    <script src="{{ mix('resources/js/graph.js') }}"></script>
    
</head>
<body>
    <div id="myChart"></div>
   
    <script>
        // Call the blog_in_day function after the DOM has loaded
        document.addEventListener("DOMContentLoaded", function() {
            blog_in_day(chartData);
        });
    </script>
   
</body>
</html>
@endsection
