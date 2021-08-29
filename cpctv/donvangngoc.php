<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';

if(!$ctv_login) {
	header('Location: /index.php');
	exit;
} elseif($congtacvien['admin'] != 2 && $congtacvien['admin'] != 3 && $congtacvien['admin'] < 5) {
	header('Location: /cpctv');
	exit;
} else {
	
?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ĐƠN VÀNG NGỌC</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>ĐƠN VÀNG NGỌC</B>
                            </h2>
                        </div>
                        <div class="body">

<?php if($_GET['set']) { ?>	
<?php
if($congtacvien['admin'] != 2 && $congtacvien['admin'] != 3 && $congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
?>
<?php if(isset($_POST['khoa'])) { ?>
<?php 
if($congtacvien['admin'] != 2 && $congtacvien['admin'] != 3 && $congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$tinhtrang = intval($_POST['tinhtrang']);
mysql_query("UPDATE DLC_Dichvu SET `tinhtrang` = '".$tinhtrang."', `thoigianduyet` = '".time()."' WHERE `id` = '".intval($_GET['set'])."'");  ?>
<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Cập nhận tình trạng đơn hàng thành công!
</div>
<?php echo '<meta http-equiv=refresh content="1; URL=donvangngoc.php">';
		}
	}
} ?>

<form action="" method="post">
    <label for="">Duyệt đơn hàng #<?php echo $_GET['set']; ?></label>
  <select name="tinhtrang" class="form-control">
    <option value="0">Đang xử lý</option>
    <option value="1">Thành công</option>
    <option value="2">Thất bại</option>
    <option value="3">Đã hủy</option>
  </select>
<BR><BR>
  <button type="submit" name="khoa" class="btn btn-danger">Thực hiện</button>
</form>
<BR><BR>
<?php } ?>	

<?php
if($_GET[xoa]){
if($congtacvien['admin'] != 2 && $congtacvien['admin'] != 3 && $congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
mysql_query("DELETE FROM DLC_Dichvu WHERE id = '".intval($_GET[xoa])."'");
echo '<meta http-equiv=refresh content="2; URL=donvangngoc.php">';
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Xóa Đơn hàng thành công!
</div>';
}
}
?>

<div class="table-responsive project-stats">  
<table class="table table-hover c-margin-t-40">
<thead>
	<tr>
		<th>Order #</th>
		<th>Người mua</th>
		<th>Tài khoản</th>
		<th>Mật khẩu</th>
		<th>Vũ trụ</th>
		<th>Số Vàng/Ngọc</th>
		<th>Giá tiền</th>
		<th>Thời Gian</th>
		<th>Tình Trạng</th>
		<th>Thao tác</th>
	</tr>
</thead>
<tbody>
<?php
$getserver = array("1", "2", "3", "4", "5", "6", "7");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu`"), 0);
$logtom = mysql_query("SELECT * FROM `DLC_Dichvu` ORDER BY id DESC LIMIT $start, $kmess");
while ($infotomdz = mysql_fetch_array($logtom)){
if($infotomdz['tinhtrang'] == 0){
	$tinhtrang = '<span class="label label-warning"> Đang Xử lý </span>';
} elseif($infotomdz['tinhtrang'] == 1){
	$tinhtrang = '<span class="label label-success"> Thành công </span>';
} elseif($infotomdz['tinhtrang'] == 2){
	$tinhtrang = '<span class="label label-danger"> Thất bại </span>';
} elseif($infotomdz['tinhtrang'] == 3){
	$tinhtrang = '<span class="label label-danger"> Đã hủy </span>';
}
?>									   
<tr>
<td><?php echo $infotomdz[id]; ?></td>
<td><?php echo $infotomdz[username]; ?></td>
<td><?php echo strip_tags($infotomdz[taikhoan]); ?></td>
<td><?php echo strip_tags($infotomdz[matkhau]); ?></td>
<td><?php echo $getserver[$infotomdz[server]]; ?> Sao</td>
<?php if ($infotomdz[dichvu] == 1) { ?>
<td><?php echo number_format($infotomdz[vangngoc]); ?> Vàng</td><?php } ?>
<?php if ($infotomdz[dichvu] == 2) { ?>
<td><?php echo number_format($infotomdz[vangngoc]); ?> Ngọc</td><?php } ?>
<td><?php echo number_format($infotomdz[trigia]); ?> <sup>VNĐ</sup></td>
<td><?php echo date('d/m/Y - H:i:s', $infotomdz['thoigian']); ?></td>
<td><?php echo $tinhtrang; ?></td>
<td>
   <a href="?set=<?php echo $infotomdz[id]; ?>">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Duyệt đơn vàng" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="?xoa=<?php echo $infotomdz[id]; ?>">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa yêu cầu" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
   </a>
</td>

</tr> 
<?php } ?>											   
</tbody>
</table>
</div>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>

</div>

<?php 
	}
include 'footer.php';
?>