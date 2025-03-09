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
    <section class="relative w-full h-screen mx-auto sm:p-2 md:px-8 sm:p-2 md:py-8 rounded-lg ">
    <div class="swiper mySwiper h-screen rounded-lg ">
        <div class="swiper-wrapper h-screen rounded-lg ">

        <?php for ( $i = 1; $i <= 3; $i++ ) : 
                // Retrieve settings from Customizer
                $heading    = get_theme_mod( "my_slider_heading_$i", "Slide $i Heading" );
                $subheading = get_theme_mod( "my_slider_subheading_$i", "Slide $i Subheading" );
                $image_id   = get_theme_mod( "my_slider_image_$i" );
                
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
                <h2 class="text-4xl font-bold mb-2">
                <?php echo esc_html( $heading ); ?>
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
      class="inline-block bg-yellow-500 text-black px-6 py-3 rounded font-semibold hover:bg-yellow-600 transition"
    >
      Gauti pasiūlymą
    </a>
  </section>


<!--Second section  -->
<section class="max-w-7xl mx-auto px-4 py-12">
  <!-- Heading & Description -->
  <div class="md:flex md:items-center md:justify-between mb-8">
    <h2 class="text-3xl font-bold mb-4 md:mb-0">
      Produkcija
    </h2>
    <p class="text-gray-600 md:max-w-lg">
      <span><?php echo get_theme_mod('home_section2_produkcija_description', 'Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci mauris vel ac. Sollicitudin sapien molestie augue commodo.'); ?></span>
    </p>
  </div>

  <!-- Grid of Items -->
  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    <!-- Card Item 1 -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <!-- Image Container -->
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
        <img class="object-contain w-full h-full" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Langai.png' ); ?>" 
             alt="Langai window image" />
      </div>
      <h3 class="text-xl font-semibold mb-2">Langai</h3>
      <a href="#" class="mt-auto inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
        <span>Daugiau</span>
        <!-- Arrow Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

    <!-- Card Item 2 -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
        <img class="object-contain w-full h-full" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/florida-as-r.png' ); ?>" 
             alt="Durys image" />
      </div>
      <h3 class="text-xl font-semibold mb-2">Durys</h3>
      <a href="#" class="mt-auto inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
        <span>Daugiau</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

    <!-- Card Item 3 -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
        <img class="object-contain w-full h-full" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Žaliuzės.png' ); ?>" 
             alt="Žaliuzės image" />
      </div>
      <h3 class="text-xl font-semibold mb-2">Žaliuzės</h3>
      <a href="#" class="mt-auto inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
        <span>Daugiau</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

    <!-- Card Item 4 -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
        <img class="object-contain w-full h-full" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Roletai.png' ); ?>" 
             alt="Roletai image" />
      </div>
      <h3 class="text-xl font-semibold mb-2">Roletai</h3>
      <a href="#" class="mt-auto inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
        <span>Daugiau</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

    <!-- Card Item 5 -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
        <img class="object-contain w-full h-full" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Terasos.png' ); ?>" 
             alt="Terasos image" />
      </div>
      <h3 class="text-xl font-semibold mb-2">Terasos</h3>
      <a href="#" class="mt-auto inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
        <span>Daugiau</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>

    <!-- Card Item 6 -->
    <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
        <img class="object-contain w-full h-full" 
             src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Balkonai.png' ); ?>" 
             alt="Balkonai image" />
      </div>
      <h3 class="text-xl font-semibold mb-2">Balkonai</h3>
      <a href="#" class="mt-auto inline-flex items-center gap-2 text-yellow-500 hover:text-yellow-600 font-medium">
        <span>Daugiau</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
          <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
  </div>
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
        Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate.
        Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci
        mauris vel ac. Sollicitudin sapien molestie augue commodo.
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
<?php get_footer(); ?>
