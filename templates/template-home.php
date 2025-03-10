<?php
/**
 * Template Name: Custom Home Page
 *
 * This template displays the home page using Customizer settings.
 *
 * @package WPCT_theme
 */

get_header();
?>
<!--Hero section  -->
<div class="bg-gray-900">
  
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <section class="relative w-full h-[95vh] overflow-hidden mx-auto   md:px-24 sm:p-2 md:py-8 rounded-3xl ">
    <div class="swiper mySwiper  rounded-2xl h-full ">
        <div class="swiper-wrapper  rounded-2xl h-full ">

        <?php for ( $i = 1; $i <= 3; $i++ ) : 
                // Retrieve settings from Customizer
                $heading    = get_theme_mod( "my_slider_heading_$i", "Slide $i Heading" );
                $subheading = get_theme_mod( "my_slider_subheading_$i", "Slide $i Subheading" );
                $image_id   = get_theme_mod( "my_slider_image_$i" );
                $color_heading=get_theme_mod("my_slider_color_heading_$i");
                
                if ( ! $image_id ) {
                    // If no image is set, skip the slide
                    continue;
                }
                
                $image_url = wp_get_attachment_url( $image_id );
        ?>
            <!-- Each Slide -->
            <div class="swiper-slide relative h-[80vh] bg-center bg-cover flex items-center justify-center "
                style="background-image: url('<?php echo esc_url( $image_url ); ?>');">

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-30 "></div>

            <!-- Slide Content -->
            <div class="relative z-10 text-white md:top-72 md:left-24 md:px-4 px-10 top-15">
                <h2 class="text-4xl font-bold mb-2 flex">
                <span><?php echo esc_html( $heading ); ?></span>
                <span><?php echo esc_html( $color_heading ); ?></span>
                </h2>
                <p class="text-xl mb-6">
                <?php echo esc_html( $subheading ); ?>
                </p>
                <!-- Example Buttons (Optional) -->
                <div class="flex flex-col sm:flex-row gap-4 justify-start">
                <a href="#" class="inline-block rounded-2xl self-start bg-white text-black font-semibold px-6 py-3 rounded shadow hover:bg-gray-200 transition">
                    Kainų skaičiuoklė
                </a>
                <a href="#" class="inline-block rounded-2xl self-start bg-yellow-500 text-white font-semibold px-6 py-3 rounded shadow hover:bg-yellow-600 transition">
                    Gauti pasiūlymą
                </a>
                </div>
            </div>
            </div>
        <?php endfor; ?>

        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next text-white hidden md:block"></div>
        <div class="swiper-button-prev text-white hidden md:block"></div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
    </div>
    </section>

    <!-- Swiper JS (CDN for demonstration) -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
    const swiper = new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
        delay: 5000,
        disableOnInteraction: false,
        },
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        pagination: {
        el: '.swiper-pagination',
        clickable: true,
        },
        speed: 800,
        effect: 'fade',
        fadeEffect: {
        crossFade: true,
        },
    });
    </script>
</div>

<!--First section  -->
<section class="flex flex-col items-center bg-gray-900 justify-center  px-6 py-18">
    <!-- Icon or Logo -->
    <div class="mb-6">
      <!-- Replace the placeholder below with your actual icon/logo -->
      <img 
        src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/logo.png"
        alt="Icon" 
        class="h-10 w-30 mx-auto"
      />
    </div>

    <!-- Main Text -->
    <p class="text-lg md:text-xl max-w-3xl text-center text-white leading-relaxed mb-8">
       <?php echo get_theme_mod('home_section1_description',' Elegantiško dizaino, ilgaamžiai, dėmėsingi ekologijai sprendimai Jūsų namams, balkonui, terasai ar biurui! Nes kokybė atsipeka.')?>
      <span class="text-yellow-500 font-semibold">
      <?php echo get_theme_mod('home_section1_color_description','Nes kokybė atsipeka.')?>
        </span>
    </p>

    <!-- Call-to-Action Button -->
    <a 
      href="#" 
      class="inline-block bg-yellow-500 text-black px-6 py-3 rounded-2xl font-semibold hover:bg-yellow-600 transition"
    >
      Gauti pasiūlymą
    </a>
  </section>


<!--Second section  -->
<section class="w-[90vw] self-center bg-[#F7F7F7] mx-14 py-12">
     <!-- Heading & Description -->
  <div class="md:flex md:items-center md:justify-between mb-8">
    <h2 class="text-3xl font-bold mb-4 md:mb-0">
      Produkcija
    </h2>
    <p class="text-gray-600 md:max-w-lg">
      <span><?php echo get_theme_mod('home_section2_produkcija_description', 'Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci mauris vel ac. Sollicitudin sapien molestie augue commodo.'); ?></span>
    </p>
  </div>
    <?php

    
    // Query for all production post IDs.
    $production_posts = get_posts( array(
        'post_type'      => 'production',
        'posts_per_page' => -1,
        'fields'         => 'ids',
    ) );

    if ( ! empty( $production_posts ) ) {
        // Retrieve only the categories associated with these production posts.
        $terms = get_terms( array(
            'taxonomy'   => 'category', // Change this if you are using a custom taxonomy.
            'hide_empty' => true,
            'object_ids' => $production_posts,
        ) );

        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
            // You can wrap the cards in a container div if needed.
            echo '<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">';
            foreach ( $terms as $term ) {
                // Get the link and title (name) of the category.
                $term_link = esc_url( get_term_link( $term ) );
                $term_name = esc_html( $term->name );
                
                // Attempt to get the category image.
                // Replace 'category-image-id' with your actual meta key.
                $term_image_id = get_term_meta( $term->term_id, 'category-image-id', true );
                $image_url = '';
                if ( $term_image_id ) {
                    // This returns an array, the first item is the URL.
                    $image_data = wp_get_attachment_image_src( $term_image_id, 'thumbnail' );
                    if ( $image_data ) {
                        $image_url = $image_data[0];
                    }
                }
                // Use a default image if no image is found.
                if ( empty( $image_url ) ) {
                    $image_url = get_template_directory_uri() . '/assets/images/florida-as-r.png';
                }
                ?>
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col overflow-hidden">
                  <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
                    <a href="<?php echo $term_link; ?>">
                      <img class="object-contain w-full h-full" src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $term_name ); ?>" />
                    </a>
                  </div>
                  <a href="<?php echo $term_link; ?>" class="mt-auto inline-flex justify-between  gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
                    <span><?php echo $term_name; ?></span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 bg-yellow-500" fill="black" viewBox="0 0 20 20">
                      <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                  </a>
                </div>
                <?php
            }
            echo '</div>';
        } else {
            echo 'No categories found for production posts.';
        }
    } else {
        echo 'No production posts found.';
    }
    ?>

</section>

 
<!--Third section-->
<section class="max-w-7xl mx-auto px-4 py-12">
  <!-- Top: Heading and Description -->
  <div class="md:flex md:items-start md:justify-between mb-10">
    <!-- Heading -->
    <div class="md:w-1/3 mb-4 md:mb-0">
      <h2 class="text-3xl font-bold">Paslaugos</h2>
    </div>
    <!-- Description -->
    <div class="md:w-2/3 text-gray-600 leading-relaxed">
      <p>
        <!-- Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate.
        Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci
        mauris vel ac. Sollicitudin sapien molestie augue commodo. -->
        <?php echo get_theme_mod( 'home_Paslaugos_description', '' );?>
      </p>
    </div>
  </div>

  <!-- Services Grid: 3 columns, 4 rows (12 items) -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    
    <!-- 1. Kainos skaičiuoklė -->
    <div class="flex items-center justify-between   border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Vector.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Kainos skaičiuoklė</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <!-- Arrow Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 2. Techninė konsultacija -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/ChatText.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Techninė konsultacija</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 3. Gamyinių any matavimas -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Vector(1).png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Gamyinių any matavimas</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 4. Projekto paruošimas -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/PencilRuler.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Projekto paruošimas</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 5. Gamyinių demontavimas -->
    <div class="flex items-center justify-between border border-gray-200 rounded-lg bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Hammer.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Gamyinių demontavimas</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 6. Langų ir durų montavimas -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Wrench.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Langų ir durų montavimas</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 7. Dažinė angokraščių apdaila -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/DoorOpen.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Dažinė angokraščių apdaila</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 8. Pilna angokraščių apdaila -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Door.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Pilna angokraščių apdaila</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 9. Gamyinių pristatymas -->
    <div class="flex items-center justify-between border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Truck.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Gamyinių pristatymas</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 10. Garantinė priežiūra -->
    <div class="flex items-center justify-between  border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/ShieldCheck.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Garantinė priežiūra</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 11. Pogarantinė priežiūra -->
    <div class="flex items-center justify-between   border-gray-200 rounded-lg  bg-[#F7F7F7] px-8 py-6  shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/SealCheck.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Pogarantinė priežiūra</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

    <!-- 12. Montuotojo iškvietimas -->
    <div class="flex items-center justify-between  border border-gray-200 rounded-lg bg-[#F7F7F7] px-8 py-6 shadow-sm">
    <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/User.png' ); ?>" 
             alt="Langai window image" />
      <span class="font-medium text-gray-900">Montuotojo iškvietimas</span>
      <div class="bg-yellow-500 w-8 h-8 rounded-full flex items-center justify-center text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd"
                d="M10.293 15.707a1 1 0 
                   010-1.414L13.586 11H3a1 
                   1 0 110-2h10.586l-3.293-3.293a1 
                   1 0 111.414-1.414l5 5a1 
                   1 0 010 1.414l-5 5a1 
                   1 0 01-1.414 0z"
                clip-rule="evenodd" />
        </svg>
      </div>
    </div>

  </div>
</section>
<!--fourth section -->

<section class="relative bg-black text-white py-16">
  <!-- Optional Decorative Shapes -->
  <!-- Top Right Shape -->
  <div class="hidden lg:block absolute top-8 right-8 w-32 h-32 border-4 border-yellow-500 rounded-[40%]"></div>
  <!-- Bottom Left Shape -->
  <div class="hidden lg:block absolute bottom-8 left-8 w-32 h-32 border-4 border-yellow-500 rounded-[40%]"></div>

  <div class="max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8 relative">
    <!-- Left Column: Heading & Bullet Items -->
    <div class="flex flex-col justify-center">
      <!-- Heading -->
      <h2 class="text-3xl md:text-4xl font-bold mb-6">
        Kodėl verta rinktis mus?
      </h2>

      <!-- Bullet / Feature Items -->
      <div class="space-y-6 text-gray-200 leading-relaxed">
        <!-- 1. Lengvas įsigijimo procesas -->
         <div class="flex">
            <div>
            <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Bag.png' ); ?>" 
             alt="Langai window image" />
            <h3 class="font-semibold text-lg mb-1">Lengvas įsigijimo procesas</h3>
            <p class="text-sm">
                Greita reakcija, išskirtinis patogumas užsakant. Ekspertinis patarimas, kad pasirinktumėte 
                tinkamiausius produktus. Sklandus bendradarbiavimas ir skaidrus, aiškus montavimo procesas – 
                vos savaite!
            </p>
            </div>

            <!-- 2. Aukšta kokybė ir ilgaamžiškumas -->

            <div>
            <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Bag.png' ); ?>" 
             alt="Langai window image" />
            <h3 class="font-semibold text-lg mb-1">Aukšta kokybė ir ilgaamžiškumas</h3>
            <p class="text-sm">
                Langai – saugiai vartomi ir lengvai prižiūrimi. Europos Sąjungoje pagaminti 
                EURO-Design 86 PREMIUM profiliai užtikrina tvirtumą bei šilumos izoliaciją. 
                Dvigubi ar trigubi stiklai, kokybiškos furnitūros – kad viskas tarnautų ilgai.
            </p>
            </div>
        </div>

        <!-- 3. Platus darbų spektras -->
         <div class="flex">
            <div>
            <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Bag.png' ); ?>" 
             alt="Langai window image" />
            <h3 class="font-semibold text-lg mb-1">Platus darbų spektras</h3>
            <p class="text-sm">
                Teikiame visapusiškas paslaugas: langų, durų, roletų, žaliuzių, terasų montavimas 
                ir priežiūra. Sumontuojame pagal jūsų poreikius, atsižvelgiame į unikalias situacijas, 
                kad kiekvienas projektas būtų išpildytas profesionaliai.
            </p>
            </div>

            <!-- 4. Išskirtinis klientų aptarnavimas ir servis -->
            <div>
            <img class="object-contain w-8 h-8" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/Bag.png' ); ?>" 
             alt="Langai window image" />
            <h3 class="font-semibold text-lg mb-1">Išskirtinis klientų aptarnavimas ir servis</h3>
            <p class="text-sm">
                Vertiname kiekvieną klientą. Greitai reaguojame į užklausas, pateikiame 
                aiškius atsakymus, prireikus atvykstame į vietą. Bet kokie klausimai netruks 
                būti išspręsti, o garantinės priežiūros laikas gali būti pratęstas pagal 
                jūsų poreikius iki 10 metų.
            </p>
            </div>
        </div>
      </div>

      <!-- CTA Button -->
      <div class="mt-8">
        <a href="#"
           class="inline-block bg-yellow-500 text-black font-semibold px-6 py-3 rounded shadow hover:bg-yellow-600 transition">
          Žiūrėti produkciją
        </a>
      </div>
    </div>

    <!-- Right Column: Image -->
    <div class="flex items-center justify-center">
      <img
      src="<?php echo esc_url( get_template_directory_uri() . '/assets/icons/girl.png' ); ?>"
              alt="Woman installing blinds"
        class="rounded-md shadow-lg object-cover w-full md:w-auto"
      />
    </div>
  </div>
</section>
<!--Fifth section-->
<section class="max-w-7xl mx-auto px-4 py-12">
  <!-- Section Heading -->
  <div class="text-center mb-8">
    <h2 class="text-3xl md:text-4xl font-bold mb-2">Atsiliepimai</h2>
    <p class="text-gray-600 max-w-2xl mx-auto">
      Langų sistemos — randa sprendimus kiekvienam klientui. Prisijunkite prie patenkintų klientų, greta!
    </p>
  </div>

  <!-- Rating & Avatars Row -->
  <div class="flex flex-col items-center justify-center gap-4 mb-8 md:flex-row">
    <!-- Avatars (example images) -->
    <div class="flex -space-x-2">
      <img class="w-10 h-10 rounded-full border-2 border-white"
           src="https://via.placeholder.com/40" alt="User1" />
      <img class="w-10 h-10 rounded-full border-2 border-white"
           src="https://via.placeholder.com/40" alt="User2" />
      <img class="w-10 h-10 rounded-full border-2 border-white"
           src="https://via.placeholder.com/40" alt="User3" />
      <img class="w-10 h-10 rounded-full border-2 border-white"
           src="https://via.placeholder.com/40" alt="User4" />
      <img class="w-10 h-10 rounded-full border-2 border-white"
           src="https://via.placeholder.com/40" alt="User5" />
    </div>

    <!-- Score -->
    <div class="flex items-center text-yellow-500 font-semibold text-lg">
      <span class="mr-1">4.9</span>
      <span class="text-gray-400">/ 5</span>
    </div>

    <!-- Label -->
    <span class="text-gray-600 text-sm">Klientų įvertinimas</span>
  </div>

  <!-- Testimonials Grid (6 items) -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <!-- Testimonial 1 -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col">
      <p class="text-gray-600 mb-4">
        “Lorem ipsum dolor sit amet consectetur. Duis euismod convallis ultrices. 
        Proin sed diam lorem. Eu eget tristique fermentum!”
      </p>
      <span class="mt-auto font-semibold text-gray-800">Olivia Gardens</span>
    </div>

    <!-- Testimonial 2 -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col">
      <p class="text-gray-600 mb-4">
        “Duis euismod convallis ultrices. Proin sed diam lorem. 
        Eu eget tristique fermentum! Lorem ipsum dolor sit amet.”
      </p>
      <span class="mt-auto font-semibold text-gray-800">Apsae Press</span>
    </div>

    <!-- Testimonial 3 -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col">
      <p class="text-gray-600 mb-4">
        “Lorem ipsum dolor sit amet consectetur. Duis euismod convallis ultrices. 
        Proin sed diam lorem. Nunc ut nulla in metus vulputate posuere.”
      </p>
      <span class="mt-auto font-semibold text-gray-800">Corey Accord</span>
    </div>

    <!-- Testimonial 4 -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col">
      <p class="text-gray-600 mb-4">
        “Aliquam id orci ut orci feugiat faucibus. Lorem ipsum dolor sit amet consectetur. 
        Duis euismod convallis ultrices.”
      </p>
      <span class="mt-auto font-semibold text-gray-800">Skylar Vaccaro</span>
    </div>

    <!-- Testimonial 5 -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col">
      <p class="text-gray-600 mb-4">
        “Praesent tincidunt lacinia dolor, eget finibus massa faucibus quis. 
        Morbi a luctus quam. Lorem ipsum dolor sit amet.”
      </p>
      <span class="mt-auto font-semibold text-gray-800">Jaylon Aminoff</span>
    </div>

    <!-- Testimonial 6 -->
    <div class="bg-white rounded-lg shadow p-6 flex flex-col">
      <p class="text-gray-600 mb-4">
        “Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia. 
        Duis euismod convallis ultrices.”
      </p>
      <span class="mt-auto font-semibold text-gray-800">Reyna Baxter</span>
    </div>
  </div>

  <!-- CTA Button -->
  <div class="mt-8 text-center">
    <a href="#"
       class="inline-block bg-black text-white font-semibold px-6 py-3 rounded hover:bg-gray-800 transition">
      Daugiau atsiliepimų
    </a>
  </div>
</section>

<!--sixth section-->

<section class="relative bg-black text-white py-16 overflow-hidden">
  <!-- Center Content -->
  <div class="relative z-10 max-w-xl mx-auto text-center">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">
      Mūsų naujienos ir patys geriausi pasiūlymai
    </h2>

    <!-- Social Icons -->
    <div class="flex items-center justify-center gap-4 mt-8">
      <!-- Facebook Button (example) -->
      <a href="#"
         class="bg-yellow-500 text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
          <path d="M22.675 0h-21.35C.597 0 
                   0 .598 0 1.333v21.333C0 23.402.597 
                   24 1.325 24H12.82v-9.294H9.692V11.06h3.128V8.414c0-3.1 
                   1.893-4.788 4.66-4.788 1.324 0 2.462.098 
                   2.79.142v3.24l-1.918.001c-1.504 
                   0-1.794.715-1.794 1.763v2.31h3.587l-.467 
                   3.646h-3.12V24h6.116c.728 0 1.325-.598 
                   1.325-1.334V1.333C24 .598 23.403 
                   0 22.675 0"/>
        </svg>
      </a>
      <!-- Instagram Button (example) -->
      <a href="#"
         class="bg-yellow-500 text-black px-4 py-2 rounded-full hover:bg-yellow-600 transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" fill="currentColor" viewBox="0 0 24 24">
          <path d="M12 2.163c3.204 
                   0 3.584.012 4.85.07 1.17.054 1.796.24 
                   2.218.399.55.214.95.47 1.366.887.417.416.673.816.887 
                   1.366.16.422.345 1.048.399 2.218.058 
                   1.266.07 1.646.07 4.85s-.012 
                   3.584-.07 4.85c-.054 1.17-.24 
                   1.796-.399 2.218-.214.55-.47.95-.887 
                   1.366-.416.417-.816.673-1.366.887-.422.16-1.048.345-2.218.399-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.796-.24-2.218-.399-.55-.214-.95-.47-1.366-.887-.417-.416-.673-.816-.887-1.366-.16-.422-.345-1.048-.399-2.218C2.175 
                   15.584 2.163 15.204 2.163 
                   12s.012-3.584.07-4.85c.054-1.17.24-1.796.399-2.218.214-.55.47-.95.887-1.366.416-.417.816-.673 
                   1.366-.887.422-.16 1.048-.345 2.218-.399 1.266-.058 1.646-.07 
                   4.85-.07zm0-2.163C8.71 0 8.292.012 
                   7.052.07 5.811.129 4.845.317 4.043.63c-.845.33-1.556.77-2.268 
                   1.482-.712.713-1.153 1.423-1.482 
                   2.268-.314.802-.5 1.768-.56 
                   3.009C.012 8.292 0 8.71 0 
                   12c0 3.29.012 3.708.07 4.948.06 
                   1.241.247 2.207.56 3.009.33.845.77 
                   1.556 1.482 2.268.713.712 
                   1.423 1.153 2.268 1.482.802.314 
                   1.768.5 3.009.56 1.24.058 
                   1.658.07 4.948.07s3.708-.012 
                   4.948-.07c1.241-.06 2.207-.247 
                   3.009-.56.845-.33 1.556-.77 
                   2.268-1.482.712-.713 1.153-1.423 
                   1.482-2.268.314-.802.5-1.768.56-3.009.058-1.24.07-1.658.07-4.948s-.012-3.708-.07-4.948c-.06-1.241-.247-2.207-.56-3.009-.33-.845-.77-1.556-1.482-2.268-.713-.712-1.423-1.153-2.268-1.482-.802-.314-1.768-.5-3.009-.56C15.708.012 
                   15.29 0 12 0zM12 
                   5.838a6.162 6.162 0 100 
                   12.324 6.162 6.162 0 000-12.324zm0 
                   10.162a3.999 3.999 0 110-7.998 
                   3.999 3.999 0 010 7.998zm6.406-11.845a1.44 
                   1.44 0 11-2.88 
                   0 1.44 1.44 0 012.88 0z"/>
        </svg>
      </a>
    </div>
  </div>

  <!-- Top-Left Image & Shape -->
  <div class="hidden lg:block absolute top-8 left-8">
    <!-- Optional shape -->
    <div class="absolute inset-0 border-4 border-yellow-500 rounded-[20%] -z-10"></div>
    <img
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/frame112.png' ); ?>" 

      alt="Top Left"
      class="rounded-md w-40 h-40 object-cover shadow-md"
    />
  </div>

  <!-- Top-Right Image & Shape -->
  <div class="hidden lg:block absolute top-8 right-8">
    <div class="absolute inset-0 border-4 border-yellow-500 rounded-[20%] -z-10"></div>
    <img
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/frame113.png' ); ?>" 
      alt="Top Right"
      class="rounded-md w-40 h-40 object-cover shadow-md"
    />
  </div>

  <!-- Bottom-Left Image & Shape -->
  <div class="hidden lg:block absolute bottom-8 left-8">
    <div class="absolute inset-0 border-4 border-yellow-500 rounded-[20%] -z-10"></div>
    <img
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/frame114.png' ); ?>" 
      alt="Bottom Left"
      class="rounded-md w-40 h-40 object-cover shadow-md"
    />
  </div>

  <!-- Bottom-Right Image & Shape -->
  <div class="hidden lg:block absolute bottom-8 right-8">
    <div class="absolute inset-0 border-4 border-yellow-500 rounded-[20%] -z-10"></div>
    <img
    src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/frame115.png' ); ?>" 
      alt="Bottom Right"
      class="rounded-md w-40 h-40 object-cover shadow-md"
    />
  </div>
</section>
<?php get_footer(); ?>
