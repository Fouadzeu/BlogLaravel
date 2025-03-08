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
        </div>
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-[480px]">

            <div class="bg-white px-6 py-12 shadow sm:rounded-lg sm:px-12">
                <div class="flex justify-center mb-6">
                    <a id="etudiantOption" class="option-btn px-4 py-2 mx-2 border rounded" href="{{ route('login') }}">Apprenant</a>
                    <a id="professeurOption" class="option-btn px-4 py-2 mx-2 border rounded" href="{{ route('loginprof') }}">Professeur</a>
                </div>
                <form class="space-y-6" action="{{ $action }}" method="POST" novalidate>
                    <div class="space-y-6">

                    @csrf
                        {{ $slot }}

                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">{{ $submitMessage }}</button>
                    </div>
                </form>
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
