<?php require_once __DIR__ . '/page-context.php'; ?>
<nav class="breadcrumb" aria-label="パンくずリスト">
  <ol class="breadcrumb__list">
    <li class="breadcrumb__item">
      <a class="breadcrumb__link" href="./index.php">ホーム</a>
      <svg class="breadcrumb__sep" viewBox="0 0 8 8" aria-hidden="true">
        <path d="M2.5 1l3 3-3 3" />
      </svg>
    </li>
    <li class="breadcrumb__item breadcrumb__item--current" aria-current="page"><?= htmlspecialchars($pageName, ENT_QUOTES, 'UTF-8') ?></li>
  </ol>
</nav>
