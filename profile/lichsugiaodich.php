<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Lịch sử giao dịch';
include '../tomdz/header.php';
include '../tomdz/functions.php';
if(!$user_login) { 
header( 'Location: /');
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
					<li><a href="/user/tran-log" class="active">Lịch sử giao dịch</a></li>

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
					<li><a href="/dich-vu/log" class="">Vàng - ngọc đã mua</a></li>
					<li><a href="/dich-vu/lich-su-thue-dich-vu" class="">Dịch vụ đã thuê</a></li>
					<li><a href="/tran/acc" class="">Tài khoản đã mua</a></li>
					<li><a href="/dich-vu/thanh-ly-nick" class="">Thanh lý nick</a></li>
					<li><a href="/user/tranfer" class="">Chuyển tiền</a></li>
					<li><a href="/user/withdraw" class="">Rút tiền ra ATM - Ví</a></li>
					
				</ul>
			</div>
		</div>
	</div>
</div>			<div class="c-layout-sidebar-content ">
				<!-- BEGIN: PAGE CONTENT -->
				<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
				<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">Lịch sử giao dịch</h3>
					<div class="c-line-left"></div>
				</div>
				<form class="form-horizontal form-find m-b-20" role="form" method="get">

					<div class="row">

						<div class="col-md-4">
							<div class="input-group m-b-10 c-square">
								<span class="input-group-addon" id="basic-addon1">Giao dịch</span>

								<select id="group_id" name="trade_type" class="form-control c-square c-theme">
									<option value="">-- Tất cả --</option>
																			<option value="1"  >Nạp thẻ tự động</option>
																			<option value="2"  >Nạp thẻ chậm</option>
																			<option value="3"  >Chuyển tiền</option>
																			<option value="4"  >Nhận tiền</option>
																			<option value="5"  >Rút tiền</option>
																			<option value="6"  >Thanh toán bán nick</option>
 																			<option value="7"  >Thanh toán dịch vụ</option>
																			<option value="8"  >Mua tài khoản game</option>
																	</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group m-b-10 c-square">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
									 data-rtl="false">
                                    <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
												class="fa fa-calendar"></i></button>
                                    </span>
									<input type="text" class="form-control c-square c-theme" name="started_at"
										   autocomplete="off"  placeholder="Từ ngày" value="">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group m-b-10 c-square">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
									 data-rtl="false">
                                    <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
												class="fa fa-calendar"></i></button>
                                    </span>
									<input type="text" class="form-control c-square c-theme" name="ended_at"
										   autocomplete="off"  placeholder="Đến ngày" value="">
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
							<a class="btn c-btn-square m-b-10 btn-danger" href="<?=$home_url;?>/user/tran-log">Tất cả</a>
						</div>
					</div>


				</form>
				<table class="table table-hover table-custom-res">
					<tbody>
					<tr>
						<th>ID</th>
						<th>Tài khoản</th>
						<th>Giao dịch</th>
						<th>Số tiền</th>
						<th>Số dư cuối</th>
						<th>Mô tả</th>
						<th>Thời gian</th>

					</tr>



					</tbody>
					<tbody>
<?php
$getloaigame = array ("Ngọc rồng online", "Liên Quân Mobile", "Làng Lá Phiêu Lưu Ký", "Ngọc rồng (Random)");
$getgiaodich = array ("Không xác định", "Nạp thẻ tự động", "Nạp thẻ chậm", "Chuyển tiền", "Nhận tiền", "Rút tiền", "Thanh toán bán nick", "Thanh toán dịch vụ", "Mua tài khoản game", "Rút vàng");
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
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Logbalance` WHERE ".$locgiatien."  AND ".$locloaigame." AND `username` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Logbalance` WHERE ".$locgiatien." AND ".$locloaigame." AND `username` = '".$tom['username']."' ORDER by ID DESC LIMIT $start, $kmess");
} else {
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Logbalance` WHERE `username` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Logbalance` WHERE `username` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
}
if ($tong == 0) {
?>
<tr><td colspan="7"><center>Không có dữ liệu<center></td></tr>
<?php }
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
                                    <tr>
                                        <td><?php echo $getdlc[id] ;?></td>
                                        <td><?php echo $getdlc[username] ;?></td>
                                        <td><?php echo $getgiaodich[$getdlc[giaodich]] ;?></td>
                                        <td><?php echo $getdlc[sotien] ;?></td>
                                        <td><?php echo number_format($getdlc[soducuoi]) ;?>đ</td>
                                        <td><?php echo $getdlc[mota] ;?></td>
                                        <td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
                                    </tr>

<?php } ?>
                        </tbody>
                    </table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_dlcdz('?', $start, $tong, $kmess) . '</center>';
} ?>
                    <!-- END: PAGE CONTENT -->                        
                    </div>

                </div>
            </div>
<?php } include '../tomdz/footer.php';?>