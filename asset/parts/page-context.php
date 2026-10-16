<?php
// <title>で設定した文字列全体を、パンくずと現在ページの判定に使う。
$pageName = trim($pageTitle ?? '');

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
