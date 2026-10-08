# START コーポレートサイト 制作ルール

このファイルは、別のPCや新しいCodexタスクで作業を再開するときに、実装方針を共有するためのものです。作業を始める前に、このファイルと対象コードを確認してください。

## プロジェクト概要

- 株式会社STARTの学習用コーポレートサイト
- Figmaデザインを基準に、PC・SPのレスポンシブサイトを制作する
- 対象ページは次の3ページ
  - `index.php`：ホーム
  - `message.php`：メッセージ
  - `company.php`：会社概要
- 内部確認用として `style-guide.php` を置き、共通スタイルをブラウザで確認する
- 実装にはPHP、HTML、CSS、JavaScriptを使用する
- CSSフレームワークやJavaScriptライブラリは使用しない
- JavaScriptはVanilla JavaScriptで記述する

## デザイン資料

- Figma：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level%E2%91%A1%EF%BC%BFstart?node-id=0-1&p=f&t=wID3rEC54gIZqOsH-0>
- 書き出した完成見本は `asset/img/design/` に保存している
- PCデザインは主に1440px幅、SPデザインは375px幅を基準とする
- 数値や見た目を調整するときは、Figmaと完成見本の両方を確認する

## ディレクトリ構成

```text
start/
├── AGENTS.md
├── index.php
├── message.php
├── company.php
├── style-guide.php
└── asset/
    ├── css/
    │   ├── base.css
    │   ├── module.css
    │   ├── top.css
    │   ├── message.css
    │   ├── company.css
    │   └── style-guide.css
    ├── img/
    │   └── design/
    ├── js/
    │   └── main.js
    └── parts/
        ├── header.php
        ├── footer.php
        ├── pagetop.php
        ├── news-list.php
        └── study.php
```

ページ数が3ページだけなので、各PHPファイルはプロジェクト直下に置く。ページごとのサブディレクトリは、明確な必要性が生じるまで追加しない。

## PHPと共通パーツ

- PHPの共通パーツは、ヘッダー、フッター、ニュース一覧、ページTOPボタン。ページTOPボタンは2026-10-08の追加依頼で設置した
- 共通パーツは `asset/parts/` に置く
- 各ページからは `require __DIR__ . '/asset/parts/ファイル名.php';` で読み込む
- `pagetop.php` は `footer.php` の末尾から `require __DIR__ . '/pagetop.php';` で読み込む。各ページから重複して読み込まない
- `head` 要素は共通化せず、各ページに記述する
- ページ冒頭で `$currentPage` を設定してからヘッダーを読み込む

```php
<?php
$currentPage = 'home';
?>
```

使用する値は `home`、`message`、`company`。ヘッダーでは、この値に対応するリンクだけに `aria-current="page"` を付け、現在ページをブランドカラーで表示する。

### 学習用ファイル

- `asset/parts/study.php` は、PHPのinclude方法などを比較・検証するためにユーザーが自由に編集する学習用ファイル
- 本番サイトの共通パーツではないため、明示的な依頼がない限り、ページからincludeしない
- 明示的な依頼がない限り、Codexの変更・リファクタリング・動作確認の対象に含めない

## CSSの役割

- `base.css`
  - 他サイトでも再利用する汎用的な土台（START固有のスタイルガイドは置かない）
  - ファイル内は「1. リセット・初期設定」「2. グリッド」「3. Flex」「4. ユーティリティ」の4区分にする
  - リンク・画像・ボタンの汎用的な初期化は、リセットと同じ区分にまとめる。「base」という曖昧な独立区分は設けない
  - `--grid-gutter-x` は汎用グリッド自身が使う初期値のため、グリッドの区分に置く
  - `.visually-hidden` は読み上げ用テキストの補助クラスとしてユーティリティに置く
  - 既存の汎用Grid・Flex・ユーティリティは維持し、整理だけを目的として数値や挙動を変更しない
- `module.css`
  - START共通のスタイルガイド：色・フォント・文字サイズ・字間・行高の変数
  - コンテンツ最大幅・左右余白などのサイト共通設定
  - remの基準、body、H1〜H3、英数字、小文字などのサイト共通スタイル
  - 上記変数のSP切り替え、メニュー表示中のスクロール制御
  - `.container`
  - ヘッダー、グローバルナビ、SPメニュー
  - フッター
  - パンくずリスト、ページTOPボタン
  - 下層ページの共通ヒーロー
  - 共通ニュース一覧、コンテンツカード
- `top.css`
  - トップページ専用のメインビジュアル、ニュース配置、サービスセクション
- `message.css`
  - メッセージページ専用の本文、代表写真、会議室画像
- `company.css`
  - 会社概要表、地図、会社概要ページ内のニュース配置
- `style-guide.css`
  - 内部確認用スタイルガイドページだけの表示調整

共通スタイルをページCSSへ重複させない。反対に、1ページでしか使わないスタイルを `base.css` や `module.css` へ移さない。

読み込み順は `base.css → module.css → 各ページのCSS`。スタイルガイドの値を変更するときは `module.css` を編集する。

## CSSの記述方針

- クラス名は現在のBEM風の命名に合わせる
- 色やコンテンツ幅は、可能な限り `:root` のカスタムプロパティを使用する
- パーツ内だけで使う寸法は、そのパーツのクラスに直接記述する。ヘッダー高は固定ヘッダー・本文の上余白・スクロール位置で共用するため、`module.css` の `--site-header-height` でPC 90px、SP 60pxを管理する。全ページで共通のパーツでも、その専用寸法をすべて `:root` に置く必要はない
- 共通テキストの変数と確認ページの見本・一覧は、最新スタイルガイドの用途順（H1〔ページタイトル〕・H2・H3・ナビ）に揃える。各用途内の変数は文字サイズ・字間・行高の順にする。SPではPCと異なる値だけを上書きし、ナビはハンバーガーメニューの見本に切り替える
- コンテンツ幅の共通管理には `.container` を使用する
- 画像は原則として縦横比を維持する。意図的なトリミングが必要な箇所だけ `object-fit: cover` や背景画像を使う
- レイアウトのためだけに不要なHTML要素を増やさない
- 学習用サイトなので、過度な抽象化や複雑な仕組みを避け、読みやすさを優先する
- 既存のユーザー変更を尊重し、依頼と無関係な箇所をまとめて書き換えない

## レスポンシブ方針

- SPへの切り替えは `@media (max-width: 767px)`
- 768px以上をPCレイアウトとして扱う
- SPは375pxのデザインを基準にするが、320px以上で横スクロールが発生しないようにする
- PC・SPで画像が異なる場合は、HTMLでは原則として `picture` と `source` を使用する
- 背景画像として実装する必要がある場合は、メディアクエリ内で画像を切り替える

## 画像とパス

- 実装用画像は `asset/img/` に置く
- デザイン確認用のページ全体画像は `asset/img/design/` に置く
- PHP／HTMLから画像を読む場合：`./asset/img/画像名`
- CSSから画像を読む場合：`../img/画像名`
- 現在は3つのPHPページが同じ階層にあることを前提とした相対パスを使用している
- ファイルやフォルダを移動した場合は、PHP、CSS、画像、JavaScript、includeの全パスを確認する
- ファイル名の大文字・小文字はサーバーで区別される可能性があるため、実ファイル名と完全に一致させる

## HTMLとアクセシビリティ

- 見出しレベルは文書構造に合わせる
- 背景画像で表現したページ見出しには、必要に応じて `.visually-hidden` の見出しを置く
- 内容を伝える画像には適切な `alt` を付ける
- 装飾だけの画像には `alt=""` を使用する
- 現在ページのナビゲーションリンクには `aria-current="page"` を付ける
- ハンバーガーメニューの開閉状態は `aria-expanded` と表示状態を同期する
- 意味のないARIA属性は増やさず、まず適切なHTML要素を使用する

## JavaScript

- JavaScriptは `asset/js/main.js` にまとめる
- SPメニューは右からスライド表示する
- メニューは開くボタン、閉じるボタン、メニュー外のクリック、Escキーで閉じられるようにする
- メニュー表示中はbodyのスクロールを止める
- 768px以上へリサイズした場合は、開いているSPメニューを閉じる
- リンク先が未確定の `href="#"` には `.js-placeholder-link` を付け、現時点ではページ先頭へ移動しないようにする
- ページTOPボタンは400pxを超えてスクロールしたときに表示し、円形リングで進捗を示す。動きを減らす設定ではアニメーションせず先頭へ戻す（詳細は2026-10-08のメモ）
- jQueryは導入しない

## 現在確定している内容

- サービスカードは現在、リンクなしで表示する
- サービスカードのHTMLは、スタイルガイドと同じ `content-card`・`content-card__icon`・`content-card__icon-image`・`content-card__title`・`content-card__text` を使用する。一覧は `content-card-list`（module.cssの列数・カード間隔）と `service-list`（top.cssの上余白）を併用する。CSSを旧 `service-card` 名へ戻したり、カード内に仮リンクを追加したりしない
- 下層ページタイトルは共通モジュール `.page-hero` と `.page-hero__title` を使用し、実ページの見出しは表示するH1にする。画面幅100%、PCは高さ190px、767px以下は160px、背景画像は `cover`・中央配置、見出しは上下左右中央。トップのメインビジュアルとは画像ルールを分ける。
- 下層ページ共通の背景は文字なしの `mv-bg-pc.png`／`mv-bg-sp.png` を使用し、完成見本画像は実装に使用しない。共通形状・タイトル指定と書体・文字サイズの変数は、いずれも `module.css` で管理する。
- ニュース項目はリンクを想定したホバー表現を持つ
- ニュースのリンク先は未確定のため、現在は `href="#"` の仮リンク
- 人材紹介業の説明は、人材紹介サービスの内容にする
- トップページの大きな背景文字 `SERVICE` は、`.service-section__header::before` に配置する（セクション直下の疑似要素へ戻さない）
- Google Mapはユーザー指定URLのiframeで表示する。`company.css` の `.company-map__iframe` で幅100%、高さPC 400px／SP 300pxを指定する。SPの高さ・周囲の余白は2026-10-08にFigmaに合わせて調整済み。外部リンクもユーザー指定URLを使用する

## 作業時の確認

変更後は最低限、次を確認する。

1. `index.php`、`message.php`、`company.php` にPHPの構文エラーがないこと
2. 各ページで使用しているヘッダー、フッター、ニュース一覧のincludeが動き、ページTOPボタンがフッター経由で1つだけ出力されること
3. CSS、JavaScript、画像のパスが存在すること
4. 1440px前後のPC表示と375pxのSP表示を確認すること
5. 767pxと768pxの境界でレイアウトが破綻しないこと
6. SPメニューをボタン、背景クリック、Escキーで閉じられること
7. キーボード操作時にリンクとボタンのフォーカスが確認できること
8. 固定ヘッダーで本文が隠れないこと、下層ページのパンくずが正しいこと、400pxを超えたときのTOPボタン表示・進捗リング・先頭へ戻る動作を確認すること

PHPのincludeはHTMLファイルの直接表示では動作しない。MAMPなどのWebサーバー、またはPHPのローカルサーバーを使用して確認する。

## 作業開始時の手順

1. この `AGENTS.md` を読む
2. 対象ページと関連するCSS・共通パーツを読む
3. 現在のファイル構成とGitの変更状態を確認する
4. デザイン資料と既存実装を照合する
5. 依頼範囲だけを変更し、PC・SPの両方を確認する

## 引き継ぎメモ（2026-09-12）

### Figmaの参照先と優先するルール

- PCトップ：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=28-245>
- SPトップ：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=28-153>
- スタイルガイド：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=44-187>
- 実装前にページのデザインだけでなく、Figmaのスタイルガイドも確認する。ローカルの `style-guide.php` は内部確認用であり、Figma側のルールの代わりにはしない。
- Figmaの画像ルールは `width: 100%; height: auto;`（元画像の比率保持）。メインビジュアルはPC・SPとも画面幅100%、左右余白なし。固定高さや `cover` によるトリミングへ戻さない。
- 保存済みの完成見本画像はFigma更新前の可能性がある。ユーザーの最新指示と更新済みFigmaを優先し、数値を推測で確定しない。

### 現在の実装

- `index.php` のメイン見出しは `h1.top-hero__title` 内に `span.top-hero__copy` を置く構造。コピーには `display: block` と上余白10pxを指定し、STARTの下へ改行する。ユーザーが表示確認済み。
- メインビジュアルは背景画像の実装を維持し、`width: 100%`、`height: auto`、`background-size: 100% auto` と `aspect-ratio` を使用。元画像はPCが1440×600px、SPが375×460px。画像を差し替える場合は比率も確認する。
- PCグローバルナビの間隔は `module.css` の `.global-nav__list` で30px。文字はNoto Sans JP、16px、太さ700、行高16px、字間0.8px。通常色は #151515、現在ページ・ホバー時は #DD1B57。
- PCの `.news-section` は `padding: 60px 0 90px`、`.service-section` は `padding: 0 0 100px`。ニュース下とサービス上に余白を重複させない。
- 背景文字用に `.service-section__header` を追加し、`position: relative` を指定。`::before` はPCで `top: -53px`、`right: -15px`、文字サイズ16.8rem。
- 背景文字の `z-index: -1` と、親 `.service-section__inner` の `position: relative; z-index: 1` を組み合わせて見出し・カードの背面に置いている。
- `.service-section` は `overflow-x: clip; overflow-y: visible`。上にはみ出す背景文字を表示し、左右のはみ出しだけ切る。`overflow: hidden` へ戻すと文字上部が切れる。
- SPも `.service-section__header::before` に指定を統一済み。現在値は `top: 13px`、`right: -29px`、文字サイズ72px。旧配置を新しい基準へ換算した値であり、Figmaとの最終一致は未確認。
- SP用CSSは独立ファイルではなく、各CSSの `@media (max-width: 767px)` 内にある。STARTの共通パーツ・共通変数は `module.css`、トップ固有の配置は `top.css`。`base.css` には汎用グリッド等の切り替えだけを残す。

### 2026-09-12時点の未確認・未反映事項

以下は当時の記録。再開時は最新コードと後述の引き継ぎメモを確認し、未反映と決めつけて変更しない。

- 最新の全体表示について、PC・SP・767/768px境界の一括検証は未実施。直近のoverflow修正後の文字の見切れ、SP背景文字の位置、メニュー操作もブラウザで確認する。コードの差分確認だけで表示検証済みとしない。
- SPのニュース見出しから日付まで、Figmaで23pxの間隔が示された。現在はニュース一覧の `margin-top: 14px` とリンクの上padding15pxがあり、ボックス間では29pxとなる。8pxへの変更案は説明のみで未反映。Figmaの測定対象と行高を確認してから調整する。
- PCでもニュース本文の位置には一覧の `margin-top: -8px` とリンクの上padding15pxが加わる。セクションの上padding60pxを、そのまま本文までの距離と解釈しない。
- Figmaの人材紹介業の説明文はPC・SPとも「Webサイト制作やリニューアルに対応できる、Web制作人材の紹介を行っています。」に統一済みと確認した。`index.php` には以前の「求職者と企業をつなぎ、理想の仕事探しを支援する人材紹介サービスを運営しています。」が残っており、最新文言は未反映。
- 当時はユーザーからローカルコミットの依頼があった。以降の作業を自動でコミット・pushする指示ではない。

### 2026-10-07のトップ表示修正

- `index.php` に古い `service-card` 名が戻っており、共通CSSの `content-card` と不一致だったため、スタイルガイドと同じクラスへ統一した。
- 抜けていた `top-hero__content`・表示するH1とコピー、`service-section__header`（背景英字の配置基準）を復元した。CSS・JavaScriptのURLも `./asset/` に揃え、`/start/` 配下でも読み込めるようにした。
- 上記の人材紹介業の最新文言は、トップと確認用スタイルガイドの両方へ反映済み。

## 引き継ぎメモ（2026-10-06）

### メッセージページ

- Figma PC：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=28-233>
- Figma SP：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=28-109>
- 本文上部のタイトルは、ユーザー指定により `message-title.png` をH2内に配置する。2倍書き出し1700×240pxを最大850px幅で表示し、狭い画面では縮小する。画像内の余白を独断で切り取らない。
- 画像を使わないテキスト版H2は `message.php` にコメントアウトして残す。そのための `.message-intro__title` のCSSは有効なまま維持する。色・太さ等は共通H2を使い、ページ固有の行高とSP文字サイズだけを指定する。
- 代表名は「鈴木 博之」。本文の『スタート』『ゴール』『Webの学校』はリンクにしない。
- PCは代表写真130px＋本文の2列で、列間60px・ブロック最大幅960px。SPは写真100pxを中央に置き、その下に本文を配置する。本文を写真に回り込ませない。SPでは写真下の肩書き・氏名を非表示にする。
- 次の余白は `asset/css/message.css` で管理する。文字の見た目ではなく要素のボックス間の設定値。

| 対象 | PC | SP（767px以下） |
| --- | --- | --- |
| タイトル → リード文 | 20px | 15px |
| リード文 → 写真・本文ブロック | 40px（写真自身に上余白10px） | 30px |
| 写真・本文ブロック → 会議室写真 | 80px | 50px |
| 会議室写真 → フッター | 100px | 60px |

- SPの写真 → 本文は15px。リード文 → 写真の30pxはユーザーが修正・確認した値なので、以前の26pxへ戻さない。
- 会議室写真はPCでは元画像比率を維持する。SPでは高さ260px・`object-fit: cover`・中央配置でトリミングする例外がある。

### 会社概要ページ

- Figma PC：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=28-201>
- `company.php` のHTMLを更新済み。会社情報は `dl`・`dt`・`dd`、設立日は `time datetime="2025-02-10"`、代表取締役は「鈴木 博之」。旧完成見本の代表名へ戻さない。
- 共通の下層ページヒーロー、ヘッダー、フッター、ニュース一覧を再利用する。
- 2026-10-07更新：Google Mapはユーザーから届いた埋め込みURLのiframeに差し替え済み。外部リンクは最新の `company.php` と2026-10-08のメモを参照する。会社情報の住所は変更せず、架空住所から地図を推測しない。
- この時点ではHTMLの更新まで。SPの文字の太さ・余白等は2026-10-08に調整済み（下記参照）。

### 検証状況

- 直近の会社概要更新では、PHP構文・include・画像等のパス、320/375/767/768/1440pxの横はみ出し、SPメニュー操作・フォーカスを確認済み。
- 自動ブラウザ確認は外部フォント通信を遮断した環境で実施したため、Google Fontsを読み込んだ状態の厳密な文字幅・Figmaとの見た目の最終一致までは保証しない。機能確認済みとデザイン完全一致を区別する。

## 引き継ぎメモ（2026-10-08）

### 会社概要SPの調整

- Figma SP：<https://www.figma.com/design/UQfRtyd460dqJuzbAqwq2g/level-start?node-id=28-76>
- `company.css` の767px以下を調整。`.company-main` は `padding: 40px 0 60px`、会社情報の列幅は `100px minmax(0, 1fr)`、行の余白は `20px 0 19px`（下線1pxを含めて下側20px）。
- 項目名・値は14px／行高1.5、値は太さ500、日付は本文の書体を継承。代表者名は `company-profile__description--representative` を追加し、15px／字間0.05em／行高1.15にする。
- 地図の上余白は50px、高さは300px。地図下リンクは上余白15px、12px／太さ500／行高1.15。ニュースの上余白は35px。
- 地図の埋め込みURL・会社情報は維持。現行の外部リンクは `https://maps.app.goo.gl/vV1KGQYYVsNSkFka7`。過去メモの別URLへ戻さない。

### 固定ヘッダーとパンくず

- `.site-header` は `position: fixed; top: 0; left: 0; width: 100%; z-index: 20`。高さは `--site-header-height`（PC 90px／SP 60px）を使用する。
- `body` の `padding-top` に同じ変数を指定し、固定ヘッダーが本文に重ならないようにする。`html` の `scroll-padding-top` はヘッダー高＋20px。
- `message.php` と `company.php` のヒーロー直後にパンくずを追加。ホームへのリンクと現在ページ名を表示し、現在ページに `aria-current="page"` を付ける。ホームページには置かない。
- パンくずのHTMLは各ページ、CSSは `module.css` の `.breadcrumb` 系。上下padding14px、文字12px、行高1.6、項目間隔10px。

### ページTOPボタン

- 当初の「右下の追従バナー」は、ユーザー提供のスクロール進捗付きTOPボタンとして実装済み。素材待ちの非表示状態ではない。準備用の `follow-banner.php` と `.follow-banner` のCSSは削除済み。
- HTMLは `asset/parts/pagetop.php`、CSSは `asset/css/module.css` の `.pagetop` 系、JavaScriptは `asset/js/main.js` の末尾。フッターを使う全ページに表示する。
- PC・SPとも60×60pxの円形、画面の右・下から24px。`z-index: 30` で固定ヘッダー（20）より上、SPメニュー（100）より下に配置する。
- 表示条件は `scrollY > 400`。ちょうど400pxでは非表示。調整箇所は `main.js` の `showAfter`。非表示時は `tabindex="-1"` と `aria-hidden="true"` に同期する。
- リングはSVGの半径29に対応する周長 `182.21` を使用し、ページ全体のスクロール進捗で `stroke-dashoffset` を変える。最下部でリングが一周する。スクロールできないページでは非表示。
- クリック・Enterで先頭へ戻る。通常は滑らかにスクロールし、`prefers-reduced-motion: reduce` の場合は即時移動する。CSS側も `html` のsmooth指定とボタンのtransitionを無効にする。
- キーボード操作中にTOPボタンが非表示になる場合は、ヘッダーのロゴへフォーカスを戻す。ボタンのないページでもJavaScriptのエラーが出ないよう要素の存在を確認している。

### CSS・JavaScriptのキャッシュ対策

- 「ページ下部でもTOPボタンが出ない」という報告を受け、同じMAMPの `http://localhost/index.php` を新しく開いて表示・動作を確認した。古いキャッシュの可能性はあるが、ユーザーが開いていたタブの原因を断定したものではない。
- `index.php`、`message.php`、`company.php`、`style-guide.php` で、`module.css` と `main.js` のURLに `?v=<?= filemtime(__DIR__ . '/asset/...') ?>` の形で各ファイルの更新日時を付けた。ファイルを更新するとURLが変わり、古いキャッシュが使われ続けるのを防ぐ。
- 相対パスと読み込み順は維持。変更が反映されない場合はページを再読み込みし、必要に応じて `Ctrl + F5` で確認する。

### 検証と引き継ぎ

- 会社概要SP・固定ヘッダー・パンくず追加時は、320/375/767/768/1440pxで横はみ出し、ヘッダー固定、SPメニューの操作を確認した。会社概要の初期検証は外部フォント・地図通信を除いた環境であり、Figmaとの完全一致を保証する記録ではない。
- TOPボタン実装時は、400pxと401pxの表示切り替え、進捗リング、クリック・Enter、動きを減らす設定、SPメニューとの重なりを確認した。
- キャッシュ対策後は、実際のMAMP配信ページで更新日時付きURLへの切り替え、PC・375px幅のボタン表示、クリックで先頭へ戻る動作を確認した。対象4ページのPHP構文エラーもない。
- ユーザーの最終表示確認は別途必要。今回の変更は、この時点ではコミット・pushしていない。
