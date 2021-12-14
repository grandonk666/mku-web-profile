<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rizal Grandonk">
    {{-- @yield("meta") --}}

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
      @import url('https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;400;500;600;700&display=swap');

      html {
        scroll-behavior: smooth;
      }

      .font-family-roboto {
        font-family: 'Roboto Slab', serif;
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
        font-size: 1rem;
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

  <body class="bg-gray-100 font-family-roboto">
  @include("layouts.preloader")

    <div class="w-full h-screen flex justify-center items-center bg-gray-300">
      <section class="w-full sm:w-3/4 lg:w-2/3 h-[600px] flex items-stretch shadow-lg rounded-lg text-black overflow-hidden">
        <div class="lg:flex w-1/2 hidden bg-no-repeat bg-cover relative items-center"
          style="background-image: url({{ asset("home-hero.jpg") }});">
          <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
          <div class="w-full px-8 z-10 text-white">
            <h1 class="text-4xl font-bold text-left tracking-wide">Matakuliah Umum
            </h1>
            <p class="text-2xl my-4">UPN "Veteran" Jawa Timur</p>
          </div>
        </div>
        <div
          class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-8 px-4 z-0 bg-white">
          <div
            class="absolute lg:hidden z-10 inset-0 bg-no-repeat bg-cover items-center"
            style="background-image: url({{ asset("home-hero.jpg") }});">
            <div class="absolute bg-black/60 inset-0 z-0"></div>
          </div>
          <div class="w-full py-6 z-20 bg-white/80 rounded-md">
            <h1 class="text-5xl tracking-wider font-bold mb-8 text-gray-700 uppercase">
              Login
            </h1>
            @if (session()->has("login-error"))
            <div class="w-full bg-red-200 p-2 text-red-900 my-6 rounded">
              {{ session("login-error") }}
            </div>
            @endif
            <form action="{{ route("authenticate") }}" method="POST"
              class="w-full px-4 lg:px-0 mx-auto">
              @csrf

              <div class="w-full py-8">
                <div class="relative mb-8">
                  <input id="email" type="email" name="email"
                    class="peer h-10 w-full border-b-2 text-gray-900 placeholder-transparent focus:outline-none focus:border-gray-500 bg-transparent @error("
                    email") border-red-500 @enderror" placeholder="Email Address" />
                  <label for=email
                    class="absolute left-0 -top-5 text-gray-800 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-gray-800 peer-focus:text-sm">
                    Email
                  </label>
                  @error("email")
                  <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                  @enderror
                </div>
                <div class="relative mb-8">
                  <input id="password" type="password" name="password"
                    class="peer h-10 w-full border-b-2 text-gray-900 placeholder-transparent focus:outline-none focus:border-gray-500 bg-transparent @error("
                    password") border-red-500 @enderror" placeholder="Password" />
                  <label for=password
                    class="absolute left-0 -top-5 text-gray-800 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-600 peer-placeholder-shown:top-2 peer-focus:-top-5 peer-focus:text-gray-800 peer-focus:text-sm">
                    Password
                  </label>
                  @error("password")
                  <span class="text-xs font-bold text-red-500">{{ $message }}</span>
                  @enderror
                </div>

                <div class="px-4 pb-2 pt-4">
                  <button
                    class="uppercase block w-full p-4 text-lg rounded-lg text-white bg-gray-700 hover:bg-gray-800 focus:outline-none">Login</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </section>
    </div>

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs="
    crossorigin="anonymous"></script>

    <script>

      const preloader = document.querySelector("#preloader")
      if (preloader) {
        window.addEventListener("load", () => {
        preloader.classList.add("hidden")
      });
      }

    </script>

  </body>

</html>