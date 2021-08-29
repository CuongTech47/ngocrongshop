
<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
include 'tomdz/header.php';
include 'tomdz/functions.php';
$detect = new Mobile_Detect;
?>
	    <div class="c-content-box">
		<div id="slider" class="owl-theme section section-cate slideshow_full_width ">
			<div id="slide_banner" class="owl-carousel">
									<div class="item">
						<a href="" alt="team">
							<img src="<?=$home_url;?>/style/images/cover-1.jpg" alt="team">
						</a>
					</div>

									<div class="item">
						<a href="" alt="Garena">
							<img src="<?=$home_url;?>/style/images/cover-2.png" alt="Garena">
						</a>
					</div>

							</div>
								<div class="c-content-box c-size-md c-bg-white">
		<div class="container">
			<!-- Begin: Testimonals 1 component -->
			<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
				<!-- Begin: Title 1 component -->
				<div class="c-content-title-1">
					<h3 class="c-center c-font-uppercase c-font-bold">DỊCH VỤ NỔI BẬT</h3>
					<div class="c-line-center c-theme-bg"></div>
				</div>
				<div class="owl-carousel owl-theme c-theme owl-bordered1 c-owl-nav-center" data-items="6" data-desktop-items="4" data-desktop-small-items="3" data-tablet-items="3" data-mobile-items="2" data-slide-speed="5000" data-rtl="false">
                    <div class="item">
                        <a href="/user/profile"><img src="https://upanh.cf/kherguitcx.jpg" alt="Tài khoản" />
                        </a>
                    </div>
                
                    <div class="item">
                        <a href="/nap-cham"><img src="https://upanh.cf/xaxnbgd6im.jpg" alt="Nạp thẻ" />
                        </a>
                    </div>
                
                    <div class="item">
                        <a href="/ngoc-rong/nick-tam-trung"><img src="https://upanh.cf/t9slb8xvbl.jpg" alt="Bán Nick" />
                        </a>
                    </div>
                
                    <div class="item">
                        <a href="/dich-vu/thanh-ly-nick"><img src="https://upanh.cf/o5yqxhgvcc.jpg" alt="Thanh Lý Nick" />
                        </a>
                    </div>
                </div>
				<!-- End-->
			</div>
			<!-- End-->
		</div>
	</div>
    <div class="c-content-box c-size-md c-bg-white">
	<div class="container">
		<!-- Begin: Testimonals 1 component -->
		<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
			<!-- Begin: Title 1 component -->
<div class="c-content-box c-size-md c-bg-white">
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <!-- Begin: Title 1 component -->
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">Danh mục game</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="row row-flex-safari game-list glbm grd">


<div class="col-sm-3 col-xs-6 p-5 m1" id="785">
                            <div class="classWithPad">
                                <div class="news_image">
                                    <a href="/body/DICHVU/NGOCRONG" class=""><img src="https://upanh.cf/ztplsg0gex.jpg"></a>
                                </div>
                                <div class="news_title"><a href="/body/DICHVU/NGOCRONG">DỊCH VỤ NGỌC RỒNG</a></div>
                                <div class="news_description">
                                    <p>
                                        Dịch vụ hỗ trợ: 5
                                    </p>

                            <p>
                                        &nbsp;
                            </p>
                                </div>
                                <div class="a-more">
                                    <div class="row">

                                        <div class="col-xs-12">
                                            <div class="view">
                                                <a href="/body/DICHVU/NGOCRONG">Xem tất cả</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>

                                    
                                        
                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/random/NGOCRONG" class=""><img src="https://upanh.cf/tzl00hl6t7.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/random/NGOCRONG">ACC NGỌC RỒNG VIP</a></div>
                        <div class="news_description">

                            <p>
                                        Số tài khoản: <?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `loainick` = '0'"), 0)); ?>                           </p>


                            <p>
                                        &nbsp;
                            </p>

                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/random/NGOCRONG">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>




                                                     
                                        
                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/random/SOSINH" class=""><img src="https://upanh.cf/5vhe5c710t.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/random/SOSINH">ACC NGỌC RỒNG SƠ SINH</a></div>
                        <div class="news_description">

                            <p>
                                        Số tài khoản: <?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `loainick` = '1'"), 0)); ?>                            </p>


                            <p>
                                        &nbsp;
                            </p>

                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/random/SOSINH">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>




                                                     
                                        
                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/RANDOM/KHODONGOCRONG" class=""><img src="https://upanh.cf/afrq541v4z.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/RANDOM/KHODONGOCRONG">KHO ĐỒ NGỌC RỒNG</a></div>
                        <div class="news_description">

                            <p>
                                        Số tài khoản: 13                            </p>


                            <p>
                                        &nbsp;
                            </p>

                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/RANDOM/KHODONGOCRONG">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>    
                
                
                <div class="c-content-box c-size-md c-bg-white">
    <div class="container">
        <!-- Begin: Testimonals 1 component -->
        <div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <!-- Begin: Title 1 component -->
            <div class="c-content-title-1">
                <h3 class="c-center c-font-uppercase c-font-bold">DANH MỤC GAME RANDOM
</h3>
                <div class="c-line-center c-theme-bg"></div>
            </div>
            <div class="row row-flex-safari game-list glbm">
                



									

                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/random/NUOIRONG20K" class=""><img src="https://upanh.cf/x69m95l4tw.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/random/NUOIRONG20K">NUÔI RỒNG 20K</a></div>
                        <div class="news_description">
                                    <p>
                                        Số tài khoản: 3284                                    </p>
                                    <p>
                                        &nbsp;
                                    </p>
                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/random/NUOIRONG20K">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>



													 

                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/random/LQ50K" class=""><img src="https://upanh.cf/fayomsmo5m.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/random/LQ50K">RANDOM LIÊN QUÂN 50K</a></div>
                        <div class="news_description">
                                    <p>
                                        Số tài khoản: 0                                    </p>
                                    <p>
                                        &nbsp;
                                    </p>
                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/random/LQ50K">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>



													 

                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/random/NGOCRONG20K" class=""><img src="https://upanh.cf/xhors2483d.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/random/NGOCRONG20K">RANDOM NGỌC RỒNG 20K</a></div>
                        <div class="news_description">
                                    <p>
                                        Số tài khoản: 1814                                    </p>
                                    <p>
                                        &nbsp;
                                    </p>
                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/random/NGOCRONG20K">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>



													 

                
                                <div class="col-sm-3 col-xs-6 p-5">
                    <div class="classWithPad">
                        <div class="news_image">
                            <a href="/body/random/NGOCRONG50K" class=""><img src="https://upanh.cf/zdz7fawoeh.jpg"></a>
                        </div>
                        <div class="news_title"><a href="/body/random/NGOCRONG50K">RANDOM NGỌC RỒNG 50K</a></div>
                        <div class="news_description">
                                    <p>
                                        Số tài khoản: 34                                    </p>
                                    <p>
                                        &nbsp;
                                    </p>
                        </div>
                        <div class="a-more">
                            <div class="row">

                                <div class="col-xs-12">
                                    <div class="view">
                                        <a href="/body/random/NGOCRONG50K">Xem tất cả</a>
                                    </div>
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
					
			<!-- End-->
		</div>
		<!-- End-->
	</div>
</div>
<DIV class="c-content-box c-size-md c-bg-white">
    <DIV class="container">
        <!-- Begin: Testimonals 1 component -->
        <DIV class="c-content-client-logos-slider-1  c-bordered" data-slider="owl">
            <!-- Begin: Title 1 component -->

            <DIV class="c-content-title-1">
                <H3 class="c-center c-font-uppercase c-font-bold">Đối tác thanh toán</H3>
                <DIV class="c-line-center c-theme-bg"></DIV>
            </DIV>
            <DIV class="owl-carousel owl-theme c-theme owl-bordered1 c-owl-nav-center"
                 data-rtl="false" data-slide-speed="5000" data-mobile-small-items="2"
                 data-tablet-items="3" data-desktop-small-items="3" data-desktop-items="4"
                 data-items="5">
                <DIV class="item">
                    <A href="#"><IMG alt="<?=$hethong[tenweb]?> Shop Bán Nick Uy Tín" src="<?=$home_url;?>/style/images/VNP.png"></A>
                </DIV>
                <DIV class="item">
                    <A href="#"><IMG alt="<?=$hethong[tenweb]?>Shop Bán Nick Uy Tín" src="<?=$home_url;?>/style/images/VMS.png"></A>
                </DIV>
                <DIV class="item">
                    <A href="#"><IMG alt="<?=$hethong[tenweb]?> Shop Bán Nick Uy Tín" src="<?=$home_url;?>/style/images/VTT.png"></A>
                </DIV>
                <DIV class="item">
                    <A href="#"><IMG alt="<?=$hethong[tenweb]?> Shop Bán Nick Uy Tín" src="<?=$home_url;?>/style/images/FPT.png"></A>
                </DIV>
            </DIV><!-- End-->
        </DIV><!-- End-->
    </DIV>
</DIV>
        <!-- END: PAGE CONTENT -->
    </DIV><!-- END: PAGE CONTAINER -->
				<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content c-square">
							<div class="modal-header">
								<button type="button" style="background: red;color: #fff;position: absolute;right: 0;top: 4px;width: 50px;height: 40px;" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
								<h4 class="modal-title" id="myModalLabel">Thông Báo</h4>
							</div>
	<center>						<div class="modal-body"><strong><font 
<p><mark>Shop Chính Thức Khai Trương Giảm Giá 30% Tất Cả Nick Trong Shop</mark></p>
<p><font color="black"><strong>- Mua Vàng Rẻ Nhất Thị Trường</strong><a href="https://kinglaydz.cf/dich-vu/ban-vang"><font color="red">&ensp;Mua Ngay</font></a></font></p>
<p><font color="black"><strong>- Mua Ngọc Khuyến Mãi Giá Rẻ</strong><a href="https://kinglaydz.cf/dich-vu/ban-ngoc"><font color="red">&ensp;Mua Ngay</font></a></font></p>
<p><font color="black"><strong>- Mua Nick Sơ Sinh Đồng Giá 10.000đ</strong><a href="https://kinglaydz.cf/ngoc-rong/nick-so-sinh"><font color="red">&ensp;Mua Ngay</font></a></font></p>
<p><font color="black"><strong>-Hộp Quà May Mắn Cơ Hội Nhận Ngay 500k Chỉ Với 10.000đ<a href="https://kinglaydz.cf/hopqua.php"><font color="red">&ensp;Thử Ngay</font></a></font></p>
<p>Tăng Mạnh Giá Vàng Lên x7000 Và Ngọc x8500 Quá Tuyệt Anh Em Ơi !!!</p></p>
							</div>
							<div class="modal-footer">								
								<button type="button" class="btn c-btn-dark c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
<?php include 'tomdz/footer.php'; ?>
<script>
    $(document).ready(function() {
    	$("#myModal").modal("show");
    });
</script>