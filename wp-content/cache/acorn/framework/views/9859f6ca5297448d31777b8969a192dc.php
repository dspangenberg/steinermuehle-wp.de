<!doctype html>
<html <?php (language_attributes()); ?>>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=barlow:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|mulish:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|nunito:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|overpass:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|rubik:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" />
    <?php (do_action('get_header')); ?>
    <?php (wp_head()); ?>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
  </head>

  <body <?php (body_class()); ?>>
    <?php (wp_body_open()); ?>

    <div id="app">
      <a class="sr-only focus:not-sr-only" href="#main">
        <?php echo e(__('Skip to content', 'sage')); ?>

      </a>

      <?php echo $__env->make('sections.header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

      <?php echo $__env->yieldContent('hero'); ?>

      <main id="main" class="main">
        <?php echo $__env->yieldContent('content'); ?>
      </main>

      <?php echo $__env->make('sections.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <?php (do_action('get_footer')); ?>
    <?php (wp_footer()); ?>
  </body>
</html>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/layouts/app.blade.php ENDPATH**/ ?>