<?php 
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Official
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

include '../../tomdz/dbtomdzvl.php';
?>

<?php
$name = mysql_real_escape_string($_POST['name']);
$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$password_comfirm = mysql_real_escape_string($_POST['password_comfirm']);

$dlc1 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Vui lòng nhập đầy đủ thông tin</div>';
$dlc2 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Tài khoản đăng nhập không được ngắn hơn 6 ký tự và lớn hơn 16 ký tự</div>';
$dlc3 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Mật khẩu đăng nhập không được ngắn hơn 3 ký tự và lớn hơn 16 ký tự</div>';
$dlc4 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Tài khoản này đã có người sử dụng</div>';
$dlc5 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Mật khẩu xác nhận không chính xác</div>';
$dlc6 = '<div name="login_error" class="alert alert-success" id="login_error" style="">Đăng ký tài khoản '.$username.' thành công, vui lòng đăng nhập</div>';
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Users` WHERE `username`='$username'"), 0);

if(empty($username) || empty($password) || empty($name)  || empty($password_comfirm)) {
echo json_encode(array('msg' => "$dlc1"));
exit();
} if(strlen($username) < 5 || strlen($username) > 16) {
echo json_encode(array('msg' => "$dlc2"));
exit();
} if(strlen($password) < 3 || strlen($password) > 16) {
echo json_encode(array('msg' => "$dlc3"));
exit();
} if($password  != $password_comfirm) {
echo json_encode(array('msg' => "$dlc5"));
exit();
} if($check >= 1){
echo json_encode(array('msg' => "$dlc4"));
exit();
} else {
echo json_encode(array('msg' => "$dlc6"));
$ip = $_SERVER['REMOTE_ADDR'];
mysql_query("INSERT INTO TOM_Users SET
 `username` = '".$username."', `password` = '".$password."',
 `name` = '".$name."', `time` = '".time()."',
 `ip` = '".$ip."'");
}	
?>