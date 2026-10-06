<?php
$currentPage = 'company';
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="株式会社STARTの会社概要です。" />
    <title>会社概要｜株式会社START</title>
    <link rel="icon" href="./asset/img/favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/css/base.css" />
    <link rel="stylesheet" href="./asset/css/module.css" />
    <link rel="stylesheet" href="./asset/css/company.css" />
    <script src="./asset/js/main.js" defer></script>
  </head>
  <body>
    <?php require __DIR__ . '/asset/parts/header.php'; ?>

    <main>
      <section class="page-hero page-hero--company">
        <h1 class="page-hero__title">会社概要</h1>
      </section>

      <div class="company-main">
        <div class="container">
          <!-- 会社情報：各項目名と内容をdl・dt・ddで対応させる。 -->
          <dl class="company-profile">
            <div class="company-profile__row">
              <dt class="company-profile__term">社名</dt>
              <dd class="company-profile__description">株式会社START</dd>
            </div>
            <div class="company-profile__row">
              <dt class="company-profile__term">設立</dt>
              <dd class="company-profile__description"><time datetime="2025-02-10">2025.02.10</time></dd>
            </div>
            <div class="company-profile__row">
              <dt class="company-profile__term">代表取締役</dt>
              <dd class="company-profile__description">鈴木 博之</dd>
            </div>
            <div class="company-profile__row">
              <dt class="company-profile__term">資本金</dt>
              <dd class="company-profile__description">10,000,000円</dd>
            </div>
            <div class="company-profile__row">
              <dt class="company-profile__term">所在地</dt>
              <dd class="company-profile__description">〒555-5555 東京都千代田区 スタートビルディング 606</dd>
            </div>
          </dl>

          <section class="company-map">
            <h2 class="visually-hidden">所在地</h2>
            <!-- 埋め込みURLが確定したら、この仮表示をGoogle Mapのiframeに差し替える。 -->
            <div class="company-map__placeholder">Google Map</div>
            <!-- hrefには、確定したGoogle Mapの共有URLを設定する。 -->
            <p class="company-map__link-wrap"><a class="company-map__link js-placeholder-link" href="#">Google mapで見る</a></p>
          </section>

          <section class="company-news">
            <h2 class="visually-hidden">ニュース</h2>
            <?php require __DIR__ . '/asset/parts/news-list.php'; ?>
          </section>
        </div>
      </div>
    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
