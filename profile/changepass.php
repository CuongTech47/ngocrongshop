<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Cập nhật mật khẩu';
include '../tomdz/header.php';
include '../tomdz/functions.php';
if(!$user_login) { 
header( 'Location: /');
} else {
?>
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
					<li><a href="/user/change-password" class="active" >Đổi mật khẩu</a></li>
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
					<li><a href="/nap-nhanh" class="">Nạp tự động</a></li>
					<li><a href="/nap-cham" class="">Nạp thẻ chậm</a></li>
					<li><a href="/deposit-history" class="">Thẻ cào đã nạp</a></li>
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
                <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Đổi mật khẩu</h3>
                    <div class="c-line-left"></div>
                </div>
<?php
if(isset($_POST['submit'])) {
$old_password = mysql_real_escape_string($_POST['old_password']);
$password = mysql_real_escape_string($_POST['password']);
$password_confirmation = mysql_real_escape_string($_POST['password_confirmation']);
if (empty($old_password) || empty($old_password) || empty($old_password)) {
echo '<div class="alert alert-danger"> Vui lòng nhập đầy đủ thông tin!</div>';
} elseif ($old_password != $tom[password]) {
echo '<div class="alert alert-danger"> Mật khẩu cũ không chính xác!</div>';
} elseif (strlen($password) < 6 || strlen($password) > 25) {
echo '<div class="alert alert-danger"> Mật khẩu mới phải từ 6 ký tự trở lên và tối đa 25 ký tự!</div>';
} elseif ($password_confirmation != $password) {
echo '<div class="alert alert-danger"> Mật khẩu xác nhận không khớp!</div>';
} elseif ($password == $tom[password]) {
echo '<div class="alert alert-danger"> Mật khẩu mới không được giống mật khẩu cũ!</div>';
} else {
mysql_query("UPDATE `TOM_Users` SET `password` = '".$password."' WHERE `username` = '".$tom[username]."'");
echo '<div class="alert alert-success"> Cập nhật mật khẩu mới thành công!</div>';
}
}
?>
                <form method="POST" action="" class="form-horizontal form-charge">

                <div class="form-group">
                    <label class="col-md-3 control-label">Mật khẩu cũ:</label>
                    <div class="col-md-6">
                        <input class="form-control c-square c-theme " name="old_password" type="password" maxlength="32"
                               placeholder="Mật khẩu hiện tại">

                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label">Mật khẩu mới:</label>
                    <div class="col-md-6">
                        <input class="form-control c-square c-theme " name="password" type="password" maxlength="32"
                               placeholder="Mật khẩu mới">

                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Xác nhận:</label>
                    <div class="col-md-6">
                        <input class="form-control c-square c-theme " name="password_confirmation"  type="password" maxlength="32"
                               placeholder="Xác nhận mật khẩu mới">

                    </div>
                </div>



                <div class="form-group c-margin-t-40">
                    <div class="col-md-offset-3 col-md-6">
                        <button type="submit" name="submit"
                                class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin'></i>">Đổi mật khẩu
                        </button>
                    </div>
                </div>
                </form>

    <!-- END: PAGE CONTENT -->
			<!-- END: PAGE CONTENT -->
</div>
                        <script>
                            $(".form-charge").submit(function(){
                                $('.btn-submit').button('loading');
                            });
                        </script>
<?php 
}
include '../tomdz/footer.php';
?>