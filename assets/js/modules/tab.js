export default function tab() {
  let tab = document.querySelectorAll('.tabJS');
  tab.forEach((t) => {
    let tBtn = t.querySelectorAll('.tabBtn');
    let tPanel = t.querySelectorAll('.tabPanel');

    // for tab
    if (tBtn.length !== 0 && tPanel.length === tBtn.length) {
      tBtn[0].classList.add('active');
      tPanel[0].classList.add('active');

      for (let i = 0; i < tBtn.length; i++) {
        tBtn[i].addEventListener('click', (e) => {
          e.preventDefault();
          showPanel(i);
        });
      }
      function showPanel(i) {
        for (let a = 0; a < tBtn.length; a++) {
          tBtn[a].classList.remove('active');
          tPanel[a].classList.remove('active');
        }
        tBtn[i].classList.add('active');
        tPanel[i].classList.add('active');
      }
    }
  });
}
