import { gsap } from 'gsap';

import * as ScrollMagic from 'scrollmagic';
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';

ScrollMagicPluginGsap(ScrollMagic, gsap);

export const initMainBlackAnimation = () => {
  const mainBlackDom = document.querySelector('.main-black');
  if (mainBlackDom) {
    const controller = new ScrollMagic.Controller();

    const tween = gsap.timeline();
    document.querySelectorAll('.main-black__bg > *').forEach((item) => {
      tween.from(item, { opacity: 0, scale: 0.5, duration: 0.75 }, '-=0.3');
    });

    // tween.from('.main-black__bg', { opacity: 0, duration: 2 });
    tween.from('.main-black__grid', { opacity: 0, duration: 0.1 }, '-=1');

    document.querySelectorAll('.main-black__grid > *').forEach((item) => {
      // tween.from(item, { opacity: 0, y: 100 }, '-=0.3');
      tween.set(
        item,
        { className: item.className + ' active', duration: 0.1 },
        '+=0.5'
      );
    });
    // tween.from('.main-black__button', { opacity: 0, y: 100 });
    tween.set(
      '.main-black__button',
      {
        className: 'main-black__button button button--black active',
        duration: 1,
      },
      '+=0.5'
    );
    tween.to({}, { duration: 2 });

    const scene = new ScrollMagic.Scene({
      triggerHook: 0,
      triggerElement: mainBlackDom,
      duration: 2000,
    })
      .setPin(mainBlackDom)
      .setTween(tween);
    scene.addTo(controller);
  }
};
