<?php
$currentPage = 'style-guide';
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="株式会社STARTのスタイルガイド確認ページです。" />
    <title>スタイルガイド | 株式会社START</title>
    <link rel="icon" href="./asset/img/favicon.png" type="image/png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./asset/css/base.css" />
    <link rel="stylesheet" href="./asset/css/module.css" />
    <link rel="stylesheet" href="./asset/css/style-guide.css" />
    <script src="./asset/js/main.js" defer></script>
  </head>
  <body>
    <?php require __DIR__ . '/asset/parts/header.php'; ?>

    <main class="style-guide">
      <header class="style-guide__hero">
        <h1>Style Guide</h1>
        <p class="style-guide__lead">CSSをブラウザ上で確認するための内部ページです。</p>
      </header>

      <div class="style-guide__inner container">
        <nav class="style-guide__index">
          <ul class="style-guide__index-list">
            <li><a href="#colors">カラー</a></li>
            <li><a href="#typography">テキスト</a></li>
            <li><a href="#responsive">レスポンシブ</a></li>
            <li><a href="#layout">レイアウト</a></li>
            <li><a href="#modules">共通パーツ</a></li>
            <li><a href="#page-title">下層ページタイトル</a></li>
          </ul>
        </nav>

        <section class="style-guide__section" id="colors">
          <h2 class="style-guide__section-title">カラー</h2>
          <ul class="style-guide__swatches">
            <li class="style-guide__swatch-item">
              <span class="style-guide__swatch style-guide__swatch--brand"></span>
              <strong>ブランドカラー</strong>
              <code>--color-brand: #DD1B57</code>
            </li>
            <li class="style-guide__swatch-item">
              <span class="style-guide__swatch style-guide__swatch--text"></span>
              <strong>基本文字</strong>
              <code>--color-text: #333333</code>
            </li>
            <li class="style-guide__swatch-item">
              <span class="style-guide__swatch style-guide__swatch--menu"></span>
              <strong>メニュー色</strong>
              <code>--color-menu: #151515</code>
            </li>
            <li class="style-guide__swatch-item">
              <span class="style-guide__swatch style-guide__swatch--background"></span>
              <strong>背景色</strong>
              <code>--color-background: #FFFFFF</code>
            </li>
          </ul>
        </section>

        <section class="style-guide__section" id="typography">
          <h2 class="style-guide__section-title">テキスト</h2>
          <p class="style-guide__note">ベースの文字設定に続き、H1・H2・H3・ナビの順に表示しています。767px以下ではSP設定へ切り替わります。H1の見本には、実ページと同じ共通クラスを付けたpタグを使用しています。</p>

          <div class="style-guide__specimen-list">
            <div class="style-guide__specimen">
              <span class="style-guide__label">ベース（日本語）</span>
              <p>仕事に最高のスタートを。株式会社STARTの基本テキストです。</p>
            </div>
            <div class="style-guide__specimen">
              <span class="style-guide__label">ベース（英語・数字）</span>
              <p lang="en">START CORPORATE SITE / 2030.02.10</p>
            </div>
            <div class="style-guide__specimen">
              <span class="style-guide__label">小文字</span>
              <small>補足説明やコピーライトに使用する14pxのテキストです。</small>
            </div>
            <div class="style-guide__specimen">
              <span class="style-guide__label">H1（ページタイトル）</span>
              <div class="style-guide__sample--inverse">
                <p class="page-hero__title">ページタイトル</p>
              </div>
            </div>
            <div class="style-guide__specimen">
              <span class="style-guide__label">H2</span>
              <h2>セクション見出し</h2>
            </div>
            <div class="style-guide__specimen">
              <span class="style-guide__label">H3</span>
              <h3>コンテンツ見出し</h3>
            </div>
            <div class="style-guide__specimen">
              <span class="style-guide__label"><span class="u-pc">ナビ</span><span class="u-sp">ハンバーガーメニュー</span></span>
              <div>
                <div class="u-pc"><a class="global-nav__link" href="#typography">ナビゲーション</a></div>
                <div class="u-sp style-guide__sample--inverse"><a class="mobile-menu__link" href="#typography">メニュー</a></div>
              </div>
            </div>
          </div>

          <div class="style-guide__table-wrap">
            <table class="style-guide__table">
              <thead>
                <tr>
                  <th>用途</th>
                  <th>PC</th>
                  <th>SP</th>
                  <th>カラー</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>H1（ページタイトル）</th>
                  <td>40px</td>
                  <td>28px</td>
                  <td>ホワイト</td>
                </tr>
                <tr>
                  <th>H2</th>
                  <td>40px</td>
                  <td>32px</td>
                  <td>ブランドカラー</td>
                </tr>
                <tr>
                  <th>H3</th>
                  <td>18px</td>
                  <td>16px</td>
                  <td>メニュー色</td>
                </tr>
                <tr>
                  <th>ナビ／ハンバーガーメニュー</th>
                  <td>16px</td>
                  <td>16px</td>
                  <td>メニュー色／ホワイト</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>

        <section class="style-guide__section" id="responsive">
          <h2 class="style-guide__section-title">レスポンシブ</h2>
          <div class="style-guide__viewport-state">
            <p class="u-pc"><strong>現在：PC表示</strong>（768px以上）</p>
            <p class="u-sp"><strong>現在：SP表示</strong>（767px以下）</p>
          </div>
          <p class="style-guide__note">ブラウザ幅を767pxと768pxの前後で変更し、見出し、ヘッダー、ニュース一覧の切り替わりを確認してください。</p>
        </section>

        <section class="style-guide__section" id="layout">
          <h2 class="style-guide__section-title">レイアウト</h2>
          <dl class="style-guide__definition-list">
            <div>
              <dt>最大コンテンツ幅</dt>
              <dd><code>1110px</code></dd>
            </div>
            <div>
              <dt>最小左右余白</dt>
              <dd><code>20px</code></dd>
            </div>
            <div>
              <dt>SP切り替え</dt>
              <dd><code>max-width: 767px</code></dd>
            </div>
          </dl>
          <div class="style-guide__container-demo">
            <span>.container の表示範囲</span>
          </div>
        </section>

        <section class="style-guide__section" id="modules">
          <h2 class="style-guide__section-title">共通パーツ</h2>
          <h3 class="style-guide__module-title">ニュース一覧</h3>
          <?php require __DIR__ . '/asset/parts/news-list.php'; ?>

          <h3 class="style-guide__module-title style-guide__module-title--cards">コンテンツカード</h3>
          <ul class="content-card-list">
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
        </section>
      </div>

      <section class="style-guide__page-title-demo" id="page-title">
        <div class="container">
          <h2 class="style-guide__section-title">下層ページタイトル</h2>
          <p class="style-guide__note">共通パーツ：ページタイトル（H1）＋背景画像。実際のページではH1を使用し、この表示例では同じクラスを付けたテキストで確認します。</p>
          <p class="style-guide__note">幅は画面幅100%、高さはPC：190px／SP：160px。背景画像はcover・中央配置、タイトルは上下左右中央です。767px以下でSPへ切り替わります。</p>
        </div>
        <div class="page-hero">
          <p class="page-hero__title">ページタイトル</p>
        </div>
      </section>
    </main>

    <?php require __DIR__ . '/asset/parts/footer.php'; ?>
  </body>
</html>
