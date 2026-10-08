<?php
$currentPage = 'home';
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="株式会社STARTのコーポレートサイトです。" />
    <title>株式会社START</title>
    <link rel="icon" href="./asset/img/favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/css/base.css" />
    <link rel="stylesheet" href="./asset/css/module.css?v=<?= filemtime(__DIR__ . '/asset/css/module.css') ?>" />
    <link rel="stylesheet" href="./asset/css/top.css" />
    <script src="./asset/js/main.js?v=<?= filemtime(__DIR__ . '/asset/js/main.js') ?>" defer></script>
  </head>
  <body>
    <?php require __DIR__ . '/asset/parts/header.php'; ?>

    <main>
      <section class="top-hero">
        <div class="top-hero__content">
          <h1 class="top-hero__title">START
            <span class="top-hero__copy">仕事に最高のスタートを。</span>
          </h1>
        </div>
      </section>

      <section class="news-section">
        <div class="news-section__inner container">
          <h2 class="section-title">ニュース</h2>
          <?php require __DIR__ . '/asset/parts/news-list.php'; ?>
        </div>
      </section>

      <section class="service-section">
        <div class="service-section__inner container">
          <div class="service-section__header">
            <h2 class="section-title">サービス</h2>
          </div>
          <!-- content-card系はmodule.cssの共通パーツ、service-listはtop.cssの配置用。 -->
          <ul class="service-list content-card-list">
            <li class="content-card">
              <picture class="content-card__icon">
                <source media="(max-width: 767px)" srcset="./asset/img/人材紹介業icon-sp.png" />
                <img class="content-card__icon-image" src="./asset/img/人材紹介業icon-pc.png" alt="" width="96" height="96" />
              </picture>
              <h3 class="content-card__title">人材紹介業</h3>
              <p class="content-card__text">Webサイト制作やリニューアルに対応できる、Web制作人材の紹介を行っています。</p>
            </li>
            <li class="content-card">
              <picture class="content-card__icon">
                <source media="(max-width: 767px)" srcset="./asset/img/スクール事業icon-sp.png" />
                <img class="content-card__icon-image" src="./asset/img/スクール事業icon-pc.png" alt="" width="96" height="96" />
              </picture>
              <h3 class="content-card__title">スクール事業</h3>
              <p class="content-card__text">オンラインでWeb制作を学べるスクールを運営しています。</p>
            </li>
            <li class="content-card">
              <picture class="content-card__icon">
                <source media="(max-width: 767px)" srcset="./asset/img/Webメディア運営icon-sp.png" />
                <img class="content-card__icon-image" src="./asset/img/Webメディア運営icon-pc.png" alt="" width="96" height="96" />
              </picture>
              <h3 class="content-card__title">Webメディア運営</h3>
              <p class="content-card__text">人事系メディアやWebデザイン関連のメディアなどを複数運営しています。</p>
            </li>
          </ul>
        </div>
      </section>
    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
