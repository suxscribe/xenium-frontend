import axios from 'axios';

import Artwork, { artworkGallery } from './Artwork';
import { modals } from './modals';
import { vars } from './vars';
import { isArtworkPage } from './Utils';

const artworkModalDom = document.querySelector('.artwork-modal');
const artworkDom = document.querySelector('.artwork');
const loader = document.querySelector('.artwork__loader');
const artworkPage = document.querySelector(vars.artworkPageClass);

let artwork;

export const artworkModal = () => {
  // if on artwork page - init everything on load
  if (isArtworkPage()) {
    console.log('init artwork page');
    const artworkUrl = document.querySelector('#artwork-url').value;

    modals(); // init modals
    artworkInit(artworkUrl); // init artwork scripts
  } else {
    // if artwork modal on page - listen to artwork ajax link
    if (artworkModalDom) {
      artworkModalListener();
    }
  }
  //  if artwork page is opened directly - what happens when we click on another works? just treat links as links.
};

const artworkModalListener = () => {
  document.addEventListener('click', (e) => {
    if (e.target.matches('.artwork-modal__link')) {
      const artworkId = e.target.dataset.artworkId;
      const artworkUrl = e.target.getAttribute('href');
      console.log(artworkId);

      if (artworkId) {
        e.preventDefault();
        // modals(); // init modals

        // from reload
        artworkDestroy();
        artworkModalClear();
        showLoader(true);
        //

        artworkModalOpen();
        artworkModalLoadData(artworkId, artworkUrl);
      }
    }
    if (e.target.matches('.artwork-modal__close')) {
      e.preventDefault();

      artworkModalClose();
      setTimeout(() => {
        artworkModalClear();
      }, 1000);

      artworkDestroy();
    }
    if (e.target.matches('.artwork-modal-reload')) {
      // deprecated
      e.preventDefault();

      artworkDestroy();
      artworkModalClear();
      showLoader(true);
      artworkModalLoadData();
    }
  });

  //todo add close via esc key. only if no modals opened
};

const artworkModalOpen = () => {
  console.log('artwork modal link click');

  artworkModalDom.classList.add('opening');
  setTimeout(() => {
    artworkModalDom.classList.add('opened');
    // artworkModalDom.classList.remove('opening');
  }, 10); // wait after adding display:block property

  artworkModalDom.setAttribute('aria-hidden', false);

  document.documentElement.classList.add(vars.bodyOverflowClass);
};

const artworkModalClose = () => {
  console.log('close modal ');

  artworkModalDom.ontransitionend = () => {
    artworkModalDom.classList.remove('opening');
    artworkModalDom.ontransitionend = null;
  }; // wait till animation ends
  artworkModalDom.classList.remove('opened');

  artworkModalDom.setAttribute('aria-hidden', true);

  document.documentElement.classList.remove(vars.bodyOverflowClass);
};

const artworkModalClear = () => {
  artworkDom.innerHTML = '';
};

const showLoader = (show) => {
  if (show === true) {
    loader.classList.add('active'); // show loader
  } else {
    loader.classList.remove('active');
  }
};

const artworkModalLoadData = (id, url) => {
  //! load new data. Development
  if (id === 'test') {
    setTimeout(() => {
      // hide loader
      showLoader(false);
      artworkDom.innerHTML = newArtwork; // replace content with new/
      modals();
      artworkInit(url);
    }, 1000);
  } else {
    //! Production
    let form_data = new FormData();
    form_data.append('action', 'artwork_modal_data');
    form_data.append('id', id);

    axios
      .post('/wp-admin/admin-ajax.php', form_data)
      .then(function (response) {
        // console.log(response);
        showLoader(false);
        artworkDom.innerHTML = response.data; // replace content with new/
        modals();
        artworkInit(url);
      })
      .catch(function (error) {
        console.log('Something went wrong. Please try again', error);
      });
  }
};

const artworkInit = (url) => {
  artwork = new Artwork({ url: url });

  if (typeof wpcf7 !== 'undefined') {
    // console.log(wpcf7);
    wpcf7.init(document.querySelector('.form--enquire'));
    wpcf7.init(document.querySelector('.form--like'));
  }
};
const artworkDestroy = () => {
  if (artwork) {
    artwork.destroy();
  }
};

const enquireButtonListener = () => {
  document.addEventListener('click', (e) => {
    if (e.target.matches('.artwork__enquire')) {
      const formArtworkTitle = document.querySelector('#enquire-text');
      // const formArtworkUrl = document.querySelector('#form-enquire-url');

      const artworkTitle = document.querySelector('.artwork__title');
      const authorTitle = document.querySelector('.artwork__author-name');

      // const artworkUrl = window.location.href; // todo get url of artwork in modal

      if (formArtworkTitle && artworkTitle) {
        formArtworkTitle.value =
          artworkTitle.textContent.trim() +
          (authorTitle ? ' — ' + authorTitle.textContent.trim() : '');
      }
      // if (formArtworkUrl) {
      //   formArtworkUrl.value = artworkUrl;
      // }
    }
  });
};
enquireButtonListener();

const newArtwork = `
      <div class="container">
        <h1 class="artwork__title title"><span class="title__wrap"><span class="title__text">Red Man I</span></span>
        </h1>
        <div class="artwork__wrap">
          <div class="artwork__left">
            <div class="artwork__left-sticky-container">
              <div class="artwork__left-sticky">
                <div class=""><a class="artwork__author" href="">
                    <div class="artwork__author-name">Valeriy<br>Alyoshin</div>
                    <div class="artwork__author-years">1937-2011</div>
                    <div class="artwork__author-hover">view<br>artist’s<br>profile</div>
                    <div class="artwork__author-arrow"><svg>
                        <use xlink:href="#arrow-alt"></use>
                      </svg></div>
                  </a>
                  <dl class="artwork__parameters">
                    <dt class="artwork__parameter-name">style</dt>
                    <dt class="artwork__parameter-value"><a href="">nonconformism</a></dt>
                    <dt class="artwork__parameter-name">material</dt>
                    <dt class="artwork__parameter-value">oil on canvas</dt>
                    <dt class="artwork__parameter-name">year</dt>
                    <dt class="artwork__parameter-value">1960s</dt>
                    <dt class="artwork__parameter-name">size</dt>
                    <dt class="artwork__parameter-value">40x60</dt>
                  </dl>
                  <div class="artwork__description">
                    <p>Ideally this tapestry would float across these dirty waters to get us to Venice. It will tell you
                      all that will happen picking up stories on the way and we will tell you salades. This tapestry was
                      created by Laure Prouvost in the lead-up to the artist's French Pavilion at the 58th Biennale Arte
                      in Venice, 1960.</p>
                  </div><a class="artwork__enquire button" data-micromodal-open="modal-enquiry">Enquire</a>
                </div>
              </div>
            </div>
          </div>
          <div class="artwork__right">
            <div class="artwork__gallery" itemscope itemtype="http://schema.org/ImageGallery">
              <figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject"><a
                  class="artwork__image-image" href="/assets/artwork-image-01.jpg" itemprop="contentUrl"
                  data-size="1000x1250"><img src="/assets/artwork-image-01.jpg" alt=""></a>
                <div class="artwork__icons"><a class="artwork__icon artwork__icon--size icon artwork-gallery-ignore"
                    href="">
                    <div class="icon__wrap icon__wrap--size"></div><svg width="62" height="62" viewbox="0 0 62 62"
                      fill="none" xmlns="http://www.w3.org/2000/svg">
                      <clipPath id="icon-size">
                        <rect class="icon__fill" x="10" y="13.4033" width="19.6242" height="51.0865"
                          transform="rotate(-30 10 13.4033)" fill="white"></rect>
                      </clipPath>
                      <rect class="icon__stroke" x="10.683" y="13.5868" width="18.6242" height="50.0865"
                        transform="rotate(-30 10.683 13.5868)" stroke="black"></rect>
                      <line class="icon__stroke" x1="33.1748" y1="15.433" x2="22.25" y2="21.7405" stroke="black"></line>
                      <line class="icon__stroke" x1="46.0405" y1="37.0736" x2="35.1157" y2="43.3811" stroke="black">
                      </line>
                      <line class="icon__stroke" x1="39.7329" y1="26.1483" x2="33.178" y2="29.9328" stroke="black">
                      </line>
                    </svg>
                  </a><a class="artwork__icon artwork__icon--like icon artwork-gallery-ignore" href="">
                    <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                      style="enable-background:new 0 0 62 62;" xml:space="preserve">
                      <clipPath id="icon-like">
                        <path class="icon__fill"
                          d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                        </path>
                      </clipPath>
                      <path class="icon__stroke"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </svg>
                  </a><a class="artwork__icon artwork__icon--zoom icon" href="">
                    <div class="icon__wrap icon__wrap--zoom"></div><svg xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                      style="enable-background:new 0 0 62 62;" xml:space="preserve">
                      <clipPath id="icon-zoom">
                        <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
                      </clipPath>
                      <path class="icon__stroke"
                        d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
                      </path>
                      <line class="icon__stroke" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
                      <line class="icon__stroke" x1="30.7" y1="17.1" x2="30.7" y2="31"></line>
                      <line class="icon__stroke" x1="37.9" y1="23.8" x2="24.1" y2="23.8"></line>
                    </svg>
                  </a></div><a class="artwork__icon artwork__icon--video icon icon--video artwork-gallery-ignore"
                  href="">
                  <div class="icon__wrap icon__wrap--video"></div><svg id="Layer_1" version="1.1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewbox="0 0 56 56" style="enable-background:new 0 0 56 56;" xml:space="preserve">
                    <clippath id="icon-video">
                      <circle class="icon__fill" cx="28" cy="28" r="28"></circle>
                    </clippath>
                    <circle class="icon__stroke" cx="28" cy="28" r="27.5"></circle>
                    <path class="icon__stroke"
                      d="M45.2,25.5c1,0,1.8-0.8,1.8-1.8s-0.8-1.8-1.8-1.8c-1,0-1.8,0.8-1.8,1.8S44.2,25.5,45.2,25.5z">
                    </path>
                    <path class="icon__front-fill"
                      d="M16.3,27.5l-0.6,0v-0.7c0.5,0,0.9-0.1,1.2-0.2c0.3-0.1,0.7-0.4,1-0.8c0.4-0.4,0.6-0.9,0.6-1.4c0-0.5-0.2-1-0.6-1.4    c-0.4-0.4-0.8-0.6-1.4-0.6c-0.5,0-1,0.2-1.4,0.6c-0.2,0.2-0.4,0.5-0.5,0.7L14,23.4c0.1-0.4,0.3-0.7,0.6-1c0.5-0.5,1.2-0.8,1.9-0.8    c0.8,0,1.4,0.3,1.9,0.8c0.5,0.5,0.8,1.2,0.8,1.9c0,0.8-0.2,1.3-0.6,1.8c-0.4,0.4-0.8,0.7-1.1,0.9c0.8,0.3,1.4,0.7,1.9,1.2    c0.7,0.8,1.1,1.7,1.1,2.7c0,1-0.4,1.9-1.1,2.7c-0.7,0.7-1.6,1.1-2.7,1.1c-1,0-1.9-0.4-2.7-1.1c-0.6-0.6-0.9-1.3-1.1-2.1l0.7-0.3    c0.1,0.7,0.4,1.3,0.9,1.8c0.6,0.6,1.3,0.9,2.1,0.9c0.8,0,1.6-0.3,2.2-0.9c0.6-0.6,0.9-1.3,0.9-2.2c0-0.8-0.3-1.6-0.9-2.2    C18.3,28.1,17.4,27.7,16.3,27.5z">
                    </path>
                    <path class="icon__front-fill"
                      d="M24.1,27.9c-0.7,0.7-1.1,1.6-1.1,2.5c0,1,0.4,1.8,1.1,2.5c0.7,0.7,1.6,1,2.5,1c1,0,1.8-0.3,2.5-1c0.7-0.7,1.1-1.6,1.1-2.5    c0-1-0.4-1.8-1.1-2.5c-0.7-0.7-1.6-1.1-2.5-1.1C25.7,26.8,24.8,27.2,24.1,27.9z M23.8,27.1c0.8-0.7,1.7-1,2.8-1    c1.2,0,2.2,0.4,3.1,1.3c0.9,0.9,1.3,1.9,1.3,3.1c0,1.2-0.4,2.2-1.3,3.1c-0.8,0.9-1.9,1.3-3.1,1.3c-1.2,0-2.2-0.4-3.1-1.3    c-0.8-0.8-1.2-1.8-1.3-2.9h0c0.1-1.9,0.5-3.4,1.3-4.6c0.8-1.2,1.9-2.5,3.1-3.9c0.1-0.1,0.1-0.2,0.2-0.2h1c-0.1,0.1-0.2,0.3-0.3,0.4    c-1.4,1.6-2.5,2.9-3.3,4.1C24.1,26.6,24,26.8,23.8,27.1z">
                    </path>
                    <path class="icon__front-fill"
                      d="M40.2,26.2c0-1-0.4-1.8-1.1-2.5c-0.7-0.7-1.6-1.1-2.5-1.1c-1,0-1.8,0.4-2.5,1.1c-0.7,0.7-1.1,1.5-1.1,2.5v4.2    c0,1,0.4,1.8,1.1,2.5c0.7,0.7,1.6,1,2.5,1c1,0,1.8-0.3,2.5-1c0.7-0.7,1.1-1.6,1.1-2.5V26.2z M40.9,30.4c0,1.2-0.4,2.2-1.3,3.1    c-0.8,0.9-1.9,1.3-3.1,1.3c-1.2,0-2.2-0.4-3.1-1.3c-0.9-0.9-1.3-1.9-1.3-3.1v-4.2c0-1.2,0.4-2.2,1.3-3.1c0.9-0.9,1.9-1.3,3.1-1.3    c1.2,0,2.2,0.4,3.1,1.3c0.9,0.9,1.3,1.9,1.3,3.1V30.4z">
                    </path>
                  </svg>
                </a>
              </figure>
              <figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject"><a
                  class="artwork__image-image" href="/assets/artwork-image-02.jpg" itemprop="contentUrl"
                  data-size="1400x1000"><img src="/assets/artwork-image-02.jpg" alt=""></a>
                <div class="artwork__icons"><a class="artwork__icon artwork__icon--zoom icon" href="">
                    <div class="icon__wrap icon__wrap--zoom"></div><svg xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                      style="enable-background:new 0 0 62 62;" xml:space="preserve">
                      <clipPath id="icon-zoom">
                        <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
                      </clipPath>
                      <path class="icon__stroke"
                        d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
                      </path>
                      <line class="icon__stroke" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
                      <line class="icon__stroke" x1="30.7" y1="17.1" x2="30.7" y2="31"></line>
                      <line class="icon__stroke" x1="37.9" y1="23.8" x2="24.1" y2="23.8"></line>
                    </svg>
                  </a></div>
              </figure>
              <figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject"><a
                  class="artwork__image-image" href="/assets/artwork-image-03.jpg" itemprop="contentUrl"
                  data-size="1400x1000"><img src="/assets/artwork-image-03.jpg" alt=""></a>
                <div class="artwork__icons"><a class="artwork__icon artwork__icon--zoom icon" href="">
                    <div class="icon__wrap icon__wrap--zoom"></div><svg xmlns="http://www.w3.org/2000/svg"
                      xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                      style="enable-background:new 0 0 62 62;" xml:space="preserve">
                      <clipPath id="icon-zoom">
                        <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
                      </clipPath>
                      <path class="icon__stroke"
                        d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
                      </path>
                      <line class="icon__stroke" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
                      <line class="icon__stroke" x1="30.7" y1="17.1" x2="30.7" y2="31"></line>
                      <line class="icon__stroke" x1="37.9" y1="23.8" x2="24.1" y2="23.8"></line>
                    </svg>
                  </a></div>
              </figure>
            </div>
          </div>
        </div>
        <div class="artwork__related">
          <h4 class="artwork__related-title"><span>another works in collection by artist</span></h4>
          <ul class="gallery__items">
            <li class="gallery__item gallery__item--" data-aos-delay="200">
              <div class="gallery__item-image"><a class="gallery__item-link artwork-modal-reload" href="#"></a><img
                  src="/assets/gallery-item-01.jpg" alt="">
                <div class="gallery__item-like icon" data-micromodal-open="modal-like">
                  <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                    style="enable-background:new 0 0 62 62;" xml:space="preserve">
                    <clipPath id="icon-like">
                      <path class="icon__fill"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </clipPath>
                    <path class="icon__stroke"
                      d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                    </path>
                  </svg>
                </div>
              </div>
              <div class="gallery__item-content">
                <div class="gallery__item-title"><a class="artwork-modal-reload" href="#">Red<br>Man I</a></div>
                <div class="gallery__item-author"><a href="#">Valery Alyoshin</a></div>
                <div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
              </div>
            </li>
            <li class="gallery__item gallery__item--reverse" data-aos-delay="200">
              <div class="gallery__item-image"><a class="gallery__item-link artwork-modal-reload" href="#"></a><img
                  src="/assets/gallery-item-02.jpg" alt="">
                <div class="gallery__item-like icon" data-micromodal-open="modal-like">
                  <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                    style="enable-background:new 0 0 62 62;" xml:space="preserve">
                    <clipPath id="icon-like">
                      <path class="icon__fill"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </clipPath>
                    <path class="icon__stroke"
                      d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                    </path>
                  </svg>
                </div>
              </div>
              <div class="gallery__item-content">
                <div class="gallery__item-title"><a class="artwork-modal-reload" href="#">Red<br>Man I</a></div>
                <div class="gallery__item-author"><a href="#">Valery Alyoshin</a></div>
                <div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
              </div>
            </li>
            <li class="gallery__item gallery__item--" data-aos-delay="200">
              <div class="gallery__item-image"><a class="gallery__item-link artwork-modal-reload" href="#"></a><img
                  src="/assets/gallery-item-01.jpg" alt="">
                <div class="gallery__item-like icon" data-micromodal-open="modal-like">
                  <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                    style="enable-background:new 0 0 62 62;" xml:space="preserve">
                    <clipPath id="icon-like">
                      <path class="icon__fill"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </clipPath>
                    <path class="icon__stroke"
                      d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                    </path>
                  </svg>
                </div>
              </div>
              <div class="gallery__item-content">
                <div class="gallery__item-title"><a class="artwork-modal-reload" href="#">Red<br>Man I</a></div>
                <div class="gallery__item-author"><a href="#">Valery Alyoshin</a></div>
                <div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
              </div>
            </li>
            <li class="gallery__item gallery__item--reverse" data-aos-delay="200">
              <div class="gallery__item-image"><a class="gallery__item-link artwork-modal-reload" href="#"></a><img
                  src="/assets/gallery-item-02.jpg" alt="">
                <div class="gallery__item-like icon" data-micromodal-open="modal-like">
                  <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                    style="enable-background:new 0 0 62 62;" xml:space="preserve">
                    <clipPath id="icon-like">
                      <path class="icon__fill"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </clipPath>
                    <path class="icon__stroke"
                      d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                    </path>
                  </svg>
                </div>
              </div>
              <div class="gallery__item-content">
                <div class="gallery__item-title"><a class="artwork-modal-reload" href="#">Red<br>Man I</a></div>
                <div class="gallery__item-author"><a href="#">Valery Alyoshin</a></div>
                <div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
              </div>
            </li>
            <li class="gallery__item gallery__item--reverse" data-aos-delay="200">
              <div class="gallery__item-image"><a class="gallery__item-link artwork-modal-reload" href="#"></a><img
                  src="/assets/gallery-item-02.jpg" alt="">
                <div class="gallery__item-like icon" data-micromodal-open="modal-like">
                  <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                    style="enable-background:new 0 0 62 62;" xml:space="preserve">
                    <clipPath id="icon-like">
                      <path class="icon__fill"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </clipPath>
                    <path class="icon__stroke"
                      d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                    </path>
                  </svg>
                </div>
              </div>
              <div class="gallery__item-content">
                <div class="gallery__item-title"><a class="artwork-modal-reload" href="#">Red<br>Man I</a></div>
                <div class="gallery__item-author"><a href="#">Valery Alyoshin</a></div>
                <div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
              </div>
            </li>
            <li class="gallery__item gallery__item--reverse" data-aos-delay="200">
              <div class="gallery__item-image"><a class="gallery__item-link artwork-modal-reload" href="#"></a><img
                  src="/assets/gallery-item-02.jpg" alt="">
                <div class="gallery__item-like icon" data-micromodal-open="modal-like">
                  <div class="icon__wrap icon__wrap--like"></div><svg xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                    style="enable-background:new 0 0 62 62;" xml:space="preserve">
                    <clipPath id="icon-like">
                      <path class="icon__fill"
                        d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1	c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                      </path>
                    </clipPath>
                    <path class="icon__stroke"
                      d="M31,49l-2.9-2.6C17.8,37.2,11,31.2,11,23.8c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L31,49z">
                    </path>
                  </svg>
                </div>
              </div>
              <div class="gallery__item-content">
                <div class="gallery__item-title"><a class="artwork-modal-reload" href="#">Red<br>Man I</a></div>
                <div class="gallery__item-author"><a href="#">Valery Alyoshin</a></div>
                <div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
              </div>
            </li>
          </ul>
        </div>
        <div class="artwork__navigation navigation"><a class="navigation__link navigation__link--right" href="">
            <div class="navigation__name">show all works</div>
            <div class="arrow--right navigation__arrow arrow arrow--wide"><svg>
                <use xlink:href="#arrow-head"></use>
              </svg></div>
            <div class="navigation__desc">Valery Alyoshin</div>
          </a></div>
      </div>
      <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
          <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
          </div>
          <div class="pswp__ui pswp__ui--hidden">
            <div class="pswp__top-bar">
              <div class="pswp__counter"></div><button
                class="pswp__button pswp__button--close button--close-icon icon icon--white-stroke" title="Close (Esc)">
                <div class="icon__wrap icon__wrap--close"></div><svg xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62"
                  style="enable-background:new 0 0 62 62;" xml:space="preserve">
                  <clipPath id="icon-close">
                    <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
                  </clipPath>
                  <path class="icon__stroke icon__stroke--white icon__stroke--white"
                    d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
                  </path>
                  <line class="icon__stroke icon__stroke--white" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
                  <line class="icon__stroke" x1="25.9" y1="19.3" x2="35.7" y2="29.2"></line>
                  <line class="icon__stroke" x1="35.7" y1="19" x2="25.9" y2="28.8"></line>
                </svg>
              </button><button class="pswp__button pswp__button--fs button--fullscreen" title="Toggle fullscreen"><svg>
                  <use xlink:href="#fullscreen"></use>
                </svg></button><button class="pswp__button pswp__button--zoom button--zoom close close--zoom"
                title="Zoom in/out"><span class="close__top"></span><span class="close__bottom"></span></button>
              <div class="pswp__preloader">
                <div class="pswp__preloader__icn">
                  <div class="pswp__preloader__cut">
                    <div class="pswp__preloader__donut"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div>
            </div><button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button><button
              class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
          </div>
        </div>
      </div>
      
      <div class="artwork__utils">
        <div class="artwork__size artwork__size--sculpture">
          <figure class="artwork__size-work">
            <figcaption class="artwork__size-caption artwork__size-caption--left"><span>100 cm</span></figcaption>
            <img src="/assets/artwork-size-01.jpg" alt="" data-height="100">
          </figure>
          <figure class="artwork__size-reference"><img src="/assets/artwork-size-reference.svg" alt=""
              data-height="200">
            <figcaption class="artwork__size-caption artwork__size-caption--right"><span>200 cm</span>
            </figcaption>
          </figure>
        </div>
        <div class="artwork__video"><video controls width="100%" disablepictureinpicture muted playsinline>
                  <source src="/assets/video.mp4" type="video/mp4">
                </video></div>
      </div>
    
      
      
      <input id="artwork-url" name="artwork-url" value="artwork url">

`;
