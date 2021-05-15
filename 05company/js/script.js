$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });
  new WOW().init();

  const menuPos = $(".gnb").offset().top;
  const topPos = $(".topBtn").offset().top;

  $(window).scroll(function(){
    let scrollY = $(window).scrollTop();
    if(menuPos<=scrollY){
      $(".headTop").addClass("fixed");
      $(".headTop").addClass("wow fadeOutUp");
      $(".headTop").addClass("data-wow-delay='13s'");
      $(".headTop").addClass("data-wow-offset='0'");
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
    $("html,body").animate({scrollTop:0},700)
  }

  $(".toggleMenu").click(function(){
    const check = $(".toggleMenu").attr("class");
    if(check=="toggleMenu"){
      $(this).addClass("on");
      $(".gnb").stop().animate({left:0},300);
      $(".logo").addClass("on");
      $(".logo.on").stop().animate({left:30},300);
      $('html').css("overflow","hidden");
    }else{
      $(this).removeClass("on");
      $(".gnb").stop().animate({left:"100%"},300);
      $(".logo").removeClass("on");
      $(".lnb").stop().slideUp();
      $('html').css("overflow","auto");
    }
  });

  let winWidth = $(window).innerWidth();
  allView();

  $(window).resize(function(){
    // $(".headTop").removeAttr("style");
    winWidth = $(window).innerWidth();
    $(".toggleMenu").removeClass("on");
    allView();
  });

  function allView(){
    if(winWidth <= 700){
      mobileView("view");
      pcView("off");
    }else{
      pcView("view");
      mobileView("off");
    }
  }

  function mobileView(on){
    if(on=="view"){
      $(".gnb>li").on("click",function(){
        if($(this).find(".menuBtn").hasClass("on")){
          $(".lnb").stop().slideUp();
          $(".menuBtn").removeClass("on");
          return false;
        }
        $(".lnb").stop().slideUp();
        $(this).find(".lnb").stop().slideDown();
        $(".menuBtn").removeClass("on");
        $(this).find(".menuBtn").addClass("on");
      })
    }else{
      $(".gnb>li").off("click");
    }
  }

  function pcView(on){
    if(on=="view"){
      $(".gnb>li").on("mouseenter",function(){
        $(".headTop").stop().animate({height:320},100);
        $(".lnb").stop().slideDown(600);
        $(".headTop").addClass("fixed");
      })
      $(".gnb>li").on("mouseleave",function(){
        $(".headTop").stop().animate({height:120},100);
        $(".lnb").stop().slideUp(600);
        if(0>scrollY|0==scrollY){
          $(".headTop").removeClass("fixed");
        }else{
          $(".headTop").addClass("fixed");
        }
      })
    }else{
      $(".gnb>li").off("mouseenter");
      $(".gnb>li").off("mouseleave");
    }
  }

});
