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
    <a class="gallery__item-link artwork-modal-reload0 artwork-modal__link" href="<?php the_permalink(); ?>" data-artwork-id="<?= $post->ID ?>"></a>
    <?php the_post_thumbnail('large', array('itemprop' => 'image')); ?>
    <div class="gallery__item-like icon" data-micromodal-open="modal-like">
      <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
        <clipPath id="icon-like">
          <path class="icon__fill" d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
          </path>
        </clipPath>
        <path class="icon__stroke" d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
        </path>
      </svg>
    </div>
  </div>
  <div class="gallery__item-content">
    <div class="gallery__item-title"><a class="artwork-modal-reload0 artwork-modal__link" href="<?php the_permalink(); ?>" data-artwork-id="<?= $post->ID ?>"><?php the_title(); ?></a></div>
    <? $author = get_field('relations');

    if (!empty($author[0]) && ($author[0]->post_type == 'artist')) { ?>
      <div class="gallery__item-author">
        <a href="<?= get_permalink($author[0]) ?>"><?= $author[0]->post_title ?></a>
      </div>
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