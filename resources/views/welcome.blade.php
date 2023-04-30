<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="shortcut icon" href="./assets/logo.svg" type="svg" />
        <title>Bem-vindo ao estoque!</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-900">
        <div class="grid place-content-center h-screen gap-10 text-center">
            <div class="absolute flex items-center">
                <img
                    src="./assets/logo.svg"
                    alt="logo"
                    width="30"
                    class="m-6"
                />
                <p class="font-medium text-xl text-white">Estoque</p>
            </div>
            <h1 class="text-3xl text-white">Bem-vindo ao estoque!</h1>
            <h2 class="text-xl text-white">
                Antes de entrar faça login ou se cadastre.
            </h2>
            @if (Route::has('login'))
            <div class="space-x-2 p-6">
                @auth
                <a
                    href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Dashboard</a
                >
                @else
                <a
                    href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500 border border-2 rounded border-gray-400 p-2 hover:border-gray-800"
                    >Entre</a
                >
                <span class="text-gray-300">ou</span>
                @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-600 border border-2 rounded border-gray-400 p-2 hover:border-gray-800"
                    >Cadastre</a
                >
                @endif @endauth
            </div>
            @endif
        </div>
    </body>
</html>
