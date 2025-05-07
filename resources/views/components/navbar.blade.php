<!-- NAVBAR -->
<nav class="bg-blue-900 shadow px-6 py-4 flex justify-between items-center sticky top-0 z-50">
  <div class="text-2xl font-bold text-white">AdoptMe</div>

  <ul class="flex space-x-6 text-gray-700 items-center">
    <li>
        <a href="/messages" class="hover:opacity-80 transition">
            <img src="{{ asset('images/pesan.png') }}" alt="Pesan" class="w-9 h-9">
        </a>
    </li>
    <li>
        <a href="/profile" class="hover:opacity-80 transition">
            <img src="{{ asset('images/profil.png') }}" alt="Profil" class="w-12 h-12">
        </a>
    </li>
  </ul>

</nav>