import { vars } from './vars';

export const modalLike = () => {
  document.addEventListener('click', initModalLikeListeners);
};

const initModalLikeListeners = (e) => {
  if (e.target.matches('.gallery__item-like')) {
    console.log('initmodallike');
    e.preventDefault();

    //todo get artwork url better way
    const likeButtonParent = e.target.parentNode;
    const artworkLink = likeButtonParent.querySelector('.gallery__item-link');
    const artworkUrl = artworkLink.getAttribute('href');

    // set artwork url to input#like-artwork
    const likeArtworkInput = document.querySelector(vars.likeArtworkInput);
    likeArtworkInput.value = artworkUrl;

    setShareUrls(artworkUrl);
  }

  //todo move this to modal-like
  if (e.target.matches('.js-copy-link')) {
    e.preventDefault();
    console.log('copy');

    const likeArtworkInput = document.querySelector(vars.likeArtworkInput);

    navigator.clipboard.writeText(likeArtworkInput.value).then(
      function () {
        console.log('Copied!');
      },
      function () {
        console.log('Copy error');
      }
    );
  }
};

export const setShareUrls = (artworkUrl) => {
  // generate artwork sharing links
  const likeArtworkFacebook = document.querySelector(
    '.modal__social--facebook'
  );
  const likeArtworkTwitter = document.querySelector('.modal__social--twitter');

  if (likeArtworkFacebook)
    likeArtworkFacebook.href =
      vars.facebookShareUrl + encodeURIComponent(artworkUrl);

  if (likeArtworkTwitter)
    likeArtworkTwitter.href =
      vars.twitterShareUrl + encodeURIComponent(artworkUrl);
};
