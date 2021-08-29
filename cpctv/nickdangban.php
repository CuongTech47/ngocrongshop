
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
                <h2>TÀI KHOẢN NGỌC RỒNG ĐANG BÁN</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>TÀI KHOẢN NGỌC RỒNG ĐANG BÁN</B>
                            </h2>
                        </div>
                        <div class="body">

<?php if($_GET['chinhsua']) {
echo '<div class="box rte"> ';
$id = intval($_GET['chinhsua']);
if($congtacvien['admin'] < 5) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$TOM_result = mysql_query("SELECT * FROM `TOM_Nick` WHERE `ID` = '$id'");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>

<?php 
if(isset($_POST['submit'])) {
if($congtacvien['admin'] < 5) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
$taikhoan = mysql_real_escape_string($_POST['taikhoan']);
$matkhau = mysql_real_escape_string($_POST['matkhau']);
$giatien = intval($_POST['giatien']);
$server = intval($_POST['server']);
$hanhtinh = intval($_POST['hanhtinh']);
$bongtai = intval($_POST['bongtai']);
$loainick = intval($_POST['loainick']);
$hinhanh = mysql_real_escape_string($_POST['hinhanh']);
mysql_query("UPDATE `TOM_Nick` SET 
	`taikhoan`='$taikhoan',  `matkhau`='$matkhau',
	`giatien`='$giatien', `hinhanh`='$hinhanh', `bongtai`='$bongtai',
	`server`='$server', `hanhtinh`='$hanhtinh', `loainick`='$loainick'
	WHERE `ID` = '$id'");
echo '<br/><div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Sửa tài khoản thành công!
</div>';
}
}
?>
                            <form method="post" action="">
                                <label for="taikhoan">Tài khoản:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="taikhoan" type="text" class="form-control" value="<?=$gettom['taikhoan'];?>">
                                    </div>
                                </div>
                                <label for="matkhau">Mật khẩu:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="matkhau" type="text" class="form-control" value="<?=$gettom['matkhau'];?>">
                                    </div>
                                </div>
                            <div class="row clearfix">
                                <div class="col-sm-3">
                                <label for="username">Loại Tài khoản:</label>
                                    <select name="loainick" class="form-control show-tick">
                                        <option value="0" <?php if($gettom['loainick'] == 0) { echo 'selected="selected" }'; }?>>Nick Tầm Trung</option>
                                        <option value="1" <?php if($gettom['loainick'] == 1) { echo 'selected="selected" }'; }?>>Nick Sơ Sinh</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                <label for="username">Chọn Server:</label>
                                    <select name="server" class="form-control show-tick">
                                        <option value="1" <?php if($gettom['server'] == 1) { echo 'selected="selected" }'; }?>>Server 1 Sao</option>
                                        <option value="2" <?php if($gettom['server'] == 2) { echo 'selected="selected" }'; }?>>Server 2 Sao</option>
                                        <option value="3" <?php if($gettom['server'] == 3) { echo 'selected="selected" }'; }?>>Server 3 Sao</option>
                                        <option value="4" <?php if($gettom['server'] == 4) { echo 'selected="selected" }'; }?>>Server 4 Sao</option>
                                        <option value="5" <?php if($gettom['server'] == 5) { echo 'selected="selected" }'; }?>>Server 5 Sao</option>
                                        <option value="6" <?php if($gettom['server'] == 6) { echo 'selected="selected" }'; }?>>Server 6 Sao</option>
                                        <option value="7" <?php if($gettom['server'] == 7) { echo 'selected="selected" }'; }?>>Server 7 Sao</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                <label for="username">Hành Tinh:</label>
                                    <select name="hanhtinh" class="form-control show-tick">
                                        <option value="1" <?php if($gettom['hanhtinh'] == 1) { echo 'selected="selected" }'; }?>>Trái Đất</option>
                                        <option value="2" <?php if($gettom['hanhtinh'] == 2) { echo 'selected="selected" }'; }?>>Xayda</option>
                                        <option value="3" <?php if($gettom['hanhtinh'] == 3) { echo 'selected="selected" }'; }?>>NaMếc</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                <label for="username">Bông tai:</label>
                                    <select name="bongtai" class="form-control show-tick">
                                        <option value="0" <?php if($gettom['bongtai'] == 0) { echo 'selected="selected" }'; }?>>Không</option>
                                        <option value="1" <?php if($gettom['bongtai'] == 1) { echo 'selected="selected" }'; }?>>Có</option>
                                    </select>
                                </div>
                            </div>
                                <label for="giatien">Giá tiền:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="giatien" type="number" class="form-control" value="<?=$gettom['giatien'];?>">
                                    </div>
                                </div>

                                <label for="giatien">Hình ảnh:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                            <textarea class="form-control" name="hinhanh" rows="3"><?=$gettom['hinhanh'];?></textarea>
                                        <small id="fileHelp" class="form-text text-muted">Link hình ảnh cách nhau bằng dấu "|".</small>
                                    </div>
                                </div>
                               <button type="submit" name="submit" class="btn bg-light-blue">SỬA TÀI KHOẢN</button>
                            </form>
<br>

<?php } ?>
<?php } ?>
</div>
<?php } ?>



<?php
if($_GET[xoa]){
if($congtacvien['admin'] < 5) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} else {
mysql_query("DELETE FROM TOM_Nick WHERE ID = '".intval($_GET[xoa])."'");
echo '<meta http-equiv=refresh content="0; URL=nickdangban.php">';
echo '<div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Xóa tài khoản thành công!
</div>';
}
}
?>

<div class="table-responsive">  
<table class="table table-hover manage-u-table">
<thead>
   <tr>
	   <th>Order #</th>
	   <th>Người bán</th>
	   <th>Tài Khoản</th>
	   <th>Mật khẩu</th>
	   <th>Giá bán</th>
	   <th>Hành Tinh</th>
	   <th>Server</th>
	   <th>Loại Nick</th>
	   <th>Thao Tác</th>
   </tr>
</thead>
<tbody>
<?php
$gethanhtinh = array("NULL", "Trái đất", "Xayda", "NaMếc");
$getthongtin = array("NULL", "Đkí Ảo", "Gmail", "Yahoo");
$getloainick = array("Nick Tầm Trung", "Nick Sơ Sinh", "Nick Win Doanh Trại", "Bán Đồ", "Ngọc Rồng 20K", "Ngọc Rồng 50K", "Nuôi Rồng 20K");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick`"), 0);
$TOM_result = mysql_query("SELECT * FROM `TOM_Nick` ORDER by ID DESC LIMIT $start, $kmess");
while($gettom = mysql_fetch_assoc($TOM_result)){
$getuser = mysql_fetch_assoc(mysql_query("SELECT * FROM `TOM_Congtacvien` WHERE `user` = '".$gettom['congtacvien']."'"));
?>
<tr>
   <th scope="row">Nick #<?php echo $gettom[ID]; ?></th>
   <td><?php echo $gettom[congtacvien]; ?></td>
   <td><?php echo $gettom[taikhoan]; ?></td>
   <td><?php echo $gettom[matkhau]; ?></td>
   <td style="color:#000"><?php echo number_format($gettom[giatien]); ?> <sup>VNĐ</sup></td>
   <td><?php echo $gethanhtinh[$gettom[hanhtinh]]; ?></td>
   <td>Vũ Trụ <?php echo $gettom[server]; ?> Sao</td>
   <td><?php echo $getloainick[$gettom[loainick]]; ?></td>
   <td>
   <a href="?chinhsua=<?php echo $gettom[ID]; ?>">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Chỉnh sửa tài khoản" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="?xoa=<?php echo $gettom[ID]; ?>">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa tài khoản" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
   </a>
   </td>
</tr> 
<?php } ?>
</tbody>
</table>
</div>
<?php if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('nickdangban.php?', $start, $tong, $kmess) . '</center>';
} ?>
</div>
</div>

<?php 
	}
include 'footer.php';
?>