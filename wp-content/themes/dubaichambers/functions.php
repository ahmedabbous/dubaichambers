<?php
add_action('init','themeSetup');
add_action('widgets_init',  'createWidgetArea');
add_action('wp_enqueue_scripts',  'enqueueScripts');
add_filter('use_block_editor_for_post', '__return_false', 10);

function themeSetup()
{
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title' => 'Options',
            'menu_title' => 'Options',
            'menu_slug' => 'theme-general-settings',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }

    load_theme_textdomain('themetextdomain', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary'),
    ));
    add_theme_support('html5', array(
        'search-form',
        'gallery',
        'caption',
    ));
    add_post_type_support('page', array(
        'excerpt',
    ));
    $custom_post_types = get_post_types(array('public' => true, '_builtin' => false), 'names', 'and');
    if ($custom_post_types) {
        foreach ($custom_post_types as $post_type) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'discussion');
        }
    }
    $builtin_post_types = get_post_types(array('public' => true, '_builtin' => true), 'names', 'and');
    if ($builtin_post_types) {
        foreach ($builtin_post_types as $post_type) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'discussion');
        }
    }
}

function createWidgetArea()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar 1'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

function enqueueScripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('site', get_template_directory_uri() . '/assets/css/site.css', array(), time(), 'all');
    wp_enqueue_script("jquery");
    wp_enqueue_script('jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', array(''), time(), true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), time(), true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/assets/js/jquery-ui.js', array('jquery'), time(), true);
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), time(), true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array('jquery'), time(), true);
    wp_enqueue_script('aos', get_template_directory_uri() . '/assets/js/aos.js', array('jquery'), time(), true);
    wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), time(), true);
	 wp_enqueue_script('rellax', get_template_directory_uri() . '/assets/js/rellax.min.js', array('jquery'), time(), true);
    wp_enqueue_script('main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), time(), true);

    wp_enqueue_script('voice ', get_template_directory_uri() . '/assets/js/voice-search.js', array('jquery'), time(), true);
}



