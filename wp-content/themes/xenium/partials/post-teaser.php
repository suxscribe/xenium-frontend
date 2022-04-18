<?php

if (has_post_thumbnail()) {
  $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
  $image_sizes = [$image_data[1], $image_data[2]];
} else {
  $image_sizes = [498, 700];
}

$post_class = ($image_sizes[0] > $image_sizes[1]) ? 'horizontal' : 'vertical';

// Get category names
$terms_object_list = get_the_terms($post->ID, 'category');
$terms_string = join(', ', wp_list_pluck($terms_object_list, 'name'));


$link = (get_field('link') ? get_field('link') : get_the_permalink());
?>

<li class="post post--<?= $post_class ?>"><a class="post__link" href="<?= $link; ?>"></a>
  <div class="post__wrap">
    <div class="post__bg">
      <?
      if (has_post_thumbnail()) {
        the_post_thumbnail('large', array('itemprop' => 'image'));
      } else { ?>
        <img src="<?= get_template_directory_uri() ?>/assets/nophoto.jpg" alt="No photo" width="<?= $image_sizes[0]; ?>" height="<?= $image_sizes[1]; ?>" />
      <? }

      ?>
    </div>
    <div class="post__content">
      <div class="post__type"></div>
      <div class="post__sections"><?= $terms_string; ?></div>
      <div class="post__bottom">
        <div class="post__address"><?= get_field('address'); ?></div>
        <div class="post__title"><? the_title(); ?></div>
        <div class="post__button"><a class="button button--arrow-right" href="#"><svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg></a></div>
      </div>
      <div class="post__date">
        <? echo event_dates(); ?>
      </div>
    </div>
  </div>
</li>