<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>
    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php
    if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
    }
    ?>

    <? if(!defined('_INDEX_')){?>
      <div class="subVisual">
        <div class="subImg" id="page_title">
          <div class="title">
            <h2 class="loc1D"></h2>
            <div class="txt">최고의 온라인 게임 퍼블리셔 넷마블과 우수한 개발력을 보유한 게임 개발 스튜디오들이 하나되어 글로벌 게임 컴퍼니로 도약합니다.</div>
          </div>
        </div>
      </div>
    <?}?>

    <?php if(!defined('_INDEX_')) {?>
      <? include_once(G5_THEME_PATH.'/skin/nav/mysubmenu.php');?>
    <?}?>


    <div id="hd_wrapper"<?php if(!defined('_INDEX_')) {?> style="background: rgba(0,0,0,0.0);" <?}?> >
      <nav id="gnb" class="gnb">
          <h2>메인메뉴</h2>
          <div class="gnb_wrap">
            <div id="logo" class="logo">
                <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_URL ?>/images/netmarble_logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
            </div>
              <ul id="gnb_1dul">


                  <?php
  				$menu_datas = get_menu_db(0, true);
  				$gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                  $i = 0;
                  foreach( $menu_datas as $row ){
                      if( empty($row) ) continue;
                      $add_class = (isset($row['sub']) && $row['sub']) ? 'gnb_al_li_plus' : '';
                  ?>
                  <li class="gnb_1dli <?php echo $add_class; ?>" style="z-index:<?php echo $gnb_zindex--; ?>">
                      <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_1da"><?php echo $row['me_name'] ?></a>
                      <?php
                      $k = 0;
                      foreach( (array) $row['sub'] as $row2 ){

                          if( empty($row2) ) continue;

                          if($k == 0)
                              echo '<span class="bg">하위분류</span><div class="gnb_2dul"><ul class="gnb_2dul_box">'.PHP_EOL;
                      ?>
                          <li class="gnb_2dli"><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>" class="gnb_2da"><?php echo $row2['me_name'] ?></a></li>
                      <?php
                      $k++;
                      }   //end foreach $row2

                      if($k > 0)
                          echo '</ul></div>'.PHP_EOL;
                      ?>
                  </li>
                  <?php
                  $i++;
                  }   //end foreach $row

                  if ($i == 0) {  ?>
                      <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                  <?php } ?>
              </ul>
              <div id="gnb_all">
                  <h2>전체메뉴</h2>
                  <ul class="gnb_al_ul">
                      <?php

                      $i = 0;
                      foreach( $menu_datas as $row ){
                      ?>
                      <li class="gnb_al_li">
                          <a href="<?php echo $row['me_link']; ?>" target="_<?php echo $row['me_target']; ?>" class="gnb_al_a"><?php echo $row['me_name'] ?></a>
                          <?php
                          $k = 0;
                          foreach( (array) $row['sub'] as $row2 ){
                              if($k == 0)
                                  echo '<ul>'.PHP_EOL;
                          ?>
                              <li><a href="<?php echo $row2['me_link']; ?>" target="_<?php echo $row2['me_target']; ?>"><?php echo $row2['me_name'] ?></a></li>
                          <?php
                          $k++;
                          }   //end foreach $row2

                          if($k > 0)
                              echo '</ul>'.PHP_EOL;
                          ?>
                      </li>
                      <?php
                      $i++;
                      }   //end foreach $row

                      if ($i == 0) {  ?>
                          <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <br><a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
                      <?php } ?>
                  </ul>
                  <button type="button" class="gnb_close_btn"><i class="fa fa-times" aria-hidden="true"></i></button>
              </div>
              <div id="gnb_all_bg"></div>
          </div>
      </nav>

      <script>

      $(function(){
          $(".gnb_menu_btn").click(function(){
              $("#gnb_all, #gnb_all_bg").show();
          });
          $(".gnb_close_btn, #gnb_all_bg").click(function(){
              $("#gnb_all, #gnb_all_bg").hide();
          });
      });

      </script>
    </div>


  </div>
<!-- } 상단 끝 -->
<hr>

<?php if(defined('_INDEX_')) {?>
  <div class="sliderWrap">
    <ul class="slider">
      <li class="slider1st">
        <!-- <img src="images/bg_main01.png" alt=""> -->
        <div class="sliderTxt">
          <p>넷마블컴퍼니의 하나 된 "힘"으로 글로벌 게임문화 기업으로 도약합니다.</p>
        </div>
      </li>
      <li class="slider2st">
        <!-- <img src="images/bg_main01.png" alt=""> -->
        <div class="sliderTxt">
          <p>넷마블컴퍼니의 하나 된 "힘"으로<BR> 글로벌 게임문화 기업으로 도약합니다.</p>
        </div>
      </li>
    </ul>
  </div>

<?}?>
<script>
$(document).ready(function(){
  $(".slider").bxSlider({
    pager:false,
    controls:false
  });
  new WOW().init();

  // const menuPos = $(".gnb").offset().top;
  const menuPos = $("#hd").offset().top;


  $(window).scroll(function(){
    let scrollY = $(window).scrollTop();
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

  });


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
      $("#hd_wrapper").on("mouseenter",function(){
        $("#hd_wrapper").stop().animate({height:330},200);
        $("#hd_wrapper").find(".gnb_2dul").stop().slideDown(800);
        $("#hd_wrapper").addClass("fixed");

      })
      $("#hd_wrapper").on("mouseleave",function(){
        $("#hd_wrapper").stop().animate({height:140},250);
        $("#hd_wrapper").find(".gnb_2dul").stop().slideUp(200);
        $("#hd_wrapper").removeClass("fixed");

        if(0>=scrollY){
          $("#hd_wrapper").removeClass("fixed");
        }else{
          $("#hd_wrapper").addClass("fixed");
        }
      })
    }else{
      $("#hd_wrapper").off("mouseenter");
      $("#hd_wrapper").off("mouseleave");
    }
  }
}); // end
</script>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr" <? if (defined("_INDEX_")){?> style="width:100%" <?}?> >

    <div id="container" >
        <?php if (!defined("_INDEX_")) { ?>

          <div id="container_title">
            <img src="<?php echo G5_THEME_URL ?>/images/location_icon.png" class="location_icon">
            <img src="<?php echo G5_THEME_URL ?>/images/location_arrow.png" class="location_arrow">
            <h2 class="loc1D"></h2>
            <img src="<?php echo G5_THEME_URL ?>/images/location_arrow.png" class="location_arrow">
            <h2 title="<?php echo get_text($g5['title']); ?>" class="location_tit"><?php echo get_head_title($g5['title']); ?></h2>
          </div>
          <?php }
