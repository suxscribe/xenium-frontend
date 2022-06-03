<?php get_header(); ?>
<? $post_type = get_post_type(); ?>

<main class="main" id="content" role="main">
  <section class="section gallery">
    <div class="container">
      <h1 class="gallery__title title title--gallery">
        <div class="title__wrap">
          <div class="title__text">
            <?= post_type_archive_title() ?>
          </div>
        </div>
      </h1>
      <div class="gallery__navigation">

        <?php
        require get_template_directory() . '/partials/archive-pagination.php';
        require get_template_directory() . '/partials/archive-navigation.php';
        ?>

      </div>
      <ul class="gallery__items">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('partials/artwork-teaser'); ?>
        <?php endwhile;
        endif; ?>
      </ul>
      <? require get_template_directory() . '/partials/archive-pagination.php'; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>