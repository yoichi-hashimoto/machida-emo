<?php
// Basic site configuration
$SITE_NAME = "町田emoプロジェクト";
$BASE_URL = ""; // If the site is in a subfolder, set like "/machida-emo/public"
$INSTAGRAM_URL = "https://www.instagram.com/"; // あなたのInstagramプロフィールURLに変更
$NOTE_URL = "https://note.com/"; // あなたのnoteプロフィールURLに変更

// Contact form settings
$CONTACT_CSV = __DIR__ . "/../data/contacts.csv"; // 保存先（相対パス調整済み）

// Blog settings
$POSTS_DIR = __DIR__ . "/../data/posts"; // ポスト保存先
if (!is_dir($POSTS_DIR)) { mkdir($POSTS_DIR, 0777, true); }
?>
