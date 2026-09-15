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
    <link rel="stylesheet" href="/asset/css/base.css" />
    <link rel="stylesheet" href="/asset/css/module.css" />
    <link rel="stylesheet" href="/asset/css/top.css" />
    <script src="/asset/js/main.js" defer></script>
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

    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
