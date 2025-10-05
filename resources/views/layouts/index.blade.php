<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>AkurBlog | {{ $title }}</title>
  
  @vite('resources/css/app.css')
</head>
<body class="bg-white dark:bg-gray-700 text-black dark:text-white">
  @include('layouts.navbar')
  
  @yield('content')
  
  @include('layouts.footer')

  <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
  @vite('resources/js/app.js')
</body>
</html>
