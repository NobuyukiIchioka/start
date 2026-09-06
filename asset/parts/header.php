<?php
$currentPage = $currentPage ?? '';
?>
<header class="site-header">
  <div class="site-header__inner">
    <a class="site-logo" href="./index.php">
      <picture>
        <source media="(max-width: 767px)" srcset="./asset/img/logo-sp.png" />
        <img class="site-logo__image" src="./asset/img/logo-pc.png" alt="START" width="334" height="66" />
      </picture>
    </a>

    <nav class="global-nav">
      <ul class="global-nav__list">
        <li><a class="global-nav__link" href="./index.php"<?= $currentPage === 'home' ? ' aria-current="page"' : '' ?>>ホーム</a></li>
        <li><a class="global-nav__link" href="./message.php"<?= $currentPage === 'message' ? ' aria-current="page"' : '' ?>>メッセージ</a></li>
        <li><a class="global-nav__link" href="./company.php"<?= $currentPage === 'company' ? ' aria-current="page"' : '' ?>>会社概要</a></li>
      </ul>
    </nav>

    <button class="menu-button" type="button" aria-controls="mobile-menu" aria-expanded="false" aria-label="メニューを開く" data-menu-open>
      <span class="menu-button__line"></span>
      <span class="menu-button__line"></span>
      <span class="menu-button__line"></span>
    </button>
  </div>
</header>

<div class="mobile-menu-layer" data-menu-layer>
  <nav class="mobile-menu" id="mobile-menu">
    <button class="mobile-menu__close" type="button" aria-label="メニューを閉じる" data-menu-close></button>
    <ul class="mobile-menu__list">
      <li><a class="mobile-menu__link" href="./index.php"<?= $currentPage === 'home' ? ' aria-current="page"' : '' ?>>ホーム</a></li>
      <li><a class="mobile-menu__link" href="./message.php"<?= $currentPage === 'message' ? ' aria-current="page"' : '' ?>>メッセージ</a></li>
      <li><a class="mobile-menu__link" href="./company.php"<?= $currentPage === 'company' ? ' aria-current="page"' : '' ?>>会社概要</a></li>
    </ul>
  </nav>
</div>
