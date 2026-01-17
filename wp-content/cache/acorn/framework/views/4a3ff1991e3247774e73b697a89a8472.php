<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
    'images' => [],
    'columns' => 4,
]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter(([
    'images' => [],
    'columns' => 4,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $gallery_id = 'gallery-' . uniqid();
    $images_json = json_encode($images);
    $columns_json = json_encode($columns);
?>

<div id="<?php echo e($gallery_id); ?>" class="mt-12" x-data='{
    open: false,
    currentIndex: 0,
    images: <?php echo $images_json; ?>,
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
    <div class="grid <?php echo e($columns === 1 ? 'grid-cols-1' :
        ($columns === 2 ? 'grid-cols-1 md:grid-cols-2' :
        ($columns === 3 ? 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3' :
        ($columns === 4 ? 'grid-cols-2 md:grid-cols-3 lg:grid-cols-4' :
        ($columns === 5 ? 'grid-cols-2 md:grid-cols-3 lg:grid-cols-5' :
        ($columns === 6 ? 'grid-cols-2 md:grid-cols-4 lg:grid-cols-6' :
        ($columns === 7 ? 'grid-cols-2 md:grid-cols-4 lg:grid-cols-7' :
        'grid-cols-2 md:grid-cols-4 lg:grid-cols-8'))))))); ?> gap-0.5">
        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <img
                src="<?php echo e($image['thumb']); ?>"
                alt="<?php echo e($image['alt'] ?? ''); ?>"
                class="w-full aspect-square object-cover cursor-pointer hover:opacity-80 transition-opacity"
                @click="open = true; currentIndex = <?php echo e($index); ?>"
                @touchend.prevent="open = true; currentIndex = <?php echo e($index); ?>"
                loading="lazy"
            />
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div
        x-show="open"
        x-cloak
        @keydown.escape.window="open = false"
        <?php if(count($images) > 1): ?>
        @keydown.arrow-left.window="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
        @keydown.arrow-right.window="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
        <?php endif; ?>
        @click.self="open = false"
        class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/90"
    >
        
        <button
            @click="open = false"
            class="absolute top-4 right-4 text-white text-5xl leading-none hover:text-gray-300 w-12 h-12 flex items-center justify-center"
        >&times;</button>

        <?php if(count($images) > 1): ?>
        
        <button
            @click="currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1"
            class="absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
        </button>
        <?php endif; ?>

        
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

        <?php if(count($images) > 1): ?>
        
        <button
            @click="currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full"
        >
            <svg fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
            </svg>
        </button>

        
        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 text-white text-lg bg-black/50 px-4 py-2 rounded">
            <span x-text="currentIndex + 1"></span> / <span x-text="images.length"></span>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/components/gallery.blade.php ENDPATH**/ ?>