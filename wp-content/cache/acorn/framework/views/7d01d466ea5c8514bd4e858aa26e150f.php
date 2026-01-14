<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
  'href' => '',
  'current_url' => ''
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
  'href' => '',
  'current_url' => ''
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$isActive = $href === $current_url;
?>
<li>
  <a href="<?php echo e($href); ?>"
     data-active="<?php echo e($isActive ? 'true' : 'false'); ?>"
     class="transition">
    <?php echo e($slot); ?>

  </a>
</li>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/gnadtec.de/resources/views/components/nav-link.blade.php ENDPATH**/ ?>