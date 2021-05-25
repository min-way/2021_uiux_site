$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false,
    controls:false
  });
  new WOW().init();

  const menuPos = $(".gnb").offset().top;
  const topPos = $(".topBtn").offset().top;

  $(window).scroll(function(){
    let scrollY = $(window).scrollTop();
    console.log(scrollY)
    if(menuPos<=scrollY){
      $(".headTop").addClass("fixed");
      $(".headTop").addClass("ani");
    }else{
      $(".headTop").removeClass("ani");
      $(".headTop").removeClass("fixed");
    }

    if(scrollY>1700){
      $(".newgameCard").addClass("ltMove");
      $(".newGameBg").addClass("rtMove");
    }else{
      $(".newgameCard").removeClass("ltMove");
      $(".newGameBg").removeClass("rtMove");
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
      $(".logo>a>img").attr("src",'images/netmarble_logo2.png');
      $('html').css("overflow","hidden");
    }else{
      $(this).removeClass("on");
      $(".gnb").stop().animate({left:"100%"},300);
      $(".logo").removeClass("on");
      $(".lnb").stop().slideUp();
      $(".logo>a>img").attr("src",'images/netmarble_logo.png');
      $('html').css("overflow","auto");
    }
  });

  let winWidth = $(window).innerWidth();
  allView();

  $(window).resize(function(){
    winWidth = $(window).innerWidth();
    console.log(winWidth)
    $(".gnb").removeAttr("style");
    $(".lnb").removeAttr("style");
    $(".logo").removeClass("on");
    $(".toggleMenu").removeClass("on");
    $(".menuBtn").removeClass("on");
    $('html').css("overflow","auto");
    allView();
  });

  function allView(){
    winWidth = $(window).innerWidth();
    if(winWidth < 700){
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
        // if($(this).find(".menuBtn").hasClass("on")){
        //   $(".lnb").stop().slideUp();
        //   $(".menuBtn").removeClass("on");
        //   return false;
        // }
        $(".menuBtn").removeClass("on");
        $(this).find(".menuBtn").addClass("on");
        $(".lnb").stop().slideUp();
        $(this).find(".lnb").stop().slideDown();
      })
    }else{
      $(".gnb>li").off("click");
    }
  }

  function pcView(on){
    if(on=="view"){
      $(".gnb>li").on("mouseenter",function(){
        $(".headTop").stop().animate({height:320},50);
        $(".lnb").stop().slideDown(800);
        $(".headTop").addClass("fixed");
      })
      $(".gnb>li").on("mouseleave",function(){
        $(".headTop").stop().animate({height:120},50);
        $(".lnb").stop().slideUp(800);
        if(0>=scrollY){
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

  //company subMenu
  $(".main>img").eq(0).show();
  $(".subMenu ul li").click(function(){
    let subCheck = $(this).index();
    let loValue = $(this).text();
    console.log(subCheck)
    $(".main>img").hide();
    $(".main>img").eq(subCheck).show();
    $(this).addClass("active").siblings().removeClass("active");
    $(".coSubTit").text(loValue);
    $(".coLocation").text(loValue);
  });


});
