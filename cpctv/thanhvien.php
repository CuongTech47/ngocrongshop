
<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';
if(!$ctv_login) {
	header('Location: /index.php');
	exit;
} elseif($congtacvien['admin'] < 5) {
	header('Location: /cpctv');
	exit;
} else {
?>
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DANH SÁCH THÀNH VIÊN</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>DANH SÁCH THÀNH VIÊN</B>
                            </h2>
                        </div>
                        <div class="body">
<?php if($_GET['congtien']) { ?>
<?php 
if(isset($_POST['congtien'])) {
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$sotien = intval($_POST['sotien']);
mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` + '".$sotien."' WHERE `ID` = '".intval($_GET['congtien'])."'");
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Cộng tiền vào tài khoản Thành Công! '.$sotien.' VNĐ
</div>';
} 
} 
?>
<form action="" method="post">
  <div class="form-group">
    <label for="">Cộng tiền Cho Tài khoản #<?php echo $_GET['congtien']; ?></label>
    <input type="number" name="sotien" class="form-control" placeholder="Số tiền ...">
    <small id="emailHelp" class="form-text text-muted">Nhập Số tiền muốn cộng.</small>
  </div>
  <button type="submit" name="congtien" class="btn bg-light-blue">Cộng tiền</button>
</form>
<br>
<?php } ?>

<?php if($_GET['luotquay']) { ?>
<?php 
if(isset($_POST['luotquay'])) {
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$soluot = intval($_POST['soluot']);
mysql_query("UPDATE TOM_Users SET `vongquay` = `vongquay` + '".$soluot."' WHERE `ID` = '".intval($_GET['luotquay'])."'");
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Thêm  '.$soluot.' lượt quay vào tài khoản Thành Công!
</div>';
} 
} 
?>
<form action="" method="post">
                                <div class="form-group">
                                    <div class="form-line">
    <label for="">Thêm lượt quay Cho Tài khoản #<?php echo $_GET['luotquay']; ?></label>
    <input type="number" name="soluot" class="form-control" placeholder="Số lượt quay ...">
  </div>
    <small id="emailHelp" class="form-text text-muted">Nhập Số lượt quay muốn thêm.</small>
  </div>
  <button type="submit" name="luotquay" class="btn bg-light-blue">Thêm lượt quay</button>
</form>
<br>
<?php } ?>

<?php if($_GET['locked']) { ?>
<div class="box rte">
<?php 
if(isset($_POST['khoa'])) {
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$locked = intval($_POST['lockkk']);
mysql_query("UPDATE TOM_Users SET `locked` = '".$locked."' WHERE `ID` = '".intval($_GET['locked'])."'");
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
    <strong>Success!</strong> Mở / Khóa tài khoản thành công!
</div>';
} 
} 
?>
<form action="" method="post">
  <div class="form-group">
    <label for="">Khóa tài khoản #<?php echo $_GET['locked']; ?></label>
                                    <select name="lockkk" class="form-control show-tick">
		<option value="0">Mở khóa tài khoản</option>
		<option value="1">Khóa tài khoản</option>
	</select>
  </div>
  <button type="submit" name="khoa" class="btn bg-light-blue">Mở / Khóa</button>
</form>
<br>
<?php } ?>	

<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>ID #</th>
	   <th>Tài Khoản</th>
	   <th>Mật khẩu</th>
	   <th>Họ tên</th>
	   <th>Tín dụng</th>
	   <th>Số lượt quay</th>
	   <th>Trạng thái</th>
	   <th>Hành động</th>
   </tr>
</thead>
<tbody>
	<form action="" method="POST">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Nhập tài khoản người dùng ..." name="search">
		<div class="input-group-btn">
		<button class="btn bg-light-blue" type="submit">
		<i class="fa fa-search"></i> Tìm Thành Viên
		</button>
		</div>
	</div>
	</form><br/>
<?php
$gettrangthai = array("Bình thường", "Đã band");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Users`"), 0);
if (isset($_POST['search'])) {
$search = addslashes($_POST['search']);
$TOM_result = mysql_query("SELECT * FROM `TOM_Users` WHERE `username` = '".$search."' LIMIT $start, $kmess");
} else {
$TOM_result = mysql_query("SELECT * FROM `TOM_Users` LIMIT $start, $kmess");
}
while($gettom = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">#<?php echo $gettom[ID]; ?></th>
   <td><?php echo strip_tags($gettom[username]); ?></td>
   <td><?php echo strip_tags($gettom[password]); ?></td>
   <td><?php echo strip_tags($gettom[name]); ?></td>
   <td><?php echo number_format($gettom[sodu]); ?> <sup>vnđ</sub></td>
   <td><?php echo $gettom[vongquay]; ?></td>
   <td><?php echo $gettrangthai[$gettom[locked]]; ?></td>
   <td>
   <a class="label label-success" href="thanhvien.php?congtien=<?php echo $gettom[ID]; ?>"><font color="white">Cộng tiền</font></a>
   <a class="label label-warning" href="thanhvien.php?luotquay=<?php echo $gettom[ID]; ?>"><font color="white">Thêm lượt quay</font></a>
   <a class="label label-danger" href="thanhvien.php?locked=<?php echo $gettom[ID]; ?>"><font color="white">Khóa/Mở khóa</font></a>   </td>
</tr> 
<?php } ?>
</tbody>
</table>
<!-- Phần hiển thị Nick -->
</div>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('thanhvien.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
</div>

<?php 
	}
include 'footer.php';
?>