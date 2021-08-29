<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Nạp chậm';
include '../tomdz/header.php';
include '../tomdz/functions.php';
if(!$user_login) { 
header( 'Location: /');
} elseif ($system['napthe'] == 1) {
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
					<li><a href="/nap-cham" class="active">Nạp thẻ chậm</a></li>
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
</div>		
<div class="c-layout-sidebar-content ">
    <!-- BEGIN: PAGE CONTENT -->
    <!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
    <div class="c-content-title-1">
        <h3 class="c-font-uppercase c-font-bold">Nạp chậm</h3>
        <div class="c-line-left"></div>
    </div>
<p id="notice"></p>
<div class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label">Tài khoản:</label>
<div class="col-md-6">
<p class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $tom['username']; ?></p>
</div>
</div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mệnh giá:</label>
            <div class="col-md-6">
                    <select class="form-control  c-square c-theme" id="type">
			<option value="VIETTEL">VIETTEL</option>
			<option value="VINAPHONE">VINAPHONE</option>
			<option value="MOBIFONE">MOBIFONE</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mã số thẻ:</label>
            <div class="col-md-6">
                <input class="form-control  c-square c-theme" type="text" placeholder="Nhập mã số sau lớp bạc mỏng" id="mathe">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Số serial:</label>
            <div class="col-md-6">
                <input class="form-control  c-square c-theme" type="text" placeholder="Nhập mã serial nằm sau thẻ" id="seri">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Mệnh giá:</label>
            <div class="col-md-6">
                    <select class="form-control  c-square c-theme" id="menhgia">
			<option value="15125125125" selected="selected">Chọn mệnh giá</option>
			<option value="0">10,000</option>
			<option value="1">20,000</option>
			<option value="2">30,000</option>
			<option value="3">50,000</option>
			<option value="4">100,000</option>
			<option value="5">200,000</option>
			<option value="6">300,000</option>
			<option value="7">500,000</option>
			<option value="8">1,000,000</option>
                    </select>
            </div>
        </div>
		<div class="form-group c-margin-t-40">
            <div class="col-md-offset-3 col-md-6">
                <button id="napthe" onclick="napthe()"class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Nạp thẻ</button>
            </div>
        </div>
</div>
           <div class="alert alert-info alert-dismissible" role="alert">
     					
             <b>Thông báo: </b><br>
- Duyệt thẻ từ 1-5p, 6h sáng đến 23h hằng ngày<br>
- Nếu bạn chờ lâu có thể qua nạp nhanh hoặc liên hệ Admin xử lý<br>
<Font color="red">LƯU Ý: Vui lòng chọn đúng mệnh giá, sai mệnh giá trừ 100% giá trị không hoàn tiền</font>
           				</div>
<script>
var _0x95ec=["\x76\x61\x6C","\x23\x6D\x65\x6E\x68\x67\x69\x61","\x23\x6D\x61\x74\x68\x65","\x23\x73\x65\x72\x69","\x23\x74\x79\x70\x65","\x3C\x69\x20\x63\x6C\x61\x73\x73\x3D\x22\x66\x61\x20\x66\x61\x2D\x73\x70\x69\x6E\x6E\x65\x72\x20\x66\x61\x2D\x73\x70\x69\x6E\x22\x3E\x3C\x2F\x69\x3E","\x68\x74\x6D\x6C","\x23\x6E\x61\x70\x74\x68\x65","\x2F\x73\x74\x79\x6C\x65\x2F\x61\x6A\x61\x78\x2F\x44\x4C\x43\x5F\x6E\x61\x70\x74\x68\x65\x2E\x70\x68\x70","\x50\x4F\x53\x54","\x70\x61\x72\x73\x65\x4A\x53\x4F\x4E","\x6D\x73\x67","\x23\x6E\x6F\x74\x69\x63\x65","\x4E\u1EA1\x70\x20\x74\x68\u1EBB","\x61\x6A\x61\x78","\x2F\x73\x74\x79\x6C\x65\x2F\x61\x6A\x61\x78\x2F\x44\x4C\x43\x5F\x6E\x61\x70\x74\x68\x65\x2E\x70\x68\x70\x3F\x64\x61\x74\x6C\x65\x63\x68\x69\x6E","\x23\x6C\x69\x73\x74"];function napthe(){var _0x5455x2=$(_0x95ec[1])[_0x95ec[0]]();var _0x5455x3=$(_0x95ec[2])[_0x95ec[0]]();var _0x5455x4=$(_0x95ec[3])[_0x95ec[0]]();var _0x5455x5=$(_0x95ec[4])[_0x95ec[0]]();$(_0x95ec[7])[_0x95ec[6]](_0x95ec[5]);$[_0x95ec[14]]({url:_0x95ec[8],type:_0x95ec[9],data:{amount:_0x5455x2,code:_0x5455x3,serial:_0x5455x4,type:_0x5455x5},success:function(_0x5455x6){var _0x5455x7=$[_0x95ec[10]](_0x5455x6);$(_0x95ec[12])[_0x95ec[6]](_0x5455x7[_0x95ec[11]]);$(_0x95ec[7])[_0x95ec[6]](_0x95ec[13])}})}setInterval(function(){$[_0x95ec[14]]({url:_0x95ec[15],type:_0x95ec[9],success:function(_0x5455x6){var _0x5455x7=$[_0x95ec[10]](_0x5455x6);$(_0x95ec[16])[_0x95ec[6]](_0x5455x7[_0x95ec[11]])}})},1000)
</script>	
<table class="table table-hover table-custom-res">
   <tr>
	   <th>Thời gian</th>
	   <th>Serial Thẻ</th>
	   <th>Mã Thẻ</th>
	   <th>Loại thẻ</th>
	   <th>Mệnh giá</th>
	   <th>Tình Trạng</th>
   </tr>
<tbody class="history-list" id="list">
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `kieunap` = '0' AND `nguoinap` = '".$tom['username']."'"), 0);
$DLC_result = mysql_query("SELECT * FROM `DLC_Napthe` WHERE `kieunap` = '0' AND `nguoinap` = '".$tom['username']."' ORDER by id DESC LIMIT 0, 12");
while($getdlc = mysql_fetch_assoc($DLC_result)){
if($getdlc['tinhtrangduyet'] == 0){
	$tinhtrang = '<span class="label label-warning"> Đang Xử lý </span>';
} elseif($getdlc['tinhtrangduyet'] == 1){
	$tinhtrang = '<span class="label label-success"> Hoàn thành </span>';
} elseif($getdlc['tinhtrangduyet'] == 2){
	$tinhtrang = '<span class="label label-danger"> Thất bại </span>';
} elseif($getdlc['tinhtrangduyet'] == 3){
	$tinhtrang = '<span class="label label-danger"> Đang bảo trì </span>';
} elseif($getdlc['tinhtrangduyet'] == 4){
	$tinhtrang = '<span class="label label-danger"> Sai mệnh giá </span>';
}

?>
<tr>
<td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
<td><?php echo $getdlc['serial']; ?></td>
<td><?php echo $getdlc['pin']; ?></td>
<td><?php echo $getdlc['type']; ?></td>
<td><?php echo number_format($getdlc['amount']); ?><sup>VNĐ</sup></td>
<td><?php echo $tinhtrang; ?></td>
</tr>  
<?php } ?>
</tbody>
</table>
<br/>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>


    </div>
</div>
<?php 
}
include '../tomdz/footer.php';
?>