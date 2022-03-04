import { gsap } from 'gsap';
import { doc } from 'prettier';
// import CustomEase from '../vendor/gsap-member/CustomEase';
// import { Power3, Bounce, Elastic } from 'gsap/all';
// gsap.registerPlugin(CustomEase);
// import ScrollMagic from 'scrollmagic';
import * as ScrollMagic from 'scrollmagic';
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';

ScrollMagicPluginGsap(ScrollMagic, gsap);
const controller = new ScrollMagic.Controller();

export const postsList = () => {
  document.querySelectorAll('.posts__list').forEach((postList) => {
    const postsItems = document.querySelectorAll('.posts__item');
    const postsCount = postsItems.length;
    let zCounter = postsCount;
    postsItems.forEach((postItem) => {
      postItem.style.zIndex = zCounter;
      zCounter--;
    });
  });

  const controller = new ScrollMagic.Controller();
  // let animation = gsap.timeline();

  // animation.to('.posts__item', { duration: 1, y: '-50%' });

  document.querySelectorAll('.posts__list').forEach((posts) => {
    posts.querySelectorAll('.posts__item').forEach((post) => {
      let animation = gsap.timeline();

      animation.fromTo(post, { y: '50%' }, { duration: 1, y: 0 });

      new ScrollMagic.Scene({
        triggerElement: post,

        duration: 1000,
        triggerHook: 1,
      })
        .setTween(animation)
        .addTo(controller);
    });
  });

  postsHeadersAnimation();

  // const scene = new ScrollMagic.Scene({
  //   triggerElement: '.posts__item',

  //   duration: 5000,
  //   triggerHook: 1,
  // })
  //   .setTween(animation)
  //   .addTo(controller);
};

export const postsHeadersAnimation = () => {
  document.querySelectorAll('.posts__list-title').forEach((header) => {
    let animation = gsap.timeline();

    animation.to(header, { duration: 1, x: '-100vw' });

    new ScrollMagic.Scene({
      triggerElement: header,

      duration: 5000,
      triggerHook: 1,
    })
      .setTween(animation)
      .addTo(controller);
  });
};
