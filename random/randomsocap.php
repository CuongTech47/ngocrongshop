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
<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space c-bg-grey-1">
	<div class="container">
		<div class="c-content-title-4">
			<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">RANDOM SƠ CẤP</span></h3>
<div class="text-center alert alert-success c-font-20" role="alert">
                    <p><b>Tỉ lệ may mắn 20% tài khoản VIP - 20% tài khoản Sai - 15% acc có bông tai vip- 30% acc sơ sinh có đệ- 60% tài khoản Đúng đăng kí ảo
					<br>Chúc bạn may mắn!</b></p>
                </div>
		</div>
	
	
	<div class="c-margin-t-30"></div>
	<div class="c-margin-t-20"></div>
			<div class="row">
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrd` WHERE `loainick` = '0'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickrd` WHERE `loainick` = '0' ORDER by ID DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>

<div class="col-md-3 col-sm-6 c-margin-b-20">
			<div class="c-content-product-2 c-bg-white">
				<div class="c-content-overlay">
				<div class="c-label c-theme-bg c-font-uppercase c-font-white c-font-13 c-font-bold">Acc RanDom</div>
															<div class="c-label c-theme-bg c-font-uppercase c-font-white c-font-13 c-font-bold" style="bottom: 0px;width: 100%; text-align: center;">20% Tỷ Lệ Tài Khoản Sai</div>
				
					
			<?php if(count(explode('|',$gettom['hinhanh'])) >= 1){ ?>
				<?php $image = explode("|",$gettom['hinhanh']); ?>
				<div class="c-bg-img-center c-overlay-object" data-height="height" media="(min-width: 768px)" style="height: 230px; background-image: url('<?=$home_url;?>/style/images/nick-ngocrong-random.png')"></div>            
			<?php } else { ?>
				<div class="c-bg-img-center c-overlay-object" data-height="height" media="(min-width: 768px)" style="height: 230px; background-image: url('<?=$home_url;?>/style/images/nick-ngocrong-random.png')"></div>
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