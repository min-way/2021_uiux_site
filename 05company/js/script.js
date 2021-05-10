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
    $("html,body").animate({scrollTop:0},1000)
  }

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



  $(window).resize(function(){

    if(window.innerWidth <= 700){
      $(".contMoBox img").attr("src","images/bg_Business.png");
    }else{
      $(".contMoBox img").attr("src","images/icon03.png");
    }
  });
});
