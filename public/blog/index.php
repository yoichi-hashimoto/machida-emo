<?php
include __DIR__ . "/../partials/header.php";
require_once __DIR__ . "/../config.php";

function get_posts($dir){
  $files = glob($dir . "/*.md");
  usort($files, function($a,$b){ return filemtime($b) <=> filemtime($a); });
  $posts = [];
  foreach ($files as $f){
    $lines = file($f, FILE_IGNORE_NEW_LINES);
    if (!$lines) continue;
    // First line: title|date|slug
    $meta = explode("|", $lines[0]);
    $title = $meta[0] ?? "無題";
    $date = $meta[1] ?? date('Y-m-d', filemtime($f));
    $slug = $meta[2] ?? basename($f, ".md");
    $excerpt = "";
    for ($i=1; $i < min(8, count($lines)); $i++){ $excerpt .= $lines[$i] . " "; }
    $posts[] = ["title"=>$title, "date"=>$date, "slug"=>$slug, "excerpt"=>mb_strimwidth($excerpt,0,120,'…','UTF-8')];
  }
  return $posts;
}

$posts = get_posts($POSTS_DIR);
?>
<h1>ブログ</h1>
<?php if (empty($posts)): ?>
  <p>まだ投稿がありません。</p>
<?php else: ?>
  <ul class="post-list">
  <?php foreach ($posts as $p): ?>
    <li class="post-item">
      <a class="post-title" href="post.php?slug=<?= urlencode($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?></a>
      <span class="post-date"><?= htmlspecialchars($p['date']) ?></span>
      <p class="post-excerpt"><?= htmlspecialchars($p['excerpt']) ?></p>
    </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>
<?php include __DIR__ . "/../partials/footer.php"; ?>
