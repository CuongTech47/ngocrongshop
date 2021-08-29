<?php 
// SOURCE CODE Được viết bởi nguyễn phúc nguyên
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';

if(!$ctv_login) {
	header('Location: /index.php');
	exit;
} else {
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ĐĂNG NICK NGỌC RỒNG</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>ĐĂNG NICK NGỌC RỒNG</B>
                            </h2>
                        </div>
                        <div class="body">
<?php

if(isset($_POST['submit'])) {
	
$taikhoan = mysql_real_escape_string($_POST['taikhoan']);
$matkhau = mysql_real_escape_string($_POST['matkhau']);
$giatien = intval($_POST['giatien']);
$giatcsr = intval($_POST['giatcsr']);
$server = intval($_POST['server']);
$hanhtinh = intval($_POST['hanhtinh']);
$loainick = intval($_POST['loainick']);
//$hinhanh = mysql_real_escape_string($_POST['hinhanh']);


$target_dir = $_SERVER['DOCUMENT_ROOT']  . '/uploads/';
function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
if ($file_post['error'][$i] === 0) {
            $file_ary[$i][$key] = $file_post[$key][$i];
}
        }
    }
    return $file_ary;
}

$files = reArrayFiles($_FILES['img']);
$image = array();
foreach($files as $file) {
$err = '';
if ($file['size'] > 1250000) {
    $err .= 'Tệp ' . $file['name'] . ' quá lớn rồi! <br />';
}
if(!preg_match('/image/', $file['type'])) {
    $err .= 'Tệp ' . $file['name'] . ' không phải là hình ảnh!<br />';
}
if (empty($err)) {
$target_file = $target_dir . md5_file($file['tmp_name']) . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
if (move_uploaded_file($file['tmp_name'], $target_file)) {
//echo 'Tệp ' . $file['name'] . ' đã được upload thành công!<br />';
$image[] = '/uploads/' . basename($target_file);
} else {
$err .= 'Xảy ra lỗi trong quá trình upload tệp ' . $file['name'] . '!<br />';
}
}
if (!empty($err)) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> ' . $err . '
</div>';
}
$hinhanh = implode('|', $image);
}



$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `taikhoan`='$taikhoan'"), 0);
if($check > 1){
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Tài khoản đã tồn tại trên hệ thống!
</div>';
} else {
mysql_query("INSERT INTO `TOM_Nick` SET 
	`taikhoan`='$taikhoan',  `matkhau`='$matkhau',
	`giatien`='".abs($giatien)."',`server`='$server', `hanhtinh`='$hanhtinh', `hinhanh`='$hinhanh',
	`loainick`='$loainick', `congtacvien`='$ctv_login'
");
echo '<div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Đăng bán tài khoản thành công
</div>';
}
}
?>


<form action="" method="post" enctype="multipart/form-data">
<div class="form-group">
	<label for="taikhoan">Tài khoản:</label>
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-user"></i></div>
		<input name="taikhoan" type="text" class="form-control" placeholder="Nhập tài khoản ...">
</div>
  <br/>
<div class="form-group">
	<label for="taikhoan">Mật khẩu:</label>
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-lock"></i></div>
		 <input name="matkhau" type="text" class="form-control" placeholder="Nhập mật khẩu ...">
	</div>

 <br/>
 
 <div class="form-group">
	<label for="taikhoan">Loại tài khoản:</label>
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-sitemap"></i></div>
	<select name="loainick" class="form-control">
      <option value="0">Nick Tầm Trung</option>
      <option value="1">Nick Sơ Sinh</option>
    </select>
	</div>

 <br/>

  <div class="form-group">
    <label for="pwd">Giá tiền:</label>
	<div class="input-group">
		<div class="input-group-addon"><i class="fa fa-money"></i></div>
		<input name="giatien" type="number" class="form-control" placeholder="Nhập số tiền ...">
	</div>
	<small id="fileHelp" class="form-text text-muted">Giá tiền cần thanh toán cho tài khoản.</small>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
    <label for="exampleSelect1">Chọn Server</label>
    <select name="server" class="form-control">
      <option value="1">Server 1 Sao</option>
      <option value="2">Server 2 Sao</option>
      <option value="3">Server 3 Sao</option>
      <option value="4">Server 4 Sao</option>
      <option value="5">Server 5 Sao</option>
      <option value="6">Server 6 Sao</option>
      <option value="7">Server 7 Sao</option>
    </select>
	<small id="fileHelp" class="form-text text-muted">Thông tin Server của tài khoản.</small>
  </div>
   <div class="form-group col-md-6">
    <label for="exampleSelect1">Hành Tinh:</label>
    <select name="hanhtinh" class="form-control">
      <option value="1">Trái Đất</option>
      <option value="2">Xayda</option>
      <option value="3">NaMếc</option>
    </select>
	<small id="fileHelp" class="form-text text-muted">Thông tin Nhân vật của tài khoản.</small>
  </div>
  </div>
  <div class="form-group">
	<div class="form-group">
<label for="exampleTextarea">Upload Hình ảnh:</label>
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" /><input class="form-control" type="file" name="img[]" multiple="" accept="image/*" /><input class="form-control" type="file" name="img[]" multiple="" accept="image/*" /><input class="form-control" type="file" name="img[]" multiple="" accept="image/*" /><input class="form-control" type="file" name="img[]" multiple="" accept="image/*" /><input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
<input class="form-control" type="file" name="img[]" multiple="" accept="image/*" />
   
  </form>
<small id="fileHelp" class="form-text text-muted">Hình ảnh mô tả sản phẩm cụ thể.</small>
    <!-- <label for="exampleTextarea">Link Hình ảnh:</label>
    <textarea class="form-control" name="hinhanh" rows="3" placeholder="Link ảnh|Link ảnh| ..."></textarea>
	<small id="fileHelp" class="form-text text-muted">Link hình ảnh cách nhau bằng dấu "|".</small> -->
	</div>

  </div>
  <button type="submit" name="submit" class="btn bg-light-blue">Đăng bán tài khoản</button>
</form>

</div>
</div>

<?php 
	}
include 'footer.php';
?>