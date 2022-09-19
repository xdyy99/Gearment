export default function design() {
  let section = document.querySelectorAll('.designJS');
  section.forEach((el) => {
    let item = el.querySelector('.drag-item');
    let wrap = el.querySelector('.drag-wrap');

    let _x = 0;
    let _y = 0;
    let isGrabbing = false;
    let isMoved = false;

    // desktop
    item.addEventListener('mousedown', () => {
      item.classList.add('grabbing');
      wrap.classList.add('grab-cursor');
      isGrabbing = true;
      console.log(isGrabbing);
    });
    wrap.addEventListener('mousemove', (e) => {
      e.preventDefault();
      if (isGrabbing) {
        _x = e.offsetX - item.offsetWidth / 2;
        _y = e.offsetY - item.offsetHeight / 2;
        item.style.left = _x + `px`;
        item.style.top = _y + `px`;
        isMoved = true;
      }
    });
    wrap.addEventListener('mouseup', (e) => {
      e.preventDefault();
      if (isGrabbing && isMoved) {
        wrap.classList.add('active');
      }
    });
    wrap.addEventListener('mouseleave', (e) => {
      e.preventDefault();
      item.style.left = `0`;
      item.style.top = `0`;
      item.classList.remove('grabbing');
      isGrabbing = false;
      isMoved = false;
    });

    // mobile
    item.addEventListener('touchstart', () => {
      item.classList.add('grabbing');
      wrap.classList.add('grab-cursor');
      isGrabbing = true;
      console.log(isGrabbing);
    });
    wrap.addEventListener('touchmove', (e) => {
      e.preventDefault();
      if (isGrabbing) {
        let rect = wrap.getBoundingClientRect();
        _x = e.targetTouches[0].clientX - rect.left;
        _y = e.targetTouches[0].clientY - rect.top;
        item.style.left = _x - item.offsetWidth / 2 + `px`;
        item.style.top = _y - item.offsetHeight / 2 + `px`;
        isMoved = true;
        console.log(_x + ` : ` + _y);
      }
    });
    wrap.addEventListener('touchend', (e) => {
      e.preventDefault();
      if (isGrabbing && isMoved) {
        wrap.classList.add('active');
      }
    });
  });
}
