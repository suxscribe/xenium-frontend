import { vars } from './vars';

const artworkModalDom = document.querySelector('.artwork-modal');

export const artworkModal = () => {
  if (artworkModalDom) {
    artworkModalListener();
  }
};

const artworkModalListener = () => {
  document.addEventListener('click', (e) => {
    if (e.target.matches('.artwork-modal__link')) {
      e.preventDefault();
      artworkModalOpen();
    }
    if (e.target.matches('.artwork-modal__close')) {
      e.preventDefault();
      artworkModalClose();
    }
    if (e.target.matches('.artwork-modal-reload')) {
      e.preventDefault();
      artworkModalReload();
    }
  });

  //todo add close via esc key. only if no modals opened
};

const artworkModalOpen = () => {
  console.log('artwork modal link click');
  artworkModalDom.classList.add('open');
  artworkModalDom.ariaHidden = 'false';

  document.documentElement.classList.add(vars.bodyOverflowClass);
};

const artworkModalClose = () => {
  console.log('close modal ');
  artworkModalDom.classList.remove('open');
  artworkModalDom.ariaHidden = 'true';

  document.documentElement.classList.remove(vars.bodyOverflowClass);
};

const artworkModalReload = () => {
  // remove default content
  const artworkDom = document.querySelector('.artwork');
  const loader = document.querySelector('.artwork__loader');

  artworkDom.innerHTML = '';
  // show loader
  loader.classList.add('active');
  // hide loader
  setTimeout(() => {
    loader.classList.remove('active');
    artworkDom.innerHTML = newArtwork;
  }, 3000);
  // show new content
};

const newArtwork = `
<div class="artwork">
						<div class="container">
							<h1 class="artwork__title title"><span class="title__wrap"> <span class="title__text">Red Man I</span></span></h1>
							<div class="artwork__wrap">
								<div class="artwork__left">
									<div class="artwork__left-wrap">
										<a class="artwork__author" href="">
											<div class="artwork__author-name"> Valeriy
												<br>Alyoshin</div>
											<div class="artwork__author-years">1937-2011</div>
											<div class="artwork__author-hover">view
												<br>artist’s
												<br>profile </div>
											<div class="artwork__author-arrow">
												<svg>
													<use xlink:href="#arrow-alt"></use>
												</svg>
											</div>
										</a>
										<dl class="artwork__parameters"> <dt class="artwork__parameter-name">style </dt><dt class="artwork__parameter-value"><a href="">nonconformism </a></dt><dt class="artwork__parameter-name">material </dt><dt class="artwork__parameter-value">oil on canvas </dt><dt class="artwork__parameter-name">year</dt><dt class="artwork__parameter-value">1960s </dt><dt class="artwork__parameter-name">size</dt><dt class="artwork__parameter-value">40x60</dt></dl>
										<div class="artwork__description">
											<p>Ideally this tapestry would float across these dirty waters to get us to Venice. It will tell you all that will happen picking up stories on the way and we will tell you salades. This tapestry was created by Laure Prouvost in the lead-up to the artist's French Pavilion at the 58th Biennale Arte in Venice, 1960.</p>
										</div><a class="artwork__enquire button" data-micromodal-open="modal-enquiry">Enquire</a></div>
								</div>
								<div class="artwork__right">
									<div class="artwork__gallery" itemscope itemtype="http://schema.org/ImageGallery">
										<figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
											<a class="artwork__image-image" href="/assets/artwork-image-01.jpg" itemprop="contentUrl" data-size="1000x1250"> <img src="/assets/artwork-image-01.jpg" alt=""></a>
											<div class="artwork__image-icons">
												<a class="artwork__image-icon artwork__image-icon--size" href="">
													<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
														<g>
															<rect x="12" y="2" transform="matrix(0.866 -0.5 0.5 0.866 -10.6641 14.2555)" width="18.6" height="50.1"></rect>
															<line x1="22.8" y1="12.5" x2="11.9" y2="18.8"></line>
															<line x1="35.7" y1="33.5" x2="24.8" y2="39.8"></line>
															<line x1="29.4" y1="22.6" x2="22.8" y2="26.3"></line>
														</g>
													</svg>
												</a>
												<a class="artwork__image-icon artwork__image-icon--like" href="">
													<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
														<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
													</svg>
												</a>
												<a class="artwork__image-icon artwork__image-icon--zoom" href="">
													<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
														<g id="zoom">
															<path d="M38.8,20.1c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5      C30.9,2.5,38.8,10.4,38.8,20.1z"></path>
															<line x1="27.2" y1="36.5" x2="36.1" y2="51.8"></line>
															<line x1="21" y1="13.1" x2="21" y2="27"></line>
															<line x1="28.2" y1="19.8" x2="14.3" y2="19.8"></line>
														</g>
													</svg>
												</a>
											</div>
										</figure>
										<figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
											<a class="artwork__image-image" href="/assets/artwork-image-02.jpg" itemprop="contentUrl" data-size="1400x1000"> <img src="/assets/artwork-image-02.jpg" alt=""></a>
											<div class="artwork__image-icons">
												<a class="artwork__image-icon artwork__image-icon--zoom" href="">
													<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
														<g id="zoom">
															<path d="M38.8,20.1c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5      C30.9,2.5,38.8,10.4,38.8,20.1z"></path>
															<line x1="27.2" y1="36.5" x2="36.1" y2="51.8"></line>
															<line x1="21" y1="13.1" x2="21" y2="27"></line>
															<line x1="28.2" y1="19.8" x2="14.3" y2="19.8"></line>
														</g>
													</svg>
												</a>
											</div>
										</figure>
										<figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
											<a class="artwork__image-image" href="/assets/artwork-image-03.jpg" itemprop="contentUrl" data-size="1400x1000"> <img src="/assets/artwork-image-03.jpg" alt=""></a>
											<div class="artwork__image-icons">
												<a class="artwork__image-icon artwork__image-icon--zoom" href="">
													<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
														<g id="zoom">
															<path d="M38.8,20.1c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5      C30.9,2.5,38.8,10.4,38.8,20.1z"></path>
															<line x1="27.2" y1="36.5" x2="36.1" y2="51.8"></line>
															<line x1="21" y1="13.1" x2="21" y2="27"></line>
															<line x1="28.2" y1="19.8" x2="14.3" y2="19.8"></line>
														</g>
													</svg>
												</a>
											</div>
										</figure>
									</div>
								</div>
							</div>
							<div class="artwork__related">
								<h4 class="artwork__related-title"><span>another works in collection by artist</span></h4>
								<ul class="gallery__items">
									<li class="gallery__item gallery__item--" data-aos="fade-up" data-aos-delay="200">
										<div class="gallery__item-image">
											<a class="gallery__item-link" href="#"></a><img src="/assets/gallery-item-01.jpg" alt="">
											<div class="gallery__item-like" data-micromodal-open="modal-like">
												<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
													<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
												</svg>
											</div>
										</div>
										<div class="gallery__item-content">
											<div class="gallery__item-title"><a href="">Red <br> Man I</a></div>
											<div class="gallery__item-author">Valery Alyoshin</div>
											<div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
										</div>
									</li>
									<li class="gallery__item gallery__item--reverse" data-aos="fade-up" data-aos-delay="200">
										<div class="gallery__item-image">
											<a class="gallery__item-link" href="#"></a><img src="/assets/gallery-item-02.jpg" alt="">
											<div class="gallery__item-like" data-micromodal-open="modal-like">
												<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
													<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
												</svg>
											</div>
										</div>
										<div class="gallery__item-content">
											<div class="gallery__item-title"><a href="">Red <br> Man I</a></div>
											<div class="gallery__item-author">Valery Alyoshin</div>
											<div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
										</div>
									</li>
									<li class="gallery__item gallery__item--" data-aos="fade-up" data-aos-delay="200">
										<div class="gallery__item-image">
											<a class="gallery__item-link" href="#"></a><img src="/assets/gallery-item-01.jpg" alt="">
											<div class="gallery__item-like" data-micromodal-open="modal-like">
												<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
													<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
												</svg>
											</div>
										</div>
										<div class="gallery__item-content">
											<div class="gallery__item-title"><a href="">Red <br> Man I</a></div>
											<div class="gallery__item-author">Valery Alyoshin</div>
											<div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
										</div>
									</li>
									<li class="gallery__item gallery__item--reverse" data-aos="fade-up" data-aos-delay="200">
										<div class="gallery__item-image">
											<a class="gallery__item-link" href="#"></a><img src="/assets/gallery-item-02.jpg" alt="">
											<div class="gallery__item-like" data-micromodal-open="modal-like">
												<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
													<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
												</svg>
											</div>
										</div>
										<div class="gallery__item-content">
											<div class="gallery__item-title"><a href="">Red <br> Man I</a></div>
											<div class="gallery__item-author">Valery Alyoshin</div>
											<div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
										</div>
									</li>
									<li class="gallery__item gallery__item--reverse" data-aos="fade-up" data-aos-delay="200">
										<div class="gallery__item-image">
											<a class="gallery__item-link" href="#"></a><img src="/assets/gallery-item-02.jpg" alt="">
											<div class="gallery__item-like" data-micromodal-open="modal-like">
												<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
													<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
												</svg>
											</div>
										</div>
										<div class="gallery__item-content">
											<div class="gallery__item-title"><a href="">Red <br> Man I</a></div>
											<div class="gallery__item-author">Valery Alyoshin</div>
											<div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
										</div>
									</li>
									<li class="gallery__item gallery__item--reverse" data-aos="fade-up" data-aos-delay="200">
										<div class="gallery__item-image">
											<a class="gallery__item-link" href="#"></a><img src="/assets/gallery-item-02.jpg" alt="">
											<div class="gallery__item-like" data-micromodal-open="modal-like">
												<svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
													<path id="like" d="M21.3,44.9l-2.9-2.6C8.1,33.2,1.3,27.1,1.3,19.7c0-6,4.8-10.8,11-10.8c3.5,0,6.8,1.6,9,4.1    c2.2-2.5,5.5-4.1,9-4.1c6.2,0,11,4.7,11,10.8c0,7.4-6.8,13.5-17.1,22.6L21.3,44.9z"></path>
												</svg>
											</div>
										</div>
										<div class="gallery__item-content">
											<div class="gallery__item-title"><a href="">Red <br> Man I</a></div>
											<div class="gallery__item-author">Valery Alyoshin</div>
											<div class="gallery__item-tags">nonconformism, avant-garde, 60th, russian art, all, oil canvas</div>
										</div>
									</li>
								</ul>
							</div>
							<div class="artwork__navigation navigation">
								<a class="navigation__link navigation__link--right" href="">
									<div class="navigation__name">show all works</div>
									<div class="arrow--right navigation__arrow arrow arrow--wide">
										<svg>
											<use xlink:href="#arrow-head"></use>
										</svg>
									</div>
									<div class="navigation__desc">Valery Alyoshin</div>
								</a>
							</div>
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
										<div class="pswp__counter"></div>
										<button class="pswp__button pswp__button--close button--close-icon" title="Close (Esc)">
											<svg>
												<use xlink:href="#close-stroke"></use>
											</svg>
										</button>
										<button class="pswp__button pswp__button--fs button--fullscreen" title="Toggle fullscreen">
											<svg>
												<use xlink:href="#fullscreen"></use>
											</svg>
										</button>
										<button class="pswp__button pswp__button--zoom button--zoom" title="Zoom in/out"></button>
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
									</div>
									<button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)"></button>
									<button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)"></button>
								</div>
							</div>
						</div>
						<div class="modal micromodal-slide modal--like" id="modal-like" aria-hidden="true">
							<div class="modal__overlay" tabindex="-1" data-micromodal-close="">
								<div class="modal__container modal__container--like" role="dialog" aria-modal="true">
									<button class="modal__close close close--like" aria-label="Close modal" data-micromodal-close=""><span class="close__top"> </span><span class="close__bottom"></span></button>
									<div class="modal__content modal__content--like">
										<div class="modal__like">
											<svg>
												<use xlink:href="#like"></use>
											</svg>
										</div>
										<h3 class="modal__title">thank you!</h3>
										<p>You can share your favorite post in your social networks.</p>
										<form class="modal__form form form--modal">
											<div class="form__row form__row-input stacked">
												<input class="validate--email form__email form__input" id="form-email" type="text" placeholder="E-mail" name="form-email" required>
												<div class="form__note"></div>
												<label class="form__label" for="form-email"></label>
											</div>
											<div class="form__row form__submit">
												<button class="form__submit-button button button--black" type="submit">Send</button>
											</div>
										</form>
										<div class="modal__socials">
											<a class="modal__social" href="#">
												<svg>
													<use xlink:href="#facebook"></use>
												</svg>
											</a>
											<a class="modal__social" href="#">
												<svg>
													<use xlink:href="#twitter"></use>
												</svg>
											</a>
											<a class="modal__social" href="#">
												<svg>
													<use xlink:href="#instagram"></use>
												</svg>
											</a>
											<a class="modal__social" href="#">
												<svg>
													<use xlink:href="#link"></use>
												</svg>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal micromodal-slide modal--size" id="modal-size" aria-hidden="true">
							<div class="modal__overlay" tabindex="-1" data-micromodal-close="">
								<div class="modal__container modal__container--size" role="dialog" aria-modal="true">
									<button class="modal__close close close--size" aria-label="Close modal" data-micromodal-close=""><span class="close__top"> </span><span class="close__bottom"></span></button>
									<div class="modal__content modal__content--size">
										<div class="artwork__size artwork__size--sculpture">
											<figure class="artwork__size-work">
												<figcaption class="artwork__size-caption artwork__size-caption--left"><span>100 cm</span></figcaption><img src="/assets/artwork-size-01.jpg" alt="" data-height="100"></figure>
											<figure class="artwork__size-reference"> <img src="/assets/artwork-size-reference.svg" alt="" data-height="200">
												<figcaption class="artwork__size-caption artwork__size-caption--right"><span>200 cm</span></figcaption>
											</figure>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal micromodal-slide modal--form" id="modal-enquiry" aria-hidden="true">
							<div class="modal__overlay" tabindex="-1" data-micromodal-close="">
								<div class="modal__container modal__container--form" role="dialog" aria-modal="true">
									<button class="modal__close close close--form" aria-label="Close modal" data-micromodal-close=""><span class="close__top"> </span><span class="close__bottom"></span></button>
									<div class="modal__content modal__content--form">
										<h3 class="modal__title">Sign up <br>for an event</h3>
										<form class="modal__form form form--modal">
											<div class="form__row form__row-input stacked">
												<input class="validate--empty form__empty form__input" id="form-name" type="text" placeholder="Name" name="form-name" required>
												<div class="form__note"></div>
												<label class="form__label" for="form-name"></label>
											</div>
											<div class="form__row form__row-input stacked">
												<input class="validate--email form__email form__input" id="form-email" type="text" placeholder="E-mail" name="form-email" required>
												<div class="form__note"></div>
												<label class="form__label" for="form-email"></label>
											</div>
											<div class="form__row form__row-input stacked">
												<input class="validate--empty form__empty form__input" id="form-text" type="text" placeholder="Number of participants" name="form-text" required>
												<div class="form__note"></div>
												<label class="form__label" for="form-text"></label>
											</div>
											<div class="form__row form__submit">
												<button class="form__submit-button button button--black" type="submit">Send</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>`;
