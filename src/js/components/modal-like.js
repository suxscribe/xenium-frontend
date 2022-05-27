import { vars } from './vars';

export const modalLike = () => {
  document.addEventListener('click', addArtworkLinkToLikeForm);
};

const addArtworkLinkToLikeForm = (e) => {
  if (e.target.matches('.gallery__item-like')) {
    const likeButtonParent = e.target.parentNode;
    const artworkLink = likeButtonParent.querySelector('.gallery__item-link');
    const artworkUrl = artworkLink.getAttribute('href');
    console.log(artworkUrl);

    // insert artwork url to like form hidden input
    const likeArtworkInput = document.querySelector(vars.likeArtworkInput);
    likeArtworkInput.value = artworkUrl;

    // todo add artwork url to sharing links
    const likeArtworkFacebook = document.querySelector(
      '.modal__social--facebook'
    );
    const likeArtworkTwitter = document.querySelector(
      '.modal__social--twitter'
    );

    if (likeArtworkFacebook)
      likeArtworkFacebook.href =
        vars.facebookShareUrl + encodeURIComponent(artworkUrl);

    if (likeArtworkTwitter)
      likeArtworkTwitter.href =
        vars.twitterShareUrl + encodeURIComponent(artworkUrl);
  }
};
