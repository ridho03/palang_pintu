

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  

  <link rel="shortcut icon" href="{{asset('./img/fav.png')}}" type="image/x-icon">  
  <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
  <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">  
  <title>Welcome To Cleopatra</title>
</head>
<body class="bg-gray-100">



<x-navbar></x-navbar>

<!-- strat wrapper -->
<div class="h-screen flex flex-row flex-wrap">
<x-sidebar></x-sidebar>
<div class="flex-1 px-8">
        <div class="relative overflow-x-auto mx-auto w-full max-w-screen-xl">
            {{ $slot }} <!-- Isi dari Slot (misalnya tabel) -->
        </div>
    </div>

</div>
<!-- end wrapper -->

<!-- script -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<!-- end script -->

</body>
</html>
