<?
if (has_post_thumbnail()) {
  $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "large");
  $image_sizes = [$image_data[1], $image_data[2]];
} else {
  $image_sizes = [498, 700];
}

$post_class = ($image_sizes[0] > $image_sizes[1]) ? 'horizontal' : 'vertical';
?>

<li class="gallery__item gallery__item--<?= $post_class ?>" data-aos-delay="200">
  <div class="gallery__item-image">
    <a class="gallery__item-link artwork-modal-reload" href="<?php the_permalink(); ?>"></a>
    <?php the_post_thumbnail('large', array('itemprop' => 'image')); ?>
    <div class="gallery__item-like" data-micromodal-open="modal-gallery-like"><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
        <path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z">
        </path>
      </svg>
    </div>
  </div>
  <div class="gallery__item-content">
    <div class="gallery__item-title"><a class="artwork-modal-reload" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
    <? $author = get_field('relations');

    if (!empty($author[0]) && ($author[0]->post_type == 'artist')) { ?>
      <div class="gallery__item-author"><?= $author[0]->post_title ?></div>
    <? } ?>

    <?php
    $terms = get_the_terms($post, 'artwork_section');

    foreach ($terms as $term) {
      $artworkSections[] = $term->name;
    }
    ?>
    <div class="gallery__item-tags"><?= implode(', ', $artworkSections) ?></div>

  </div>
</li>