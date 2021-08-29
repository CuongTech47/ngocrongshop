<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Thông tin dịch vụ #'.intval($_GET['id']).'';
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
<?php
if($_GET['id']) {
    $id = intval($_GET['id']);
    $getdichvu = array("Không xác định", "Săn Đệ Tử Thuê", "Úp Bí Kiếp - Cải Trang Yardat");
    $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `Service` WHERE `username` = '".$tom['username']."' AND `ID` = '".$id."'"), 0);
    if($check >= 1) {
include '../tomdz/header.php';
        $result = mysql_query("SELECT * FROM `Service` WHERE `username` = '".$tom['username']."' AND `ID` = '$id' LIMIT 1");
        while($row = mysql_fetch_assoc($result)) {
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
					<li><a href="/nap-cham" class="">Nạp thẻ</a></li>
					<li><a href="/deposit-history" class="">Thẻ cào đã nạp</a></li>
					<li><a class="load-modal" rel="/atm.php">Nạp tiền từ ATM/Ví</a></li>
					<li><a href="/dich-vu/lich-su-mua-ten-mien" class="">Lịch sử mua tên miền</a></li>
					<li><a href="/dich-vu/hosting" class="">Lịch sử mua hosting</a></li>
					<li><a href="/dich-vu/lich-su-mua-kc-ff" class="">Lịch sử mua kim cương</a></li>

					<li><a href="/user/tranfer" class="">Chuyển tiền</a></li>


					
					
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div> 
        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY-2 -->
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Chi tiết yêu cầu #<?php echo $row['ID']; ?></h3>
                <div class="c-line-left"></div>
            </div>
            <div class="padding-left" style="font-family: Roboto, sans-serif;">
                <div>
                    <div class="download-cv">
                        <?php if($row['status'] == '1') { ?>
                        <?php } ?> 
                    </div>
                </div>
                <div class="cand-details" id="about" style="float: left;width: 100%">
                    <h2>Tên game</h2>
                     Ngọc Rồng Online
                    <h2>Công việc</h2>
                    <div class="edu-history-sec" id="education">
                        <div class="edu-history">
                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                            <div class="edu-hisinfo">
                                <h3>Đơn Hàng Dịch Vụ - <?php echo $row['title']; ?></h3>
                                <i><?php echo number_format($row['price']) ;?> VNĐ</i>
                            </div>
                        </div>
                    </div>
                    <h2>Thông tin đính kèm</h2>
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                            <thead class="m-datatable__head">
                            <tr class="m-datatable__row">
                                <th style="width:50px;" class="m-datatable__cell">
                                    #
                                </th>
                                <th class="m-datatable__cell">
                                    Tên thông tin
                                </th>
                                <th style="width:150px;" class="m-datatable__cell">
                                    Nội dung
                                </th>
                            </tr>
                            </thead>
                            <tbody class="m-datatable__body">
                                </tr>
                                <tr>
                                    <td> 1 </td>
                                    <td> Server:</td>
                                    <td> Vũ Trụ <?php echo $row['server']; ?> Sao</td> </td>
                                </tr>
                                <tr>
                                    <td> 2 </td>
                                    <td> Tài Khoản: </td>
                                    <td><?php echo $row['acc_name']; ?></td>
                                </tr>
                                <tr>
                                    <td> 3 </td>
                                    <td> Mật Khẩu: </td>
                                    <td><?php echo $row['acc_pass']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="m-separator m-separator--dashed"></div>
                    <div style="text-align: right">
                        <?php if($row['status'] == 1) { ?>
                        <!--<button class="btn btn-brand btn-edit" id="btn-edit">Chỉnh sửa thông tin</button>
                        <div class="modal fade" id="edit_info" role="dialog" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
<?php
if(isset($_POST['d3'])){
	$customer_data0 = mysql_real_escape_string($_POST['customer_data0']);
	$customer_data1 = mysql_real_escape_string($_POST['customer_data1']);
	if(empty($customer_data1) || empty($customer_data0)){
	    echo 'Chưa Nhập Namesever';
	}else{
mysql_query("UPDATE `Service` SET acc_game = '".$customer_data0."' AND acc_pass = '".$customer_data1."' WHERE `username` = '".$tom['username']."'");
echo 'Thành Công';
}
}
?>
                                    <form method="POST" accept-charset="UTF-8" class="m-form">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;text-align: center">Chỉnh sửa thông tin</h4>
                                    </div>
                                    <div class="modal-body">
                                        <span class="mb-15 control-label bb">Namesever1:</span>
                                        <div class="mb-15">
                                            <input type="text" name="customer_data0" value="<?php echo $row['acc_name']; ?>" class="form-control t14 " placeholder="Namesever1" >
                                        </div>
                                        <span class="mb-15 control-label bb">Namesever 2:</span>
                                        <div class="mb-15">
                                            <input type="text" name="customer_data1" value="<?php echo $row['acc_pass']; ?>" class="form-control t14 " placeholder="Namsever2">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" name="d3" style="">Cập nhật</button>
                                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php } ?> -->
                    </div>
                    <h2>Tiến Độ</h2>
                    <div class="edu-history-sec" id="experience">
                        <div class="edu-history style2">
                            <i></i>
                            <div class="edu-hisinfo">
                                <h3>Đang chờ</h3>
                                <i><?php echo date('d/m/Y H:i:s', $row['time']); ?></i>
                            </div>
                        </div>
                        <?php if($row['time_duyet'] == '0') { ?>
                        <?php } else { ?>
                        <div class="edu-history style2">
                            <i></i>
                            <div class="edu-hisinfo">
                                <h3><?php if($row['status'] == '0') {
	    echo '<span class="c-font-bold text-danger"> Đã hủy</span>';
	 } if($row['status'] == '1') {
	    echo '<span class="c-font-bold text-wait"> Đang chờ</span>';
	 } if($row['status'] == '2') {
	    echo '<span class="c-font-bold text-wait"> Đang thực hiện</span>';
	 } if($row['status'] == '3') {
	    echo '<span class="c-font-bold text-danger"> Từ chối</span>';
	 } if($row['status'] == '4') {
	    echo '<span class="c-font-bold text-primary"> Hoàn Thành</span>';
	 } if($row['status'] == '5') {
	    echo '<span class="c-font-bold text-danger"> Thất bại</span>';
	    
	} ;?> <?php if($row['status'] == '0' OR $row['status'] == '3') { ?>-:- [Lỗi bởi: <?php if($row['mistake_by'] == '0') {
	    echo 'QTV';
	 } if($row['mistake_by'] == '1') {
	    echo 'Khách';
	 } if($row['mistake_by'] == '3    ') {
	    echo 'Game';
	};?>] - <?php echo $row['note']; ?><?php } ?></h3>
                                <i><?php echo date('d/m/Y H:i:s', $row['time_duyet']); ?></i>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div style="text-align: right">
                    </div>
                </div>
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

            $(document).ready(function () {
                $('#btn-edit').click(function () {

                    $('#edit_info').modal('show');
                });
                $('#btnDestroy').click(function (e) {

                    $('#destroyModal').modal('show');
                });
            });
        });
    </script>

			<!-- END: PAGE CONTENT -->
</div>
<?php 
}
}
include '../tomdz/footer.php';
} else {
    require '../error/404.php';
}
}
?>