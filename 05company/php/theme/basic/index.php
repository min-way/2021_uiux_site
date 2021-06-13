<?php
if (!defined('_INDEX_')) define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/index.php');
    return;
}

include_once(G5_THEME_PATH.'/head.php');
?>
<!-- 메인 컨텐츠 -->
<h2 class="sound_only">컨텐츠</h2>
<div id="contents" class="contents">
    <ul class="contList">
      <li class="wow bounceIn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=company'">
        <div class="contMoBox">
          <img class="moImg" src="<?php echo G5_THEME_URL ?>/images/icon01.png" alt="icon">
          <div class="contMoSort">
            <h2 class="contTit">회사소개</h2>
            <p class="contTxt">치열한 열정, 끊임 없는 도전, 끝없는 변화 의지로 대한민국, 아시아를 넘어 세계로 나아갑니다.</p>
            <button class="contBtn" id="cont1" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=company'">바로 가기</button>
          </div>
        </div>
      </li>
      <li class="newsBox wow bounceInDown">
        <div class="latest_wr">
            <!-- 사진 최신글2 { -->
            <?php
            // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
            // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
            // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
            echo latest('theme/news', 'news', 5, 38);		// 최소설치시 자동생성되는 갤러리게시판
            ?>
            <!-- } 사진 최신글2 끝 -->
        </div>
      </li>
      <li class="wow bounceIn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=ir'">
        <div class="contMoBox_left">
           <img class="moImg" src="<?php echo G5_THEME_URL ?>/images/icon02.png" alt="icon">
           <div class="contMoSort">
             <h2 class="contMoTit">투자정보</h2>
             <p class="contMoTxt">Investor Relations</p>
             <button class="contMoBtn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=ir'">바로 가기</button>
           </div>
           <div class="contMoBg"></div>
       </div>
      </li>
      <li class="wow bounceInLeft" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=business'">
        <div class="contMoBox">
            <img class="moImg" src="<?php echo G5_THEME_URL ?>/images/icon03.png" alt="icon">
            <div class="contMoBg"></div>
            <div class="contMoSort">
              <h2 class="contMoTit">사업소개</h2>
              <p class="contMoTxt">넷마블은 우수한 게임을 직접 개발하고 PC/ 모바일 게임 퍼블리싱 사업을 영위하는 글로벌 게임 컴퍼니입니다.</p>
              <button class="contMoBtn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=business'">바로 가기</button>
            </div>
        </div>
      </li>
      <li class="wow bounceIn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=company'">
        <div class="contMoBox">
          <img class="moImg" src="<?php echo G5_THEME_URL ?>/images/icon04.png" alt="icon">
          <div class="contMoSort">
            <h2 class="contTit">주요개발사</h2>
            <p class="contTxt">최고의 온라인 게임 퍼블리셔 넷마블과 우수한 개발력을 보유한 게임 개발 스튜디오들이 하나되어 글로벌 게임 컴퍼니로 도약합니다.</p>
            <button class="contBtn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=company'">바로 가기</button>
          </div>
        </div>
      </li>
      <li class="intro wow bounceInRight"><div class="introCont">
          <h2 class="introTit wow fadeInUp" data-wow-offset="100">게임퍼블리싱</h2>
          <p class="introTxt wow fadeInUp">업계 최초 PC게임 퍼블리싱을 시작으로 최고의 모바일 게임서비스를 제공하고 있으며, 국내 No.1 온라인게임 퍼블리셔를 넘어 글로벌 No.1 온라인 게임사로 성장하고 있습니다.</p>
        </div>
      </li>
      <li class="intro wow rotateIn"><div class="introCont">
          <h2 class="introTit wow fadeInUp" data-wow-offset="100">게임개발</h2>
          <p class="introTxt wow fadeInUp" data-wow-offset="100">20여 개의 우수한 개발 스튜디오에서 전 세계 모두가 즐길 수 있는 최고의 게임을 만들고 있습니다.</p>
        </div>
      </li>
      <li class="intro wow flipInY"><div class="introCont">
          <h2 class="introTit wow fadeInUp" data-wow-offset="100">글로벌사업</h2>
          <p class="introTxt wow fadeInUp" data-wow-offset="100">우수한 글로벌 네트워크를 통해 전세계 이용자들에게 최고의 재미를 전달할 수 있는 다양한 장르의 게임을 서비스하고 있습니다.</p>
        </div>
      </li>
      <li class="wow fadeInLeftBig" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=jeongdo'">
        <div class="contMoBox">
          <img class="moImg" src="<?php echo G5_THEME_URL ?>/images/icon05.png" alt="icon">
          <div class="contMoBg"></div>
          <div class="contMoSort">
            <h2 class="contMoTit">정도경영</h2>
            <p class="contMoTxt">Jeong-Do Management</p>
            <button class="contMoBtn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=jeongdo'">바로 가기</button>
          </div>
      </div>
      </li>
    </ul>
  </div><!-- contents -->
  <div class="vision wow fadeInUp">
    <div class="wrap">
      <div class="viIntro">
        <h2 class="viTit wow fadeInUp" data-wow-offset="320" data-wow-delay="0.3s">비전 &#47; 미션 &#47; 넷마블 정신</h2>
        <p class="viTxt wow fadeInUp" data-wow-offset="340" data-wow-delay="0.6s">넷마블은 재미있는 게임으로 전세계 사람들에게 즐거움을 선사하며 글로벌 게임문화를 이끌어 나갑니다.</p>
      </div>
      <ul class="viList clearfix">
        <li>
          <div class="card wow flipInY" data-wow-offset="360" data-wow-duration="3s" data-wow-delay="1s">
            <img src="<?php echo G5_THEME_URL ?>/images/vision_icon01.png" alt="">
            <div class="cardTxt">
              <h3>VISION</h3>
              <P>Great Game Culture Company</P>
            </div>
          </div>
        </li>
        <li>
          <div class="card wow flipInY" data-wow-offset="360" data-wow-duration="3s"  data-wow-delay="1s">
            <img src="<?php echo G5_THEME_URL ?>/images/vision_icon02.png" alt="">
            <div class="cardTxt">
              <h3>MISSION</h3>
              <P>We entertain <br>the world with fun games</P>
            </div>
          </div>
        </li>
        <li>
          <div class="card wow flipInY" data-wow-offset="360" data-wow-duration="3s"  data-wow-delay="1s">
            <img src="<?php echo G5_THEME_URL ?>/images/vision_icon03.png" alt="">
            <div class="cardTxt">
              <h3>ENTREPRENURSHIP</h3>
              <P>Enthusiasm <br>Challenge <br>Innovation <br>First-rate</P>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div><!-- vision -->
  <div class="newGame">
    <div class="wrap">
      <div class="newGameIntro wow flipInY">
        <div class="newGameBox">
          <img src="<?php echo G5_THEME_URL ?>/images/newgame_icon01.png" alt="">
          <h3>최신게임</h3>
          <p>넷마블의 최신 모바일 게임을 다양하게 즐겨보세요!</p>
        </div>
      </div>
        <ul class="gameList">
          <li>
            <div class="newGameBg">
              <div class="arrowUp"></div>
              <img src="<?php echo G5_THEME_URL ?>/images/bg_mobilegame01.png" class="" alt="">
            </div>
            <div class="newgameCard">
              <h3>세븐나이츠2</h3><span>MMORPG</span>
              <P>강림의 날로부터 20년후...<br>
                용병 단장이 된 '아일린', 그리고 악의 무리와 함께 나타난 '세인'<br>
                세인과의 치열한 전투 끝에 아일린은 자신의 딸 '렌'에게 최후의 세븐나이츠
                 '루디'를 찾아라!라고 말하게 되는데..</P>
              <div class="appBtn">
                <a href="#"><img src="<?php echo G5_THEME_URL ?>/images/app_icon01.png" alt=""></a>
                <a href="#"><img src="<?php echo G5_THEME_URL ?>/images/app_icon02.png" alt=""></a>
              </div>
            </div>
          </li>
          <li>
            <div class="newgameCard">
              <h3>마구마구2021</h3><span>스포츠</span>
              <P>선수도 야구팬도 함께하는<br>
                대한민국 1등 모바일 야구장<br>
                마구마구 2021<br><br>
                모바일 대표 야구 게임 마구마구!<br>
                이젠 다같이 함께 ‘마구’ 붙자!</P>
              <div class="appBtn">
                <a href="#"><img src="<?php echo G5_THEME_URL ?>/images/app_icon01.png" alt=""></a>
                <a href="#"><img src="<?php echo G5_THEME_URL ?>/images/app_icon02.png" alt=""></a>
              </div>
            </div>
            <div class="newGameBg">
              <img src="<?php echo G5_THEME_URL ?>/images/bg_mobilegame02.png" alt="">
              <div class="arrowDown"></div>
            </div>
          </li>
          <li>
            <div class="newGameBg">
              <img src="<?php echo G5_THEME_URL ?>/images/bg_mobilegame03.png" alt="">
              <div class="arrowUp"></div>
            </div>
            <div class="newgameCard">
              <h3>모두의마블<span>보드</span></h3>
                <P>캔디를 지켜라! 신규맵 ‘캔디샵맵’ 출시
                  골든캔디를 찾아 떠나는 여정 시작!
                  맵 곳곳에 숨어있는 캔디를 모아
                  승리하세요!<br>
                  달콤살벌 캔디쟁탈전! 달달한 재미를 즐기세요!</P>
              <div class="appBtn">
                <a href="#"><img src="<?php echo G5_THEME_URL ?>/images/app_icon01.png" alt=""></a>
                <a href="#"><img src="<?php echo G5_THEME_URL ?>/images/app_icon02.png" alt=""></a>
              </div>
            </div>
          </li>
        </ul>
    </div><!-- wrap -->
  </div><!-- newGame -->
  <div class="banner">
    <div class="wrap">
      <div class="sort">
        <div class="social wow fadeInLeftBig" data-wow-duration="1s">
          <h3>사회공헌</h3>
          <p>문화적 가치 확산을 통한 <br>우리 사회 미래경쟁력 제고</p>
          <button class="bannerBtn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=strategy'">자세히보기</button>
        </div>
        <div class="hr wow fadeInRightBig" data-wow-duration="1s">
          <h3>인재채용</h3>
          <p>열정으로 도전하고, 세상의 변화를 <br>선도하며, 최고를 추구하는 사람</p>
          <button class="bannerBtn" onclick="location.href='http://minway.dothome.co.kr/main/bbs/content.php?co_id=hrs'">자세히보기</button>
        </div>
      </div>
    </div>
  </div><!-- banner -->
<!-- 메인 컨텐츠 -->



<?php
include_once(G5_THEME_PATH.'/tail.php');
