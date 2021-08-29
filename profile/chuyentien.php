<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Chuyển tiền cá nhân';
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
					<li><a href="/user/tranfer" class="active">Chuyển tiền</a></li>
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
        <h3 class="c-font-uppercase c-font-bold">chuyển tiền thành viên</h3>
                    <div class="c-line-left"></div>
                </div>
                <div class="text-center">
                    <center>
<?php $thanhvien_array = array("<font color='black'>Thành viên</font>", "<font color='red'>Administrator</font>"); ?>
                        <h2 class="c-font-bold c-font-28">ID: <?php echo $tom['ID']; ?></h2>
                        <h2 class="c-font-bold c-font-28"><?php echo $tom['username']; ?></h2>
                        <h2 class="c-font-22"><?=$thanhvien_array[$tom['admin']]?></h2>
                        <h2 class="c-font-22"><?php echo $tom['email']; ?></h2>
                        <h2 class="c-font-22 c-font-red"><?php echo number_format($tom['sodu']); ?>đ</h2>
                    </center>

                </div>	
<?php 
if(isset($_POST['submit'])){
$captcha = $_POST['captcha'];
$nguoinhan = mysql_real_escape_string($_POST['username']);
$sotien = intval($_POST['amount']);
$noidung = mysql_real_escape_string(strip_tags($_POST['description']));
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Users` WHERE `username` = '$nguoinhan'"), 0);
$checknhan = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `username` = '$nguoinhan' "));
$soducuoigui = $tom[sodu] - $sotien;
$soducuoinhan = $checknhan[sodu] + $sotien;
$motachuyen = 'Gửi '.number_format($sotien).'đ từ '.$tom[username].' đến '.$nguoinhan.'';
$motanhan = 'Nhận '.number_format($sotien).'đ từ '.$tom[username].' vào '.$nguoinhan.'';
$sotiengui = '<span class="c-font-bold text-danger">-'.number_format($sotien).'đ</span>';
$sotiennhan = '<span class="c-font-bold text-info">+'.number_format($sotien).'đ</span>';
	if (empty($nguoinhan) || empty($sotien) || empty($noidung)){
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Vui lòng nhập đầy đủ thông tin</div>';
	} elseif (empty($captcha)) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Bạn chưa nhập mã bảo vệ</div>';
	} elseif (strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){  
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Mã bảo vệ không đúng</div>';		
	} else {
	if ($check < 1) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Người nhận '.$nguoinhan.' không tồn tại</div>';
	} elseif ($sotien < 10000 || $sotien > 20000000) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Số tiền chuyển phải trên 10,000đ và dưới 20,000,000đ</div>';
	} elseif ($nguoinhan == $tom[username]) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Không thể tự chuyển tiền cho chính mình</div>';
	} elseif ($sotien > $tom[sodu]) {
		echo'<div class="alert alert-danger alert-dismissible" role="alert">Số dư của bạn không đủ để chuyển</div>';
	} else {
		echo'<div class="alert alert-success alert-dismissible" role="alert">Chuyển '.number_format($sotien).'đ cho tài khoản '.$nguoinhan.' thành công</div>';
		mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` + '".$sotien."' WHERE `username` = '".$nguoinhan."'");	
		mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` - '".$sotien."' WHERE `username` = '".$tom['username']."'");
		mysql_query("INSERT INTO DLC_Chuyentien SET
		`nguoinhan` = '".$nguoinhan."',
		`nguoichuyen` = '".$tom['username']."',
		`sotien` = '".$sotien."',
		`noidung` = '".$noidung."',
		`tinhtrang` = '1',
		`time` = '".time()."'");
		mysql_query("INSERT INTO DLC_Logbalance SET 
		`username` = '".$tom['username']."',
		`giaodich` = '3',
		`sotien` = '".$sotiengui."',
		`soducuoi` = '".$soducuoigui."',
		`mota` = '".$motachuyen."',
		`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
		`time` = '".time()."'");
		mysql_query("INSERT INTO DLC_Logbalance SET 
		`username` = '".$nguoinhan."',
		`giaodich` = '4',
		`sotien` = '".$sotiennhan."',
		`soducuoi` = '".$soducuoinhan."',
		`mota` = '".$motanhan."',
		`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
		`time` = '".time()."'");
	}
}
}
?>
                <form class="form-horizontal form-charge" method="POST">

                    <div class="form-group">
                        <label class="col-md-3 control-label">Tài khoản người nhận:</label>
                        <div class="col-md-6">
                            <input class="form-control  c-square c-theme" id="nguoinhan" name="username" type="text" placeholder="Tài khoản người nhận">
                            <span id="receiver_purse_name" class="input-group-addon ng-binding"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Số tiền:</label>
                        <div class="col-md-6">
                            <input class="form-control c-square c-theme" name="amount" type="text" placeholder="Số tiền cần chuyển (Tối thiểu 20,000)">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label">Nội dung chuyển tiền:</label>
                        <div class="col-md-6">
                            <input class="form-control c-square c-theme" name="description" type="text" placeholder="Nhập nội dung chuyển khoản nếu cần thiết">
                        </div>
                    </div>
                            <div class="form-group">
                        <label class="col-md-3 control-label"><b>Mã bảo vệ:</b></label>
                        <div class="col-md-6">
                            <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px;">
                                        <img src="<?=$home_url;?>/captcha/captcha.php?rand=<?php echo rand();?>" height="30px" id="captchaimg" onclick="javascript: refreshCaptcha();">
                                    </span>
                                <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="3" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group c-margin-t-40">
                        <div class="col-md-offset-3 col-md-6">
                        <button type="submit" name="submit"
                                class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin'></i>">Thực hiện
                        </button>                         </div>
                    </div>
                </form>
                        <script>
var _0xf35b=["\x76\x61\x6C","\x23\x6E\x67\x75\x6F\x69\x6E\x68\x61\x6E","\x2F\x61\x73\x73\x65\x74\x73\x2F\x61\x6A\x61\x78\x2F\x44\x4C\x43\x5F\x67\x65\x74\x2D\x75\x73\x65\x72\x2E\x70\x68\x70","\x50\x4F\x53\x54","\x70\x61\x72\x73\x65\x4A\x53\x4F\x4E","\x6D\x73\x67","\x68\x74\x6D\x6C","\x23\x72\x65\x63\x65\x69\x76\x65\x72\x5F\x70\x75\x72\x73\x65\x5F\x6E\x61\x6D\x65","\x61\x6A\x61\x78","\x6B\x65\x79\x75\x70","\x72\x65\x61\x64\x79"];$(document)[_0xf35b[10]](function(){$(_0xf35b[1])[_0xf35b[9]](function(){var _0xa34dx1=$(_0xf35b[1])[_0xf35b[0]]();$[_0xf35b[8]]({url:_0xf35b[2],type:_0xf35b[3],data:{name:_0xa34dx1},success:function(_0xa34dx2){var _0xa34dx3=$[_0xf35b[4]](_0xa34dx2);$(_0xf35b[7])[_0xf35b[6]](_0xa34dx3[_0xf35b[5]])}})})})
                            $(".form-charge").submit(function(){
                                $('.btn-submit').button('loading');
                            });
                        </script>
                <!-- END: PAGE CONTENT -->
                <table id="charge_recent" class="table table-striped table-custom-res">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Giao dịch</th>
                        <th>Tài khoản nhận</th>
                        <th>Số tiền</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Thời gian</th>
                    </tr>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Chuyentien` WHERE `nguoichuyen` = '".$tom['username']."'"), 0);
$DLC_result = mysql_query("SELECT * FROM `DLC_Chuyentien` WHERE `nguoichuyen` = '".$tom['username']."' ORDER by id DESC LIMIT $start, $kmess");
if ($tong == 0) {
?>
<tr><td colspan="8"><center>Không có dữ liệu<center></td></tr>
<?php }
while($getdlc = mysql_fetch_assoc($DLC_result)){
if($getdlc['tinhtrang'] == 1){
$tinhtrang = '<span class="c-font-bold text-success"> Thành công</span>';
}
?>
                    </tr>
                        <td>#<?php echo $getdlc[id]; ?></td>
                        <td>Chuyển tiền</td>
                        <td><?php echo $getdlc[nguoinhan]; ?></td>
                        <td><?php echo number_format($getdlc[sotien]); ?>đ</td>
                        <td><?php echo $getdlc[noidung]; ?></td>
                        <td><?php echo $tinhtrang; ?></td>
                        <td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
                    </tr>
<?php } ?>
                    </tbody>
                </table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
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
<?php 
}
include '../tomdz/footer.php';
?>