<?php
$currentPage = 'message';
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="株式会社STARTの代表メッセージです。" />
    <title>メッセージ｜株式会社START</title>
    <link rel="icon" href="./asset/img/favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/css/base.css" />
    <link rel="stylesheet" href="./asset/css/module.css?v=<?= filemtime(__DIR__ . '/asset/css/module.css') ?>" />
    <link rel="stylesheet" href="./asset/css/message.css" />
    <script src="./asset/js/main.js?v=<?= filemtime(__DIR__ . '/asset/js/main.js') ?>" defer></script>
  </head>
  <body>
    <?php require __DIR__ . '/asset/parts/header.php'; ?>

    <main>
      <section class="page-hero page-hero--message">
        <h1 class="page-hero__title">メッセージ</h1>
      </section>

      <nav class="breadcrumb container" aria-label="パンくずリスト">
        <ol class="breadcrumb__list">
          <li class="breadcrumb__item"><a class="breadcrumb__link" href="./index.php">ホーム</a></li>
          <li class="breadcrumb__item">
            <span class="breadcrumb__separator" aria-hidden="true">›</span>
            <span aria-current="page">メッセージ</span>
          </li>
        </ol>
      </nav>

      <section class="message-main">
        <div class="container">
          <div class="message-intro">
            <h2 class="message-intro__title">
              <img class="message-intro__title-image" src="./asset/img/message-title.png" alt="「仕事」をきっかけに 人生の新しい一歩を！" width="1700" height="240" />
            </h2>
            <!-- 画像を使わない場合は、上のh2を以下のテキスト版に置き換える。 -->
            <!-- <h2 class="message-intro__title">「仕事」をきっかけに<br />人生の新しい一歩を！</h2> -->
           
            <p class="message-intro__lead">大事なお仕事探しを応援させてください</p>
          </div>

          <div class="message-body">
            <figure class="message-profile">
              <img class="message-profile__image" src="./asset/img/ceo.png" alt="代表取締役社長 鈴木 博之" width="260" height="260" />
              <figcaption class="message-profile__caption">
                <span class="message-profile__position">代表取締役社長</span>
                <span class="message-profile__name">鈴木 博之</span>
              </figcaption>
            </figure>

            <div class="message-body__content">
              <p>はじめまして。代表取締役社長の鈴木 博之です。</p>
              <p>私は、仕事を楽しむことが人生の豊かさにつながると考えています。もちろん、仕事が人生のすべてではありません。しかし、多くの時間を費やす仕事は、人生を形づくる大切な要素のひとつです。</p>
              <p>株式会社STARTでは、仕事をきっかけに、一人ひとりが理想とする人生の実現を目指せるようサポートしています。</p>
              <p>幸せにつながる仕事との出会いを支援するお仕事紹介サービス『スタート』、共通の目標を持つ仲間とつながる人材紹介SNS『ゴール』を運営しています。また、Webデザインの基礎スキルを学べるスクール『Webの学校』も開講しています。</p>
            </div>
          </div>

          <img class="message-office" src="./asset/img/office.png" alt="株式会社STARTの会議室" width="2220" height="800" />
        </div>
      </section>
    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
