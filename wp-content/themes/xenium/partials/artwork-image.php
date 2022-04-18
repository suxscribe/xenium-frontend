<figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
  <? if ($image['type'] == 'image') { ?>
    <a class="artwork__image-image" href="<?= $image['url'] ?>" itemprop="contentUrl" data-size="<?= $image['width'] . 'x' . $image['height'] ?>">
      <img src="<?= $image['sizes']['large'] ?>" alt="<?= esc_html(get_the_title()) ?>">
    </a>
    <div class="artwork__icons">
      <a class="artwork__icon artwork__icon--zoom" href="">
        <div class="artwork__icon-fill artwork__icon-fill--zoom"></div><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 62 62" style="enable-background:new 0 0 62 62;" xml:space="preserve">
          <clipPath id="icon-zoom">
            <ellipse class="icon__fill" cx="31" cy="24" rx="18" ry="18"></ellipse>
          </clipPath>
          <path class="icon__stroke" d="M48.5,24c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5    C40.7,6.5,48.5,14.4,48.5,24z">
          </path>
          <line class="icon__stroke" x1="37" y1="40.4" x2="45.8" y2="55.7"></line>
          <line class="icon__stroke" x1="30.7" y1="17.1" x2="30.7" y2="31"></line>
          <line class="icon__stroke" x1="37.9" y1="23.8" x2="24.1" y2="23.8"></line>
        </svg>
      </a>
    </div>
  <? } ?>
  <? if ($image['type'] == 'video') { ?>
    <a class="artwork__image-image" href="<?= $image['url'] ?>" itemprop="contentUrl" data-size="<?= $image['width'] . 'x' . $image['height'] ?>">
      <video src="<?= $image['url'] ?>" muted playsinline></video>
    </a>
    <div class="artwork__image-icons">
      <a class="artwork__image-icon artwork__image-icon--zoom" href="">
        <svg id="Layer_1" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewbox="0 0 42.5 54.1" style="enable-background:new 0 0 42.5 54.1;" xml:space="preserve">
          <g id="zoom">
            <path d="M38.8,20.1c0,9.7-7.8,17.5-17.5,17.5c-9.7,0-17.5-7.9-17.5-17.5c0-9.7,7.8-17.5,17.5-17.5      C30.9,2.5,38.8,10.4,38.8,20.1z">
            </path>
            <line x1="27.2" y1="36.5" x2="36.1" y2="51.8"></line>
            <line x1="21" y1="13.1" x2="21" y2="27"></line>
            <line x1="28.2" y1="19.8" x2="14.3" y2="19.8"></line>
          </g>
        </svg>
      </a>
    </div>
  <? } ?>
</figure>