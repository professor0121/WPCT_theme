<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); // Include the header template
?>

<div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 text-center px-4">
    <div class="max-w-2xl space-y-6">
        <h1 class="text-6xl font-bold text-gray-900">404</h1>
        <p class="text-2xl text-gray-600">Oops! The page you're looking for doesn't exist.</p>
        <p class="text-gray-500">It looks like nothing was found at this location. Maybe try a search?</p>

        <!-- Search Form -->
        <div class="mt-6">
            <?php get_search_form(); ?>
        </div>

        <!-- Back to Home Button -->
        <div class="mt-6">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-300">
                Go Back Home
            </a>
        </div>
    </div>
</div>

<?php
get_footer(); // Include the footer template
?>