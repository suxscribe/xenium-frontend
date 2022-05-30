import MicroModal from 'micromodal';
import ResizeSensorMin from 'resize-sensor';
import StickySidebar from 'sticky-sidebar-v2';
import { vars } from './vars';
import ArtworkGallery from './ArtworkGallery';
import { artworkModalOverflow, modals } from './modals';
import { isArtworkPage } from './Utils';

export default class Artwork {
  constructor(_options) {
    this.gallerySelector = '.artwork__image';
    this.artworkUrl = _options.url;

    // containers for artwork size, video, gallery modals
    this.modalSizeContainer = document.querySelector('.modal__content--size');
    this.modalSizeContainer.innerHTML = '';
    this.modalVideoContainer = document.querySelector('.modal__content--video');
    this.modalVideoContainer.innerHTML = '';
    this.modalGalleryContainer = document.querySelector('.pswp-container');
    this.modalGalleryContainer.innerHTML = '';
    console.log(this.modalGalleryContainer);
    this.isArtworkPage = isArtworkPage();

    this.init();
  }

  init() {
    this.initArtworkGallery();
    // this.initArtworkSizeCompare();
    this.initArtworkStickySidebar();
    this.initArtworkEventListeners();

    console.log('url', this.artworkUrl);
  }

  initArtworkGallery() {
    const pswpContainer = document.querySelector('.pswp');

    this.modalGalleryContainer.append(pswpContainer);
    this.artworkGallery = new ArtworkGallery();
  }

  initArtworkSizeCompare() {
    // get modal-size element
    // const modalSize = document.querySelector('.modal__content--size');

    if (this.modalSizeContainer) {
      // modalSize.innerHTML = '';

      const artworkSizeContent = document.querySelector('.artwork__size');
      this.modalSizeContainer.append(artworkSizeContent);
      // modalSize.innerHTML = artworkSizeContent.innerHTML;
    }

    // get artwork size content
    // put artwork size content in modal-size
    const reference = this.modalSizeContainer.querySelector(
      '.artwork__size-reference img'
    );
    const artwork = this.modalSizeContainer.querySelector(
      '.artwork__size-work img'
    );

    if (reference && artwork) {
      const referenceRealHeight = reference.dataset.height;
      const referenceHeight = reference.clientHeight;
      // console.log(referenceHeight, referenceRealHeight);

      const artworkRealHeight = artwork.dataset.height;

      const artworkHeight =
        (referenceHeight * artworkRealHeight) / referenceRealHeight;

      artwork.style.height = artworkHeight + 'px';
      // console.log(artworkHeight);
    }
  }

  initArtworkButtonsEvents(e) {
    if (e.target.matches('.artwork__icon--size')) {
      e.preventDefault();
      e.stopPropagation(); // prevent pswp from opening on button click
      MicroModal.show('modal-size', {
        awaitOpenAnimation: true,
        awaitCloseAnimation: true,
        onShow: () => {
          // setTimeout(artworkSizeCompare, 2000);
          // artworkModalOverflow(false);
        },
        onClose: () => {
          // artworkModalOverflow(true);
        },
      });
      this.initArtworkSizeCompare();
    }

    if (e.target.matches('.artwork__icon--like')) {
      e.preventDefault();
      e.stopPropagation();
      MicroModal.show('modal-like', {
        awaitOpenAnimation: true,
        awaitCloseAnimation: true,
      });

      // set artwork url to input#like-artwork
      const likeArtworkInput = document.querySelector(vars.likeArtworkInput);
      likeArtworkInput.value = this.artworkUrl;

      const likeArtworkFacebook = document.querySelector(
        '.modal__social--facebook'
      );
      const likeArtworkTwitter = document.querySelector(
        '.modal__social--twitter'
      );

      if (likeArtworkFacebook)
        likeArtworkFacebook.href =
          vars.facebookShareUrl + encodeURIComponent(this.artworkUrl);

      if (likeArtworkTwitter)
        likeArtworkTwitter.href =
          vars.twitterShareUrl + encodeURIComponent(this.artworkUrl);
    }

    if (e.target.matches('.artwork__icon--video')) {
      e.preventDefault();
      e.stopPropagation();

      if (this.modalVideoContainer) {
        // modalSize.innerHTML = '';

        const artworkVideoContent = document.querySelector('.artwork__video');
        this.modalVideoContainer.append(artworkVideoContent);
        // modalSize.innerHTML = artworkSizeContent.innerHTML;
      }

      const modalVideo = document.querySelector(`#${vars.modalVideoId} video`);
      if (modalVideo) {
        MicroModal.show(vars.modalVideoId, {
          awaitOpenAnimation: true,
          awaitCloseAnimation: true,
          onShow: () => {
            modalVideo.play();
          },
          onClose: () => {
            modalVideo.pause();
          },
        });
      }
    }
  }

  initArtworkEventListeners() {
    window.addEventListener('resize', this.artworkSizeCompare);

    document.addEventListener(
      'click',
      this.initArtworkButtonsEvents.bind(this)
    );
  }

  initArtworkStickySidebar() {
    // if artwork page - use StickySidebar. if artwork modal - use position:sticky
    if (this.isArtworkPage) {
      let sidebar = new StickySidebar('.artwork__left-sticky-container', {
        topSpacing: 40,
        bottomSpacing: 40,
        containerSelector: '.artwork__left',
        resizeSensor: true,
        minWidth: vars.breakpointDesktop,
        innerWrapperSelector: '.artwork__left-sticky',
        // scrollContainer: '.artwork-modal',
      });
    }
  }

  destroy() {
    this.artworkGallery.destroy();

    window.removeEventListener('resize', this.artworkSizeCompare);
    document.removeEventListener(
      'click',
      this.initArtworkButtonsEvents.bind(this)
    );
    console.log('Artwork Destroy');

    //destroy stickysidebar
    //remove eventlisteners if any
  }
}
