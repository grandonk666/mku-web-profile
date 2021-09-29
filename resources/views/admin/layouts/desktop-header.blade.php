<header class="w-full items-center bg-white py-4 px-6 hidden sm:flex">
  <div class="w-1/2"></div>
  <div class="relative w-1/2 flex justify-end">
      <button onclick="togleDropdown()" class="realtive z-10  overflow-hidden focus:outline-none">
          {{-- <img src="{{ asset("storage/foto-dosen/foto-default.jpg") }}" class="object-cover w-12 h-12 rounded-full"> --}}
          <span class="text-xl">{{ auth()->user()->name }}</span> 
      </button>
      {{-- <button class="h-full w-full fixed inset-0 cursor-default"></button> --}}
      <div class="account-dropdown hidden absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
          <a href="#" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Account</a>
          <a href="{{ route("logout") }}" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Sign Out</a>
      </div>
  </div>
</header>