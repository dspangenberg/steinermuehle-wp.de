<header class="banner">
<x-container class="h-20 flex items-center justify-between">
  <a class="brand" href="{{ home_url('/') }}">
    <img src="{{ get_theme_file_uri('resources/images/steinermuehle-de-logo.png') }}"  alt="Logo Steinermühle " class="h-12 shadow border rounded-full mx-2">
  </a>

  @if (has_nav_menu('primary_navigation'))
    <nav class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
      {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    </nav>
  @endif
</x-container>
</header>
