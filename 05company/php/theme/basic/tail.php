<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/tail.php');
    return;
}
?>


</div>

</div>
<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<div id="ft">

    <div id="ft_wr">
      <footer id="footer" class="footer">
        <div class="wrap">
          <div class="ftSort">
            <div class="footer_logo">
              <a href="<?php echo G5_URL ?>"><img src="<?php echo G5_THEME_URL ?>/images/netmarble_logo2.png" alt="<?php echo $config['cf_title']; ?>"></a>
            </div>
            <div class="corp">
              <ul>
                <li><a href="#">게임제안</a></li>
                <li><a href="#">정도경영</a></li>
                <li><a href="#">개인정보처리방침</a></li>
                <li><a href="#">오시는길</a></li>
                <li><a href="#">사이트맵</a></li>
              </ul>
              <p>&#169; Netmarble Corp. All Rights Reserved</p>
            </div>
            <div class="fmSite">
              <select name="fm" id="fm">
                <option value="none">FAMILY SITE</option>
                <option value="#">넷마블앤파크</option>
                <option value="#">넷마블몬스터</option>
                <option value="#">넷마블엔투</option>
                <option value="#">넷마블넥서스</option>
                <option value="#">넷마블네오</option>
                <option value="#">구로발게임즈</option>
                <option value="#">넷마블에프엔씨</option>
              </select>
            </div>
          </div>
        </div><!-- wrap -->
      </footer><!-- footer -->
     </div><!-- ft_wr -->

    <button type="button" id="top_btn">
    	<i class="fa fa-arrow-up" aria-hidden="true"></i><span class="sound_only">상단으로</span>
    </button>
    <script>
    $(function() {
        $("#top_btn").on("click", function() {
            $("html, body").animate({scrollTop:0}, '500');
            return false;
        });
    });
    </script>
</div><!-- ft -->

<?php
if(G5_DEVICE_BUTTON_DISPLAY && !G5_IS_MOBILE) { ?>
<?php
}

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_THEME_PATH."/tail.sub.php");
