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
                <h2>THANH LÝ NICK</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>ĐƠN HÀNG NHẬP NICK</B>
                            </h2>
                        </div>
                        <div class="body">
<?php
if($_GET[xoa]){
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
mysql_query("DELETE FROM DLC_Nhapnick WHERE ID = '".intval($_GET[xoa])."'");
echo '<meta http-equiv=refresh content="0; URL=duyetnhapnick.php">';
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Xóa đơn hàng nhập nick thành công!
</div>';
}
}
?>
<?php if($_GET['duyet']) { ?>	
<?php 
if($congtacvien['admin'] < 5) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
?>
<?php if(isset($_POST['congtien'])) {
if($congtacvien['admin'] < 5) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$tinhtrang = intval($_POST['tinhtrang']);
$menhgia = intval($_POST['menhgia']);
$getthe = mysql_fetch_assoc(mysql_query("SELECT * FROM `DLC_Nhapnick` WHERE `ID` = ".intval($_GET['duyet']).""));
$getuser = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `username` = '".$getthe['nguoiban']."'"));
mysql_query("UPDATE DLC_Nhapnick SET `tinhtrang` = '".$tinhtrang."', `giatien` = '0' WHERE `ID` = '".intval($_GET['duyet'])."'"); 
if($tinhtrang == 1){
mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` + '".$menhgia."' WHERE `username` = '".$getthe['nguoiban']."'");
mysql_query("UPDATE DLC_Nhapnick SET `giatien` = '".$menhgia."' WHERE `ID` = '".intval($_GET['duyet'])."'"); 
	$sotien = '<span class="c-font-bold text-info">+'.number_format($menhgia).'đ</span>';
	$soducuoi = $getuser[sodu] + $menhgia;
	$mota = 'Thanh lý nick Ngọc Rồng giá '.number_format($menhgia).'đ';
	mysql_query("INSERT INTO DLC_Logbalance SET 
	`username` = '".$getthe['nguoiban']."',
	`giaodich` = '6',
	`sotien` = '".$sotien."',
	`soducuoi` = '".$soducuoi."',
	`mota` = '".$mota."',
	`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
	`time` = '".time()."'");
}
echo '<div class="alert alert-success"><strong>Thông báo!</strong> Duyệt đơn hàng theo yêu cầu thành công..</div>';
echo '<meta http-equiv=refresh content="1; URL=duyetnhapnick.php">';
}
}
}
?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <div class="form-line">
                                <label for="pwd">Tình Trạng Đơn hàng</label>
                                    <select name="tinhtrang" class="form-control show-tick">
                                        <option value="1">Hoàn thành</option>
                                        <option value="2">Tài khoản sai</option>
                                        <option value="3">Thất bại</option>
                                    </select>
                                    </div>
                                </div>
	  <label for="pwd">Giá tiền</label>
                                <div class="form-group">
                                    <div class="form-line">
	  <input name="menhgia" type="text" class="form-control" placeholder="Nhập giá tiền nhập ...">
                                    </div>
                                </div>

                               <button type="submit" name="congtien" class="btn bg-light-blue">THỰC HIỆN</button>
</form>
<BR><BR>
<?php } ?>	
<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>STT</th>
	   <th>Người bán</th>
	   <th>Tài khoản</th>
	   <th>Mật khẩu</th>
	   <th>Server</th>
	   <th>Số tiền</th>
	   <th>Nội dung</th>
	   <th>Thời gian</th>
	   <th>Tình Trạng</th>
	   <th>Thao tác</th>
   </tr>
</thead>
<tbody>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nhapnick`"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nhapnick` ORDER by id DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
	
if($gettom['tinhtrang'] == 0){
	$tinhtrang = '<span class="label label-warning"> Đang xử lý </span>';
} elseif($gettom['tinhtrang'] == 1){
	$tinhtrang = '<span class="label label-success"> Hoàn thành </span>';
} elseif($gettom['tinhtrang'] == 2){
	$tinhtrang = '<span class="label label-danger"> Tài khoản sai </span>';
} elseif($gettom['tinhtrang'] == 3){
	$tinhtrang = '<span class="label label-danger"> Thất bại </span>';
}
?>
<tr>
   <th scope="row">#<?php echo $gettom['ID']; ?></th>
   <td><?php echo $gettom['nguoiban']; ?></td>
   <td><?php echo strip_tags($gettom['taikhoan']); ?></td>
   <td><?php echo strip_tags($gettom['matkhau']); ?></td>
   <td><?php echo $gettom['server']; ?> Sao</td>
   <td><?php if($gettom['giatien'] == 0) { ?> Chưa thanh toán<?php } else { ?><?php echo number_format($gettom['giatien']); ?> <sup>VNĐ</sup><?php } ?></td>
   <td><?php echo $gettom['noidung']; ?></td>
   <td><?php echo date('d/m/Y - H:i:s', $gettom['time']); ?></td>
   <td><?php echo $tinhtrang; ?></td>
   <td>
   <a href="?duyet=<?php echo $gettom[ID]; ?>">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Duyệt thẻ" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="?xoa=<?php echo $gettom[ID]; ?>">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa yêu cầu" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
   </a>
   </td>
</tr> 
<?php } ?>
</tbody>
</table>
<!-- Phần hiển thị Nick -->
</div>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('duyetnhapnick.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
<?php 
	}
include 'footer.php';
?>