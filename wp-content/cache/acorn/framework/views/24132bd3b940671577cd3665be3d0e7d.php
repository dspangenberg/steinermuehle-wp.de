<article <?php (post_class()); ?>>
  <header>
    <h2 class="entry-title">
      <a href="<?php echo e(get_permalink()); ?>">
        <?php echo $title; ?> xxx
      </a>
    </h2>

    <?php echo $__env->make('partials.entry-meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>xxxx
  </header>

  <div class="entry-summary">
    <?php (the_excerpt()); ?>
  </div>
</article>
<?php /**PATH /home/dspangenberg/Projects/gnadtec.de/wp-content/themes/gnadtec.de/resources/views/partials/content.blade.php ENDPATH**/ ?>