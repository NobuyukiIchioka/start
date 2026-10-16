<?php
// 表示中のページファイルから、通常のHTMLで書かれた <title> の内容を読む。
$pageFile = $_SERVER['SCRIPT_FILENAME'] ?? '';
$pageSource = is_file($pageFile) ? file_get_contents($pageFile) : '';
// コメントアウトされたタイトルの見本などは取得対象にしない。
$pageSource = preg_replace('/<!--.*?-->/s', '', $pageSource ?: '');
$pageTitle = '';
if (preg_match('/<title\b[^>]*>(.*?)<\/title>/is', $pageSource, $pageTitleMatch)) {
  $pageTitle = html_entity_decode($pageTitleMatch[1], ENT_QUOTES | ENT_HTML5, 'UTF-8');
}
$pageName = trim($pageTitle);

// タイトルとヘッダーのナビ項目の対応は、ここでまとめて管理する。
$navigationPages = [
  '株式会社START｜Web制作の人材紹介・スクール・メディア運営' => 'home',
  '株式会社START' => 'home',
  'ホーム' => 'home',
  'メッセージ' => 'message',
  '代表メッセージ' => 'message',
  '会社概要' => 'company',
];
$currentPage = $navigationPages[$pageName] ?? '';
