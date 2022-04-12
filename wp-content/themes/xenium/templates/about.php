<?php

/**
 * Template name: About
 * Template Post Type: page
 */
get_header();
?>

<main class="main">
  <section class="section about">
    <div class="container">
      <h1 class="about__title title"><span class="title__wrap"><span class="title__text"><?= mb_strtolower(get_the_title()) ?></span></span></h1>
      <div class="about__content-wrap">
        <div class="about__left">
          <div class="about__lead"><?= get_field('lead'); ?></div>
        </div>
        <div class="about__content">

          <? if (!empty(get_field('gallery'))) { ?>
            <div class="about__slider content-slider swiper-container">
              <ul class="content-slider__wrapper swiper-wrapper">
                <? foreach (get_field('gallery') as $image) { ?>
                  <li class="content-slider__item swiper-slide">
                    <div class="content-slider__item-image"><img src="<?= $image['sizes']['large'] ?>" alt="<?= esc_html(get_the_title()) ?>"></div>
                  </li>
                <? } ?>
              </ul>
              <div class="content-slider__nav">
                <div class="content-slider__nav-arrow content-slider__nav-arrow--left">
                  <a class="button button--arrow-left" href="#">
                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </a>
                </div>
                <div class="content-slider__nav-arrow content-slider__nav-arrow--right">
                  <a class="button button--arrow-right" href="#">
                    <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          <? } ?>

          <div class="about__content-text text">
            <? the_content() ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>