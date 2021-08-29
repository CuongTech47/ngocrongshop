<?php 
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Official
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

include '../../tomdz/dbtomdzvl.php';
?>

<?php

if(isset($_GET[datlechin])) {
 
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

$datlechin .='
<tr>
<td>'.date('d/m/Y H:i:s', $getdlc['time']).'</td>
<td>'.$getdlc['serial'].'</td>
<td>'.$getdlc['pin'].'</td>
<td>'.$getdlc['type'].'</td>
<td>'.number_format($getdlc['amount']).'<sup>VNĐ</sup></td>
<td>'.$tinhtrang.'</td>
</tr>
 ';
 }

$datlechinJSON['msg'] = $datlechin;
    echo json_encode($datlechinJSON);
} else {
$code = htmlentities(strtolower(trim(addslashes($_POST['code']))));
$serial = htmlentities(strtolower(trim(addslashes($_POST['serial']))));
$type = intval($_POST['type']);
$amount = htmlentities(strtolower(trim(addslashes($_POST['amount']))));
$request_time = time(); //Mã tự sinh trong mỗi giao dịch 
date_default_timezone_set("Asia/Ho_Chi_Minh");
$gio = date("H:i:s - d/m/Y");

$dlc1 = '<div class="alert alert-danger">
Vui lòng nhập đầy đủ thông tin
</div>';
$dlc2 = '<div class="alert alert-danger">
Độ dài mã thẻ và serial không hợp lệ
</div>';
$dlc3 = '<div class="alert alert-danger">
Mã thẻ không được chứa kí tự không hợp lệ
</div>';
$dlc4 = '<div class="alert alert-danger">
Serial không được chứa kí tự không hợp lệ
</div>';
$dlc6 = '<div class="alert alert-success">
Yêu cầu của quý khách đã được chấp nhận, hệ thống sẽ kiểm tra và xử lý đơn hàng
</div>';
$dlc7 = '<div class="alert alert-danger">
Bạn chưa chọn loại thẻ
</div>';
$dlc8 = '<div class="alert alert-danger">
Bạn chưa chọn mệnh giá thẻ
</div>';
$dlc9 = '<div class="alert alert-danger">
Vui lòng đăng nhập để sử dụng dịch vụ
</div>';
if(!$_SESSION['USER']) {
echo json_encode(array('msg' => "$dlc9"));
exit();
}
if(empty($code) || empty($serial)){
echo json_encode(array('msg' => "$dlc1"));
exit();
}
if (strlen($serial) < 8 || strlen($code) < 8 || strlen($serial) > 20 || strlen($code) > 20){
echo json_encode(array('msg' => "$dlc2"));
exit();
}
if (!preg_match('/^[0-9]+$/', $code)){
echo json_encode(array('msg' => "$dlc3"));
exit();
}
if (!preg_match('/^[0-9]+$/', $serial)){
echo json_encode(array('msg' => "$dlc4"));
exit();
}
if($type < 0 || $type > 6){
echo json_encode(array('msg' => "$dlc7"));
exit();
}
if($amount < 0 || $amount > 9){
echo json_encode(array('msg' => "$dlc8"));
exit();
}
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `pin` = '$code' AND `serial` = '$serial'"),0);
$dlc5 = '<div class="alert alert-danger">
Thẻ bạn nạp đã tồn tại trên hệ thống
</div>';
if ($check > 0){ 
echo json_encode(array('msg' => "$dlc5"));
die();
} 
$tinhtrang = '<span class="text-warning f-700"> Đang xử lý</span>';
$getloaithe = array("VIETTEL", "VINAPHONE", "MOBIFONE");
$getmenhgia = array(10000, 20000, 30000, 50000, 100000, 200000, 300000, 500000, 1000000);
mysql_query("INSERT INTO DLC_Napthe SET
 `nguoinap` = '".$tom['username']."', `pin` = '".$code."',
 `serial` = '".$serial."', `type` = '".$getloaithe[$type]."',
 `amount` = '".$getmenhgia[$amount]."', `kieunap` = '0',
 `ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
 `time` = '".time()."', `tinhtrang` = '".$tinhtrang."', `tinhtrangduyet` = '0'");
echo json_encode(array('msg'=>"$dlc6"));	}	
?>