export default function toggle() {
  let panel = document.querySelectorAll('.tgPan');
  let button = document.querySelectorAll('.tgBtn');

  button.forEach((el) => {
    el.addEventListener('click', (e) => {
      e.preventDefault();
      let key = el.getAttribute('data-type');
      el.classList.toggle('active');

      panel.forEach((el1) => {
        let lock = el1.getAttribute('data-type');
        key === lock ? el1.classList.toggle('active') : el1.classList.remove('active');
      });

      button.forEach((el2) => {
        if (el2 !== el) el2.classList.remove('active');
      });
    });
  });
  document.addEventListener('click', function (e) {
    let clickPanel = e.target.closest('.tgPan');
    let clickBtn = e.target.closest('.tgBtn');
    if (clickPanel == null && clickBtn == null) {
      button.forEach((el) => {
        el.classList.remove('active');
      });
      panel.forEach((el) => {
        el.classList.remove('active');
      });
    }
  });

  let dropdown = document.querySelectorAll('.tgDrop');
  dropdown.forEach((el) => {
    let link = el.querySelectorAll('a');
    link.forEach((el1) => {
      el1.addEventListener('click', (e) => {
        e.stopPropagation();
      });
    });
    el.addEventListener('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
      el.classList.toggle('active');
    });
  });
}
