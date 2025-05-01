<?php
/* Template Name: Crew */

get_header();
?>

<?php
$crew = get_posts([
  'post_type'       => 'crew',
  'posts_per_page'  => -1,
  'no_found_rows'   => true,
  'orderby'         => 'title',
  'order'           => 'ASC',
]);
?>

<main 
  x-data='{
    selected: "<?php echo $crew[0]->post_name; ?>",
    crew: {
      <?php foreach ($crew as $member): 
        $slug = strtolower($member->post_name);
        $name = esc_js($member->post_title);
        $bio = esc_js(wp_strip_all_tags($member->post_content));
        $role = esc_js(get_field('role', $member->ID));
        $image = esc_url(get_field('image', $member->ID)['url']);
      ?>
      "<?php echo $slug; ?>": {
        name: "<?php echo $name; ?>",
        role: "<?php echo $role; ?>",
        bio: "<?php echo $bio; ?>",
        image: "<?php echo $image; ?>"
      },
      <?php endforeach; ?>
    }
  }'
  class="flex flex-col lg:flex-row items-center justify-between px-6 pt-32 pb-20 lg:px-32 text-white text-center lg:text-left relative min-h-screen"
>
  <!-- Title -->
  <h5 class="text-lg sm:text-xl lg:text-2xl tracking-[4px] uppercase font-barlow_condensed mb-10 lg:absolute lg:top-[6rem] lg:left-32">
    <span class="text-white/25 font-bold mr-4">02</span> Meet your crew
  </h5>

  

  <!-- Right Side -->
  <div class="flex flex-col items-center lg:items-start space-y-8 max-w-md">

    <!-- Tabs (dots) -->
    <ul class="flex space-x-4">
      <template x-for="name in Object.keys(crew)" :key="name">
        <li>
          <button 
            @click="selected = name" 
            :class="selected === name ? 'bg-white' : 'bg-white/25 hover:bg-white/50'" 
            class="w-4 h-4 rounded-full transition-all duration-300"
            aria-label="Switch crew member">
          </button>
        </li>
      </template>
    </ul>

    <!-- Role -->
    <h6 class="text-xl text-white/50 font-bellefair uppercase tracking-widest" x-text="crew[selected].role"></h6>

    <!-- Name -->
    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bellefair uppercase" x-text="crew[selected].name"></h1>

    <!-- Bio -->
    <p class="text-[#D0D6F9] text-sm sm:text-base leading-relaxed font-barlow" x-text="crew[selected].bio"></p>

  </div>

  <!-- Crew Image -->
  <div class="flex justify-center lg:justify-start mb-12 lg:mb-0 mt-10 lg:mt-0">
    <img 
    :src="crew[selected].image" 
    :alt="crew[selected].name" 
    class="w-40 sm:w-60 lg:w-[445px] transition-all duration-500"
    style="mask-image: linear-gradient(to bottom, white 85%, transparent 100%); -webkit-mask-image: linear-gradient(to bottom, white 85%, transparent 100%);"
    >

  </div>
</main>

<?php get_footer(); ?>
