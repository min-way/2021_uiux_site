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
    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>

        <ul class="hd_login">
            <?php if ($is_member) {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
                <?php if ($is_admin) {  ?>
                <li class="tnb_admin"><a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>">관리자</a></li>
                <?php }  ?>
            <?php } else {  ?>
                <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
                <li><a href="<?php echo G5_BBS_URL ?>/login.php">로그인</a></li>
            <?php }  ?>
        </ul>
    </div>

    <nav id="gnb">
        <h2>메인메뉴</h2>
        <div class="gnb_wrap">
            <ul id="gnb_1dul">
                <li class="gnb_1dli gnb_mnal"><button type="button" class="gnb_menu_btn" title="전체메뉴"><i class="fa fa-bars" aria-hidden="true"></i><span class="sound_only">전체메뉴열기</span></button></li>
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
    <div class="headTop">
      <div class="wrap">
        <div id="logo" class="logo">
            <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_IMG_URL ?>/netmarble_logo.png" alt="<?php echo $config['cf_title']; ?>"></a>
        </div>
        <div class="toggleMenu">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </div>
        <div class="conversion">
          <ul>
            <li class="on"><a href="#">KOR</a></li>
            <li><a href="#">ENG</a></li>
          </ul>
        </div>
        <ul class="gnb clearfix">
          <li><a href="#">회사소개<span class="menuBtn">버튼</span></a>
            <ul class="lnb">
              <li><a href="company.html">넷마블 컴퍼니</a></li>
              <li><a href="#">비전/미션</a></li>
              <li><a href="#">연혁</a></li>
              <li><a href="#">뉴스</a></li>
            </ul>
          </li>
          <li><a href="#">사업소개<span class="menuBtn">버튼</span></a>
            <ul class="lnb">
              <li><a href="business.html">사업영역</a></li>
              <li><a href="#">넷마블게임</a></li>
              <li><a href="#">글로벌사업</a></li>
            </ul>
          </li>
          <li><a href="#">정도경영<span class="menuBtn">버튼</span></a>
            <ul class="lnb">
              <li><a href="jeongdo.html">정도경영</a></li>
              <li><a href="#">윤리강령</a></li>
            </ul>
          </li>
          <li><a href="#">사회공헌<span class="menuBtn">버튼</span></a>
            <ul class="lnb">
              <li><a href="strategy.html">방향성</a></li>
              <li><a href="#">활동소개</a></li>
              <li><a href="#">활동소식</a></li>
            </ul>
          </li>
          <li><a href="#">IR<span class="menuBtn">버튼</span></a>
            <ul class="lnb">
              <li><a href="ir.html">Overview</a></li>
              <li><a href="#">기업지배구조</a></li>
              <li><a href="#">재무정보</a></li>
              <li><a href="#">공시</a></li>
            </ul>
          </li>
          <li><a href="#">인재채용<span class="menuBtn">버튼</span></a>
            <ul class="lnb">
              <li><a href="hrs.html">인재상</a></li>
              <li><a href="#">직무소개</a></li>
              <li><a href="#">인사제도</a></li>
              <li><a href="#">채용공고</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- wrap -->
    </div><!-- headTop -->

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
  <script>
  $(document).ready(function(){
    $(".slider").bxSlider({
      pager:false,
      controls:false
    });
    // new WOW().init();

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
  }); // end
  </script>
<?}?>


<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr" <? if (defined("_INDEX_")){?> style="width:100%" <?}?> >

    <div id="container" >
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }
