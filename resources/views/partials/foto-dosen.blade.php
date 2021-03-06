<div class="{{ $class }} p-2 bg-white rounded shadow-md mb-8">
  <div class="aspect-h-10 aspect-w-9 rounded overflow-hidden mb-4">
    @if ($dosen->foto)
      <img src="{{ asset('storage/' . $dosen->foto) }}"
        alt="{{ $dosen->nama }}"
        class="img-preview mb-2 object-center object-cover">
    @else
      <img src="{{ asset('storage/foto-dosen/foto-default.jpg') }}"
        alt="{{ $dosen->nama }}"
        class="img-preview mb-2 object-center object-cover">
    @endif
  </div>
  <div class="px-2">
    <p class="text-sm font-bold">{{ $dosen->nama }}</p>
    @if ($keterangan)
      <span class="text-sm text-gray-700"> - {{ $keterangan }}</span>
    @endif
  </div>
</div>
