<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';

if(!$ctv_login) {
	header('Location: login.php');
	exit;
} else {
	
?>
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ĐỔI MẬT KHẨU</h2>
            </div>
<div class="row clearfix">
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                ĐỔI MẬT KHẨU
                            </h2>
                        </div>
                        <div class="body">
		<?php 
		if(isset($_POST['reset'])) {
		$taikhoan = mysql_real_escape_string($_POST['user']);
		$matkhau = mysql_real_escape_string($_POST['password']);	
			
		if($taikhoan != $congtacvien['user']) { 
		echo '<div class="alert alert-danger fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Error!</strong> Bạn tính làm gì thế :)) Đổi mật khẩu của người khác à
		</div>';
		} else {
			
		mysql_query("UPDATE `TOM_Congtacvien` SET `user` = '$taikhoan',`pass` = '".md5($matkhau)."' WHERE `user` = '$taikhoan'");
		echo '<div class="alert alert-success fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Success!</strong> Thay đổi mật khẩu mới thành công!
		</div>';
		}
		}
		?>
                            <form method="post" action="">
                                <label for="username">User Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="user" type="text" class="form-control" placeholder="Enter Username ...">
                                    </div>
                                </div>
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password" type="password" class="form-control" placeholder="Enter password new ...">
                                    </div>
                                </div>
                                <button type="submit" name="reset" class="btn btn-primary m-t-15 waves-effect">THAY ĐỔI MẬT KHẨU</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
<?php }
include 'footer.php';
?>