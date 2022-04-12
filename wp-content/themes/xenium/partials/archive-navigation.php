<?

$taxonomy = 'artwork_section';
$currentId = get_queried_object_id();

// if on top level -> get child categories

if (get_queried_object()->parent == 0) {
  $parentId = get_queried_object_id(); // parent = current level id
} else {
  $parentId = get_queried_object()->parent;
}

// get top level categories
$topTerms = get_terms([
  'taxonomy' => $taxonomy,
  'parent' => 0,
]);
?>

<div class="gallery__filter-category">
  <?
  foreach ($topTerms as $term) {
  ?>
    <a class="gallery__filter-category-item <?= (($term->term_id == $parentId) ? 'active' : '') ?>" href=" <?= get_term_link($term) ?>"><?= $term->name ?></a>
  <? } ?>
</div>

<?
if ($currentId != 0) {
  // get 2 level categories
  $childTerms = get_terms([
    'taxonomy' => $taxonomy,
    'parent' => $parentId,
  ]);

  $activeId = $parentId;
  foreach ($childTerms as $term) {
    if ($term->term_id == $currentId) {
      $activeId = $currentId;
    }
  }
?>

  <div class="gallery__filter-subcategory">
    <a class="gallery__filter-subcategory-item <?= (($activeId == $parentId) ? 'active' : '') ?>" href="<?= get_term_link($parentId) ?>">all</a>
    <?
    foreach ($childTerms as $term) {
    ?>
      <a class="gallery__filter-subcategory-item <?= (($term->term_id == $currentId) ? 'active' : '') ?>" href="<?= get_term_link($term) ?>"><?= $term->name ?></a>
    <? } ?>
  </div>
<? } ?>