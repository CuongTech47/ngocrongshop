<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include '../tomdz/dbtomdzvl.php';
include '../tomdz/functions.php';
if($ctv_login) {
	header('Location: /cpctv');
} else {
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="login-page ls-closed">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin V3.0</a>
            <small>Bảng điều khiển dành cho cộng tác viên</small>
        </div>
        <div class="card">
            <div class="body">
					
	<?php 
	if(isset($_POST['login'])) {
    $user_login = isset($_POST['user']) ?  mysql_real_escape_string(trim($_POST['user'])) : NULL;
    $user_pass = isset($_POST['pass']) ?  mysql_real_escape_string(trim($_POST['pass'])) : NULL;
	
	$checktaikhoan = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Congtacvien` WHERE `user`='".htmlspecialchars($user_login)."' AND `pass`='".md5($user_pass)."'"), 0);
	if(empty($user_login) || empty($user_pass)){
	echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Oops!</strong> Bạn chưa nhập tài khoản hoặc mật khẩu. vui lòng thử lại!
	</div>';
	} elseif($checktaikhoan != 1) {
	echo '<div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>Oops!</strong> Tài khoản hoặc mật khẩu không chính xác. vui lòng thử lại!
	</div>';
	} elseif($checktaikhoan >= 1) {
	$getthongtin = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Congtacvien` WHERE `user`='".htmlspecialchars($user_login)."' AND `pass`='".md5($user_pass)."'"));
	$_SESSION['userctv'] = $getthongtin['user'];
	header("location: /cpctv");
	}
	}
	?>
					
	
                <form id="" method="POST">
                    <div class="msg">Đăng nhập tài khoản</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="user" placeholder="Nhập tài khoản ..." required="">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Nhập mật khẩu ..." required="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-green">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-green waves-effect" name="login" type="submit">Đăng nhập</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>
<?php } ?>