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

<div id="<?php echo e($gallery_id); ?>"></div>
<script type="application/json" id="<?php echo e($gallery_id); ?>-data"><?php echo $images_json; ?></script>
<script type="application/json" id="<?php echo e($gallery_id); ?>-columns"><?php echo $columns_json; ?></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById("<?php echo e($gallery_id); ?>");
    const imagesData = JSON.parse(document.getElementById("<?php echo e($gallery_id); ?>-data").textContent);
    const columns = JSON.parse(document.getElementById("<?php echo e($gallery_id); ?>-columns").textContent);

    container.setAttribute("x-data", JSON.stringify({ open: false, currentIndex: 0, images: imagesData }));
    container.className = "mt-12";

    const grid = document.createElement("div");
    const colsClass = {
        1: "grid-cols-1",
        2: "grid-cols-1 md:grid-cols-2",
        3: "grid-cols-1 md:grid-cols-2 lg:grid-cols-3",
        4: "grid-cols-2 md:grid-cols-3 lg:grid-cols-4",
        5: "grid-cols-2 md:grid-cols-3 lg:grid-cols-5",
        6: "grid-cols-2 md:grid-cols-4 lg:grid-cols-6",
        7: "grid-cols-2 md:grid-cols-4 lg:grid-cols-7",
        8: "grid-cols-2 md:grid-cols-4 lg:grid-cols-8"
    };
    grid.className = "grid " + (colsClass[columns] || colsClass[4]) + " gap-4";

    imagesData.forEach((img, index) => {
        const imgEl = document.createElement("img");
        imgEl.src = img.thumb;
        imgEl.alt = img.alt || "";
        imgEl.className = "w-full aspect-square object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity";
        imgEl.setAttribute("@click", "open = true; currentIndex = " + index);
        imgEl.loading = "lazy";
        grid.appendChild(imgEl);
    });

    container.appendChild(grid);

    const lightbox = document.createElement("div");
    lightbox.setAttribute("x-show", "open");
    lightbox.setAttribute("@keydown.escape.window", "open = false");
    if (imagesData.length > 1) {
        lightbox.setAttribute("@keydown.arrow-left.window", "currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1");
        lightbox.setAttribute("@keydown.arrow-right.window", "currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0");
    }
    lightbox.setAttribute("@click.self", "open = false");
    lightbox.className = "fixed inset-0 z-[9999] flex items-center justify-center bg-black/90";
    lightbox.style.display = "none";

    const closeBtn = document.createElement("button");
    closeBtn.setAttribute("@click", "open = false");
    closeBtn.className = "absolute top-4 right-4 text-white text-5xl leading-none hover:text-gray-300 w-12 h-12 flex items-center justify-center";
    closeBtn.innerHTML = "&times;";
    lightbox.appendChild(closeBtn);

    if (imagesData.length > 1) {
        const prevBtn = document.createElement("button");
        prevBtn.setAttribute("@click", "currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1");
        prevBtn.className = "absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full";
        const prevSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        prevSvg.setAttribute("fill", "none");
        prevSvg.setAttribute("viewBox", "0 0 24 24");
        prevSvg.setAttribute("stroke-width", "2");
        prevSvg.setAttribute("stroke", "currentColor");
        prevSvg.setAttribute("class", "w-10 h-10");
        const prevPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
        prevPath.setAttribute("stroke-linecap", "round");
        prevPath.setAttribute("stroke-linejoin", "round");
        prevPath.setAttribute("d", "M15.75 19.5L8.25 12l7.5-7.5");
        prevSvg.appendChild(prevPath);
        prevBtn.appendChild(prevSvg);
        lightbox.appendChild(prevBtn);
    }

    const imgContainer = document.createElement("div");
    imgContainer.className = "flex items-center justify-center w-full h-full pointer-events-none";
    const mainImg = document.createElement("img");
    mainImg.setAttribute(":src", "images[currentIndex].url");
    mainImg.setAttribute(":alt", "images[currentIndex].alt");
    mainImg.className = "max-h-[90vh] max-w-[90vw] object-contain pointer-events-auto";
    imgContainer.appendChild(mainImg);
    lightbox.appendChild(imgContainer);

    if (imagesData.length > 1) {
        const nextBtn = document.createElement("button");
        nextBtn.setAttribute("@click", "currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0");
        nextBtn.className = "absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full";
        const nextSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
        nextSvg.setAttribute("fill", "none");
        nextSvg.setAttribute("viewBox", "0 0 24 24");
        nextSvg.setAttribute("stroke-width", "2");
        nextSvg.setAttribute("stroke", "currentColor");
        nextSvg.setAttribute("class", "w-10 h-10");
        const nextPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
        nextPath.setAttribute("stroke-linecap", "round");
        nextPath.setAttribute("stroke-linejoin", "round");
        nextPath.setAttribute("d", "M8.25 4.5l7.5 7.5-7.5 7.5");
        nextSvg.appendChild(nextPath);
        nextBtn.appendChild(nextSvg);
        lightbox.appendChild(nextBtn);

        const counter = document.createElement("div");
        counter.className = "absolute bottom-4 left-1/2 -translate-x-1/2 text-white text-lg bg-black/50 px-4 py-2 rounded";
        const currentSpan = document.createElement("span");
        currentSpan.setAttribute("x-text", "currentIndex + 1");
        counter.appendChild(currentSpan);
        counter.appendChild(document.createTextNode(" / "));
        const totalSpan = document.createElement("span");
        totalSpan.setAttribute("x-text", "images.length");
        counter.appendChild(totalSpan);
        lightbox.appendChild(counter);
    }

    container.appendChild(lightbox);
});
</script>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/components/gallery.blade.php ENDPATH**/ ?>