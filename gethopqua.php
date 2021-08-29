<?PHP
session_start();
include 'tomdz/functions.php';
$hopqua = $_GET[hopqua];
if($hopqua == "mohop") {
    if($tom[vongquay] <=0) {
		$msg = 'Lượt Quay của Bạn Đã Hết. Vui lòng mua thêm.';
		$dlc = 'error';
		$x = 0;
	if(!$_SESSION['FBID']) {
		    $msg = 'Bạn hãy đăng nhập để chơi nhé!';
	}
} else {
	$datlechin = rand(1,10) ;
	if($datlechin ==1) {
		$vnd = rand(5000,15000);
		@mysql_query("UPDATE `TOM_Users` SET `sodu`=`sodu` + '".$vnd."' WHERE `username`='".$tom['username']."'");
$msg = 'Bạn nhận được  '.number_format($vnd).' VNĐ ';
	}
	else
	if($datlechin ==2) {
		$luot = rand(1,3);
		@mysql_query("UPDATE `TOM_Users` SET `vongquay`=`vongquay` + '".$luot."' WHERE `username`='".$tom['username']."'");
	$msg = 'Bạn nhận được '.$luot.' lượt mở hộp quà may mắn!';
		} 
		else
	if($datlechin ==3) {
		$vang = rand(5000000,20000000);
		@mysql_query("UPDATE `TOM_Users` SET `vang` = `vang` + '".$vang."' WHERE `username`='".$tom['username']."'");
	$msg = 'Bạn nhận được '.number_format($vang).' vàng';

		} 
		else {
		$msg = 'Chúc bạn may mắn lần sau!';
	}
	
	
	
			$dlc = 'success';
		@mysql_query("UPDATE `TOM_Users` SET `vongquay`=`vongquay` - '1' WHERE `username`='".$tom['username']."'");
$x = $tom[vongquay] - 1;
}

}



if($hopqua == "mua") {

$luot = $_POST[soluot];
$tien = $luot*10000;

if($luot < 1) {
$msg = 'Số lượt không hợp lệ, vui lòng thử lại!';
$dlc = 'error';
$x = $tom[vongquay];	
}
else
if($tom[sodu] >= $tien) {
	
$msg = 'Thực hiện mua thành công bạn có +'.$luot.' lượt quay trong tài khoản';
$dlc = 'success';
		@mysql_query("UPDATE `TOM_Users` SET `vongquay`=`vongquay` + '".$luot."', `sodu`=`sodu` - '".$tien."' WHERE `username`='".$tom['username']."'");
$x = $tom[vongquay] + $luot;

} else {
$thieu = $tom[sodu] - $tien;
$msg = 'Số dư hiện tại không đủ bạn còn thiếu '.number_format($thieu).'. Vui lòng nạp thêm!';
$dlc = 'error';	
$x = $tom[vongquay];
}
}




$json[message] = $msg;
$json[vongquay] = $x;
$json[status] = $dlc;
echo json_encode($json);
die;	