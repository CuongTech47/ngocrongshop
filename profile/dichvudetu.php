<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Lịch Sử Thuê Dịch Vụ';
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
<div class="c-layout-page">
	<!-- BEGIN: PAGE CONTENT -->
		<!-- BEGIN: PAGE CONTENT -->

	<div class="c-layout-page" style="margin-top: 20px;">
		<div class="container">
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
					<h3 class="c-font-uppercase c-font-bold">Lịch Sử Dịch Vụ Đã Thuê</h3>
					<div class="c-line-left"></div>
				</div>
            <form class="form-horizontal form-find m-b-20" role="form" method="get">
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square ">
                            <span class="input-group-addon" id="basic-addon1">Mã ID #</span>
                            <input type="text" class="form-control c-square c-theme" name="id" value="<?php echo $_GET['id']; ?>" autofocus placeholder="Mã ID">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <span class="input-group-addon" id="basic-addon1">Danh mục</span>
                            <select  name="group_id" class="form-control c-square c-theme">
                                <option value="">-- Tất cả các dich vụ --</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <span class="input-group-addon" id="basic-addon1">Trạng thái</span>
                            <select class="form-control c-square c-theme" name="status">
                                <option value="" <?php if($_GET['status'] == '') { echo 'selected'; } ?>>-- Tất cả trạng thái --</option>
                                <option value="0" <?php if($_GET['status'] == '0') { echo 'selected'; } ?>>Đã hủy</option>
                                <option value="1" <?php if($_GET['status'] == '1') { echo 'selected'; } ?>>Đang chờ</option>
                                <option value="2" <?php if($_GET['status'] == '2') { echo 'selected'; } ?>>Đang thực hiện</option>
                                <option value="3" <?php if($_GET['status'] == '3') { echo 'selected'; } ?>>Từ chối</option>
                                <option value="4" <?php if($_GET['status'] == '4') { echo 'selected'; } ?>>Đang Hoạt Động</option>
                                <option value="5" <?php if($_GET['status'] == '5') { echo 'selected'; } ?>>Thất bại</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <input type="text" class="form-control c-square c-theme" name="started_at" autocomplete="off" autofocus placeholder="Từ ngày" value="<?php echo $_GET['started_at']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group m-b-10 c-square">
                            <div class="input-group date date-picker" data-date-format="dd/mm/yyyy" data-rtl="false">
                                <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i class="fa fa-calendar"></i></button>
                                </span>
                                <input type="text" class="form-control c-square c-theme" name="ended_at" autocomplete="off" placeholder="Đến ngày" value="<?php echo $_GET['ended_at']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
                        <a class="btn c-btn-square m-b-10 btn-danger" href="<?php echo $data_site['url_website']; ?>/dich-vu/log">Tất cả</a>
                    </div>
                </div>
            </form>
            <table class="table table-hover table-custom-res">
                <thead>
                <tr>
                    <th class="hidden-xs">Thời gian</th>
                    <th>ID</th>
                    <th>Tên game</th>
                    <th>Danh mục</th>
                    <th>Trị giá</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Service` WHERE `username` = '".$tom['username']."'"), 0);
                    $result = mysql_query("SELECT * FROM `Service` WHERE `username` = '".$tom['username']."' ORDER by ID DESC LIMIT 0, 100000000");
                    if ($tong == 0) {
                        echo '<tr><td colspan="7"><center>Không có dữ liệu<center></td></tr>';
                    }
                    while($row = mysql_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td class="hidden-xs"><?php echo date('d/m/Y H:i:s', $row['time']); ?></td>
                        <td>#<?php echo $row['ID'];?></td>
                        <td><a href="NRO" target="_blank">Ngọc Rồng Online</a></td>
                        <td><a href="Dịch Vụ Game" target="_blank">Dịch Vụ Ngọc Rồng</a></td>
                        <td><span class="c-font-bold text-info"><?php echo number_format($row['price']);?></span></td>
                        <td><?php if($row['status'] == '0') {
	    echo  '<span class="c-font-bold text-danger"> Đã hủy</span>';
	 } if($row['status']  == '1') {
	    echo  '<span class="c-font-bold text-wait"> Đang chờ</span>';
	 } if($row['status'] == '2') {
	    echo  '<span class="c-font-bold text-wait"> Đang thực hiện</span>';
	 } if($row['status'] == '3') {
	    echo  '<span class="c-font-bold text-danger"> Từ chối</span>';
	 } if($row['status'] == '4') {
	    echo  '<span class="c-font-bold text-muakcff"> Đang Hoạt Động</span>';
	 } if($row['status'] == '5') {
	    echo  '<span class="c-font-bold text-danger"> Thất bại</span>';
	} ;?></td>
                        <td class="action_area_<?php echo $row['ID'];?>" style=" white-space:nowrap;"><a href="/thongtin.php?id=<?php echo $row['ID'];?>" class="btn btn-success c-font-white c-btn-square btn-xs">Chi tiết</a></td>
                    </tr>
                    <?php } ?>
                </tbody>
                </table>
            <!-- END: PAGE CONTENT -->
            <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                <?php 
                if ($tong > $kmess) {
                    if(isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $group_id = $_GET['group_id'];
                        $status = $_GET['status'];
                        $started_at = $_GET['started_at'];
                        $ended_at = $_GET['ended_at'];
                        echo '<center>' . phantrang_tomdz('?id='.$id.'&group_id='.$group_id.'&status='.$status.'&started_at='.$started_at.'&ended_at='.$ended_at.'&', $start, $tong, $kmess) . '</center>';
                    } else {
                        echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- END: PAGE CONTENT -->
    <div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.load-modal').on('click', function (e) {
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(this).attr('rel'));
            });


        });
    </script>

			<!-- END: PAGE CONTENT -->
</div>
<?php 
}
include '../tomdz/footer.php';
?>