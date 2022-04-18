import { vars } from './vars';

export const modalLike = () => {
  document.addEventListener('click', addArtworkLinkToLikeForm);
};

const addArtworkLinkToLikeForm = (e) => {
  if (e.target.matches('.gallery__item-like')) {
    // insert artwork url to like form hidden input

    const likeButtonParent = e.target.parentNode;
    const artworkLink = likeButtonParent.querySelector('.gallery__item-link');
    const artworkUrl = artworkLink.getAttribute('href');
    console.log(artworkUrl);

    const likeArtworkInput = document.querySelector(vars.likeArtworkInput);
    likeArtworkInput.value = artworkUrl;
  }
};
