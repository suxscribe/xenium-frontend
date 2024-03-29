import { gsap, set } from 'gsap';
import { doc } from 'prettier';
import { vars } from './vars';

import * as ScrollMagic from 'scrollmagic';
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';

ScrollMagicPluginGsap(ScrollMagic, gsap);
const controller = new ScrollMagic.Controller();

export const postsList = () => {
  document.querySelectorAll('.posts__list').forEach((postList) => {
    const postsItems = document.querySelectorAll(`.${vars.postTeaserClass}`);
    const postsCount = postsItems.length;
    let zCounter = postsCount;
    postsItems.forEach((postItem) => {
      postItem.style.zIndex = zCounter;
      zCounter--;
    });
  });

  document.querySelectorAll('.posts__list').forEach((posts) => {
    posts.querySelectorAll(`.${vars.postTeaserClass}`).forEach((post) => {
      let animation = gsap.timeline();

      animation.fromTo(post, { y: '50%' }, { duration: 1, y: 0 });

      new ScrollMagic.Scene({
        triggerElement: post,

        duration: window.innerHeight,
        triggerHook: 1,
      })
        .setTween(animation)
        .addTo(controller);
    });
  });

  postsHeadersAnimation();
  postDescriptionAnimation();
};

export const postsHeadersAnimation = () => {
  document.querySelectorAll('.posts__list-title').forEach((header) => {
    let animation = gsap.timeline();

    let xTo = '-100vw';
    if (header.classList.contains('posts__list-title--news')) xTo = '100vw';

    animation.to(header, { duration: 1, x: xTo });

    new ScrollMagic.Scene({
      triggerElement: header,

      duration: 5000,
      triggerHook: 1,
    })
      .setTween(animation)
      .addTo(controller);
  });
};

const postDescriptionAnimation = () => {
  document.querySelectorAll('.post').forEach((post) => {
    let animation = gsap.timeline();

    const description = post.querySelector('.post__description');
    if (description) {
      post.addEventListener('mouseenter', (e) => {
        animation.set(description, { height: 'auto' });
        animation.from(description, { duration: 0.4, height: 0 });
      });
      post.addEventListener('mouseleave', (e) => {
        animation.to(description, { duration: 0.4, height: 0, delay: 0.15 });
      });
    }
  });
};
