export const scrollTop = () => {
  const scrollTopButton = document.querySelector('.footer__scrolltop');

  scrollTopButton.addEventListener('click', (e) => {
    e.preventDefault();
    window.scrollTo(0, 0);
  });
};
