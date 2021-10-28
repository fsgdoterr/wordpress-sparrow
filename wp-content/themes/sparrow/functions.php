<?php 

function my_search_form( $form ) {
    $form = '
    <form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label>Что-то ищете?????</label>
    <input type="text" placeholder="Поиск по сайту..." value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" value="" />
    </form>';
    return $form;
    }
    add_filter( 'get_search_form', 'my_search_form' );

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('main', get_stylesheet_uri());
    wp_enqueue_style('sparrow-default', get_stylesheet_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('sparrow-layout', get_stylesheet_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('sparrow-media-queries', get_stylesheet_directory_uri() . '/assets/css/media-queries.css');

    // wp_enqueue_script('sparrow-modernizr', get_stylesheet_directory_uri() . '/assets/js/modernizr.js');
    // wp_deregister_script('jquery');
    // wp_register_script('jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-1.10.2.min.js', array(), '', true);
    wp_enqueue_script('sparrow-jquery', get_stylesheet_directory_uri() . '/assets/js/jquery-1.10.2.min.js', array(), '', true);
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-migrate', get_stylesheet_directory_uri() . '/assets/js/jquery-migrate-1.2.1.min.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-flexslider', get_stylesheet_directory_uri() . '/assets/js/jquery.flexslider.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-doubletaptogo', get_stylesheet_directory_uri() . '/assets/js/doubletaptogo.js', array('jquery'), '', true);
    wp_enqueue_script('jquery-init', get_stylesheet_directory_uri() . '/assets/js/init.js', array('jquery'), '', true);
});

add_action('after_setup_theme', function() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');

    add_image_size('portfolio_thumb', 215, 224, true);
    add_image_size('portfolio_mediumthumb', 280, 292, true);

    add_image_size('blog_thumb', 640, 246, true);
    
    add_image_size('team_thumb', 300, 300, true);

    register_nav_menu('header_menu', 'Меню в шапке');
});

add_action('widgets_init', function() {

    register_sidebar( array( 
        'name'           => __('Blog sidebar', 'blog_sidebar'),
        'id'             => 'blog_sidebar',
        'before_widget'  => '',
        'after_widget'   => '',
     ) );

    register_sidebar( array( 
        'name'           => __('Contact sidebar', 'contact_sidebar'),
        'id'             => 'contact_sidebar',
        'before_widget'  => '',
        'after_widget'   => '',
     ) );

});

add_action('template_redirect', function () {
    if (is_404() && $_SERVER["REQUEST_URI"] != '/404/') {
        wp_redirect(home_url('/404/'));
        exit();
    }
});

require dirname(__FILE__) . '/includes/pll.php';

require dirname(__FILE__) . '/includes/taxonomies.php';

require dirname(__FILE__) . '/includes/filters.php';

require dirname(__FILE__) . '/includes/carbonfields.php';