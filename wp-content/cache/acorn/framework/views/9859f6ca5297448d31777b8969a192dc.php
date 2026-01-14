<!doctype html>
<html <?php (language_attributes()); ?> class="h-screen w-screen m-0 p-0 bg-white">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=barlow:400,500,700" rel="stylesheet" />
      <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
      <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


    <?php (do_action('get_header')); ?>
    <?php (wp_head()); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  </head>

  <body class="h-screen w-screen m-0 p-0 bg-white left-12" >


      <div class="fixed top-0 left-0 bottom-0 z-50 w-12 h-full bg-[#007d40] text-white border-8 border-white overflow-hidden">
          <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 -rotate-90 whitespace-nowrap text-base md:text-lg font-medium">
              Planung&nbsp;&nbsp;•&nbsp;&nbsp;Montage&nbsp;&nbsp;•&nbsp;&nbsp;Wartung&nbsp;&nbsp;•&nbsp;&nbsp;Instandsetzung&nbsp;&nbsp;•&nbsp;&nbsp;Reparaturen
          </span>
      </div>


      <a class="sr-only focus:not-sr-only" href="#main">
        <?php echo e(__('Skip to content', 'sage')); ?>

      </a>

      <?php echo $__env->make('sections.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <div class="w-screen mx-auto max-w-7xl pt-20 flex">

      <nav class="hidden lg:flex flex-none sticky top-40 w-72  h-36 space-y-3 flex-col ml-12">
          <?php echo $__env->make('sections.navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      </nav>

      <main id="main" class="flex-1 ml-14 mr-3 lg:ml-0 hyphens-auto">
          <div class="content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
          </div>
        <?php echo $__env->make('sections.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
      </main>
      </div>

    <script defer src="https://umami.twiceware.cloud/script.js" data-website-id="eb7ceaad-02f9-41cb-af73-7898439cccfc"></script>
    <?php (do_action('get_footer')); ?>
    <?php (wp_footer()); ?>
  </body>
</html>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/layouts/app.blade.php ENDPATH**/ ?>