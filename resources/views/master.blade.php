<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

    <title>@yield('title')</title>
    {{-- @vite(['resources/css/nav.css']) --}}
    @vite(['resources/css/app.css'])
    @vite(['resources/js/app.js'])
</head>
<body style="background-color: #f5f5f5;">
    @include('nav')

   <br>
    <br>
    
        <main class="page">
            @yield('content')
        </main>
        <br>
    <br>
    
     @include('footer')
     
   
</body>
</html>