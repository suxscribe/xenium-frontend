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
  const mainPostsLists = document.querySelectorAll('.main-posts__list');

  mainPostsLists.forEach((section, index) => {
    const scene1 = new ScrollMagic.Scene({
      triggerHook: 0.7,
      triggerElement: section,
      offset: -1,
    })
      .on('enter', () => {
        activeIndex += 1;
        updateNavItem();
      })
      .on('leave', () => {
        activeIndex -= 1;
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
