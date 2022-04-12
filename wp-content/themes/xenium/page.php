<?php

/**
 * Template name: Page
 * Template Post Type: page
 */
get_header();
?>

<main class="main">
  <section class="section about">
    <div class="container">
      <h1 class="about__title title"><span class="title__wrap"><span class="title__text"><? get_the_title() ?></span></span></h1>
      <div class="about__content-wrap">
        <div class="about__left">
          <div class="about__lead"><?= get_field('lead'); ?></div>
        </div>
        <div class="about__content">

          <div class="about__content-text text">
            <? the_content() ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>