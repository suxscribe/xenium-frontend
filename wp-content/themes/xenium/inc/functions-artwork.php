<?
//zrx GET MODAL DATA
add_action('wp_ajax_artwork_modal_data', 'artwork_modal_data_get');
add_action('wp_ajax_nopriv_artwork_modal_data', 'artwork_modal_data_get');

function artwork_modal_data_get()
{
  $id = $_POST['id'];

  global $post;
  $post = get_post($id);
  if ($post) {
    setup_postdata($post);
    get_template_part('partials/artwork-modal');
    wp_reset_postdata();
  }



  wp_die(); //prevent '0' output
}
