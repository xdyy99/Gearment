export default function stepSlide() {
  let step = document.querySelector('.stepJS');
  if (step && innerWidth > 1024) {
    let wrap = step.querySelector('.swiper-container');

    let slides = step.querySelectorAll('.swiper-slide');
    const _H = window.innerHeight;
    const GAP = window.innerHeight / 4;

    wrap.style.height = slides.length * 100 + 50 + 'vh';
    function checkPosition() {
      slides.forEach((el, i) => {
        let start1 = wrap.getBoundingClientRect().top + i * _H - GAP;
        let start2 = wrap.getBoundingClientRect().top + i * _H;
        let end1 = wrap.getBoundingClientRect().top + (i + 1) * _H - GAP;
        let end2 = wrap.getBoundingClientRect().top + (i + 1) * _H;

        if (start1 > 0) {
          if (i == 0) {
            el.style.opacity = 1;
          } else {
            el.style.opacity = 0;
            el.classList.remove('active');
          }
          el.classList.remove('prev');
        } else if (start1 <= 0 && start2 > 0) {
          let per = (GAP - start2) / GAP;
          if (i != 0) {
            el.style.opacity = per;
          }
        } else if (start2 < 0 && end1 > 0) {
          el.style.opacity = 1;
          el.classList.add('active');
        } else if (end1 <= 0 && end2 > 0) {
          let per = end2 / GAP;
          if (i != slides.length - 1) {
            el.style.opacity = per;
          }
        } else if (end2 < 0) {
          if (i == slides.length - 1) {
            el.style.opacity = 1;
          } else {
            el.style.opacity = 0;
            el.classList.add('prev');
            el.classList.remove('active');
          }
        }
      });
    }
    checkPosition();
    window.addEventListener('scroll', () => {
      checkPosition();
    });
  }
}
