$(document).ready(() => {
  var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    direction: 'horizontal',
    speed: 1000,
    loop: true,

    breakpoints: {
      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      }
    },

    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });

})