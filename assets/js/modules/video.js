export default function video() {
  let section = document.querySelectorAll('.videoJS');
  section.forEach((el) => {
    let video = el.querySelector('.videoPlay');
    let btn = el.querySelector('.video-overlay');
    let animate = true;
    window.addEventListener('scroll', () => {
      let pos = el.getBoundingClientRect().top;
      if (pos <= 0 && animate && window.innerWidth > 768) {
        el.classList.add('fullscreen');
        setTimeout(() => {
          video.play();
          btn.classList.add('hide');
        }, 1000);
        !animate;
      } else if (pos <= window.innerHeight / 2 && animate && window.innerWidth <= 768) {
        el.classList.add('fullscreen');
        setTimeout(() => {
          video.play();
          btn.classList.add('hide');
        }, 1000);
        !animate;
      }
    });
  });
}
