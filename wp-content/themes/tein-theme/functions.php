<?php

define( 'THEME_URL', get_stylesheet_directory() );
define( 'CORE', THEME_URL . '/core' );

require_once CORE . '/init.php' ;

function create_post_your_post()
{
    register_post_type(
        'your_post',
        array(
            'labels' => array(
                'name' => __('Your Post'),
            ),
            'public' => true,
            'hierarchical' => true,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'excerpt',
                'thumbnail',
            ),
            'taxonomies' => array(
                'post_tag',
                'category',
            )
        )
    );
    register_taxonomy_for_object_type('category', 'your_post');
    register_taxonomy_for_object_type('post_tag', 'your_post');
}
add_action('init', 'create_post_your_post');

function add_your_fields_meta_box()
{
    add_meta_box(
        'your_fields_meta_box', // $id
        'Your Fields', // $title
        'show_your_fields_meta_box', // $callback
        'your_post', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action('add_meta_boxes', 'add_your_fields_meta_box');


function show_your_fields_meta_box()
{
    global $post;
    $meta = get_post_meta($post->ID, 'your_fields', true); ?>
	<input type="text" name="your_meta_box_nonce" value="<?php echo wp_create_nonce(basename(__FILE__)); ?>">
    <!-- All fields will go here -->
    <p>
        <label for="your_fields[text]">Input Text</label>
        <br>
        <input type="text" name="your_fields[text]" id="your_fields[text]" class="regular-text" value="<?php issetEcho($meta, 'text'); ?>">
    </p>
    <p>
        <label for="your_fields[textarea]">Textarea</label>
        <br>
        <textarea name="your_fields[textarea]" id="your_fields[textarea]" rows="5" cols="30" style="width:500px;"><?php issetEcho($meta, 'textarea'); ?></textarea>
    </p>
    <p>
        <label for="your_fields[checkbox]">Checkbox
            <input type="checkbox" name="your_fields[checkbox]" value="checkbox" <?php if (isset($meta['checkbox']) && $meta['checkbox'] === 'checkbox') echo 'checked'; ?>>
        </label>
    </p>
    <p>
        <label for="your_fields[select]">Select Menu</label>
        <br>
        <select name="your_fields[select]" id="your_fields[select]">
            <?php
            $meta['select'] = issetSet($meta, 'select');
            ?>
                <option value="option-one" <?php selected($meta['select'], 'option-one'); ?>>Option One</option>
                <option value="option-two" <?php selected($meta['select'], 'option-two'); ?>>Option Two</option>
        </select>
    </p>
    <p>
        <label for="your_fields[image]">Image Upload</label><br>
        <input type="text" name="your_fields[image]" id="your_fields[image]" class="meta-image regular-text" value="<?php issetEcho($meta, 'image'); ?>">
        <input type="button" class="button image-upload" value="Browse">
    </p>
    <div class="image-preview"><img src="<?php issetEcho($meta, 'image'); ?>" style="max-width: 250px;"></div>
    <script>
    jQuery(document).ready(function ($) {
      // Instantiates the variable that holds the media library frame.
      var meta_image_frame;
      // Runs when the image button is clicked.
      $('.image-upload').click(function (e) {
        // Get preview pane
        var meta_image_preview = $(this).parent().parent().children('.image-preview');
        // Prevents the default action from occuring.
        e.preventDefault();
        var meta_image = $(this).parent().children('.meta-image');
        // If the frame already exists, re-open it.
        if (meta_image_frame) {
          meta_image_frame.open();
          return;
        }
        // Sets up the media library frame
        meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
          title: meta_image.title,
          button: {
            text: meta_image.button
          }
        });
        // Runs when an image is selected.
        meta_image_frame.on('select', function () {
          // Grabs the attachment selection and creates a JSON representation of the model.
          var media_attachment = meta_image_frame.state().get('selection').first().toJSON();
          // Sends the attachment URL to our custom image input field.
          meta_image.val(media_attachment.url);
          meta_image_preview.children('img').attr('src', media_attachment.url);
        });
        // Opens the media library frame.
        meta_image_frame.open();
      });
    });
  </script>
<?php 
}

function save_your_fields_meta($post_id)
{   
	// verify nonce
    if (isset($_POST['your_meta_box_nonce']) && !wp_verify_nonce($_POST['your_meta_box_nonce'], basename(__FILE__))) {
        return $post_id;
    }
	// check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }
	// check permissions
    if (isset($_POST['post_type']) && 'page' === $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id)) {
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }
    }

    $old = get_post_meta($post_id, 'your_fields', true);
    $new = isset($_POST['your_fields']) ? $_POST['your_fields'] : null;

    if ($new && $new !== $old) {
        update_post_meta($post_id, 'your_fields', $new);
    } elseif ('' === $new && $old) {
        delete_post_meta($post_id, 'your_fields', $old);
    }
}
add_action('save_post', 'save_your_fields_meta');

function bcd_comment($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    $argsImage = [
        'class' => 'img-responsive'
    ];
    ?>
    <div class="single-comment">
        <div class="img-holder">
            <?php echo get_avatar($comment, $size = '120', '', '', $argsImage); ?>
        </div>
        <div class="text-holder">
            <div class="top">
                <div class="name pull-left">
                    <h4>
                        <?php printf(get_comment_author_link()); ?> - 
                        <?php printf(get_comment_date()); ?><?php edit_comment_link(__('(Edit)'), ' ', ''); ?>
                    </h4>
                    <?php if ($comment->comment_approved == '0') : ?>
                        <em><?php echo 'Your coment is waiting for moderation.'; ?></em>
                    <?php endif; ?>
                </div>
                <div class="rating pull-right">
                    <!-- <ul>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star active"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul> -->
                </div> 
            </div>
            <div class="text">
                <p><?php comment_text(); ?></p>
                <div class="reply">
                    <?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div><!--end .reply-->
            </div>
        </div>
    </div>
<?php 
}

function wpb_widgets_init() {
 
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'wpb' ),
        'id' => 'sidebar-1',
        'description' => __( 'The main sidebar appears on the right on each page except the front page template', 'wpb' ),
        'before_widget' => '<div class="col-menu col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>',
    ) );
 
    register_sidebar( array(
        'name' =>__( 'Front page sidebar', 'wpb'),
        'id' => 'sidebar-2',
        'description' => __( 'Appears on the static front page template', 'wpb' ),
        'before_widget' => '<div class="col-menu col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="title">',
        'after_title' => '</h6>',
    ) );
    }
 
add_action( 'widgets_init', 'wpb_widgets_init' );

add_filter( 'genesis_search_text', 'sp_search_text' );
function sp_search_text( $text ) {
	return esc_attr( 'Tìm kiếm trên blog của tôi...' );
}

add_filter( 'genesis_search_button_text', 'sp_search_button_text' );
function sp_search_button_text( $text ) {
	return esc_attr( 'Tìm kiếm' );
}

add_filter( 'genesis_search_form_label', 'sp_search_form_label' );
function sp_search_form_label ( $text ) {
	return esc_attr( 'Khung tìm kiếm' );
}

// get taxonomies terms links
function custom_taxonomies_terms_links($id, $taxonomy_slug = 'category')
{
    // get post by post id
    $post = get_post($id);
    
   // get post type by post
    $post_type = $post->post_type;
    
   // get post type taxonomies
    $taxonomies = get_object_taxonomies($post_type, 'objects');
    $str = '';
    if (isset($taxonomies[$taxonomy_slug])) {
        $out = array();
        $terms = get_the_terms($post->ID, $taxonomy_slug);
        if (!empty($terms)) {
            foreach ($terms as $term) {
                $out[] =
                    ' <span class="category"><a href="'
                    . get_term_link($term->slug, $taxonomy_slug) . '">'
                    . $term->name
                    . "</a></span> ";
            }
        }
        $str = $taxonomies[$taxonomy_slug]->label . ": " .  implode('| ', $out);
    }

    return $str;
}


/** private method */
function issetEcho($aray, $value)
{
    if (isset($aray[$value])) {
        echo $aray[$value];
    } else {
        echo "";
    }
}

function issetSet($aray, $value)
{
    if (!isset($aray[$value])) {
        $aray[$value] = "";
    }
}
