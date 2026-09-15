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
        ├── news-list.php
        └── study.php
```

ページ数が3ページだけなので、各PHPファイルはプロジェクト直下に置く。ページごとのサブディレクトリは、明確な必要性が生じるまで追加しない。

## PHPと共通パーツ

- 共通化するのは、ヘッダー、フッター、ニュース一覧の3つ
- 共通パーツは `asset/parts/` に置く
- 各ページからは `require __DIR__ . '/asset/parts/ファイル名.php';` で読み込む
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
  - カスタムプロパティ（色、最大幅、左右余白）
  - リセット・ノーマライズ相当の基礎指定
  - body、リンク、画像、ボタンなどの基本スタイル
  - `.visually-hidden` など、サイト全体の基礎となるもの
- `module.css`
  - `.container`
  - ヘッダー、グローバルナビ、SPメニュー
  - フッター
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

## CSSの記述方針

- クラス名は現在のBEM風の命名に合わせる
- 色やコンテンツ幅は、可能な限り `:root` のカスタムプロパティを使用する
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
- jQueryは導入しない

## 現在確定している内容

- サービスカードは現在、リンクなしで表示する
- ニュース項目はリンクを想定したホバー表現を持つ
- ニュースのリンク先は未確定のため、現在は `href="#"` の仮リンク
- 人材紹介業の説明は、人材紹介サービスの内容にする
- トップページの大きな背景文字 `SERVICE` は、`.service-section__header::before` に配置する（セクション直下の疑似要素へ戻さない）
- Google Mapは後から実際の埋め込みと外部リンクに差し替える。正確なURLが届くまではプレースホルダーのままにする

## 作業時の確認

変更後は最低限、次を確認する。

1. `index.php`、`message.php`、`company.php` にPHPの構文エラーがないこと
2. ヘッダー、フッター、ニュース一覧のincludeが3ページすべてで動くこと
3. CSS、JavaScript、画像のパスが存在すること
4. 1440px前後のPC表示と375pxのSP表示を確認すること
5. 767pxと768pxの境界でレイアウトが破綻しないこと
6. SPメニューをボタン、背景クリック、Escキーで閉じられること
7. キーボード操作時にリンクとボタンのフォーカスが確認できること

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
- SP用CSSは独立ファイルではなく、各CSSの `@media (max-width: 767px)` 内にある。共通パーツは `module.css`、トップ固有の配置は `top.css`、共通変数は `base.css`。

### 再開時の未確認・未反映事項

- 最新の全体表示について、PC・SP・767/768px境界の一括検証は未実施。直近のoverflow修正後の文字の見切れ、SP背景文字の位置、メニュー操作もブラウザで確認する。コードの差分確認だけで表示検証済みとしない。
- SPのニュース見出しから日付まで、Figmaで23pxの間隔が示された。現在はニュース一覧の `margin-top: 14px` とリンクの上padding15pxがあり、ボックス間では29pxとなる。8pxへの変更案は説明のみで未反映。Figmaの測定対象と行高を確認してから調整する。
- PCでもニュース本文の位置には一覧の `margin-top: -8px` とリンクの上padding15pxが加わる。セクションの上padding60pxを、そのまま本文までの距離と解釈しない。
- Figmaの人材紹介業の説明文はPC・SPとも「Webサイト制作やリニューアルに対応できる、Web制作人材の紹介を行っています。」に統一済みと確認した。`index.php` には以前の「求職者と企業をつなぎ、理想の仕事探しを支援する人材紹介サービスを運営しています。」が残っており、最新文言は未反映。
- この時点の実装変更と引き継ぎメモは、ユーザーの依頼でまとめてローカルコミットする。pushは別途行う。
