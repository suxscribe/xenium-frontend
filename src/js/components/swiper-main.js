import Swiper, {
  Navigation,
  EffectFade,
  // EffectCoverflow,
  // EffectCards,
  EffectCreative,
  Keyboard,
  Controller,
} from 'swiper';
Swiper.use([
  Navigation,
  EffectFade,
  // EffectCards,
  // EffectCoverflow,
  EffectCreative,
  Keyboard,
  Controller,
]);

export const swiperMain = () => {
  let swiperMainSlider1 = new Swiper('.main-slider-1', {
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },

    speed: 1000,
    loop: false,
    loopedSlides: 6,
    slidesPerView: '1',
    grabCursor: false,
    allowTouchMove: false,
    keyboard: false,
    // navigation: {
    //   nextEl: '.main-slider__nav-arrow--left',
    //   prevEl: '.main-slider__nav-arrow--right',
    // },
    // keyboard: true,

    onSlideChangeEnd: function (e) {
      console.log(e);
    },
  });

  const slideDelta = 20;
  // const swiperMainSlides = document.querySelectorAll('.main-slider-2__item');
  const swiperEffect = (swiper) => {
    swiper.slides.forEach((slide, index) => {
      const delta = (index - swiper.activeIndex) * slideDelta;
      const slideInner = slide.querySelector('.main-slider-2__item-image');
      
      slideInner.style.transform = `translateX(${delta}px)`;
      if (index - swiper.activeIndex > 0) {
        slideInner.style.opacity = 1 / (index - swiper.activeIndex);
      } else {
        slideInner.style.opacity = 1;
      }
    });
  };

  let swiperMainSlider2 = new Swiper('.main-slider-2', {
    effect: 'creative',
    creativeEffect: {
      prev: {
        // will set `translateZ(-400px)` on previous slides
        translate: ['120%', 0, 0],
      },
      next: {
        // will set `translateX(100%)` on next slides
        translate: ['20%', 0, -400],
        opacity: 0.5,
      },
    },

    speed: 1000,
    loop: false,
    loopedSlides: 6,
    slidesPerView: '1',
    grabCursor: false,
    allowTouchMove: true,
    keyboard: true,
    navigation: {
      nextEl: '.main-slider-2__nav-arrow--right',
      prevEl: '.main-slider-2__nav-arrow--left',
    },
    keyboard: true,

    onSlideChangeEnd: function (e) {
      console.log(e);
    },
    on: {
      init: (swiper) => {
        swiperEffect(swiper);
      },
      slideChange: (swiper) => {
        // console.log(swiper.slides);
        swiperEffect(swiper);
      },
    },
  });

  swiperMainSlider1.controller.control = swiperMainSlider2;
  swiperMainSlider2.controller.control = swiperMainSlider1;
};

export const swiperContent = () => {
  let swiperContentSlider = new Swiper('.content-slider', {
    // effect: 'slide',
    effect: 'creative',
    creativeEffect: {
      prev: {
        // will set `translateZ(-400px)` on previous slides
        translate: ['120%', 0, 0],
      },
      next: {
        // will set `translateX(100%)` on next slides
        translate: ['20%', 0, -400],
        opacity: 0.5,
      },
    },

    speed: 600,
    loop: false,
    loopedSlides: 6,
    slidesPerView: '1',
    grabCursor: false,
    allowTouchMove: true,
    keyboard: true,
    navigation: {
      nextEl: '.content-slider__nav-arrow--right',
      prevEl: '.content-slider__nav-arrow--left',
    },
    keyboard: true,

    onSlideChangeEnd: function (e) {
      console.log(e);
    },
  });
};
