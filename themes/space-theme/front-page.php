<?php
/* Template for the homepage */

get_header();
?>

<section class="min-h-screen text-white flex flex-col lg:flex-row items-center justify-between px-6 pt-20 pb-12 lg:px-32 lg:pt-32 lg:pb-20 text-center lg:text-left">
  
  <!-- Hero Text Content -->
  <div class="max-w-md lg:max-w-lg space-y-6 mt-10 lg:mt-0">
    <h2 class="text-lg sm:text-xl lg:text-2xl tracking-[4px] text-[#D0D6F9] uppercase font-['Barlow_Condensed']">
      <?php the_field('intro_text'); ?>
    </h2>
    <h1 class="text-7xl sm:text-8xl lg:text-9xl uppercase font-['Bellefair']">
      <?php the_field('main_heading'); ?>
    </h1>
    <p class="text-[#D0D6F9] text-sm sm:text-base lg:text-lg leading-relaxed font-['Barlow'] max-w-md lg:max-w-lg">
      <?php the_field('description'); ?>
    </p>
  </div>

  <!-- Explore Button -->
  <div class="my-20 lg:my-0">
    <a href="<?php the_field('explore_button_link'); ?>" 
       class="w-40 h-40 lg:w-[274px] lg:h-[274px] bg-white text-[#0B0D17] rounded-full flex items-center justify-center text-xl lg:text-3xl font-['Bellefair'] uppercase hover:scale-110 transition-transform duration-300">
      <?php the_field('explore_button_text'); ?>
    </a>
  </div>
</section>



<?php
get_footer();
