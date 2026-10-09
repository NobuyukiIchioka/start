const menuOpenButton = document.querySelector("[data-menu-open]");
const menuCloseButton = document.querySelector("[data-menu-close]");
const menuLayer = document.querySelector("[data-menu-layer]");

if (menuOpenButton && menuCloseButton && menuLayer) {
  const openMenu = () => {
    document.body.classList.add("is-menu-open");
    menuLayer.classList.add("is-open");
    menuOpenButton.setAttribute("aria-expanded", "true");
    menuOpenButton.setAttribute("aria-label", "メニューを閉じる");
    menuCloseButton.focus();
  };

  const closeMenu = () => {
    document.body.classList.remove("is-menu-open");
    menuLayer.classList.remove("is-open");
    menuOpenButton.setAttribute("aria-expanded", "false");
    menuOpenButton.setAttribute("aria-label", "メニューを開く");
  };

  menuOpenButton.addEventListener("click", openMenu);
  menuCloseButton.addEventListener("click", () => {
    closeMenu();
    menuOpenButton.focus();
  });

  menuLayer.addEventListener("click", (event) => {
    if (event.target === menuLayer) {
      closeMenu();
      menuOpenButton.focus();
    }
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape" && menuLayer.classList.contains("is-open")) {
      closeMenu();
      menuOpenButton.focus();
    }
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 767 && menuLayer.classList.contains("is-open")) {
      closeMenu();
    }
  });
}

document.querySelectorAll(".js-placeholder-link").forEach((link) => {
  link.addEventListener("click", (event) => {
    event.preventDefault();
  });
});

// ページ先頭へ戻るボタン：170pxを超えたら表示し、リングにスクロール進捗を反映する。
(() => {
  const pageTopButton = document.querySelector(".pagetop");
  if (!pageTopButton) return;

  const progressBar = pageTopButton.querySelector(".pagetop__bar");
  if (!progressBar) return;

  const circumference = 182.21;
  const showAfter = 170;
  const topLink = document.querySelector(".site-logo");

  const updatePageTop = () => {
    const scrollY = window.scrollY;
    const maxScroll = document.documentElement.scrollHeight - window.innerHeight;
    const progress = maxScroll > 0 ? Math.max(0, Math.min(1, scrollY / maxScroll)) : 0;
    const isVisible = scrollY > showAfter;

    progressBar.style.strokeDashoffset = circumference * (1 - progress);
    // キーボード操作の位置を、非表示になるボタンに残さない。
    if (!isVisible && document.activeElement === pageTopButton && topLink) {
      topLink.focus({ preventScroll: true });
    }
    pageTopButton.classList.toggle("is-visible", isVisible);
    pageTopButton.tabIndex = isVisible ? 0 : -1;
    pageTopButton.setAttribute("aria-hidden", String(!isVisible));
  };

  window.addEventListener("scroll", updatePageTop, { passive: true });
  window.addEventListener("resize", updatePageTop);
  window.addEventListener("load", updatePageTop);
  window.addEventListener("pageshow", updatePageTop);
  updatePageTop();

  pageTopButton.addEventListener("click", () => {
    const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    window.scrollTo({ top: 0, behavior: reduceMotion ? "auto" : "smooth" });
  });
})();
