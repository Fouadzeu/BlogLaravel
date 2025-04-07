<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .active {
            background-color: #4A90E2;
            color: white;
        }
    </style>
</head>
<body class="antialiased h-full">
    <div class="flex min-h-full flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="flex justify-center">
            <img src="/img/logof.png" alt="logo" class="w-1/6 h-auto ">
        </div>
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-6 shadow rounded-lg sm:px-10">
                <div class="flex justify-center mb-6">
                    <a id="etudiantOption" class="option-btn px-4 py-2 mx-2 border border-indigo-600 text-indigo-600 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-300" href="{{ route('register') }}">Apprenant</a>
                    <a id="professeurOption" class="option-btn px-4 py-2 mx-2 border border-indigo-600 text-indigo-600 rounded-full hover:bg-indigo-600 hover:text-white transition-colors duration-300" href="{{ route('profregister') }}">Professeur</a>
                </div>
                <form class="space-y-6" action="{{ $action }}" method="POST" novalidate>
                    <div class="space-y-6">
                        @csrf
                        {{ $slot }}
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-full bg-indigo-600 px-6 py-2 text-lg font-semibold text-white shadow-lg hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2 transition-colors duration-300">{{ $submitMessage }}</button>
                    </div>
                </form>
                <p>Vous avez deja un compte? <a href="{{ route('user.login') }}" class="text-blue-800 hover:text-blue-600">Connectez-vous</a></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const etudiantOption = document.getElementById('etudiantOption');
            const professeurOption = document.getElementById('professeurOption');

            etudiantOption.addEventListener('click', function() {
                etudiantOption.classList.add('active');
                professeurOption.classList.remove('active');
            });

            professeurOption.addEventListener('click', function() {
                professeurOption.classList.add('active');
                etudiantOption.classList.remove('active');
            });
        });
    </script>
</body>
</html>
