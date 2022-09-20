export default function map() {
  let section = document.querySelectorAll('.mapJS');
  section.forEach((el) => {
    let animate = true;
    window.addEventListener('scroll', () => {
      let pos = el.getBoundingClientRect().top;
      if (pos <= 0 && animate) {
        !animate;
        el.classList.add('active1');
        setTimeout(() => {
          el.classList.add('active2');
        }, 700);
      }
    });

    let items = el.querySelectorAll('.map-item');
    let lines = el.querySelectorAll('.map-line');

    items.forEach((item, i) => {
      item.addEventListener('mouseenter', () => {
        lines[i].classList.add('active-hover');
        el.classList.add('active-hover');
      });
      item.addEventListener('mouseleave', () => {
        lines[i].classList.remove('active-hover');
        el.classList.remove('active-hover');
      });
    });
  });
}
