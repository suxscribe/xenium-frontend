export const cookies = () => {
  const cookieBlock = document.querySelector('.cookie');
  const cookieButton = document.querySelector('.cookie__button');

  if (!localStorage.getItem('cookieconsent')) {
    cookieBlock.classList.add('active'); // show dialog

    cookieButton.addEventListener('click', (e) => {
      // close with button
      e.preventDefault();
      cookieBlock.classList.remove('active');
      localStorage.setItem('cookieconsent', true);
    });
  } else {
    cookieBlock.classList.remove('active');
  }
};
