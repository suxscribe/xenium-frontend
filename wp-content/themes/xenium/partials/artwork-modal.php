<?
$currentArtworkId = get_the_ID();
$author = get_field('relations');
$authorData = get_artwork_author($author);

$image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "medium");
$artworkSize = (get_field('size_width') != '') ? get_field('size_width') : 50;

?>

<div class="container">
  <h1 class="artwork__title title"><span class="title__wrap"><span class="title__text">
        <?php the_title(); ?></span></span>
  </h1>
  <div class="artwork__wrap">
    <div class="artwork__left">

      <div class="artwork__left-sticky-container">
        <div class="artwork__left-sticky">

          <? if (!empty($authorData)) { ?>
            <a class="artwork__author" href="<?= $authorData['url']; ?>">
              <div class="artwork__author-name"><?= $authorData['title']; ?></div>
              <div class="artwork__author-years"><?= $authorData['years']; ?></div>
              <div class="artwork__author-hover">view<br>artist’s<br>profile</div>
              <div class="artwork__author-arrow"><svg>
                  <use xlink:href="#arrow-alt"></use>
                </svg></div>
            </a>
          <? } ?>

          <dl class="artwork__parameters">
            <? if (has_term()) { ?>
              <dt class="artwork__parameter-name">style</dt>
              <dt class="artwork__parameter-value">
                <? the_terms($post->ID, 'artwork_section', '', ', ', ''); ?>
              </dt>
            <? } ?>

            <? if (get_field('material') != '') { ?>
              <dt class="artwork__parameter-name">material</dt>
              <dt class="artwork__parameter-value"><?= get_field('material') ?></dt>
            <? } ?>
            <? if (get_field('year') != '') { ?>
              <dt class="artwork__parameter-name">year</dt>
              <dt class="artwork__parameter-value"><?= get_field('year') ?></dt>
            <? } ?>
            <? if ((get_field('size_width') != '') || (get_field('size_height') != '') || (get_field('size_depth') != '')) { ?>
              <?
              $sizes = array(get_field('size_width'), get_field('size_height'), get_field('size_depth')) ?>
              <dt class="artwork__parameter-name">size</dt>
              <dt class="artwork__parameter-value"><?= implode('x', array_filter($sizes)) ?></dt>
            <? } ?>
          </dl>

          <div class="artwork__description">
            <?php the_content(); ?>
          </div><a class="artwork__enquire button" data-micromodal-open="modal-enquiry">Enquire</a>
        </div>
      </div>
    </div>
    <div class="artwork__right">
      <div class="artwork__gallery" itemscope itemtype="http://schema.org/ImageGallery">
        <figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
          <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
          ?>
          <a class="artwork__image-image" href="<?= $image_data[0] ?>" itemprop="contentUrl" data-size="<?= $image_data[1] . 'x' . $image_data[2] ?>">
            <?php the_post_thumbnail('full', array('itemprop' => 'image')); ?>
          </a>
          <div class="artwork__icons"><a class="artwork__icon artwork__icon--size icon artwork-gallery-ignore" href="">
              <div class="icon__wrap icon__wrap--size"></div><svg width="62" height="62" viewbox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                <clipPath id="icon-size">
                  <rect class="icon__fill" x="10" y="13.4033" width="19.6242" height="51.0865" transform="rotate(-30 10 13.4033)" fill="white"></rect>
                </clipPath>
                <rect class="icon__stroke" x="10.683" y="13.5868" width="18.6242" height="50.0865" transform="rotate(-30 10.683 13.5868)" stroke="black"></rect>
                <line class="icon__stroke" x1="33.1748" y1="15.433" x2="22.25" y2="21.7405" stroke="black"></line>
                <line class="icon__stroke" x1="46.0405" y1="37.0736" x2="35.1157" y2="43.3811" stroke="black">
                </line>
                <line class="icon__stroke" x1="39.7329" y1="26.1483" x2="33.178" y2="29.9328" stroke="black">
                </line>
              </svg>
            </a><a class="artwork__icon artwork__icon--like icon artwork-gallery-ignore" href="">
              <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
                <clipPath id="icon-like">
                  <path class="icon__fill" d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                  </path>
                </clipPath>
                <path class="icon__stroke" d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                </path>
              </svg>
            </a><a class="artwork__icon artwork__icon--zoom icon" href="">
              <div class="icon__wrap icon__wrap--zoom"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
                <clipPath id="icon-zoom">
                  <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
                </clipPath>
                <path class="icon__stroke" d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
                </path>
                <line class="icon__stroke" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
                <line class="icon__stroke" x1="30.7" y1="17.1" x2="30.7" y2="31"></line>
                <line class="icon__stroke" x1="37.9" y1="23.8" x2="24.1" y2="23.8"></line>
              </svg>
            </a>
          </div>
          <? if (get_field('video')) { ?>
            <a class="artwork__icon artwork__icon--video icon icon--video artwork-gallery-ignore" href="">
              <div class="icon__wrap icon__wrap--video"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve">
                <clippath id="icon-video">
                  <circle class="icon__fill" cx="28" cy="28" r="28"></circle>
                </clippath>
                <circle class="icon__stroke" cx="28" cy="28" r="27.5"></circle>
                <path class="icon__stroke" d="M45.2,25.5c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8c-1,0-1.8,0.8-1.8,1.8S44.2,25.5,45.2,25.5z">
                </path>
                <path class="icon__front-fill" d="M16.3,27.5l-0.6,0v-0.7c0.5,0,0.9-0.1,1.2-0.2c0.3-0.1,0.7-0.4,1-0.8c0.4-0.4,0.6-0.9,0.6-1.4c0-0.5-0.2-1-0.6-1.4    c-0.4-0.4-0.8-0.6-1.4-0.6c-0.5,0-1,0.2-1.4,0.6c-0.2,0.2-0.4,0.5-0.5,0.7L14,23.4c0.1-0.4,0.3-0.7,0.6-1c0.5-0.5,1.2-0.8,1.9-0.8    c0.8,0,1.4,0.3,1.9,0.8c0.5,0.5,0.8,1.2,0.8,1.9c0,0.8-0.2,1.3-0.6,1.8c-0.4,0.4-0.8,0.7-1.1,0.9c0.8,0.3,1.4,0.7,1.9,1.2    c0.7,0.8,1.1,1.7,1.1,2.7c0,1-0.4,1.9-1.1,2.7c-0.7,0.7-1.6,1.1-2.7,1.1c-1,0-1.9-0.4-2.7-1.1c-0.6-0.6-0.9-1.3-1.1-2.1l0.7-0.3    c0.1,0.7,0.4,1.3,0.9,1.8c0.6,0.6,1.3,0.9,2.1,0.9c0.8,0,1.6-0.3,2.2-0.9c0.6-0.6,0.9-1.3,0.9-2.2c0-0.8-0.3-1.6-0.9-2.2    C18.3,28.1,17.4,27.7,16.3,27.5z">
                </path>
                <path class="icon__front-fill" d="M24.1,27.9c-0.7,0.7-1.1,1.6-1.1,2.5c0,1,0.4,1.8,1.1,2.5c0.7,0.7,1.6,1,2.5,1c1,0,1.8-0.3,2.5-1c0.7-0.7,1.1-1.6,1.1-2.5    c0-1-0.4-1.8-1.1-2.5c-0.7-0.7-1.6-1.1-2.5-1.1C25.7,26.8,24.8,27.2,24.1,27.9z M23.8,27.1c0.8-0.7,1.7-1,2.8-1    c1.2,0,2.2,0.4,3.1,1.3c0.9,0.9,1.3,1.9,1.3,3.1c0,1.2-0.4,2.2-1.3,3.1c-0.8,0.9-1.9,1.3-3.1,1.3c-1.2,0-2.2-0.4-3.1-1.3    c-0.8-0.8-1.2-1.8-1.3-2.9h0c0.1-1.9,0.5-3.4,1.3-4.6c0.8-1.2,1.9-2.5,3.1-3.9c0.1-0.1,0.1-0.2,0.2-0.2h1c-0.1,0.1-0.2,0.3-0.3,0.4    c-1.4,1.6-2.5,2.9-3.3,4.1C24.1,26.6,24,26.8,23.8,27.1z">
                </path>
                <path class="icon__front-fill" d="M40.2,26.2c0-1-0.4-1.8-1.1-2.5c-0.7-0.7-1.6-1.1-2.5-1.1c-1,0-1.8,0.4-2.5,1.1c-0.7,0.7-1.1,1.5-1.1,2.5v4.2    c0,1,0.4,1.8,1.1,2.5c0.7,0.7,1.6,1,2.5,1c1,0,1.8-0.3,2.5-1c0.7-0.7,1.1-1.6,1.1-2.5V26.2z M40.9,30.4c0,1.2-0.4,2.2-1.3,3.1    c-0.8,0.9-1.9,1.3-3.1,1.3c-1.2,0-2.2-0.4-3.1-1.3c-0.9-0.9-1.3-1.9-1.3-3.1v-4.2c0-1.2,0.4-2.2,1.3-3.1c0.9-0.9,1.9-1.3,3.1-1.3    c1.2,0,2.2,0.4,3.1,1.3c0.9,0.9,1.3,1.9,1.3,3.1V30.4z">
                </path>
              </svg>
            </a>
          <? } ?>
        </figure>
        <?

        $artworkGallery = get_field('gallery');

        foreach ($artworkGallery as $image) { ?>
          <?php require get_template_directory() . '/partials/artwork-image.php'; ?>
        <? }
        ?>

      </div>
    </div>
  </div>

  <? // Related works by author
  foreach ($author as $post) {
    setup_postdata($post); ?>
    <? $authorWorks = get_field('relations'); // get author works
    if ($authorWorks && (count($authorWorks) > 1)) { ?>
      <div class="artwork__related">
        <h4 class="artwork__related-title"><span>another works by artist</span></h4>


        <ul class="gallery__items">
          <? foreach ($authorWorks as $post) {
            setup_postdata($post); ?>

          <?
            if ($post->ID != $currentArtworkId) {
              get_template_part('partials/artwork-teaser');
            }
            wp_reset_postdata();
          } ?>
        </ul>
      </div>
    <? } ?>
  <? wp_reset_postdata();
  } ?>

  <? if (!empty($authorData)) { ?>
    <div class="artwork__navigation navigation"><a class="navigation__link navigation__link--right" href="<?= $authorData['url']; ?>">
        <div class="navigation__name">show all works</div>
        <div class="arrow--right navigation__arrow arrow arrow--wide"><svg>
            <use xlink:href="#arrow-head"></use>
          </svg></div>
        <div class="navigation__desc"><?= $authorData['title']; ?></div>
      </a>
    </div>
  <? } ?>
</div>
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div><button class="pswp__button pswp__button--close button--close-icon icon icon--white-stroke" title="Close (Esc)">
          <div class="icon__wrap icon__wrap--close"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
            <clipPath id="icon-close">
              <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
            </clipPath>
            <path class="icon__stroke icon__stroke--white icon__stroke--white" d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
            </path>
            <line class="icon__stroke icon__stroke--white" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
            <line class="icon__stroke" x1="25.9" y1="19.3" x2="35.7" y2="29.2"></line>
            <line class="icon__stroke" x1="35.7" y1="19" x2="25.9" y2="28.8"></line>
          </svg>
        </button><button class="pswp__button pswp__button--fs button--fullscreen" title="Toggle fullscreen"><svg>
            <use xlink:href="#fullscreen"></use>
          </svg></button><button class="pswp__button pswp__button--zoom button--zoom close close--zoom" title="Zoom in/out"><span class="close__top"></span><span class="close__bottom"></span></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
    </div>
  </div>
</div>
<? /*
<div class="modal micromodal-slide modal--like" id="modal-like" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--like" role="dialog" aria-modal="true"><button class="modal__close close close--like" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--like">
        <div class="modal__like"><svg>
            <use xlink:href="#like"></use>
          </svg></div>
        <h3 class="modal__title">thank you!</h3>
        <p>You can share your favorite post in your social networks.</p>
        <!-- <form class="modal__form form form--modal">
          <div class="form__row form__row-input stacked"><input class="validate--email form__email form__input" id="form-email" placeholder="E-mail" name="form-email" required>
            <div class="form__note"></div><label class="form__label" for="form-email"></label>
          </div>
          <div class="form__row form__submit"><button class="form__submit-button button button--black" type="submit">Send</button></div>
        </form> -->
        <?= do_shortcode('[contact-form-7 id="446" title="Artwork Like Form" html_class="modal__form form form--modal form--like"]'); ?>
        <div class="modal__socials">
          <a class="modal__social icon icon--social" target="_blank" onclick="window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode(get_permalink($currentArtworkId));  ?>">
            <div class="icon__wrap icon__wrap--facebook"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
              <clipPath id="icon-facebook" clipPathUnits="objectBoundingBox">
                <path class="icon__fill" d="M0.48,0.686 v0.324 H0.01 v-1 h1 v1 H0.638 V0.686 h0.108 l0.03,-0.138 h-0.118 h0 c-0.01,0,-0.02,0,-0.02,-0.01 V0.48 c0,-0.078,0.058,-0.104,0.088,-0.108 h0.05 v-0.12 c0,-0.004,-0.002,-0.008,-0.006,-0.008 c-0.06,-0.012,-0.126,-0.024,-0.184,-0.004 c-0.076,0.028,-0.102,0.088,-0.104,0.122 v0.186 h-0.128 v0.138 H0.48">
                </path>
              </clipPath>
              <path class="icon__stroke" d="M24,34.3v16.2H0.5v-50h50v50H31.9V34.3h5.4l1.5-6.9h-5.9h0c-0.5,0-1,0-1-0.5V24c0-3.9,2.9-5.2,4.4-5.4h2.5v-6    c0-0.2-0.1-0.4-0.3-0.4c-3-0.6-6.3-1.2-9.2-0.2c-3.8,1.4-5.1,4.4-5.2,6.1v9.3h-6.4v6.9H24z">
              </path>
            </svg>
          </a>
          <a class="modal__social icon icon--social" target="_blank" href="http://twitter.com/share?url=<?= urlencode(get_permalink($currentArtworkId));  ?>">
            <div class="icon__wrap icon__wrap--twitter"></div><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 51 51" style="enable-background:new 0 0 51 51;" xml:space="preserve">
              <clipPath id="icon-twitter" clipPathUnits="objectBoundingBox">
                <path class="icon__fill" d="M0.314,0.89L0.314,0.89c-0.096,0-0.19-0.024-0.275-0.071c0.002,0,0.006,0,0.008,0c0.094,0,0.186-0.031,0.261-0.09	l0.022-0.018H0.302c-0.041,0-0.08-0.014-0.114-0.039C0.161,0.651,0.137,0.624,0.124,0.59c0.027,0.004,0.055,0,0.08-0.006v-0.02	C0.159,0.555,0.12,0.531,0.092,0.496c-0.025-0.031-0.041-0.071-0.043-0.11c0.025,0.012,0.053,0.018,0.082,0.02l0.033,0.002	l-0.029-0.02C0.094,0.361,0.065,0.318,0.053,0.271c-0.01-0.043-0.004-0.09,0.014-0.129C0.118,0.2,0.178,0.249,0.249,0.284	c0.075,0.037,0.155,0.059,0.237,0.063H0.5L0.498,0.335C0.488,0.294,0.492,0.249,0.51,0.21c0.018-0.039,0.047-0.071,0.086-0.092	c0.037-0.02,0.082-0.027,0.124-0.02c0.043,0.008,0.082,0.027,0.112,0.059l0.004,0.004l0.006-0.002	c0.037-0.008,0.075-0.02,0.11-0.037C0.935,0.157,0.908,0.184,0.875,0.204L0.88,0.222c0.029-0.004,0.061-0.01,0.088-0.02	c-0.024,0.029-0.051,0.055-0.08,0.076L0.884,0.282v0.006c0,0.008,0,0.018,0,0.025C0.888,0.584,0.686,0.89,0.314,0.89z">
                </path>
              </clipPath>
              <path class="icon__stroke" d="M16,45.4L16,45.4c-4.9,0-9.7-1.2-14-3.6c0.1,0,0.3,0,0.4,0c4.8,0,9.5-1.6,13.3-4.6l1.1-0.9l-1.4,0c-2.1,0-4.1-0.7-5.8-2c-1.4-1.1-2.6-2.5-3.3-4.2c1.4,0.2,2.8,0,4.1-0.3l0-1c-2.3-0.5-4.3-1.7-5.7-3.5c-1.3-1.6-2.1-3.6-2.2-5.6c1.3,0.6,2.7,0.9,4.2,1l1.7,0.1l-1.5-1c-2.1-1.4-3.6-3.6-4.2-6c-0.5-2.2-0.2-4.6,0.7-6.6c2.6,3,5.7,5.5,9.3,7.3c3.8,1.9,7.9,3,12.1,3.2l0.7,0l-0.1-0.6c-0.5-2.1-0.3-4.4,0.6-6.4s2.4-3.6,4.4-4.7c1.9-1,4.2-1.4,6.3-1c2.2,0.4,4.2,1.4,5.7,3l0.2,0.2l0.3-0.1c1.9-0.4,3.8-1,5.6-1.9c-0.8,1.8-2.2,3.2-3.9,4.2l0.3,0.9c1.5-0.2,3.1-0.5,4.5-1c-1.2,1.5-2.6,2.8-4.1,3.9l-0.2,0.2l0,0.3c0,0.4,0,0.9,0,1.3C45.3,29.8,35,45.4,16,45.4z">
              </path>
            </svg>
          </a>

          <a class="modal__social icon icon--social js-copy-link" href="#"><svg>
              <use xlink:href="#link"></use>
            </svg></a>

        </div>
      </div>
    </div>
  </div>
</div>
*/ ?>
<input type="hidden" id="artwork-url" name="artwork-url" value="<?= get_permalink($currentArtworkId) ?>" />
<div class="artwork__utils">

  <div class="artwork__size artwork__size--<?= get_field('artwork_type') ?>">
    <figure class="artwork__size-work">
      <figcaption class="artwork__size-caption artwork__size-caption--left"><span><?= $artworkSize ?> cm</span></figcaption>
      <img src="<?= $image_data[0]; ?>" alt="" data-height="<?= $artworkSize ?>">
    </figure>
    <figure class="artwork__size-reference">
      <? $referenceImage = (get_field('artwork_type') == 'sculpture') ? 'sculpture-size-reference.svg' : 'artwork-size-reference.svg' ?>
      <img src="<?= get_template_directory_uri() ?>/assets/<?= $referenceImage ?>" alt="" data-height="200">

      <figcaption class="artwork__size-caption artwork__size-caption--right"><span>200 cm</span>
      </figcaption>
    </figure>
  </div>
  <? if (get_field('video')) { ?>

    <div class="artwork__video"><video controls width="100%" disablepictureinpicture muted playsinline>
        <source src="<?= get_field('video')[0]['url']; ?>" type="video/mp4">
      </video>
    </div>

  <? } ?>
</div>

<? /*<div class="modal micromodal-slide modal--form" id="modal-enquiry" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
    <div class="modal__container modal__container--form" role="dialog" aria-modal="true"><button class="modal__close close close--form" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
      <div class="modal__content modal__content--form">
        <h3 class="modal__title">Request<br>a price</h3>
        <?= do_shortcode('[contact-form-7 id="436" title="Enquire form" html_class="modal__form form form--modal form--enquire"]'); ?>

      </div>
    </div>
  </div>
</div> */ ?>