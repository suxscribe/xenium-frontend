import { gsap } from 'gsap';

import * as ScrollMagic from 'scrollmagic';
import { ScrollMagicPluginGsap } from 'scrollmagic-plugin-gsap';
import ResizeSensorMin from 'resize-sensor';
import StickySidebar from 'sticky-sidebar-v2';
import { vars } from './vars';

ScrollMagicPluginGsap(ScrollMagic, gsap);
const controller = new ScrollMagic.Controller();

export const MainPostsNavSticky = () => {
  if (document.querySelector('.main-posts__nav-wrap')) {
    let sidebar = new StickySidebar('.main-posts__nav-wrap', {
      topSpacing: 0,
      bottomSpacing: 40,
      containerSelector: '.main-posts',
      innerWrapperSelector: '.main-posts__nav-sticky',
      resizeSensor: true,
      minWidth: vars.breakpointSmall,
      // scrollContainer: '.main',
    });
  }
};

let activeIndex = 0;

export const MainPostsNavProgress = () => {
  // window.onscroll = () => {
  //   const scrollTop = window.scrollY;
  //   const docHeight = document.body.offsetHeight;
  //   const winHeight = window.innerHeight;

  //   const mainPostsBlock = document.querySelector('.main-posts');
  //   const mainPostsNav = document.querySelector('.main-posts__nav');

  //   const mainPostsBlockHeight = mainPostsBlock.offsetHeight;

  //   const mainPostsTop = offset(mainPostsBlock);

  //   // calculate width of nav blank space on the right
  //   const blankSpaceWidth =
  //     mainPostsBlock.offsetWidth - mainPostsNav.offsetWidth;

  //   // start scroll position. .main-posts offset

  //   // scrollTop - mainPostsTop
  //   // const scrollPercent = scrollTop / (docHeight - winHeight);

  //   // add mainpoststop
  //   const scrollPercent = scrollTop / mainPostsBlockHeight;
  //   const scrollPercentRounded = Math.round(scrollPercent * 100);

  //   const mainPostsNavProgress = document.querySelector(
  //     '.main-posts__nav-progress'
  //   );
  //   console.log(offset(mainPostsNavProgress));
  //   mainPostsNavProgress.style.width = scrollPercentRounded + '%';
  // };

  // const mainPostsBlock = document.querySelector('.main-posts');
  // const mainPostsNav = document.querySelector('.main-posts__nav');

  const mainPostsLists = document.querySelectorAll('.main-posts__list');

  mainPostsLists.forEach((section, index) => {
    const scene1 = new ScrollMagic.Scene({
      triggerHook: 0.7,
      triggerElement: section,
      offset: -1,
    })
      .on('enter', () => {
        activeIndex += 1;
        console.log(activeIndex);
        updateNavItem();
      })
      .on('leave', () => {
        activeIndex -= 1;
        console.log(activeIndex);
        updateNavItem();
      });

    scene1.addTo(controller);

    const scene2 = new ScrollMagic.Scene({
      triggerHook: 0.7,
      triggerElement: section,
      duration: section.offsetHeight,
    }).setTween(
      document
        .querySelector(`.main-posts__nav-item[data-anchor="${index + 1}"]`)
        .querySelector('.main-posts__nav-item-progress'),
      { width: '100%' }
    );
    scene2.addTo(controller);
  });
};

const updateNavItem = () => {
  document.querySelectorAll('.main-posts__nav-item').forEach((item) => {
    item.classList.remove('active');
    if (item.dataset.anchor == activeIndex) {
      item.classList.add('active');
    }
  });
};
