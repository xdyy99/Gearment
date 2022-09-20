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
    "Was this article helpful?";
}

// Knowledge hub search
if (window.innerWidth > 768) {
  let dropMenu = document.querySelector(
    ".betterdocs-searchform-input-wrap input",
  );
  let searchArea = document.querySelector(".betterdocs-live-search");
  let resultArea = document.querySelector(".betterdocs-search-result-wrap");
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

  if (dropMenu) {
    dropMenu.addEventListener("click", () => {
      setTimeout(() => {
        toggleNav;
      }, 200);
    });
    dropMenu.addEventListener("keydown", () => {
      setTimeout(() => {
        toggleNav;
      }, 500);
    });
  }

  if (searchArea) {
    searchArea.addEventListener("mouseover", toggleNav);
    searchArea.addEventListener("mouseleave", toggleNav);
  }

  if (resultArea) {
    resultArea.addEventListener("mouseover", toggleNav);
    resultArea.addEventListener("mouseleave", toggleNav);
  }
}

//Hide option
let facetProducts = document.querySelectorAll(".piotnetgrid-facet__field-subgroup");
jQuery(".piotnetgrid-facet__field-sub-label--disabled").closest(".piotnetgrid-facet__field-sub").addClass("disable");
facetProducts.forEach((n) => {
  if (n.children.length == n.querySelectorAll(".disable").length) {
    n.classList.add("emptyFacet");
  }
});

// changing align plan name
let align_plan_name = document.querySelector(".align_plan_name");
let product_plan_name = document.querySelectorAll(".piotnetgrid-card .price-small b");
product_plan_name.forEach ((n) => {n.innerHTML = align_plan_name.innerHTML})

jQuery(".piotnetgrid-facet__field-subgroup.emptyFacet").closest(".piotnetgrid-facet--checkboxes").addClass("facetDisable");

jQuery(document).ajaxComplete(function () {
  jQuery(".piotnetgrid-facet__field-sub-label--disabled").closest(".piotnetgrid-facet__field-sub").addClass("disable");
  facetProducts = document.querySelectorAll(".piotnetgrid-facet__field-subgroup");
  facetProducts.forEach((n) => {
    if (n.children.length == n.querySelectorAll(".disable").length) {
      n.classList.add("emptyFacet");
    }
  });
  let checkingFacets = document.querySelectorAll('.piotnetgrid-facet--checkboxes'); 
  if (checkingFacets) {
    checkingFacets.forEach((facet) => {
      if (facet.classList.contains('facetDisable')) {
        facet.classList.remove('facetDisable');
      }
    })
  }
  jQuery(".piotnetgrid-facet__field-subgroup.emptyFacet").closest(".piotnetgrid-facet--checkboxes").addClass("facetDisable");

  align_plan_name = document.querySelector(".align_plan_name");
  product_plan_name = document.querySelectorAll(".piotnetgrid-card .price-small b");
  product_plan_name.forEach ((n) => {n.innerHTML = align_plan_name.innerHTML});
});

