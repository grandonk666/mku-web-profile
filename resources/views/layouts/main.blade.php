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
<body class="bg-white font-family-merri">

  @include("layouts.header")

  <div class="w-full">
    @yield("content")
  </div>

  @include("layouts.footer")

  <script>
      const togleNavbar = () => {
        const flex = document.querySelector(".mobile-menu")
        flex.classList.toggle("hidden")
      };
  </script>

  @yield("script")
    
    <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>