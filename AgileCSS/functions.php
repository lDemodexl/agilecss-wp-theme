<?php 
// Add Theame Support
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', ['aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ]);
add_theme_support( 'html5' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'custom-backgroud' );
add_theme_support( 'custom-header' );
add_theme_support( 'custom-logo' );
add_theme_support( 'customize-selective-refresh-widgets' );
add_theme_support( 'starter-content' );
/**
 * Enqueue scripts and styles.
 */
function agilecss_scripts() {
	wp_enqueue_style( 'agilecss-style', get_template_directory_uri() . '/style.css', array(), time(), 'all');
	wp_enqueue_style( 'agilecss-custom-style', get_template_directory_uri() . '/custom.css', array('agilecss-style'), time(), 'all');
}
add_action( 'wp_enqueue_scripts', 'agilecss_scripts' );

function my_admin_scripts() {  
    wp_enqueue_script('media-upload');  
    wp_enqueue_script('thickbox');  
	wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');
    wp_register_script(  
                'my-upload-script',              
                get_bloginfo('template_url') . '/js/upload.js',                
                array('jquery', 'media-upload', 'thickbox')  
    );  
    wp_enqueue_script('my-upload-script');
	wp_enqueue_style( 'agilecss-admin-style', get_bloginfo('template_url') . '/css/style.css', array(), time(), 'all');	
}  
if( is_admin() )  
add_action('admin_print_scripts', 'my_admin_scripts');  


//Register Menu Locations
register_nav_menus( [
	'main_menu' => esc_html__( 'Main Menu', 'agilecss'),
	'footer_menu_left' => esc_html__( 'Footer Menu Left', 'agilecss'),
	'footer_menu_right' => esc_html__( 'Footer Menu Right', 'agilecss'),
] );

/*ACTIONS*/
	require get_template_directory() . '/inc/actions-functions.php';
/*END ACTIONS*/

/*FILTERS*/
	require get_template_directory() . '/inc/filters-functions.php';
/*END FILTERS*/

/*CLASSES*/
	require get_template_directory() . '/classes/class-agile-walker-comment.php';
/*END CLASSES*/

/*OTHER FUNCTIONS*/
	require get_template_directory() . '/inc/custom-functions.php';
/*END OTHER FUNCTIONS*/
?>