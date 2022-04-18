<?php

/**
 * Template name: Index
 * Template Post Type: page
 */
get_header();
?>
<main class="main">
  <? get_template_part('partials/main-slider'); ?>
  <?

  $posts_0 = 'links';
  $args = array(
    'post_type'    => 'post',
    'category_name' => $posts_0
  );
  $query_0 = new WP_Query($args);

  /* $posts_1 = 'reviews';
  $args = array(
    'post_type'    => 'post',
    'category_name' => $posts_1
  );
  $query_1 = new WP_Query($args);

  $posts_2 = 'news';
  $args = array(
    'post_type'    => 'post',
    'category_name' => $posts_2
  );
  $query_2 = new WP_Query($args);

  $posts_3 = 'articles';
  $args = array(
    'post_type'    => 'post',
    'category_name' => $posts_3
  );
  $query_3 = new WP_Query($args); */

  ?>


  <section class="section main-posts">
    <div class="main-posts__nav-wrap">
      <div class="main-posts__nav-sticky">
        <div class="main-posts__nav-progress"></div>
        <div class="container">
          <ul class="main-posts__nav">
            <? if ($query_0->have_posts()) { ?>
              <li class="main-posts__nav-item" data-anchor="1">
                <div class="main-posts__nav-item-progress"></div><a href="#posts-list-links"><span><?= $posts_0 ?></span></a>
              </li>
            <? } ?>

            <? /* if ($query_1->have_posts()) { ?>
              <li class="main-posts__nav-item" data-anchor="1">
                <div class="main-posts__nav-item-progress"></div><a href="#posts-list-articles"><span><?= $posts_1 ?></span></a>
              </li>
            <? } ?>
            <? if ($query_2->have_posts()) { ?>
              <li class="main-posts__nav-item" data-anchor="2">
                <div class="main-posts__nav-item-progress"></div><a href="#posts-list-news"><span><?= $posts_2 ?></span></a>
              </li>
            <? } ?>
            <? if ($query_2->have_posts()) { ?>
              <li class="main-posts__nav-item" data-anchor="3">
                <div class="main-posts__nav-item-progress"></div><a href="#posts-list-reviews"><span><?= $posts_3 ?></span></a>
              </li>
            <?  } */ ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <?
      if ($query_0->have_posts()) { ?>
        <ul class="main-posts__list posts__list posts__list--articles" id="posts-list-links">
          <div class="posts__list-title posts__list-title--articles"><?= $posts_0 ?></div>
          <?
          while ($query_0->have_posts()) : $query_0->the_post(); ?>
            <?php get_template_part('partials/post-teaser'); ?>
          <?
          endwhile;
          wp_reset_query();
          ?>
        </ul>
      <? } ?>

      <?
      /* if  ($query_1->have_posts()) { ?>
        <ul class="main-posts__list posts__list posts__list--articles" id="posts-list-articles">
          <div class="posts__list-title posts__list-title--articles"><?= $posts_1 ?></div>
          <?
          while ($query_1->have_posts()) : $query_1->the_post(); ?>
            <?php get_template_part('partials/post-teaser'); ?>
          <?
          endwhile;
          wp_reset_query();
          ?>
        </ul>
      <? } ?>

      <?
      if ($query_2->have_posts()) { ?>
        <ul class="main-posts__list posts__list posts__list--news" id="posts-list-news">
          <div class="posts__list-title posts__list-title--news"><?= $posts_2 ?></div>
          <?
          while ($query_2->have_posts()) : $query_2->the_post(); ?>
            <?php get_template_part('partials/post-teaser'); ?>
          <?
          endwhile;
          wp_reset_query();
          ?>
        </ul>
      <? }
      ?>

      <?
      if ($query_3->have_posts()) { ?>
        <ul class="main-posts__list posts__list posts__list--reviews" id="posts-list-reviews">
          <div class="posts__list-title posts__list-title--reviews"><?= $posts_3 ?></div>
          <?
          while ($query_3->have_posts()) : $query_3->the_post(); ?>
            <?php get_template_part('partials/post-teaser'); ?>
          <?
          endwhile;
          wp_reset_query();
          ?>
        </ul>
      <? } */
      ?>

    </div>
  </section>
  <section class="section main-black">
    <div class="main-black__bg">
      <div class="main-black__bg-item main-black__bg-item--01"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-01.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--02"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-02.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--03"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-03.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--04"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-04.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--05"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-05.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--06"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-06.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--07"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-01.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--08"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-05.jpg" alt=""></div>
    </div>
    <div class="container">
      <div class="main-black__grid">
        <div class="main-black__title"><?= get_field('line_1') ?></div>
        <div class="main-black__subtitle"><?= get_field('line_2') ?></div>
        <div class="main-black__title-2"><?= get_field('line_3') ?></div>
        <div class="main-black__text"><?= get_field('text') ?></div>
      </div><a class="main-black__button button button--black" href="<?= get_field('link') ?>">Check gallery</a>
    </div>
  </section>
</main>

<?php get_footer() ?>