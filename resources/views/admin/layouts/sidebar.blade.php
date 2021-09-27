<aside class="relative bg-gray-700 h-screen w-80 hidden sm:block shadow-xl">
    <div class="p-4 border-b border-gray-500">
        <a href="{{ route("admin.index") }}" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Admin</a>
    </div>
    <nav class="text-white text-sm font-semibold pt-3">
        <a href="{{ route("admin.post.index") }}" class="flex items-center py-4 pl-4 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "post") > -1 ? "bg-white text-gray-800" : "text-white" }}">
            <i class="fas fa-newspaper mr-3"></i>
            Berita & Pengumuman
        </a>
        <a href="{{ route("admin.struktur.index") }}" class="flex items-center py-4 pl-4 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "struktur") > -1 ? "bg-white text-gray-800" : "text-white" }}">
            <i class="fas fa-sitemap mr-3"></i>
            Struktur Organisasi
        </a>
        <a href="{{ route("admin.dosen.index") }}" class="flex items-center py-4 pl-4 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "dosen") > -1 ? "bg-white text-gray-800" : "text-white" }}">
            <i class="fas fa-user-tie mr-3"></i>
            Data Dosen
        </a>
        <a href="{{ route("admin.matakuliah.index") }}" class="flex items-center py-4 pl-4 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "matakuliah") > -1 ? "bg-white text-gray-800" : "text-white" }}">
            <i class="fas fa-book mr-3"></i>
            Data Matakuliah
        </a>
    </nav>
</aside>