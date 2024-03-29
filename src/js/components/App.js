import { isIos, setVh } from './Utils';
import { menuToggle } from './menu';

import { swiperContent, swiperMain } from './swiper-main';
import { postsList } from './posts-list';
import { faqAccordion } from './faq';

import { modals } from './modals';
import { setFormValidation } from './forms';
import { cookies } from './cookie';
import Aos from 'aos';
import { initAnimations } from './init-animations';
import { authorTitleAnimation } from './author';
import {
  MainPostsNavSticky,
  MainPostsNavProgress,
} from './main-posts-nav-sticky';
import { initMainBlackAnimation } from './init-main-black-animation';
import { scrollTop } from './scroll-top';
import { artworkModal } from './artwork-modal';
import { modalLike } from './modal-like';

export default class App {
  constructor(_options) {
    this.init();
  }

  init() {
    window.addEventListener('DOMContentLoaded', (event) => {
      // preloaderInit();
      setVh();
      window.addEventListener('resize', setVh);

      menuToggle();
      scrollTop();

      swiperMain();
      postsList();
      MainPostsNavSticky();
      MainPostsNavProgress();

      swiperContent();
      faqAccordion();

      // artwork page
      artworkModal();

      modalLike();

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

      initMainBlackAnimation();
    });

    // Wait for everything to load
    window.addEventListener('load', (event) => {
      initAnimations();
      authorTitleAnimation();
    });
  }
}
