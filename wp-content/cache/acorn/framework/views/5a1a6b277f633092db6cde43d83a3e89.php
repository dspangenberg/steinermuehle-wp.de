<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'url' => null,
  'title' => null,
  'image' => null,
  'beds' => null,
  'size' => null,
  'stars' => null,
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
  'url' => null,
  'title' => null,
  'image' => null,
  'beds' => null,
  'size' => null,
  'stars' => null,
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<a href="<?php echo e($url); ?>" class="block !no-underline">
<div class="border-t rounded-lg shadow bg-stone-50 overflow-hidden border-stone-200">
    <div class="relative w-full overflow-hidden">
        <img src=<?php echo e($image); ?> alt="alt" class="w-full aspect-video object-cover rounded-t-lg object-bottom">
        <?php if($stars): ?>
        <div class="absolute top-2 left-2.5 flex items-center justify-center bg-white/20 w-auto font-medium text-black text-base rounded-md p-2 gap-2">
            <?php for($i = 0; $i < $stars; $i++): ?>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" color="oklch(70.9% 0.01 56.259)" fill="oklch(85.2% 0.199 91.936)">
                <path d="M13.7276 3.44418L15.4874 6.99288C15.7274 7.48687 16.3673 7.9607 16.9073 8.05143L20.0969 8.58575C22.1367 8.92853 22.6167 10.4206 21.1468 11.8925L18.6671 14.3927C18.2471 14.8161 18.0172 15.6327 18.1471 16.2175L18.8571 19.3125C19.417 21.7623 18.1271 22.71 15.9774 21.4296L12.9877 19.6452C12.4478 19.3226 11.5579 19.3226 11.0079 19.6452L8.01827 21.4296C5.8785 22.71 4.57865 21.7522 5.13859 19.3125L5.84851 16.2175C5.97849 15.6327 5.74852 14.8161 5.32856 14.3927L2.84884 11.8925C1.389 10.4206 1.85895 8.92853 3.89872 8.58575L7.08837 8.05143C7.61831 7.9607 8.25824 7.48687 8.49821 6.99288L10.258 3.44418C11.2179 1.51861 12.7777 1.51861 13.7276 3.44418Z" stroke="#141B34" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
        <div class="absolute bottom-2 right-2.5 flex items-center justify-center bg-white/80 w-auto font-medium text-black text-base rounded-md px-2 py-1 gap-2">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" color="oklch(37.4% 0.01 67.558)" fill="none">
                    <path d="M22 17.5H2" stroke="oklch(55.3% 0.013 58.071)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M22 21V16C22 14.1144 22 13.1716 21.4142 12.5858C20.8284 12 19.8856 12 18 12H6C4.11438 12 3.17157 12 2.58579 12.5858C2 13.1716 2 14.1144 2 16V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M11 12V10.2134C11 9.83272 10.9428 9.70541 10.6497 9.55538C10.0395 9.24292 9.29865 9 8.5 9C7.70135 9 6.96055 9.24292 6.35025 9.55538C6.05721 9.70541 6 9.83272 6 10.2134L6 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M18 12V10.2134C18 9.83272 17.9428 9.70541 17.6497 9.55538C17.0395 9.24292 16.2987 9 15.5 9C14.7013 9 13.9605 9.24292 13.3503 9.55538C13.0572 9.70541 13 9.83272 13 10.2134L13 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                    <path d="M21 12V7.36057C21 6.66893 21 6.32311 20.8079 5.99653C20.6157 5.66995 20.342 5.50091 19.7944 5.16283C17.5869 3.79978 14.8993 3 12 3C9.10067 3 6.41314 3.79978 4.20558 5.16283C3.65804 5.50091 3.38427 5.66995 3.19213 5.99653C3 6.32311 3 6.66893 3 7.36057V12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                </svg>
            </div>
            <div class="font-bold! self-center">
                <?php echo e($beds); ?>&nbsp;

            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" color="oklch(37.4% 0.01 67.558)" fill="none">
                    <path d="M2.5 12C2.5 7.52166 2.5 5.28249 3.89124 3.89124C5.28249 2.5 7.52166 2.5 12 2.5C16.4783 2.5 18.7175 2.5 20.1088 3.89124C21.5 5.28249 21.5 7.52166 21.5 12C21.5 16.4783 21.5 18.7175 20.1088 20.1088C18.7175 21.5 16.4783 21.5 12 21.5C7.52166 21.5 5.28249 21.5 3.89124 20.1088C2.5 18.7175 2.5 16.4783 2.5 12Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M11.0167 11.0167C11.5915 10.4419 11.4959 8 11.4959 8M11.0167 11.0167C10.4419 11.5915 8 11.4958 8 11.4958M11.0167 11.0167L7 7M12.9869 12.9868C13.5617 12.412 16.0036 12.5077 16.0036 12.5077M12.9869 12.9868C12.4121 13.5616 12.5078 16.0035 12.5078 16.0035M12.9869 12.9868L17 16.9999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
            <div>
                <?php echo e($size); ?> m²
            </div>

        </div>
    </div>

    <div class="px-4 pt-2.5 border-t border-stone-200">
        <h2 class="!text-xl font-semibold text-center min-h-12 leading-tight text-[#077033] flex items-center justify-center">
            <?php echo e($title); ?>

        </h2>
    </div>
</div>
</a>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/components/accommodation-card.blade.php ENDPATH**/ ?>