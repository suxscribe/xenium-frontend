<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?
    $currentArtworkId = $post->ID;
    $author = get_field('relations');
    foreach ($author as $post) {
      setup_postdata($post);
      if ($post->post_type == 'artist') {
        $authorData['url'] = get_the_permalink();
        $authorData['title'] = get_the_title();
        $authorData['years'] = get_field('years');
      }
      wp_reset_postdata();
    }
    ?>

    <main class="main">
      <div class="preloader preloader--visible preloader--inner">
        <div class="preloader__inner">
          <div class="preloader__inner-center">
            <div class="preloader__inner-image"></div><img class="preloader__logo" src="/assets/logo.svg" alt="">
          </div>
        </div>
      </div>
      <section class="section artwork">
        <div class="container">
          <h1 class="artwork__title title"><span class="title__wrap"><span class="title__text">
              </span><?php the_title(); ?></span>
          </h1>
          <div class="artwork__wrap">
            <div class="artwork__left">
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
                  <dt class="artwork__parameter-name">style</dt>
                  <dt class="artwork__parameter-value">
                    <? the_terms($post->ID, 'artwork_section', '', ', ', ''); ?>
                  </dt>
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
            <div class="artwork__right">
              <div class="artwork__gallery" itemscope itemtype="http://schema.org/ImageGallery">
                <figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
                  <?php $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full");
                  ?>
                  <a class="artwork__image-image" href="<?= $image_data[0] ?>" itemprop="contentUrl" data-size="<?= $image_data[1] . 'x' . $image_data[2] ?>">
                    <?php the_post_thumbnail('full', array('itemprop' => 'image')); ?>
                  </a>
                  <div class="artwork__image-icons"><a class="artwork__image-icon artwork__image-icon--size artwork-gallery-ignore" href=""><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
                        <g>
                          <rect x="12" y="2" transform="matrix(0.866 -0.5 0.5 0.866 -10.6641 14.2555)" width="18.6" height="50.1"></rect>
                          <line x1="22.8" y1="12.5" x2="11.9" y2="18.8"></line>
                          <line x1="35.7" y1="33.5" x2="24.8" y2="39.8"></line>
                          <line x1="29.4" y1="22.6" x2="22.8" y2="26.3"></line>
                        </g>
                      </svg></a><a class="artwork__image-icon artwork__image-icon--like artwork-gallery-ignore" href=""><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
                        <path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z">
                        </path>
                      </svg></a><a class="artwork__image-icon artwork__image-icon--zoom" href=""><svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
                        <g id="zoom">
                          <path d="M38.8,20.1c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5      C30.9,2.5,38.8,10.4,38.8,20.1z">
                          </path>
                          <line x1="27.2" y1="36.5" x2="36.1" y2="51.8"></line>
                          <line x1="21" y1="13.1" x2="21" y2="27"></line>
                          <line x1="28.2" y1="19.8" x2="14.3" y2="19.8"></line>
                        </g>
                      </svg></a></div>
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
          <div class="artwork__related">
            <h4 class="artwork__related-title"><span>another works in collection by artist</span></h4>

            <? foreach ($author as $post) {
              setup_postdata($post); ?>
              <? $authorWorks = get_field('relations');
              if ($authorWorks) { ?>
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
              <? } ?>
            <? wp_reset_postdata();
            } ?>

          </div>
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
                <div class="artwork__size artwork__size--sculpture">
                  <figure class="artwork__size-work">
                    <figcaption class="artwork__size-caption artwork__size-caption--left"><span>100 cm</span></figcaption>
                    <? $image_data = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "medium"); ?>
                    <img src="<?= $image_data[0]; ?>" alt="" data-height="100">
                  </figure>
                  <figure class="artwork__size-reference"><img src="<?= get_template_directory_uri() ?>/assets/artwork-size-reference.svg" alt="" data-height="200">
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
                <h3 class="modal__title">Sign up<br>for an event</h3>
                <form class="modal__form form form--modal">
                  <div class="form__row form__row-input stacked"><input class="validate--empty form__empty form__input" id="form-name" placeholder="Name" name="form-name" required>
                    <div class="form__note"></div><label class="form__label" for="form-name"></label>
                  </div>
                  <div class="form__row form__row-input stacked"><input class="validate--email form__email form__input" id="form-email" placeholder="E-mail" name="form-email" required>
                    <div class="form__note"></div><label class="form__label" for="form-email"></label>
                  </div>
                  <div class="form__row form__row-input stacked"><input class="validate--empty form__empty form__input" id="form-text" placeholder="Number of participants" name="form-text" required>
                    <div class="form__note"></div><label class="form__label" for="form-text"></label>
                  </div>
                  <div class="form__row form__submit"><button class="form__submit-button button button--black" type="submit">Send</button></div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>