<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | MKU</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap');
        .font-family-merri { font-family: Merriweather; }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 font-family-merri">


    <header>
      <nav class="w-full h-16 bg-gray-600 fixed flex justify-between items-center z-10">
        <img src="{{ asset("nav-logo.svg") }}" alt="Logo" class="h-full" />
        <ul class="flex justify-between text-white font-bold uppercase text-sm pr-12 w-1/2">
          <li>
            <a href="#" class="hover:text-gray-200">Profil</a>
          </li>
          <li>
            <a href="#" class="hover:text-gray-200">Struktur Organisasi</a>
          </li>
          <li>
            <a href="#" class="hover:text-gray-200">Daftar Dosen</a>
          </li>
          <li>
            <a href="#" class="hover:text-gray-200">Matakuliah</a>
          </li>
        </ul>
      </nav>
    </header>

    <div class="w-full">
      @yield("content")
    </div>

    <footer class="w-full  bg-gray-300">
      <div class="container mx-auto flex justify-between py-8">
        <div>
          <img src="{{ asset("logo.svg") }}" alt="Logo" class="w-72">
        </div>
        <div>
          <h3 class="text-3xl font-bold text-black">Navigasi</h3>
        </div>
      </div>
    </footer>

    @yield("script")
    
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>