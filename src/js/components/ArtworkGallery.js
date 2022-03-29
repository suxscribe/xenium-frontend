import PhotoSwipe from 'photoswipe';
import PhotoSwipeUI_Default from 'photoswipe/dist/photoswipe-ui-default.js';

export default class ArtworkGallery {
  constructor() {
    this.gallerySelector = '.artwork__gallery';
    this.galleryItemSelector = '.artwork__image';
    this.galleryPreventClass = '.artwork-gallery-ignore';

    this.init();
  }

  init() {
    // parse slide data (url, title, size ...) from DOM elements
    // (children of gallerySelector)

    // triggers when user clicks on thumbnail
    // loop through all gallery elements and bind events
    var galleryElements = document.querySelectorAll(this.galleryItemSelector);

    galleryElements.forEach((element, i) => {
      element.setAttribute('data-pswp-uid', i + 1);
      element.onclick = this.onThumbnailsClick.bind(this);
    });
  }

  onThumbnailsClick(e) {
    e = e || window.event;
    e.preventDefault ? e.preventDefault() : (e.returnValue = false);

    console.log(e.target);

    if (!e.target.matches(this.galleryPreventClass)) {
      var clickedListItem = e.target.closest(this.galleryItemSelector);
      // console.log(clickedListItem);

      var index = clickedListItem.dataset.pswpUid - 1;
      this.openPhotoSwipe(index, clickedListItem.parentNode);
    }
  }

  parseThumbnailElements(gallery) {
    var thumbElements = gallery.childNodes,
      items = [],
      linkEl,
      size,
      item;

    // console.log(gallery);
    // console.log(thumbElements);

    thumbElements.forEach((element, i) => {
      // include only element nodes
      if (element.nodeType === 1) {
        linkEl = element.children[0]; // <a> element
        size = linkEl.dataset.size.split('x');

        // create slide object
        item = {
          src: linkEl.getAttribute('href'),
          w: parseInt(size[0], 10),
          h: parseInt(size[1], 10),
        };

        if (linkEl.querySelector('img')) {
          // <img> thumbnail element, retrieving thumbnail url
          item.msrc = linkEl.querySelector('img').getAttribute('src');
        }
        // if (figureEl.children.length > 1) {
        //   item.title = figureEl.children[1].innerHTML; // <figcaption> content
        // }

        item.el = element; // save link to element for getThumbBoundsFn
        items.push(item);
      }
    });

    return items;
  }

  openPhotoSwipe(index, galleryElement, fromURL) {
    var pswpElement = document.querySelectorAll('.pswp')[0],
      options,
      items;

    items = this.parseThumbnailElements(galleryElement);

    // define options (if needed)
    options = {
      // define gallery index (for URL)
      galleryUID: galleryElement.getAttribute('data-pswp-uid'),

      closeEl: true,
      captionEl: false,
      history: false,
      zoomEl: true,
      timeToIdle: null,
      history: false,
      allowUserZoom: true,
      counterEl: false,
      shareEl: false,
      showAnimationDuration: 600,

      getThumbBoundsFn: function (index) {
        // See Options -> getThumbBoundsFn section of documentation for more info
        var thumbnail = items[index].el.getElementsByTagName('img')[0], // find thumbnail
          pageYScroll =
            window.pageYOffset || document.documentElement.scrollTop,
          rect = thumbnail.getBoundingClientRect();

        return { x: rect.left, y: rect.top + pageYScroll, w: rect.width };
      },
    };

    options.index = parseInt(index, 10);

    // exit if index not found
    if (isNaN(options.index)) {
      return;
    }

    // Pass data to PhotoSwipe and initialize it
    this.gallery = new PhotoSwipe(
      pswpElement,
      PhotoSwipeUI_Default,
      items,
      options
    );
    this.gallery.init();
  }

  destroy() {
    // this.gallery.destroy(); // no need to destroy manually. No eventlisteners atteched
  }
}
