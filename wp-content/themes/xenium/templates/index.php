<?php

/**
 * Template name: Index
 * Template Post Type: page
 */
get_header();

$options = get_option('theme_settings');

?>
<main class="main">
  <div class="preloader preloader--visible">
    <div class="preloader__container">
      <div class="preloader__left">
        <svg>
          <use xlink:href="#preloader-x"></use>
        </svg>
      </div>
      <div class="preloader__center">
        <svg>
          <use xlink:href="#preloader-center"></use>
        </svg>
      </div>
      <div class="preloader__right">
        <svg>
          <use xlink:href="#preloader-g"></use>
        </svg>
      </div>
    </div>
  </div>
  <section class="section main-slider">
    <div class="main-slider__container container">
      <div class="main-slider-1 swiper-container">
        <ul class="main-slider__wrapper swiper-wrapper">
          <li class="main-slider-1__item swiper-slide">
            <div class="main-slider-1__item-content">
              <div class="main-slider-1__item-author">Aurello Bruni</div>
              <div class="main-slider-1__item-name"><a href="artwork.html">Still<br>Life</a></div>
              <div class="main-slider-1__item-description">oil on canvas, 50x70</div>
              <div class="main-slider-1__item-button-wrap"><a class="main-slider-1__item-button button" href="artwork.html">Learn more</a></div>
            </div>
          </li>
          <li class="main-slider-1__item swiper-slide">
            <div class="main-slider-1__item-content">
              <div class="main-slider-1__item-author">Aurello Bruni</div>
              <div class="main-slider-1__item-name"><a href="artwork.html">Still<br>Life 2</a></div>
              <div class="main-slider-1__item-description">oil on canvas, 50x80</div>
              <div class="main-slider-1__item-button-wrap"><a class="main-slider-1__item-button button" href="artwork.html">Learn more</a></div>
            </div>
          </li>
          <li class="main-slider-1__item swiper-slide">
            <div class="main-slider-1__item-content">
              <div class="main-slider-1__item-author">Aurello Bruni</div>
              <div class="main-slider-1__item-name"><a href="artwork.html">Still<br>Life 3</a></div>
              <div class="main-slider-1__item-description">oil on canvas, 50x90</div>
              <div class="main-slider-1__item-button-wrap"><a class="main-slider-1__item-button button" href="artwork.html">Learn more</a></div>
            </div>
          </li>
        </ul>
      </div>
      <div class="main-slider-2 swiper-container">
        <ul class="main-slider__wrapper swiper-wrapper">
          <li class="main-slider-2__item swiper-slide">
            <div class="main-slider-2__item-image"><img src="<?php echo get_template_directory_uri() ?>/assets/main-slider-01.jpg" alt=""></div>
          </li>
          <li class="main-slider-2__item swiper-slide">
            <div class="main-slider-2__item-image"><img src="<?php echo get_template_directory_uri() ?>/assets/main-slider-02.jpg" alt=""></div>
          </li>
          <li class="main-slider-2__item swiper-slide">
            <div class="main-slider-2__item-image"><img src="<?php echo get_template_directory_uri() ?>/assets/main-slider-03.jpg" alt=""></div>
          </li>
        </ul>
        <div class="main-slider-2__nav">
          <div class="main-slider-2__nav-arrow main-slider-2__nav-arrow--left">
            <a class="button button--arrow-left" href="#">
              <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </a>
          </div>
          <div class="main-slider-2__nav-arrow main-slider-2__nav-arrow--right">
            <a class="button button--arrow-right" href="#">
              <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section main-posts">
    <div class="main-posts__nav-wrap">
      <div class="main-posts__nav-sticky">
        <div class="main-posts__nav-progress"></div>
        <div class="container">
          <ul class="main-posts__nav">
            <li class="main-posts__nav-item" data-anchor="1">
              <div class="main-posts__nav-item-progress"></div><a href="#posts-list-articles"><span>articles</span></a>
            </li>
            <li class="main-posts__nav-item" data-anchor="2">
              <div class="main-posts__nav-item-progress"></div><a href="#posts-list-news"><span>news</span></a>
            </li>
            <li class="main-posts__nav-item" data-anchor="3">
              <div class="main-posts__nav-item-progress"></div><a href="#posts-list-reviews"><span>reviews</span></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container">
      <ul class="main-posts__list posts__list posts__list--articles" id="posts-list-articles">
        <div class="posts__list-title posts__list-title--articles">articles</div>
        <li class="posts__item posts__item--vertical">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-01.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">Valery<br>Alyoshin</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--horizontal">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-02.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">Valery<br>Alyoshin</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--vertical">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-01.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">The new<br>part of art<br>history</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--horizontal">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-02.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">The Youth<br>of Antiquity</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
      </ul>
      <ul class="main-posts__list posts__list posts__list--news" id="posts-list-news">
        <div class="posts__list-title posts__list-title--news">news</div>
        <li class="posts__item posts__item--vertical">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-01.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">Valery<br>Alyoshin</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--horizontal">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-02.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">Valery<br>Alyoshin</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--vertical">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-01.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">The new<br>part of art<br>history</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--horizontal">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-02.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">The Youth<br>of Antiquity</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
      </ul>
      <ul class="main-posts__list posts__list posts__list--reviews" id="posts-list-reviews">
        <div class="posts__list-title posts__list-title--reviews">reviews</div>
        <li class="posts__item posts__item--vertical">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-01.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">Valery<br>Alyoshin</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--horizontal">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-02.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">Valery<br>Alyoshin</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--vertical">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-01.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">The new<br>part of art<br>history</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
        <li class="posts__item posts__item--horizontal">
          <a class="posts__item-link" href="#"></a>
          <div class="posts__item-bg"><img src="<?php echo get_template_directory_uri() ?>/assets/post-teaser-02.jpg" alt=""></div>
          <div class="posts__item-type">articles</div>
          <div class="posts__item-sections"></div>
          <div class="posts__item-bottom">
            <div class="posts__item-address"></div>
            <div class="posts__item-title"><a href="">The Youth<br>of Antiquity</a></div>
            <div class="posts__item-button">
              <a class="button button--arrow-right" href="#">
                <svg width="20" height="20" viewbox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M3.34497 10.207H16.2415" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                  <path d="M10.9656 4.93115L16.2414 10.207L10.9656 15.4829" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
              </a>
            </div>
          </div>
          <div class="posts__item-date"></div>
        </li>
      </ul>
    </div>
  </section>
  <section class="section main-black">
    <div class="main-black__bg">
      <div class="main-black__bg-item main-black__bg-item--01"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-01.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--02"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-02.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--03"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-03.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--04"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-04.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--05"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-05.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--06"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-06.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--07"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-01.jpg" alt=""></div>
      <div class="main-black__bg-item main-black__bg-item--08"><img src="<?php echo get_template_directory_uri() ?>/assets/main-black-bg-05.jpg" alt=""></div>
    </div>
    <div class="container">
      <div class="main-black__grid">
        <div class="main-black__title">Xenium Gallery</div>
        <div class="main-black__subtitle">in association
          <br>with
        </div>
        <div class="main-black__title-2">The New Athens</div>
        <div class="main-black__text">The following catalogue comprises Russian painting, and Greek and Italian sculpture from the mid 20th to early 21st centuries, in bronze, marble, gold, and oil on canvas.</div>
      </div><a class="main-black__button button button--black" href="#">Check gallery</a>
    </div>
  </section>
</main>

<?php get_footer() ?>