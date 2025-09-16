<?php include __DIR__ . "/partials/header.php"; ?>
<h1>お問い合わせ</h1>
<form class="form" method="post" action="contact_submit.php">
  <label>お名前 <span class="req">*</span>
    <input type="text" name="name" required>
  </label>
  <label>メールアドレス <span class="req">*</span>
    <input type="email" name="email" required>
  </label>
  <label>参加希望・お問い合わせ内容
    <textarea name="message" rows="6" placeholder="参加希望日、人数、興味のある活動など"></textarea>
  </label>
  <button class="btn" type="submit">送信</button>
</form>
<?php include __DIR__ . "/partials/footer.php"; ?>
