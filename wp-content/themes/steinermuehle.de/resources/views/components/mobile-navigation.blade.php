{{-- Mobile Hamburger Button --}}
<button
  @click="mobileMenuOpen = !mobileMenuOpen"
  class="md:hidden text-black p-2 focus:outline-none"
  aria-label="Menu"
>
  <svg x-show="!mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
  </svg>
  <svg x-show="mobileMenuOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
  </svg>
</button>

{{-- Mobile Menu --}}
<div
  x-show="mobileMenuOpen"
  x-cloak
  x-data="{ openSubmenu: null }"
  @click.away="mobileMenuOpen = false"
  x-transition:enter="transition ease-out duration-200"
  x-transition:enter-start="opacity-0 transform -translate-y-2"
  x-transition:enter-end="opacity-100 transform translate-y-0"
  x-transition:leave="transition ease-in duration-150"
  x-transition:leave-start="opacity-100 transform translate-y-0"
  x-transition:leave-end="opacity-0 transform -translate-y-2"
  class="md:hidden absolute top-20 left-0 right-0 bg-white border-b h-screen shadow-lg z-40"
>
  <nav class="px-6 py-4">
    <ul class="space-y-1">
      <li>
        <div>
          <button
            @click="openSubmenu = openSubmenu === 'steinermuehle' ? null : 'steinermuehle'"
            class="flex items-center justify-between w-full py-3 text-lg font-medium text-neutral-700 hover:text-neutral-900"
          >
            Die Steinermühle
            <svg
              class="w-5 h-5 transition-transform"
              :class="{ 'rotate-180': openSubmenu === 'steinermuehle' }"
              fill="none" stroke="currentColor" viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <ul
            x-show="openSubmenu === 'steinermuehle'"
            x-transition
            class="pl-4 mt-2 space-y-2"
          >
            @query([
              'post_type' => 'page',
              'post_parent' => 27,
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order' => 'ASC'
            ])
            @posts
            <li>
              <a href="@permalink" class="block py-2 text-base text-neutral-600 hover:text-neutral-900">@title</a>
            </li>
            @endposts
          </ul>
        </div>
      </li>
      <li>
        <div>
          <button
            @click="openSubmenu = openSubmenu === 'erlebnis' ? null : 'erlebnis'"
            class="flex items-center justify-between w-full py-3 text-lg font-medium text-neutral-700 hover:text-neutral-900"
          >
            Erlebnis Steinermühle
            <svg
              class="w-5 h-5 transition-transform"
              :class="{ 'rotate-180': openSubmenu === 'erlebnis' }"
              fill="none" stroke="currentColor" viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <ul
            x-show="openSubmenu === 'erlebnis'"
            x-transition
            class="pl-4 mt-2 space-y-2"
          >
            @query([
              'post_type' => 'page',
              'post_parent' => 33,
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order' => 'ASC'
            ])
            @posts
            <li>
              <a href="@permalink" class="block py-2 text-base text-neutral-600 hover:text-neutral-900">@title</a>
            </li>
            @endposts
          </ul>
        </div>
      </li>
      <li>
        <div>
          <button
            @click="openSubmenu = openSubmenu === 'ferienwohnungen' ? null : 'ferienwohnungen'"
            class="flex items-center justify-between w-full py-3 text-lg font-medium text-neutral-700 hover:text-neutral-900"
          >
            Ferienwohnungen
            <svg
              class="w-5 h-5 transition-transform"
              :class="{ 'rotate-180': openSubmenu === 'ferienwohnungen' }"
              fill="none" stroke="currentColor" viewBox="0 0 24 24"
            >
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <ul
            x-show="openSubmenu === 'ferienwohnungen'"
            x-transition
            class="pl-4 mt-2 space-y-2"
          >
            @query([
              'post_type' => 'page',
              'post_parent' => 10,
              'posts_per_page' => -1,
              'orderby' => 'menu_order',
              'order' => 'ASC'
            ])
            @posts
            <li>
              <a href="@permalink" class="block py-2 text-base text-neutral-600 hover:text-neutral-900">@title</a>
            </li>
            @endposts
          </ul>
        </div>
      </li>
      <li><a href="/umgebung" class="block py-3 text-lg font-medium text-neutral-700 hover:text-neutral-900">Umgebung</a></li>
      <li><a href="/gaestestimmen" class="block py-3 text-lg font-medium text-neutral-700 hover:text-neutral-900">Gästestimmen</a></li>
      <li><a href="/anfahrt-kontakt" class="block py-3 text-lg font-medium text-neutral-700 hover:text-neutral-900">Anfahrt + Kontakt</a></li>
    </ul>
  </nav>
</div>
