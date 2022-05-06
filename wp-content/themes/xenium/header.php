<!doctype html>
<html lang="ru">

<head>
  <meta charset="utf-8">
  <meta name="description" content="Description">

  <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">

  <?php wp_head(); ?>

</head>

<body <?php body_class('page'); ?>>
  <? if (is_front_page()) { ?>
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
  <?  } else { ?>
    <div class="preloader preloader--visible preloader--inner">
      <div class="preloader__inner">
        <div class="preloader__inner-center">
          <div class="preloader__inner-image"></div><img class="preloader__logo" src="<?= get_template_directory_uri() ?>/assets/logo.svg" alt="">
        </div>
      </div>
    </div>
  <? } ?>

  <header class="header">
    <div class="header__wrapper container">
      <a class="header__logo logo" href="/">
        <svg class="header__logo-big logo__svg" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 215 101" style="enable-background:new 0 0 215 101;" xml:space="preserve">
          <rect class="logo__middle" id="whiterect" x="101" width="13" height="101"></rect>
          <path class="logo__x" id="X" d="M76.7,8.4l-26.3,32l-26.3-32H7.6l34.6,42.1L7.6,92.6H24l26.4-32.1l26.3,32.1h16.5L58.6,50.5L93.2,8.4    H76.7z">
          </path>
          <path class="logo__g" id="G_1_" d="M207.9,49.7h-43.6v12h28.6c-2.2,5.7-5.6,10.8-10.7,14.4c-5.2,3.7-11.3,5.6-17.6,5.6    c-17,0-30.7-14-30.7-31.1s13.8-31.1,30.7-31.1c12,0,22.8,7.2,27.9,18.3H206c-2.7-8.8-8.1-16.7-15.5-22.2c-7.6-5.8-16.5-8.8-26-8.8    c-23.9,0-43.3,19.7-43.3,43.9c0,24.2,19.4,43.9,43.3,43.9c23.9,0,43.3-19.7,43.3-43.9C207.9,50.4,207.9,49.8,207.9,49.7z">
          </path>
          <g class="logo__text" id="text">
            <path d="M104.1,90.4V92l2.5,2l-2.5,2v1.6l3.4-2.8l3.4,2.8V96l-2.5-2l2.5-2.1v-1.5l-3.4,2.8L104.1,90.4z">
            </path>
            <path d="M109.7,87.7h-1.6v-4.2H107v4.2h-1.7v-4.5h-1.2V89h6.7v-5.7h-1.2V87.7z"></path>
            <path d="M104.1,76.6h4.5h0.7l-5.1,3.5v1.5h6.7v-1.3h-4.5h-0.7l5-3.5l0.1-0.1v-1.4h-6.7V76.6z"></path>
            <path d="M110.9,72.4h-6.7v1.3h6.7V72.4z"></path>
            <path d="M108.1,64.6h-3.9v1.3h3.9c1.2,0,1.8,0.6,1.8,1.9s-0.6,1.9-1.8,1.9h-3.9v1.3h3.9c1.9,0,2.9-1.1,2.9-3.1      C111,65.7,110,64.6,108.1,64.6z">
            </path>
            <path d="M110.9,55h-6.7v1.9l5.3,2.2l-5.3,2.1V63h6.7v-1.3h-5l5-2.1v-1.3l-5-2.1h5V55z"></path>
            <path d="M110.9,41.8l-0.9-0.4v-3.7l0.9-0.4v-1.3l-6.7,2.9v1.3l6.7,3V41.8z M108.8,38.1v2.8l-3.2-1.4L108.8,38.1z">
            </path>
            <path d="M110.9,30.3h-1.2V34h-5.5v1.3h6.7V30.3z"></path>
            <path d="M110.9,17.7h-1.2v4.5h-1.6v-4.2H107v4.2h-1.7v-4.5h-1.2v5.7h6.7V17.7z"></path>
            <path d="M110.9,15.2h-2.2v-2.4c0-0.1,0-0.1,0-0.2l2.2-1.2v-1.3l-2.4,1.3c-0.3-0.8-1-1.3-2-1.3c-1.4,0-2.3,0.9-2.3,2.5v3.6h6.7      L110.9,15.2L110.9,15.2z M106.4,11.6c0.8,0,1.2,0.4,1.2,1.4v2.3h-2.3V13C105.3,12,105.7,11.6,106.4,11.6z">
            </path>
            <path d="M107.4,43L107.4,43l-0.1,3.7h1.2v-2.3c0.4,0.2,0.8,0.4,1,0.8c0.3,0.4,0.4,0.8,0.4,1.3c0,1.3-1.1,2.4-2.4,2.4      c-1.3,0-2.4-1.1-2.4-2.4c0-0.9,0.6-1.8,1.4-2.1h0.1v-1.3h-0.1c-0.8,0.3-1.3,0.7-1.8,1.3c-0.5,0.6-0.8,1.3-0.8,2.1      c0,1.9,1.6,3.5,3.6,3.5s3.6-1.6,3.6-3.5C111.3,44.6,109.5,43,107.4,43C107.4,43,107.5,43,107.4,43z">
            </path>
            <path d="M104.1,4.8l2.8,2l-2.8,2v1.5l3.9-2.9h2.9V6.2H108l-3.9-2.9V4.8z"></path>
            <path d="M110.9,30.3h-1.2V34h-5.5v1.3h6.7V30.3z"></path>
            <path d="M110.9,24.4h-1.2v3.7h-5.5v1.3h6.7V24.4z"></path>
          </g>
        </svg>
        <svg class="header__logo-small" width="86" height="40" viewbox="0 0 86 40" fill="none" xmlns="http://www.w3.org/2000/svg">
          <g clip-path="url(#clip0_348_790)">
            <rect width="86" height="40" fill="white"></rect>
            <path d="M40.3109 0.0134277H0V40.0001H40.3109V0.0134277Z" fill="black"></path>
            <path d="M86 0H45.6891V39.9867H86V0Z" fill="black"></path>
            <path d="M30.6733 3.33228L20.1522 16.0081L9.63437 3.33228H3.03346L16.8534 19.9834L3.02002 36.6545H9.62093L20.1522 23.9621L30.6834 36.6545H37.291L23.4543 19.9834L37.2742 3.33228H30.6733Z" fill="white"></path>
            <path d="M83.3294 19.6801L65.7135 19.6768V24.4252H77.276C76.3825 26.7044 74.9884 28.6971 72.9594 30.11C70.8666 31.5661 68.4076 32.3359 65.8479 32.3359C58.9984 32.3359 53.4288 26.8077 53.4288 20.0167C53.4288 13.2223 59.0018 7.69743 65.8479 7.69743C70.7087 7.69743 75.1026 10.5198 77.1148 14.925H82.5669C81.4885 11.4562 79.2714 8.33055 76.3287 6.13461C73.2819 3.86537 69.6573 2.66577 65.8479 2.66577C56.2035 2.66577 48.3563 10.4498 48.3563 20.0167C48.3563 29.5835 56.2035 37.3675 65.8479 37.3675C75.4923 37.3675 83.3395 29.5835 83.3395 20.0167C83.3395 19.9467 83.3294 19.7234 83.3294 19.6801Z" fill="white"></path>
          </g>
          <defs>
            <clippath id="clip0_348_790">
              <rect width="86" height="40" fill="white"></rect>
            </clippath>
          </defs>
        </svg>
      </a>
      <div class="header__menu">
        <div class="header__menu-link">
          <svg viewbox="0 0 56.3 14.9">
            <use xlink:href="#menu"></use>
          </svg>
        </div>
      </div>
    </div>
    <nav class="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
      <a class="menu__close close" href="#"><span class="close__top"></span><span class="close__bottom"></span></a>
      <?
      wp_nav_menu(
        [
          // 'theme_location' => 'main',
          'menu'           => 1,
          'depth'          => 1,
          'container'      => false,
          'menu_class'     => 'menu__list',
          'walker'         => new wp_bootstrap_navwalker(),
          'fallback_cb'    => 'wp_bootstrap_navwalker::fallback'
        ]
      );
      ?>

      <div class="menu__buttons"><a class="button button--black menu__button-email" data-micromodal-open="modal-email" href="#">Subscribe</a></div>
    </nav>
  </header>