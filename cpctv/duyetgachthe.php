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
                <h2>DUYỆT GẠCH THẺ CHẬM</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>DUYỆT GẠCH THẺ CHẬM</B>
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
mysql_query("DELETE FROM DLC_Napthe WHERE id = '".intval($_GET[xoa])."'");
echo '<meta http-equiv=refresh content="0; URL=/cpctv/duyetgachthe.php">';
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Duyệt thẻ cào thành công
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
$getmenhgia = array(0, 10000, 20000, 30000, 50000, 100000, 200000, 300000, 500000, 1000000);
$tinhtrang = intval($_POST['tinhtrang']);
$menhgiachuan = intval($_POST['menhgia']);
$getthe = mysql_fetch_assoc(mysql_query("SELECT * FROM `DLC_Napthe` WHERE `id` = ".intval($_GET['duyet']).""));
$getuser = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `username` = '".$getthe['nguoinap']."'"));
$menhgia = $getthe['amount'] * (100+5)/100;
$menhgiasai = $getmenhgia[$menhgiachuan] * (100-50)/100;
$menhgiafix = $getmenhgia[$menhgiachuan];
$ttmenhgiasai = '<span class="text-success f-700"> Sai mệnh giá (-50%) +'.number_format($menhgiasai).'đ</span>';
$ttchuan = '<span class="text-success f-700"> Đúng mệnh giá (+100%) +'.number_format($menhgia).'đ</span>';
$ttthatbai = '<span class="text-danger f-700">Thẻ sai</span>';
$ttbaotri = '<span class="text-danger f-700">Đang bảo trì</span>';
$ttsaimg = '<span class="text-danger f-700">Sai mệnh giá</span>';
$sotiennapdung = '<span class="c-font-bold text-info">+'.number_format($menhgia).'đ</span>';
$sotiencuoidung = $getuser['sodu'] + $menhgia;
$motadung = 'Nạp thẻ '.$getthe['type'].' '.number_format($getthe['amount']).'đ';
$sotiennapsai = '<span class="c-font-bold text-info">+'.number_format($menhgiasai).'đ</span>';
$sotiencuoisai = $getuser['sodu'] + $menhgiasai;
$motadungsai = 'Nạp thẻ '.$getthe['type'].' '.number_format($getthe['amount']).'đ sai mệnh giá';

if($tinhtrang == 1){
mysql_query("UPDATE TOM_Users SET `sodu` = `sodu` + '".$menhgia."' WHERE `username` = '".$getthe['nguoinap']."'");
mysql_query("INSERT INTO DLC_Logbalance SET 
`username` = '".$getthe['nguoinap']."',
`giaodich` = '2',
`sotien` = '".$sotiennapdung."',
`soducuoi` = '".$sotiencuoidung."',
`mota` = '".$motadung."',
`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
`time` = '".time()."'");
if($menhgia >= 50000){
mysql_query("UPDATE `TOM_Users` SET `vongquay`=`vongquay` + '3' WHERE `username`= '".$getthe['nguoinap']."'");
}
mysql_query("UPDATE DLC_Napthe SET `tinhtrang` = '".$ttchuan."', `tinhtrangduyet` = '1' WHERE `id` = '".intval($_GET['duyet'])."'");
} elseif($tinhtrang == 2){
mysql_query("UPDATE DLC_Napthe SET `tinhtrang` = '".$ttthatbai."', `tinhtrangduyet` = '2' WHERE `id` = '".intval($_GET['duyet'])."'");
} elseif($tinhtrang == 3){
mysql_query("UPDATE DLC_Napthe SET `tinhtrang` = '".$ttbaotri."', `tinhtrangduyet` = '3' WHERE `id` = '".intval($_GET['duyet'])."'");
} elseif($tinhtrang == 4){
mysql_query("UPDATE DLC_Napthe SET `tinhtrang` = '".$ttsaimg."', `tinhtrangduyet` = '4' WHERE `id` = '".intval($_GET['duyet'])."'");
}
echo '<div class="alert alert-success"><strong>Thông báo!</strong> Duyệt thẻ theo yêu cầu thành công..</div>';
echo '<meta http-equiv=refresh content="1; URL=/cpctv/duyetgachthe.php">';
}
}
}
?>
                            <form action="" method="post">
                                <label for="pwd">Tình Trạng thẻ</label>
                                    <select name="tinhtrang" class="form-control show-tick">
                                        <option value="1">Hoàn thành</option>
                                        <option value="2">Thất bại</option>
                                        <option value="3">Đang bảo trì</option>
                                        <option value="4">Sai mệnh giá</option>
                                    </select>
<BR><BR>
	  <label for="pwd">Mệnh giá chuẩn: (chỉ hoạt động khi tình trạng thẻ <b style="color:red">Sai mệnh giá</b> - 50%)</label>
		<select class="form-control" name="menhgia">
		<option value="1">10,000 VNĐ</option>
		<option value="2">20,000 VNĐ</option>
		<option value="3">30,000 VNĐ</option>
		<option value="4">50,000 VNĐ</option>
		<option value="5">100,000 VNĐ</option>
		<option value="6">200,000 VNĐ</option>
		<option value="7">300,000 VNĐ</option>
		<option value="8">500,000 VNĐ</option>
		<option value="9">1,000,000 VNĐ</option>
		</select>
<BR><BR>
                               <button type="submit" name="congtien" class="btn bg-light-blue">THỰC HIỆN</button>
</form>
<BR><BR>
<?php } ?>	
<script>
 setInterval(function(){
      $.ajax({
	url : '/style/ajax/DLC_duyetthe.php?datlechin',
	type : 'POST',
 	success : function(result){
	var x = $.parseJSON(result);
$('#list').html(x.msg);


		}
}); },5000);

</script>
<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>STT</th>
	   <th>Người nạp</th>
	   <th>Serial Thẻ</th>
	   <th>Mã Thẻ</th>
	   <th>Loại thẻ</th>
	   <th>Mệnh giá</th>
	   <th>Thời gian</th>
	   <th>Tình Trạng</th>
	   <th>Thao tác</th>
   </tr>
</thead>
<tbody id="list">
<?php
$getloaithe = array("Viettel", "Vinaphone", "Mobifone");
$getmenhgia = array(10000, 20000, 50000, 100000, 200000, 300000, 500000, 1000000);
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `tinhtrangduyet` = '0'"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Napthe` WHERE `tinhtrangduyet` = '0' ORDER by id DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
if($getdlc['tinhtrang'] == 0){
	$tinhtrang = '<span class="label label-warning"> Đang Xử lý </span>';
} elseif($getdlc['tinhtrangduyet'] == 1){
	$tinhtrang = '<span class="label label-success"> Hoàn thành </span>';
} elseif($getdlc['tinhtrangduyet'] == 2){
	$tinhtrang = '<span class="label label-danger"> Thất bại </span>';
} elseif($getdlc['tinhtrangduyet'] == 3){
	$tinhtrang = '<span class="label label-danger"> Đang bảo trì </span>';
} elseif($getdlc['tinhtrangduyet'] == 4){
	$tinhtrang = '<span class="label label-danger"> Sai mệnh giá </span>';
}
$getuser = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Users` WHERE `uid` = ".$gettom['uid'].""));
?>
<tr>
   <th scope="row">#<?php echo $gettom['id']; ?></th>
   <td><?php echo $gettom['nguoinap']; ?></td>
   <td><?php echo strip_tags($gettom['serial']); ?></td>
   <td><?php echo strip_tags($gettom['pin']); ?></td>
   <td><?php echo $gettom['type']; ?></td>
   <td><?php echo number_format($gettom['amount']); ?> <sup>VNĐ</sup></td>
   <td><?php echo date('d/m/Y - H:i:s', $gettom['time']); ?></td>
   <td><?php echo $tinhtrang; ?></td>
   <td>
   <a href="?duyet=<?php echo $gettom[id]; ?>">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Duyệt thẻ" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="?xoa=<?php echo $gettom[id]; ?>">
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
echo '<center>' . phantrang_tomdz('duyetgachthe.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
<?php 
	}
include 'footer.php';
?>