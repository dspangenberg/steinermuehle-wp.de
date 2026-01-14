<header id="header" class="fixed top-0 left-0 right-0 h-16 z-40 text-sans ">


    <div class="absolute lg:m-0 left-0 top-0 right-0 flex font-semibold h-16 text-base bg-white/90  border-stone-100">


        <div class="w-screen mx-auto max-w-7xl flex items-center h-16 justify-start gap-4 relative animate text-lg">
            <?php echo $__env->make('sections.mobile_navigation', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <a href="/" class=" absolute right-3 top-4 h-12">
                <img src="<?php echo e(get_theme_file_uri('resources/images/gnadtec_logo.png')); ?>" class="h-12">
            </a>
        </div>
    </div>
</header>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/gnadtec.de/resources/views/sections/header.blade.php ENDPATH**/ ?>