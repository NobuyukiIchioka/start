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
