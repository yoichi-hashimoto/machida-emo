# 町田emoプロジェクト - シンプルPHPサイト

## 構成
- `public/`
  - `index.php` … トップ（木のイラスト＆緑ベースの爽やかデザイン）
  - `activities.php` … 活動紹介（プロギング・自然観察・農業体験）
  - `blog/` … フラットファイル型ブログ（`data/posts/*.md`）
  - `contact.php` … お問い合わせフォーム（CSV保存）
  - `contact_submit.php` … 送信処理
  - `admin/new_post.php` … 簡易投稿画面（.md作成）
  - `partials/` … ヘッダー/フッター/ナビ
  - `assets/` … CSS・JS・画像（`tree.svg`）
- `data/`
  - `contacts.csv` … 問い合わせ保存先（送信時自動作成）
  - `posts/` … ブログ記事（1行目: `タイトル|日付|スラッグ`）

## 使い方
1. 任意のPHP対応サーバに `public/` をデプロイ（ドキュメントルートに設定）。
2. `public/config.php` の `$BASE_URL` を環境に合わせて設定（サブフォルダ利用時など）。
3. Instagram / note のURLを `config.php` で設定。
4. ブログ投稿は `admin/new_post.php` で作成可能（簡易UI）。
5. お問い合わせは `data/contacts.csv` に追記保存されます（権限注意）。

## メモ
- メール送信を行う場合は `contact_submit.php` に `mail()` を追記し、サーバ側の設定を行ってください。
- セキュリティ（管理画面の認証、CSRF対策、reCAPTCHA等）は本番前に必ず追加検討してください。
