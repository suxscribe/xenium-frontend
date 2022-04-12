<? // global $wp;
// // $currentUrl = add_query_arg( $wp->query_vars, home_url( $wp->request ) );;
// $currentUrl = home_url($wp->request);
// echo $currentUrl;

// get max pages count
global $wp_query;
$maxPages = $wp_query->max_num_pages;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$next_page = get_next_posts_page_link();
$prev_page = get_previous_posts_page_link();

$links = paginate_links([
  'prev_next'          => false,
  'type'               => 'array'
]);

foreach ($links as &$link) {
  $link = str_replace(['page-numbers', 'current'], ['gallery__pagination-item', 'active'], $link);
}

?>
<div class="gallery__pagination">
  <? if ($paged > 1) { ?>
    <a class="gallery__pagination-item gallery__pagination-item--prev" href="<?= $prev_page ?>">
      <div class="arrow arrow--prev"><svg class="arrow__head">
          <use xlink:href="#arrow-head"></use>
        </svg></div>
    </a>
  <? } ?>

  <? foreach ($links as &$link) {
    echo $link;
  } ?>

  <? if ($paged < $maxPages) { ?>
    <a class="gallery__pagination-item gallery__pagination-item--next" href="<?= $next_page ?>">
      <div class="arrow arrow--right"><svg class="arrow__head">
          <use xlink:href="#arrow-head"></use>
        </svg></div>
    </a>
  <? } ?>
</div>