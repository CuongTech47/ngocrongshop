Cc <?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Rút tiền';
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
					<li><a href="/tran/acc" class="">Tài khoản đã mua</a></li>
					<li><a href="/dich-vu/thanh-ly-nick" class="">Thanh lý nick</a></li>
					<li><a href="/user/tranfer" class="">Chuyển tiền</a></li>
					<li><a href="/user/withdraw" class="active">Rút Vàng</a></li>


					
					
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div>            <div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Rút Vàng</h3>
                    <div class="c-line-left"></div>
                </div>
                <div class="text-center">
                    <center>
<?php $thanhvien_array = array("<font color='black'>Thành viên</font>", "<font color='red'>Administrator</font>"); ?>
                        <h2 class="c-font-bold c-font-28">ID: <?php echo $tom['ID']; ?></h2>
                        <h2 class="c-font-bold c-font-28"><?php echo $tom['username']; ?></h2>
                        <h2 class="c-font-22"><?=$thanhvien_array[$tom['admin']]?></h2>
                        <h2 class="c-font-22"><?php echo $tom['email']; ?></h2>
                        <h2 class="c-font-22 c-font-red"><?php echo number_format($tom['vang']); ?> vàng</h2>
                    </center>

                </div>
<?php 
if(isset($_POST['submit'])){
$bank_account_id = intval($_POST['bank_account_id']);
$getbank_account = array("Không xác định", "Vũ Trụ 1 Sao", "Vũ Trụ 2 Sao", "Vũ Trụ 3 Sao", "Vụ Trụ 4 Sao", "Vũ Trụ 5 Sao", "Vũ Trụ 6 Sao", "Vũ Trụ 7 Sao", "Vũ Trụ 8 Sao", "Vũ Trụ 9 Sao", "Vũ Trụ 10 Sao", "Vũ Trụ 11 Sao");
$getid = mysql_fetch_assoc(mysql_query("SELECT * FROM `DLC_Nganhang` WHERE `id` = ".$bank_account_id.""));
$captcha = $_POST['captcha'];
$amount = intval($_POST['amount']);
$description = mysql_real_escape_string(strip_tags($_POST['description']));
$tongtien = $amount * (100+35)/100;
$soducuoi = $tom[vang] - $tongtien;
$sovangrut = '<span class="c-font-bold text-danger">-'.number_format($tongtien).'đ</span>';
$mota = 'Rút '.number_format($amount).'vàng về '.$getbank_account[$getid[bankaccount]].'';

	if (empty($amount)) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Bạn chưa nhập vàng để rút </div>';
	} elseif (empty($captcha)) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Bạn chưa nhập mã bảo vệ</div>';
	} elseif (strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){  
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Mã bảo vệ không đúng</div>';		
	} else {
	if ($amount < 20000000 || $amount > 500000000) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Số vàng rút phải trên 20,000,000 và dưới 500,000,000</div>';
	} elseif ($tongtien > $tom[vang]) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Số dư của bạn không đủ để rút</div>';
	} else {
		echo'<div class="alert alert-success alert-dismissible" role="alert">Rút '.number_format($amount).'đ về '.$getbank_account[$getid[bankaccount]].' thành công, vui lòng chờ duyệt</div>';
		mysql_query("UPDATE TOM_Users SET `vang` = `vang` - '".$tongtien."' WHERE `username` = '".$tom['username']."'");
		mysql_query("INSERT INTO DLC_Ruttien SET
		`nguoirut` = '".$tom['username']."',
		`sovang` = '".$amount."',
		`bankname` = '".$getbank_account[$getid[bankaccount]]."',
		`chinhanh` = '".$getid[chinhanh]."',
		`bankaccount` = '".$getid[bankname]."',
		`chubank` = '".$getid[chubank]."',
		`noidung` = '".$description."',
		`tinhtrang` = '0',
		`time` = '".time()."'");
		mysql_query("INSERT INTO DLC_Logbalance SET 
		`username` = '".$tom['username']."',
		`giaodich` = '5',
		`vang` = '".$sotienrut."',
		`soducuoi` = '".$soducuoi."',
		`mota` = '".$mota."',
		`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
		`time` = '".time()."'");
	}
}
}
?>
<form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tài Khoản:</label>
                        <div class="col-md-6">
                            <div class="input-group c-square">
                                <select class="form-control  c-square c-theme" name="bank_account_id" id="bank_account_id">
                                    <option value="">Chọn tài khoản hoặc tên nhân vật nhận vàng</option>
<?php
$getnganhang = array("Không xác định", "Vũ Trụ 1 Sao", "Vũ Trụ 2 Sao", "Vũ Trụ 3 Sao", "Vũ Trụ 4 Sao", "Vũ Trụ 5 Sao", "Vũ Trụ 6 Sao", "Vũ Trụ 7 Sao", "Vũ Trụ 8 Sao", "Vũ Trụ 9 Sao", "Vũ Trụ 10 Sao", "Vũ Trụ 11 Sao", "Vũ Trụ 12 Sao");
$TOM_result = mysql_query("SELECT * FROM `DLC_Nganhang` WHERE `username` = '".$tom['username']."'");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
                                    <option value="<?php echo $getdlc[id];?>"><?php if ($getdlc[type] ==0) { ?> <?php echo $getdlc[chubank];?> - <?php } ?><?php echo $getdlc[bankname];?> - <?php echo $getnganhang[$getdlc[bankaccount]];?></option>
<?php } ?>
                                </select>
                                <span class="input-group-btn">
                                <button class="btn btn-success c-font-dark load-modal" rel="/user/bank/add">Thêm mới</button>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="block-load-info"></div>
                    <div class="form-group c-margin-t-40">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" name="submit" id="btn-confirm" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" disabled="">Thực hiện</button>
                        </div>
                    </div>
                </form>
                        <script>
                            $(".form-charge").submit(function(){
                                $('.btn-submit').button('loading');
                            });
                        </script>

                <table class="table table-striped table-custom-res">
                    <tbody>
                    <tr>
			<th>Thời gian</th>
                        <th>ID</th>
                        <th>Chủ tài khoản</th>
                        <th>Tài Khoản/Tên Nhân Vật</th>
                        <th>Sever</th>
                        <th>Số Vàng</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                    </tr>
                    </tbody>
<?php
$getbank_account = array("Không xác định", "Vũ Trụ 1", "Vũ Trụ 2", "Vũ Trụ 3");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Ruttien` WHERE `nguoirut` = '".$tom['username']."'"), 0);
$DLC_result = mysql_query("SELECT * FROM `DLC_Ruttien` WHERE `nguoirut` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="8"><center>Không có dữ liệu<center></td></tr>
<?php }
while($getdlc = mysql_fetch_assoc($DLC_result)){
if($getdlc['tinhtrang'] == 0){
$tinhtrang = '<button type="submit" class="btn btn-xs c-btn-square m-b-10 btn-warning">Chờ xử lý</button>';
} elseif($getdlc['tinhtrang'] == 1){
$tinhtrang = '<button type="submit" class="btn btn-xs c-btn-square m-b-10 btn-success">Thành công</button>';
} elseif($getdlc['tinhtrang'] == 2){
$tinhtrang = '<button type="submit" class="btn btn-xs c-btn-square m-b-10 btn-danger">Thất bại</button>';
} elseif($getdlc['tinhtrang'] == 3){
$tinhtrang = '<button type="submit" class="btn btn-xs c-btn-square m-b-10 btn-danger">Đã hủy</button>';
}
?>
                    </tr>
                        <td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
                        <td><?php echo $getdlc[id]; ?></td>
                        <td><?php echo $getdlc[chubank]; ?></td>
                        <td><?php echo $getdlc[bankaccount]; ?></td>
                        <td><?php echo $getdlc[bankname]; ?></td>
                        <td><?php echo number_format($getdlc[vang]); ?>vang</td>
                        <td><?php echo $getdlc[noidung]; ?></td>
                        <td><?php echo $tinhtrang; ?></td>
                    </tr>
<?php } ?>
                    </tbody>
                </table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
                <div class="data_paginate paging_bootstrap paginations_custom" style="text-align: center">
                    
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

    <!-- delete item Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận thao tác</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn thực sự muốn hủy lệnh rút vàng?
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id" value=""/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-danger m-btn m-btn--custom">Xác nhận</button>
                </div>
                </form>
</div>
    </div>
</div>
    <script>
        $(document).ready(function () {
            $('.load-modal').each(function (index, elem) {
                $(elem).unbind().click(function (e) {

                    e.preventDefault();
                    var curModal = $('#LoadModal');
                    curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                    curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
                });
            });

            $('#bank_account_id').on('change', function (e) {

                var bank_account_id = this.value;
                if (bank_account_id != "") {
                    $.get('/user/withdraw-load-info?id=' + bank_account_id,

                        function (data) {

                            $('.block-load-info').html(data);
                            $('#btn-confirm').prop("disabled", false); // Element(s) are now enabled.

                        })
                        .done(function () {
                        })
                        .fail(function () {
                            alert('Không tìm thấy thông tin tài khoản đã lưu');
                        })
                }
                else {
                    $('.block-load-info').html("");
                    $('#btn-confirm').prop("disabled", true); // Element(s) are now enabled.
                }

            });


            //delete button
            $('.delete_toggle').each(function (index, elem) {
                $(elem).click(function (e) {

                    e.preventDefault();
                    $('#deleteModal .id').attr('value', $(elem).attr('rel'));
                    $('#deleteModal').modal('toggle');
                });
            });


        });


    </script>
<?php 
}
include '../tomdz/footer.php';
?>