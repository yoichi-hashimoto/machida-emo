<?php include __DIR__ . "/partials/header.php"; ?>
<section class="hero">
  <div class="hero-text">
    <h1>ようこそ、町田emoプロジェクトへ</h1>
    <p>プロギング・自然観察・農業体験を通じて、地域と人をつなぐ活動を行っています。</p>
    <div class="cta-buttons">
      <a class="btn" href="activities.php">活動を見る</a>
      <a class="btn outline" href="contact.php">参加・問い合わせ</a>
    </div>
  </div>
  <div class="hero-art">
    <img src="assets/img/tree.svg" alt="木のイラスト" />
  </div>
</section>

<section class="promo-grid">
  <article class="card">
    <h3>🌍 プロギング</h3>
    <p>走って拾う、新しいまちづくり。楽しく健康に、街もきれいに。</p>
  </article>
  <article class="card">
    <h3>🔍 自然観察</h3>
    <p>四季の発見をみんなで共有。初心者でも気軽に参加できます。</p>
  </article>
  <article class="card">
    <h3>🌾 農業体験</h3>
    <p>土に触れて、食に近づく。収穫の喜びを家族で。</p>
  </article>
</section>

<section class="embed">
  <h2>公式アカウント</h2>
  <div class="embed-grid">
    <div>
      <h4>Instagram</h4>
      <p>最新の活動写真はInstagramでチェック！</p>
      <a class="btn small" target="_blank" rel="noopener" href="<?= htmlspecialchars($INSTAGRAM_URL) ?>">Instagramへ</a>
    </div>
    <div>
      <h4>note</h4>
      <p>活動レポートやブログ記事をnoteで発信中。</p>
      <a class="btn small" target="_blank" rel="noopener" href="<?= htmlspecialchars($NOTE_URL) ?>">noteへ</a>
    </div>
  </div>
</section>
<?php include __DIR__ . "/partials/footer.php"; ?>
