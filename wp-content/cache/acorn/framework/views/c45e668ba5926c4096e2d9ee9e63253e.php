<div class="w-full relative bg-no-repeat rounded-md  bg-cover bg-center shadow-xl aspect-[16/4.5] md:aspect-[16/4.5]"
     style="background-image: url('<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>')">
        <?php if (get_field('show_van') === true) : ?>
          <div class=" absolute bottom-0 right-0 left-0 px-4">
             <img src="<?php echo e(get_theme_file_uri('resources/images/Gnadtec_Van.png')); ?>" class="h-14 md:h-36 mx-auto md:ml-[10%] aspect[4/3]">
          </div>
        <?php endif; ?>

</div>

<div class="page-header">
  <h1><?php echo $title; ?></h1>
</div>
<?php /**PATH /home/dspangenberg/Projects/gnadtec.de/wp-content/themes/gnadtec.de/resources/views/partials/page-header.blade.php ENDPATH**/ ?>