export default function scrollID() {
  const speed = 800;
  // NẾU CÓ ĐỊA CHỈ ID TRÊN THANH URL THÌ SCROLL XUỐNG
  const hash = window.location.hash;
  if ($(hash).length) scrollToID(hash, speed);
  // TÌM ĐỊA CHỈ ID VÀ SCROLL XUỐNG NẾU CÓ CLASS
  $('.scrollJS').on('click', function (e) {
    e.preventDefault();

    const href = $(this).find('> a').attr('href') || $(this).attr('href');
    const id = href.slice(href.lastIndexOf('#'));
    if ($(id).length) {
      scrollToID(id, speed);
    } else {
      // window.location.replace(`/${id}`);
      window.location.href = href;
    }
  });
  // HÀM SCROLL CHO MƯỢT MÀ
  function scrollToID(id, speed) {
    const offSet = $('.hdJS').outerHeight();
    const section = $(id).offset();
    const targetOffset = section.top - offSet * 2;
    $('html,body').animate({ scrollTop: targetOffset }, speed);
  }
  // Check active link
  function checkBodyPosition() {
    const offSet = $('.hdJS').outerHeight();
    let idPosition = document.querySelectorAll('.scrollPosition');
    let idLink = document.querySelectorAll('.scrollJS');
    idPosition.forEach((el, i) => {
      let top = el.getBoundingClientRect().top - offSet * 2 - 10;
      let bottom = el.getBoundingClientRect().top + el.getBoundingClientRect().height - offSet * 2 - 10;
      top < 0 && bottom > 0 ? idLink[i].classList.add('active') : idLink[i].classList.remove('active');
    });
  }
  checkBodyPosition();
  window.addEventListener('scroll', checkBodyPosition);
}
