<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Dịch vụ vàng đã rút';
include '../tomdz/header.php';
include '../tomdz/functions.php';
iF(!$user_login) { 
header( 'Location: /');
} elseif ($system['ruttien'] == 1) {
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
					<li><a href="/deposit-history" class="">Thẻ cào đã nạp</a></li>
					<li><a class="load-modal" rel="/atm.php">Nạp tiền từ ATM/Ví</a></li>
					<li><a href="/dich-vu/log" class="active">Dịch vụ đã mua</a></li>
					<li><a href="/tran/acc" class="">Tài khoản đã mua</a></li>
					<li><a href="/dich-vu/thanh-ly-nick" class="">Thanh lý nick</a></li>
					<li><a href="/user/tranfer" class="">Chuyển tiền</a></li>
					<li><a href="/user/withdraw" class="">Rút tiền ra ATM - Ví</a></li>


					
					
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div>        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY-2 -->
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Vàng Đã Rút</h3>
                <div class="c-line-left"></div>
            </div>
                    <form class="form-horizontal form-find m-b-20" role="form" method="POST">

                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <span class="input-group-addon" id="basic-addon1">Danh mục</span>

                            <select id="group_id" name="dichvu" class="form-control c-square c-theme">
                                <option value="0">-- Tất cả các dich vụ --</option>
                                <option value="1"> Rút Vàng (Ngọc rồng)</option>
                                <option value="2"> Rút Ngọc (Ngọc rồng)</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <span class="input-group-addon" id="basic-addon1">Trạng thái</span>
                            <select class="form-control c-square c-theme" name="status">
                                <option value="0" selected="selected">-- Tất cả trạng thái --</option>
                                <option value="1">Đang thực hiện</option>
                                <option value="2">Hoàn thành</option>
                                <option value="3">Thất bại</option>
                                <option value="4">Đã hủy</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <input name="timkiem" type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                        <a class="btn c-btn-square m-b-10 btn-danger" href="<?=$home_url;?>/dich-vu/log">Tất cả</a>
                    </div>
                </div>


            </form>
            <table class="table table-hover table-custom-res">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Dịch vụ</th>
                    <th>Số vàng</th>
                    <th>Trạng thái</th>
                    <th class="hidden-xs">Thời gian</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>

                <tbody>
<?php
$getdichvu = array("Không xác định", "Rút vàng", "Bán ngọc");
if (isset($_POST['timkiem'])) {
$dichvu = intval($_POST['dichvu']);
$status = intval($_POST['status']);
if($dichvu == 0){
 $locdichvu = "`dichvu` >= '1' AND `dichvu` <= '2'";
}elseif($dichvu == 1){
 $locdichvu = "`dichvu` = '1'";
}elseif($dichvu == 2){
 $locdichvu = "`dichvu` = '2'";
}
if($status == 0){
 $loctt = "`tinhtrang` >= '0' AND `tinhtrang` <= '4'";
}elseif($status == 1){
 $loctt = "`tinhtrang` = '0'";
}elseif($status == 2){
 $loctt = "`tinhtrang` = '1'";
}elseif($status == 3){
 $loctt = "`tinhtrang` = '2'";
}elseif($status == 4){
 $loctt = "`tinhtrang` = '3'";
}
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Hplayer_rut-vang` WHERE ".$locdichvu."  AND ".$loctt." AND `username` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `Hplayer_rut-vang` WHERE ".$locdichvu." AND ".$loctt." AND `username` = '".$tom['username']."' ORDER by ID DESC LIMIT $start, $kmess");
} else {
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Hplayer_rut-vang` WHERE `username` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `Hplayer_rut-vang` WHERE `username` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="6"><center>Không có dữ liệu<center></td></tr>
<?php }}
while($getdlc = mysql_fetch_assoc($TOM_result)){
	
	if($getdlc['tinhtrang'] == 0){
		$tinhtrang = '<span class="c-font-bold text-warning"> Chờ xử lý</span>';
	} elseif($getdlc['tinhtrang'] == 1){
		$tinhtrang = '<span class="c-font-bold text-success"> Hoàn thành</span>';
	} elseif($getdlc['tinhtrang'] == 2){
		$tinhtrang = '<span class="c-font-bold text-danger"> Thất bại</span>';
	} elseif($getdlc['tinhtrang'] == 3){
		$tinhtrang = '<span class="c-font-bold text-danger"> Đã hủy</span>';
	}
?>
                            <tr>
                                <td>#<?php echo $getdlc[id]; ?></td>
<?php if ($getdlc[dichvu] == 1) { ?>
                                <td><a  href="/dich-vu/rut-vang" target="_blank"><?php echo $getdichvu[$getdlc[dichvu]]; ?></a></td>
<?php } ?>
<?php if ($getdlc[dichvu] == 2) { ?>
                                <td><a  href="/dich-vu/ban-ngoc" target="_blank"><?php echo $getdichvu[$getdlc[dichvu]]; ?></a></td>
<?php } ?>
                                <td><span class="c-font-bold text-info"><?php echo number_format($getdlc[trigia]); ?> vàng</span></td>
                                <td><span class="c-font-bold text-danger"> <?php echo $tinhtrang; ?></span></td>
                                <td class="hidden-xs"><?php echo date('d/m/Y H:i:s', $getdlc['thoigian']); ?></td>
                                <td class="action_area_<?php echo $getdlc[id]; ?>" style=" white-space:nowrap;">
                                        <a href="/dich-vu/log/detail/<?php echo $getdlc[id]; ?>" class="btn btn-success c-font-white c-btn-square btn-xs">Chi tiết</a>
                                </td>
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