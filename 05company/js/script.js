$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });

  $(".conversion ul li").click(function(){
    $(this).addClass("on").siblings().removeClass("on");
  });

  // $(window).resize(function(){
  //   console.log(window.innerWidth)
  //   if(window.innerWidth <= 600){
  //
  //   }
  // });
});
