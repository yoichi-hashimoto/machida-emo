<?php require_once __DIR__ . "/../config.php"; ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= htmlspecialchars($SITE_NAME) ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/style.css">
  <script defer src="<?= $BASE_URL ?>/assets/js/main.js"></script>
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="logo" href="<?= $BASE_URL ?>/index.php">🌿 町田emoプロジェクト</a>
    <?php include __DIR__ . "/nav.php"; ?>
  </div>
</header>
<main class="site-main container">
