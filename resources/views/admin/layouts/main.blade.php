<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} | Admin MKU</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    {{-- <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset("css/app.css") }}">
    <link rel="stylesheet" href="{{ asset("css/trix.css") }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300;400;700;900&display=swap');
        .font-family-merri { font-family: Merriweather; }

        trix-toolbar [data-trix-button-group="file-tools"] {
            display: none;
        }
    </style>
</head>
<body class="bg-gray-100 font-family-merri flex">

    @include("admin.layouts.sidebar")

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
        <!-- Desktop Header -->
        @include("admin.layouts.desktop-header")

        <!-- Mobile Header & Nav -->
        @include("admin.layouts.mobile-header")
    
        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow py-6 px-10">
                <h1 class="text-4xl text-black mb-8">{{ $title }}</h1>
                @yield("content")
            </main>
    
            <footer class="w-full bg-white text-right p-4">
                Copyright
            </footer>
        </div>
        
    </div>

    <!-- CKEditor -->
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script> --}}


    <script>
      const togleDropdown = () => {
        const dropdown = document.querySelector(".account-dropdown")
        dropdown.classList.toggle("hidden")
      }

      const togleNavbar = () => {
        const flex = document.querySelector(".navbar")
        flex.classList.toggle("hidden")
        flex.classList.toggle("flex")
      }
    </script>

    @yield("script")
    
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>