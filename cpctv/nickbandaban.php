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
                <h2>TÀI KHOẢN NGỌC RỒNG ĐÃ BÁN</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

<div class="table-responsive">  
<label for=""><i class="fa fa-history"></i> Danh sách tài khoản </font></label><br/>
<small id="fileHelp" class="form-text text-muted">tất cả tài khoản đã bán trên hệ thống của CTV <b><?=$ctv_login?></b>.</small><br/><br/>

<table class="table">
<thead>
   <tr>
	   <th>Order #</th>
	   <th>Người mua</th>
	   <th>Người bán</th>
	   <th>Tài Khoản</th>
	   <th>Mật Khẩu</th>
	   <th>Server</th>
	   <th>Giá tiền</th>
	   <th>Thời gian</th>
   </tr>
</thead>
<tbody>
<?php
$getthongtin = array("NULL", "Đkí Ảo", "Gmail", "Yahoo");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `nguoiban` = '".$ctv_login."' AND `loaigame` ='0'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickdamua` WHERE `nguoiban` = '".$ctv_login."' AND `loaigame` ='0' ORDER by ID DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">Nick #<?php echo $gettom[idnick]; ?></th>
   <td><?php echo $gettom[nguoimua]; ?></td>
   <td><?php echo $gettom[nguoiban]; ?></td>
   <td><?php echo $gettom[taikhoan]; ?></td>
   <td><?php echo $gettom[matkhau]; ?></td>
   <td>Vũ Trụ <?php echo $gettom[server]; ?> Sao</td>
   <td><?php echo number_format($gettom[trigia]); ?> VNĐ</td>
   <td><?php echo date('d/m/Y - H:i:s', $gettom['time']); ?></td>
</tr> 
<?php } ?>
</tbody>
</table>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('nickbandaban.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
</div>
</div>
</div>

<?php 
	}
include 'footer.php';
?>