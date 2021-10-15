<title>{{ $title }} | MKU</title>
<meta property="og:title" content="{{ $title }} | MKU" />
<meta name="twitter:title" content="{{ $title }} | MKU" />

<meta name="description"
  content="{{ $description }}">
<meta property="og:description"
  content="{{ $description }}" />
<meta name="twitter:description"
  content="{{ $description }}" />

<meta name="image" content="{{ $image }}" />
<meta property="og:image" content="{{ $image }}" />
<meta name="twitter:image" content="{{ $image }}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@site" />
<meta name="twitter:creator" content="@handle" />

<meta property="og:url" content={{ Request::fullUrl() }} />
<meta property="og:site_name" content='MKU UPN "Veteran" Jawa Timur' />

<meta name="keywords"
  content="{{ $keywords }}" />
<link rel="canonical" href="{{ Request::fullUrl() }}" />

@isset($article)
<meta property="og:type" content="article" />
@endisset