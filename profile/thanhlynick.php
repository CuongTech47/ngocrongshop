
<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
$title = 'Thanh lý nick ngọc rồng';
include '../tomdz/header.php';
include '../tomdz/functions.php';
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
</div>	
<div class="c-layout-sidebar-content ">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Thanh lý nick</h3>
                    <div class="c-line-left"></div>
                </div>
                <div class="text-center">
                    <center>
<?php $thanhvien_array = array("<font color='black'>Thành viên</font>", "<font color='red'>Administrator</font>"); ?>
                        <h2 class="c-font-bold c-font-28">ID: <?php echo $tom['ID']; ?></h2>
                        <h2 class="c-font-bold c-font-28"><?php echo $tom['username']; ?></h2>
                        <h2 class="c-font-22"><?=$thanhvien_array[$tom['admin']]?></h2>
                        <h2 class="c-font-22"><?php echo $tom['name']; ?></h2>
                        <h2 class="c-font-22 c-font-red"><?php echo number_format($tom['sodu']); ?>đ</h2>
                    </center>

                </div>
           <div class="alert alert-info alert-dismissible" role="alert">
             <b>Những lưu ý khi thanh lý nick cho Admin: </b><br>
– Không nhập các tài khoản có dạng như sđt thật, tên miền thật<br>
– Chỉ nhập nick có đệ tử, các nick không có đệ tử sẽ không nhập<br>
- Cố ý nhập tài khoản sai nhiều lần tài khoản sẽ bị khóa vĩnh viễn
           				</div>

<?php 
if(isset($_POST['thanhlynick'])) {
    include '../cpctv/class.login.php'; // khai báo tới file check login
	$taikhoan = mysql_real_escape_string($_POST['taikhoan']);
	$matkhau = mysql_real_escape_string($_POST['matkhau']);	
	$noidung = strip_tags(mysql_real_escape_string($_POST['noidung']));	
	$server = intval($_POST['server']);
	$login = new Login($taikhoan, $matkhau, $server);
	if(empty($taikhoan) || empty($matkhau)) {
	echo '<div class="alert alert-danger"> Xin vui lòng nhập đầy đủ thông tin!</div>';
	}elseif($login->nickname) {
	echo '<div class="alert alert-success"> Bạn thanh lý nick thành công, xin chờ Admin duyệt!</div>';
	mysql_query("INSERT INTO DLC_Nhapnick SET 
	`nguoiban` = '".$tom[username]."',
	`taikhoan` = '".$taikhoan."',
	`matkhau` = '".$matkhau."',
	`server` = '".$server."',
	`noidung` = '".$noidung."',
	`tinhtrang` = '0',
	`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
	`time` = '".time()."'");
	}else{ 
	?>
<div class="alert alert-danger"><?php echo $login->msg;?>
</div>
<?php
}
}
?>

    <form class="form-horizontal" method="POST">	
        <div class="form-group">
            <label class="col-md-3 control-label">Tài khoản:</label>
            <div class="col-md-6">
                <input class="form-control c-square c-theme" type="text" name="taikhoan" placeholder="Nhập tài khoản nick cần thanh lý ..." required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mật khẩu:</label>
            <div class="col-md-6">
                <input class="form-control c-square c-theme"  type="password" name="matkhau" placeholder="Nhập mật khẩu nick cần thanh lý ..." required="required">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Server:</label>
            <div class="col-md-6">
					<select class="form-control c-square c-theme" name="server">
					<option value="1">Vũ trụ 1 Sao</option>
					<option value="2">Vũ trụ 2 Sao</option>
					<option value="3">Vũ trụ 3 Sao</option>
					<option value="4">Vũ trụ 4 Sao</option>
					<option value="5">Vũ trụ 5 Sao</option>
					<option value="6">Vũ trụ 6 Sao</option>
					<option value="7">Vũ trụ 7 Sao</option>
					</select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Nội dung:</label>
            <div class="col-md-6">
                <input class="form-control c-square c-theme"  type="text" name="noidung" placeholder="Nhập nội dung gửi cho admin nếu cần thiết ..." required="required">
            </div>
        </div>
        <div class="form-group c-margin-t-40">
            <div class="col-md-offset-3 col-md-6">
                <button type="submit" name="thanhlynick" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">THỰC HIỆN</button>
            </div>
        </div>
        <br>

    </form>
           <!-- END: PAGE CONTENT -->
				<table class="table table-hover table-custom-res">
               <tr>
                   <th>Oders #</th>
                   <th>Tài Khoản</th>
                   <th>Server</th>
                   <th>Số Tiền</th>
                   <th>Nội dung</th>
                   <th>Trạng thái</th>
                   <th>Thời gian</th>
               </tr>
               <tbody>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nhapnick` WHERE `nguoiban` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nhapnick` WHERE `nguoiban` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="8"><center>Không có dữ liệu<center></td></tr>
<?php }
while($getdlc = mysql_fetch_assoc($TOM_result)){
if($getdlc['tinhtrang'] == 0){
	$tinhtrang = '<span class="label label-warning"> Đang xử lý </span>';
} elseif($getdlc['tinhtrang'] == 1){
	$tinhtrang = '<span class="label label-success"> Thành công </span>';
} elseif($getdlc['tinhtrang'] == 2){
	$tinhtrang = '<span class="label label-danger"> Tài khoản sai </span>';
} elseif($getdlc['tinhtrang'] == 3){
	$tinhtrang = '<span class="label label-danger"> Thất bại </span>';
}
?>
               <tr>
                   <th scope="row"># <?php echo $getdlc['ID']; ?></th>
                   <td><?php echo $getdlc['taikhoan']; ?></td>
                   <td><?php echo $getdlc['server']; ?> Sao</td>
                   <td><?php if($getdlc['giatien'] == 0) { ?> Chưa thanh toán<?php } else { ?><?php echo number_format($getdlc['giatien']); ?> <sup>VNĐ</sup><?php } ?></td>
                   <td><?php echo $getdlc['noidung']; ?></td>
                   <td><?php echo $tinhtrang; ?></td>
                   <td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>

               </tr>                                  
<?php } ?>
                                   </tbody>
           </table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_dlcdz('?', $start, $tong, $kmess) . '</center>';
} ?>
       </div>
       <div class="col-md-12">


</div>
   </div>
</div>

</div>
<?php include '../tomdz/footer.php'; ?>