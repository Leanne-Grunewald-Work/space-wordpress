<?php

function space_enqueue_assets() {
    wp_enqueue_style('space-style', get_template_directory_uri() . '/dist/css/main.css', [], '1.0');

    wp_enqueue_script('alpine', 'https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js', [], null, true);

}
add_action('wp_enqueue_scripts', 'space_enqueue_assets');
