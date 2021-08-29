<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';

if(!$ctv_login) {
	header('Location: /index.php');
	exit;
} elseif($congtacvien['admin'] != 0 && $congtacvien['admin'] < 5) {
	header('Location: /cpctv');
	exit;
} else {
	
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ĐĂNG NICK RANDOM</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>ĐĂNG NICK RANDOM</B>
                            </h2>
                        </div>
                        <div class="body">
<?php 
if(isset($_POST['submit'])) {
include 'class.login.php';

$username = mysql_real_escape_string($_POST['username']);
$password = mysql_real_escape_string($_POST['password']);
$server = intval($_POST['server']);
$giatien = intval($_POST['giatien']);
$loainick = intval($_POST['loainick']);
$hinhanh = mysql_real_escape_string($_POST['hinhanh']);
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `taikhoan`='$taikhoan'"), 0);
if($check > 1){
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Tài khoản đã tồn tại trên hệ thống!
</div>';
} else {
$login = new Login($username, $password, $server);
if ($login->nickname) {
mysql_query("UPDATE TOM_Congtacvien SET `nickdangban` = `nickdangban` + '1' WHERE `user`='$ctv_login'");
mysql_query("INSERT INTO `TOM_Nick` SET 
	`taikhoan`='$username',  `matkhau`='$password',
	`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."', 
	`giatien`='".abs($giatien)."',`server`='$server',  `hinhanh`='$hinhanh',
	`loainick`='$loainick',  `congtacvien`='$ctv_login'
");
echo '<div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Đăng bán tài khoản thành công
</div>';
} else {
?>
<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
     <?php echo $login->msg;?>
</div>
<?php
}
}
}
?>
                            <form method="post" action="" enctype="multipart/form-data">
                                <label for="taikhoan">Tài khoản:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="username" type="text" class="form-control" placeholder="Nhập tài khoản ...">
                                    </div>
                                </div>
                                <label for="matkhau">Mật khẩu:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password" type="text" class="form-control" placeholder="Nhập mật khẩu ...">
                                    </div>
                                </div>

                            <div class="row clearfix">
                                <div class="col-sm-3">
                                <label for="username">Loại Random:</label>
                                    <select name="loainick" class="form-control show-tick">
                                        <option value="4">Random 20k</option>   <option value="5">Random 50k</option>
                                        <option value="6">Nuôi Rồng 20k</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                <label for="username">Chọn Server:</label>
                                    <select name="server" class="form-control show-tick">
                                        <option value="1">Server 1 Sao</option>
                                        <option value="2">Server 2 Sao</option>
                                        <option value="3">Server 3 Sao</option>
                                        <option value="4">Server 4 Sao</option>
                                        <option value="5">Server 5 Sao</option>
                                        <option value="6">Server 6 Sao</option>
                                        <option value="7">Server 7 Sao</option>
                                    </select>
                                </div>
                            </div>
                                <label for="giatien">Giá tiền:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="giatien" type="number" class="form-control" placeholder="Nhập giá card cần bán ...">
                                    </div>
                                </div>
                                <label for="exampleTextarea">Link Hình ảnh:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control" name="hinhanh" rows="3" placeholder="Link Ảnh (Chỉ Điền 1 Link Ảnh)"></textarea>
                                    </div>
                                </div>
                               <button type="submit" name="submit" class="btn bg-light-blue">ĐĂNG BÁN TÀI KHOẢN</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php 
	}
include 'footer.php';
?>