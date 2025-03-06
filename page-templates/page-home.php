  
<?php
/*
Template Name: Home Page
*/
get_header();
?>

<!-- Hero Section -->
<section class="relative bg-gray-100 py-20 text-center">
    <div class="container mx-auto">
        <h1 class="text-5xl font-bold text-gray-900">Welcome to Your Store</h1>
        <p class="text-lg text-gray-600 mt-4">Discover the latest trends and best deals</p>
        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="mt-6 inline-block bg-blue-600 text-white py-3 px-6 rounded-lg text-lg">Shop Now</a>
    </div>
</section>

<!-- Featured Products -->
<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold text-center mb-8">Featured Products</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 4,
            'meta_key' => '_featured',
            'meta_value' => 'yes'
        );
        $featured_query = new WP_Query($args);
        if ($featured_query->have_posts()) :
            while ($featured_query->have_posts()) : $featured_query->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p class="text-center">No featured products available.</p>';
        endif;
        ?>
    </div>
</section>

<!-- Product Categories -->
<section class="bg-gray-200 py-16">
    <div class="container mx-auto text-center">
        <h2 class="text-3xl font-bold mb-8">Shop by Categories</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php
            $categories = get_terms('product_cat', array('hide_empty' => false));
            foreach ($categories as $category) :
                $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                $image_url = wp_get_attachment_url($thumbnail_id);
            ?>
                <a href="<?php echo get_term_link($category); ?>" class="block bg-white p-6 rounded-lg shadow-lg">
                    <?php if ($image_url) : ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" class="w-full h-40 object-cover mb-4 rounded-lg">
                    <?php endif; ?>
                    <h3 class="text-xl font-bold"><?php echo esc_html($category->name); ?></h3>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="container mx-auto py-16">
    <h2 class="text-3xl font-bold text-center mb-8">What Our Customers Say</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <p class="text-gray-600 italic">"Great quality products and fast delivery!"</p>
            <h4 class="font-bold mt-4">- John Doe</h4>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <p class="text-gray-600 italic">"Best online store ever! Highly recommended."</p>
            <h4 class="font-bold mt-4">- Jane Smith</h4>
        </div>
        <div class="bg-white p-6 shadow-lg rounded-lg text-center">
            <p class="text-gray-600 italic">"Amazing customer support and easy checkout process."</p>
            <h4 class="font-bold mt-4">- Sarah Lee</h4>
        </div>
    </div>
</section>

<?php get_footer(); ?>
