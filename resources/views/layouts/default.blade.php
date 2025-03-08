<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard FullStudy | CFPC</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- AlpineJS CDN -->
  <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <script>
    // Optionnel : extension de configuration pour customiser Tailwind
    tailwind.config = {
      theme: {
        extend: {},
      }
    }
  </script>
</head>
<body x-data="{ mobileMenuOpen: false }" class="bg-gray-100">

  <!-- Barre latérale (affichée uniquement sur desktop) -->
  <div class="hidden md:block fixed inset-y-0 left-0 w-64 bg-red-600 text-white transform transition-transform duration-300 ease-in-out z-50">
    <div class="flex flex-col h-full">
      <div class="flex items-center justify-center p-6">
        <div class="text-xl font-bold text-center">
          FullStudy<br />
          <span class="text-sm">CFPC</span>
        </div>
      </div>
      <nav class="flex-1 px-4">
        <ul>
          <li class="py-2 px-4 rounded hover:bg-red-700">
            <a href="{{ route('dashboard') }}" class="block">Dashboard</a>
          </li>
          <li class="py-2 px-4 rounded hover:bg-red-700">
            <a href="{{ route('cours.index') }}" class="block">Devoirs</a>
          </li>
          <li class="py-2 px-4 rounded hover:bg-red-700">
            <a href="#" class="block">Paramètres</a>
          </li>
        </ul>
      </nav>
      <div class="p-4">
        <a href="{{ route('logout') }}" class="w-full py-2 px-4 bg-white text-red-600 rounded hover:bg-gray-200">
          Déconnexion
        </a>
      </div>
    </div>
  </div>

  <!-- Mobile Menu Burger -->
  <div
    x-show="mobileMenuOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="-translate-x-full opacity-0"
    x-transition:enter-end="translate-x-0 opacity-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="translate-x-0 opacity-100"
    x-transition:leave-end="-translate-x-full opacity-0"
    class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-50 md:hidden" x-cloak>
    <div class="flex flex-col h-full">
      <div class="flex items-center justify-between p-6 border-b">
        <div class="text-xl font-bold text-gray-800">
          FullStudy<br />
          <span class="text-sm text-gray-500">CFPC</span>
        </div>
        <!-- Bouton de fermeture -->
        <button @click="mobileMenuOpen = false" class="text-gray-800 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div>
      <nav class="flex-1 px-4 py-2">
        <ul>
          <li class="py-2 px-4 rounded hover:bg-gray-200">
            <a href="{{ route('dashboard') }}" class="block text-gray-800">Dashboard</a>
          </li>
          <li class="py-2 px-4 rounded hover:bg-gray-200">
            <a href="{{ route('cours.index') }}" class="block text-gray-800">Devoirs</a>

          <li class="py-2 px-4 rounded hover:bg-gray-200">
            <a href="#" class="block text-gray-800">Paramètres</a>
          </li>
        </ul>
      </nav>
      <div class="p-4 border-t">
        <a href="{{ route('logout') }}" class="w-full py-2 px-4 bg-white text-red-600 rounded hover:bg-gray-200">
            Déconnexion
          </a>
      </div>
    </div>
  </div>

  <!-- Contenu Principal -->
  <div class="flex flex-col min-h-screen md:ml-64 transition-all duration-300">
    <!-- Header -->
    <header class="flex items-center justify-between bg-white shadow p-4 border-b-4 border-red-600">
      <div class="flex items-center">
        <!-- Bouton burger pour mobile -->
        <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-gray-500 focus:outline-none mr-4">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
        </button>
        <h1 class="text-2xl font-bold text-gray-800">Tableau de Bord</h1>
      </div>
      <!-- Menu utilisateur (inchangé sur mobile et desktop) -->
      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
          <span class="ml-2 text-gray-800">{{ $user->name }}</span>
          <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414
                 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd" />
          </svg>
        </button>
        <div x-show="open" @click.away="open = false" x-cloak
          class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50">
          <a href="{{ route('profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Profil</a>
          <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Déconnexion</a>
        </div>
      </div>
    </header>
    <main class="flex-grow p-6">
        {{ $slot }}

    </main>


    <footer class="bg-white shadow p-4 text-center">
        <p class="text-gray-600">&copy; 2023 FullStudy - Centre de Formation Professionnel la Canadienne</p>
      </footer>
    </div>
  </body>
  </html>

