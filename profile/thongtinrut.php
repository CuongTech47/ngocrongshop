<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
$title = 'Đơn hàng mã số '.intval($_GET['id']).'';
include '../tomdz/header.php';
?>
<?php if($_GET['id']){ ?>
<?php $id = intval($_GET['id']); ?>
<?php 
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `Hplayer_rut-vang` WHERE `id`='$id'"), 0);
$checkk = mysql_result(mysql_query("SELECT COUNT(*) FROM `Hplayer_rut-vang` WHERE `username` = '".$tom['username']."' AND `id`='$id'"), 0);
if($check < 1){
echo '<br><br><div style="padding-left:20px;font-size: 30px;text-align:center"><b style="color:red">Đơn hàng này không tồn tại!</b></div><br><br>';
	include '../tomdz/footer.php'; 
	exit;
} elseif($checkk<1){
echo '<br><br><div style="padding-left:20px;font-size: 30px;text-align:center"><b style="color:red">Đơn hàng này không phải của bạn!</b></div><br><br>';
	include '../tomdz/footer.php'; 
	exit;
}
?>
<?php
$getdichvu = array("Không xác định", "Rút Vàng", "Bán ngọc");
$getserver = array("1", "2", "3", "4", "5", "6", "7");
$TOM_result = mysql_query("SELECT * FROM `Hplayer_rut-vang` WHERE `username` = '".$tom['username']."' AND id = '$id' LIMIT 1");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
    <div class="c-layout-page" style="margin-top: 20px;">
        <div class="container">
            <div class="c-layout-sidebar-menu c-theme ">
	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
<?php include 'menu.php'; ?>  
	        <div class="c-layout-sidebar-content ">
            <!-- BEGIN: PAGE CONTENT -->
            <!-- BEGIN: CONTENT/SHOPS/SHOP-ORDER-HISTORY-2 -->
            <div class="c-content-title-1">
                <h3 class="c-font-uppercase c-font-bold">Chi tiết yêu cầu #<?php echo $getdlc[id] ;?></h3>
                <div class="c-line-left"></div>
            </div>
            <div class="padding-left" style="font-family: Roboto, sans-serif;">
                <div>
                                            </div>
                </div>
                <div class="cand-details" id="about" style="float: left;width: 100%">
                    <h2>Tên dịch vụ</h2>
<?php if ($getdlc[dichvu] == 1) { ?>
                    <p><a href="/dich-vu/rut-vang"><?php echo $getdichvu[$getdlc[dichvu]] ;?></a></p>
<?php } ?>
<?php if ($getdlc[dichvu] == 2) { ?>
                    <p><a href="/dich-vu/ban-ngoc"><?php echo $getdichvu[$getdlc[dichvu]] ;?></a></p>
<?php } ?>

                    <h2>Công việc</h2>
                    <div class="edu-history-sec" id="education">
                                                                                    <div class="edu-history">
                                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                                    <div class="edu-hisinfo">
                                        <h3><?php echo number_format($getdlc[vangngoc]) ;?> <?php if($getdlc[dichvu] == 1) { ?>Vàng <?php } else { ?> Ngọc <?php } ?> </h3>
                                        <i><?php echo number_format($getdlc[trigia]) ;?> VNĐ</i>
                                    </div>
                                </div>
                                                    

                    </div>
                    <h2>Thông tin đính kèm</h2>
                    <div class="m_datatable m-datatable m-datatable--default m-datatable--loaded">
                        <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                            <thead class="m-datatable__head">
                            <tr class="m-datatable__row">
                                <th style="width:50px;" class="m-datatable__cell">
                                    #
                                </th>
                                <th class="m-datatable__cell">
                                    Tên thông tin
                                </th>
                                <th style="width:150px;" class="m-datatable__cell">
                                    Nội dung
                                </th>
                            </tr>
                            </thead>
                            <tbody class="m-datatable__body">
                                                                                        <tr>
                                    <td>1</td>
                                    <td> Server</td>
                                    <td>
                                        Vũ trụ <?php echo $getserver[$getdlc[server]] ;?> Sao

                                    </td>
                                </tr>
                                                        

                                
                                    <tr>
                                                                                    <td> 2 </td>
                                        
                                        <td> Tài khoản </td>
                                        <td>
                                                                                            <?php echo $getdlc[taikhoan] ;?>
                                                                                    </td>


                                    </tr>

                                                            

                            </tbody>
                        </table>
                    <div class="m-separator m-separator--dashed"></div>

                    <div style="text-align: right">

                                            </div>

                    <h2>Tiến độ</h2>
                    <div class="edu-history-sec" id="experience">


                                                                                    <div class="edu-history style2">
                                    <i></i>
                                    <div class="edu-hisinfo">
                                        <h3>
                                                                                            Chưa giao dịch
                                                                                                                                </h3>
                                        <i><?php echo date('d/m/Y - H:i:s', $getdlc['thoigian']); ?></i>
                                    </div>
                                </div>
<?php if($getdlc[tinhtrang] ==1) { ?>
                                                            <div class="edu-history style2">
                                    <i></i>
                                    <div class="edu-hisinfo">
                                        <h3>
                                                                                            Đã giao dịch
                                                                                    </h3>
                                        <i><?php echo date('d/m/Y - H:i:s', $getdlc['thoigianduyet']); ?></i>
                                    </div>
                                </div>
<?php } ?>
<?php if($getdlc[tinhtrang] ==2) { ?>
                                                            <div class="edu-history style2">
                                    <i></i>
                                    <div class="edu-hisinfo">
                                        <h3>
                                                                                            Thất bại
                                                                                    </h3>
                                        <i><?php echo date('d/m/Y - H:i:s', $getdlc['thoigianduyet']); ?></i>
                                    </div>
                                </div>
<?php } ?>
<?php if($getdlc[tinhtrang] ==3) { ?>
                                                            <div class="edu-history style2">
                                    <i></i>
                                    <div class="edu-hisinfo">
                                        <h3>
                                                                                            Đã hủy - [Lý do: <?php echo $getdlc[lydo] ;?>]
                                                                                    </h3>
                                        <i><?php echo date('d/m/Y - H:i:s', $getdlc['thoigianduyet']); ?></i>
                                    </div>
                                </div>
<?php } ?>
                                                                        </div>


        </div>
    </div>
        </div>
    </div>
    <div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
            <div class="modal-content">
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function () {

            $('.load-modal').on('click', function (e) {
                e.preventDefault();
                var curModal = $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(this).attr('rel'));
            });

            $(document).ready(function () {
                $('#btn-edit').click(function () {

                    $('#edit_info').modal('show');
                });
                $('#btnDestroy').click(function (e) {

                    $('#destroyModal').modal('show');
                });

            });


        });
    </script>

			<!-- END: PAGE CONTENT -->
</div>


<?php } ?>  
<?php }  ?> 
<?php include '../tomdz/footer.php'; ?>