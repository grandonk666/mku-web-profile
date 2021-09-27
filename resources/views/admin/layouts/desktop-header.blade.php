<header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
  <div class="w-1/2"></div>
  <div class="relative w-1/2 flex justify-end">
      <button onclick="togleDropdown()" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
          <img src="{{ asset("storage/foto-dosen/foto-default.jpg") }}" class="object-cover w-full h-full">
      </button>
      {{-- <button class="h-full w-full fixed inset-0 cursor-default"></button> --}}
      <div class="account-dropdown hidden absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
          <a href="#" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Account</a>
          <a href="#" class="block px-4 py-2 hover:bg-gray-700 hover:text-white">Sign Out</a>
      </div>
  </div>
</header>