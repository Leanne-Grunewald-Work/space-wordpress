<?php
/* Template Name: Technology */

get_header();
?>

<?php
$tech = get_posts([
  'post_type'       => 'technology',
  'posts_per_page'  => -1,
  'no_found_rows'   => true,
  'orderby'         => 'title',
  'order'           => 'ASC',
]);
?>

<main 
  x-data='{
    selected: "<?php echo $tech[0]->post_name; ?>",
    technology: {
      <?php foreach ($tech as $item): 
        $slug = strtolower($item->post_name);
        $name = htmlspecialchars($item->post_title, ENT_QUOTES);
        $desc = htmlspecialchars(wp_strip_all_tags($item->post_content), ENT_QUOTES);
        $image = esc_url(get_field('image', $item->ID)['url']);
      ?>
      "<?php echo $slug; ?>": {
        name: "<?php echo $name; ?>",
        description: "<?php echo $desc; ?>",
        image: "<?php echo $image; ?>"
      },
      <?php endforeach; ?>
    }
  }'
  class="flex flex-col lg:flex-row items-center justify-between px-6 pt-32 pb-20 lg:px-32 text-white text-center lg:text-left relative min-h-screen"
>

  <!-- Title -->
  <h5 class="text-lg sm:text-xl lg:text-2xl tracking-[4px] uppercase font-barlow_condensed mb-10 lg:absolute lg:top-[6rem] lg:left-32">
    <span class="text-white/25 font-bold mr-4">03</span> Space launch 101
  </h5>

  <!-- Text Block -->
  <div class="flex flex-col items-center lg:items-start space-y-8 max-w-md">

    <!-- Tabs (numbered buttons) -->
    <ul class="flex space-x-4">
      <template x-for="(key, index) in Object.keys(technology)" :key="key">
        <li>
          <button 
            @click="selected = key"
            :class="selected === key ? 'bg-white text-black' : 'bg-transparent border border-white text-white hover:bg-white/20'"
            class="w-10 h-10 rounded-full flex items-center justify-center text-lg font-bold transition-all duration-300"
            x-text="index + 1"
          ></button>
        </li>
      </template>
    </ul>

    <!-- Name -->
    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bellefair uppercase" x-text="technology[selected].name"></h1>

    <!-- Description -->
    <p class="text-[#D0D6F9] text-sm sm:text-base leading-relaxed font-barlow" x-text="technology[selected].description"></p>
  </div>

  <!-- Image -->
  <div class="flex justify-center lg:justify-start mt-10 lg:mt-0 mb-12 lg:mb-0">
    <img 
      :src="technology[selected].image" 
      :alt="technology[selected].name" 
      class="w-full max-w-md lg:max-w-lg object-contain transition-all duration-500"
      style="mask-image: linear-gradient(to bottom, white 85%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, white 85%, transparent 100%);"
    />
  </div>

</main>

<?php get_footer(); ?>
