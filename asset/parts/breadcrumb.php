<?php
// 各ページの $breadcrumbs を順番に表示し、最後の項目を現在のページとして扱う。
?>
<nav class="breadcrumb" aria-label="パンくずリスト">
  <ol class="breadcrumb__list">
    <?php foreach ($breadcrumbs as $breadcrumbIndex => $breadcrumb): ?>
      <?php if ($breadcrumbIndex === count($breadcrumbs) - 1): ?>
        <li class="breadcrumb__item breadcrumb__item--current" aria-current="page"><?= htmlspecialchars($breadcrumb['label'], ENT_QUOTES, 'UTF-8') ?></li>
      <?php else: ?>
        <li class="breadcrumb__item">
          <a class="breadcrumb__link" href="./index.php"><?= htmlspecialchars($breadcrumb['label'], ENT_QUOTES, 'UTF-8') ?></a>
          <svg class="breadcrumb__sep" viewBox="0 0 8 8" aria-hidden="true">
            <path d="M2.5 1l3 3-3 3" />
          </svg>
        </li>
      <?php endif; ?>
    <?php endforeach; ?>
  </ol>
</nav>
