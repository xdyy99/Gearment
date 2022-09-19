export default function scrollTop() {
  // Get button
  const scrollTopBtn = document.querySelector('.scrollToTop');

  // Check button
  if (scrollTopBtn) {
    // Show & hide button
    const toggleClass = () => {
      pageYOffset >= 300 ? scrollTopBtn.classList.add('active') : scrollTopBtn.classList.remove('active');
    };

    // Animation
    const scrollTop = () => {
      if (pageYOffset > 0) {
        window.scrollTo(0, pageYOffset - pageYOffset / 8);
        requestAnimationFrame(scrollTop);
      }
    };

    // Add event
    document.addEventListener('DOMContentLoaded', toggleClass);
    window.addEventListener('scroll', toggleClass);
    scrollTopBtn.addEventListener('click', scrollTop);
  }
}
