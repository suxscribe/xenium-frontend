const preloaderDom = document.querySelector('.preloader');

export const preloaderInit = () => {
  preloaderDom.classList.add('preloader--visible');
};

export const preloaderInitTrantition = () => {
  preloaderDom.classList.remove('preloader--visible');
};

export const preloaderHide = () => {
  // preloaderDom.classList
  // preloaderDom.classList.remove('preloader--transition');
  preloaderDom.classList.remove('preloader--visible');
};

export const preloaderTransitionListener = () => {
  preloaderDom.addEventListener('transitionend', () => {
    preloaderHide();
    document.body.classList.add('init');
  });
};

export const initAnimations = () => {
  // add class to start preloader transitions
  // add event listener to end transitions
  // add body class on transition ends/
  preloaderTransitionListener();
  preloaderInitTrantition();
};
