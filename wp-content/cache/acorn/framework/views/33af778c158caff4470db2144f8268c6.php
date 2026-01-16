<?php use function App\render_content_without_galleries; ?>
<?php use function App\get_gallery_images; ?>




<?php $__env->startSection('content'); ?>
    <img src="<?php echo e(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" class="aspect-video object-cover w-full h-auto lg:h-screen" />
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

            <?php echo render_content_without_galleries(get_the_ID()); ?>


            <?php
                $images = get_gallery_images(get_the_ID());
            ?>

        <div>
            <?php if(count($images) > 0): ?>
                <?php if (isset($component)) { $__componentOriginal95dbe0677c992f5a27f7be25f2eb556a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal95dbe0677c992f5a27f7be25f2eb556a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.gallery','data' => ['images' => $images,'columns' => 8]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('gallery'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['images' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($images),'columns' => 8]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal95dbe0677c992f5a27f7be25f2eb556a)): ?>
<?php $attributes = $__attributesOriginal95dbe0677c992f5a27f7be25f2eb556a; ?>
<?php unset($__attributesOriginal95dbe0677c992f5a27f7be25f2eb556a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal95dbe0677c992f5a27f7be25f2eb556a)): ?>
<?php $component = $__componentOriginal95dbe0677c992f5a27f7be25f2eb556a; ?>
<?php unset($__componentOriginal95dbe0677c992f5a27f7be25f2eb556a); ?>
<?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>
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

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/steinermuehle.de/resources/views/template-accommodation.blade.php ENDPATH**/ ?>