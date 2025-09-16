<?php
require_once __DIR__ . "/config.php";

function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

$errors = [];
if (trim($name) === '') $errors[] = "お名前は必須です";
if (trim($email) === '') $errors[] = "メールアドレスは必須です";
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "メールアドレスの形式が正しくありません";

if ($errors) {
  include __DIR__ . "/partials/header.php";
  echo "<h1>送信エラー</h1><ul class='errors'>";
  foreach ($errors as $e) echo "<li>" . h($e) . "</li>";
  echo "</ul><p><a class='btn outline' href='contact.php'>戻る</a></p>";
  include __DIR__ . "/partials/footer.php";
  exit;
}

// Save to CSV
$timestamp = date('Y-m-d H:i:s');
$line = [$timestamp, $name, $email, preg_replace("/\r?\n/", " ", $message)];
$fp = fopen($CONTACT_CSV, 'a');
if ($fp) {
  fputcsv($fp, $line);
  fclose($fp);
}

include __DIR__ . "/partials/header.php";
echo "<h1>送信完了</h1><p>お問い合わせありがとうございます。担当者よりご連絡いたします。</p>";
echo "<p><a class='btn' href='index.php'>ホームへ戻る</a></p>";
include __DIR__ . "/partials/footer.php";
