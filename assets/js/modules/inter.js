export default function inter() {
  let section = document.querySelectorAll('.interJS');
  section.forEach((el) => {
    let items = el.querySelectorAll('.inter-round-pos');
    items.forEach((item, i) => {
      let icon = item.querySelector('.inter-round-icon');
      let pos1 = (-360 * i) / items.length;
      let pos2 = (360 * i) / items.length;
      item.style.transform = `translate(-50%,-100%) rotate(${pos1}deg)`;
      icon.style.transform = `translate(-50%, -50%) rotate(${pos2}deg)`;
    });

    window.addEventListener('scroll', () => {
      let pos = el.getBoundingClientRect().top - window.innerHeight / 2;
      pos <= 0 ? el.classList.add('active') : el.classList.remove('active');
    });
  });
}
