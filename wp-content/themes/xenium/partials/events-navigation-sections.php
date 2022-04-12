<?
$active_class = 'active';
$categories = get_terms('category', 'orderby=name&hide_empty=0');

$current_term_id = get_queried_object()->term_id;

$page_for_posts     = get_option('page_for_posts');
$page_for_posts_url = get_post_type_archive_link('post'); // link for All the posts

$active_root = (get_queried_object()->ID == $page_for_posts) ? $active_class : '';
?>

<?
if ($categories) { ?>
  <div class="events__navigation-sections">
    <a class="events__navigation-sections-item <?= $active_root ?>" href="<?= $page_for_posts_url ?>">all</a>

    <?
    foreach ($categories as $cat) {
      $term_link = get_term_link($cat, 'category');
      $active    = ($cat->term_id == $current_term_id) ? $active_class : '';
    ?>

      <a class="events__navigation-sections-item <?= $active ?>" href="<?= $term_link ?>"><?= $cat->name ?></a>
    <? } ?>
  </div>
<? } ?>

<? /*<div class="events__navigation-time">
  <a class="events__navigation-time-item" href="">future</a>
  <a class="events__navigation-time-item" href="">now</a>
  <a class="events__navigation-time-item disabled" href="">past</a>
</div> */ ?>