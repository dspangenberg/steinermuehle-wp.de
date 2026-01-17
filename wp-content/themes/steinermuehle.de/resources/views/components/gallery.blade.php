@props([
    'images' => [],
    'columns' => 4,
    'id' => null,
    'masonry' => false,
])

@php
    $gallery_id = $id ?? 'gallery-' . uniqid();
    $images_json = json_encode($images);
    $columns_json = json_encode($columns);
@endphp

<div id="{{ $gallery_id }}" class="mt-12" x-data='{
    open: false,
    currentIndex: 0,
    images: {!! $images_json !!},
    galleryId: "{{ $gallery_id }}",
    touchStartX: 0,
    touchEndX: 0,
    handleSwipe() {
        const swipeThreshold = 50;
        const diff = this.touchStartX - this.touchEndX;
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe left - next image
                this.currentIndex = (this.currentIndex < this.images.length - 1) ? this.currentIndex + 1 : 0;
            } else {
                // Swipe right - previous image
                this.currentIndex = (this.currentIndex > 0) ? this.currentIndex - 1 : this.images.length - 1;
            }
        }
    }
}'>
    @if($masonry)
    {{-- Masonry Layout --}}
    <div
        x-data="{
            columns: {{ $columns }},
            init() {
                this.$nextTick(() => {
                    this.layoutMasonry();

                    const images = this.$el.querySelectorAll('img');
                    let loaded = 0;
                    images.forEach(img => {
                        if (img.complete) {
                            loaded++;
                            if (loaded === images.length) this.layoutMasonry();
                        } else {
                            img.addEventListener('load', () => {
                                loaded++;
                                if (loaded === images.length) this.layoutMasonry();
                            });
                        }
                    });

                    window.addEventListener('resize', () => this.layoutMasonry());
                });
            },
            getColumnCount() {
                if (window.innerWidth >= 1024) return this.columns;
                if (window.innerWidth >= 768) return Math.min(this.columns, 4);
                return 2;
            },
            layoutMasonry() {
                const colCount = this.getColumnCount();
                const columns = Array.from(this.$el.querySelectorAll('.masonry-column')).slice(0, colCount);

                // Hide unused columns
                const allColumns = this.$el.querySelectorAll('.masonry-column');
                allColumns.forEach((col, idx) => {
                    col.style.display = idx < colCount ? 'flex' : 'none';
                });

                // Clear visible columns
                columns.forEach(col => col.innerHTML = '');

                // Track column heights
                const columnHeights = new Array(colCount).fill(0);

                // Get all items
                const items = Array.from(this.$el.querySelectorAll('.hidden .masonry-item'));

                // Distribute items to shortest column
                items.forEach(item => {
                    const img = item.querySelector('img');
                    const imgHeight = img.naturalHeight || img.offsetHeight || 300;
                    const imgWidth = img.naturalWidth || img.offsetWidth || 300;

                    // Find shortest column
                    const shortestIndex = columnHeights.indexOf(Math.min(...columnHeights));

                    // Clone and append to shortest column
                    columns[shortestIndex].appendChild(item.cloneNode(true));

                    // Update column height (proportional to container width)
                    columnHeights[shortestIndex] += imgHeight / imgWidth;
                });
            }
        }"
        class="flex gap-1"
    >
        <div class="hidden">
            @foreach($images as $index => $image)
                <div class="masonry-item mb-1">
                    <img
                        src="{{ $image['thumb'] }}"
                        alt="{{ $image['alt'] ?? '' }}"
                        class="w-full h-auto cursor-pointer hover:opacity-80 transition-opacity block"
                        @click="open = true; currentIndex = {{ $index }}"
                        @touchend.prevent="open = true; currentIndex = {{ $index }}"
                        loading="lazy"
                    />
                </div>
            @endforeach
        </div>

        @for($i = 0; $i < $columns; $i++)
            <div class="masonry-column flex-1 flex flex-col gap-1"></div>
        @endfor
    </div>
    @else
    {{-- Grid Layout --}}
    <div class="grid {{
        $columns === 1 ? 'grid-cols-1' :
        ($columns === 2 ? 'grid-cols-1 md:grid-cols-2' :
        ($columns === 3 ? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3' :
        ($columns === 4 ? 'grid-cols-2 md:grid-cols-3 lg:grid-cols-4' :
        ($columns === 5 ? 'grid-cols-2 md:grid-cols-3 lg:grid-cols-5' :
        ($columns === 6 ? 'grid-cols-2 md:grid-cols-4 lg:grid-cols-6' :
        ($columns === 7 ? 'grid-cols-2 md:grid-cols-4 lg:grid-cols-7' :
        'grid-cols-2 md:grid-cols-4 lg:grid-cols-8'))))))
    }} gap-0.5">
        @foreach($images as $index => $image)
            <img
                src="{{ $image['thumb'] }}"
                alt="{{ $image['alt'] ?? '' }}"
                class="w-full aspect-square object-cover cursor-pointer hover:opacity-80 transition-opacity"
                @click="open = true; currentIndex = {{ $index }}"
                @touchend.prevent="open = true; currentIndex = {{ $index }}"
                loading="lazy"
            />
        @endforeach
    </div>
    @endif

    {{-- Lightbox --}}
    <div
        x-show="open"
        x-cloak
        @keydown.escape.window="if (open) open = false"
        @if(count($images) > 1)
        @keydown.arrow-left.window="if (open) currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
        @keydown.arrow-right.window="if (open) currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
        @endif
        @click.self="open = false"
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/90"
        :id="galleryId + '-lightbox'"
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
        <div
            class="flex items-center justify-center w-full h-full pointer-events-none"
            @touchstart="touchStartX = $event.changedTouches[0].screenX"
            @touchend="touchEndX = $event.changedTouches[0].screenX; handleSwipe()"
        >
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
