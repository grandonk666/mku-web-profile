<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Admin MKU</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap');
        .font-family-merri { font-family: Merriweather; }
    </style>
</head>
<body class="bg-gray-100 font-family-merri flex">

    <aside class="relative bg-gray-700 h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-4 border-b border-gray-500">
            <a href="index.html" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Admin</a>
        </div>
        <nav class="text-white text-sm font-semibold pt-3">
            <a href="/admin/struktur" class="flex items-center py-4 pl-3 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "struktur") > -1 ? "bg-white text-gray-800" : "text-white" }}">
                <i class="fas fa-sitemap mr-3"></i>
                Struktur Organisasi
            </a>
            <a href="/admin/dosen" class="flex items-center py-4 pl-3 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "dosen") > -1 ? "bg-white text-gray-800" : "text-white" }}">
                <i class="fas fa-user-tie mr-3"></i>
                Data Dosen
            </a>
            <a href="/admin/matakuliah" class="flex items-center py-4 pl-3 hover:bg-gray-300 hover:text-gray-800 {{ strpos(Route::currentRouteName(), "matakuliah") > -1 ? "bg-white text-gray-800" : "text-white" }}">
                <i class="fas fa-book mr-3"></i>
                Data Matakuliah
            </a>
        </nav>
    </aside>

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
            <div class="w-1/2"></div>
            <div class="relative w-1/2 flex justify-end">
                <button onclick="togleDropdown()" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                    <img src="https://source.unsplash.com/uJ8LNVCBjFQ/400x400">
                </button>
                {{-- <button class="h-full w-full fixed inset-0 cursor-default"></button> --}}
                <div class="account-dropdown hidden absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Account</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Sign Out</a>
                </div>
            </div>
        </header>

        <!-- Mobile Header & Nav -->
        <header class="w-full bg-gray-700 py-5 px-6 sm:hidden">
            <div class="flex items-center justify-between">
                <a href="index.html" class="text-white text-2xl font-semibold uppercase hover:text-gray-300">Admin</a>
                <button onclick="togleNavbar()" class="text-white text-2xl focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Dropdown Nav -->
            <nav class="navbar text-sm hidden flex-col pt-4">
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
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                @yield("content")
            </main>
    
            <footer class="w-full bg-white text-right p-4">
                Copyright
            </footer>
        </div>
        
    </div>

    <!-- AlpineJS -->
    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}

    <script>
      const togleDropdown = () => {
        const dropdown = document.querySelector(".account-dropdown")
        dropdown.classList.toggle("hidden")
      }
      const togleNavbar = () => {
        const flex = document.querySelector(".navbar")
        flex.classList.toggle("hidden")
        flex.classList.toggle("flex")
      }
      const previewImg = () => {
        const image = document.querySelector("#foto")
        const imgPreview = document.querySelector(".img-preview")
        
        imgPreview.style.display = 'block'
        const oFReader = new FileReader()
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result
        }
      }
    </script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>