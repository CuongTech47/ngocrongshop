<?php 
// Code Được Mod Và Có Thêm Vài Dịch Vụ Ngọc Rồng
// Zalo:01242211568 Và Fb.com/TrungViet2k5
// Mua Nick Ngọc Rồng Tại:ShopHplayer.Com

session_start();
$title = 'Thông tin Tài khoản #'.intval($_GET['id']).'';
include '../tomdz/header.php';
?>
<div class="m-t-20 visible-sm visible-xs"></div>

<?php if($_GET['id']){ ?>
<?php $id = intval($_GET['id']); ?>
<?php 
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `ID`='$id'"), 0);
if($check < 1){
	echo '<div style="padding-left:20px;font-size: 30px;text-align:center">
	<b style="color:red">Tài khoản Không tồn tại trên hệ thống!</b>
	</div>';
	include '../tomdz/footer.php'; 
	exit;
}
?>
<?php
$gethanhtinh = array("NULL", "Trái đất", "Xayda", "NaMếc");
$getthongtin = array("NULL", "Đkí Ảo", "Gmail", "Yahoo");
$TOM_result = mysql_query("SELECT * FROM `TOM_Nick` WHERE ID = '$id' LIMIT 1");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>
<div class="c-content-box c-size-lg c-overflow-hide c-bg-white">
<div class="container">
        <div class="c-shop-product-details-4">
            <div class="row">
                <div class="col-md-4 m-b-20">
                    <div class="c-product-header">
                        <div class="c-content-title-1">
                            <h3 class="c-font-uppercase c-font-bold">MS #<?=$gettom['ID']?></h3>
                            <span class="c-font-red c-font-bold"><i class="fa fa-tag"></i> Random Ngọc Rồng</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 visible-sm visible-xs visible-sm">
                    <div class="c-product-meta">
                     <div class="c-content-divider c-icon-bg c-theme-bg">
					<i class="icon-graph c-rounded c-theme-bg c-font-white"></i>
				</div>
                        <div class="row">
                            <div class="col-sm-4 col-xs-6 c-product-variant">

                            </div>
                        </div>
                     <div class="c-content-divider c-icon-bg c-theme-bg">
					<i class="icon-graph c-rounded c-theme-bg c-font-white"></i>
				</div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="c-product-meta">
                        <div class="c-product-price c-theme-font" style="float: none;text-align: center">
							<?php $giatcsr = $gettom['giatien'] * (100-25)/100; ?>
                            <?=number_format($giatcsr)?> ATM/TCSR <br>
                            <?=number_format($gettom['giatien'])?> CARD
                        </div>
                    </div>
                </div>
                    <div class="col-md-4 text-right">
                        <div class="c-product-header">
                            <div class="c-content-title-1">
                                <a class="btn btn-lg c-btn-green c-font-uppercase c-font-bold c-btn-circle  m-t-20 btnCheckAccount load-modal" rel="/thanhtoan/<?=$gettom['ID']?>"><i class="fa fa-cart-arrow-down"></i> Mua ngay</a>
                                <a class="btn btn-md c-btn-red c-font-uppercase c-font-bold c-btn-circle m-t-20 btnCheckAccount load-modal" rel="/atm.php"><i class="fa fa-university"></i> ATM - Ví điện tử</a>
                                <a href="/nap-cham" class="btn btn-md c-btn-red c-font-uppercase c-font-bold c-btn-border-1x m-t-20"><i class="fa fa-cc-paypal"></i> Nạp thẻ cào</a>
                                <a href="/" class="btn btn-md c-btn-green c-font-uppercase c-font-bold c-btn-border-1x m-t-20"><i class="fa fa-home"></i> Trang chủ</a>
                            </div></div>
                    </div>

            </div>


	
<div class="m-t-20">

    <div class="text-center">
        <b class="c-font-20">Hình ảnh chi tiết của tài khoản <span class="c-font-red">MS #<?=$gettom['ID']?></span></b>
    <br>
    <br>
    <div class="c-content-title-2">
            <div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
    </div>
                <div>
                            
                            <div>
							
							<?php if(count(explode('|',$gettom['hinhanh'])) >= 1){ ?>
							<?php $image = explode("|",$gettom['hinhanh']); ?>	
							<?php foreach($image as $tomimage): ?>
							<div class="gallery m-t-20">
							<a href="<?=$tomimage?>">
							<img src="<?=$tomimage?>" class="img-responsive img-thumbnail">
							</a><br></div>
							<?php endforeach; ?>          
							<?php } else { ?>
							<div class="gallery m-t-20">
							<a href="<?=$gettom['hinhanh']?>">
							<img src="<?=$gettom['hinhanh']?>" class="img-responsive img-thumbnail">
							</a><br></div>
							<?php } ?>
						
							</div>
						</li>
					</ul>
				</div>

			</div>
		</div>
	</div>
</div>
	
<?php } ?>  
<?php }  ?> 
<?php include '../tomdz/footer.php'; ?>