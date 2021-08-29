
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
                <h2>THẺ ĐÃ NẠP</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">


<div class="box rte"> 
<div class="table-responsive">  
<label for=""><i class="fa fa-history"></i> DANH SÁCH THẺ ĐÃ NẠP </font></label><br/>
<small id="fileHelp" class="form-text text-muted">Tất cả thẻ đã nạp trên hệ thống</small><br/><br/>

<table class="table">
<thead>
   <tr>
	   <th>Order #</th>
	   <th>Người nạp</th>
	   <th>Kiểu nạp</th>
	   <th>Loại thẻ</th>
	   <th>Mệnh giá</th>
	   <th>Serial</th>
	   <th>Mã thẻ</th>
	   <th>Tình trạng</th>
	   <th>Thời gian</th>
   </tr>
</thead>
<tbody>
<?php
$getkieunap = array("Nạp thẻ chậm", "Nạp thẻ nhanh");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe`"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Napthe` ORDER by ID DESC LIMIT $start, $kmess");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">#<?php echo $getdlc[id]; ?></th>
   <td><?php echo strip_tags($getdlc[nguoinap]); ?></td>
   <td><?php echo $getkieunap[$getdlc[kieunap]]; ?></td>
   <td><?php echo $getdlc[type]; ?></td>
   <td><?php echo number_format($getdlc[amount]); ?>đ</td>
   <td><?php echo strip_tags($getdlc[serial]); ?></td>
   <td><?php echo strip_tags($getdlc[pin]); ?></td>
   <td><?php echo $getdlc[tinhtrang]; ?></td>
   <td><?php echo date('d/m/Y - H:i:s', $getdlc['time']); ?></td>
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
</div>

<?php 
	}
include 'footer.php';
?>