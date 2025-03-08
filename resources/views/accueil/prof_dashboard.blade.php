
<x-defaultprof-layout>
    <!-- Contenu - Main -->
      <!-- Section Statistiques -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Statistiques</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
          <div class="bg-white shadow rounded-lg p-6 border-l-4 border-red-600">
            <h3 class="text-gray-600">Nombre de Devoirs generé</h3>
            <p class="mt-2 text-2xl font-bold">12</p>
          </div>
          <div class="bg-white shadow rounded-lg p-6 border-l-4 border-red-600">
            <h3 class="text-gray-600">Devoirs en Cours</h3>
            <p class="mt-2 text-2xl font-bold">3</p>
          </div>
          <div class="bg-white shadow rounded-lg p-6 border-l-4 border-red-600">
            <h3 class="text-gray-600">Devoirs Terminé</h3>
            <p class="mt-2 text-2xl font-bold">5</p>
          </div>
          <div class="bg-white shadow rounded-lg p-6 border-l-4 border-red-600">
            <h3 class="text-gray-600">Heures Total </h3>
            <p class="mt-2 text-2xl font-bold">45h</p>
          </div>
        </div>
      </section>

      <!-- Section Activité Récente -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Activité Récente</h2>
        <div class="bg-white shadow rounded-lg p-6">
          <ul class="space-y-3">
            <li class="border-b pb-2 border-gray-300">
              Vous avez complété le module 3 du cours "Introduction au Management".
            </li>
            <li class="border-b pb-2 border-gray-300">
              Nouveau message de votre formateur Jean D.
            </li>
            <li>
              Le cours "Techniques de Vente" a été mis à jour.
            </li>
          </ul>
        </div>
      </section>

      <!-- Section Prochains Délais -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Prochains Délais</h2>
        <div class="bg-white shadow rounded-lg p-6">
          <ul class="space-y-3">
            <li class="border-b pb-2 border-gray-300">
              Examen du cours "Marketing Digital" - <span class="font-medium">25/09/2023</span>
            </li>
            <li>
              Projet final du cours "Gestion de Projet" - <span class="font-medium">05/10/2023</span>
            </li>
          </ul>
        </div>
      </section>

      <!-- Section Mes Cours -->
      <section class="mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Mes Devoirs</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

          <!-- Exemple de carte de cours -->
          <div class="bg-white shadow rounded-lg overflow-hidden">
            <img
              src="https://via.placeholder.com/600x200"
              alt="Cours"
              class="w-full h-32 object-cover"
            />
            <div class="p-4">
              <h3 class="font-semibold text-gray-800">Introduction au Management</h3>
              <p class="text-gray-600 text-sm mt-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
              <button class="mt-4 w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                Continuer le cours
              </button>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg overflow-hidden">
            <img
              src="https://via.placeholder.com/600x200"
              alt="Cours"
              class="w-full h-32 object-cover"
            />
            <div class="p-4">
              <h3 class="font-semibold text-gray-800">Techniques de Vente</h3>
              <p class="text-gray-600 text-sm mt-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
              <button class="mt-4 w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                Continuer le cours
              </button>
            </div>
          </div>
          <div class="bg-white shadow rounded-lg overflow-hidden">
            <img
              src="https://via.placeholder.com/600x200"
              alt="Cours"
              class="w-full h-32 object-cover"
            />
            <div class="p-4">
              <h3 class="font-semibold text-gray-800">Marketing Digital</h3>
              <p class="text-gray-600 text-sm mt-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
              </p>
              <button class="mt-4 w-full bg-red-600 text-white py-2 rounded hover:bg-red-700">
                Commencer
              </button>
            </div>
          </div>
        </div>
      </section>
</x-defaultprof-layout>

    <!-- Footer -->

