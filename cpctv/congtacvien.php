
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
	header('Location: /index.php');
	exit;
} else {
	
?>
   <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DANH SÁCH CỘNG TÁC VIÊN</h2>
            </div>

            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>DANH SÁCH CỘNG TÁC VIÊN</B>
                            </h2>
                        </div>
                        <div class="body">

<?php 
if($_GET['set']) {
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
?>
<div class="box rte">
<form action="" method="post">
  <div class="form-group">
    <label for="">Chọn Quyền Cho CTV #<?php echo $_GET['set']; ?></label>
  <select name="quyen" class="form-control">
    <option value="">-Chọn Loại CTV-</option>
    <option value="0">Cộng tác Viên Ngọc Rồng</option>
    <option value="1">Cộng tác Viên Liên Quân</option>
    <option value="2">Cộng tác Viên Bán Vàng</option>
    <option value="3">Cộng tác Viên Bán Ngọc</option>
  </select>
    <small id="emailHelp" class="form-text text-muted">Chỉnh sửa tình trạng đơn hàng</small>
  </div>
  <button type="submit" name="khoa" class="btn btn-danger">Thực hiện</button>
</form>
<?php 
if(isset($_POST['khoa'])) {
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$quyen = intval($_POST['quyen']);
mysql_query("UPDATE TOM_Congtacvien SET `admin` = '".intval($quyen)."' WHERE `ID` = '".intval($_GET['set'])."'");  ?>
<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Cập nhật quyền thành công!
</div>
<?php echo '<meta http-equiv=refresh content="1; URL=/cpctv/congtacvien.php">';
		}
	}
} 
?>
</div>
<?php } ?>	

<?php if($_GET['thanhtoan']) { ?>	
<?php
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
?>
<form action="" method="post">
  <div class="form-group">
    <label for="">Bạn có chắc chắn muốn duyệt thanh toán?</label>
  </div>
  <button type="submit" name="thanhtoan" class="btn btn-danger">Thực hiện</button>
</form>
<br>
<?php if(isset($_POST['thanhtoan'])) { ?>
<?php 
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
mysql_query("UPDATE TOM_Congtacvien SET `doanhthu` = '0',`sonickban` = '0' WHERE `ID` = '".intval($_GET['thanhtoan'])."'");  ?>
<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Thanh toán thành công!
</div>
<?php echo '<meta http-equiv=refresh content="1; URL=/cpctv/congtacvien.php">';
		}
	}
} ?>
<?php } ?>	

<?php
if($_GET[xoa]){
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin thân ái dí dái vào mồm bạn?
</div>';
} else {
mysql_query("DELETE FROM TOM_Congtacvien WHERE ID = '".intval($_GET[xoa])."'");
echo '<meta http-equiv=refresh content="0; URL=/cpctv/congtacvien.php">';
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Xóa tài khoản thành công!
</div>';
}
}
?>

<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>ID #</th>
	   <th>Tài Khoản</th>
	   <th>Tổng nick đã bán</th>
	   <th>Nick đang bán</th>
	   <th>Nick đã bán</th>
	   <th>Doanh thu</th>
	   <th>Thanh toán</th>
	   <th>Thao tác</th>
   </tr>
</thead>
<tbody>
	<form action="" method="POST">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="Nhập tên tài khoản  ..." name="search">
		<div class="input-group-btn">
		<button class="btn bg-light-blue" type="submit">
		<i class="fa fa-search"></i> Tìm Thành Viên
		</button>
		</div>
	</div>
	</form><br/>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Congtacvien`"), 0);
if (isset($_POST['search'])) {
$search = addslashes($_POST['search']);
$TOM_result = mysql_query("SELECT * FROM `TOM_Congtacvien` WHERE `user` = '".$search."' LIMIT $start, $kmess");
} else {
$TOM_result = mysql_query("SELECT * FROM `TOM_Congtacvien` LIMIT $start, $kmess");
}
while($gettom = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">#<?php echo $gettom[ID]; ?></th>
   <td><?php echo $gettom[user]; ?></td>
   <td><?php echo $gettom[nickdangban]; ?> Acc</td>
   <td><?php echo $gettom[sonickban]; ?> Acc</td>
   <td><?php echo number_format($gettom[doanhthu]); ?> <sup>vnđ</sub></td>
   <td><?php $thucnhan = $gettom[doanhthu] * (100-15)/100; echo number_format($thucnhan); ?> <sup>vnđ</sub></td>
<td>
   <a href="/cpctv/congtacvien.php?set=<?php echo $gettom[ID]; ?>">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Set quyền cho tài khoản" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="/cpctv/congtacvien.php?xoa=<?php echo $gettom[ID]; ?>">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa tài khoản" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
   </a>

   <a href="/cpctv/congtacvien.php?thanhtoan=<?php echo $gettom[ID]; ?>">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Thanh toán Doanh thu" class="btn btn-success btn-outline btn-xs m-r-5 tooltip-success"><i class="material-icons">money</i></button>
   </a>
</td>
</tr> 
<?php } ?>
</tbody>
</table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('congtacvien.php?', $start, $tong, $kmess) . '</center>';
} ?>
<!-- Phần hiển thị Nick -->
</div>
</div>
</div>

<?php 
	}
include 'footer.php';
?>