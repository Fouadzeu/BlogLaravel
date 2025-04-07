<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DevoirManager - Accueil</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
      [x-cloak] { display: none; }
      .bg-custom {
        background: rgba(0, 0, 0, 0.5);
      }
      .hero-title {
        font-family: 'Inter', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        color: #ffffff;
        text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.6);
      }
      .hero-text {
        font-family: 'Inter', sans-serif;
        font-size: 1.5rem;
        color: #f3f4f6;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
      }
      .btn {
        padding: 0.875rem 2rem;
        border-radius: 9999px;
        font-weight: 600;
        transition: all 0.3s ease;
      }
      .btn-primary {
        background-color: #2d51f1;
        color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      }
      .btn-primary:hover {
        background-color: #2647dc;
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
      }
      .btn-secondary {
        background-color: #515f9c;
        color: #ffffff;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
      }
      .btn-secondary:hover {
        background-color: #4357ac;
        transform: scale(1.05);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <!-- Navigation -->
    <nav x-data="{ open: false }" class="bg-slate-600 shadow">
      <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center">
          <!-- Logo et menu -->
          <div class="flex space-x-4">
            <div>
              <a href="#" class="flex py-5 px-2 text-white">
                <span class="font-bold text-xl">
                  <img src="/img/logof.png" alt="Logo" class="h-auto w-10" />
                </span>
              </a>
            </div>
            <div class="hidden md:flex items-center space-x-1">
              <a href="#" class="py-5 px-3 text-white hover:text-gray-300">Accueil</a>
            </div>
          </div>
          <!-- Liens d'action pour écran moyen et grand -->
          <div class="hidden md:flex items-center space-x-1">
            <a href="{{ route('user.login') }}" class="py-2 px-3 text-white rounded hover:bg-blue-500 transition duration-100">Se connecter</a>
            <a href="{{ route('register') }}" class="py-2 px-3 bg-blue-500 hover:bg-blue-400 text-white rounded transition duration-300">S'inscrire</a>
          </div>
          <!-- Bouton mobile -->
          <div class="md:hidden flex items-center">
            <button @click="open = !open" class="focus:outline-none">
              <!-- Icône burger -->
              <svg x-show="!open" x-cloak class="w-6 h-6 ml-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
              <!-- Icône croix -->
              <svg x-show="open" x-cloak class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <!-- Menu mobile -->
      <div x-show="open" x-transition class="md:hidden bg-slate-500 shadow">
        <a href="#" class="block py-2 px-4 text-sm text-white hover:text-gray-700">Accueil</a>
        <a href="{{ route('user.login') }}" class="block py-2 px-4 text-sm text-white hover:text-gray-700">Se connecter</a>
        <a href="{{ route('register') }}" class="block py-2 px-4 text-sm text-white hover:text-gray-700">S'inscrire</a>
      </div>
    </nav>

    <!-- Section Hero -->
    <header class="relative bg-cover bg-center h-screen" style="background-image: url('/img/accueil.jpg')">
      <!-- Overlay personnalisé -->
      <div class="bg-custom absolute inset-0"></div>
      <div class="relative z-10 max-w-7xl mx-auto px-4 py-32 flex flex-col justify-center items-start h-full">
        <h1 class="hero-title mb-6"
          x-data="{
            texts: [
              'Bienvenue sur DevoirManager',
              'Organisez vos devoirs avec efficacité',
              'Avec votre partenaire scolaire'
            ],
            currentIndex: 0,
            displayed: '',
            async animate() {
              while (true) {
                let fullText = this.texts[this.currentIndex];
                this.displayed = fullText;
                await new Promise(resolve => setTimeout(resolve, 2000)); // Affichage pendant 2 secondes
                this.currentIndex = (this.currentIndex + 1) % this.texts.length;
              }
            }
          }"
          x-init="animate()"
          x-text="displayed"
          x-transition:enter="transition ease-out duration-500"
          x-transition:enter-start="opacity-0 transform -translate-y-4"
          x-transition:enter-end="opacity-100 transform translate-y-0"
          x-transition:leave="transition ease-in duration-500"
          x-transition:leave-start="opacity-100 transform translate-y-0"
          x-transition:leave-end="opacity-0 transform -translate-y-4">
        </h1>
        <p class="hero-text mb-8 max-w-lg">
          Gérez vos devoirs en toute simplicité.<br>
          Connectez-vous pour accéder à toutes les fonctionnalités.
        </p>
        <div class="space-x-4">
          <a href="{{ route('user.login') }}" class="btn btn-primary">Se connecter</a>
          <a href="{{ route('register') }}" class="btn btn-secondary">S'inscrire</a>
        </div>
      </div>
    </header>
  </body>
</html>
