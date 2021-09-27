<header class="w-full bg-gray-700 py-5 px-6 sm:hidden">
  <div class="flex items-center justify-between">
      <a href="index.html" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Admin</a>
      <button onclick="togleNavbar()" class="text-white text-2xl focus:outline-none">
          <i class="fas fa-bars"></i>
      </button>
  </div>

  <!-- Dropdown Nav -->
  <nav class="navbar text-sm hidden flex-col pt-4">
      <a href="/admin/post" class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
          <i class="fas fa-newspaper mr-3"></i>
          Berita & Pengumuman
      </a>
      <a href="/admin/struktur" class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
          <i class="fas fa-sitemap mr-3"></i>
          Struktur Organisasi
      </a>
      <a href="/admin/dosen" class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
          <i class="fas fa-user-tie mr-3"></i>
          Data Dosen
      </a>
      <a href="/admin/matakuliah" class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
          <i class="fas fa-book mr-3"></i>
          Data Matakuliah
      </a>
      <a href="#" class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
          <i class="fas fa-user mr-3"></i>
          My Account
      </a>
      <a href="#" class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
          <i class="fas fa-sign-out-alt mr-3"></i>
          Sign Out
      </a>
  </nav>
</header>