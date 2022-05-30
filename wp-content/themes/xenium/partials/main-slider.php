<?
// Get artworks with 'Show in slider' checked
$args = array(

  'post_type'    => 'artwork',
  'meta_query' => array(
    array(
      'key'     => 'show_in_slider',
      'value'   => '"Y"',
      'compare' => 'LIKE'
    )
  )
);
$the_query = new WP_Query($args);

$slider_items = array();

while ($the_query->have_posts()) : $the_query->the_post();

  $artist = get_field('relations');

  $item = array();
  $item['id'] = get_the_ID();
  $item['title'] = get_the_title();
  $item['url'] = get_the_permalink();
  $item['image'] = get_the_post_thumbnail_url($post, 'large');
  $item['artist'] = get_artwork_author($artist);
  $item['material'] = get_field('material');
  $item['sizes'] = [get_field('size_width'), get_field('size_height'), get_field('size_depth')];


  array_push($slider_items, $item);

endwhile;
wp_reset_query();

?>

<? if (!empty($slider_items)) { ?>
  <section class="section main-slider">
    <div class="main-slider__container container">
      <div class="main-slider-1 swiper-container">
        <ul class="main-slider__wrapper swiper-wrapper">
          <? foreach ($slider_items as $item) { ?>
            <li class="main-slider-1__item swiper-slide">
              <div class="main-slider-1__item-content">
                <div class="main-slider-1__item-author"><?= $item['artist']['title'] ?></div>
                <div class="main-slider-1__item-name"><a href="<?= $item['url'] ?>" class="artwork-modal__link" data-artwork-id="<?= $item['id'] ?>"><?= $item['title'] ?></a></div>
                <div class="main-slider-1__item-description">
                  <?
                  echo implode(
                    ', ',
                    array_filter(
                      [
                        $item['material'],
                        implode(
                          'x',
                          array_filter($item['sizes'])
                        )
                      ]
                    )
                  );
                  ?>
                </div>
                <div class="main-slider-1__item-button-wrap"><a class="main-slider-1__item-button button" href="<?= $item['url'] ?>">Learn more</a></div>
              </div>
            </li>
          <? } ?>

        </ul>
      </div>
      <div class="main-slider-2 swiper-container">
        <ul class="main-slider__wrapper swiper-wrapper">
          <? foreach ($slider_items as $item) { ?>
            <li class="main-slider-2__item swiper-slide">
              <a href="<?= $item['url'] ?>" class="main-slider-2__item-image"><img src="<?= $item['image'] ?>" alt="<? $item['title'] ?>"></a>
            </li>
          <? } ?>
        </ul>
        <div class="main-slider-2__nav">
          <div class="main-slider-2__nav-arrow main-slider-2__nav-arrow--left">
            <a class="button button--arrow-left" href="#">
              <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </a>
          </div>
          <div class="main-slider-2__nav-arrow main-slider-2__nav-arrow--right">
            <a class="button button--arrow-right" href="#">
              <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
<? } ?>