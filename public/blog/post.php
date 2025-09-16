<?php
include __DIR__ . "/../partials/header.php";
require_once __DIR__ . "/../config.php";
function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

$slug = $_GET['slug'] ?? '';
$path = $POSTS_DIR . "/" . basename($slug) . ".md";

if (!is_file($path)){
  echo "<h1>記事が見つかりません</h1>";
  include __DIR__ . "/../partials/footer.php";
  exit;
}

$lines = file($path, FILE_IGNORE_NEW_LINES);
$meta = explode("|", $lines[0]);
$title = $meta[0] ?? "無題";
$date = $meta[1] ?? date('Y-m-d', filemtime($path));
$content_lines = array_slice($lines, 1);
$content_html = "";
foreach ($content_lines as $ln){
  $ln = h($ln);
  // very small markdown-ish: headers and paragraphs
  if (preg_match('/^# (.*)/u', $ln, $m)) {
    $content_html .= "<h2>{$m[1]}</h2>";
  } else {
    $content_html .= "<p>{$ln}</p>";
  }
}

?>
<article class="post">
  <h1><?= h($title) ?></h1>
  <p class="post-date"><?= h($date) ?></p>
  <div class="post-body"><?= $content_html ?></div>
  <p><a class="btn small" href="index.php">← 記事一覧へ</a></p>
</article>
<?php include __DIR__ . "/../partials/footer.php"; ?>
