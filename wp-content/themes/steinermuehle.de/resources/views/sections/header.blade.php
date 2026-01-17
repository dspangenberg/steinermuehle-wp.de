<header class="banner" x-data="{ mobileMenuOpen: false }">
<x-container class="h-20 flex items-center justify-between">
  <a class="brand" href="{{ home_url('/') }}">
    <img src="{{ get_theme_file_uri('resources/images/steinermuehle-de-logo.png') }}"  alt="Logo Steinermühle " class="h-12 shadow border rounded-full">
  </a>

  {{-- Desktop Navigation --}}
  <x-navigation />

  {{-- Mobile Navigation --}}
  <x-mobile-navigation />
</x-container>
</header>
