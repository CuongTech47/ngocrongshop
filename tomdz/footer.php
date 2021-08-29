<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
			<!-- END: PAGE CONTENT -->
</div>

<div class="modal fade" id="noticeModal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
		<div class="modal-content">
                        <p style="text-align:center"><span style="color:#e74c3c"><strong>Đã có chức năng nạp nhanh, ae có thể vào nạp nhanh để không cần duyệt.</strong></span></p>
<p style="text-align:center">Web đang bán vàng x2700, bán ngọc x5,5 ae nhanh tay mua nào.</p>

<p style="text-align:center">Nhập nick 7 server giá tốt tại đây <a href="dich-vu/thanh-ly-nick"><font color="red">thanh lý nick</a></font>.</p>

<p style="text-align:center">Web đang&nbsp;cập nhật th&ecirc;m acc game v&agrave; nhiều thể loại game mới.</p>

<p style="text-align:center">Duyệt thẻ từ 1-5p, làm việc từ 6h sáng đến 23h hằng ngày.</p>
		</div>
	</div>
	</div>
</div>

<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
		<div class="modal-content">
		</div>
	</div>
</div>


<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>



<!-- END: PAGE CONTAINER -->
<a name="footer"></a>
<footer class="c-layout-footer c-layout-footer-3 c-bg-dark">
	<div class="c-prefooter">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="c-container c-first">
						<div class="c-content-title-1">
							<h3 class="c-font-uppercase c-font-bold c-font-white">Về <span class="c-theme-font"><?=$hethong[tenweb];?></span>
								<a target="_blank"  href="//www.dmca.com/Protection/Status.aspx?ID=6766daa6-8986-40c5-b282-a9c9e6a883de" title="DMCA.com Protection Status" class="dmca-badge"> <img src ="https://images.dmca.com/Badges/_dmca_premi_badge_1.png?ID=6766daa6-8986-40c5-b282-a9c9e6a883de"  alt="DMCA.com Protection Status" /></a>  <script src="https://images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
							</h3>
							<div class="c-line-left hide"></div>
							<p class="c-text">
								Chuyên mua bán nick các game... an toàn. Tin cậy nhanh chóng. Giao dịch tự động 24/24</p>
						</div>
						<ul class="c-links">
							<li><a href="/gioi-thieu">Giới thiệu</a></li>
							<li><a href="/dieu-khoan">Điều khoản</a></li>
							<li><a href="<?=$hethong[linkfb];?>">FB Admin</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="c-container c-last">
						<div class="c-content-title-1">
							<h3 class="c-font-uppercase c-font-bold c-font-white">Chúng tôi ở đây</h3>
							<div class="c-line-left hide"></div>
							<p>Chúng tôi làm việc một cách chuyên nghiệp, uy tín, nhanh chóng và luôn đặt quyền lợi của bạn lên hàng đầu</p>
						</div>
						<ul class="c-socials">
							<li><a href="https://www.facebook.com/TrungViet2k5" target="_blank"><i class="icon-social-facebook"></i></a></li>
							<li><a href="https://www.youtube.com/channel/UCkJbZxGSBnM47__K4xlJGAg" target="_blank"><i class="icon-social-youtube"></i></a></li>
						</ul>
						<ul class="c-address">
							<!--<li><i class="icon-pointer c-theme-font"></i> One Boulevard, Beverly Hills</li>-->
							<li><i class="icon-call-end c-theme-font"></i> <a href="tel:0984229274" class="c-font-regular">0984.229.274</a> (8h-22h)</li>
							<li><i class="icon-clock c-theme-font"></i><span class="c-font-regular">8h-11h30 & 13h30-22h</span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="c-postfooter" style="margin-top: -70px">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-12 c-col">
                        <p class="c-copyright c-font-grey">
                            2018 ©  <span class="c-font-grey-3">All Rights Reserved. Cover by <b>Hplayer</b></span>
                          
                        </p>
				</div>
			</div>
		</div>
	</div>
</footer><!-- END: LAYOUT/FOOTERS/FOOTER-5 -->
<!-- BEGIN: LAYOUT/FOOTERS/GO2TOP -->
<div class="c-layout-go2top">
	<i class="icon-arrow-up"></i>
</div><!-- END: LAYOUT/FOOTERS/GO2TOP -->
<!-- BEGIN: LAYOUT/BASE/BOTTOM -->
<!-- BEGIN: CORE PLUGINS -->
<!--[if lt IE 9]>
<![endif]-->
<script src="/assets/frontend/theme/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/jquery.easing.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/reveal-animate/wow.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/demos/default/js/scripts/reveal-animate/reveal-animate.js" type="text/javascript"></script>
<!-- END: CORE PLUGINS -->
<!-- BEGIN: LAYOUT PLUGINS -->
<script src="/assets/frontend/theme/assets/global/plugins/magnific/magnific.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/smooth-scroll/jquery.smooth-scroll.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/js-cookie/js.cookie.js" type="text/javascript"></script>
<!-- END: LAYOUT PLUGINS -->
<!-- BEGIN: THEME SCRIPTS -->
<script src="/assets/frontend/theme/assets/base/js/components.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/base/js/app.js" type="text/javascript"></script>

<script src="/assets/frontend/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script>
	$(document).ready(function () {
		App.init(); // init core
	});
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})


    $(".menu-main-mobile a").click(function() {

        if( $(this).closest("li").hasClass("c-open")){
            $(this).closest("li").removeClass("c-open");
		}
		else{
            $(this).closest("li").addClass("c-open");
		}
    });

</script>
<!-- END: THEME SCRIPTS -->
<!-- BEGIN: PAGE SCRIPTS -->
<script src="/assets/frontend/theme/assets/plugins/moment.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="/assets/frontend/theme/assets/demos/default/js/scripts/pages/datepicker.js" type="text/javascript"></script>
<script src="/assets/frontend/plugins/jQuery-Mask-Plugin-master/dist/jquery.mask.min.js" type="text/javascript"></script>

<script src="/assets/frontend/js/common.js" type="text/javascript"></script>

<!-- END: LAYOUT/BASE/BOTTOM -->


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126686260-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-126686260-1');
</script>
</body>
</html>