<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
include 'tomdz/header.php';
if($user_login) { 
header( 'Location: /index.php');
} else {
?>
    <!-- BEGIN: PAGE CONTENT -->
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body box-custom">
            <p class="login-box-msg">Đăng nhập hệ thống</p>
			<span class="help-block" style="text-align: center;color: #dd4b39">
                       <strong></strong>
                </span>
            

                        <?php
if (isset($_POST['login'])) {
	$username = addslashes(htmlspecialchars($_POST['username'])); //  tài khoản được nhập vào 
	$password = addslashes(htmlspecialchars($_POST['password'])); // mật khẩu được nhập vào
	$check = mysql_num_rows(mysql_query("SELECT * FROM `TOM_Users` WHERE `username` = '".$username."' AND `password` = '".$password."'"));
	if(!$username || !$password){
		$quoc = 'LỖI VUI LÒNG NHẬP ĐỦ THÔNG TIN';
	}elseif ($check < 1) {
		$quoc = 'LỖI KHÔNG TÌM THẤY TÀI KHOẢNG TRÊN HỆ THỐNG';
	}elseif (!preg_match('/^[a-zA-Z0-9]*$/', $username)) {
		$quoc = 'TÍNH BUG HAY J =))';
	}elseif (!preg_match('/^[a-zA-Z0-9]*$/', $password)) {
		$quoc = 'TÍNH BUG HAY J =))';
	}elseif($check > 0){
	    $data = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `username` = '".$username."' AND `password` = '".$password."'"));
	    $_SESSION['FBID'] = $data['ID'];
	    $_SESSION['USER'] = $data['username'];
        $_SESSION['NAME'] = $data['name'];
	    header('Location: /');
	}
}
?>
<?php echo $quoc ;?>
            <form action="" method="POST">
                <input type="hidden" name="_token" value="Dm6ZoOSwBOgifGjD75LVbEAnfKCezlw2XLaB6UrH">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" value="" placeholder="Tài khoản của Web" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>

                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="checkbox icheck">
                            <label style="color: #666">
                                <input type="checkbox" name="remember" id="remember" > Ghi nhớ
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-6" style="text-align: right">
                        <a href="/password/reset" style="color: #666;margin-top: 10px;margin-bottom: 10px;display: block;font-style: italic;">Quên mật khẩu?</a><br>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row">

                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" name="login" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng nhập</button>
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
        font-size: 20px;;
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