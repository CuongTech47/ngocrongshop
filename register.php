<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
include 'tomdz/header.php';
if($user_login) { 
header( 'Location: /index.php');
}else{
?>
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body box-custom">
            <p class="login-box-msg">Đăng ký thành viên</p>

                <span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong></strong>
                </span>
                <?php
                if (isset($_POST['register'])) {
	$username = addslashes(htmlspecialchars($_POST['username'])); //  tài khoảng được nhập vào 
	$password = addslashes(htmlspecialchars($_POST['password'])); // mật khẩu được nhập vào
	$name = addslashes(htmlspecialchars($_POST['name'])); // mật khẩu được nhập vào
	$password_comfirm = addslashes(htmlspecialchars($_POST['password_confirmation'])); //  tài khoản được nhập vào 

$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Users` WHERE `username`='$username'"), 0);

if(!$username || !$password || !$name  || !$password_comfirm) {
$quoc = 'Vui Lòng Nhập đủ Thông Tin';
}elseif(strlen($username) < 5 || strlen($username) > 16) {
$quoc = 'Tài Khoản Từ 5 - 16 ký tự';
} elseif(strlen($password) < 3 || strlen($password) > 16) {
	$quoc = 'mật khẩu Từ 5 - 16 ký tự';
} elseif($password  != $password_comfirm) {
	$quoc = 'Xác Nhận Mật Khẩu Không Đúng';
} elseif($check >= 1){
	$quoc = 'Tài Khoản Tồn Tại Trên Hệ Thống';
} else {
$ip = $_SERVER['REMOTE_ADDR'];
mysql_query("INSERT INTO TOM_Users SET
 `username` = '".$username."', 
 `password` = '".$password."',
 `name` = '".$name."', 
 `time` = '".time()."',
 `ip` = '".$ip."'");
$quoc = 'Đăng Ký Tài Khoản Thành Công';
}	
}
?>
<?php echo $quoc;?>
            <form action="" method="POST">
                <input type="hidden" name="_token" value="TgLEu7tHLZHxaMGvzL46DimEJnqDXtoRqRD18Id6">
                <div class="form-group has-feedback  ">
                    <input type="text" class="form-control" name="name" value="" placeholder="Họ Và Tên" >
                   

                </div>
                <div class="form-group has-feedback  ">
                    <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản" >
                    

                </div>


                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu">
                    
                </div>


                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" name="register" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng ký</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


            <!-- /.social-auth-links -->
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <style>
        .login-box, .register-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;;
        }

        @media (max-width: 767px){
            .login-box, .register-box {
                width: 100%;
            }

        }

        .login-box-msg, .register-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .box-custom{
            border: 1px solid #cccccc;
            padding: 20px;
            color: #666;
        }
    </style>
<!-- END: PAGE CONTENT -->
</div>
<?php
}
include 'tomdz/footer.php';
?>