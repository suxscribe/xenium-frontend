import { isIos, setVh } from './Utils';
import { menuToggle } from './menu';

import { swiperContent, swiperMain } from './swiper-main';
import { postsList } from './posts-list';
import { faqAccordion } from './faq';
import {
  artworkGallery,
  artworkSizeListener,
  artworkSizeCompare,
  artworkStickySidebar,
} from './artwork';
import { modals } from './modals';
import { setFormValidation } from './forms';
import { cookies } from './cookie';
import { preloaderHide, preloaderInit } from './preloader';
import Aos from 'aos';
import { initAnimations } from './init-animations';

export default class App {
  constructor(_options) {
    this.init();
  }

  init() {
    window.addEventListener('DOMContentLoaded', (event) => {
      preloaderInit();
      setVh();
      window.addEventListener('resize', setVh);

      menuToggle();

      swiperMain();
      postsList();
      swiperContent();
      faqAccordion();

      artworkGallery();
      // artworkSizeCompare();
      artworkSizeListener();

      modals();
      setFormValidation();
      cookies();
      Aos.init({
        // offset: 200,
        duration: 600,
        easing: 'xenium',
        delay: 100,
        startEvent: 'load',
        once: true,
      });

      // artwork page
      artworkStickySidebar();
    });

    // Wait for everything to load
    window.addEventListener('load', (event) => {
      preloaderHide();
      initAnimations();
      // headerAnimationInit();
      // titleAnimationInit();
    });
  }
}
