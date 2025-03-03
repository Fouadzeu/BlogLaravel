<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page - Thème Bleu</title>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Intégration de Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Intégration d'Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        [x-cloak]{
display: none;
}

.bg-custom {
    background-image: url('/img/accueil.jpg');
    background-position:center;
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
                <span class="font-bold text-xl"><img src="/img/logof.png" alt="" class="h-auto w-10 "></span>
              </a>
            </div>
            <div class="hidden md:flex items-center space-x-1">
              <a href="#features" class="py-5 px-3 text-white hover:text-gray-600">Services</a>
              <a href="#pricing" class="py-5 px-3 text-white hover:text-gray-600">Tarifs</a>
              <a href="#contact" class="py-5 px-3 text-white hover:text-gray-600">Contacts</a>
            </div>
          </div>
          <!-- Liens d'action pour écran moyen et grand -->
          <div class="hidden md:flex items-center space-x-1">
            <a href="{{ route('login') }}" class="py-2 px-3 text-white rounded hover:bg-red-500 transition duration-100">Login</a>
            <a
              href="{{ route('register') }}"
              class="py-2 px-3 bg-red-400 hover:bg-red-500 text-white rounded transition duration-300"
            >
              Sign Up
            </a>
          </div>
          <!-- Bouton mobile -->
          <div class="md:hidden flex items-center">
            <button @click="open = !open" class="focus:outline-none">
              <!-- Icone burger -->
              <svg
                x-show="!open"
                x-cloak
                class="w-6 h-6 text-white"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path d="M4 6h16M4 12h16M4 18h16"></path>
              </svg>
              <!-- Icone croix -->
              <svg
                x-show="open"
                x-cloak
                class="w-6 h-6 text-white"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                viewBox="0 0 24 24"
                stroke-linecap="round"
                stroke-linejoin="round"
              >
                <path d="M6 18L18 6M6 6l12 12"></path>
              </svg>
            </button>
          </div>
        </div>
      </div>
      <!-- Menu mobile incluant Login et Sign Up, fond blanc -->
      <div x-show="open" x-transition class="md:hidden bg-white shadow">
        <a
          href="#features"
          class="block py-2 px-4 text-sm text-red-400 hover:text-gray-600"
          >Services</a
        >
        <a
          href="#pricing"
          class="block py-2 px-4 text-sm  text-red-400 hover:text-gray-600"
          >Tarifs</a
        >
        <a
          href="#contact"
          class="block py-2 px-4 text-sm  text-red-400 hover:text-gray-600"
          >Contacts</a
        >
        <a
          href="{{ route('login') }}"
          class="block py-2 px-4 text-sm text-red-400 hover:text-gray-600"
          >Login</a
        >
        <a
          href="{{ route('register') }}"
          class="block py-2 px-4 text-sm  text-red-400 hover:text-gray-600"
          >Sign Up</a
        >
      </div>
    </nav>

    <!-- Section Hero sans designs géométriques -->
    <header
      class="relative bg-cover bg-center"
      style="background-image: url('https://source.unsplash.com/random/1600x900?landscape')"
    >
      <!-- Overlay sombre en bleu -->
      <div class="bg-custom bg-top h-30 bg-cover bg-no-repeat absolute inset-0 "></div>
      <div class="relative z-10 max-w-7xl mx-auto px-4 py-32 text-center ">
        <h1 class="relative text-4xl md:text-6xl font-bold text-white mb-6"
        x-data="{
          fullText: 'Bienvenue sur FullStudy',
          displayed: '',
          async animate() {
            while (true) {
              // Affichage lettre par lettre
              for (let i = 1; i <= this.fullText.length; i++) {
                this.displayed = this.fullText.slice(0, i);
                await new Promise(resolve => setTimeout(resolve, 100));
              }
              await new Promise(resolve => setTimeout(resolve, 1000));

              // Effacement lettre par lettre
              for (let i = this.fullText.length; i >= 0; i--) {
                this.displayed = this.fullText.slice(0, i);
                await new Promise(resolve => setTimeout(resolve, 100));
              }
              await new Promise(resolve => setTimeout(resolve, 1500));
            }
          }
        }"
        x-init="animate()">

      <!-- Élément invisible servant à fixer la hauteur -->
      <span class="opacity-0">Bienvenue sur FullStudy</span>

      <!-- Texte animé positionné en absolu pour éviter le reflow -->
      <span class="absolute top-0 left-0" x-text="displayed"></span>
    </h1>

        <p class="text-xl md:text-2xl text-red-100 mb-8 text-left">
          Découvrez nos services et profitez de nos offres exceptionnelles.
        </p>
        <a
          href="{{ route('register') }}"
          class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 inline-block"
          >Commencez dès maintenant</a
        >
      </div>
    </header>

    <!-- Section Fonctionnalités avec images -->
    <section id="features" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
          <h2 class="text-center text-3xl font-bold mb-12 text-red-600">
            Nos Services
          </h2>
          <p class="text-center text-xl font-semibold text-red-600">
            Accédez à nos différentes formations dans les filières professionnelles appliquées à l'informatique.
          </p>
          <br>
          <div class="flex flex-nowrap space-x-4 overflow-x-auto">
            <!-- Carte 1 : Secrétariat Informatique -->
            <div class="min-w-[300px] bg-gray-100 rounded-lg overflow-hidden shadow-md">
              <img
                src="/img/secretariat.jpg"
                alt="Secrétariat Informatique"
                class="w-full h-40 object-cover"
              />
              <div class="p-6 text-center">
                <h3 class="text-xl font-semibold mb-4 text-red-500">
                  Secrétariat Informatique
                </h3>
                <p>
                  Formez-vous aux méthodes administratives modernes, alliant techniques bureautiques et communication digitale, pour gérer efficacement l'administration d'une entreprise.
                </p>
              </div>
            </div>

            <!-- Carte 2 : Développement Web -->
            <div class="min-w-[300px] bg-gray-100 rounded-lg overflow-hidden shadow-md">
              <img
                src="/img/developpement.jpg"
                alt="Développement Web"
                class="w-full h-40 object-cover"
              />
              <div class="p-6 text-center">
                <h3 class="text-xl font-semibold mb-4 text-red-500">
                  Développement Web
                </h3>
                <p>
                  Maîtrisez la conception et le développement de sites web dynamiques et responsives en apprenant HTML, CSS, JavaScript et les frameworks modernes.
                </p>
              </div>
            </div>

            <!-- Carte 3 : Infographie et Web Design -->
            <div class="min-w-[300px] bg-gray-100 rounded-lg overflow-hidden shadow-md">
              <img
                src="/img/infographie.jpg"
                alt="Infographie et Web Design"
                class="w-full h-40 object-cover"
              />
              <div class="p-6 text-center">
                <h3 class="text-xl font-semibold mb-4 text-red-500">
                  Infographie et Web Design
                </h3>
                <p>
                  Apprenez à créer des visuels percutants et des interfaces attrayantes pour le web grâce à une formation alliant principes graphiques et maîtrise des outils de design.
                </p>
              </div>
            </div>

            <!-- Carte 4 : Maintenance Informatique -->
            <div class="min-w-[300px] bg-gray-100 rounded-lg overflow-hidden shadow-md">
              <img
                src="/img/maintenance.jpg"
                alt="Maintenance Informatique"
                class="w-full h-40 object-cover"
              />
              <div class="p-6 text-center">
                <h3 class="text-xl font-semibold mb-4 text-red-500">
                  Maintenance Informatique
                </h3>
                <p>
                  Devenez expert en support technique et maintenance des infrastructures informatiques, afin d'assurer une continuité opérationnelle dans des environnements professionnels exigeants.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- Section Tarification avec bannière d'image -->
    <section id="pricing" class="py-16 bg-gray-100">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-12 text-red-600">
          Tarification
        </h2>
        <div class="flex flex-col md:flex-row justify-center items-center gap-8">
          <div class="bg-white shadow rounded-lg p-8 w-full md:w-1/3 text-center">
            <h3 class="text-xl font-semibold mb-4 text-red-600">Basique</h3>
            <p class="text-4xl font-bold mb-4">5000FCFA</p>
            <ul class="mb-6">
              <li>Acces aux formations pour une duree de <br> 1 mois</li>
            </ul>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
              Choisir
            </button>
          </div>
          <div class="bg-white shadow rounded-lg p-8 w-full md:w-1/3 text-center border-2 border-blue-500">
            <h3 class="text-xl font-semibold mb-4 text-red-600">Premium</h3>
            <p class="text-4xl font-bold mb-4">21500FCFA</p>
            <ul class="mb-6">
                <li>Acces aux formations pour une duree de <br> 3 mois</li>
            </ul>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
              Choisir
            </button>
          </div>
          <div class="bg-white shadow rounded-lg p-8 w-full md:w-1/3 text-center">
            <h3 class="text-xl font-semibold mb-4 text-red-600">Pro</h3>
            <p class="text-4xl font-bold mb-4">35000FCFA</p>
            <ul class="mb-6">
                <li>Acces aux formations pour une duree de <br> 9 mois</li>
            </ul>
            <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
              Choisir
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Galerie -->
    <section id="temoignages" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
          <h2 class="text-center text-3xl font-bold mb-12 text-red-600">
            Témoignages d'étudiants CFPC
          </h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Témoignage 1 -->
            <div class="relative group overflow-hidden rounded-lg shadow-md">
              <img
                src="/img/temoignage1.jpg"
                alt="Témoignage 1"
                class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
              />
              <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                <p class="text-white text-lg font-semibold text-center mb-2">
                  "Mon expérience au CFPC a transformé ma vision de l'avenir. Les cours étaient innovants et les professeurs passionnés m'ont vraiment inspirée."
                </p>
                <span class="text-white font-bold">- Alice Dupont</span>
              </div>
            </div>

            <!-- Témoignage 2 -->
            <div class="relative group overflow-hidden rounded-lg shadow-md">
              <img
                src="/img/temoignage2.jpg"
                alt="Témoignage 2"
                class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
              />
              <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                <p class="text-white text-lg font-semibold text-center mb-2">
                  "Étudier au CFPC m'a permis d'acquérir des compétences essentielles et de booster ma carrière. Un cadre d'excellence et d'innovation."
                </p>
                <span class="text-white font-bold">- Pierre Martin</span>
              </div>
            </div>

            <!-- Témoignage 3 -->
            <div class="relative group overflow-hidden rounded-lg shadow-md">
              <img
                src="/img/temoignage3.jpg"
                alt="Témoignage 3"
                class="w-full h-64 object-cover transition-transform duration-300 group-hover:scale-105"
              />
              <div class="absolute inset-0 bg-black bg-opacity-60 flex flex-col justify-center items-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 p-4">
                <p class="text-white text-lg font-semibold text-center mb-2">
                  "Le CFPC m'a donné les outils et la confiance nécessaires pour réussir dans le monde professionnel. Une expérience inoubliable."
                </p>
                <span class="text-white font-bold">- Sophie Caron</span>
              </div>
            </div>
          </div>
        </div>
      </section>



    <!-- Section Contact -->
    <section id="contact" class="py-16 bg-gradient-to-br from-gray-200 to-red-100">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-center text-3xl font-bold mb-12 text-red-600">Contactez-nous</h2>
        <div class="flex flex-col md:flex-row gap-8 items-center">
          <div class="md:w-1/2">
            <form class="w-full">
              <div class="mb-4">
                <label for="name" class="block text-red-700">Nom</label>
                <input
                  type="text"
                  id="name"
                  placeholder="Votre nom"
                  class="mt-2 w-full p-3 border border-blue-300 rounded"
                />
              </div>
              <div class="mb-4">
                <label for="email" class="block text-red-700">Email</label>
                <input
                  type="email"
                  id="email"
                  placeholder="Votre email"
                  class="mt-2 w-full p-3 border border-blue-300 rounded"
                />
              </div>
              <div class="mb-4">
                <label for="message" class="block text-red-700">Message</label>
                <textarea
                  id="message"
                  rows="5"
                  placeholder="Votre message"
                  class="mt-2 w-full p-3 border border-blue-300 rounded"
                ></textarea>
              </div>
              <button
                type="submit"
                class="bg-red-500 hover:bg-red-600 text-white font-bold py-3 px-6 rounded-full w-full"
              >
                Envoyer
              </button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal d'inscription -->
        <div class="bg-white p-8 rounded-lg shadow-lg relative max-w-md w-full">
          <h3 class="text-2xl font-bold mb-4 text-red-600">Inscrivez-vous</h3>
      <div class="fixed bottom-10 right-10">
        <a
          class="bg-red-500 hover:bg-red-600 text-white p-4 rounded-full shadow-lg focus:outline-none"
          href="{{ route('register') }}"
        >
          Inscription rapide
      </a>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-red-600 text-white py-8">
      <div class="max-w-7xl mx-auto px-4 text-center">
        <p>&copy; 2023 Votre Entreprise. Tous droits réservés.</p>
      </div>
    </footer>
  </body>
</html>
