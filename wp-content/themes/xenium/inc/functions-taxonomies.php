<?

// NEW POST TYPE
add_action('init', 'register_artwork'); // Использовать функцию только внутри хука init

function register_artwork()
{
  // Artwork Post Type
  $labels = array(
    'name' => 'Artworks',
    'singular_name' => 'Artwork page', // админ панель Добавить->Функцию
    'add_new' => 'Add artwork',
    'add_new_item' => 'Add new artwork', // заголовок тега <title>
    'edit_item' => 'Edit artwork',
    'new_item' => 'New artwork',
    'all_items' => 'All artworks',
    'view_item' => 'Check page',
    'search_items' => 'Search',
    'not_found' =>  'Nothing found',
    'not_found_in_trash' => 'Trash is empty',
    'menu_name' => 'Artworks' // ссылка в меню в админке
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, // показывать интерфейс в админке
    'has_archive' => true,
    'menu_icon' => 'dashicons-lightbulb', // иконка в меню
    'menu_position' => 20, // порядок в меню
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'cm_qrcode'),
    'show_in_rest' => true // enable gutenberg
  );
  register_post_type('artwork', $args);



  /* // Artwork Authors Taxonomy

  $labels = array(
    'name' => _x('Artwork authors', 'taxonomy general name'),
    'singular_name' => _x('Author', 'taxonomy singular name'),
    'search_items' =>  __('Find authors'),
    'popular_items' => __('Popular sections'),
    'all_items' => __('All sections'),
    'parent_item' => __('Parent section'),
    'parent_item_colon' => null,
    'edit_item' => __('Edit section'),
    'update_item' => __('Update section'),
    'add_new_item' => __('Add new section'),
    'new_item_name' => __('New section name'),
    'separate_items_with_commas' => __('Separate writers with commas'),
    'add_or_remove_items' => __('Add or remove sections'),
    'choose_from_most_used' => __('Choose from the most used writers'),
    'menu_name' => __('Sections'),
  );

  // Добавляем древовидную таксономию 'Разделы' (как рубрики), чтобы сделать НЕ девовидную (как метки) значение для 'hierarchical' => false,

  register_taxonomy(
    'artwork_section',
    'artwork',
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'artwork_section'),
      'show_in_rest' => true,
    )
  ); */
}

add_action('init', 'register_author', 0);

function register_author()
{
  // Artwork Post Type
  $labels = array(
    'name' => 'Authors',
    'singular_name' => 'Author page', // админ панель Добавить->Функцию
    'add_new' => 'Add author',
    'add_new_item' => 'Add new author', // заголовок тега <title>
    'edit_item' => 'Edit author',
    'new_item' => 'New author',
    'all_items' => 'All authors',
    'view_item' => 'Check page',
    'search_items' => 'Search',
    'not_found' =>  'Nothing found',
    'not_found_in_trash' => 'Trash is empty',
    'menu_name' => 'Authors' // ссылка в меню в админке
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, // показывать интерфейс в админке
    'has_archive' => true,
    'menu_icon' => 'dashicons-lightbulb', // иконка в меню
    'menu_position' => 20, // порядок в меню
    'supports' => array('title', 'editor', 'author', 'thumbnail', 'custom-fields', 'cm_qrcode'),
    'show_in_rest' => true // enable gutenberg
  );
  register_post_type('artist', $args);
}

add_action('init', 'register_genre_taxonomy', 0);

function register_genre_taxonomy()
{
  // Artwork Categories Taxonomy

  $labels = array(
    'name' => _x('Artwork sections', 'taxonomy general name'),
    'singular_name' => _x('Section', 'taxonomy singular name'),
    'search_items' =>  __('Find sections'),
    'popular_items' => __('Popular sections'),
    'all_items' => __('All sections'),
    'parent_item' => __('Parent section'),
    'parent_item_colon' => null,
    'edit_item' => __('Edit section'),
    'update_item' => __('Update section'),
    'add_new_item' => __('Add new section'),
    'new_item_name' => __('New section name'),
    'separate_items_with_commas' => __('Separate writers with commas'),
    'add_or_remove_items' => __('Add or remove sections'),
    'choose_from_most_used' => __('Choose from the most used writers'),
    'menu_name' => __('Sections'),
  );

  // Добавляем древовидную таксономию 'Разделы' (как рубрики), чтобы сделать НЕ девовидную (как метки) значение для 'hierarchical' => false,

  register_taxonomy(
    'artwork_section',
    array('artwork', 'artist'),
    array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'artwork_section'),
      'show_in_rest' => true,
    )
  );
}
