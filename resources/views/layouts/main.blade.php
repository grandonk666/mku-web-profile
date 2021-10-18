<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Rizal Grandonk">
  @yield("meta")

  <link rel="apple-touch-icon" sizes="180x180"
    href="{{ asset('icons/apple-touch-icon.png') }}?v=2" />
  <link rel="icon" type="image/png" sizes="32x32"
    href="{{ asset('icons/favicon-32x32.png') }}?v=2" />
  <link rel="icon" type="image/png" sizes="16x16"
    href="{{ asset('icons/favicon-16x16.png') }}?v=2" />
  <link rel="manifest" href="{{ asset('icons/site.webmanifest') }}?v=2" />
  <link rel="mask-icon" href="{{ asset('icons/safari-pinned-tab.svg') }}?v=2"
    color="#5bbad5" />
  <link rel="shortcut icon" href="{{ asset('icons/favicon.ico') }}?v=2" />
  <meta name="msapplication-TileColor" content="#2b5797" />
  <meta name="msapplication-config"
    content="{{ asset('icons/browserconfig.xml') }}?v=2" />
  <meta name="theme-color" content="#ffffff" />

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap');

    html {
      scroll-behavior: smooth;
    }

    .font-family-merri {
      font-family: Merriweather;
    }

    trix-toolbar [data-trix-button-group="file-tools"] {
      display: none;
    }

    .attachment--pdf a::before {
      content: "Buka File";
    }

    .attachment--pdf a:hover {
      color: #4656ec
    }

    .attachment--pdf a {
      text-decoration: none;
      font-size: 1.3rem;
      font-weight: 300;
      margin: 0;
    }

    .attachment--pdf .attachment__name {
      font-size: 1.2rem;
    }

    .attachment--pdf .attachment__name:hover {
      color: #4656ec;
    }

    .attachment--pdf .attachment__caption {
      margin: 0;
    }

  </style>
</head>

<body class="bg-gray-100 font-family-merri">
  @include("layouts.preloader")

  @include("layouts.header")

  <div class="w-full">
    @yield("content")
  </div>

  @include("layouts.footer")

  <a href="#" id="back-to-top"
    class="w-12 h-12 flex justify-center items-center fixed bottom-3 right-3 rounded-full bg-gray-700 text-2xl text-white transition-all">
    <i class="fas fa-arrow-up"></i>
  </a>

  <script>
    const togleNavbar = () => {
      const flex = document.querySelector(".mobile-menu")
      flex.classList.toggle("hidden")
    };

    const togleDropdown = () => {
      const menu = document.querySelector(".dropdown-menu")
      menu.classList.toggle("hidden")
    };

    const preloader = document.querySelector("#preloader")
    if (preloader) {
      window.addEventListener("load", () => {
        preloader.classList.add("hidden")
      });
    }

    let backToTop = document.querySelector("#back-to-top");
    if (backToTop) {
      const toggleBacktotop = () => {
        if (window.scrollY > 100) {
          backToTop.classList.remove("hidden");
          backToTop.classList.remove("opacity-0");
        } else {
          backToTop.classList.add("hidden");
          backToTop.classList.add("opacity-0");
        }
      };
      window.addEventListener("load", toggleBacktotop);
      document.addEventListener("scroll", toggleBacktotop)
    }
  </script>

  @yield("script")

  <!-- Font Awesome -->
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs="
    crossorigin="anonymous"></script>
</body>

</html>
