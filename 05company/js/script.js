$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });

  $(".conversion ul li").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
  });

  const topBtn = document.getElementsByClassName("topBtn")[0];
  topBtn.onclick = function(){
    // window.scrollTo(0,0);
    $("html,body").animate({scrollTop:0},700)
  }

    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 5,
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


  // var swiper = new Swiper('.swiper-container', {
  //   slidesPerView: 1,
  //   spaceBetween: 3,
  //   breakpoints: {
  //     700 : {
  //       slidesPerView: 2,
  //       spaceBetween: 20
  //     }
  // })

  // $(window).resize(function(){
  //   if(window.innerWidth <= 700){

  //   }
  // });
});
