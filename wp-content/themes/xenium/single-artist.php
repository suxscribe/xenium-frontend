<?php get_header(); ?>
<main class="main">
  <div class="preloader preloader--visible preloader--inner">
    <div class="preloader__inner">
      <div class="preloader__inner-center">
        <div class="preloader__inner-image"></div><img class="preloader__logo" src="/assets/logo.svg" alt="">
      </div>
    </div>
  </div>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

      <section class="section author">
        <div class="container">
          <div class="author__header">
            <div class="author__top">
              <div class="author__avatar"><?php the_post_thumbnail('medium', array('itemprop' => 'image')); ?></div>
              <h1 class="author__name"><span><?php the_title(); ?></span></h1>
            </div>
            <div class="author__years"><?= get_field('years'); ?></div>
            <div class="author__description">
              <?php the_content(); ?>
            </div>

            <ul class="author__tags tags">
              <?php
              $terms = get_terms(array(
                'taxonomy' => 'artwork_section',
                'hide_empty' => true,
                'hierarchical' => false // include upper level ?
              ));

              foreach ($terms as $term) {
                echo '<li class="tag"><a href="'
                  . get_term_link($term) . '">' . $term->name . '</a></li>';
              }
              ?>
            </ul>
          </div>
          <? $authorWorks = get_field('relations');
          if ($authorWorks) {
          ?>
            <ul class="author__items gallery__items">
              <? foreach ($authorWorks as $post) {
                setup_postdata($post);
                get_template_part('partials/artwork-teaser');
                wp_reset_postdata();
              } ?>
            </ul>
          <? } ?>
          <div class="author__navigation navigation"><a class="navigation__link navigation__link--prev" href="">
              <div class="navigation__name">Valery Leontiev</div>
              <div class="arrow--prev navigation__arrow arrow arrow--wide"><svg>
                  <use xlink:href="#arrow-head"></use>
                </svg></div>
              <div class="navigation__desc">previous artist</div>
            </a><a class="navigation__link navigation__link--next" href="">
              <div class="navigation__name">Aurello Bruni</div>
              <div class="arrow--next navigation__arrow arrow arrow--wide"><svg>
                  <use xlink:href="#arrow-head"></use>
                </svg></div>
              <div class="navigation__desc">next artist</div>
            </a></div>
        </div>
        <div class="modal micromodal-slide modal--like" id="modal-like" aria-hidden="true">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
            <div class="modal__container modal__container--like" role="dialog" aria-modal="true"><button class="modal__close close close--like" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
              <div class="modal__content modal__content--like">
                <div class="modal__like"><svg>
                    <use xlink:href="#like"></use>
                  </svg></div>
                <h3 class="modal__title">thank you!</h3>
                <p>You can share your favorite post in your social networks.</p>
                <form class="modal__form form form--modal">
                  <div class="form__row form__row-input stacked"><input class="validate--email form__email form__input" id="form-email" placeholder="E-mail" name="form-email" required>
                    <div class="form__note"></div><label class="form__label" for="form-email"></label>
                  </div>
                  <div class="form__row form__submit"><button class="form__submit-button button button--black" type="submit">Send</button></div>
                </form>
                <div class="modal__socials"><a class="modal__social" href="#"><svg>
                      <use xlink:href="#facebook"></use>
                    </svg></a><a class="modal__social" href="#"><svg>
                      <use xlink:href="#twitter"></use>
                    </svg></a><a class="modal__social" href="#"><svg>
                      <use xlink:href="#instagram"></use>
                    </svg></a><a class="modal__social" href="#"><svg>
                      <use xlink:href="#link"></use>
                    </svg></a></div>
              </div>
            </div>
          </div>
        </div>
      </section>
  <?php endwhile;
  endif; ?>
</main>

<?php get_footer(); ?>