$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });

  $(".conversion ul li").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
  });

  var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });

  // $(window).resize(function(){
  //   console.log(window.innerWidth)
  //   if(window.innerWidth <= 700){
  //
  //   }
  // });
});
