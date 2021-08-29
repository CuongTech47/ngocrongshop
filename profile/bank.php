<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Tài khoản ngọc rồng';
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
					<li><a href="/user/change-password" class="">Đổi mật khẩu</a></li>
					<li><a href="/user/notify" class="p-quantity">Thông báo<span id="quantity_noti" class="quantity">0</span></a></li>
					<li><a href="/user/bank" class="active">Tài khoản ngân hàng</a></li>
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
					<li><a href="/user/withdraw" class="">Rút tiền ra ATM - Ví</a></li>


					
					
					
					
					
					
					
				</ul>
			</div>
		</div>
	</div>
</div>            <div class="c-layout-sidebar-content ">
                <!-- BEGIN: PAGE CONTENT -->
                <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
                <div class="c-content-title-1">
                    <h3 class="c-font-uppercase c-font-bold">Tài khoản ngân hàng</h3>
                    <div class="c-line-left"></div>
                </div>
                <button rel="/user/bank/add" class="btn c-btn-blue c-btn-square ajax m-b-20 load-modal">Thêm tài khoản</button>
                <table class="table table-hover table-custom-res">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Chủ tài khoản</th>
                        <th>Số tài khoản/Tài khoản ví</th>
                        <th>Ngân hàng/Ví</th>
                        <th>Thao tác</th>
                    </tr>
                    <tbody>
<?php
$getnganhang = array("Không xác định", "Vũ Trụ 1 Sao", "Vũ Trụ 2 Sao", "Vũ Trụ 3 Sao", "Vũ Trụ 4 Sao", "Vũ Trụ 5 Sao", "Vũ Trụ 6 Sao", "Vũ Trụ 7 Sao", "Vũ Trụ 8 Sao", "Vũ Trụ 9 Sao", "Vũ Trụ 10 Sao", "Vũ Trụ 11 Sao", "Vũ Trụ 12 Sao");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nganhang` WHERE `username` = '".$tom['username']."'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nganhang` WHERE `username` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="5"><center>Không có dữ liệu<center></td></tr>
<?php }
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
                        <tr>
                            <th><?php echo $getdlc[id];?></th>
                            <td><b class="tooltips"><?php echo $getdlc[chubank];?></b></td>
                            <td><?php echo $getdlc[bankname];?></td>
                            <td><?php echo $getnganhang[$getdlc[bankaccount]];?></td>
                            <td><button type="button" class="btn btn-danger c-btn-square btn-xs delete_toggle" rel="<?php echo $getdlc[id];?>" >Xóa</button></td>
                        </tr>
    <!-- delete item Modal -->
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="<?=$home_url;?>/user/bank?id=<?=$getdlc['id']?>" class="form-horizontal"><input type="hidden" name="id" value="<?=$getdlc['id']?>">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận thao tác</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Bạn thực sự muốn xóa tài khoản ngân hàng <?php echo $getdlc[bankname];?> <?php echo $getnganhang[$getdlc[bankaccount]];?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger m-btn m-btn--custom">Xóa</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
                    </tbody>
                </table>
                <!-- END: PAGE CONTENT -->
<?php if ($tong > $kmess){
echo '<center>' . phantrang_dlcdz('?', $start, $tong, $kmess) . '</center>';
} ?>
            </div>
        </div>
    </div>
    <div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
            <div class="modal-content">
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
<?php if($_GET['id']){
$id = intval($_GET['id']);
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nganhang` WHERE `username` = '".$tom['username']."' AND `id`='$id'"), 0);
if($check < 1){
header('Location: /user/bank');
	exit;
} else {
	mysql_query("DELETE FROM `DLC_Nganhang` WHERE `id` = '$id'");
	header('Location: /user/bank');
}
}
	?>
<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>
<?php 
}
include '../tomdz/footer.php';
?>