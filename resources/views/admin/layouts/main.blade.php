<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Rizal Grandonk">

  <title>{{ $title }} | Admin MKU</title>
  <meta property="og:title" content="{{ $title }} | Admin MKU" />
  <meta name="twitter:title" content="{{ $title }} | Admin MKU" />

  <meta name="description"
    content="Admin Panel Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur">
  <meta property="og:description"
    content="Admin Panel Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur" />
  <meta name="twitter:description"
    content="Admin Panel Matakuliah Umum Universitas Pembangunan Nasional Veteran Jawa Timur" />

  <meta name="image" content="{{ asset('home-hero.jpg') }}" />
  <meta property="og:image" content="{{ asset('home-hero.jpg') }}" />
  <meta name="twitter:image" content="{{ asset('home-hero.jpg') }}" />

  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:site" content="@site" />
  <meta name="twitter:creator" content="@handle" />

  <meta property="og:url" content={{ Request::fullUrl() }} />
  <meta property="og:site_name" content='MKU UPN "Veteran" Jawa Timur' />

  <meta name="keywords" content="mku, admin, upn, jatim" />
  <link rel="canonical" href="{{ Request::fullUrl() }}" />

  <link rel="apple-touch-icon" sizes="180x180"
    href="{{ asset('icons/apple-touch-icon.png') }}?v=2">
  <link rel="icon" type="image/png" sizes="32x32"
    href="{{ asset('icons/favicon-32x32.png') }}?v=2">
  <link rel="icon" type="image/png" sizes="16x16"
    href="{{ asset('icons/favicon-16x16.png') }}?v=2">
  <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}?v=2">
  <link rel="mask-icon" href="{{ asset('icons/safari-pinned-tab.svg') }}?v=2"
    color="#5bbad5">
  <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}?v=2">
  <meta name="msapplication-TileColor" content="#2b5797">
  <meta name="msapplication-config"
    content="{{ asset('icons/browserconfig.xml') }}?v=2">
  <meta name="theme-color" content="#ffffff">

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/trix.css') }}">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700&display=swap');

    .font-family-roboto {
      font-family: 'Roboto Slab', serif;
    }

    /* trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        } */

  </style>
</head>

<body class="bg-gray-100 font-family-roboto flex">

  @include("admin.layouts.sidebar")

  <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    @include("admin.layouts.desktop-header")

    <!-- Mobile Header & Nav -->
    @include("admin.layouts.mobile-header")

    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
      <main class="w-full flex-grow py-6 px-4 md:px-10">
        <h1 class="text-4xl text-black mb-8">{{ $title }}</h1>
        @yield("content")
      </main>

      <footer class="w-full bg-white text-right p-4">
        Copyright
      </footer>
    </div>

  </div>

  <!-- Font Awesome -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs="
    crossorigin="anonymous">
  </script>

  <script>
    const togleDropdown = () => {
      const dropdown = document.querySelector(".dropdown-menu")
      dropdown.classList.toggle("hidden")
    };

    const togleNavbar = () => {
      const flex = document.querySelector(".navbar")
      flex.classList.toggle("hidden")
      flex.classList.toggle("flex")
    };
  </script>

  @yield("script")
</body>

</html>
