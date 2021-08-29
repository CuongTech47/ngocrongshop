<?php
error_reporting(0);
ob_start();
session_start();

date_default_timezone_set('Asia/Ho_Chi_Minh');
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'mimitest_hta');    // DB username
define('DB_PASSWORD', 'f,11FuJ+r{;v');    // DB password
define('DB_DATABASE', 'mimitest_hta');      // DB name
$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Không thể kết nối database - Vui Lòng Liên Hệ - DATLECHIN");
$database = mysql_select_db(DB_DATABASE) or die( "Unable to select database");
mysql_query("SET NAMES utf8");
if ($_SESSION['FBID']){
$tom = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `ID`= '".$_SESSION['FBID']."'"));
}
if ($_SESSION['userctv']) {
$congtacvien = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Congtacvien` WHERE `user`= '".$_SESSION['userctv']."'"));
}

$home_url = 'https://mimitestgame.tk';
$user_login = $_SESSION['FBID'];
$ctv_login = $_SESSION['userctv'];

$day = date('d',time());
$month = date('m',time());
$year = date('Y',time());

$url = 'http://sys.napthenhanh.com/api/charging-wcb';
$partner_id = '1176';
$partner_key = '73daac7f445f57183da84ee19f60ef2b';

/////////////////////////
//  Anti SQL Injection //
/////////////////////////
foreach($_GET as $var => $value) {
$_GET["$var"]=addslashes(mysql_real_escape_string($value));
}
foreach($_POST as $variable => $value) {
$_POST["$var"]=addslashes(mysql_real_escape_string($value));
}
/////////////////////////
// by Hoàng Minh Thuận //
/////////////////////////


$req = mysql_query("SELECT * FROM `TOM_setting`");
$system = array ();
while ($res = mysql_fetch_row($req))
$system[$res[0]] = $res[1];
?>
