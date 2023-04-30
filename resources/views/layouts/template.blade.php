<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="favicon.ico" type="favicon.ico">

        <title>Estoque</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-900">
        <header>
          @include('layouts.navigationbar')
        </header>
        @include('layouts.sidebar')
        
        <main class="ml-[130px]">
            @yield('content')
        </main>
    </body>
</html>

<script>
  const menuButton = document.getElementById("menu-button");

menuButton.addEventListener("click", function () {
    let classList = document.getElementById("sidebar").classList;
    classList.toggle("hidden");
    classList.toggle("block");

    let marginMain = document.getElementsByTagName("main")[0].classList;
    marginMain.toggle("ml-[130px]");
});

</script>