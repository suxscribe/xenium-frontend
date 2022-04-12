<figure class="artwork__image" itemscope itemtype="http://schema.org/ImageObject">
  <? if ($image['type'] == 'image') { ?>
    <a class="artwork__image-image" href="<?= $image['url'] ?>" itemprop="contentUrl" data-size="<?= $image['width'] . 'x' . $image['height'] ?>">
      <img src="<?= $image['sizes']['large'] ?>" alt="<?= esc_html(get_the_title()) ?>">
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