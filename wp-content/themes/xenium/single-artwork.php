<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?
    $currentArtworkId = get_the_ID();
    $author = get_field('relations');
    $authorData = get_artwork_author($author);

    $artworkSize = (get_field('size_width') != '') ? get_field('size_width') : 50;

    ?>

    <main class="main">
      <section class="section artwork">
        <div class="container">
          <div class="artwork__back"><a class="artwork__back-link" href="/artwork/artwork_section/contemporary-art/">back to the gallery</a></div>

          <div class="artwork__wrap">
            <div class="artwork__left">
              <h1 class="artwork__title title"><span class="title__wrap"><span class="title__text">
                    <?php the_title(); ?></span></span>
              </h1>
              <div class="artwork__left-sticky">
                <div class="artwork__left-wrap">

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
                  <div class="artwork__icons"><a class="artwork__icon artwork__icon--size artwork-gallery-ignore" href="">
                      <div class="artwork__icon-fill artwork__icon-fill--size"></div><svg width="62" height="62" viewbox="0 0 62 62" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                    </a><a class="artwork__icon artwork__icon--like artwork-gallery-ignore" href="">
                      <div class="artwork__icon-fill artwork__icon-fill--like"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
                        <clipPath id="icon-like">
                          <path class="icon__fill" d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                          </path>
                        </clipPath>
                        <path class="icon__stroke" d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                        </path>
                      </svg>
                    </a><a class="artwork__icon artwork__icon--zoom" href="">
                      <div class="artwork__icon-fill artwork__icon-fill--zoom"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
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
                    <a class="artwork__image-icon artwork__image-icon--video artwork-gallery-ignore" href=""><svg width="56" height="56" viewbox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle class="svg-fill" cx="28" cy="28" r="27.5"></circle>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M45.1608 25.5161C46.1585 25.5161 46.9673 24.7074 46.9673 23.7097C46.9673 22.712 46.1585 21.9032 45.1608 21.9032C44.1632 21.9032 43.3544 22.712 43.3544 23.7097C43.3544 24.7074 44.1632 25.5161 45.1608 25.5161ZM45.1608 26.4194C46.6574 26.4194 47.8705 25.2062 47.8705 23.7097C47.8705 22.2132 46.6574 21 45.1608 21C43.6643 21 42.4512 22.2132 42.4512 23.7097C42.4512 25.2062 43.6643 26.4194 45.1608 26.4194Z">
                        </path>
                        <path d="M16.2587 27.4593L15.6633 27.4434V26.7289C16.1555 26.7237 16.5577 26.6601 16.87 26.5384C17.1875 26.4167 17.5289 26.16 17.8941 25.7684C18.2645 25.3768 18.4498 24.911 18.4498 24.3712C18.4498 23.8261 18.2592 23.3657 17.8782 22.9899C17.4971 22.6089 17.0367 22.4183 16.4969 22.4183C15.9624 22.4183 15.5019 22.6062 15.1156 22.982C14.9039 23.199 14.7478 23.4424 14.6472 23.7123L13.9645 23.4424C14.0809 23.0719 14.2847 22.7465 14.5758 22.466C15.1103 21.9367 15.7507 21.6721 16.4969 21.6721C17.2537 21.6721 17.8941 21.9394 18.418 22.4739C18.9472 23.0031 19.2119 23.6356 19.2119 24.3712C19.2119 25.1227 19.0107 25.7155 18.6085 26.1494C18.2063 26.5781 17.8306 26.8639 17.4813 27.0068C18.2434 27.2608 18.8758 27.6578 19.3786 28.1976C20.1036 28.9755 20.4661 29.8858 20.4661 30.9284C20.4661 31.9763 20.0957 32.8707 19.3547 33.6116C18.6191 34.3526 17.7273 34.723 16.6795 34.723C15.6369 34.723 14.7451 34.3499 14.0042 33.6037C13.4167 33.011 13.0622 32.3177 12.9404 31.5238L13.6628 31.2618C13.7369 31.9657 14.028 32.5717 14.5361 33.0798C15.1341 33.6725 15.8486 33.9689 16.6795 33.9689C17.5209 33.9689 18.2381 33.6725 18.8308 33.0798C19.4235 32.487 19.7199 31.7699 19.7199 30.9284C19.7199 30.0922 19.4315 29.3592 18.8546 28.7295C18.2778 28.0997 17.4125 27.6763 16.2587 27.4593Z">
                        </path>
                        <path d="M24.102 27.8642C23.3981 28.568 23.0462 29.4175 23.0462 30.4124C23.0462 31.4074 23.3981 32.2568 24.102 32.9607C24.8059 33.6593 25.6553 34.0086 26.6502 34.0086C27.6452 34.0086 28.4946 33.6593 29.1985 32.9607C29.9024 32.2568 30.2543 31.4074 30.2543 30.4124C30.2543 29.4175 29.9024 28.568 29.1985 27.8642C28.4946 27.1603 27.6452 26.8083 26.6502 26.8083C25.6553 26.8083 24.8059 27.1603 24.102 27.8642ZM23.8241 27.0862C24.6233 26.3929 25.5653 26.0462 26.6502 26.0462C27.8569 26.0462 28.8836 26.4723 29.7304 27.3243C30.5824 28.1764 31.0085 29.2058 31.0085 30.4124C31.0085 31.6138 30.5824 32.6405 29.7304 33.4926C28.8836 34.3446 27.8569 34.7707 26.6502 34.7707C25.4489 34.7707 24.4222 34.3446 23.5701 33.4926C22.7498 32.6722 22.3237 31.6905 22.292 30.5474H22.2444C22.2973 28.6792 22.7471 27.1523 23.5939 25.9669C24.4407 24.7814 25.4886 23.49 26.7376 22.0929C26.8116 22.0082 26.8831 21.9262 26.9519 21.8468H27.9363C27.8304 21.9791 27.7193 22.1114 27.6029 22.2437C26.211 23.7996 25.1075 25.1571 24.2925 26.3161C24.1178 26.5596 23.9617 26.8163 23.8241 27.0862Z">
                        </path>
                        <path d="M40.1536 26.205C40.1536 25.21 39.8017 24.3633 39.0978 23.6647C38.3939 22.9608 37.5445 22.6089 36.5496 22.6089C35.5546 22.6089 34.7052 22.9608 34.0013 23.6647C33.2974 24.3633 32.9455 25.21 32.9455 26.205V30.4124C32.9455 31.4074 33.2974 32.2568 34.0013 32.9607C34.7052 33.6593 35.5546 34.0086 36.5496 34.0086C37.5445 34.0086 38.3939 33.6593 39.0978 32.9607C39.8017 32.2568 40.1536 31.4074 40.1536 30.4124V26.205ZM40.9078 30.4124C40.9078 31.6138 40.4818 32.6405 39.6297 33.4926C38.7829 34.3446 37.7562 34.7707 36.5496 34.7707C35.3482 34.7707 34.3215 34.3446 33.4694 33.4926C32.6173 32.6405 32.1913 31.6138 32.1913 30.4124V26.205C32.1913 25.0036 32.6173 23.9769 33.4694 23.1249C34.3215 22.2728 35.3482 21.8468 36.5496 21.8468C37.7562 21.8468 38.7829 22.2728 39.6297 23.1249C40.4818 23.9769 40.9078 25.0036 40.9078 26.205V30.4124Z">
                        </path>
                      </svg></a>
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
                <h4 class="artwork__related-title"><span>another works in collection by artist</span></h4>


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
                <div class="pswp__counter"></div><button class="pswp__button pswp__button--close button--close-icon" title="Close (Esc)"><svg>
                    <use xlink:href="#close-stroke"></use>
                  </svg></button><button class="pswp__button pswp__button--fs button--fullscreen" title="Toggle fullscreen"><svg>
                    <use xlink:href="#fullscreen"></use>
                  </svg></button><button class="pswp__button pswp__button--zoom button--zoom" title="Zoom in/out"></button>
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
        <div class="modal micromodal-slide modal--size" id="modal-size" aria-hidden="true">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
            <div class="modal__container modal__container--size" role="dialog" aria-modal="true"><button class="modal__close close close--size" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
              <div class="modal__content modal__content--size">

                <div class="artwork__size artwork__size--<?= get_field('artwork_type') ?>">
                  <figure class="artwork__size-work">
                    <figcaption class="artwork__size-caption artwork__size-caption--left"><span><?= $artworkSize ?> cm</span></figcaption>
                    <? $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "medium"); ?>
                    <img src="<?= $image_data[0]; ?>" alt="" data-height="<?= $artworkSize ?>">
                  </figure>
                  <figure class="artwork__size-reference">
                    <? $referenceImage = (get_field('artwork_type') == 'sculpture') ? 'sculpture-size-reference.svg' : 'artwork-size-reference.svg' ?>
                    <img src="<?= get_template_directory_uri() ?>/assets/<?= $referenceImage ?>" alt="" data-height="200">

                    <figcaption class="artwork__size-caption artwork__size-caption--right"><span>200 cm</span>
                    </figcaption>
                  </figure>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal micromodal-slide modal--form" id="modal-enquiry" aria-hidden="true">
          <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
            <div class="modal__container modal__container--form" role="dialog" aria-modal="true"><button class="modal__close close close--form" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
              <div class="modal__content modal__content--form">
                <h3 class="modal__title">Request<br>a price</h3>
                <?= do_shortcode('[contact-form-7 id="436" title="Enquire form" html_class="modal__form form form--modal"]'); ?>

                <!-- <form class="modal__form form form--modal">
                  <div class="form__row form__row-input stacked"><input class="validate--empty form__empty form__input" id="enquire-name" placeholder="Name" name="enquire-name" required>
                    <div class="form__note"></div><label class="form__label" for="enquire-name"></label>
                  </div>
                  <div class="form__row form__row-input stacked"><input class="validate--email form__email form__input" id="enquire-email" placeholder="E-mail" name="enquire-email" required>
                    <div class="form__note"></div><label class="form__label" for="enquire-email"></label>
                  </div>
                  <div class="form__row form__row-input stacked"><input class="validate--empty form__empty form__input" id="enquire-text" placeholder="Artwork name" name="enquire-text" required>
                    <div class="form__note"></div><label class="form__label" for="enquire-text"></label>
                  </div>
                  <div class="form__row form__submit"><button class="form__submit-button button button--black" type="submit">Send</button></div>
                </form> -->
              </div>
            </div>
          </div>
        </div>
        <? if (get_field('video')) { ?>
          <div class="modal micromodal-slide modal--video" id="modal-video" aria-hidden="true">
            <div class="modal__overlay" tabindex="-1" data-micromodal-close="">
              <div class="modal__container modal__container--video" role="dialog" aria-modal="true"><button class="modal__close close close--video" aria-label="Close modal" data-micromodal-close=""><span class="close__top"></span><span class="close__bottom"></span></button>
                <div class="modal__content modal__content--video">
                  <div class="artwork__video"><video controls width="100%" disablepictureinpicture muted playsinline>
                      <source src="<?= get_field('video')[0]['url']; ?>" type="video/mp4">
                    </video></div>
                </div>
              </div>
            </div>
          </div>
        <? } ?>

      </section>
    </main>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>