/** Swiper is loaded from the original CDN script, not bundled into our modules. */
export function initPageSwiper(page) {
  if (!window.Swiper || !document.querySelector('.swiper')) return;

  if (page === 'home') {
    new window.Swiper('.swiper', {
      loop: true, speed: 300, spaceBetween: 10, slidesPerView: 1,
      autoplay: { delay: 10000, disableOnInteraction: false },
      breakpoints: { 420: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1280: { slidesPerView: 4 } },
      keyboard: { enabled: true }, grabCursor: true,
      pagination: { el: '.swiper-pagination', clickable: true },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    });
  }

  if (page === 'resume') {
    new window.Swiper('.swiper', {
      loop: true, speed: 1000, spaceBetween: 20, slidesPerView: 1,
      breakpoints: { 420: { slidesPerView: 2 }, 768: { slidesPerView: 3 }, 1280: { slidesPerView: 4 } },
      autoplay: { delay: 5000, disableOnInteraction: false },
      keyboard: { enabled: true }, grabCursor: true,
      pagination: { el: '.swiper-pagination' },
      navigation: { nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev' },
    });
  }
}
