<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DevoirManager - Accueil</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Intégration de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Intégration d'Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
      [x-cloak] { display: none; }
      .bg-custom {
        background-image: url('/img/accueil.jpg');
        background-position: center;
      }
    </style>
  </head>
  <body class="bg-gray-100">
    <!-- Navigation -->
    <nav x-data="{ open: false }" class="bg-red-600 shadow">
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
              <a href="#about" class="py-5 px-3 text-white hover:text-gray-300">À propos</a>
              <a href="#contact" class="py-5 px-3 text-white hover:text-gray-300">Contact</a>
            </div>
          </div>
          <!-- Liens d'action pour écran moyen et grand -->
          <div class="hidden md:flex items-center space-x-1">
            <a href="{{ route('login') }}" class="py-2 px-3 text-white rounded hover:bg-red-500 transition duration-100">Se connecter</a>
            <a href="{{ route('register') }}" class="py-2 px-3 bg-red-400 hover:bg-red-500 text-white rounded transition duration-300"> S'inscrire </a>
          </div>
          <!-- Bouton mobile -->
          <div class="md:hidden flex items-center">
            <button @click="open = !open" class="focus:outline-none">
              <!-- Icône burger -->
              <svg x-show="!open" x-cloak class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
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
      <div x-show="open" x-transition class="md:hidden bg-white shadow">
        <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:text-gray-700">Accueil</a>
        <a href="#about" class="block py-2 px-4 text-sm text-red-600 hover:text-gray-700">À propos</a>
        <a href="#contact" class="block py-2 px-4 text-sm text-red-600 hover:text-gray-700">Contact</a>
        <a href="{{ route('login') }}" class="block py-2 px-4 text-sm text-red-600 hover:text-gray-700">Se connecter</a>
        <a href="{{ route('register') }}" class="block py-2 px-4 text-sm text-red-600 hover:text-gray-700">S'inscrire</a>
      </div>
    </nav>

    <!-- Section Hero -->
    <header class="relative bg-cover bg-center" style="background-image: url('https://source.unsplash.com/random/1600x900?study')">
      <!-- Overlay personnalisé -->
      <div class="bg-custom bg-top h-30 bg-cover bg-no-repeat absolute inset-0"></div>
      <div class="relative z-10 max-w-7xl mx-auto px-4 py-32 text-left">
        <h1 class="relative text-4xl md:text-6xl font-bold text-white mb-6"
          x-data="{
            texts: [
              'Bienvenue sur DevoirManager',
              'Organisez vos devoirs avec efficacité',
              'Votre partenaire scolaire'
            ],
            currentIndex: 0,
            displayed: '',
            async animate() {
              while (true) {
                let fullText = this.texts[this.currentIndex];
                // Apparition lettre par lettre
                for (let i = 1; i <= fullText.length; i++) {
                  this.displayed = fullText.slice(0, i);
                  await new Promise(resolve => setTimeout(resolve, 100));
                }
                await new Promise(resolve => setTimeout(resolve, 700));
                // Disparition lettre par lettre
                for (let i = fullText.length; i >= 0; i--) {
                  this.displayed = fullText.slice(0, i);
                  await new Promise(resolve => setTimeout(resolve, 100));
                }
                await new Promise(resolve => setTimeout(resolve, 1000));
                // Passage au texte suivant
                this.currentIndex = (this.currentIndex + 1) % this.texts.length;
              }
            }
          }"
          x-init="animate()">
          <span class="opacity-0">Bienvenue sur DevoirManager</span>
          <span class="absolute top-0 left-0" x-text="displayed"></span>
        </h1>
        <p class="text-xl md:text-2xl text-red-100 mb-8">
          Gérez vos devoirs en toute simplicité.<br>
           Connectez-vous pour accéder à toutes les fonctionnalités.
        </p>
        <div class="space-x-4">
          <a href="{{ route('login') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-block">
            Se connecter
          </a>
          <a href="{{ route('register') }}" class="bg-red-400 hover:bg-red-500 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-block">
            S'inscrire
          </a>
        </div>
      </div>
    </header>

   <!-- Section À propos -->
<section id="about" class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4">
      <h2 class="text-center text-3xl font-bold mb-6 text-red-600">À propos de DevoirManager</h2>
      <p class="text-justify text-lg text-gray-700 mb-4">
        DevoirManager est la solution idéale pour organiser et suivre vos devoirs au quotidien. Nous mettons à votre disposition une application intuitive qui vous permettra de ne jamais manquer une date d'échéance et d'optimiser votre planning.
      </p>
      <p class="text-justify text-lg text-gray-700 mb-8">
        Inscrivez-vous dès maintenant pour accéder à toutes les fonctionnalités et faciliter votre gestion scolaire.
      </p>
      <!-- Grille des cartes -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Carte 1 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="img/etudiant1.jpg" alt="Étudiant 1" class="w-full h-48 object-cover" />
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2 text-red-600">Apprenant 1</h3>
            <p class="text-gray-600">Un apprenant qui réussit grâce à notre solution.</p>
          </div>
        </div>
        <!-- Carte 2 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="img/etudiant2.jpg" alt="Étudiant 2" class="w-full h-48 object-cover" />
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2 text-red-600">Apprenant 2</h3>
            <p class="text-gray-600">Optimisez votre planning et gérez vos devoirs en toute simplicité.</p>
          </div>
        </div>
        <!-- Carte 3 -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
          <img src="img/etudiant3.jpg" alt="Étudiant 3" class="w-full h-48 object-cover" />
          <div class="p-4">
            <h3 class="font-bold text-xl mb-2 text-red-600">Apprenant 3</h3>
            <p class="text-gray-600">Une gestion simple pour atteindre vos objectifs académiques.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


    <!-- Section Contact -->
    <section id="contact" class="py-16 bg-slate-200">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-12 text-red-600">Contactez-nous</h2>
        <div class="flex flex-col md:flex-row gap-8 items-start">
          <div class="md:w-1/2">
            <form class="w-full">
              <div class="mb-4">
                <label for="name" class="block text-red-700">Nom</label>
                <input type="text" id="name" placeholder="Votre nom" class="mt-2 w-full p-3 border border-blue-300 rounded" />
              </div>
              <div class="mb-4">
                <label for="email" class="block text-red-700">Email</label>
                <input type="email" id="email" placeholder="Votre email" class="mt-2 w-full p-3 border border-blue-300 rounded" />
              </div>
              <div class="mb-4">
                <label for="message" class="block text-red-700">Message</label>
                <textarea id="message" rows="5" placeholder="Votre message" class="mt-2 w-full p-3 border border-blue-300 rounded"></textarea>
              </div>
              <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-full w-full">
                Envoyer
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-red-600 text-white py-8">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <p>&copy; 2023 DevoirManager. Tous droits réservés.</p>
      </div>
    </footer>
  </body>
</html>
