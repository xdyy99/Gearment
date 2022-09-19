export default function menu() {
  // Check for dropdown
  let dropdown = document.querySelectorAll('#mega-menu-primary-menu .mega-menu-item-has-children > a');
  dropdown.forEach((el) => {
    let subBtnHtml = document.createElement('i');
    subBtnHtml.setAttribute('class', 'mega-sub-menu-btn fas fa-caret-down subBtn');
    el.parentNode.appendChild(subBtnHtml);
  });

  function expandSection(element) {
    // get the height of the element's inner content, regardless of its actual size
    var sectionHeight = element.scrollHeight;

    // temporarily disable all css transitions
    var elementTransition = element.style.transition;
    element.style.transition = '';

    // on the next frame (as soon as the previous style change has taken effect),
    // explicitly set the element's height to its current pixel height, so we
    // aren't transitioning out of 'auto'
    requestAnimationFrame(function () {
      element.style.maxHeight = 0 + 'px';
      element.style.transition = elementTransition;

      // on the next frame (as soon as the previous style change has taken effect),
      // have the element transition to height: 0
      requestAnimationFrame(function () {
        element.style.maxHeight = sectionHeight + 'px';
      });
    });
    // when the next css transition finishes (which should be the one we just triggered)
    element.addEventListener('transitionend', function end(e) {
      // remove this event listener so it only gets triggered once
      element.removeEventListener('transitionend', end);

      // remove "height" from the element's inline styles, so it can return to its initial value
      element.style.maxHeight = `none`;
    });
  }

  function collapseSection(element) {
    // get the height of the element's inner content, regardless of its actual size
    var sectionHeight = element.scrollHeight;

    // temporarily disable all css transitions
    var elementTransition = element.style.transition;
    element.style.transition = '';

    // on the next frame (as soon as the previous style change has taken effect),
    // explicitly set the element's height to its current pixel height, so we
    // aren't transitioning out of 'auto'
    requestAnimationFrame(function () {
      element.style.maxHeight = sectionHeight + 'px';
      element.style.transition = elementTransition;

      // on the next frame (as soon as the previous style change has taken effect),
      // have the element transition to height: 0
      requestAnimationFrame(function () {
        element.style.maxHeight = 0 + 'px';
      });
    });
    element.addEventListener('transitionend', function end(e) {
      // remove this event listener so it only gets triggered once
      element.removeEventListener('transitionend', end);

      // remove "height" from the element's inline styles, so it can return to its initial value
      element.style.maxHeight = 0 + 'px';
    });
  }
  // Submenu control //
  var subBtn = document.querySelectorAll('#mega-menu-primary-menu .subBtn');
  for (let i = 0; i < subBtn.length; i++) {
    subBtn[i].addEventListener('click', () => {
      if (subBtn[i].parentNode.classList.contains('show')) {
        subBtn[i].parentNode.classList.remove('show');
        collapseSection(subBtn[i].previousElementSibling);
      } else {
        subBtn[i].parentNode.classList.add('show');
        expandSection(subBtn[i].previousElementSibling);
      }
    });
  }

  // Submenu overflow //
  function checkSubmenuPosition() {
    let header = document.querySelector('.hdJS');
    let subMenu = document.querySelectorAll('.mega-sub-menu');
    subMenu.forEach((el) => {
      let subPos = el.getBoundingClientRect().left + el.offsetWidth;
      if (subPos > header.offsetWidth && window.innerWidth > 1200) {
        el.classList.add('sub-over');
      } else {
        el.classList.remove('sub-over');
      }
    });
  }
  checkSubmenuPosition();

  // Menu resize mobile //
  let header = document.querySelector('.hdJS');
  // Screen height  //
  let _vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${_vh}px`);
  // Menu height update //
  setTimeout(() => {
    document.documentElement.style.setProperty('--headH', `${header.offsetHeight}px`);
  }, 200);

  window.addEventListener('resize', () => {
    // Screen height  //
    _vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${_vh}px`);
    // Menu height update //
    setTimeout(() => {
      document.documentElement.style.setProperty('--headH', `${header.offsetHeight}px`);
    }, 200);
    // Submenu resize overflow //
    checkSubmenuPosition();
  });

  // Menu resize scroll and header hidden //
  let scrollPos = 0;
  window.addEventListener('scroll', () => {
    window.scrollY > 0 ? header.classList.add('small') : header.classList.remove('small');

    window.scrollY > scrollPos ? header.classList.remove('show') : header.classList.add('show');

    scrollPos = window.scrollY;
  });

  // Menu control mobile //
  let menuBtn = document.querySelector('.menuBtn');
  let menu = document.querySelector('.menuBoard');
  let menuBg = document.querySelector('.menuBg');
  if (menu) {
    menuBtn.addEventListener('click', menuAct);
    menuBg.addEventListener('click', menuAct);
    function menuAct() {
      menuBtn.classList.toggle('active');
      menu.classList.toggle('active');
      document.querySelector('body').classList.toggle('no-scroll');
    }
    document.addEventListener('click', function (e) {
      let mCheck = e.target.closest('.menuBoard');
      let bCheck = e.target.closest('.menuBtn');
      if (mCheck == null && bCheck == null) {
        menuBtn.classList.remove('active');
        menu.classList.remove('active');
        document.querySelector('body').classList.remove('no-scroll');
      }
    });
  }
}
