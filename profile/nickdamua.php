<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Dịch vụ đã thanh toán';
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
					<li><a href="/dich-vu/log" class="">Dịch vụ đã mua</a></li>
					<li><a href="/tran/acc" class="active">Tài khoản đã mua</a></li>
					<li><a href="/dich-vu/thanh-ly-nick" class="">Thanh lý nick</a></li>
					<li><a href="/user/tranfer" class="">Chuyển tiền</a></li>
					<li><a href="/user/withdraw" class="">Rút tiền ra ATM - Ví</a></li>


					
					
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div>  
       <div class="c-layout-sidebar-content ">
                    <!-- BEGIN: PAGE CONTENT -->
                    <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY-2 -->
<?php
include '../checknick.php';
if(isset($_POST['id'])){
$id = intval($_POST['id']);
$tomdz = mysql_fetch_array(mysql_query("SELECT * FROM `TOM_Nick` WHERE `ID` = '$id' LIMIT 1"));
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `ID`='$id'"), 0);
if(empty($_SESSION['FBID'])){ 
echo '<div class="alert alert-danger"> Vui lòng đăng nhập để mua nick</div>';
} elseif($check < 1){
echo '<div class="alert alert-danger"> Tài khoản này không tồn tại trên hệ thống</div>';
} elseif ($tom['sodu'] < $tomdz['giatien']) {
echo '<div class="alert alert-danger"> Tài khoản của bạn không đủ tiền vui lòng nạp thêm</div>';
} else {
$login = new Login($tomdz['taikhoan'], $tomdz['matkhau'], $tomdz['server']);
if ($login->nickname) {
mysql_query("INSERT INTO DLC_Nickdamua SET 
`idnick` = '".$tomdz['ID']."',
`nguoimua` = '".$tom['username']."',
`loaigame` = '0',
`nguoiban` = '".mysql_real_escape_string($tomdz['congtacvien'])."',
`taikhoan` = '".mysql_real_escape_string($tomdz['taikhoan'])."',
`matkhau` = '".mysql_real_escape_string($tomdz['matkhau'])."',
`server` = '".intval($tomdz['server'])."', 
`trigia` = '".intval($tomdz['giatien'])."', 
`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
`time` = '" . time() . "'");
$sotientt = '<span class="c-font-bold text-danger">-'.number_format($tomdz['giatien']).'đ</span>';
$soducuoi = $tom[sodu] - $tomdz['giatien'];
$mota = 'Mua tài khoản game Ngọc rồng giá '.number_format($tomdz['giatien']).'đ';
mysql_query("INSERT INTO DLC_Logbalance SET 
`username` = '".$tom['username']."',
`giaodich` = '8',
`sotien` = '".$sotientt."',
`soducuoi` = '".$soducuoi."',
`mota` = '".$mota."',
`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
`time` = '".time()."'");
mysql_query("DELETE FROM `TOM_Nick` WHERE `ID` = '$id'");
mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` - '".intval($tomdz['giatien'])."' WHERE `ID` = '".$_SESSION['FBID']."'");
$thucnhan = $tomdz['giatien'] * (100-35)/100;
mysql_query("UPDATE TOM_Congtacvien SET `doanhthu` = `doanhthu` + '".intval($thucnhan)."' WHERE `user` = '".$tomdz['congtacvien']."'");
mysql_query("UPDATE TOM_Congtacvien SET `sonickban` = `sonickban` + '1' WHERE `user` = '".$tomdz['congtacvien']."'");
mysql_query("UPDATE TOM_Congtacvien SET `nickdangban` = `nickdangban` - '1' WHERE `user` = '".$tomdz['congtacvien']."'");
echo '<div class="alert alert-success"> Mua thành công tài khoản #'.$id.', check acc tại đây</div>';
} else {
?>
<div class="alert alert-danger"> <?php echo $login->msg;?></div>
<?php
}
}
}
if(isset($_POST['idrd'])){
$id = intval($_POST['idrd']);
$tomdz = mysql_fetch_array(mysql_query("SELECT * FROM `DLC_Nickrd` WHERE `ID` = '$id' LIMIT 1"));
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrd` WHERE `ID`='$id'"), 0);
if(empty($_SESSION['FBID'])){ 
echo '<div class="alert alert-danger"> Vui lòng đăng nhập để mua nick</div>';
} elseif($check < 1){
echo '<div class="alert alert-danger"> Tài khoản này không tồn tại trên hệ thống</div>';
} elseif ($tom['sodu'] < $tomdz['giatien']) {
echo '<div class="alert alert-danger"> Tài khoản của bạn không đủ tiền vui lòng nạp thêm</div>';
} else {
mysql_query("INSERT INTO DLC_Nickdamua SET 
`idnick` = '".$tomdz['ID']."',
`nguoimua` = '".$tom['username']."',
`loaigame` = '3',
`nguoiban` = '".mysql_real_escape_string($tomdz['congtacvien'])."',
`taikhoan` = '".mysql_real_escape_string($tomdz['taikhoan'])."',
`matkhau` = '".mysql_real_escape_string($tomdz['matkhau'])."',
`trigia` = '".intval($tomdz['giatien'])."', 
`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
`time` = '" . time() . "'");
$sotientt = '<span class="c-font-bold text-danger">-'.number_format($tomdz['giatien']).'đ</span>';
$soducuoi = $tom[sodu] - $tomdz['giatien'];
$mota = 'Mua tài khoản game Ngọc rồng(Random) giá '.number_format($tomdz['giatien']).'đ';
mysql_query("INSERT INTO DLC_Logbalance SET 
`username` = '".$tom['username']."',
`giaodich` = '8',
`sotien` = '".$sotientt."',
`soducuoi` = '".$soducuoi."',
`mota` = '".$mota."',
`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
`time` = '".time()."'");
mysql_query("DELETE FROM `DLC_Nickrd` WHERE `ID` = '$id'");
mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` - '".intval($tomdz['giatien'])."' WHERE `ID` = '".$_SESSION['FBID']."'");
$thucnhan = $tomdz['giatien'] * (100-35)/100;
mysql_query("UPDATE TOM_Congtacvien SET `doanhthu` = `doanhthu` + '".intval($thucnhan)."' WHERE `user` = '".$tomdz['congtacvien']."'");
mysql_query("UPDATE TOM_Congtacvien SET `sonickban` = `sonickban` + '1' WHERE `user` = '".$tomdz['congtacvien']."'");
mysql_query("UPDATE TOM_Congtacvien SET `nickdangban` = `nickdangban` - '1' WHERE `user` = '".$tomdz['congtacvien']."'");
echo '<div class="alert alert-success"> Mua thành công tài khoản random NRO #'.$id.', check acc tại đây</div>';
}
}
?>   
                    <div class="c-content-title-1">
                        <h3 class="c-font-uppercase c-font-bold">Tài khoản đã mua</h3>
                        <div class="c-line-left"></div>
                    </div>
                    <form class="form-horizontal form-find m-b-20" role="form" method="POST">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group m-b-10 c-square">
                                    <span class="input-group-addon" id="basic-addon1">Game</span>

                                    <select name="loaigame" class="form-control c-square c-theme">
                                        <option value="0">-- Tất cả các game --</option>
                                        <option value="1"> Ngọc Rồng Online</option>
                                        <option value="2"> Liên Quân Mobile</option>
                                        <option value="3"> Làng Lá Phiêu Lưu Ký</option>
                                        <option value="4"> Ngọc Rồng (Random)</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group m-b-10 c-square">
                                    <span class="input-group-addon" id="basic-addon1">Số tiền</span>
                                    <select name="locgia" class="form-control c-square c-theme">
                                        <option value="0">Chọn giá tiền</option>
                                        <option value="1" >Dưới 50K</option>
                                        <option value="2" >Từ 50K - 200K</option>
                                        <option value="3" >Từ 200K - 500K</option>
                                        <option value="4" >Từ 500K - 1 Triệu</option>
                                        <option value="5" >Trên 1 Triệu</option>
                                        <option value="6" >Trên 5 Triệu</option>
                                        <option value="7" >Trên 10 Triệu</option>
                                    </select>
                                </div>

                            </div>   
                            <div class="col-md-4">
                                <input type="submit" name="timkiem" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                                <a class="btn c-btn-square m-b-10 btn-danger" href="<?=$home_url;?>/tran/acc">Tất cả</a>
                        </div>
                        </div>
                    </form>
                    <table class="table table-hover table-custom-res" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Game</th>
                            <th>Tài khoản</th>
                            <th>Trị giá</th>
                            <th>Thời gian</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
$getloaigame = array ("Ngọc rồng online", "Liên Quân Mobile", "Làng Lá Phiêu Lưu Ký", "Ngọc rồng (Random)");
if (isset($_POST['timkiem'])) {
$loaigame = intval($_POST['loaigame']);
if($loaigame == 0){
 $locloaigame = "`loaigame` >= '0' AND `loaigame` <= '3'";
}elseif($loaigame == 1){
 $locloaigame = "`loaigame` = '0'";
}elseif($loaigame == 2){
 $locloaigame = "`loaigame` = '1'";
}elseif($loaigame == 3){
 $locloaigame = "`loaigame` = '2'";
}elseif($loaigame == 4){
 $locloaigame = "`loaigame` = '3'";
}
$locgia = intval($_POST['locgia']);
if($locgia == 0){
 $locgiatien = "`trigia` >= '0' AND `trigia` <= '100000000'";
}elseif($locgia == 1){
 $locgiatien = "`trigia` < '50000'";
}elseif($locgia == 2){
 $locgiatien = "`trigia` >= '50000' AND `trigia` <= '200000'";
}elseif($locgia == 3){
 $locgiatien = "`trigia` >= '200000' AND `trigia` <= '500000'";
}elseif($locgia == 4){
 $locgiatien = "`trigia` >= '500000' AND `trigia` <= '1000000'";
}elseif($locgia == 5){
 $locgiatien = "`trigia` > '1000000'";
}elseif($locgia == 6){
 $locgiatien = "`trigia` > '5000000'";
}elseif($locgia == 7){
 $locgiatien = "`trigia` > '10000000'";
}
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE ".$locgiatien."  AND ".$locloaigame." AND `nguoimua` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickdamua` WHERE ".$locgiatien." AND ".$locloaigame." AND `nguoimua` = '".$tom['username']."' ORDER by ID DESC LIMIT $start, $kmess");
} else {
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `nguoimua` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickdamua` WHERE `nguoimua` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="6"><center>Không có dữ liệu<center></td></tr>
<?php }
}
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
                                    <tr>
                                        <td><?php echo $getdlc[id] ;?></td>
                                        <td><?php echo $getloaigame[$getdlc[loaigame]] ;?></td>
                                        <td><?php echo $getdlc[taikhoan] ;?></td>
                                        <td><?php echo number_format($getdlc[trigia]) ;?>đ</td>
                                        <td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
                                        <td class="action_area_<?php echo $getdlc[id] ;?>"><button type="button" class="btn c-bg-dark c-font-white c-btn-square btn-xs  load-modal" rel="/tran/acc/check-login?id=<?php echo $getdlc[id] ;?>">Check mật khẩu</button></td>
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