export default function filter() {
  function removeBtn() {
    let btns = document.querySelectorAll('.filterBtn');
    btns.forEach((el) => {
      el.addEventListener('click', () => {
        el.remove();
      });
    });
  }
  removeBtn();

  let open = document.querySelector('.filterOpen');
  let close = document.querySelector('.filterClose');
  let wrap = document.querySelector('.filterWrap');
  if (open && wrap) {
    open.addEventListener('click', () => {
      wrap.classList.add('active');
    });
  }
  if (close) {
    close.addEventListener('click', () => {
      wrap.classList.remove('active');
    });
  }
}
