<footer class="w-full  bg-gray-300">
  <div class="border-b border-gray-400">
    <div
      class="container mx-auto flex flex-col lg:flex-row justify-between gap-8 py-8">
      <div class="px-4">
        <div class="h-20 py-2 flex items-center gap-3">
          <img src="{{ asset('UPN.png') }}" alt="Logo"
            class="h-full" />
          <div class="text-black font-bold pt-2">
            <p class="text-2xl leading-none">MKU</p>
            <span class="leading-none text-lg">UPN "Veteran" Jawa Timur</span>
          </div>
        </div>
        <address class="text-gray-600 mb-2">
          <p>Jl. Raya Rungkut Madya</p>
          <p>Gunung Anyar, Surabaya</p>
        </address>
        <div class="flex items-center gap-3">
          <a class="block h-10" href="https://instagram.com"
            target="_blank">
            <img src="{{ asset('ig.svg') }}" alt="instagram"
              class="h-full">
          </a>
          <a class="block h-10" href="https://facebook.com" target="_blank">
            <img src="{{ asset('fb.svg') }}" alt="facebook"
              class="h-full">
          </a>
        </div>
      </div>
      <div class="px-4 text-center">
        <h3 class="text-2xl font-bold mb-2 text-black">Navigasi</h3>
        <ul class="text-gray-600 lg:text-right flex flex-col gap-1">
          <li><a href="{{ route('profil') }}/#visi-misi"
              class="hover:text-gray-800">Visi & Misi</a></li>
          <li><a href="{{ route('post.index', ['kategori' => 'berita']) }}"
              class="hover:text-gray-800">Berita</a></li>
          <li><a
              href="{{ route('post.index', ['kategori' => 'pengumuman']) }}"
              class="hover:text-gray-800">Pengumuman</a></li>
          {{-- <li><a href="#" class="hover:text-gray-800">Kontak</a></li> --}}
        </ul>
      </div>
    </div>
  </div>
  <div class="text-center py-6 text-gray-600">&copy; MKU UPN "Veteran" Jawa
    Timur</div>
</footer>
