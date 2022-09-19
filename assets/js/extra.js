let header = document.querySelector(".catalog-header-block");
if (header) {
  let sticky = header.offsetTop;
  function catalogsticky() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }
  window.onscroll = function () {
    catalogsticky();
  };
}

let knowledgeReactionTittle = document.querySelector(
  ".betterdocs-article-reactions-heading h5",
);

if (knowledgeReactionTittle) {
  document.querySelector(".betterdocs-article-reactions-heading h5").innerHTML =
    "Does this article helpful?";
}

// Knowledge hub search
if (window.innerWidth > 768) {
  let dropMenu = document.querySelector(
    ".betterdocs-searchform-input-wrap input",
  );
  let searchArea = document.querySelector(".betterdocs-live-search");
  let resultArea = document.querySelector(".betterdocs-search-result-wrap");
  let navList = document.querySelector(".betterdocs-search-result-wrap");
  function toggleNav(e) {
    // called on click AND mouseleave
    const list = document.querySelectorAll(".betterdocs-search-result-wrap");
    if (list) {
      list.forEach((l) => {
        if (l.classList.contains("open") && e.type === "mouseleave") {
          l.classList.remove("open");
        } else {
          l.classList.add("open");
        }
      });
    }
  }

  dropMenu.addEventListener("click", () => {
    setTimeout(() => {
      toggleNav;
    }, 200);
  });
  searchArea.addEventListener("mouseover", toggleNav);
  searchArea.addEventListener("mouseleave", toggleNav);
  if (resultArea) {
    resultArea.addEventListener("mouseover", toggleNav);
    resultArea.addEventListener("mouseleave", toggleNav);
  }

  dropMenu.addEventListener("keydown", () => {
    setTimeout(() => {
      toggleNav;
    }, 500);
  });
}