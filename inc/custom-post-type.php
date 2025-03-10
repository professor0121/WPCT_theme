<?php
//Custom posts
function langusistemos_post_types() {
	register_post_type('production', array(
        'rewrite' => array('slug' => 'produkcija','with_front' => false),
		'public' => true,
        'show_in_rest' => true,
        'show_in_menu' => true,
        'menu_position' => 8,
        'taxonomies' => ['category', 'post_tag'],
		'labels' => array(
			'name' => 'Produkcija',
            'add_new_item' => 'Pridėti',
            'edit_item' => 'Redaguoti',
            'all_items' => 'Visi',
            'singular_name' => 'Produkcija'
		),
		'menu_icon' => 'dashicons-products',
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'post-formats', 'custom-fields'
        )
	));
    register_post_type('services', array(
        'rewrite' => array('slug' => 'paslaugos','with_front' => false),
		'public' => true,
        'show_in_rest' => true,
        'show_in_menu' => true,
        'menu_position' => 9,
        'taxonomies' => ['category', 'post_tag'],
		'labels' => array(
			'name' => 'Paslaugos',
            'add_new_item' => 'Pridėti',
            'edit_item' => 'Redaguoti',
            'all_items' => 'Visi',
            'singular_name' => 'Paslaugos'
		),
		'menu_icon' => 'dashicons-forms',
        'supports' => array(
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'page-attributes', 'post-formats', 'custom-fields'
        )
	));
}
add_action('init', 'langusistemos_post_types');

function my_category_image_field_add( $taxonomy ) { ?>
    <div class="form-field term-group">
        <label for="category-image-id"><?php _e('Image', 'textdomain'); ?></label>
        <input type="hidden" id="category-image-id" name="category-image-id" value="">
        <div id="category-image-wrapper"></div>
        <p>
            <input type="button" class="button button-secondary ct_media_button" value="<?php _e('Add Image', 'textdomain'); ?>" />
            <input type="button" class="button button-secondary ct_media_remove" value="<?php _e('Remove Image', 'textdomain'); ?>" />
        </p>
    </div>
<?php }
add_action( 'category_add_form_fields', 'my_category_image_field_add', 10, 2 );

function my_category_image_field_edit( $term, $taxonomy ) {
    $image_id = get_term_meta( $term->term_id, 'category-image-id', true ); ?>
    <tr class="form-field term-group-wrap">
        <th scope="row">
            <label for="category-image-id"><?php _e('Image', 'textdomain'); ?></label>
        </th>
        <td>
            <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo esc_attr( $image_id ); ?>">
            <div id="category-image-wrapper">
                <?php if ( $image_id ) {
                    echo wp_get_attachment_image( $image_id, 'thumbnail' );
                } ?>
            </div>
            <p>
                <input type="button" class="button button-secondary ct_media_button" value="<?php _e('Add Image', 'textdomain'); ?>" />
                <input type="button" class="button button-secondary ct_media_remove" value="<?php _e('Remove Image', 'textdomain'); ?>" />
            </p>
        </td>
    </tr>
<?php }
add_action( 'category_edit_form_fields', 'my_category_image_field_edit', 10, 2 );

function my_category_image_field_save( $term_id, $tt_id ) {
    if ( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ) {
        $image = absint( $_POST['category-image-id'] );
        update_term_meta( $term_id, 'category-image-id', $image );
    } else {
        update_term_meta( $term_id, 'category-image-id', '' );
    }
}
add_action( 'created_category', 'my_category_image_field_save', 10, 2 );
add_action( 'edited_category', 'my_category_image_field_save', 10, 2 );

function my_category_media_script() {
    wp_enqueue_media();
    ?>
    <script>
    jQuery(document).ready(function($){
        function ctMediaUploader(button, input, wrapper, removeButton) {
            button.on('click', function(e) {
                e.preventDefault();
                var button = $(this);
                var frame = wp.media({
                    title: 'Select Image',
                    button: { text: 'Use this image' },
                    multiple: false
                });
                frame.on('select', function() {
                    var attachment = frame.state().get('selection').first().toJSON();
                    input.val(attachment.id);
                    wrapper.html('<img src="'+attachment.sizes.thumbnail.url+'" style="max-width:100%;"/>');
                });
                frame.open();
            });
            
            removeButton.on('click', function(e){
                e.preventDefault();
                input.val('');
                wrapper.html('');
            });
        }
        
        $('.ct_media_button').each(function(){
            console.log("button is clicked")
            var button      = $(this);
            var input       = button.closest('td, .term-group').find('input[type="hidden"]');
            var wrapper     = button.closest('td, .term-group').find('#category-image-wrapper');
            var removeButton= button.closest('td, .term-group').find('.ct_media_remove');
            ctMediaUploader(button, input, wrapper, removeButton);
        });
    });
    </script>
    <?php
}
add_action( 'admin_footer', 'my_category_media_script' );

 
function load_media_templates() {
    wp_print_media_templates();
}
add_action( 'admin_footer', 'load_media_templates' );
