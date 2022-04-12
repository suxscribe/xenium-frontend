<?php

/**
 * Template name: FAQ
 * Template Post Type: page
 */
get_header();
?>

<main class="main">
  <section class="section faq">
    <div class="container">
      <h1 class="faq__title title"><span class="title__wrap"><span class="title__text"><? the_title() ?></span></span></h1>

      <? if (have_rows('faq')) { ?>
        <div class="faq__accordion accordion">
          <? while (have_rows('faq')) {
            the_row();
          ?>
            <div class="accordion__item">
              <h2 class="accordion__item-header"><button class="accordion__item-trigger"><?= get_sub_field('question') ?></button></h2>
              <div class="accordion__item-panel">
                <div class="accordion__item-text"><?= get_sub_field('answer') ?></div>
              </div>
            </div>
          <?  } ?>

        <? } ?>
        </div>
  </section>
</main>

<?php get_footer() ?>