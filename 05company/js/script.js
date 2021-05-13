$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });
  new WOW().init();
  // $('.owl-carousel').owlCarousel();
  const menuPos = $(".gnb").offset().top;
  const topPos = $(".topBtn").offset().top;
  $(window).scroll(function(){
    let scrollY = $(window).scrollTop();

    if(menuPos<scrollY){
      $(".headTop").addClass("fixed");
    }else{
      $(".headTop").removeClass("fixed");
    }

    if(topPos<scrollY + window.innerHeight/2){
      $(".topBtn").addClass("view");
    }else{
      $(".topBtn").removeClass("view");
    }
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
    const check = $(".toggleMenu").attr("class");
    if(check=="toggleMenu"){
      $(this).addClass("on");
      $(".gnb").stop().animate({left:0},300);
      $(".logo").addClass("on");
    }else{
      $(this).removeClass("on");
      $(".gnb").stop().animate({left:"100%"},300);
      $(".logo").removeClass("on");
    }
  });

let winWidth = $(window).innerWidth();
console.log(winWidth)

  $(".gnb>li").hover(function(){
      if(winWidth < 700){return false}
      $(".headTop").stop().animate({height:320},100);
      $(".lnb").stop().slideDown(600);
      $(".headTop").addClass("fixed");
  },function(){
      $(".headTop").stop().animate({height:120},100);
      $(".lnb").stop().slideUp(600);
      $(".headTop").removeClass("fixed");
    });


  $(window).resize(function(){
    $(".headTop").removeAttr("style");
    $(".toggleMenu").removeClass("on");
    $(".gnb>li").click(function(){
      $(".lnb").stop().slideDown();
    });

  });
});
