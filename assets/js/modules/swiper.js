export default function swiper() {
  let SliderDefault = document.querySelectorAll('.swiper-default');
  SliderDefault.forEach((s) => {
    // Elements
    let container = s.querySelector('.swiper-container');
    let dot = s.querySelector('.swiper-pagination');
    let next = s.querySelector('.swiper-button-next');
    let prev = s.querySelector('.swiper-button-prev');

    // Center
    let center = s.classList.contains('center') || false;
    // Effect
    let effect;
    s.classList.contains('fade') ? (effect = 'fade') : (effect = 'slide');
    // Loop
    let loop;
    s.classList.contains('loop') ? (loop = true) : (loop = false);

    // Enable swiper
    let swiper = new Swiper(container, {
      // Custom
      loop: loop,
      centeredSlides: center,
      effect: effect,
      // Default
      slidesPerView: 'auto',
      speed: 1200,
      autoplay: {
        delay: 6000,
        disableOnInteraction: false,
      },
      // Disabled if not enough slide
      watchOverflow: true,
      // For parents or childs hide/show
      observer: true,
      observeParents: true,
      observeSlideChildren: true,
      // Navigation dot
      pagination: {
        el: dot,
        clickable: true,
      },
      // Navigation arrow
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
    });
  });

  let SliderMobile = document.querySelectorAll('.swiper-mobile');
  if (window.innerWidth <= 1024) {
    SliderMobile.forEach((s) => {
      // Elements
      let container = s.querySelector('.swiper-container');
      let dot = s.querySelector('.swiper-pagination');
      let next = s.querySelector('.swiper-button-next');
      let prev = s.querySelector('.swiper-button-prev');

      // Center
      let center = s.classList.contains('center') || false;
      // Effect
      let effect;
      s.classList.contains('fade') ? (effect = 'fade') : (effect = 'slide');
      // Loop
      let loop;
      s.classList.contains('loop') ? (loop = true) : (loop = false);

      // Enable swiper
      let swiper = new Swiper(container, {
        // Custom
        loop: loop,
        centeredSlides: center,
        effect: effect,
        // Default
        slidesPerView: 'auto',
        speed: 1200,
        autoplay: {
          delay: 6000,
          disableOnInteraction: false,
        },
        // Disabled if not enough slide
        watchOverflow: true,
        // For parents or childs hide/show
        observer: true,
        observeParents: true,
        observeSlideChildren: true,
        // Navigation dot
        pagination: {
          el: dot,
          clickable: true,
        },
        // Navigation arrow
        navigation: {
          nextEl: next,
          prevEl: prev,
        },
      });
    });
  }

  let SlideProduct = document.querySelectorAll('.swiper-product');
  SlideProduct.forEach((s) => {
    // Elements
    let thumb = s.querySelector('.swiper-thumb');
    let thumbContainer = thumb.querySelector('.swiper-container');

    let detail = s.querySelector('.swiper-detail');
    let detailContainer = detail.querySelector('.swiper-container');
    let prev = detail.querySelector('.swiper-button-prev');
    let next = detail.querySelector('.swiper-button-next');

    // Enable thumb
    var swiperThumb = new Swiper(thumbContainer, {
      loop: false,
      spaceBetween: 10,
      slidesPerView: 3,
      freeMode: true,
      watchSlidesProgress: true,
      speed: 1200,
      breakpoints: {
        768: {
          slidesPerView: 4,
        },
        1200: {
          slidesPerView: 5,
        },
      },
    });

    // Enable swiper
    var swiperDetail = new Swiper(detailContainer, {
      loop: true,
      speed: 1200,
      centeredSlides: true,
      slidesPerView: 1,
      watchSlidesProgress: true,
      // autoplay: {
      //   delay: 5000,
      //   disableOnInteraction: false,
      // },
      navigation: {
        nextEl: next,
        prevEl: prev,
      },
      thumbs: {
        swiper: swiperThumb,
      },
    });
  });
}
