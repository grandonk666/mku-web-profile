<header class="w-full items-center bg-white py-4 px-6 hidden md:flex">
    <div class="relative group ml-auto">
        <button class="realtive z-10 overflow-hidden focus:outline-none px-2">
            {{-- <img src="{{ asset("storage/foto-dosen/foto-default.jpg") }}"
            class="object-cover w-12 h-12 rounded-full"> --}}
            <span class="text-lg">{{ auth()->user()->name }}</span>
            <i class="fas fa-angle-down ml-2"></i>
        </button>
        {{-- <button class="h-full w-full fixed inset-0 cursor-default"></button> --}}
        <div
            class="hidden group-hover:block right-0 top-6 absolute w-52 bg-white rounded-lg shadow-lg py-4">
            <a href="{{ route("home") }}"
                class="block px-4 py-2 hover:bg-gray-700 hover:text-white"><i
                    class="fas fa-home mr-3"></i>Halaman Home</a>
            <a href="{{ route("logout") }}"
                class="block px-4 py-2 hover:bg-gray-700 hover:text-white"><i
                    class="fas fa-sign-out-alt mr-3"></i> Logout</a>
        </div>
    </div>
</header>