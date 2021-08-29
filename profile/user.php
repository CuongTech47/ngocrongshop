<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Thông tin cá nhân';
include '../tomdz/header.php';
include '../tomdz/functions.php';
if(!$user_login) { 
header( 'Location: /index.php');
} else {
?>
		<div class="c-layout-page">
		<!-- BEGIN: PAGE CONTENT -->
		<div class="m-t-20 visible-sm visible-xs"></div>

		<center style="max-width:1140px; margin: 0 auto;" class="hidden-xs"><div class="c-layout-breadcrumbs-1 c-bgimage c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="background-image: url('https://shopnro247.com/style/images/cover-2.png');background-position: center;width:100%;height: 350px;background-repeat: no-repeat;background-position: center;background-size: cover;">
		<div class="container">
			<div class="c-page-title c-pull-left">
				<h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">&nbsp;</h3>
			</div>
		</div>
	</div>
</center>
<div class="container c-size-md ">
	<div class="col-md-12">
		<div class="text-center" style="margin-top: -128px;">
			<center>
<?php $thanhvien_array = array("<font color='black'>Thành viên</font>", "<font color='red'>Administrator</font>"); ?>
                        <img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="/style/images/unknown-avatar.png" alt="">
                        <h2 class="c-font-bold c-font-28">ID: <?php echo $tom['ID']; ?></h2>
                        <h2 class="c-font-bold c-font-28"><?php echo $tom['username']; ?></h2>
                        <h2 class="c-font-22"><?=$thanhvien_array[$tom['admin']]?></h2>
                        <h2 class="c-font-22"><?php echo $tom['name']; ?></h2>
                        <h2 class="c-font-22 c-font-red"><?php echo number_format($tom['sodu']); ?>đ</h2>
			</center>

		</div>

	</div>
</div>
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
					<li><a href="/user/profile" class="active">Thông tin tài khoản</a></li>
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
        <h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
        <div class="c-line-left"></div>
    </div>
    <table class="table table-striped">
        <tbody>
            <tr>
                <th scope="row">ID của bạn:</th>
                <th><span class="c-font-uppercase" data-toggle="tooltip" data-placement="top" title="" data-original-title="Đây là ID tài khoản của bạn không phải mã giới thiệu"><?php echo $tom['ID']; ?></span></th>
            </tr>
            <tr>
                <th scope="row">Tên tài khoản:</th>
                <th><?php echo $tom['username']; ?></th>
            </tr>
            <tr>
                <th scope="row">Số dư tài khoản:</th>
                <td><b class="text-danger"><?php echo number_format($tom['sodu']); ?>đ</b></td>
            </tr>
            <tr>
                <th scope="row">Số vàng:</th>
                <td><b class="text-warning"><?php echo number_format($tom['vang']); ?> vàng</b></td>
            </tr>
            <tr>
                <th scope="row">Nhóm tài khoản:</th>
                <td><?=$thanhvien_array[$tom['admin']]?></td>
            </tr>
            <tr>
                <th scope="row">Ngày Tham Gia:</th>
                <td><?php echo date('d/m/Y', $tom['time']); ?></td>
            </tr>
        </tbody>
    </table>
    <!-- END: PAGE CONTENT -->
</div>
    </div>
</div>
<?php 
}
include '../tomdz/footer.php';
?>