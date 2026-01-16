<nav x-data="{
navigationMenuOpen: false,
  navigationMenu: '',
  navigationMenuCloseDelay: 200,
  navigationMenuCloseTimeout: null,
  navigationMenuLeave() {
  let that = this;
  this.navigationMenuCloseTimeout = setTimeout(() => {
    that.navigationMenuClose();
  }, this.navigationMenuCloseDelay);
},
navigationMenuReposition(navElement) {
  this.navigationMenuClearCloseTimeout();
  if (this.navigationMenu === 'learn-more') {
    // Full width menu - center on viewport with fixed positioning
    const rect = navElement.getBoundingClientRect();
    this.$refs.navigationDropdown.style.position = 'fixed';
    this.$refs.navigationDropdown.style.left = '50%';
    this.$refs.navigationDropdown.style.transform = 'translateX(-50%)';
    this.$refs.navigationDropdown.style.marginLeft = '0px';
    // Small offset below the button
    this.$refs.navigationDropdown.style.top = (rect.bottom + 4) + 'px';
  } else {
    // Normal menu - position under button
    this.$refs.navigationDropdown.style.position = 'absolute';
    this.$refs.navigationDropdown.style.left = navElement.offsetLeft + 'px';
    this.$refs.navigationDropdown.style.marginLeft = (navElement.offsetWidth/2) + 'px';
    this.$refs.navigationDropdown.style.transform = 'translateX(-50%)';
    this.$refs.navigationDropdown.style.top = '100%';
  }
},
navigationMenuClearCloseTimeout(){
  clearTimeout(this.navigationMenuCloseTimeout);
},
navigationMenuClose(){
  this.navigationMenuOpen = false;
  this.navigationMenu = '';
}
}"
     class="relative z-50 w-auto mx-auto hidden md:flex text-left no-underline"
>
    <div class="relative">
        <ul
                class="flex flex-1 uppercase justify-center items-center p-1 space-x-1 list-none rounded-md text-neutral-700 group border-neutral-200/80"
        >
            <li>
                <button
                        :class="{ 'bg-neutral-100' : navigationMenu=='getting-started', 'hover:bg-neutral-100' : navigationMenu!='getting-started' }"
                        @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='getting-started'"
                        @mouseleave="navigationMenuLeave()"
                        class="inline-flex justify-center items-center uppercase px-4 py-2 w-max h-10 text-lg font-medium rounded-md transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none group"
                >
                    <span>Die Steinermühle</span>
                    <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'getting-started' }"
                         class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" aria-hidden="true"
                    >
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </li>
            <li>
                <button
                        :class="{ 'bg-neutral-100' : navigationMenu=='erlebnis', 'hover:bg-neutral-100' : navigationMenu!='erlebnis' }"
                        @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='erlebnis'"
                        @mouseleave="navigationMenuLeave()"
                        class="inline-flex justify-center items-center uppercase px-4 py-2 w-max h-10 text-lg font-medium rounded-md transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none group"
                >
                    <span>Erlebnis Steinermühle</span>
                    <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'getting-started' }"
                         class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" aria-hidden="true"
                    >
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </li>
            <li>
                <button
                        :class="{ 'bg-neutral-100' : navigationMenu=='learn-more', 'hover:bg-neutral-100' : navigationMenu!='learn-more' }"
                        @mouseover="navigationMenuOpen=true; navigationMenuReposition($el); navigationMenu='learn-more'"
                        @mouseleave="navigationMenuLeave()"
                        class="inline-flex justify-center uppercase items-center px-4 py-2 w-max h-10 text-lg font-medium rounded-md transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-background hover:bg-neutral-100 group"
                >
                    <span>Ferienwohnungen</span>
                    <svg :class="{ '-rotate-180' : navigationMenuOpen==true && navigationMenu == 'learn-more' }"
                         class="relative top-[1px] ml-1 h-3 w-3 ease-out duration-300" xmlns="http://www.w3.org/2000/svg"
                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" aria-hidden="true"
                    >
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>
            </li>
            <li>
                <a href="/umgebung"
                   class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-lg font-medium rounded-md transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-background hover:bg-neutral-100 group"
                >
                    Umgebung
                </a>
            </li>
            <li>
                <a href="/gaestestimmen"
                   class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-lg font-medium rounded-md transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-background hover:bg-neutral-100 group"
                >
                    Gästestimmen
                </a>
            </li>
            <li>
                <a href="/anfahrt-kontakt"
                   class="inline-flex justify-center items-center px-4 py-2 w-max h-10 text-lg font-medium rounded-md transition-colors hover:text-neutral-900 focus:outline-none disabled:opacity-50 disabled:pointer-events-none bg-background hover:bg-neutral-100 group"
                >
                    Anfahrt + Kontakt
                </a>
            </li>
        </ul>
    </div>
    <div x-ref="navigationDropdown" x-show="navigationMenuOpen"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="opacity-0 scale-90"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-90"
         @mouseover="navigationMenuClearCloseTimeout()" @mouseleave="navigationMenuLeave()"
         :class="{ 'w-screen max-w-7xl' : navigationMenu == 'learn-more' }"
         class="absolute top-0 pt-3" x-cloak
    >

        <div
                :class="{ 'w-full max-w-none' : navigationMenu == 'learn-more', 'w-auto' : navigationMenu != 'learn-more' }"
                class="flex overflow-hidden justify-center h-auto bg-white rounded-md border shadow-sm border-neutral-200/70"
        >

            <div x-show="navigationMenu == 'getting-started'"
                 class="flex gap-x-3 justify-center items-stretch p-6 w-full max-w-2xl ml-0"
            >
                <div class="flex-shrink-0 pb-7 w-48 h-auto bg-white">

                    <img src="{{ get_theme_file_uri('resources/images/Mockup_Steinermuehle_frei.png')}}" />
                </div>
                <div class="w-72">

                    @query([
                    'post_type' => 'page',
                    'post_parent' => 27,
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                    ])
                    @posts
                    <a href="@permalink" @click="navigationMenuClose()" class="block no-underline px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                        <span class="block mb-1 font-medium text-lg no-underline text-black">@title</span>
                        <span class="block font-light leading-5  no-underline text-base opacity-70">@field('menu_title')</span>
                    </a>
                    @endposts
                </div>
            </div>
            <div x-show="navigationMenu == 'erlebnis'" class="flex justify-center items-stretch p-6 w-full">
                <div class="w-96">
                    @query([
                    'post_type' => 'page',
                    'post_parent' => 33,
                    'posts_per_page' => -1,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                    ])
                    @posts
                    <a href="@permalink" @click="navigationMenuClose()" class="block no-underline px-3.5 py-3 text-sm rounded hover:bg-neutral-100">
                        <span class="block mb-1 font-medium text-lg no-underline text-black">@title</span>
                        <span class="block font-light leading-5  no-underline text-base opacity-70">@field('menu_title')</span>
                    </a>
                    @endposts
                </div>
            </div>
            <div x-show="navigationMenu == 'learn-more'" class="flex flex-col justify-center items-stretch p-6 w-full">


                        @query([
                        'post_type' => 'page',
                        'post_parent' => 10,
                        'posts_per_page' => -1,
                        'orderby' => 'menu_order',
                        'order' => 'ASC'
                        ])

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                            @posts
                            <x-accommodation-card
                                    :image="get_the_post_thumbnail_url(get_the_ID(), 'full')"
                                    :url="get_permalink()"
                                    :title="get_the_title()"
                                    :beds="get_field('number_of_beds')"
                                    :size="get_field('size')"
                                    :stars="get_field('number_of_statrs')"
                            />
                            @endposts

            </div>

        </div>
</nav>
<?php
