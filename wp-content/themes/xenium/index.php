<?php get_header(); ?>
<? $post_type = get_post_type(); ?>

<main class="main" id="content" role="main">
  <section class="section events">
    <div class="container">
      <h1 class="events__title title">
        <span class="title__wrap"><span class="title__text">
            events
          </span></span>
      </h1>
      <div class="events__navigation">
        <? get_template_part('partials/events-navigation-sections') ?>
      </div>
      <ul class="events__list posts__list">
        <?php if (have_posts()) {
          while (have_posts()) {
            the_post(); ?>
            <?php get_template_part('partials/post-teaser'); ?>
        <?php }
        } ?>
      </ul>
      <? //require get_template_directory() . '/partials/archive-pagination.php'; 
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>