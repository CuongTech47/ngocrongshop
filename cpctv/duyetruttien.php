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
                <h2>DUYỆT RÚT TIỀN</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>DUYỆT RÚT TIỀN</B>
                            </h2>
                        </div>
                        <div class="body">

<?php
if($_GET[error]){
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền CTV?
</div>';
} else {
mysql_query("DELETE FROM DLC_Ruttien WHERE id = '".intval($_GET[error])."'");
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Xóa Yêu cầu khỏi hệ thống thành công
</div>';
echo '<meta http-equiv=refresh content="2; URL=duyetruttien.php">';
}
}

if($_GET[success]){
if($congtacvien['admin'] < 5) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền CTV?
</div>';
} else {
mysql_query("UPDATE DLC_Ruttien SET `tinhtrang` = '1' WHERE id = '".intval($_GET[success])."'");
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Thanh toán Yêu cầu rút tiền trên hệ thống thành công
</div>';
echo '<meta http-equiv=refresh content="2; URL=duyetruttien.php">';
}
}
?>

<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>STT</th>
	   <th>Ngân hàng</th>
	   <th>Chủ tài khoản</th>
	   <th>Số tài khoản/tài khoản ví</th>
	   <th>Chi nhánh</th>
	   <th>Số tiền</th>
	   <th>Thời gian</th>
	   <th>Tình Trạng</th>
	   <th>Thao tác</th>
   </tr>
<thead>
<tbody>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Ruttien`"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Ruttien` ORDER by id DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
	
	if($gettom['tinhtrang'] == 0){
		$tinhtrang = '<span class="label label-warning"> Đang xử lý </span>';
	} elseif($gettom['tinhtrang'] == 1){
		$tinhtrang = '<span class="label label-success"> Đã thanh toán </span>';
	}
?>
<tr>
   <th scope="row">#<?php echo $gettom['id']; ?></th>
   <td><?php echo strip_tags($gettom['bankname']); ?></td>
   <td><?php echo strip_tags($gettom['chubank']); ?></td>
   <td><?php echo strip_tags($gettom['bankaccount']); ?></td>
   <td><?php echo strip_tags($gettom['chinhanh']); ?></td>
   <td><?php echo number_format($gettom['sotien']); ?> <sup>VNĐ</sup></td>
   <td><?php echo date('d/m/Y - H:i', $gettom['time']); ?></td>
   <td><?php echo $tinhtrang; ?></td>
   <td>
   <a href="?success=<?php echo $gettom[id]; ?>">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Thanh toán" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="?error=<?php echo $gettom[id]; ?>">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa Yêu cầu" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
   </a>
   </td>
</tr> 
<?php } ?>
</tbody>
</table>
<br/>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
</div>
</div>

<?php 
	}
include 'footer.php';
?>