<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Nạp tự động';
include '../tomdz/header.php';
include '../tomdz/functions.php';
iF(!$user_login) { 
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
        <h3 class="c-font-uppercase c-font-bold">Nạp tự động</h3>
        <div class="c-line-left"></div>
    </div>
<?php


if (isset($_POST['submit'])) {
    if (!isset($_POST['type']) || !isset($_POST['serial']) || !isset($_POST['pin'])) {
        $err = 'Bạn cần nhập đầy đủ thông tin';
    } else {
        $type = $_POST['type'];
        $serial = $_POST['serial'];
        $pin = $_POST['pin'];
        $amount = $_POST['amount'];
        $captcha = $_POST['captcha'];
        $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `pin` = '$pin' AND `serial` = '$serial'"),0);
        $sotiendung = '<span class="c-font-bold text-info">+'.number_format($amount).'đ</span>';
        $sodudung = $tom[sodu] + $amount;
        $motadung = 'Nạp thẻ '.$type.' '.number_format($amount).'đ';
        if (!$tom[username]) {
            $err = 'Vui lòng đăng nhập để nạp thẻ';
        } elseif ($type == '' || $serial == '' || $pin == '') {
            $err = 'Bạn cần nhập đầy đủ thông tin';
        } elseif ($check > 0) {
            $err = 'Thẻ này đã tồn tại trên hệ thống';
        } elseif (empty($captcha)) {
            $err = 'Bạn chưa nhập mã bảo vệ';
	} elseif (strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){  
            $err = 'Mã bảo vệ không đúng';
        } else {
            $tranid = time() . rand(10000, 99999);  /// Cái này có thể mà mã order của bạn, nó là duy nhất (enique) để phân biệt giao dịch.

            /// Tạo chữ ký
            $sign = md5($partner_id . $partner_key . $type . $pin . $serial . $amount . $tranid);

            $data = array();
            $data['partner_id'] = $partner_id;
            $data['type'] = $type;
            $data['pin'] = $pin;
            $data['serial'] = $serial;
            $data['amount'] = $amount;
            $data['tranid'] = $tranid;
            $data['sign'] = $sign;

            if (is_array($data)) {
                $dataPost = http_build_query($data);
            } else {
                $dataPost = $data;
            }

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
			
             
            $obj = json_decode($result);
			
			
            try {
                if ($obj && isset($obj->status)) {

                    if ($obj->status == 1) {
                    echo '<div class="alert alert-success"> Nạp thẻ '.$type.' mệnh giá '.number_format($amount).'đ thành công!</div>';
                    $tinhtrangdung = '<span class="text-success f-700"> Đúng mệnh giá (+100%) +'.number_format($amount).'đ</span>';
                    mysql_query("INSERT INTO DLC_Napthe SET
                     `nguoinap` = '".$tom['username']."', `pin` = '".$pin."',
                     `serial` = '".$serial."', `type` = '".$type."',
                     `amount` = '".$amount."', `kieunap` = '1',
                     `ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
                     `time` = '".time()."', `tinhtrang` = '".$tinhtrangdung."', `tinhtrangduyet` = '1'");
                    mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` + '".$amount."' WHERE `username` = '".$tom[username]."'");
                    mysql_query("INSERT INTO DLC_Logbalance SET 
                    `username` = '".$tom['username']."',
                    `giaodich` = '1',
                    `sotien` = '".$sotiendung."',
                    `soducuoi` = '".$sodudung."',
                    `mota` = '".$motadung."',
                    `ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
                    `time` = '".time()."'");
					
                    } elseif ($obj->status == 0) {
					echo '<div class="alert alert-danger"> Nạp thẻ thất bại. Thẻ sai!</div>';
					$tinhtrangsai = '<span class="text-danger f-700"> Thẻ sai</span>';
                    mysql_query("INSERT INTO DLC_Napthe SET
                      `nguoinap` = '".$tom['username']."', `pin` = '".$pin."',
                      `serial` = '".$serial."', `type` = '".$type."',
                      `amount` = '".$amount."', `kieunap` = '1',
                      `ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
                      `time` = '".time()."', `tinhtrang` = '".$tinhtrangsai."', `tinhtrangduyet` = '2'");

                    } elseif ($obj->status == 2) {
					echo '<div class="alert alert-warning"> Thẻ trễ, vui lòng qua nạp chậm</div>';


                    }
                    elseif ($obj->status == 3) {
					echo '<div class="alert alert-warning"> Thẻ '.$type.' sai mệnh giá!</div>';
					$menhgiasai = $amount * (100-50)/100;
					$tinhtrangsaimm = '<span class="text-danger f-700"> Sai mệnh giá (-100%)</span>';
					mysql_query("INSERT INTO DLC_Napthe SET
                      `nguoinap` = '".$tom['username']."', `pin` = '".$pin."',
                      `serial` = '".$serial."', `type` = '".$type."',
                      `amount` = '".$amount."', `kieunap` = '1',
                      `ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
                      `time` = '".time()."', `tinhtrang` = '".$tinhtrangsaimm."', `tinhtrangduyet` = '4'"); 
                    }
					else{
						
                         echo '<div class="alert alert-danger">Nạp thẻ thất bại. Có lỗi xảy ra!</div>';
                    }
					
					
					

                } else {
                         echo '<div class="alert alert-danger">Nạp thẻ thất bại. Có lỗi xảy ra!</div>';
                }
            } catch (\Exception $e) {
                echo $e->getMessage();
            }

        }
    }
}
?>
<?php echo (isset($err)) ? '<div class="alert alert-danger" role="alert">' . $err . '</div>' : ''; ?>
                <form method="POST" action="" class="form-horizontal form-charge">
        <div class="form-group">
            <label class="col-md-3 control-label">Loại thẻ:</label>
            <div class="col-md-6">
                    <select class="form-control  c-square c-theme" name="type">
			<option value="VIETTEL">VIETTEL</option>
			<option value="VINAPHONE">VINAPHONE</option>
			<option value="MOBIFONE">MOBIFONE</option>
			<option value="SCOIN">SCOIN</option>
			<option value="ZING">ZING</option>
			<option value="VCOIN">VCOIN</option>
			<option value="GATE">GATE</option>
			<option value="BIT">BIT</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mệnh giá:</label>
            <div class="col-md-6">
                    <select class="form-control  c-square c-theme" name="amount">
			<option value="10000">10,000</option>
			<option value="20000">20,000</option>
			<option value="30000">30,000</option>
			<option value="50000">50,000</option>
			<option value="100000">100,000</option>
			<option value="200000">200,000</option>
			<option value="300000">300,000</option>
			<option value="500000">500,000</option>
			<option value="1000000">1,000,000</option>
                    </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Số serial:</label>
            <div class="col-md-6">
                <input class="form-control  c-square c-theme" type="text" name="serial">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Mã số thẻ:</label>
            <div class="col-md-6">
                <input class="form-control  c-square c-theme" type="text" name="pin">
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
                                class="btn btn-submit c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block" data-loading-text="<i class='fa fa-spinner fa-spin'></i>">Nạp thẻ
                        </button>            </div>
        </div>
</form>
                        <script>
                            $(".form-charge").submit(function(){
                                $('.btn-submit').button('loading');
                            });
                        </script>
           <div class="alert alert-info alert-dismissible" role="alert">
- Nếu nạp tự động không được vui lòng sang nạp chậm để nạp<br>
– Thẻ VIETTEL vui lòng sang <a href="/nap-cham">Nạp chậm</a> để nhận ưu đãi thêm 5%<br>
- Nạp không trừ chiết khẩu,nạp 10k nhận 10k (2-5s/thẻ)<br>
- Nếu <b>Nạp nhanh</b> không được vui lòng sang <a href="/nap-cham"><b>Nạp chậm</a></b><br>
- <font color="red">LƯU Ý: Chọn đúng mệnh giá, chọn sai sẽ bị trừ 100% không được hoàn tiền<br>
           				</div><table class="table table-hover table-custom-res">
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
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `kieunap` = '1' AND `nguoinap` = '".$tom['username']."'"), 0);
$DLC_result = mysql_query("SELECT * FROM `DLC_Napthe` WHERE `kieunap` = '1' AND `nguoinap` = '".$tom['username']."' ORDER by id DESC LIMIT 0, 12");
while($getdlc = mysql_fetch_assoc($DLC_result)){
?>
<tr>
<td><?php echo date('d/m/Y H:i:s', $getdlc['time']); ?></td>
<td><?php echo $getdlc['serial']; ?></td>
<td><?php echo $getdlc['pin']; ?></td>
<td><?php echo $getdlc['type']; ?></td>
<td><?php echo number_format($getdlc['amount']); ?><sup>VNĐ</sup></td>
<td><?php echo $getdlc['tinhtrang']; ?></td>
</tr>  
<?php } ?>
</tbody>
</table>
<br/>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
<?php } include '../tomdz/footer.php';?>