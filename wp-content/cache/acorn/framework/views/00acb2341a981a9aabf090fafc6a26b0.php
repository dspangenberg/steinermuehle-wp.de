<?php ($current_url = get_page_link()); ?>
<div class="text-base uppercase space-y-2">
<ul class="space-y-1.5 list-none">
    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => ''.e(get_page_link(2)).'','currentUrl' => ''.e($current_url).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(get_page_link(2)).'','current_url' => ''.e($current_url).'']); ?>Start <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
</ul>

<?php if (isset($component)) { $__componentOriginal460a283b8831bc43d8ca37a2ac46781c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal460a283b8831bc43d8ca37a2ac46781c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-section','data' => ['title' => 'Kompetenzen']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Kompetenzen']); ?>
    <?php global $query; ?><?php $query = new WP_Query([
    'post_type' => 'page',
    'post_parent' => 24,
    'order' => 'ASC',
    'orderby' => 'position',
    ]); ?>

    <?php if (empty($query)) : ?><?php global $wp_query; ?><?php $query = $wp_query; ?><?php endif; ?> <?php if ($query->have_posts()) : ?><?php $__currentLoopData = range(1, $query->post_count); $__env->addLoop($__currentLoopData); while ($query->have_posts()) : $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $query->the_post(); ?>

    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => ''.e(get_permalink()).'','currentUrl' => ''.e($current_url).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(get_permalink()).'','current_url' => ''.e($current_url).'']); ?>
        <?php echo get_the_title(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
    <?php endwhile; wp_reset_postdata(); $__env->popLoop(); $loop = $__env->getLastLoop(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal460a283b8831bc43d8ca37a2ac46781c)): ?>
<?php $attributes = $__attributesOriginal460a283b8831bc43d8ca37a2ac46781c; ?>
<?php unset($__attributesOriginal460a283b8831bc43d8ca37a2ac46781c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal460a283b8831bc43d8ca37a2ac46781c)): ?>
<?php $component = $__componentOriginal460a283b8831bc43d8ca37a2ac46781c; ?>
<?php unset($__componentOriginal460a283b8831bc43d8ca37a2ac46781c); ?>
<?php endif; ?>
<?php if (isset($component)) { $__componentOriginal460a283b8831bc43d8ca37a2ac46781c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal460a283b8831bc43d8ca37a2ac46781c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-section','data' => ['title' => 'Unternehmen']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Unternehmen']); ?>
    <?php global $query; ?><?php $query = new WP_Query([
    'post_type' => 'page',
    'post_parent' => 26,
    'order' => 'ASC',
    'orderby' => 'position',
    ]); ?>

    <?php if (empty($query)) : ?><?php global $wp_query; ?><?php $query = $wp_query; ?><?php endif; ?> <?php if ($query->have_posts()) : ?><?php $__currentLoopData = range(1, $query->post_count); $__env->addLoop($__currentLoopData); while ($query->have_posts()) : $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $query->the_post(); ?>

    <?php if (isset($component)) { $__componentOriginalc295f12dca9d42f28a259237a5724830 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalc295f12dca9d42f28a259237a5724830 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.nav-link','data' => ['href' => ''.e(get_permalink()).'','currentUrl' => ''.e($current_url).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('nav-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(get_permalink()).'','current_url' => ''.e($current_url).'']); ?>
        <?php echo get_the_title(); ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $attributes = $__attributesOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__attributesOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc295f12dca9d42f28a259237a5724830)): ?>
<?php $component = $__componentOriginalc295f12dca9d42f28a259237a5724830; ?>
<?php unset($__componentOriginalc295f12dca9d42f28a259237a5724830); ?>
<?php endif; ?>
    <?php endwhile; wp_reset_postdata(); $__env->popLoop(); $loop = $__env->getLastLoop(); endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal460a283b8831bc43d8ca37a2ac46781c)): ?>
<?php $attributes = $__attributesOriginal460a283b8831bc43d8ca37a2ac46781c; ?>
<?php unset($__attributesOriginal460a283b8831bc43d8ca37a2ac46781c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal460a283b8831bc43d8ca37a2ac46781c)): ?>
<?php $component = $__componentOriginal460a283b8831bc43d8ca37a2ac46781c; ?>
<?php unset($__componentOriginal460a283b8831bc43d8ca37a2ac46781c); ?>
<?php endif; ?>
</div>
<?php /**PATH /Users/dspangenberg/Projects/steinermuehle-wp.test/wp-content/themes/gnadtec.de/resources/views/sections/navigation.blade.php ENDPATH**/ ?>