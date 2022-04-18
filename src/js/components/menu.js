export const menuToggle = () => {
  const burgerLink = document.querySelector('.header__menu-link');
  const burgerMenu = document.querySelector('.menu');
  const burgerClose = document.querySelector('.menu__close');
  const modalEmail = document.querySelector('.menu__button-email');

  const isVisible = (elem) =>
    !!elem &&
    !!(elem.offsetWidth || elem.offsetHeight || elem.getClientRects().length); // source (2018-03-11): https://github.com/jquery/jquery/blob/master/src/css/hiddenVisibleSelectors.js

  // listen to burger button click event
  burgerLink.addEventListener('click', (e) => {
    burgerLink.classList.toggle('active');
    burgerMenu.classList.toggle('active');

    if (burgerMenu.classList.contains('active')) {
      document.addEventListener('click', outsideClickListener);
    }
  });

  const closeMenu = () => {
    burgerMenu.classList.remove('active');
    burgerLink.classList.remove('active');

    // remove this event listener in the end.
    removeClickListener();
  };

  // listen to click event outside of burger menu and burger button
  const outsideClickListener = (event) => {
    if (
      (!burgerMenu.contains(event.target) &&
        isVisible(burgerMenu) &&
        !burgerLink.contains(event.target)) ||
      burgerClose.contains(event.target)
    ) {
      // or use: event.target.closest(selector) === null
      console.log('outside');

      closeMenu();
    }
  };

  const removeClickListener = () => {
    document.removeEventListener('click', outsideClickListener);
  };

  // todo add modal-email listener. do closeMenu on modal-email click
  if (modalEmail) {
    modalEmail.addEventListener('click', (e) => {
      closeMenu();
    });
  }
};
