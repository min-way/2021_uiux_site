$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false
  });
$(".conversion ul li").click(function(){
  $(this).addClass("on").siblings().removeClass("on");
});
});
