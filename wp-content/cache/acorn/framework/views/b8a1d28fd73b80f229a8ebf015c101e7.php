<?php $__env->startSection('hero'); ?>
<div class="hero w-full">
    <div class="video-docker">
        <video
            class="video"
            autoplay
            playsinline
            muted
            loop>
            <source src="<?php echo e(get_theme_file_uri('resources/images/steinermuehle.mp4')); ?>" type="video/mp4" />
        </video>

        <div class="video-content leading-1">
            <div class="hero-content">
                <h2><?php echo get_field('video_subheader'); ?></h2>
                <h1><?php echo get_field('video_header'); ?></h1>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (isset($component)) { $__componentOriginala766c2d312d6f7864fe218e2500d2bba = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala766c2d312d6f7864fe218e2500d2bba = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.container','data' => ['class' => 'my-24 space-y-12']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('container'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'my-24 space-y-12']); ?>

        <?php while(have_posts()): ?>
            <?php the_post() ?>
            <?php echo $__env->make('partials.page-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endwhile; ?>

            <?php global $query; ?><?php $query = new WP_Query([
                  'post_type' => 'page',
                  'post_parent' => 10,
                  'posts_per_page' => -1,
                  'orderby' => 'menu_order',
                  'order' => 'ASC'
                ]); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
            <?php if (empty($query)) : ?><?php global $wp_query; ?><?php $query = $wp_query; ?><?php endif; ?> <?php if ($query->have_posts()) : ?><?php $__currentLoopData = range(1, $query->post_count); $__env->addLoop($__currentLoopData); while ($query->have_posts()) : $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $query->the_post(); ?>
                <?php if (isset($component)) { $__componentOriginal5b8e5fa52c93f076ee055c1196ae0671 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5b8e5fa52c93f076ee055c1196ae0671 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.accommodation-card','data' => ['image' => get_the_post_thumbnail_url(get_the_ID(), 'full'),'url' => get_permalink(),'title' => get_the_title(),'beds' => get_field('number_of_beds'),'size' => get_field('size'),'stars' => get_field('number_of_statrs')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('accommodation-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_the_post_thumbnail_url(get_the_ID(), 'full')),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_permalink()),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_the_title()),'beds' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_field('number_of_beds')),'size' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_field('size')),'stars' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(get_field('number_of_statrs'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5b8e5fa52c93f076ee055c1196ae0671)): ?>
<?php $attributes = $__attributesOriginal5b8e5fa52c93f076ee055c1196ae0671; ?>
<?php unset($__attributesOriginal5b8e5fa52c93f076ee055c1196ae0671); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5b8e5fa52c93f076ee055c1196ae0671)): ?>
<?php $component = $__componentOriginal5b8e5fa52c93f076ee055c1196ae0671; ?>
<?php unset($__componentOriginal5b8e5fa52c93f076ee055c1196ae0671); ?>
<?php endif; ?>
            <?php endwhile; wp_reset_postdata(); $__env->popLoop(); $loop = $__env->getLastLoop(); endif; ?>
            </div>

            <?php while(have_posts()): ?>
                <?php the_post() ?>
                <?php echo $__env->make('partials.content-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endwhile; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mt-24">
            <div>
                <img src="<?php echo e(get_theme_file_uri('resources/images/DTV_150_rgb.jpg')); ?>" class="w-50 mx-auto">
            </div>
            <div>
                <img src="<?php echo e(get_theme_file_uri('resources/images/Vogtland_150_rgb.jpg')); ?>" class="w-50 mx-auto">
            </div>
            <div>
                <img src="<?php echo e(get_theme_file_uri('resources/images/Landsichten_150_rgb.jpg')); ?>" class="w-50 mx-auto">
            </div>
        </div>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $attributes = $__attributesOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__attributesOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala766c2d312d6f7864fe218e2500d2bba)): ?>
<?php $component = $__componentOriginala766c2d312d6f7864fe218e2500d2bba; ?>
<?php unset($__componentOriginala766c2d312d6f7864fe218e2500d2bba); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/template-start-page.blade.php ENDPATH**/ ?>