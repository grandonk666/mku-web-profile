<header class="fixed w-full z-10">
  <nav class="w-full h-16 bg-gray-600 flex justify-between items-center">
    <a href="{{ route("home") }}" class="h-full hidden lg:flex justify-center">
        <div class="h-full bg-white py-2 pl-4 lg:pl-8 flex justify-center items-center gap-3">
          <img src="{{ asset("UPN.png") }}" alt="Logo" class="h-full" />
          <div class="text-black font-bold pt-2">
            <p class="text-2xl leading-none">MKU</p>
            <p class="leading-none text-sm">UPN "Veteran" Jawa Timur</p>
          </div>
        </div>
        <svg class="h-full" viewBox="0 0 155 129" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M1 0H37.9438L155 129H1V0Z" fill="#C4C4C4"/>
          <path d="M0 0L117 129H0V0Z" fill="white"/>
        </svg>
    </a>

    <div class="h-full py-2 pl-4 lg:pl-8 lg:hidden flex justify-center items-center gap-3">
      <img src="{{ asset("UPN.png") }}" alt="Logo" class="h-full" />
      <div class="text-white font-bold pt-2">
        <p class="text-2xl leading-none">MKU</p>
        <p class="leading-none text-sm">UPN "Veteran" Jawa Timur</p>
      </div>
    </div>
    
    <ul class="hidden justify-between text-white font-bold uppercase text-sm pr-12 w-3/5 lg:flex">
      <li>
        <a href="{{ route("profil") }}" class="hover:text-gray-200">Profil</a>
      </li>
      <li>
        <a href="{{ route("struktur") }}" class="hover:text-gray-200">Struktur Organisasi</a>
      </li>
      <li>
        <a href="{{ route("dosen") }}" class="hover:text-gray-200">Daftar Dosen</a>
      </li>
      <li>
        <a href="{{ route("matakuliah") }}" class="hover:text-gray-200">Matakuliah</a>
      </li>
    </ul>

    <button onclick="togleNavbar()" class="text-white text-4xl pr-4 lg:hidden">
      <i class="fas fa-bars"></i>
    </button>
  </nav>
  <div class="mobile-menu bg-gray-600 text-white py-2 hidden">
    <a href="{{ route("profil") }}" class="flex items-center py-4 px-8 hover:bg-gray-400">
      <i class="fas fa-university mr-3"></i> Profil
    </a>
    <a href="{{ route("struktur") }}" class="flex items-center py-4 px-8 hover:bg-gray-400">
      <i class="fas fa-sitemap mr-3"></i> Struktur Organisasi
    </a>
    <a href="{{ route("dosen") }}" class="flex items-center py-4 px-8 hover:bg-gray-400">
      <i class="fas fa-user-tie mr-3"></i> Daftar Dosen
    </a>
    <a href="{{ route("matakuliah") }}" class="flex items-center py-4 px-8 hover:bg-gray-400">
      <i class="fas fa-book mr-3"></i> Matakuliah
    </a>
  </div>
</header>