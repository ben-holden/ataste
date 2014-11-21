<?php
/**
 * jv-a-taste-of-the-season functions and definitions
 *
 * @package jv-a-taste-of-the-season
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'jv_a_taste_of_the_season_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function jv_a_taste_of_the_season_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on jv-a-taste-of-the-season, use a find and replace
	 * to change 'jv-a-taste-of-the-season' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'jv-a-taste-of-the-season', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jv-a-taste-of-the-season' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'jv_a_taste_of_the_season_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_filter('manage_posts_columns', 'posts_columns_id', 5);
    add_action('manage_posts_custom_column', 'posts_custom_id_columns', 5, 2);
    add_filter('manage_pages_columns', 'posts_columns_id', 5);
    add_action('manage_pages_custom_column', 'posts_custom_id_columns', 5, 2);
function posts_columns_id($defaults){
    $defaults['wps_post_id'] = __('ID');
    return $defaults;
}
function posts_custom_id_columns($column_name, $id){
        if($column_name === 'wps_post_id'){
                echo $id;
    }
}
}
endif; // jv_a_taste_of_the_season_setup
add_action( 'after_setup_theme', 'jv_a_taste_of_the_season_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function jv_a_taste_of_the_season_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'jv-a-taste-of-the-season' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'jv_a_taste_of_the_season_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function jv_a_taste_of_the_season_scripts() {
	wp_enqueue_style( 'jv-a-taste-of-the-season-style', get_stylesheet_uri() );

	wp_enqueue_script( 'jv-a-taste-of-the-season-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'jv-a-taste-of-the-season-custom', get_template_directory_uri() . '/js/theme.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'jv_a_taste_of_the_season_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * WooCommerce remove reviews tab
 */

add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );
 
function woo_remove_product_tabs( $tabs ) {
 
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
 
    return $tabs;
 
}

/**
 * WooCommerce custom button text
 */

add_filter( 'woocommerce_product_add_to_cart_text', 'woo_archive_custom_cart_button_text' );    // 2.1 +
 
function woo_archive_custom_cart_button_text() {
 
        return __( 'Click here to place your order', 'woocommerce' );
 
}

/**
 * WooCommerce redirects back to home page if cart is empty
 */

add_action( 'template_redirect', 'my_template_redirect' );
function my_template_redirect()
{
    if ( is_page( wc_get_page_id( 'checkout' ) ) && sizeof( WC()->cart->get_cart() ) == 0 )            
    {
        wp_redirect( home_url() );
        exit;
    }
}
/**
 * WooCommerce add related item before cart if it's not already in it
 */

// PUT FUNCTION IN HERE!

/**
 * WooCommerce add gift fields to the checkout
 */



add_action( 'woocommerce_before_checkout_form', 'gift_options' );
 
function gift_options( $checkout ) {
 
    echo '<div id="gift_options"><h2>' . __('Gift options') . '</h2>';

    woocommerce_form_field('is_gift', array (
    	'type'			=> 'checkbox',
    	'class'			=> array('is-gift-checkbox'),
    	'label'			=> __('This is a gift'),
    	), $checkout->get_value( 'is_gift' ));
 
    woocommerce_form_field( 'gift_message', array(
        'type'          => 'textarea',
        'class'         => array('gift-message form-row-wide'),
        'label'         => __("Message you would like including with your gift:" ),
        'placeholder'   => __('Your message here'),
        ), $checkout->get_value( 'gift_message' ));
 
    echo '</div>';
 
}

/**
 * Update the order meta with field value - gift data
 */
add_action( 'woocommerce_checkout_update_order_meta', 'gift_options_update_order_meta' );
 
function gift_options_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['is_gift'] ) ) {
        update_post_meta( $order_id, 'This is a gift', sesc_attr($_POST['if_gift'] ) );
    }
    if ( ! empty( $_POST['gift_message'] ) ) {
    	update_post_meta( $order_id, 'Gift Message', sanitize_text_field( $_POST['gift_message'] ) );
    }
}

/**
 * Display field value on the order edit page - gift data
 */

add_action( 'woocommerce_admin_order_data_after_billing_address', 'gift_options_display_admin_order_meta', 10, 1 );
 
function gift_options_display_admin_order_meta($order){
    echo '<p><strong>'.__('Is this a gift?').':</strong> ' . get_post_meta( $order->id, 'Is this a gift?', true ) . '</p>';
    echo '<p><strong>'.__('Gift message:').':</strong> ' . get_post_meta( $order->id, 'Gift message', true ) . '</p>';
}

/**
 * Add over-18 field to the checkout
 **/

add_action('woocommerce_after_order_notes', 'customer_is_over_18');
 
function customer_is_over_18( $checkout ) {

	global $woocommerce;
 
    echo '<div id="customer_over_18">';
 
    woocommerce_form_field( 'over_18', array(
        'type'          => 'checkbox',
        'class'         => array('input-checkbox'),
        'label'         => __('I confirm that I and the person I am purchasing this for (if relevent) are over 18'),
        'required'  => true,
        ), $checkout->get_value( 'over_18' ));
 
    echo '</div>';
}
 
/**
 * Process the checkout - over-18
 **/

add_action('woocommerce_checkout_process', 'customer_is_over_18_checkout_field_process');
 
function customer_is_over_18_checkout_field_process() {
    global $woocommerce;
 
    // Check if set, if its not set add an error.
    if (!$_POST['my_checkbox'])
         $woocommerce->add_error( __('Please confirm you and (if relevent) the person you are purchasing this box for are over 18.') );
}
 
/**
 * Update the order meta with field value - over 18
 **/

add_action('woocommerce_checkout_update_order_meta', 'customer_is_over_18_update_order_meta');
 
function customer_is_over_18_update_order_meta( $order_id ) {
    if ($_POST['my_checkbox']) update_post_meta( $order_id, 'Customer over 18:', esc_attr($_POST['my_checkbox']));
}