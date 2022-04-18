<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
  load_theme_textdomain('blankslate', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('responsive-embeds');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form', 'navigation-widgets'));
  add_theme_support('woocommerce');
  global $content_width;
  if (!isset($content_width)) {
    $content_width = 1920;
  }
  register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}

add_action('wp_enqueue_scripts', 'blankslate_enqueue');
function blankslate_enqueue()
{
  wp_enqueue_style('blankslate-style', get_stylesheet_uri());
  wp_enqueue_style('bundle', get_template_directory_uri() . '/css/style.bundle.css', array(), '20220322');

  wp_enqueue_script('jquery');
  wp_enqueue_script('bundle', get_template_directory_uri() . '/js/bundle.js', array(), false, true);
}

add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
  $sep = '|';
  return $sep;
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
  if ($title == '') {
    return '...';
  } else {
    return $title;
  }
}
function blankslate_schema_type()
{
  $schema = 'https://schema.org/';
  if (is_single()) {
    $type = "Article";
  } elseif (is_author()) {
    $type = 'ProfilePage';
  } elseif (is_search()) {
    $type = 'SearchResultsPage';
  } else {
    $type = 'WebPage';
  }
  echo 'itemscope itemtype="' . $schema . $type . '"';
}

add_filter('nav_menu_link_attributes', 'blankslate_schema_url', 10);
function blankslate_schema_url($atts)
{
  $atts['itemprop'] = 'url';
  return $atts;
}
if (!function_exists('blankslate_wp_body_open')) {
  function blankslate_wp_body_open()
  {
    do_action('wp_body_open');
  }
}

// add_action('wp_body_open', 'blankslate_skip_link', 5);
// function blankslate_skip_link()
// {
//   echo '<a href="#content" class="skip-link screen-reader-text">' . esc_html__('Skip to the content', 'blankslate') . '</a>';
// }

// add_filter('the_content_more_link', 'blankslate_read_more_link');
// function blankslate_read_more_link()
// {
//   if (!is_admin()) {
//     return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
//   }
// }

// add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');
// function blankslate_excerpt_read_more_link($more)
// {
//   if (!is_admin()) {
//     global $post;
//     return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'blankslate'), '<span class="screen-reader-text">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
//   }
// }

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
  unset($sizes['medium_large']);
  unset($sizes['1536x1536']);
  unset($sizes['2048x2048']);
  return $sizes;
}

// add_action('widgets_init', 'blankslate_widgets_init');
// function blankslate_widgets_init()
// {
//   register_sidebar(array(
//     'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
//     'id' => 'primary-widget-area',
//     'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
//     'after_widget' => '</li>',
//     'before_title' => '<h3 class="widget-title">',
//     'after_title' => '</h3>',
//   ));
// }

// INCLUDE SEPARATE FILES

$functions_includes = array(
  './inc/functions-taxonomies.php',
  './inc/functions-relations.php',
  './inc/wp_bootstrap_navwalker.php',
  './inc/functions-cf7.php',
);

foreach ($functions_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error("Error locating functions `$file` for inclusion", E_USER_ERROR);
  }
  require_once $filepath;
};
unset($file, $filepath);

// get categories list
function add_post_type_body_class($classes)
{
  global $post;

  $classes[] = 'page--' . get_post_type();

  if (is_404()) {
    $classes[] = 'page--404';
  }
  if (is_front_page()) {
    $classes[] = 'page--index';
  }

  return $classes;
}
add_filter('body_class', 'add_post_type_body_class');


function event_dates()
{
  if (get_field('date_start') != '') {
    $return = get_field('date_start');

    if (get_field('date_end')) $return .= ' — ' . get_field('date_end');
    return mb_strtolower($return);
  }
}


function get_artwork_author($author)
{

  foreach ($author as $post) {
    if ($post->post_type == 'artist') {
      $authorData['url'] = get_the_permalink($post->ID);
      $authorData['title'] = get_the_title($post->ID);
      $authorData['years'] = get_field('years', $post->ID);
    }
  }
  return $authorData;
}

if (function_exists('acf_add_options_page')) {
  acf_add_options_page();
}

// disable xmlrpc link
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

function remove_recentcomments_css()
{
  global $wp_widget_factory;
  remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recentcomments_css');

function deregister_styles()
{
  wp_dequeue_style('global-styles');
}
add_action('wp_enqueue_scripts', 'deregister_styles', 100);

function deregister_javascript()
{
  $deregistered_scripts = array(
    'regenerator-runtime-js',
    'wp-polyfill-js',
  );
  foreach ($deregistered_scripts as $key => $script) {
    wp_dequeue_script($script);
    wp_deregister_script($script);
  }
}
add_action('wp_enqueue_scripts', 'deregister_javascript', 1000);

remove_action('wp_head', 'wp_polyfill_add_discovery_links');
remove_action('wp_head', 'wp_polyfill_add_host_js');
