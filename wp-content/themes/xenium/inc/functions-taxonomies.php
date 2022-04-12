<?

// NEW POST TYPE
add_action('init', 'register_artwork'); // Использовать функцию только внутри хука init

function register_artwork()
{
  // Artwork Post Type
  $labels = array(
    'name' => 'gallery',
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
}

add_action('init', 'register_author', 0);

function register_author()
{
  // Artwork Post Type
  $labels = array(
    'name' => 'artists',
    'singular_name' => 'Artist page', // админ панель Добавить->Функцию
    'add_new' => 'Add artist',
    'add_new_item' => 'Add new artist', // заголовок тега <title>
    'edit_item' => 'Edit artist',
    'new_item' => 'New artist',
    'all_items' => 'All artists',
    'view_item' => 'Check page',
    'search_items' => 'Search',
    'not_found' =>  'Nothing found',
    'not_found_in_trash' => 'Trash is empty',
    'menu_name' => 'Artists' // ссылка в меню в админке
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

// add_filter('post_type_labels_post', 'rename_posts_labels');
// function rename_posts_labels($labels)
// {

//   $new = array(
//     'name'                  => 'Posts',
//     'singular_name'         => 'Post',
//     'add_new'               => 'Add event',
//     'add_new_item'          => 'Add event',
//     'edit_item'             => 'Edit event',
//     'new_item'              => 'New event',
//     'view_item'             => 'View event',
//     'search_items'          => 'Search event',
//     'not_found'             => 'Not found',
//     'not_found_in_trash'    => 'Not found in trash',
//     'parent_item_colon'     => '',
//     'all_items'             => 'All events',
//     'archives'              => 'Archive',
//     'insert_into_item'      => 'Insert into event',
//     'uploaded_to_this_item' => 'Uploaded to this event',
//     'featured_image'        => 'Featured image',
//     'filter_items_list'     => 'Filter events list',
//     'items_list_navigation' => 'Events list navigation',
//     'items_list'            => 'Events list',
//     'menu_name'             => 'Events',
//     'name_admin_bar'        => 'Event', // пункте "добавить"
//   );

//   return (object) array_merge((array) $labels, $new);
// }

## Изменяет лейблы у таксономии "Рубрики".
// add_filter('taxonomy_labels_' . 'category', 'change_labels_category');
// function change_labels_category($labels)
// {

//   $my_labels = array(
//     'name'                  => 'Section',
//     'singular_name'         => 'Section',
//     'search_items'          => 'Search',
//     'all_items'             => 'All items',
//     'parent_item'           => 'Parent Item',
//     'parent_item_colon'     => 'Parent Item:',
//     'edit_item'             => 'Edit item',
//     'view_item'             => 'View item',
//     'update_item'           => 'Update item',
//     'add_new_item'          => 'Add new item',
//     'new_item_name'         => 'New item name',
//     'not_found'             => 'Not found',
//     'no_terms'              => 'No terms',
//     'items_list_navigation' => 'Items list navigation',
//     'items_list'            => 'Categories list',
//     'back_to_items'         => '← Back to items',
//     'menu_name'             => 'Categories',
//   );

//   return $my_labels;
// }
