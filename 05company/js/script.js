$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });
  new WOW().init();

  const menuPos = $(".gnb").offset().top;
  const topPos = $(".topBtn").offset().top;

  $(window).scroll(function(){
    console.log($(window).scrollTop())
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
    $("html,body").animate({scrollTop:0},700)
  }

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
      $(".lnb").stop().slideUp();
    }
  });

  let winWidth = $(window).innerWidth();
  allView();

  $(window).resize(function(){
    // $(".headTop").removeAttr("style");
    winWidth = $(window).innerWidth();
    console.log($(window).innerWidth())
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
        let check = $(this).index();
        console.log(check);
        $(this).find(".menuBtn").css({backgroundPosition:"0 0"});
        $(".lnb").stop().slideUp();
        $(this).find(".lnb").stop().slideDown();
      })
    }else{
      $(".gnb>li").off("click");
    }
  }
  console.log(menuPos);
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
        if(!menuPos==45){$(".headTop").removeClass("fixed");}
      })
    }else{
      $(".gnb>li").off("mouseenter");
    }
  }

});
