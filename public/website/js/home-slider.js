/*--------------- Home Slider ---------------*/ 
var swiper = new Swiper(".home-slider", {

    loop:true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: true, 
    },

    pagination: {
      el: ".swiper-pagination1",
      clickable:true,
    },

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },

}); 