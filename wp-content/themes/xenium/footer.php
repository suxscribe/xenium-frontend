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
          <? if (get_field('facebook', 'option') != '') { ?>
            <a class="footer__social-link icon icon--social" target="_blank" href="<? the_field('facebook', 'option'); ?>">
              <div class="icon__wrap icon__wrap--facebook"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
                <clipPath id="icon-facebook" clipPathUnits="objectBoundingBox">
                  <path class="icon__fill" d="M0.48,0.686 v0.324 H0.01 v-1 h1 v1 H0.638 V0.686 h0.108 l0.03,-0.138 h-0.118 h0 c-0.01,0,-0.02,0,-0.02,-0.01 V0.48 c0,-0.078,0.058,-0.104,0.088,-0.108 h0.05 v-0.12 c0,-0.004,-0.002,-0.008,-0.006,-0.008 c-0.06,-0.012,-0.126,-0.024,-0.184,-0.004 c-0.076,0.028,-0.102,0.088,-0.104,0.122 v0.186 h-0.128 v0.138 H0.48">
                  </path>
                </clipPath>
                <path class="icon__stroke" d="M24,34.3v16.2H0.5v-50h50v50H31.9V34.3h5.4l1.5-6.9h-5.9h0c-0.5,0-1,0-1-0.5V24c0-3.9,2.9-5.2,4.4-5.4h2.5v-6    c0-0.2-0.1-0.4-0.3-0.4c-3-0.6-6.3-1.2-9.2-0.2c-3.8,1.4-5.1,4.4-5.2,6.1v9.3h-6.4v6.9H24z">
                </path>
              </svg>
            </a>
          <? } ?>
          <? if (get_field('facebook', 'option') != '') { ?>
            <a class="footer__social-link icon icon--social" target="_blank" href="<? the_field('twitter', 'option'); ?>">
              <div class="icon__wrap icon__wrap--twitter"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
                <clipPath id="icon-twitter" clipPathUnits="objectBoundingBox">
                  <path class="icon__fill" d="M0.314,0.89L0.314,0.89c-0.096,0-0.19-0.024-0.275-0.071c0.002,0,0.006,0,0.008,0c0.094,0,0.186-0.031,0.261-0.09	l0.022-0.018H0.302c-0.041,0-0.08-0.014-0.114-0.039C0.161,0.651,0.137,0.624,0.124,0.59c0.027,0.004,0.055,0,0.08-0.006v-0.02	C0.159,0.555,0.12,0.531,0.092,0.496c-0.025-0.031-0.041-0.071-0.043-0.11c0.025,0.012,0.053,0.018,0.082,0.02l0.033,0.002	l-0.029-0.02C0.094,0.361,0.065,0.318,0.053,0.271c-0.01-0.043-0.004-0.09,0.014-0.129C0.118,0.2,0.178,0.249,0.249,0.284	c0.075,0.037,0.155,0.059,0.237,0.063H0.5L0.498,0.335C0.488,0.294,0.492,0.249,0.51,0.21c0.018-0.039,0.047-0.071,0.086-0.092	c0.037-0.02,0.082-0.027,0.124-0.02c0.043,0.008,0.082,0.027,0.112,0.059l0.004,0.004l0.006-0.002	c0.037-0.008,0.075-0.02,0.11-0.037C0.935,0.157,0.908,0.184,0.875,0.204L0.88,0.222c0.029-0.004,0.061-0.01,0.088-0.02	c-0.024,0.029-0.051,0.055-0.08,0.076L0.884,0.282v0.006c0,0.008,0,0.018,0,0.025C0.888,0.584,0.686,0.89,0.314,0.89z">
                  </path>
                </clipPath>
                <path class="icon__stroke" d="M16,45.4L16,45.4c-4.9,0-9.7-1.2-14-3.6c0.1,0,0.3,0,0.4,0c4.8,0,9.5-1.6,13.3-4.6l1.1-0.9l-1.4,0c-2.1,0-4.1-0.7-5.8-2c-1.4-1.1-2.6-2.5-3.3-4.2c1.4,0.2,2.8,0,4.1-0.3l0-1c-2.3-0.5-4.3-1.7-5.7-3.5c-1.3-1.6-2.1-3.6-2.2-5.6c1.3,0.6,2.7,0.9,4.2,1l1.7,0.1l-1.5-1c-2.1-1.4-3.6-3.6-4.2-6c-0.5-2.2-0.2-4.6,0.7-6.6c2.6,3,5.7,5.5,9.3,7.3c3.8,1.9,7.9,3,12.1,3.2l0.7,0l-0.1-0.6c-0.5-2.1-0.3-4.4,0.6-6.4s2.4-3.6,4.4-4.7c1.9-1,4.2-1.4,6.3-1c2.2,0.4,4.2,1.4,5.7,3l0.2,0.2l0.3-0.1c1.9-0.4,3.8-1,5.6-1.9c-0.8,1.8-2.2,3.2-3.9,4.2l0.3,0.9c1.5-0.2,3.1-0.5,4.5-1c-1.2,1.5-2.6,2.8-4.1,3.9l-0.2,0.2l0,0.3c0,0.4,0,0.9,0,1.3C45.3,29.8,35,45.4,16,45.4z">
                </path>
              </svg>
            </a>
          <? } ?>
          <? if (get_field('facebook', 'option') != '') { ?>
            <a class="footer__social-link icon icon--social" target="_blank" href="<? the_field('instagram', 'option'); ?>">
              <div class="icon__wrap icon__wrap--instagram"></div><svg width="51" height="51" viewbox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                <clipPath id="icon-instagram" clipPathUnits="objectBoundingBox">
                  <rect class="icon__fill" x="0" y="0" width="1" height="1"></rect>
                </clipPath>
                <rect class="icon__stroke" x="0" y="0" width="51" height="51" fill="white" stroke="black"></rect>
                <circle class="icon__stroke" cx="24.7031" cy="26.2969" r="5.9" stroke="black" stroke-width="12">
                </circle>
                <circle class="icon__stroke" cx="39.8438" cy="11.1562" r="1.3" stroke="black" stroke-width="2.6">
                </circle>
              </svg>
            </a>
          <? } ?>
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

<div class="modal micromodal-slide modal--size" id="modal-size" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--size" role="dialog" aria-modal="true"><button class="modal__close close close--size" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--size">

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

<div class="modal micromodal-slide modal--like" id="modal-like" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--like" role="dialog" aria-modal="true"><button class="modal__close close close--like" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--like">
        <div class="modal__like"><svg>
            <use xlink:href="#like"></use>
          </svg></div>
        <h3 class="modal__title">thank you!</h3>
        <p>You can share your favorite post in your social networks.</p>
        <?= do_shortcode('[contact-form-7 id="425" title="Like Form" html_class="modal__form form form--modal"]'); ?>

        <div class="modal__socials"><a class="modal__social modal__social--facebook icon icon--social" href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
            <div class="icon__wrap icon__wrap--facebook"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
              <clipPath id="icon-facebook" clipPathUnits="objectBoundingBox">
                <path class="icon__fill" d="M0.48,0.686 v0.324 H0.01 v-1 h1 v1 H0.638 V0.686 h0.108 l0.03,-0.138 h-0.118 h0 c-0.01,0,-0.02,0,-0.02,-0.01 V0.48 c0,-0.078,0.058,-0.104,0.088,-0.108 h0.05 v-0.12 c0,-0.004,-0.002,-0.008,-0.006,-0.008 c-0.06,-0.012,-0.126,-0.024,-0.184,-0.004 c-0.076,0.028,-0.102,0.088,-0.104,0.122 v0.186 h-0.128 v0.138 H0.48">
                </path>
              </clipPath>
              <path class="icon__stroke" d="M24,34.3v16.2H0.5v-50h50v50H31.9V34.3h5.4l1.5-6.9h-5.9h0c-0.5,0-1,0-1-0.5V24c0-3.9,2.9-5.2,4.4-5.4h2.5v-6    c0-0.2-0.1-0.4-0.3-0.4c-3-0.6-6.3-1.2-9.2-0.2c-3.8,1.4-5.1,4.4-5.2,6.1v9.3h-6.4v6.9H24z">
              </path>
            </svg>
          </a><a class="modal__social modal__social--twitter icon icon--social" href="http://twitter.com/share?url=" target="_blank">
            <div class="icon__wrap icon__wrap--twitter"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
              <clipPath id="icon-twitter" clipPathUnits="objectBoundingBox">
                <path class="icon__fill" d="M0.314,0.89L0.314,0.89c-0.096,0-0.19-0.024-0.275-0.071c0.002,0,0.006,0,0.008,0c0.094,0,0.186-0.031,0.261-0.09	l0.022-0.018H0.302c-0.041,0-0.08-0.014-0.114-0.039C0.161,0.651,0.137,0.624,0.124,0.59c0.027,0.004,0.055,0,0.08-0.006v-0.02	C0.159,0.555,0.12,0.531,0.092,0.496c-0.025-0.031-0.041-0.071-0.043-0.11c0.025,0.012,0.053,0.018,0.082,0.02l0.033,0.002	l-0.029-0.02C0.094,0.361,0.065,0.318,0.053,0.271c-0.01-0.043-0.004-0.09,0.014-0.129C0.118,0.2,0.178,0.249,0.249,0.284	c0.075,0.037,0.155,0.059,0.237,0.063H0.5L0.498,0.335C0.488,0.294,0.492,0.249,0.51,0.21c0.018-0.039,0.047-0.071,0.086-0.092	c0.037-0.02,0.082-0.027,0.124-0.02c0.043,0.008,0.082,0.027,0.112,0.059l0.004,0.004l0.006-0.002	c0.037-0.008,0.075-0.02,0.11-0.037C0.935,0.157,0.908,0.184,0.875,0.204L0.88,0.222c0.029-0.004,0.061-0.01,0.088-0.02	c-0.024,0.029-0.051,0.055-0.08,0.076L0.884,0.282v0.006c0,0.008,0,0.018,0,0.025C0.888,0.584,0.686,0.89,0.314,0.89z">
                </path>
              </clipPath>
              <path class="icon__stroke" d="M16,45.4L16,45.4c-4.9,0-9.7-1.2-14-3.6c0.1,0,0.3,0,0.4,0c4.8,0,9.5-1.6,13.3-4.6l1.1-0.9l-1.4,0c-2.1,0-4.1-0.7-5.8-2c-1.4-1.1-2.6-2.5-3.3-4.2c1.4,0.2,2.8,0,4.1-0.3l0-1c-2.3-0.5-4.3-1.7-5.7-3.5c-1.3-1.6-2.1-3.6-2.2-5.6c1.3,0.6,2.7,0.9,4.2,1l1.7,0.1l-1.5-1c-2.1-1.4-3.6-3.6-4.2-6c-0.5-2.2-0.2-4.6,0.7-6.6c2.6,3,5.7,5.5,9.3,7.3c3.8,1.9,7.9,3,12.1,3.2l0.7,0l-0.1-0.6c-0.5-2.1-0.3-4.4,0.6-6.4s2.4-3.6,4.4-4.7c1.9-1,4.2-1.4,6.3-1c2.2,0.4,4.2,1.4,5.7,3l0.2,0.2l0.3-0.1c1.9-0.4,3.8-1,5.6-1.9c-0.8,1.8-2.2,3.2-3.9,4.2l0.3,0.9c1.5-0.2,3.1-0.5,4.5-1c-1.2,1.5-2.6,2.8-4.1,3.9l-0.2,0.2l0,0.3c0,0.4,0,0.9,0,1.3C45.3,29.8,35,45.4,16,45.4z">
              </path>
            </svg>
          </a>
          <!-- <a class="modal__social icon icon--social" href="#">
            <div class="icon__wrap icon__wrap--instagram"></div><svg width="51" height="51" viewbox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
              <clipPath id="icon-instagram" clipPathUnits="objectBoundingBox">
                <rect class="icon__fill" x="0" y="0" width="1" height="1"></rect>
              </clipPath>
              <rect class="icon__stroke" x="0" y="0" width="51" height="51" fill="white" stroke="black"></rect>
              <circle class="icon__stroke" cx="24.7031" cy="26.2969" r="5.9" stroke="black" stroke-width="12">
              </circle>
              <circle class="icon__stroke" cx="39.8438" cy="11.1562" r="1.3" stroke="black" stroke-width="2.6">
              </circle>
            </svg>
          </a> -->
          <a class="modal__social icon icon--social js-copy-link" href="#"><svg>
              <use xlink:href="#link"></use>
            </svg></a>
        </div>
      </div>
    </div>
  </div>
</div>

<div id="pswp-container" class="pswp-container">

</div>

<div class="modal micromodal-slide modal--video" id="modal-video" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--video" role="dialog" aria-modal="true"><button class="modal__close close close--video" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--video">

      </div>
    </div>
  </div>
</div>

<div class="artwork-modal" aria-hidden="true">
  <div class="artwork-modal__container"><a class="artwork-modal__close close--black close" href="#"><span class="close__top"></span><span class="close__bottom"></span></a>
    <div class="artwork__loader"><svg>
        <use xlink:href="#loader"></use>
      </svg></div>

    <div class="artwork">

    </div>
  </div>
</div>

<div class="modal micromodal-slide modal--form" id="modal-enquiry" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--form" role="dialog" aria-modal="true"><button class="modal__close close close--form" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--form">
        <h3 class="modal__title">Request<br>a price</h3>
        <?= do_shortcode('[contact-form-7 id="436" title="Enquire form" html_class="modal__form form form--modal"]'); ?>

      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>

</html>