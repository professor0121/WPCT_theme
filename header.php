<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/custom.css">

    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-white shadow-md py-4">
    <div class="container mx-auto flex items-center justify-between px-4 lg:px-8">
        <!-- Logo -->
        <div class="logo">
            <?php 
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                echo '<a href="' . esc_url(home_url('/')) . '" class="text-xl font-bold">MyShop</a>';
            }
            ?>
        </div>

        <!-- Navigation -->
        <nav class="hidden md:flex space-x-6">
            <?php wp_nav_menu([
                'theme_location' => 'primary', 
                'menu_class' => 'flex space-x-6 font-medium text-gray-700 navbariteams'
            ]); ?>
        </nav>

        <!-- WooCommerce Cart Icon -->
        <div class="relative">
            <a href="<?php echo wc_get_cart_url(); ?>" class="relative flex items-center space-x-2">
                <span class="text-lg">🛒</span>
                <span class="cart-count bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full absolute -top-2 -right-2">
                    <?php echo WC()->cart->get_cart_contents_count(); ?>
                </span>
            </a>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="md:hidden text-gray-700 text-2xl focus:outline-none">
            ☰
        </button>
    </div>

    <!-- Mobile Menu (Hidden by Default) -->
    <nav id="mobile-menu" class="hidden md:hidden bg-white shadow-lg p-4 absolute top-full left-0 w-full z-50">
        <?php wp_nav_menu([
            'theme_location' => 'primary', 
            'menu_class' => 'flex flex-col space-y-4 font-medium text-gray-700'
        ]); ?>
    </nav>
</header>

<script>
document.getElementById('mobile-menu-button').addEventListener('click', function() {
    document.getElementById('mobile-menu').classList.toggle('hidden');
});
</script>
