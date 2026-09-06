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
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/css/base.css" />
    <link rel="stylesheet" href="./asset/css/module.css" />
    <link rel="stylesheet" href="./asset/css/top.css" />
    <script src="./asset/js/main.js" defer></script>
  </head>
  <body>
    <?php require __DIR__ . '/asset/parts/header.php'; ?>

    <main>
      <section class="top-hero">
        <h1 class="visually-hidden">START 仕事に最高のスタートを。</h1>
      </section>

      <section class="news-section">
        <div class="news-section__inner container">
          <h2 class="section-title">ニュース</h2>
          <?php require __DIR__ . '/asset/parts/news-list.php'; ?>
        </div>
      </section>

      <section class="service-section">
        <div class="service-section__inner container">
          <h2 class="section-title">サービス</h2>
          <ul class="service-list">
            <li class="service-card service-card--recruit">
              <a class="service-card__link js-placeholder-link" href="#">
                <picture class="service-card__icon">
                  <source media="(max-width: 767px)" srcset="./asset/img/人材紹介業icon-sp.png" />
                  <img class="service-card__icon-image" src="./asset/img/人材紹介業icon-pc.png" alt="" width="96" height="96" />
                </picture>
                <h3 class="service-card__title">人材紹介業</h3>
                <p class="service-card__text">求職者と企業をつなぎ、理想の仕事探しを支援する人材紹介サービスを運営しています。</p>
              </a>
            </li>
            <li class="service-card service-card--school">
              <a class="service-card__link js-placeholder-link" href="#">
                <picture class="service-card__icon">
                  <source media="(max-width: 767px)" srcset="./asset/img/スクール事業icon-sp.png" />
                  <img class="service-card__icon-image" src="./asset/img/スクール事業icon-pc.png" alt="" width="96" height="96" />
                </picture>
                <h3 class="service-card__title">スクール事業</h3>
                <p class="service-card__text">オンラインでWeb制作を学べるスクールを運営しています。</p>
              </a>
            </li>
            <li class="service-card service-card--media">
              <a class="service-card__link js-placeholder-link" href="#">
                <picture class="service-card__icon">
                  <source media="(max-width: 767px)" srcset="./asset/img/Webメディア運営icon-sp.png" />
                  <img class="service-card__icon-image" src="./asset/img/Webメディア運営icon-pc.png" alt="" width="96" height="96" />
                </picture>
                <h3 class="service-card__title">Webメディア運営</h3>
                <p class="service-card__text">人事系メディアやWebデザイン関連のメディアなどを複数運営しています。</p>
              </a>
            </li>
          </ul>
        </div>
      </section>
    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
