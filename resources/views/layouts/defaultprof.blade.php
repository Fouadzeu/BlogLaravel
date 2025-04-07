<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title }}</title>
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

<body x-data="{ mobileMenuOpen: false, logoutModal: false }" class="bg-gray-100">

  <!-- Barre latérale (affichée uniquement sur desktop) -->
  <div class="hidden md:block fixed inset-y-0 left-0 w-64 bg-slate-600 text-white transform transition-transform duration-300 ease-in-out z-50">
    <div class="flex flex-col h-full">
      <div class="flex items-center justify-center p-6">
        <div class="text-xl font-bold text-center">
          <span><img src="/img/logof.png" alt="Logo" /></span>
          DevoirManager<br />
          <span class="text-sm">CFPC</span>
        </div>
      </div>
      <nav class="flex-1 px-4">
        <ul>
          <!-- Dashboard -->
          <li class="py-2 px-4 rounded hover:bg-red-700">
            <a href="{{ route('professeur.dashboard') }}" class="flex items-center">
              <!-- Icône Home avec animation -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 transition transform hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m2-2l7-7 7 7m0 0v11a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v4a2 2 0 0 1-2 2H3z" />
              </svg>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- Assigner un Devoir -->
          <li class="py-2 px-4 rounded hover:bg-red-700">
            <a href="{{ route('professeur.devoirs.create') }}" class="flex items-center">
              <!-- Icône Pencil avec animation -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 transition transform hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m-2 2l-6 6m-3 7h4m4 0h4" />
              </svg>
              <span>Assigner un Devoir</span>
            </a>
          </li>
          <!-- Manager les Devoirs -->
          <li class="py-2 px-4 rounded hover:bg-red-700">
            <a href="{{ route('professeur.devoirs.resultat.show') }}" class="flex items-center">
              <!-- Icône Liste avec animation -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 transition transform hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <span>Devoirs et Resultats</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="p-4">
        <!-- Lien de déconnexion (sidebar) -->
        <a href="{{ route('professeur.logout') }}" @click.prevent="logoutModal = true" class="w-full py-2 px-4 bg-white text-blue-600 rounded hover:bg-gray-200 flex items-center justify-center">
          <!-- Icône Déconnexion -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
          </svg>
          <span>Déconnexion</span>
        </a>
      </div>
    </div>
  </div>

  <!-- Mobile Menu Burger -->
  <div x-show="mobileMenuOpen" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="translate-x-0 opacity-100" x-transition:leave-end="-translate-x-full opacity-0" class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-50 md:hidden" x-cloak>
    <div class="flex flex-col h-full">
      <div class="flex items-center justify-between p-6 border-b">
        <div class="text-xl font-bold text-gray-800">
          <span><img src="/img/logof.png" alt="Logo" /></span>
          DevoirManager<br />
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
          <!-- Dashboard -->
          <li class="py-2 px-4 rounded hover:bg-gray-200">
            <a href="{{ route('professeur.dashboard') }}" class="flex items-center text-gray-800">
              <!-- Icône Home avec animation -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 transition transform hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m2-2l7-7 7 7m0 0v11a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2v-4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v4a2 2 0 0 1-2 2H3z" />
              </svg>
              <span>Dashboard</span>
            </a>
          </li>
          <!-- Assigner un Devoir -->
          <li class="py-2 px-4 rounded hover:bg-gray-200">
            <a href="{{ route('professeur.devoirs.create') }}" class="flex items-center text-gray-800">
              <!-- Icône Pencil avec animation -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 transition transform hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6m-2 2l-6 6m-3 7h4m4 0h4" />
              </svg>
              <span>Assigner un Devoir</span>
            </a>
          </li>
          <!-- Manager les Devoirs -->
          <li class="py-2 px-4 rounded hover:bg-gray-200">
            <a href="{{ route('professeur.devoirs.resultat.show') }}" class="flex items-center text-gray-800">
              <!-- Icône Liste avec animation -->
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2 transition transform hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              </svg>
              <span>Manager un Devoir</span>
            </a>
          </li>
        </ul>
      </nav>
      <div class="p-4 border-t">
        <!-- Lien de déconnexion (mobile) -->
        <a href="{{ route('professeur.logout') }}" @click.prevent="logoutModal = true" class="w-full py-2 px-4 bg-white text-red-600 rounded hover:bg-gray-200 flex items-center justify-center">
          <!-- Icône Déconnexion -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
          </svg>
          <span>Déconnexion</span>
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
      <!-- Menu utilisateur (mobile et desktop) -->
      <div class="relative" x-data="{ open: false }">
        <button @click="open = !open" class="flex items-center focus:outline-none">
          <!-- Icône utilisateur -->
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
          </svg>
          <span class="ml-2 text-gray-800">{{ $prof->nom }}</span>
          <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 0 1 1.414 0L10 10.586l3.293-3.293a1 1 0 1 1 1.414 1.414l-4 4a1 1 0 0 1-1.414 0l-4-4a1 1 0 0 1 0-1.414z" clip-rule="evenodd" />
          </svg>
        </button>
        <div x-show="open" @click.away="open = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 z-50">
          <a href="{{ route('professeur.profile') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 flex items-center">
            <!-- Icône Profil -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1 1 18.364 5.56 9 9 0 0 1 5.121 17.804z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 1 0-6 0 3 3 0 0 0 6 0z" />
            </svg>
            <span>Profil</span>
          </a>
          <a href="{{ route('professeur.logout') }}" @click.prevent="$root.logoutModal = true" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 flex items-center">
            <!-- Icône Déconnexion -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5 mr-2">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7" />
            </svg>
            <span>Déconnexion</span>
          </a>
        </div>
      </div>
    </header>
    <main class="flex-grow p-6">
      {{ $slot }}
    </main>
    <footer class="bg-white shadow p-4 text-center">
      <p class="text-gray-600">© DevoirManager - Centre de Formation Professionnel la Canadienne</p>
    </footer>
  </div>

  <!-- Boîte de dialogue de confirmation de déconnexion -->
  <div x-show="logoutModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50" x-cloak>
    <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
      <div class="px-4 pt-5 sm:p-6 sm:pb-4">
        <h3 class="text-lg leading-6 font-medium text-gray-900">Confirmer la déconnexion</h3>
        <div class="mt-2">
          <p class="text-sm text-gray-500">Êtes-vous sûr de vouloir vous déconnecter ?</p>
        </div>
      </div>
      <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
        <button @click="document.getElementById('logout-form').submit();" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
          Confirmer
        </button>
        <button @click="logoutModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
          Annuler
        </button>
      </div>
    </div>
  </div>

  <!-- Formulaire de déconnexion caché -->
  <form id="logout-form" action="{{ route('professeur.logout') }}" method="POST" class="hidden">
    @csrf
  </form>
</body>
</html>
