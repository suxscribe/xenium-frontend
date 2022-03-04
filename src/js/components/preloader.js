export const preloaderInit = () => {
  const preloaderDom = document.querySelector('.preloader');
  preloaderDom.classList.add('preloader--active');
};

export const preloaderHide = () => {
  const preloaderDom = document.querySelector('.preloader');

  preloaderDom.classList.remove('preloader--active');
};
