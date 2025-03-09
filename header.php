<?php
/*
Website HEADER part.
- Includes <head> section
- Top header section with logo and menus
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <?php wp_head(); ?>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href=" <?php echo get_template_directory()?>/assets/css/custom.css">
</head>

<body <?php body_class("bg-gray-100 text-gray-900"); ?>>

    <!-- Top Header -->
    <div class="bg-gray-900 text-white py-2 flex justify-between">
    <div class="container mx-auto flex flex-wrap justify-between items-center px-4">
        <ul class="flex flex-wrap gap-4 sm:gap-6 text-sm">
            <li class="flex items-center gap-2">
                <span><?php echo get_theme_mod('header_top_warranty', '24/7 Support'); ?></span>
                <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 0.5H1C0.734784 0.5 0.48043 0.605357 0.292893 0.792893C0.105357 0.98043 0 1.23478 0 1.5V5C0 8.295 1.595 10.2919 2.93313 11.3869C4.37437 12.5656 5.80813 12.9656 5.87063 12.9825C5.95656 13.0059 6.04719 13.0059 6.13313 12.9825C6.19563 12.9656 7.6275 12.5656 9.07063 11.3869C10.405 10.2919 12 8.295 12 5V1.5C12 1.23478 11.8946 0.98043 11.7071 0.792893C11.5196 0.605357 11.2652 0.5 11 0.5ZM11 5C11 7.31687 10.1462 9.1975 8.4625 10.5887C7.72955 11.1923 6.89597 11.662 6 11.9762C5.11576 11.6675 4.29247 11.2061 3.5675 10.6131C1.86375 9.21937 1 7.33125 1 5V1.5H11V5Z" fill="#FFCC32"/>
                </svg>
            </li>
            <li class="flex items-center gap-2">
                <span><?php echo get_theme_mod('header_top_fast_service', 'Fast & Secure'); ?></span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.354 4.85372L6.35403 12.8537C6.30759 12.9002 6.25245 12.9371 6.19175 12.9623C6.13105 12.9874 6.06599 13.0004 6.00028 13.0004C5.93457 13.0004 5.86951 12.9874 5.80881 12.9623C5.74811 12.9371 5.69296 12.9002 5.64653 12.8537L2.14653 9.35372C2.05271 9.2599 2 9.13265 2 8.99997C2 8.86729 2.05271 8.74004 2.14653 8.64622C2.24035 8.5524 2.3676 8.49969 2.50028 8.49969C2.63296 8.49969 2.76021 8.5524 2.85403 8.64622L6.00028 11.7931L13.6465 4.14622C13.7403 4.0524 13.8676 3.99969 14.0003 3.99969C14.133 3.99969 14.2602 4.0524 14.354 4.14622C14.4478 4.24004 14.5006 4.36729 14.5006 4.49997C14.5006 4.63265 14.4478 4.7599 14.354 4.85372Z" fill="#FFCC32"/>
                </svg>
            </li>
            <li class="flex items-center gap-2">
                <span><?php echo get_theme_mod('header-top-experience', 'Experience'); ?></span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.1734 4.31247C14.143 4.23751 14.095 4.17102 14.0333 4.11871C13.9716 4.0664 13.8982 4.02983 13.8193 4.01213C13.7404 3.99443 13.6584 3.99613 13.5803 4.01709C13.5022 4.03805 13.4303 4.07765 13.3709 4.13247L10.8521 6.45685L9.77523 6.2256L9.54398 5.14872L11.8684 2.62997C11.9232 2.57053 11.9628 2.49868 11.9837 2.42057C12.0047 2.34247 12.0064 2.26045 11.9887 2.18154C11.971 2.10264 11.9344 2.0292 11.8821 1.96753C11.8298 1.90586 11.7633 1.8578 11.6884 1.82747C11.0052 1.55112 10.2646 1.44678 9.53168 1.52361C8.79875 1.60045 8.09591 1.85611 7.48491 2.26813C6.87391 2.68016 6.37345 3.23593 6.0275 3.88663C5.68155 4.53733 5.50071 5.26303 5.50085 5.99997C5.50004 6.62227 5.62771 7.23804 5.87585 7.80872L2.11273 11.0625C2.10335 11.07 2.0946 11.0787 2.08585 11.0868C1.71074 11.462 1.5 11.9707 1.5 12.5012C1.5 12.7639 1.55174 13.024 1.65226 13.2667C1.75278 13.5094 1.90012 13.7299 2.08585 13.9156C2.27159 14.1013 2.4921 14.2487 2.73477 14.3492C2.97745 14.4497 3.23755 14.5015 3.50023 14.5015C4.03072 14.5015 4.53949 14.2907 4.9146 13.9156C4.92273 13.9075 4.93148 13.8981 4.93898 13.8893L8.1921 10.125C8.87737 10.4258 9.62685 10.5509 10.3727 10.4891C11.1185 10.4273 11.8371 10.1804 12.4635 9.77084C13.0899 9.36128 13.6042 8.80197 13.96 8.14354C14.3157 7.48511 14.5016 6.74836 14.5009 5.99997C14.5018 5.42159 14.3906 4.84851 14.1734 4.31247ZM10.0009 9.49997C9.40902 9.49916 8.82701 9.34866 8.30898 9.06247C8.20862 9.00703 8.09225 8.98776 7.97937 9.0079C7.8665 9.02804 7.76397 9.08637 7.68898 9.1731L4.19523 13.2193C4.00617 13.399 3.75442 13.4976 3.49365 13.4943C3.23289 13.4909 2.98375 13.3859 2.79935 13.2015C2.61495 13.0171 2.50988 12.7679 2.50654 12.5072C2.5032 12.2464 2.60186 11.9947 2.78148 11.8056L6.8246 8.31247C6.91149 8.23745 6.9699 8.13481 6.99005 8.02179C7.01019 7.90878 6.99084 7.79228 6.93523 7.69185C6.6165 7.11537 6.46692 6.46066 6.50369 5.80296C6.54045 5.14527 6.76208 4.5113 7.14308 3.97394C7.52408 3.43659 8.04899 3.01766 8.65746 2.76532C9.26593 2.51298 9.93326 2.43747 10.5827 2.54747L8.63273 4.6606C8.57847 4.71946 8.53914 4.79048 8.51804 4.8677C8.49694 4.94492 8.49469 5.02608 8.51148 5.10435L8.86523 6.74997C8.88546 6.84409 8.93244 6.93037 9.00051 6.99844C9.06858 7.06652 9.15486 7.11349 9.24898 7.13372L10.8959 7.48747C10.9741 7.50426 11.0553 7.50201 11.1325 7.48091C11.2097 7.45981 11.2807 7.42048 11.3396 7.36622L13.4527 5.41622C13.537 5.9181 13.5109 6.43231 13.3763 6.92308C13.2416 7.41386 13.0017 7.86941 12.6732 8.25807C12.3447 8.64673 11.9354 8.95915 11.4739 9.17362C11.0124 9.3881 10.5098 9.49946 10.0009 9.49997Z" fill="#FFCC32"/>
                </svg>
            </li>
            <li class="flex items-center gap-2">
                <span><?php echo get_theme_mod('header-top-feedback', 'Feedback'); ?></span>
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.9483 6.07872C14.8858 5.88655 14.7678 5.71718 14.6092 5.59195C14.4506 5.46671 14.2585 5.39122 14.0571 5.37497L10.3696 5.07747L8.9458 1.63435C8.86881 1.44673 8.73776 1.28625 8.56932 1.17331C8.40088 1.06037 8.20267 1.00006 7.99987 1.00006C7.79707 1.00006 7.59885 1.06037 7.43041 1.17331C7.26197 1.28625 7.13093 1.44673 7.05393 1.63435L5.63143 5.07685L1.94205 5.37497C1.74029 5.39204 1.54805 5.46826 1.38941 5.5941C1.23078 5.71994 1.11281 5.8898 1.05028 6.08238C0.987751 6.27497 0.983448 6.48173 1.03791 6.67675C1.09237 6.87178 1.20317 7.04639 1.35643 7.17872L4.16893 9.6056L3.31205 13.2344C3.26413 13.4315 3.27587 13.6384 3.34577 13.8289C3.41567 14.0193 3.54058 14.1847 3.70465 14.3041C3.86873 14.4234 4.06456 14.4913 4.26729 14.4992C4.47002 14.507 4.67051 14.4544 4.8433 14.3481L7.99955 12.4056L11.1577 14.3481C11.3305 14.4532 11.5306 14.5047 11.7327 14.4963C11.9348 14.4879 12.1299 14.4198 12.2934 14.3008C12.4569 14.1817 12.5816 14.0169 12.6516 13.8271C12.7217 13.6374 12.734 13.4311 12.6871 13.2344L11.8271 9.60497L14.6396 7.1781C14.7941 7.04599 14.9059 6.871 14.9608 6.67529C15.0158 6.47958 15.0114 6.27195 14.9483 6.07872Z" fill="#FFCC32"/>
                </svg>
            </li>
        </ul>
    </div>
    <div>
        <div class="container mx-auto md:flex md:justify-between block items-center px-4 gap-4">
            <div class="text-sm text-gray-400">
                <?php echo get_theme_mod('header_top_phone', '+1234567890'); ?>
            </div>
            <div class="text-sm text-gray-400">
                <?php echo get_theme_mod('header_top_email', 'example@email.com'); ?>
            </div>
        </div>
    </div>
</div>


    <!-- Main Header -->
    <header class="bg-white shadow-md px-14">
        <div class="container mx-auto flex justify-between items-center py-4 px-4">
            <!-- Logo -->
           
            <div class="text-xl font-bold text-gray-800">
                <a href="<?php echo home_url(); ?>">
                    <?php if (get_theme_mod('header_logo')) : ?>
                        <img src="<?php echo esc_url(get_theme_mod('header_logo')); ?>" alt="<?php bloginfo('name'); ?>" class="h-12">
                    <?php else : ?>
                        <?php bloginfo('name'); ?>
                    <?php endif; ?>
                </a>
            </div>


            <!-- Navigation -->
         <div class="flex items-center gap-4">
            <nav class="hidden md:flex space-x-6">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'container' => false,
                    'items_wrap' => '<ul class="flex space-x-6 text-gray-700">%3$s</ul>'
                ));
                ?>
            </nav>
            <div class="hidden md:flex gap-4">
                <button class="bg-blue-500 px-14 py-2 border rounded-lg">
                    <?php echo get_theme_mod('header_top_button_1', 'Feedback'); ?>
                </button>
                <button class="bg-blue-500 px-14 py-2 border rounded-lg">
                    <?php echo get_theme_mod('header_top_button_2', 'Feedback'); ?>
                </button>
            </div>
          
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-gray-700 focus:outline-none">
                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="3" y1="12" x2="21" y2="12"></line>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <line x1="3" y1="18" x2="21" y2="18"></line>
                </svg>
            </button>
        </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-gray-100 p-4">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'items_wrap' => '<ul class="space-y-4 text-gray-700">%3$s</ul>'
            ));
            ?>
        </div>

    </header>

    <script>
        document.getElementById('mobile-menu-btn').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
