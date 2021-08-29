<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';


//if($tom['admin'] < 1) {
//	header('Location: /index.php');
//} else
if(!$ctv_login) {
	header('Location: login.php');
} else {
	
?>
    <section class="content">
<?php if($congtacvien['admin'] >= 5) { ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2>THỐNG KÊ HỆ THỐNG</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">THÀNH VIÊN</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Users`"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance_wallet</i>
                        </div>
                        <div class="content">
                            <div class="text">SỐ TIỀN CỦA THÀNH VIÊN</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(sodu) FROM `TOM_Users`"), 0)); ?>đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">credit_card</i>
                        </div>
                        <div class="content">
                            <div class="text">TẤT CẢ THẺ ĐÃ NẠP</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe`"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">vertical_align_top</i>
                        </div>
                        <div class="content">
                            <div class="text">TỔNG SỐ TIỀN ĐÃ NẠP</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(amount) FROM `DLC_Napthe`"), 0)); ?>đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">gavel</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN NGỌC RỒNG</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick`"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_turned_in</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN NGỌC RỒNG ĐÃ BÁN</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `loaigame` = '0'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">gavel</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN RANDOM</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrd`"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_turned_in</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN RANDOM ĐÃ BÁN</div>
                            <div class="number count-to"data-from="0" data-to="<?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrddamua`"), 0); ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-amber hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">TỔNG ĐƠN VÀNG ĐÃ ĐẶT</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `dichvu` = '1'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">TỔNG ĐƠN NGỌC ĐÃ ĐẶT</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `dichvu` = '2'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">unarchive</i>
                        </div>
                        <div class="content">
                            <div class="text">TỔNG ĐƠN BÁN NICK</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nhapnick`"), 0); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid">
            <div class="block-header">
                <h2>THỐNG KÊ HÔM NAY</h2>
            </div>
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">add_shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">DOANH THU HÔM NAY</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(trigia) FROM `DLC_Nickdamua` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">credit_card</i>
                        </div>
                        <div class="content">
                            <div class="text">SỐ TIỀN NẠP HÔM NAY</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(amount) FROM `DLC_Napthe` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">credit_card</i>
                        </div>
                        <div class="content">
                            <div class="text">SỐ THẺ NẠP HÔM NAY</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN NGỌC RỒNG ĐÃ BÁN</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `loaigame` = '0'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">check</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN RANDOM ĐÃ BÁN</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `loaigame` = '3'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN NGỌC ĐÃ BÁN HÔM NAY</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `tinhtrang` ='1' AND `dichvu` = '2'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">SỐ NGỌC ĐÃ BÁN HÔM NAY</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(vangngoc) FROM `DLC_Dichvu` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `tinhtrang` ='1' AND `dichvu` = '2'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-amber hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN VÀNG ĐÃ BÁN HÔM NAY</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `tinhtrang` ='1' AND `dichvu` = '1'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-amber hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">SỐ VÀNG ĐÃ BÁN HÔM NAY</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(vangngoc) FROM `DLC_Dichvu` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `tinhtrang` ='1' AND `dichvu` = '1'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN NGỌC RỒNG ĐÃ ĐĂNG</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year'"), 0); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN RANDOM ĐÃ ĐĂNG</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrd` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year'"), 0); ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">unarchive</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN BÁN NICK HÔM NAY</div>
                            <div class="number"><?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nhapnick` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year'"), 0); ?></div>
                        </div>
                    </div>
                </div></div></div></div>
<?php } ?>
        <div class="container-fluid">
            <div class="block-header">
                <h2>THỐNG KÊ TÀI KHOẢN - <font color="red"><?=$ctv_login?></font></h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
<?php if($congtacvien['admin'] == 0) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN NGỌC RỒNG ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `loaigame` ='0' AND `nguoiban` = '".$congtacvien['user']."'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 5) { ?>

               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN NGỌC RỒNG ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `loaigame` ='0' AND `nguoiban` = '".$congtacvien['user']."'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 1) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN LIÊN QUÂN ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nicklqdamua` WHERE `nguoiban` = '".$congtacvien['user']."'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 5) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-deep-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN LIÊN QUÂN ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nicklqdamua` WHERE `nguoiban` = '".$congtacvien['user']."'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 5) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">TÀI KHOẢN RANDOM ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickrddamua` WHERE `nguoiban` = '".$congtacvien['user']."'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 2) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN VÀNG ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_vang` WHERE `nguoiban` = '".$congtacvien['user']."'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 5) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN VÀNG ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `nguoiban` = '".$congtacvien['user']."' AND `dichvu` = '1'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 3) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN NGỌC ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `nguoiban` = '".$congtacvien['user']."' AND `dichvu` = '2'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
<?php if($congtacvien['admin'] == 5) { ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-indigo hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">ĐƠN NGỌC ĐÃ BÁN</div>
                            <div class="number">+ <?php echo mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE  `dichvu` = '2'"), 0); ?></div>
                        </div>
                    </div>
                </div>
<?php } ?>
               <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">date_range</i>
                        </div>
                        <div class="content">
                            <div class="text">DOANH THU HÔM NAY</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(trigia) FROM `DLC_Nickdamua` WHERE `ngay` = '$day' AND `thang` = '$month' AND `nam` = '$year' AND `nguoiban` = '".$congtacvien['user']."'"), 0)); ?>đ</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_returned</i>
                        </div>
                        <div class="content">
                            <div class="text">TỔNG NICK BẠN ĐANG TREO BÁN</div>
                            <div class="number"><?=number_format($congtacvien['nickdangban'])?></div>
                        </div>
                    </div>
                </div>
<?php
$nro2 = mysql_result(mysql_query("SELECT SUM(giatien) FROM `TOM_Nick` WHERE `congtacvien` = '".$congtacvien['user']."'"), 0);
$rd2 = mysql_result(mysql_query("SELECT SUM(giatien) FROM `DLC_Nickrd` WHERE `congtacvien` = '".$congtacvien['user']."'"), 0);
$lq2 =  mysql_result(mysql_query("SELECT SUM(giatien) FROM `DLC_Nicklq` WHERE `congtacvien` = '".$congtacvien['user']."'"), 0);
$giatriacc = $nr2+$rd2+$lq2;
?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">done</i>
                        </div>
                        <div class="content">
                            <div class="text">GIÁ TRỊ ACC CỦA BẠN</div>
                            <div class="number"><?php echo number_format($giatriacc); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">GIÁ TRỊ ACC BẠN ĐÃ BÁN</div>
                            <div class="number"><?php echo number_format(mysql_result(mysql_query("SELECT SUM(trigia) FROM `DLC_Nickdamua` WHERE `nguoiban` = '".$congtacvien['user']."'"), 0)); ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-teal hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">account_balance</i>
                        </div>
                        <div class="content">
                            <div class="text">DOANH THU TỔNG CỦA BẠN</div>
                            <div class="number"><?=number_format($congtacvien[doanhthu]); ?>đ</div>
                        </div>
                    </div>
                </div>
<?php 
	}
include 'footer.php';
?>