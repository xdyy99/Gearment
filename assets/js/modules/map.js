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
        }, 300);
      }
    });
  });
}
