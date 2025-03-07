
 <footer class="bg-gray-900 text-white py-18 px-18">
    
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Column 1: About -->
            <div class="text-center md:text-left">
                <h3 class="text-lg font-bold mb-4">About Us</h3>
                <p class="text-gray-400">We are a creative team dedicated to building amazing websites and digital experiences.</p>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="text-center md:text-left">
                <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">About</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Contact Info -->
            <div class="text-center md:text-left">
                <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                <ul class="text-gray-400 space-y-2">
                    <li>Email: <a href="mailto:info@example.com" class="hover:text-white transition duration-300">info@example.com</a></li>
                    <li>Phone: <a href="tel:+1234567890" class="hover:text-white transition duration-300">+1 (234) 567-890</a></li>
                    <li>Address: 123 Main St, City, Country</li>
                </ul>
            </div>

            <!-- Column 4: Social Media -->
<div class="text-center md:text-left">
    <h3 class="text-lg font-bold mb-4">Follow Us</h3>
    <div class="flex space-x-4 justify-center md:justify-start flex-col">
        <!-- Facebook -->
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
            <i class="fab fa-facebook fa-lg">Facebook</i>
        </a>
        <!-- Twitter -->
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
            <i class="fab fa-twitter fa-lg">Twitter</i>
        </a>
        <!-- Instagram -->
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
            <i class="fab fa-instagram fa-lg">Instagram</i>
        </a>
        <!-- LinkedIn -->
        <a href="#" class="text-gray-400 hover:text-white transition duration-300">
            <i class="fab fa-linkedin fa-lg">LinkedIn</i>
        </a>
    </div>
</div>
        </div>

        <!-- Copyright -->
        <div class="border-t border-gray-800 mt-8 pt-8 text-center">
            <p class="text-gray-400">&copy; <?php echo date('Y'); ?> Your Theme. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<script src="https://unpkg.com/@tailwindcss/browser@4"></script>
<?php wp_footer(); ?>
</body>
</html>