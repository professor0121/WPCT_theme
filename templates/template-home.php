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
<div>
    <link
    rel="stylesheet"
    href="https://unpkg.com/swiper/swiper-bundle.min.css"
    />
    <section class="relative w-full h-screen mx-auto px-8 py-8 border rounded-lg">
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
            <div class="relative z-10 text-white top-72 left-24 px-4">
                <h2 class="text-4xl font-bold mb-2">
                <?php echo esc_html( $heading ); ?>
                </h2>
                <p class="text-xl mb-6">
                <?php echo esc_html( $subheading ); ?>
                </p>
                <!-- Example Buttons (Optional) -->
                <div class="flex flex-col sm:flex-row gap-4 justify-start">
                <a href="#" class="inline-block rounded-2xl bg-white text-black font-semibold px-6 py-3 rounded shadow hover:bg-gray-200 transition">
                    Kainų skaičiuoklė
                </a>
                <a href="#" class="inline-block rounded-2xl bg-yellow-500 text-white font-semibold px-6 py-3 rounded shadow hover:bg-yellow-600 transition">
                    Gauti pasiūlymą
                </a>
                </div>
            </div>
            </div>
        <?php endfor; ?>

        </div>

        <!-- Swiper Navigation -->
        <div class="swiper-button-next text-white"></div>
        <div class="swiper-button-prev text-white"></div>
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
<section class="flex flex-col items-center justify-center  px-6 py-18">
    <!-- Icon or Logo -->
    <div class="mb-6">
      <!-- Replace the placeholder below with your actual icon/logo -->
      <img 
        src="https://via.placeholder.com/40" 
        alt="Icon" 
        class="h-10 w-10 mx-auto"
      />
    </div>

    <!-- Main Text -->
    <p class="text-lg md:text-xl max-w-3xl text-center leading-relaxed mb-8">
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
      <span><?php echo get_theme_mod('home_section2_produkcija_description', ' Lorem ipsum dolor sit amet consectetur. Nec ac egestas sed amet gravida vulputate. 
        Placari tempor cursus sit feugiat at sit nisl vel. Ridiculus nulla faucibus at orci 
        mauris vel ac. Sollicitudin sapien molestie augue commodo.'); ?></span>
      </p>
    </div>

    <!-- Grid of Items -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <!-- Card Item 1 -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
        <!-- Replace the placeholder with an actual image/icon if desired -->
        <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
            
            <img 
                class="object-contain w-full h-full" 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Langai.png' ); ?>" 
                alt="Langai window image" 
            />
            
        </div>

        <h3 class="text-xl font-semibold mb-2">Langai</h3>
        <a href="#" class="mt-auto inline-flex gap-56 items-center text-yellow-500 hover:text-yellow-600 font-medium">
          <span class="mr-2">Daugiau</span>
          <!-- Arrow Icon -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 0 111.414-1.414l5 5a1 
            1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>

      <!-- Card Item 2 -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
            
            <img 
                class="object-contain w-full h-full" 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/florida-as-r.png' ); ?>" 
                alt="Langai window image" 
            />
            
        </div>
        <h3 class="text-xl font-semibold mb-2">Durys</h3>
        <a href="#" class="mt-auto inline-flex gap-56 items-center text-yellow-500 hover:text-yellow-600 font-medium">
          <span class="mr-2">Daugiau</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 1 
            0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>

      <!-- Card Item 3 -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
            
            <img 
                class="object-contain w-full h-full" 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Žaliuzės.png' ); ?>" 
                alt="Langai window image" 
            />
            
        </div>
        <h3 class="text-xl font-semibold mb-2">Žaliuzės</h3>
        <a href="#" class="mt-auto inline-flex gap-56 items-center text-yellow-500 hover:text-yellow-600 font-medium">
          <span class="mr-2">Daugiau</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 
            1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>

      <!-- Card Item 4 -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
            
            <img 
                class="object-contain w-full h-full" 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Roletai.png' ); ?>" 
                alt="Langai window image" 
            />
            
        </div>
        <h3 class="text-xl font-semibold mb-2">Roletai</h3>
        <a href="#" class="mt-auto inline-flex gap-56 items-center text-yellow-500 hover:text-yellow-600 font-medium">
          <span class="mr-2">Daugiau</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 
            1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>

      <!-- Card Item 5 -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
            
            <img 
                class="object-contain w-full h-full" 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Terasos.png' ); ?>" 
                alt="Langai window image" 
            />
            
        </div>
        <h3 class="text-xl font-semibold mb-2">Terasos</h3>
        <a href="#" class="mt-auto inline-flex gap-56 items-center text-yellow-500 hover:text-yellow-600 font-medium">
          <span class="mr-2">Daugiau</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 
            1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>

      <!-- Card Item 6 -->
      <div class="bg-gray-50 border border-gray-200 rounded-lg p-6 flex flex-col">
      <div class="mb-4 h-32 w-full py-3 bg-gray-200 flex items-center justify-center rounded overflow-hidden">
            
            <img 
                class="object-contain w-full h-full" 
                src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/Balkonai.png' ); ?>" 
                alt="Langai window image" 
            />
            
        </div>
        <h3 class="text-xl font-semibold mb-2">Balkonai</h3>
        <a href="#" class="mt-auto flex gap-56 space-between text-yellow-500 hover:text-yellow-600 font-medium">
          <span class="mr-2">Daugiau</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L13.586 11H3a1 1 0 110-2h10.586l-3.293-3.293a1 
            1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </section>

<?php get_footer(); ?>
