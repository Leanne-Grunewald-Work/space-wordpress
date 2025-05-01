<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(''); ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Barlow+Condensed&family=Bellefair&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>
<body <?php
  $extra_classes = '';
  if (is_page('destination')) {
    $extra_classes .= 'page-destination ';
  } elseif (is_page('crew')) {
    $extra_classes .= 'page-crew ';
  } elseif (is_page('technology')) {
    $extra_classes .= 'page-technology ';
  }
  body_class(trim($extra_classes . 'min-h-screen font-sans overflow-x-hidden'));
?>>

    <header x-data="{ open: false }" class="absolute top-0 left-0 w-full px-6 py-6 flex items-center justify-between z-50">
    <!-- Logo -->
    <div>
        <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Space Travel Logo" class="w-10 h-10">
        </a>
    </div>

    <!-- Hamburger (Mobile only) -->
    <button @click="open = true" class="lg:hidden text-white focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>

    <!-- Desktop Nav -->
    <nav class="hidden lg:flex bg-white/5 backdrop-blur-md px-12 py-6 rounded-md">
        <ul class="flex items-center gap-10 text-white uppercase text-sm tracking-widest font-barlow_condensed">
        <?php
            $menu = [
            ['name' => '00 Home', 'url' => home_url('/'), 'match' => is_front_page()],
            ['name' => '01 Destination', 'url' => site_url('/destination'), 'match' => is_page('destination')],
            ['name' => '02 Crew', 'url' => site_url('/crew'), 'match' => is_page('crew')],
            ['name' => '03 Technology', 'url' => site_url('/technology'), 'match' => is_page('technology')],
            ];

            foreach ($menu as $item) {
            echo '<li>
                <a href="' . $item['url'] . '" class="relative group ' . ($item['match'] ? 'font-bold' : '') . '">
                ' . $item['name'] . '
                <span class="absolute left-0 -bottom-2 w-0 h-[2px] bg-white transition-all duration-300 group-hover:w-full ' . ($item['match'] ? 'w-full' : '') . '"></span>
                </a>
            </li>';
            }
        ?>
        </ul>
    </nav>

    <!-- Mobile Fullscreen Nav -->
    <div 
        x-show="open"
        x-transition 
        class="fixed inset-0 bg-white/10 backdrop-blur-md flex flex-col items-end p-8 space-y-20 text-white font-barlow_condensed uppercase tracking-widest text-lg z-50"
    >
        <!-- Close Button -->
        <button @click="open = false" class="text-white text-4xl">&times;</button>

        <!-- Mobile Nav Links -->
        <ul class="w-full text-right mt-10 space-y-8 pr-8 text-sm tracking-widest">
        <?php
            foreach ($menu as $item) {
            echo '<li>
                <a href="' . $item['url'] . '" @click="open = false" class="' . ($item['match'] ? 'font-bold underline underline-offset-4' : '') . '">
                ' . $item['name'] . '
                </a>
            </li>';
            }
        ?>
        </ul>
    </div>
    </header>


