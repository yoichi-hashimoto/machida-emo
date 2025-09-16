<?php
include __DIR__ . "/../partials/header.php";
require_once __DIR__ . "/../config.php";
function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $title = $_POST['title'] ?? '無題';
  $date = $_POST['date'] ?? date('Y-m-d');
  $slug = $_POST['slug'] ?? '';
  $body = $_POST['body'] ?? '';
  if ($slug === '') {
    // simple slug generator
    $slug = preg_replace('/[^a-z0-9-]/', '-', strtolower(iconv('UTF-8','ASCII//TRANSLIT', $title)));
    $slug = trim(preg_replace('/-+/', '-', $slug), '-');
    if ($slug === '') $slug = "post-" . date('Ymd-His');
  }
  $file = $POSTS_DIR . "/" . $slug . ".md";
  $content = $title . "|" . $date . "|" . $slug . "\n" . $body.strip() + "\n";
  // Python-like accidental code removed in PHP
}
?>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  // write file properly
  $title = $_POST['title'] ?? '無題';
  $date = $_POST['date'] ?? date('Y-m-d');
  $slug = $_POST['slug'] ?? '';
  $body = $_POST['body'] ?? '';
  if ($slug === '') {
    $slug = preg_replace('/[^a-z0-9-]/', '-', strtolower(iconv('UTF-8','ASCII//TRANSLIT', $title)));
    $slug = trim(preg_replace('/-+/', '-', $slug), '-');
    if ($slug === '') $slug = "post-" . date('Ymd-His');
  }
  $file = $POSTS_DIR . "/" . $slug . ".md";
  $content = $title . "|" . $date . "|" . $slug . "\n" . $body . "\n";
  file_put_contents($file, $content);
  echo "<h1>投稿を保存しました</h1><p><a class='btn' href='../blog/index.php'>ブログ一覧へ</a></p>";
} else { ?>
  <h1>新規投稿</h1>
  <form class="form" method="post">
    <label>タイトル <input type="text" name="title" required></label>
    <label>日付 <input type="date" name="date" value="<?= date('Y-m-d') ?>"></label>
    <label>スラッグ（URL）<input type="text" name="slug" placeholder="例: first-post"></label>
    <label>本文（1行目はメタを自動生成するので不要）
      <textarea name="body" rows="12" placeholder="# 見出し\n本文テキスト..."></textarea>
    </label>
    <button class="btn" type="submit">保存</button>
  </form>
<?php } ?>
<?php include __DIR__ . "/../partials/footer.php"; ?>
