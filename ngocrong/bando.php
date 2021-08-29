<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
$title = 'Kho Đồ Ngọc Rồng';
include '../tomdz/header.php';
include '../tomdz/functions.php';
$detect = new Mobile_Detect;
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info" role="alert">
                    <h2 class="alert-heading">Kho Đồ Ngọc Rồng</h2>
                    <p><p>Game <strong><a href="http://ngocrongonline.com/" target="_blank">Ngọc Rồng Online</a></strong> thuộc thể thoại game mobile do <strong><a href="http://teamobi.com/home/home-page.html" target="_blank">Teamobi</a></strong> độc quyền ph&aacute;t h&agrave;nh tại Việt Nam</p>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 15px">
            <div class="m-l-10 m-r-10">
                <form class="form-inline m-b-10" action="" method="post">
                    <div class="col-md-4 col-sm-5 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                            <span class="input-group-addon">Giá tiền</span>
                            <select style="" class="form-control c-square" name="locgia">
                                <option value="0">Tìm theo giá</option>
                                <option value="1">Giá Dưới 50k</option>
                                <option value="2">Giá Dưới 100k</option>
                                <option value="3">Giá Dưới 300k</option>
                                <option value="4">Giá Dưới 500k</option>
                                <option value="5">Giá Dưới 1 Triệu</option>
                                <option value="6">Giá Dưới 3 Triệu</option>
                                <option value="7">Giá Dưới 5 Triệu</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-4 col-xs-12  p-5 field-search">
                <div class="input-group c-square">
                    <span class="input-group-addon">Hành Tinh</span>
                            <select style="" class="form-control c-square" name="hanhtinh">
                                <option value="0">Tìm theo hành tinh</option>
                                <option value="1">Trái Đất</option>
                                <option value="2">XayDa</option>
                                <option value="3">Namek</option>
                            </select>
                </div>
            </div>
                    
        
                    <div class="col-md-4 col-sm-5 col-xs-12  p-5 field-search">
                <div class="input-group c-square">
                    <span class="input-group-addon">Server</span>
                            <select style="" class="form-control c-square" name="server">
						<option value="0">Tìm theo sever</option>
						<option value="1">Vũ Trụ 1 Sao</option>
						<option value="2">Vũ Trụ 2 Sao</option>
						<option value="3">Vũ Trụ 3 Sao</option>
						<option value="4">Vũ Trụ 4 Sao</option>
						<option value="5">Vũ Trụ 5 Sao</option>
						<option value="6">Vũ Trụ 6 Sao</option>
						<option value="7">Vũ Trụ 7 Sao</option>
                            </select>
                </div>
            </div>
                                <div class="p-5 no-radius">
                        <button name="timkiem" type="submit" class="btn c-square c-theme c-btn-green">Tìm</button>
                    </div>
                </form>
                <form class="form-inline m-b-10" action="/nickngocrong.html" method="get">

                    <div class="col-md-10 col-sm-10 col-xs-12  p-5 field-search">
                        <div class="input-group c-square">
                    <span class="input-group-addon">Tìm kiếm</span>
                     <input type="text" class="form-control c-square c-theme" name="id" placeholder="Tìm kiếm theo Mã..." autofocus="">
                </div>
            </div>
                                <div class="p-5 no-radius">
                        <button type="submit" class="btn c-square c-theme c-btn-green">Tìm Ngay</button>
                    </div>
                </form>
            </div>
        </div>

                    <div class="row row-flex  item-list">

<?php
$getbongtai = array("Không", "Có");
$gethanhtinh = array("NULL", "Trái đất", "Xayda", "NaMếc");
$tom_getgia = array(0, 50000, 100000, 300000, 500000, 1000000, 3000000, 5000000);
if (isset($_POST['timkiem'])) {
$dlclocht = intval($_POST['hanhtinh']);
if($dlclocht == 0){
 $dlcht = "`hanhtinh` >= '1' AND `hanhtinh` <= '3'";
}elseif($dlclocht == 1){
 $dlcht = "`hanhtinh` = '1'";
}elseif($dlclocht == 2){
 $dlcht = "`hanhtinh` = '2'";
}elseif($dlclocht == 3){
 $dlcht = "`hanhtinh` = '3'";
}
$dlc = intval($_POST['server']);
if($dlc == 0){
 $dlcdz = "`server` >= '1' AND `server` <= '7'";
}elseif($dlc == 1){
 $dlcdz = "`server` = '1'";
}elseif($dlc == 2){
 $dlcdz = "`server` = '2'";
}elseif($dlc == 3){
 $dlcdz = "`server` = '3'";
}elseif($dlc == 4){
 $dlcdz = "`server` = '4'";
}elseif($dlc == 5){
 $dlcdz = "`server` = '5'";
}elseif($dlc == 6){
 $dlcdz = "`server` = '6'";
}elseif($dlc == 7){
 $dlcdz = "`server` = '7'";
}
$to9x = intval($_POST['locgia']);
if($to9x == 0){
 $to9xvn = "`giatien` >= '0' AND `giatien` <= '100000000000'";
}elseif($to9x == 1){
 $to9xvn = "`giatien` < '50000'";
}elseif($to9x == 2){
 $to9xvn = "`giatien` < '100000'";
}elseif($to9x == 3){
 $to9xvn = "`giatien` < '300000'";
}elseif($to9x == 4){
 $to9xvn = "`giatien` < '500000'";
}elseif($to9x == 5){
 $to9xvn = "`giatien` < '1000000'";
}
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `loainick` = '3' AND ".$to9xvn."  AND ".$dlcht." AND ".$dlcdz.""), 3);
$TOM_result = mysql_query("SELECT * FROM `TOM_Nick` WHERE `loainick` = '3' AND ".$to9xvn." AND ".$dlcht." AND ".$dlcdz." ORDER by ID DESC LIMIT $start, $kmess");
} else {
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `loainick` = '3'"), 3);
$TOM_result = mysql_query("SELECT * FROM `TOM_Nick` WHERE `loainick` = '3' ORDER by ID DESC LIMIT $start, $kmess");
}
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
                        <div class="col-sm-6 col-md-3">
                            <div class="classWithPad">
                                <div class="image">

                                    <a href="/acc/<?php echo $getdlc[ID] ;?>">
                                        			<?php if(count(explode('|',$getdlc['hinhanh'])) >= 1){ ?>
                                        			<?php $image = explode("|",$getdlc['hinhanh']); ?>
                                        			<img src="<?=$image[0]?>">        
                                        			<?php } else { ?>
                                        			<img src="<?php echo $getdlc['hinhanh'] ;?>">
                                        			<?php } ?>
                                        <span class="ms">MS: <?php echo $getdlc[ID] ;?></span>
                                    </a>

                                </div>
                                <div class="description">
                                    Server:<?php echo $getdlc[server] ;?> Sao
                                </div>
                                <div class="attribute_info">
                                    <div class="row">
                                                
                    
                                                                                                                                                <div class="col-xs-6 a_att">
                                        Hành Tinh:<span class="c-font-red"><b <b><?php echo $gethanhtinh[$getdlc[hanhtinh]] ;?></b>
                                    </div>
                                                                                                                                                                                                                                                                                                
                    
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-xs-6 a_att">
                                        Sever:<span class="c-font-red"><b <b><?php echo $getdlc[server] ;?> Sao</b>
                                    </div>
                                                                                                                                                                                                                                    </div>
                                    </div>
                                <div class="a-more">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="price_item">
                                                                                                    <?php echo number_format($getdlc[giatien]) ;?>đ
                                                

                                            </div>
                                        </div>
                                        <div class="col-xs-6 ">
                                            <div class="view">
                                                <a href="/acc/<?php echo $getdlc[ID] ;?>">Chi tiết</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
<?php }?>
</div>
<div class="col-md-12"> 
<?php 
if ($tong > $kmess){
echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
} ?>
</div>	

	</div>
	</div></div>
<?php include '../tomdz/footer.php'; ?>