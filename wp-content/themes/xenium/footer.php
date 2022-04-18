<footer class="footer <? if (is_front_page() || is_404()) echo 'footer--black'; ?>">
  <div class="footer__wrapper container">
    <div class="footer__scrolltop">
      <a class="arrow arrow--up footer__scrolltop-link" href="#top">
        <svg class="arrow__head footer__scrolltop-svg">
          <use xlink:href="#arrow-head"></use>
        </svg>
      </a>
    </div>
    <div class="footer__top">
      <div class="footer__left">
        <div class="footer__email" data-aos="fade-up" data-aos-delay="100" data-aos-anchor=".footer"><a href="mailto:<? the_field('email', 'option'); ?>"><? the_field('email', 'option'); ?></a></div>
      </div>
      <div class="footer__right">
        <div class="footer__contacts" data-aos="fade-up" data-aos-delay="200" data-aos-anchor=".footer">Curation: <? the_field('curator_name', 'option'); ?> <? the_field('phone', 'option'); ?></div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="footer__left">
        <div class="footer__copyright" data-aos="fade-up" data-aos-delay="300" data-aos-anchor=".footer">
          <p>© <?= date('Y'); ?> Xenium Gallery</p>
          <p><a href="/privacy-policy/">Privacy policy</a></p>
        </div>
      </div>
      <div class="footer__right">
        <div class="footer__social" data-aos="fade-up" data-aos-delay="400" data-aos-anchor=".footer">
          <a class="footer__social-link" href="">
            <svg>
              <use xlink:href="#facebook"></use>
            </svg>
          </a>
          <a class="footer__social-link" href="">
            <svg>
              <use xlink:href="#twitter"></use>
            </svg>
          </a>
          <a class="footer__social-link" href="">
            <svg>
              <use xlink:href="#instagram"></use>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>
<div class="cookie">
  <div class="container">
    <div class="cookie__container">
      <div class="cookie__right">
        <div class="cookie__text">We use cookies to ensure that we give you the best experience on our website. If you continue without opting out, we'll assume that you are happy to receive all cookies on the Xenium Gallery website. You can change your cookie settings at any time through your browser settings but you may receive a limited service through the website because of this.</div><a class="cookie__link" href="">View More </a><a class="cookie__button button button--black" href="#">Accept and continue</a>
      </div>
    </div>
  </div>
</div>

<div class="modal micromodal-slide modal--form" id="modal-email" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--form" role="dialog" aria-modal="true"><button class="modal__close close close--form" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--form">
        <h3 class="modal__title">Join to us</h3>
        <?= do_shortcode('[contact-form-7 id="424" title="Burger Form" html_class="modal__form form form--modal"]'); ?>
      </div>
    </div>
  </div>
</div>

<div class="modal micromodal-slide modal--like" id="modal-gallery-like" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--like" role="dialog" aria-modal="true"><button class="modal__close close close--like" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--like">
        <div class="modal__like"><svg>
            <use xlink:href="#like"></use>
          </svg></div>
        <h3 class="modal__title">thank you!</h3>
        <p>You can share your favorite post in your social networks.</p>
        <?= do_shortcode('[contact-form-7 id="425" title="Like Form" html_class="modal__form form form--modal"]'); ?>

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

<?php wp_footer(); ?>
</body>

</html>