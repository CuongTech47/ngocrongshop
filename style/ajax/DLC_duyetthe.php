<?php 
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Official
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

include '../../tomdz/dbtomdzvl.php';
?>

<?php

if(isset($_GET[datlechin])) {
 
$getloaithe = array("Viettel", "Vinaphone", "Mobifone");
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `tinhtrangduyet` = '0' "), 0);
$DLC_result = mysql_query("SELECT * FROM `DLC_Napthe` WHERE `tinhtrangduyet` = '0' ORDER by id DESC LIMIT 0, 12");
while($getdlc = mysql_fetch_assoc($DLC_result)){
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

$datlechin .='
<tr>
<th scope="row">#'.$getdlc['id'].'</td>
<td>'.$getdlc['nguoinap'].'</td>
<td>'.$getdlc['serial'].'</td>
<td>'.$getdlc['pin'].'</td>
<td>'.$getdlc['type'].'</td>
<td>'.number_format($getdlc['amount']).' <sup>VNĐ</sup></td>
<td>'.date('d/m/Y - H:i:s', $getdlc['time']).'</td>
<td>'.$tinhtrang.'</td>
<td>
   <a href="?duyet='.$getdlc['id'].'">
   <button data-toggle="tooltip" data-placement="top" title="" data-original-title="Duyệt thẻ" type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="material-icons">edit</i></button>
   </a>
   <a href="?xoa='.$getdlc['id'].'">
   <button type="button" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa yêu cầu" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="material-icons">delete</i></button>
   </a>
</td>
</tr>
 ';
 }

$datlechinJSON['msg'] = $datlechin;
    echo json_encode($datlechinJSON);
}	
?>