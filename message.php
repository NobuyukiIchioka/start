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
    <link rel="stylesheet" href="./asset/css/module.css" />
    <link rel="stylesheet" href="./asset/css/message.css" />
    <script src="./asset/js/main.js" defer></script>
  </head>
  <body>
    <?php require __DIR__ . '/asset/parts/header.php'; ?>

    <main>
      <section class="page-hero page-hero--message">
        <h1 class="visually-hidden">メッセージ</h1>
      </section>

      <section class="message-main">
        <div class="container">
          <div class="message-intro">
            <h2 class="message-intro__title">「仕事」をきっかけに<br />人生の新しいスタートを！</h2>
            <p class="message-intro__lead">大事なお仕事探しを応援させてください</p>
          </div>

          <div class="message-body">
            <div class="message-body__portrait" role="img" aria-label="代表取締役社長 ショーン・デイビット・ジュニア"></div>
            <p>はじめまして。代表取締役社長のショーン・デイビット・ジュニアです。</p>
            <p>私はそこそこ幸せです。それは仕事が楽しいからです。もちろん仕事イコール人生ではありません。でも仕事は人生の大事な基盤のように思っています。</p>
            <p>株式会社STARTは、みなさんが仕事をきっかけに理想の人生を実現する手助けをしています。幸せにつながるお仕事紹介サービス<a class="js-placeholder-link" href="#">『スタート』</a>や、共通の目標を目指す仲間が見つかる人材紹介SNS<a class="js-placeholder-link" href="#">『ゴール』</a>を運営しています。また、Webデザインの基礎スキルを身につけられるスクール<a class="js-placeholder-link" href="#">『Webの学校』</a>も随時開講しています。</p>
          </div>

          <div class="message-office" role="img" aria-label="株式会社STARTの会議室"></div>
        </div>
      </section>
    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
