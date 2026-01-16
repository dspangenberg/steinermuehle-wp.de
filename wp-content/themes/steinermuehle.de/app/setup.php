<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
    if (! get_current_screen()?->is_block_editor()) {
        return;
    }

    $dependencies = json_decode(Vite::content('editor.deps.json'));

    foreach ($dependencies as $dependency) {
        if (! wp_script_is($dependency)) {
            wp_enqueue_script($dependency);
        }
    }

    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Helper function to extract gallery images from post content.
 *
 * @param int $post_id
 * @return array
 */
if (!function_exists('App\get_gallery_images')) {
    function get_gallery_images($post_id) {
        $images = [];
        $post = get_post($post_id);

        if (!$post) {
            return $images;
        }

        $blocks = parse_blocks($post->post_content);

        foreach ($blocks as $block) {
            if ($block['blockName'] === 'core/gallery' && !empty($block['innerBlocks'])) {
                foreach ($block['innerBlocks'] as $inner_block) {
                    if ($inner_block['blockName'] === 'core/image') {
                        $image_id = $inner_block['attrs']['id'] ?? null;
                        if ($image_id) {
                            $images[] = [
                                'url' => wp_get_attachment_image_url($image_id, 'full'),
                                'thumb' => wp_get_attachment_image_url($image_id, 'large'),
                                'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true)
                            ];
                        }
                    }
                }
            }
        }

        return $images;
    }
}

/**
 * Helper function to render post content without gallery blocks.
 *
 * @param int $post_id
 * @return string
 */
if (!function_exists('App\render_content_without_galleries')) {
    function render_content_without_galleries($post_id) {
        $post = get_post($post_id);

        if (!$post) {
            return '';
        }

        $blocks = parse_blocks($post->post_content);
        $filtered_blocks = [];

        foreach ($blocks as $block) {
            if ($block['blockName'] !== 'core/gallery') {
                $filtered_blocks[] = $block;
            }
        }

        $output = '';
        foreach ($filtered_blocks as $block) {
            $output .= render_block($block);
        }

        return $output;
    }
}

/**
 * Custom gallery renderer.
 *
 * @return string
 */
add_filter('render_block', function ($block_content, $block) {
    if ($block['blockName'] === 'core/gallery') {
        $images = [];

        // Extract images from innerBlocks
        if (!empty($block['innerBlocks'])) {
            foreach ($block['innerBlocks'] as $inner_block) {
                if ($inner_block['blockName'] === 'core/image') {
                    $image_id = $inner_block['attrs']['id'] ?? null;
                    if ($image_id) {
                        $images[] = [
                            'url' => wp_get_attachment_image_url($image_id, 'full'),
                            'thumb' => wp_get_attachment_image_url($image_id, 'large'),
                            'alt' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
                        ];
                    }
                }
            }
        }

        if (empty($images)) {
            return $block_content;
        }

        // Get columns setting from block attributes
        $columns = $block['attrs']['columns'] ?? 0;

        // Default columns if not set
        if ($columns === 0) {
            $columns = min(count($images), 3);
        }

        // Build custom gallery HTML with Alpine.js lightbox
        $gallery_id = 'gallery-' . uniqid();
        $images_json = wp_json_encode($images);
        $columns_json = wp_json_encode($columns);

        $output = '<div id="' . $gallery_id . '"></div>';
        $output .= '<script type="application/json" id="' . $gallery_id . '-data">' . $images_json . '</script>';
        $output .= '<script type="application/json" id="' . $gallery_id . '-columns">' . $columns_json . '</script>';
        $output .= '<script>
        document.addEventListener("DOMContentLoaded", function() {
            const container = document.getElementById("' . $gallery_id . '");
            const imagesData = JSON.parse(document.getElementById("' . $gallery_id . '-data").textContent);
            const columns = JSON.parse(document.getElementById("' . $gallery_id . '-columns").textContent);

            container.setAttribute("x-data", JSON.stringify({ open: false, currentIndex: 0, images: imagesData }));
            container.className = "my-6";

            // Gallery grid - dynamic columns based on setting
            const grid = document.createElement("div");
            const colsClass = {
                1: "grid-cols-1",
                2: "grid-cols-1 md:grid-cols-2",
                3: "grid-cols-1 md:grid-cols-2 lg:grid-cols-3",
                4: "grid-cols-2 md:grid-cols-3 lg:grid-cols-4",
                5: "grid-cols-2 md:grid-cols-3 lg:grid-cols-5",
                6: "grid-cols-2 md:grid-cols-4 lg:grid-cols-6",
                7: "grid-cols-2 md:grid-cols-4 lg:grid-cols-7",
                8: "grid-cols-2 md:grid-cols-4 lg:grid-cols-8"
            };
            grid.className = "grid " + (colsClass[columns] || colsClass[3]) + " gap-4";

            imagesData.forEach((img, index) => {
                const imgEl = document.createElement("img");
                imgEl.src = img.thumb;
                imgEl.alt = img.alt;
                imgEl.className = "w-full aspect-square object-cover rounded-lg cursor-pointer hover:opacity-80 transition-opacity";
                imgEl.setAttribute("@click", "open = true; currentIndex = " + index);
                imgEl.loading = "lazy";
                grid.appendChild(imgEl);
            });

            container.appendChild(grid);

            // Lightbox
            const lightbox = document.createElement("div");
            lightbox.setAttribute("x-show", "open");
            lightbox.setAttribute("@keydown.escape.window", "open = false");
            if (imagesData.length > 1) {
                lightbox.setAttribute("@keydown.arrow-left.window", "currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1");
                lightbox.setAttribute("@keydown.arrow-right.window", "currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0");
            }
            lightbox.setAttribute("@click.self", "open = false");
            lightbox.className = "fixed inset-0 z-[9999] flex items-center justify-center bg-black/90";
            lightbox.style.display = "none";

            // Close button
            const closeBtn = document.createElement("button");
            closeBtn.setAttribute("@click", "open = false");
            closeBtn.className = "absolute top-4 right-4 text-white text-5xl leading-none hover:text-gray-300 w-12 h-12 flex items-center justify-center";
            closeBtn.innerHTML = "&times;";
            lightbox.appendChild(closeBtn);

            // Previous button
            if (imagesData.length > 1) {
                const prevBtn = document.createElement("button");
                prevBtn.setAttribute("@click", "currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1");
                prevBtn.className = "absolute left-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full";
                const prevSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                prevSvg.setAttribute("fill", "none");
                prevSvg.setAttribute("viewBox", "0 0 24 24");
                prevSvg.setAttribute("stroke-width", "2");
                prevSvg.setAttribute("stroke", "currentColor");
                prevSvg.setAttribute("class", "w-10 h-10");
                const prevPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
                prevPath.setAttribute("stroke-linecap", "round");
                prevPath.setAttribute("stroke-linejoin", "round");
                prevPath.setAttribute("d", "M15.75 19.5L8.25 12l7.5-7.5");
                prevSvg.appendChild(prevPath);
                prevBtn.appendChild(prevSvg);
                lightbox.appendChild(prevBtn);
            }

            // Image container
            const imgContainer = document.createElement("div");
            imgContainer.className = "flex items-center justify-center w-full h-full pointer-events-none";
            const mainImg = document.createElement("img");
            mainImg.setAttribute(":src", "images[currentIndex].url");
            mainImg.setAttribute(":alt", "images[currentIndex].alt");
            mainImg.className = "max-h-[90vh] max-w-[90vw] object-contain pointer-events-auto";
            imgContainer.appendChild(mainImg);
            lightbox.appendChild(imgContainer);

            // Next button
            if (imagesData.length > 1) {
                const nextBtn = document.createElement("button");
                nextBtn.setAttribute("@click", "currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0");
                nextBtn.className = "absolute right-4 top-1/2 -translate-y-1/2 text-white hover:text-gray-300 w-16 h-16 flex items-center justify-center bg-black/30 rounded-full";
                const nextSvg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                nextSvg.setAttribute("fill", "none");
                nextSvg.setAttribute("viewBox", "0 0 24 24");
                nextSvg.setAttribute("stroke-width", "2");
                nextSvg.setAttribute("stroke", "currentColor");
                nextSvg.setAttribute("class", "w-10 h-10");
                const nextPath = document.createElementNS("http://www.w3.org/2000/svg", "path");
                nextPath.setAttribute("stroke-linecap", "round");
                nextPath.setAttribute("stroke-linejoin", "round");
                nextPath.setAttribute("d", "M8.25 4.5l7.5 7.5-7.5 7.5");
                nextSvg.appendChild(nextPath);
                nextBtn.appendChild(nextSvg);
                lightbox.appendChild(nextBtn);

                // Counter
                const counter = document.createElement("div");
                counter.className = "absolute bottom-4 left-1/2 -translate-x-1/2 text-white text-lg bg-black/50 px-4 py-2 rounded";
                const currentSpan = document.createElement("span");
                currentSpan.setAttribute("x-text", "currentIndex + 1");
                counter.appendChild(currentSpan);
                counter.appendChild(document.createTextNode(" / "));
                const totalSpan = document.createElement("span");
                totalSpan.setAttribute("x-text", "images.length");
                counter.appendChild(totalSpan);
                lightbox.appendChild(counter);
            }

            container.appendChild(lightbox);
        });
        </script>';

        return $output;
    }

    return $block_content;
}, 10, 2);
