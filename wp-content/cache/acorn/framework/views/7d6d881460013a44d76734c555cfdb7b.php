<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag; ?>
<?php foreach($attributes->onlyProps([
  'className' => '',
]) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $attributes = $attributes->exceptProps([
  'className' => '',
]); ?>
<?php foreach (array_filter(([
  'className' => '',
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>


<div <?php echo e($attributes->merge(['class' => clsx([
    'sm:px-8',
    $className
])])); ?>>
  <div class="mx-auto w-full max-w-7xl lg:px-8">
    <?php echo e($slot); ?>

  </div>
</div>

<?php /**PATH /home/dspangenberg/Projects/gnadtec.de/wp-content/themes/gnadtec.de/resources/views/components/container-outer.blade.php ENDPATH**/ ?>