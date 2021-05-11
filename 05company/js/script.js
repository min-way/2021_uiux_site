$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });
  // $('.owl-carousel').owlCarousel();

  $(".gnb>li").hover(function(){
      $(".lnb").stop().slideDown();
  },function(){
    $(".lnb").stop().slideUp();
  });

  $(".conversion ul li").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
  });

  const topBtn = document.getElementsByClassName("topBtn")[0];
  topBtn.onclick = function(){
    // window.scrollTo(0,0);
    $("html,body").animate({scrollTop:0},700)
  }

// responsive 700 //

  $(".toggleMenu").click(function(){
    $(".gnb").show();
  });
  $(".gnb>li>a").click(function(){
    $(this).find(".subMenu>li").stop().slideDown();
  });

  // $(window).resize(function(){
  //   if(window.innerWidth <= 700){

  //   }
  // });
});
