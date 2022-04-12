<?php

/**
 * Template name: Contacts
 * Template Post Type: page
 */
get_header();
?>

<main class="main">
  <section class="section contacts">
    <div class="container">
      <h1 class="contacts__title title"><span class="title__wrap"><span class="title__text"><?= mb_strtolower(get_the_title()) ?></span></span>
      </h1>
      <div class="contacts__content-wrap">
        <div class="contacts__left">
          <div class="contacts__subtitle">feedback</div>

          <?= do_shortcode('[contact-form-7 id="351" title="Contacts form" html_class="contacts__form form"]'); ?>
        </div>
        <div class="contacts__content">
          <div class="contacts__card">
            <div class="contacts__card-image"><img src="<? the_field('contacts_image', 'option'); ?>" alt=""></div>
            <div class="contacts__card-content">
              <div class="contacts__card-role"><? the_field('curator_role', 'option'); ?></div>
              <div class="contacts__card-name"><? the_field('curator_name', 'option'); ?></div>
              <div class="contacts__card-phone"><? the_field('phone', 'option'); ?></div>
              <div class="contacts__card-email"><a href="<? the_field('email', 'option'); ?>"><? the_field('email', 'option'); ?></a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer() ?>