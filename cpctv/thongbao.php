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
                <h2>THÔNG BÁO</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>ĐĂNG THÔNG BÁO</B>
                            </h2>
                        </div>
                        <div class="body">
<p id="notice"></P>
                                <label for="taikhoan">Tiêu đề:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input id="tieude" type="text" class="form-control" placeholder="Nhập tiêu đề ...">
                                    </div>
                                </div>
                                <label for="matkhau">Nội dung:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input id="noidung" type="text" class="form-control" placeholder="Nhập nội dung ...">
                                    </div>
                                </div>
                               <button id="thongbao" onclick="thongbao()" class="btn bg-light-blue">Thực hiện</button>
                            </div>
<script>
function thongbao(){
var tieude = $('#tieude').val();
var noidung = $('#noidung').val();

$('#thongbao').html('Thực hiện');

 $.ajax({
	url : '../assets/ajax/DLC_thongbao.php',
	type : 'POST',
	data : {tieude : tieude , noidung : noidung},
	success : function(result){
	var x = $.parseJSON(result);
$('#notice').html(x.msg);
$('#thongbao').html('Thực hiện');

		}
 
});
}
 setInterval(function(){
      $.ajax({
	url : '../assets/ajax/DLC_thongbao.php?datlechin',
	type : 'POST',
 	success : function(result){
	var x = $.parseJSON(result);
$('#list').html(x.msg);


		}
}); },2000);
</script>
<div class="table-responsive">  
<table class="table table-hover c-margin-t-40">
<thead>
   <tr>
	   <th>STT</th>
	   <th>Người đăng</th>
	   <th>Nội dung</th>
	   <th>Tiêu đề</th>
	   <th>Thời gian</th>
   </tr>
</thead>
<tbody id="list">
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Thongbao`"), 0);
$TOM_result = mysql_query("SELECT * FROM `DLC_Thongbao` ORDER by ID DESC LIMIT $start, $kmess");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
<tr>
   <th scope="row">#<?php echo $getdlc['id']; ?></th>
   <td><?php echo $getdlc['nguoidang']; ?></td>
   <td><?php echo $getdlc['tieude']; ?></td>
   <td><?php echo $getdlc['noidung']; ?></td>
   <td><?php echo date('d/m/Y - H:i:s', $getdlc['time']); ?></td>
   <td>
   <a href="?xoa=<?php echo $getdlc[id]; ?>">
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
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
<?php 
	}
include 'footer.php';
?>