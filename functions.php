<?php
/**
 * Therion Peptides Theme Functions
 *
 * @package Therion_Peptides
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'THERION_VERSION', '1.0.0' );
define( 'THERION_DIR', get_template_directory() );
define( 'THERION_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function therion_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', array(
        'height'      => 96,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
    ) );
    add_theme_support( 'automatic-feed-links' );

    // WooCommerce support
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );

    // Register menus
    register_nav_menus( array(
        'primary'    => __( 'Primary Navigation', 'therion-peptides' ),
        'top-bar'    => __( 'Top Bar Links', 'therion-peptides' ),
        'footer-1'   => __( 'Footer Products', 'therion-peptides' ),
        'footer-2'   => __( 'Footer Information', 'therion-peptides' ),
        'footer-3'   => __( 'Footer Company', 'therion-peptides' ),
    ) );
}
add_action( 'after_setup_theme', 'therion_setup' );

/**
 * Enqueue Styles & Scripts
 */
function therion_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'therion-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500;600;700&family=IBM+Plex+Mono:wght@400;500&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style(
        'therion-style',
        get_stylesheet_uri(),
        array(),
        THERION_VERSION
    );

    // Theme scripts
    wp_enqueue_script(
        'therion-scripts',
        THERION_URI . '/assets/js/main.js',
        array(),
        THERION_VERSION,
        true
    );
}
add_action( 'wp_enqueue_scripts', 'therion_scripts' );

/**
 * Register Widget Areas
 */
function therion_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1 - Products', 'therion-peptides' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2 - Information', 'therion-peptides' ),
        'id'            => 'footer-2',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 3 - Company', 'therion-peptides' ),
        'id'            => 'footer-3',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'therion_widgets_init' );

/**
 * WooCommerce: Change number of products per row
 */
function therion_wc_loop_columns() {
    return 4;
}
add_filter( 'loop_shop_columns', 'therion_wc_loop_columns' );

/**
 * WooCommerce: Products per page
 */
function therion_wc_products_per_page() {
    return 12;
}
add_filter( 'loop_shop_per_page', 'therion_wc_products_per_page' );

/**
 * WooCommerce: Remove default wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

function therion_wc_wrapper_start() {
    echo '<div class="section"><div class="woocommerce-container">';
}
add_action( 'woocommerce_before_main_content', 'therion_wc_wrapper_start', 10 );

function therion_wc_wrapper_end() {
    echo '</div></div>';
}
add_action( 'woocommerce_after_main_content', 'therion_wc_wrapper_end', 10 );

/**
 * Custom Walker for Primary Nav
 */
class Therion_Nav_Walker extends Walker_Nav_Menu {
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $is_current = in_array( 'current-menu-item', $classes );
        $class_attr = $is_current ? ' class="active"' : '';
        $output .= '<a href="' . esc_url( $item->url ) . '"' . $class_attr . '>';
        $output .= esc_html( $item->title );
    }

    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</a>';
    }
}

/**
 * Customizer Options
 */
function therion_customize_register( $wp_customize ) {
    // Top Bar Section
    $wp_customize->add_section( 'therion_top_bar', array(
        'title'    => __( 'Top Bar', 'therion-peptides' ),
        'priority' => 25,
    ) );

    $wp_customize->add_setting( 'therion_promo_text', array(
        'default'           => 'Free shipping on orders over $200 · USA made · 99%+ purity guaranteed',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'therion_promo_text', array(
        'label'   => __( 'Promo Bar Text', 'therion-peptides' ),
        'section' => 'therion_top_bar',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'therion_promo_badge', array(
        'default'           => 'New',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'therion_promo_badge', array(
        'label'   => __( 'Promo Badge Text', 'therion-peptides' ),
        'section' => 'therion_top_bar',
        'type'    => 'text',
    ) );

    // Hero Section
    $wp_customize->add_section( 'therion_hero', array(
        'title'    => __( 'Hero Banner', 'therion-peptides' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'therion_hero_heading', array(
        'default'           => 'Premium Research Peptides. Unmatched Purity. Competitive Pricing.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'therion_hero_heading', array(
        'label'   => __( 'Hero Heading', 'therion-peptides' ),
        'section' => 'therion_hero',
        'type'    => 'textarea',
    ) );

    $wp_customize->add_setting( 'therion_hero_text', array(
        'default'           => 'We specialize in highly purified peptides for scientific research and development. Every product exceeds 99% purity, verified through HPLC and Mass Spectrometry analysis.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'therion_hero_text', array(
        'label'   => __( 'Hero Description', 'therion-peptides' ),
        'section' => 'therion_hero',
        'type'    => 'textarea',
    ) );

    // Disclaimer
    $wp_customize->add_section( 'therion_legal', array(
        'title'    => __( 'Legal Disclaimer', 'therion-peptides' ),
        'priority' => 120,
    ) );

    $wp_customize->add_setting( 'therion_disclaimer', array(
        'default'           => 'Products are intended for IN-VITRO LABORATORY RESEARCH USE ONLY — not for human consumption. You must be 21+ to use this website. All products handled by qualified research professionals only.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'therion_disclaimer', array(
        'label'   => __( 'Footer Disclaimer', 'therion-peptides' ),
        'section' => 'therion_legal',
        'type'    => 'textarea',
    ) );
}
add_action( 'customize_register', 'therion_customize_register' );
