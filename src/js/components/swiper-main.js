import Swiper, {
  Navigation,
  EffectFade,
  EffectCoverflow,
  EffectCards,
  Keyboard,
  Controller,
} from 'swiper';
Swiper.use([
  Navigation,
  EffectFade,
  EffectCards,
  EffectCoverflow,
  Keyboard,
  Controller,
]);

export const swiperMain = () => {
  let swiperMainSlider1 = new Swiper('.main-slider-1', {
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },

    speed: 600,
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
  let swiperMainSlider2 = new Swiper('.main-slider-2', {
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },

    speed: 600,
    loop: false,
    loopedSlides: 6,
    slidesPerView: '1',
    grabCursor: false,
    allowTouchMove: true,
    keyboard: true,
    navigation: {
      nextEl: '.main-slider__nav-arrow--right',
      prevEl: '.main-slider__nav-arrow--left',
    },
    keyboard: true,

    onSlideChangeEnd: function (e) {
      console.log(e);
    },
  });

  swiperMainSlider1.controller.control = swiperMainSlider2;
  swiperMainSlider2.controller.control = swiperMainSlider1;
};

export const swiperContent = () => {
  let swiperContentSlider = new Swiper('.content-slider', {
    effect: 'slide',
    // fadeEffect: {
    //   crossFade: true,
    // },

    speed: 600,
    loop: false,
    loopedSlides: 6,
    slidesPerView: '1',
    grabCursor: false,
    allowTouchMove: true,
    keyboard: true,
    navigation: {
      nextEl: '.content-slider__nav-arrow--left',
      prevEl: '.content-slider__nav-arrow--right',
    },
    keyboard: true,

    onSlideChangeEnd: function (e) {
      console.log(e);
    },
  });
};
