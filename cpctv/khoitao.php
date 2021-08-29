<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';

if(!$ctv_login) {
	header('Location: /index.php');
	exit;
} elseif($congtacvien['admin'] <5) {
	header('Location: /admin');
	exit;
} else {
	
?>
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>KHỞI TẠO TÀI KHOẢN CỘNG TÁC VIÊN</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                TẠO TÀI KHOẢN
                            </h2>
                        </div>
                        <div class="body">
		<?php 
		if(isset($_POST['created'])) {
		if($congtacvien['admin'] < 5) { 
		echo '<div class="alert alert-danger fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Error!</strong> Bạn tính làm gì thế :)) Gửi request về đây làm gì?
		</div>';
		} else {
		
		$taikhoan = mysql_real_escape_string($_POST['user']);
		$matkhau = mysql_real_escape_string($_POST['password']);
		$matkhau2 = mysql_real_escape_string($_POST['password2']);
		$loaictv = mysql_real_escape_string($_POST['loaictv']);
		$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Congtacvien` WHERE `user`='$taikhoan'"), 0);
		if($check > 1){
		echo '<div class="alert alert-danger fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Error!</strong> Tài khoản đã tồn tại trên hệ thống!
		</div>';
		} elseif($matkhau != $matkhau2){
		echo '<div class="alert alert-danger fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Error!</strong> Nhập lại mật khẩu không khớp!
		</div>';
		} else {
		mysql_query("INSERT INTO `TOM_Congtacvien` SET 
			`user`='$taikhoan',`pass`='".md5($matkhau)."',`doanhthu`='0',`admin`='$loaictv'
		");
		echo '<div class="alert alert-success fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Success!</strong> Khởi tạo cộng tác viên thành công!
		</div>';
		}
		}
		}
		?>
		<form method="post" action="">
                                <label for="username">Username</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="user" type="text" class="form-control" placeholder="Enter Username...">
                                    </div>
                                </div>
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password" type="password" class="form-control" placeholder="Enter Password ...">
                                    </div>
                                </div>
                                <label for="password2">Confirm Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password2" type="password" class="form-control" placeholder="Enter Confirm Password ...">
                                    </div>
                                </div>
                                <label for="username">Loại CTV:</label>
                                        <select name="loaictv" class="form-control show-tick">
                                        <option value="0">Cộng Tác Viên Ngọc Rồng</option>
                                        <option value="1">Cộng Tác Viên Liên Quân</option>
                                        <option value="2">Cộng Tác Viên Bán Vàng</option>
                                        <option value="3">Cộng Tác Viên Bán Ngọc</option>
                                    </select>
<br><br>
			<button type="submit" class="btn btn-primary" name="created">Tạo tài khoản</button>
		</form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KHÔI PHỤC MẬT KHẨU
                            </h2>
                        </div>
                        <div class="body">
		<?php 
		if(isset($_POST['reset'])) {
		if($congtacvien['admin'] < 5) { 
		echo '<div class="alert alert-danger fade in alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
			<strong>Error!</strong> Bạn tính làm gì thế :)) Gửi request về đây làm gì?
		</div>';
		} else {
		$taikhoan = mysql_real_escape_string($_POST['user']);
		$matkhau = mysql_real_escape_string($_POST['password']);
			
		mysql_query("UPDATE `TOM_Congtacvien` SET `pass` = '".md5($matkhau)."' WHERE `user` = '$taikhoan'");
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
                                        <input name="user" type="text" class="form-control" placeholder="Enter Username...">
                                    </div>
                                </div>
                                <label for="password">Password</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password" type="password" class="form-control" placeholder="Enter Password New ...">
                                    </div>
                                </div>

			<button type="submit" class="btn btn-danger" name="reset">RESET MẬT KHẨU</button>
		</form>
	</div>
</div></div>
</div>
</div>
<?php 
	}
include 'footer.php';
?>