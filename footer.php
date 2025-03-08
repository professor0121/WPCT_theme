 <footer class="bg-gray-900 text-white py-3 px-10 divide-y divide-gray-300 ">
    <div class="flex py-8">
        <div class="w-1/2">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex pb-8 items-center">
                <?php if (has_custom_logo()): ?>
                <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="<?php bloginfo('name'); ?>"  class="w-32 h-auto">
                <?php else: ?>
                    <span class="text-xl font-bold text-gray-900"><?php bloginfo('name'); ?></span>
                <?php endif; ?>
        </a>

           <p class="mt-4">                                                                                  <?php echo get_theme_mod('footer_description', 'Footer Description'); ?></p>
           <button class="bg-yellow-500 px-10 py-2 mt-4 rounded-3xl">Contact Us</button>
        </div>
        <div class="w-1/2">
            <div class="flex gap-4 justify-end">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Certificate43.png"
                alt="<?php bloginfo('name'); ?>"
                class="w-32 h-auto">
                <?php
                    $footer_image = get_theme_mod('footer_custom_image');
                if ($footer_image): ?>
                        <img src="<?php echo esc_url($footer_image); ?>" alt="Footer Image" class="w-32 h-auto">
                    <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Apdovanojimai_10.png"
                            alt="<?php bloginfo('name'); ?>"
                            class="w-32 h-auto">
                    <?php endif; ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Apdovanojimai_11.png"
                alt="<?php bloginfo('name'); ?>"
                class="w-32 h-auto">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Apdovanojimai_12.png"
                alt="<?php bloginfo('name'); ?>"
                class="w-32 h-auto">
            </div>
        </div>
    </div>
    <div class="container mx-auto py-14">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Column 1: About -->
                <div class="text-center md:text-left flex flex-col gap-10">
                    <ul>
                        <li>top1</li>
                        <li>top1</li>
                        <li>top1</li>
                        <li>top1</li>
                        <li>top1</li>
                    </ul>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="text-center md:text-left">
                    <ul class="space-y-2">
                        <?php
                            $footer_menu_id = get_theme_mod('footer_menu_location', '');
                            if ($footer_menu_id) {
                                wp_nav_menu([
                                    'menu'            => $footer_menu_id,
                                    'menu_class'      => 'footer-menu',
                                    'container'       => 'nav',
                                    'container_class' => 'footer-nav',
                                ]);
                            } else {
                                echo '<p>' . __('No footer menu assigned.', 'mytheme') . '</p>';
                            }

                        ?>
                    </ul>
                </div>

                <!-- Column 3: Contact Info -->
                <div class="text-center md:text-left">
                    <ul class="text-white-900 space-y-2">
                        <li>Email: <a href="mailto:info@example.com" class="hover:text-white transition duration-300">info@example.com</a></li>
                        <li>Phone: <a href="tel:+1234567890" class="hover:text-white transition duration-300">+1 (234) 567-890</a></li>
                        <li>Address: 123 Main St, City, Country</li>
                    </ul>
                </div>

                <!-- Column 4: Social Media -->
                <div class="text-center md:text-left">
                    <div class="flex space-x-4 justify-center md:justify-start flex-col text-white-900">
                        <!-- Facebook -->
                        <a class="text-white-900 pl-4" href="                                                                                                                                 <?php echo get_theme_mod('footer_facebook_link', 'facebook'); ?>" class="text-gray-400 hover:text-white transition duration-300">Facebook</a>
                        <a class="text-white-900" href="                                                                                                                                 <?php echo get_theme_mod('footer_twitter_link', 'twitter'); ?>" class="text-gray-400 hover:text-white transition duration-300">Twitter</a>
                        <a class="text-white-900" href="                                                                                                                                 <?php echo get_theme_mod('footer_instagram_link', 'instagram'); ?>" class="text-gray-400 hover:text-white transition duration-300">Instagram</a>
                        <a class="text-white-900" href="                                                                                                                                 <?php echo get_theme_mod('footer_linkedin_link', 'linkedin'); ?>" class="text-gray-400 hover:text-white transition duration-300">LinkedIn</a>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
            <div class="mt-8 text-[10px] flex gap-8">
                <p><?php echo esc_html(get_theme_mod('footer_copyright_text', '© ' . date('Y') . ' Your Company. All rights reserved.')) ?>;
                </p>
                <p>Privacy</p>
                <p>Policy</p>
            <div class="mt-2">
            </div>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<?php wp_footer(); ?>
</body>
</html>