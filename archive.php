<?php get_header(); ?>

<section class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-6"><?php woocommerce_page_title(); ?></h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        <?php if (woocommerce_product_loop()) : 
            while (have_posts()) : the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            woocommerce_pagination();
        endif; ?>
    </div>
</section>

<?php get_footer(); ?>
  
