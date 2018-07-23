<?php
/**
  * @ Thiết lập các chức năng sẽ được theme hỗ trợ
**/
if ( ! function_exists( 'tein_theme_setup' ) ) {
    /*
     * Nếu chưa có hàm tein_theme_setup() thì sẽ tạo mới hàm đó
     */
    function tein_theme_setup() {
        /*
        * Thêm chức năng title-tag để tự thêm <title>
        */
        add_theme_support( 'title-tag' );
        /*
        * Thêm chức năng post thumbnail
        */
        add_theme_support( 'post-thumbnails' );
        add_image_size('single-post-thumbnail', 688, 466);
    }
    add_action ( 'init', 'tein_theme_setup' );

}

/**
* @ Chèn CSS và Javascript vào theme
* @ sử dụng hook wp_enqueue_scripts() để hiển thị nó ra ngoài front-end
**/
function tein_styles() {
    /*
     * Hàm get_stylesheet_uri() sẽ trả về giá trị dẫn đến file style.css của theme
     * Nếu sử dụng child theme, thì file style.css này vẫn load ra từ theme mẹ
     */
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap.min.css', 'all' );
    wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap-theme.min.css', 'all' );
    wp_enqueue_style( 'bootstrap-select', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap-select.min.css', 'all' );
    wp_enqueue_style( 'bootstrap-wysihtml5', get_template_directory_uri() . '/assets/plugins/bootstrap/css/bootstrap-wysihtml5.css', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/css/owl.carousel.css', 'all' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/css/owl.theme.css', 'all' );
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/plugins/font-awesome/font-awesome.css', 'all' );
    wp_enqueue_style( 'line-font', get_template_directory_uri() . '/assets/plugins/line-font/line-font.css', 'all' );
    wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/plugins/animate/animate.css', 'all' );
    wp_enqueue_style( 'bootsnav', get_template_directory_uri() . '/assets/css/bootsnav.css', 'all' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/css/style.css', 'all' );
    wp_enqueue_style( 'responsiveness', get_template_directory_uri() . '/assets/css/responsiveness.css', 'all' );
    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
    
    // Js
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), null, true );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap.min.js', array(), null, true );
    wp_enqueue_script( 'bootsnav', get_template_directory_uri() . '/assets/js/bootsnav.js', array(), null, true );
    wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/assets/js/viewportchecker.js', array(), null, true );
    wp_enqueue_script( 'bootstrap-select', get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap-select.min.js', array(), null, true );
    wp_enqueue_script( 'wysihtml5', get_template_directory_uri() . '/assets/plugins/bootstrap/js/wysihtml5-0.3.0.js', array(), null, true );
    wp_enqueue_script( 'bootstrap-wysihtml5', get_template_directory_uri() . '/assets/plugins/bootstrap/js/bootstrap-wysihtml5.js', array(), null, true );
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/plugins/owl-carousel/js/owl.carousel.min.js', array(), null, true );
    wp_enqueue_script( 'custom', get_template_directory_uri() . '/assets/js/custom.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'tein_styles' );

/**
 * Register tein menu
 */
function register_tein_menu() {
    register_nav_menu('header-menu-1',__( 'Menu Header 1' ));
    register_nav_menu('header-menu-2',__( 'Menu Header 2' ));
    register_nav_menu('header-menu-3',__( 'Menu Header 3' ));
    register_nav_menu('header-menu-4',__( 'Menu Header 4' ));

    register_nav_menu('footer-menu-1',__( 'Menu Footer 1' ));
    register_nav_menu('footer-menu-2',__( 'Menu Footer 2' ));
    register_nav_menu('footer-menu-3',__( 'Menu Footer 3' ));
}
add_action( 'init', 'register_tein_menu' );

/**
* @ Thiết lập hàm hiển thị menu
* @ tein_menu( $slug )
**/
if ( ! function_exists( 'tein_menu' ) ) {
    function tein_menu( $slug, $class_menu = '' ) {
      $menu = array(
        'theme_location' => $slug,
        'container' => 'div',
        'container_class' => $slug,
        'menu_id' => $slug, 
        'menu_class' => $class_menu
      );
      wp_nav_menu( $menu );
    }
}

/**
 * tein_theme_plugin_activation
 */
require_once THEME_URL . '/class-tgm-plugin-activation.php';
function tein_theme_plugin_activation() {
    $plugins = array(
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7', // Tên slug của plugin trên URL
            'required'  => false,
        ),
        array(
            'name'      => 'WP Job Manager',
            'slug'      => 'wp-job-manager',
            'required'  => false,
        ),
    ); // end $plugins

    $config = array(
        'default_path' => '',
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Có hiển thị thông báo hay không
        'dismissable'  => true,                    // Nếu đặt false thì người dùng không thể hủy thông báo cho đến khi cài hết plugin.
        'dismiss_msg'  => '',                      // Nếu 'dismissable' là false, thì tin nhắn ở đây sẽ hiển thị trên cùng trang Admin.
        'is_automatic' => false,                   // Nếu là false thì plugin sẽ không tự động kích hoạt khi cài xong.
        'message'      => '',
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    ); // end $config
    tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'tein_theme_plugin_activation' );