<?php 
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Official
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

include '../../tomdz/dbtomdzvl.php';
?>

<?php
$user_login = mysql_real_escape_string($_POST['username']);
$user_pass = mysql_real_escape_string($_POST['password']);
$dlc1 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Bạn chưa nhập tài khoản hoặc mật khẩu</div>';
$dlc2 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Tài khoản hoặc mật khẩu không chính xác</div>';
$dlc3 = '<div name="login_error" class="alert alert-danger" id="login_error" style="">Bạn đã đăng nhập rồi, vui lòng chờ</div>';
$dlc4 = '<script> location.reload(); </script>';
$checktaikhoan = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Users` WHERE `username`='".htmlspecialchars($user_login)."' AND `password`='".$user_pass."'"), 0);
if(empty($user_login) || empty($user_pass)){
echo json_encode(array('msg' => "$dlc1"));
exit();
} if($checktaikhoan != 1) {
echo json_encode(array('msg' => "$dlc2"));
exit();
} if ($_SESSION['FBID']) {
echo json_encode(array('msg' => "$dlc3"));
exit();
} if($checktaikhoan >= 1) {
echo json_encode(array('msg' => "$dlc4"));
$getdlc = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `username`='".htmlspecialchars($user_login)."' AND `password`='".$user_pass."'"));
$_SESSION['FBID'] = $getdlc['ID'];
$_SESSION['USER'] = $getdlc['username'];
$_SESSION['NAME'] = $getdlc['name'];
}	
?>