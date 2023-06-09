@extends('adminPanel.master')
@section('title', 'Dashboard')

@section('content')

<!DOCTYPE html>
<html>
<head>
    
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        // Pass the chartData from PHP to JavaScript
      
        var chartData = @json($blog_in_day);
        var categoryChartData =@json($blog_with_category);
        
    </script>
    <script src="{{ mix('resources/js/graph.js') }}"></script>
    @vite('resources/css/graph.css')
</head>
<body>
    <div class="row">
        <div class="col-xl-5 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-yellow f-w-600">{{ $blogsCreatedToday }}</h4>
                            <h6 class="text-muted m-b-0">Blogs Created Today</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-5 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-yellow f-w-600">{{ $acceptedBlogsCount }}</h4>
                            <h6 class="text-muted m-b-0">Accepted Blogs</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-5 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-yellow f-w-600">{{ $pendingBlogsCount }}</h4>
                            <h6 class="text-muted m-b-0">Pending Blogs</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xl-5 col-md-6">
            <div class="card">
                <div class="card-block">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-c-yellow f-w-600">{{ $allUsersCount }}</h4>
                            <h6 class="text-muted m-b-0">All Users</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="feather icon-bar-chart f-28"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="myChart"></div>
    <script>
        // Call the blog_in_day function after the DOM has loaded
        document.addEventListener("DOMContentLoaded", function() {
            blog_in_day(chartData);
        });
    </script>

    <div id="categoryChart"></div>
    <script>
        // Call the blog_in_day function after the DOM has loaded
        document.addEventListener("DOMContentLoaded", function() {
            blog_with_category(categoryChartData);
        });
    </script>

</body>
</html>

@endsection
