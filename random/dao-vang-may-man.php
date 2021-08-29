<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
$title = 'Danh sách nick random sơ cấp';
include '../tomdz/header.php';
include '../tomdz/functions.php';
$detect = new Mobile_Detect;
?>
        </script>
        <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info" role="alert">
                    <h2 class="alert-heading">Đào Vàng May Mắn</h2>
                    <p><p><a href="https://www.facebook.com/groups/2994439764120537" target="_blank"><span style="color:#e74c3c"><strong><u>BẤM V&Agrave;O Đ&Acirc;Y</u></strong></span> ĐỂ GIA NHẬP <span style="color:#e74c3c"><strong>KH&Aacute;CH H&Agrave;NG SI&Ecirc;U CẤP</strong></span> NHẬN H&Agrave;NG<span style="color:#e74c3c"> <strong>NGH&Igrave;N QU&Agrave; TẶNG MIỄN PH&Iacute;.</strong></span></a><br />
100% nhận được 1 trong c&aacute;c phần thưởng&nbsp;b&ecirc;n dưới<br />
+ 1 tỉ v&agrave;ng<br />
+ 500tr v&agrave;ng<br />
+ 500tr v&agrave;ng<br />
+ 700tr v&agrave;ng<br />
+ 200tr v&agrave;ng<br />
+ v&agrave;ng ngẫu nhi&ecirc;n từ 60 triệu - 1 tỷ</p>

<p>Anh em chơi tr&uacute;ng v&agrave;ng th&igrave; r&uacute;t v&agrave;ng tại đ&acirc;y : <strong><a href="/user/withdrawservice/54"><span style="color:#e74c3c"><u>r&uacute;t v&agrave;ng</u></span></a></strong></p></p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 15px">
            <div class="m-l-10 m-r-10">
                <form class="form-inline m-b-10" role="form" method="get">


                    <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Tìm kiếm</span>
                            <input type="text" class="form-control c-square" value="" placeholder="Tìm kiếm" name="find">

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Mã số</span>
                            <input type="text" class="form-control c-square" value="" placeholder="Mã số" name="id">

                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Giá tiền</span>
                            <select style="" class="form-control c-square" name="price">


                                <option value="">Chọn giá tiền</option>
                                <option value="duoi-50k" >Dưới 50K</option>
                                <option value="tu-50k-200k" >Từ 50K - 200K</option>
                                <option value="tu-200k-500k" >Từ 200K - 500K</option>
                                <option value="tu-500k-1-trieu" >Từ 500K - 1 Triệu</option>
                                <option value="tren-1-trieu" >Trên 1 Triệu</option>
                                <option value="tren-5-trieu" >Trên 5 Triệu</option>
                                <option value="tren-10-trieu" >Trên 10 Triệu</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Trạng thái</span>
                            <select style="" class="form-control c-square" name="status">
                                <option value="1"  selected>Chưa bán</option>
                                <!--<option value="0" >Đã bán</option>
                                <option value="3" >Đã đặt cọc</option>
                                <option value="-999" >Tất cả</option>-->
                            </select>

                        </div>
                    </div>
	
	
	<div class="c-margin-t-30"></div>
	<div class="c-margin-t-20"></div>
			<div class="row">
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrd` WHERE `loainick` = '3'"), 3);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickrd` WHERE `loainick` = '3' ORDER by ID DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>

<div class="col-md-3 col-sm-6 c-margin-b-20">
			<div class="c-content-product-2 c-bg-white">
				<div class="c-content-overlay">
				<div class="c-label c-theme-bg c-font-uppercase c-font-white c-font-13 c-font-bold">Acc RanDom</div>
															<div class="c-label c-theme-bg c-font-uppercase c-font-white c-font-13 c-font-bold" style="bottom: 0px;width: 100%; text-align: center;">20% Tỷ Lệ Tài Khoản Sai</div>
				
					
			<?php if(count(explode('|',$gettom['hinhanh'])) >= 1){ ?>
				<?php $image = explode("|",$gettom['hinhanh']); ?>
				<div class="c-bg-img-center c-overlay-object" data-height="height" media="(min-width: 768px)" style="height: 230px; background-image: url('https://shop7sao.com/upload-usr/images/KnSVOL7cht_1619167976.gif')"></div>            
			<?php } else { ?>
				<div class="c-bg-img-center c-overlay-object" data-height="height" media="(min-width: 768px)" style="height: 230px; background-image: url('https://shop7sao.com/upload-usr/images/KnSVOL7cht_1619167976.gif')"></div>
			<?php } ?>         
											
					
				</div>
				
			
				
				<div class="c-info">
					<p class="c-title c-font-18 c-font-slim"><span aria-hidden="true" class="icon-question"></span> Tài khoản <span class="c-font-red c-font-uppercase">#<?=$gettom['ID']?></span></p>
					<p class="c-price c-font-16 c-font-slim"><span class="icon-rocket"></span> Giá tiền - CARD:
						<span class="c-font-16 c-font-red"><?=number_format($gettom['giatien'])?>đ</span>
					</p>
				</div>
				

				
				<div class="btn-group btn-group-justified" role="group">
				
					<div class="btn-group c-border-left c-border-top" role="group">
						<a rel="/buyrd/<?=$gettom['ID']?>" title="Mua Acc Ngay" href="/buyrd/<?=$gettom['ID']?>.html" class="openPopup btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product c-font-bold load-modal">Mua Ngay</a>
					</div>
				</div>
			</div>
		</div>

<?php } ?>

<div class="col-md-12"> 
<?php 
if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>	

	</div>
			</div></div>
<?php include '../tomdz/footer.php'; ?>