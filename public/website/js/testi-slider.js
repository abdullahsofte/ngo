/*--------------- Testimonial Slider ---------------*/ 
var swiper = new Swiper(".testimonial-slider", {

  
  spaceBetween: 150,
  loop:true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false, 
  }, 

  pagination: {
    el: ".swiper-pagination2",
    clickable:true,
  },

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },

}); 
