@props([
    'images' => [],
    'columns' => 4,
])

@php
    $gallery_id = 'gallery-' . uniqid();
    $images_json = json_encode($images);
    $columns_json = json_encode($columns);
@endphp

<div id="{{ $gallery_id }}" class="mt-12" x-data='{ open: false, currentIndex: 0, images: {!! $images_json !!} }'>
    <div class="grid {{
        $columns === 1 ? 'grid-cols-1' :
        ($columns === 2 ? 'grid-cols-1 md:grid-cols-2' :
        ($columns === 3 ? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3' :
        ($columns === 4 ? 'grid-cols-2 md:grid-cols-3 lg:grid-cols-4' :
        ($columns === 5 ? 'grid-cols-2 md:grid-cols-3 lg:grid-cols-5' :
        ($columns === 6 ? 'grid-cols-2 md:grid-cols-4 lg:grid-cols-6' :
        ($columns === 7 ? 'grid-cols-2 md:grid-cols-4 lg:grid-cols-7' :
        'grid-cols-2 md:grid-cols-4 lg:grid-cols-8'))))))
    }} gap-4">
        @foreach($images as $index => $image)
            <img
                src="{{ $image['thumb'] }}"
                alt="{{ $image['alt'] ?? '' }}"
                class="w-full aspect-square object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity"
                @click="open = true; currentIndex = {{ $index }}"
                @touchend.prevent="open = true; currentIndex = {{ $index }}"
                loading="lazy"
            />
        @endforeach
    </div>

    {{-- Lightbox --}}
    <div
        x-show="open"
        x-cloak
        @keydown.escape.window="open = false"
        @if(count($images) > 1)
        @keydown.arrow-left.window="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
        @keydown.arrow-right.window="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
        @endif
        @click.self="open = false"
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/90"
    >
        {{-- Close button --}}
        <button
            @click="open = false"
            class="absolute top-4 right-4 text-white text-5xl leading-none hover:text-gray-300 w-12 h-12 flex items-center justify-center"
        >&times;</button>

        @if(count($images) > 1)
        {{-- Previous button --}}
        <button
            @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
            class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        @endif

        {{-- Image --}}
        <div class="flex items-center justify-center w-full h-full pointer-events-none">
            <img
                :src="images[currentIndex].url"
                :alt="images[currentIndex].alt"
                class="max-h-[90vh] max-w-[90vw] object-contain pointer-events-auto"
            />
        </div>

        @if(count($images) > 1)
        {{-- Next button --}}
        <button
            @click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        {{-- Counter --}}
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white text-lg bg-black/50 px-4 py-2 rounded">
            <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
        </div>
        @endif
    </div>
</div>
