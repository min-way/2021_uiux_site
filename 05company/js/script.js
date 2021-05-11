$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });
  // $('.owl-carousel').owlCarousel();

  $(".conversion ul li").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
  });

  const topBtn = document.getElementsByClassName("topBtn")[0];
  topBtn.onclick = function(){
    // window.scrollTo(0,0);
    $("html,body").animate({scrollTop:0},700)
  }


  // $(window).resize(function(){
  //   if(window.innerWidth <= 700){

  //   }
  // });
});
