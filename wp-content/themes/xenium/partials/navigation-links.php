  <?
  $prev_post = get_adjacent_post(false, '', true);
  if (!empty($prev_post)) { ?>
    <a class="navigation__link navigation__link--prev" href="<?= get_permalink($prev_post->ID) ?>">
      <div class="navigation__name"><?= $prev_post->post_title ?></div>
      <div class="arrow--prev navigation__arrow arrow arrow--wide"><svg>
          <use xlink:href="#arrow-head"></use>
        </svg></div>
      <div class="navigation__desc">previous artist</div>
    </a>

  <? }
  $next_post = get_adjacent_post(false, '', false);
  if (!empty($next_post)) { ?>
    <a class="navigation__link navigation__link--next" href="<?= get_permalink($next_post->ID) ?>">
      <div class="navigation__name"><?= $next_post->post_title ?></div>
      <div class="arrow--next navigation__arrow arrow arrow--wide"><svg>
          <use xlink:href="#arrow-head"></use>
        </svg></div>
      <div class="navigation__desc">next artist</div>
    </a>
  <? } ?>