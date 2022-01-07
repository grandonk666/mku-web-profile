<a href="{{ $route }}"
  class="block w-full md:w-[48%] px-4 pt-3 pb-2 bg-white rounded shadow-md relative hover:shadow-lg transition-all group">
  <span
    class="w-16 h-16 rounded-full absolute right-6 -top-8 bg-white flex justify-center items-center border-8 border-gray-100 text-2xl text-gray-700 group-hover:scale-110 transition-all">
    <i class="fas {{ $icon }}"></i>
  </span>
  <p class="text-sm font-bold py-1 border-b-2 border-gray-200">
    {{ $headerText }}
  </p>
  <h2 class="text-xl font-light py-1">
    {{ $bodyText }}
  </h2>
</a>
