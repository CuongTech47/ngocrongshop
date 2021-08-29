<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Thẻ cào đã nạp';
include '../tomdz/header.php';
include '../tomdz/functions.php';
if(!$user_login) { 
header( 'Location: /');
} elseif ($system['chuyentien'] == 1) {
	die("<script>
    window.alert('Chức Năng Hiện tại Bảo trì');
    window.location.href='/index.php';
	</script>");
	exit;
} else {
?>
    <div class="c-layout-page" style="margin-top: 20px;">
        <div class="container">
            <div class="c-layout-sidebar-menu c-theme ">
	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
			<!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
			<div class="c-content-title-3 c-title-md c-theme-border">
				<h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
				<div class="c-line c-dot c-dot-left "></div>
			</div>

			<div class="c-content-ver-nav">
				<ul class="c-menu c-arrow-dot c-square c-theme">
					<li><a href="/user/profile" class="">Thông tin tài khoản</a></li>
					<li><a href="/user/change-password" class="" >Đổi mật khẩu</a></li>
					<li><a href="/user/notify" class="p-quantity" >Thông báo<span id="quantity_noti" class="quantity">0</span></a></li>
					<li><a href="/user/bank" class="" >Tài khoản ngân hàng</a></li>
					<li><a href="/user/tran-log" class="">Lịch sử giao dịch</a></li>

				</ul>
			</div>
		</div>

		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15">
			<div class="c-content-title-3 c-title-md c-theme-border">
				<h3 class="c-left c-font-uppercase">Menu giao dịch</h3>
				<div class="c-line c-dot c-dot-left "></div>
			</div>
			<div class="c-content-ver-nav m-b-20">
				<ul class="c-menu c-arrow-dot c-square c-theme">
					<li><a href="/nap-the" class="">Nạp tự động</a></li>
					<li><a href="/nap-cham" class="">Nạp thẻ chậm</a></li>
					<li><a href="/deposit-history" class="active">Thẻ cào đã nạp</a></li>
					<li><a class="load-modal" rel="/atm.php">Nạp tiền từ ATM/Ví</a></li>
					<li><a href="/dich-vu/log" class="">Dịch vụ đã mua</a></li>
					<li><a href="/tran/acc" class="">Tài khoản đã mua</a></li>
					<li><a href="/dich-vu/thanh-ly-nick" class="">Thanh lý nick</a></li>
					<li><a href="/user/tranfer" class="">Chuyển tiền</a></li>
					<li><a href="/user/withdraw" class="">Rút tiền ra ATM - Ví</a></li>


					
					
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div>            <div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY-2 -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Thẻ cào đã nạp</h3>
                    <div class="c-line-left"></div>
                </div>
                <form class="form-horizontal form-find m-b-20" method="POST">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group m-b-10 c-square">
                                <span class="input-group-addon" id="basic-addon1">Loại thẻ</span>
                                <select name="key" class="form-control c-square c-theme">
                                                                                    <option value="0">
                                                Tất cả
                                            </option>
                                                                                    <option value="1" >
                                                VIETTEL
                                            </option>
                                                                                    <option value="2" >
                                                MOBIFONE
                                            </option>
                                                                                    <option value="3" >
                                                VINAPHONE
                                            </option>
                                                                                    <option value="4" >
                                                SCOIN
                                            </option>
                                                                                    <option value="5" >
                                                VCOIN
                                            </option> 
                                                                                    <option value="6" >
                                                GATE
                                            </option>
                                                                                    <option value="7" >
                                                ZING
                                            </option>
                                                                                    <option value="8" >
                                                BIT
                                            </option>                         
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group m-b-10 c-square">
                                <span class="input-group-addon">Trạng thái</span>
                                <select name="status" class="form-control c-square c-theme">.
                                                                            <option value="0">
                                            Tất cả
                                        </option>
                                                                            <option value="1" >
                                            Chờ xử lý
                                        </option>
                                                                            <option value="2" >
                                            Thẻ đúng
                                        </option>
                                                                            <option value="3" >
                                            Thẻ sai
                                        </option>
                                                                            <option value="4" >
                                            Thẻ sai mệnh giá
                                        </option>
                                                                    </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group m-b-10 c-square">
                                <span class="input-group-addon">Kiểu nạp </span>
                                <select name="type_charge" class="form-control c-square c-theme">

                                    <option value="0">
                                       Tất cả
                                    </option>
                                    <option value="1">
                                       Nạp tự động
                                    </option>
                                    <option value="2">
                                        Nạp chậm
                                    </option>
                                </select>
                            </div>
                        </div>                        </div>
                            <input type="submit" name="timkiem" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                            <a class="btn c-btn-square m-b-10 btn-danger" href="<?=$home_url;?>/deposit-history">Tất cả</a>
                </form>
                <table class="table table-hover table-custom-res">
                    <thead>
                    <tr>
                        <th>Thời gian</th>
                        <th>Nhà mạng</th>
                        <th>Mã thẻ</th>
                        <th>Serial</th>
                        <th>Kiểu nạp</th>
                        <th>Mệnh giá</th>
                        <th>Kết quả</th>
                    </tr>
                    </thead>
                    <tbody>
<?php
$getkieunap = array ("Nạp chậm", "Nạp tự động");
if (isset($_POST['timkiem'])) {
$key = $_POST['key'];
$status = intval($_POST['status']);
$type_charge = intval($_POST['type_charge']);
if($key == 0){
 $locloaithe = "`type` = 'VIETTEL'";
} elseif($key == 1){
 $locloaithe = "`type` = 'VIETTEL'";
}elseif($key == 2){
 $locloaithe = "`type` = 'MOBIFONE'";
}elseif($key == 3){
 $locloaithe = "`type` = 'VINAPHONE'";
}elseif($key == 4){
 $locloaithe = "`type` = 'SCOIN'";
}elseif($key == 5){
 $locloaithe = "`type` = 'VCOIN'";
}elseif($key == 6){
 $locloaithe = "`type` = 'GATE'";
}elseif($key == 7){
 $locloaithe = "`type` = 'ZING'";
}elseif($key == 8){
 $locloaithe = "`type` = 'BIT'";
}

if($status == 0){
 $loctt = "`tinhtrangduyet` >= '0' AND `tinhtrangduyet` <= '3'";
}elseif($status == 1){
 $loctt = "`tinhtrangduyet` = '0'";
}elseif($status == 2){
 $loctt = "`tinhtrangduyet` = '1'";
}elseif($status == 3){
 $loctt = "`tinhtrangduyet` = '2'";
}elseif($status == 4){
 $loctt = "`tinhtrangduyet` = '3'";
}

if($type_charge == 0){
 $lockieunap = "`kieunap` >= '0' AND `kieunap` <= '1'";
}elseif($type_charge == 1){
 $lockieunap = "`kieunap` = '1'";
}elseif($type_charge == 2){
 $lockieunap = "`kieunap` = '0'";
}

$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE ".$locloaithe." AND ".$loctt." AND ".$lockieunap." AND `nguoinap` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Napthe` WHERE ".$locloaithe." AND ".$loctt." AND ".$lockieunap." AND `nguoinap` = '".$tom['username']."' ORDER by ID DESC LIMIT $start, $kmess");
} else {
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `nguoinap` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Napthe` WHERE `nguoinap` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="8"><center>Không có dữ liệu<center></td></tr>
<?php }
}
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>

                                    <tr>
                                        <td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
                                        <td><?php echo $getdlc[type] ;?></td>
                                        <td><?php echo $getdlc[pin] ;?></td>
                                        <td><?php echo $getdlc[serial] ;?></td>
                                        <td><?php echo $getkieunap[$getdlc[kieunap]] ;?></td>
                                        <td><?php echo number_format($getdlc[amount]) ;?>đ</td>
                                        <td><?php echo $getdlc[tinhtrang];?></td>
                                    </tr>

<?php } ?>
                        </tbody>
                    </table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
                    <!-- END: PAGE CONTENT -->

                    <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                        
                    </div>

                </div>
            </div>
<?php 
}
include '../tomdz/footer.php';
?>