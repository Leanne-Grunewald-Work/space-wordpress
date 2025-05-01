<?php
/* Template Name: Destination */

get_header();
?>

<?php
$destinations = get_posts([
  'post_type'       => 'destination',
  'posts_per_page'  => -1,
  'no_found_rows'   => true,
  'orderby'         => 'title',
  'order'           => 'ASC',
]);
?>

<main 
x-data='{
    destination: "<?php echo $destinations[0]->post_name; ?>",
    destinations: {
      <?php foreach ($destinations as $d): 
        $slug = strtolower($d->post_name);
        $title = esc_js($d->post_title);
        $desc = esc_js(wp_strip_all_tags($d->post_content));
        $distance = esc_js(get_field('distance', $d->ID));
        $time = esc_js(get_field('travel_time', $d->ID));
        $image = esc_url(get_field('image', $d->ID)['url']);
      ?>
      "<?php echo $slug; ?>": {
        image: "<?php echo $image; ?>",
        description: "<?php echo $desc; ?>",
        distance: "<?php echo $distance; ?>",
        travelTime: "<?php echo $time; ?>"
      },
      <?php endforeach; ?>
    }
  }'
  class="flex flex-col lg:flex-row items-center justify-between px-6 pt-32 pb-20 lg:px-32 text-white text-center lg:text-left relative min-h-screen"
>
  <!-- Title -->
  <h5 class="text-lg sm:text-xl lg:text-2xl tracking-[4px] uppercase font-barlow_condensed mb-10 lg:absolute lg:top-[6rem] lg:left-32">
    <span class="text-white/25 font-bold mr-4">01</span> Pick your destination
  </h5>

  <!-- Moon Image -->
  <div class="flex justify-center lg:justify-start mb-12 lg:mb-0">
    <img :src="destinations[destination].image" :alt="destination" class="w-40 sm:w-60 lg:w-[445px] transition-all duration-500">
  </div>

  <!-- Right Side -->
  <div class="flex flex-col items-center lg:items-start space-y-8 max-w-md">
    <!-- Tabs -->
    <ul class="flex space-x-6 uppercase text-[#D0D6F9] text-sm tracking-widest font-barlow_condensed">
      <template x-for="name in Object.keys(destinations)" :key="name">
        <li @click="destination = name" 
            :class="destination === name ? 'border-b-2 border-white pb-2 text-white' : 'hover:text-white cursor-pointer'">
          <span x-text="name.charAt(0).toUpperCase() + name.slice(1)"></span>
        </li>
      </template>
    </ul>

    <!-- Name -->
    <h1 class="text-6xl sm:text-7xl lg:text-8xl font-bellefair uppercase" x-text="destination.toUpperCase()"></h1>

    <!-- Description -->
    <p class="text-[#D0D6F9] text-sm sm:text-base leading-relaxed font-barlow" x-text="destinations[destination].description"></p>

    <!-- Divider -->
    <hr class="w-full border-white/25 my-8">

    <!-- Stats -->
    <div class="flex flex-col sm:flex-row sm:justify-center lg:justify-start space-y-8 sm:space-y-0 sm:space-x-20">
      <div>
        <h6 class="text-sm font-barlow_condensed tracking-widest text-[#D0D6F9] uppercase">Avg. Distance</h6>
        <p class="text-2xl font-bellefair uppercase" x-text="destinations[destination].distance"></p>
      </div>
      <div>
        <h6 class="text-sm font-barlow_condensed tracking-widest text-[#D0D6F9] uppercase">Est. Travel Time</h6>
        <p class="text-2xl font-bellefair uppercase" x-text="destinations[destination].travelTime"></p>
      </div>
    </div>
  </div>
</main>

<?php
get_footer();
