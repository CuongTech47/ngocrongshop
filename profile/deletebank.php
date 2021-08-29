<?php 
ob_start();
session_start();
include '../tomdz/header.php';
include '../tomdz/functions.php';
?>
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