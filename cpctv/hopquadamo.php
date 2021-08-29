
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
<div class="boxHeader pageBoxHeader clearfix">
	<div class="pull-left">
		<h1 class="pageTitle">
			<a href="#" title="#">Dashboard</a>
		</h1>
		<ol class="breadcrumb">
			<li><a href="dashboard.html">Admin Panel</a></li>
			<li class="active">Danh Sách mua Lượt mở hộp quà</li>
		</ol>
	</div>
</div>


<div class="box rte"> 
<div class="table-responsive">  
<label for=""><i class="fa fa-history"></i> Danh sách mua lượt mở </font></label><br/>
<small id="fileHelp" class="form-text text-muted">tất cả mua lượt mở quà trên hệ thống bao gồm của CTV.</small><br/><br/>

<table class="table">
<thead>
   <tr>
	   <th>Order #</th>
	   <th>Người mua</th>
	   <th>Số tiền nhận được</th>
	   <th>Thời gian</th>
   </tr>
</thead>
<tbody>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_hopqua`"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_hopqua` ORDER by ID DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">#<?php echo $gettom[ID]; ?></th>
   <td><?php echo strip_tags($gettom[nguoimua]); ?></td>
   <td><?php echo number_format($gettom[sotien]); ?> <sup>VNĐ</sup></td>
   <td><?php echo date('d/m/Y - H:i:s', $gettom['time']); ?></td>
</tr> 
<?php } ?>
</tbody>
</table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('hopquadamo.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
</div>
</div>
</div>

<?php 
	}
include 'footer.php';
?>