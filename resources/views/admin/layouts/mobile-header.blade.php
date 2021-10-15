<header class="w-full bg-gray-700 py-5 px-6 md:hidden">
    <div class="flex items-center justify-between">
        <a href="{{ route("admin.index") }}"
            class="h-12 flex justify-center items-center gap-3">
            <img src="{{ asset("UPN.png") }}" alt="Logo" class="h-full" />
            <div class="text-white font-bold pt-2">
                <p class="leading-none">MKU</p>
                <p class="leading-none text-sm">UPN "Veteran" Jawa Timur</p>
            </div>
        </a>
        <button onclick="togleNavbar()"
            class="text-white text-2xl focus:outline-none">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav class="navbar text-sm hidden flex-col pt-4">
        <a href="{{ route("admin.post.index") }}"
            class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
            <i class="fas fa-newspaper mr-3"></i>
            Berita & Pengumuman
        </a>
        <a href="{{ route("admin.struktur.index") }}"
            class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
            <i class="fas fa-sitemap mr-3"></i>
            Struktur Organisasi
        </a>
        <a href="{{ route("admin.dosen.index") }}"
            class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
            <i class="fas fa-user-tie mr-3"></i>
            Data Dosen
        </a>
        <a href="{{ route("admin.matakuliah.index") }}"
            class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
            <i class="fas fa-book mr-3"></i>
            Data Matakuliah
        </a>
        <a href="{{ route("home") }}"
            class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
            <i class="fas fa-home mr-3"></i>
            Halaman Home
        </a>
        <a href="{{ route("logout") }}"
            class="flex items-center text-white py-2 pl-4 hover:bg-gray-200 hover:text-gray-800">
            <i class="fas fa-sign-out-alt mr-3"></i>
            Logout
        </a>
    </nav>
</header>