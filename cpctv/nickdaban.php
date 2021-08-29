
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
                <h2>NICK NGỌC RỒNG ĐÃ BÁN</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
<div class="box rte"> 
<div class="table-responsive">  
<label for=""><i class="fa fa-history"></i> Danh sách tài khoản </font></label><br/>
<small id="fileHelp" class="form-text text-muted">tất cả tài khoản đã bán trên hệ thống bao gồm của CTV.</small><br/><br/>

<table class="table">
<thead>
   <tr>
	   <th>Order #</th>
	   <th>Người mua</th>
	   <th>Người bán</th>
	   <th>Tài Khoản</th>
	   <th>Giá tiền</th>
	   <th>Server</th>
	   <th>Thời gian</th>
	   <th>Hành động</th>
   </tr>
</thead>
<tbody>
<?php
$getthongtin = array("NULL", "Đkí Ảo", "Gmail", "Yahoo");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `loaigame` ='0'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickdamua` WHERE `loaigame` ='0' ORDER by ID DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">Nick #<?php echo $gettom[id]; ?></th>
   <td><?php echo strip_tags($gettom[nguoimua]); ?></td>
   <td><?php echo $gettom[nguoiban]; ?></td>
   <td><?php echo $gettom[taikhoan]; ?></td>
   <td><?php echo number_format($gettom[trigia]); ?>đ</td>
   <td><?php echo $gettom[server]; ?> Sao</td>
   <td><?php echo date('d/m/Y - H:i:s', $gettom['time']); ?></td>
   <td><a class="label label-success" href="?hoantien=<?php echo $gettom[id]; ?>"><font color="white">HOÀN TIỀN</font></a></td>

</tr> 
<?php } ?>
</tbody>
</table>
</div>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('nickdaban.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
</div>
</div>

<?php 
	}
include 'footer.php';
?>