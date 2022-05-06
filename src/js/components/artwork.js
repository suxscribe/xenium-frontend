import MicroModal from 'micromodal';
import ResizeSensorMin from 'resize-sensor';
import StickySidebar from 'sticky-sidebar-v2';
import { vars } from './vars';
import ArtworkGallery from './ArtworkGallery';

export default class Artwork {
  constructor(_options) {
    this.gallerySelector = '.artwork__image';
    this.init();
  }

  init() {
    this.initArtworkGallery();
    this.initArtworkSizeCompare();
    this.initArtworkStickySidebar();
    this.initArtworkEventListeners();
  }

  initArtworkGallery() {
    this.artworkGallery = new ArtworkGallery();
  }

  initArtworkSizeCompare() {
    const reference = document.querySelector('.artwork__size-reference img');
    const artwork = document.querySelector('.artwork__size-work img');

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
        // onShow: () => {
        //   setTimeout(artworkSizeCompare, 2000);
        // },
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
    }

    if (e.target.matches('.artwork__icon--video')) {
      e.preventDefault();
      e.stopPropagation();

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

    // this.initArtworkSizeLikeListener();
  }

  initArtworkStickySidebar() {
    if (document.querySelector('.artwork__left-wrap')) {
      let sidebar = new StickySidebar('.artwork__left-wrap', {
        topSpacing: 40,
        bottomSpacing: 40,
        containerSelector: '.artwork__left-sticky',
        resizeSensor: true,
        minWidth: vars.breakpointDesktop,
        innerWrapperSelector: '.artwork__left-wrap-sticky',
        scrollContainer: '.artwork-modal',
      });
    }
  }

  destroy() {
    //destroy pswp
    // this.gallery.destroy();
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
