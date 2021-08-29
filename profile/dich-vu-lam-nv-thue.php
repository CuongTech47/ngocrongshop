<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'DỊCH VỤ LÀM NHIỆM VỤ THUÊ';
include '../tomdz/header.php';
include '../tomdz/functions.php';
iF(!$user_login) { 
header( 'Location: /');
} elseif ($system['ruttien'] == 1) {
	die("<script>
    window.alert('Vui lòng đăng nhập để sử dụng dịch vụ!);
    window.location.href='/index.php';
	</script>");
	exit;
} else {
?>
<div class="c-layout-page">
    <!-- BEGIN: PAGE CONTENT -->
    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
        <div class="container">
            <?php
            $Get_goi = array("(Làm Nv Thuê)Tiêu Diệt Tiểu Đội Sát Thủ", "(Làm Nv Thuê)Tiêu Diệt Fide 1,2,3", "(Làm Nv Thuê)Tiêu Diệt Androi 19,20,13,14,15", "(Làm Nv Thuê)Tiêu Diệt Poc,Pic,King Kong");
            $Get_gia = array("40000", "50000", "65000", "110000");
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $server = intval($_POST['server']+1);
                $selected = intval($_POST['selected']);
                $customer_data0 = mysql_real_escape_string($_POST['customer_data0']);
                $customer_data1 = mysql_real_escape_string($_POST['customer_data1']);
                if(!$tom['username']) {
                    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Vui lòng đăng nhập để sử dụng dịch vụ</div>';
                } elseif(empty($customer_data0) || empty($customer_data1)) {
                    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Vui lòng điền đầy đủ thông tin yêu cầu để thanh toán</div>';
                } elseif(strlen($selected) < 0 || strlen($selected) > 3) {
                    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Lựa chọn dịch vụ không hợp lệ</div>';
                } elseif($tom['sodu'] < $Get_gia[$selected]) {
                    echo'<div class="alert alert-danger alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Bạn không đủ tiền để thanh toán. Vui lòng nạp thêm tiền vào tài khoản</div>';
                } else {
                        $balance = $tom['sodu'] - $Get_gia[$selected];
                        mysql_query("UPDATE `TOM_Users` SET `sodu` = `sodu` - '".$Get_gia[$selected]."' WHERE `username` = '".$tom['username']."'");
                        mysql_query("INSERT INTO `Service` SET 
                        `username` = '".$tom['username']."',
                        `group_id` = '1',
                        `service` = '2',
                        `price` = '".$Get_gia[$selected]."',
                        `title` = '".$Get_goi[$selected]."',
                        `acc_name` = '".$customer_data0."',
                        `acc_pass` = '".$customer_data1."',
                        `server` = '".$server."',
                        `status` = '1',
                        `day` = '".$day."', `month` = '".$month."', `year` = '".$year."',
                        `time` = '".time()."'");
                        $id = number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `Service`"), 0));
                        $noidung = 'Thanh toán dịch vụ #'.$id.'';
                        mysql_query("INSERT INTO `History` SET 
                        `username` = '".$tom['username']."',
                        `trade_type` = '10',
                        `amount` = '".$Get_gia[$selected]."',
                        `balance` = '".$balance."',
                        `content` = '".$noidung."',
                        `status` = '2',
                        `day` = '".$day."', `month` = '".$month."', `year` = '".$year."',
                        `time` = '".time()."'");
                        header('Location: /dich-vu/lich-su-thue-dich-vu');
                        $_SESSION['msg'] = '<div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                             Thực hiện thanh toán thành công</div>';
                    }
                }
            ?>
        </div>
        <div class="text-center" style="margin-bottom: 50px;">
            <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">DỊCH VỤ LÀM NHIỆM VỤ THUÊ</h2>
            <div class="row  hidden-sm hidden-md hidden-lg">
                <p style="margin-top: 15px;font-size: 23px" class="bb"><i class="fa fa-server" aria-hidden="true"></i> <a href="/dich-vu/ngoc-rong" style="color:#32c5d2">NGỌC RỒNG ONLINE</a></p>
            </div>
        </div>
        <form method="POST" action="" accept-charset="UTF-8" class="" enctype="multipart/form-data">
        <div class="container detail-service">
            <div class="col-md-7" style="margin-bottom:20px;">
                <div class="row-flex-safari service-info">
                    <div class="col-md-5 hidden-xs hidden-sm">
                        <div class="row">
                            <div class="news_image">
                                <img src="https://nick.vn/storage/images/vuQtyFn1Gl_1623228670.jpg" alt="Làm Nhiệm Vụ Thuê">
                            </div>
                        </div>
                        <div class="row">
                            <p style="margin-top: 15px" class="bb"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Làm Nhiệm Vụ Thuê</p>
                            <p style="margin-top: 15px" class="bb"><i class="fa fa-server" aria-hidden="true"></i> <a href="/dich-vu/ngoc-rong" style="color:#32c5d2">Ngọc Rồng Online</a></p>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <span class="mb-15 control-label bb">Server:</span>
                        <div class="mb-15">
                            <select name="server[]" class="server-filter form-control t14" style="">
                                <option value="0">Vũ Trụ 1 Sao  </option>
                                <option value="1">Vũ Trụ 2 Sao  </option>
                                <option value="2">Vũ Trụ 3 Sao  </option>
                                <option value="3">Vũ Trụ 4 Sao  </option>
                                <option value="4">Vũ Trụ 5 Sao  </option>
                                <option value="5">Vũ Trụ 6 Sao  </option>
                                <option value="6">Vũ Trụ 7 Sao  </option>
                            </select>
                        </div>
                        <span class="mb-15 control-label bb">Chọn Gói:</span>
                         <div class="mb-15">
                             <select name="selected" class="s-filter form-control t14" style="">
                                 <option value="0"><?php echo $Get_goi['0']; ?></option>
                                 <option value="1"><?php echo $Get_goi['1']; ?></option>
                                 <option value="2"><?php echo $Get_goi['2']; ?></option>
                                 <option value="3"><?php echo $Get_goi['3']; ?></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="row emply-btns">
                    <div class="col-md-8 col-md-offset-2">
                        <div class=" emply-btns text-center">
                            <input type="hidden" name="selected" value="">
                            <input type="hidden" name="server" value="">
                            <a id="txtPrice" style="font-size: 20px;font-weight: bold" class="">Tổng: 0 VNĐ</a>
                            <?php if(!$tom['username']) { ?>
                            <a style="font-size: 20px;" class="followus" href="/login" title=""><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập để thanh toán</a>
                            <?php } else { ?>
                            <button id="btnPurchase" type="button" style="font-size: 20px;" class="followus"><i class="fa fa-credit-card" aria-hidden="true"></i> Thanh toán</button>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="row emply-btns box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
                    <p>KingLayDz.Cf:<strong>Bạn bị khó khăn trong việc làm nhiệm vụ thuê ? bạn không thế làm được ? đừng lo đã có web bọn tôi trợ giúp bạn với 1 mức giá nhất định phù hợp với mọi loại kinh tế anh em.</strong></p>
                    <strong>Khi Thuê Anh Em Chú Ý Những Điều Như Sau !.</strong></p>
                    Những Quy Tắc Khi Sử Dụng Dịch Vụ Làm Nhiệm Vụ Thuê:<br>
                         <font color="#FF0000">1.Tuyệt đối không vào nick khi đang làm nếu phá hội gây nhiều phiền phức shop lập tức hủy dịch vụ và chỉ hoàn lại 50% số tiền !.</font><br>
                         <font color="#FF0000">2.Nick cần có chỉ số hp,ki,sđ,giáp,... vừa đủ để làm không đưa những nick quá cùi hay không đủ điều kiện làm</font><br>
                            <font color="#FF0000">3.Nick cần chuẩn bị cn,bk,bh ,... hay những nick càng vip thì làm càng nhanh</font>
                 </div>
            </div>
        </div>
        <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 100px;height: 100px;display: none"></div>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>
                        <br>
                        <div>
                    <div>    
                        <span class="mb-15 control-label bb">Tài Khoản:</span>
                        <div class="mb-15">
                            <input type="text" required class="form-control" name="customer_data1" placeholder="Nhập tài khoản để thực hiện......" id="username">
                       </div>
                        <span class="mb-15 control-label bb">Mật Khẩu:</span>
                        <div class="mb-15">
                            <input type="text" required name="customer_data0" class="form-control t14 " placeholder="Nhập mật khẩu để thực hiện..." value="" id="password">
                                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" id="d3" style="">Xác nhận thanh toán</button>
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
        </form>


    <script>

        $(document).ready(function () {
            $('#btnPurchase').click(function () {

                $('#homealert').modal('show');
            });
        });


        function Confirm(index, serverid) {
            $('[name="server"]').val(serverid);
            $('[name="selected"]').val(index);
            $('#btnPurchase').click();
        }

        var data = jQuery.parseJSON('{"input_auto":"0","image_oldest":"1","server_mode":"1","server_price":"0","server_id":["0","1","2","3","4","5","6"],"server_data":["Vũ Trụ 1","Vũ Trụ 2","Vũ Trụ 3","Vũ Trụ 4","Vũ Trụ 5","Vũ Trụ 6","Vũ Trụ 7"],"filter_name":"Bảng Giá Làm Đệ","filter_type":"4","input_pack_min":null,"input_pack_max":null,"input_pack_rate":null,"id":["7","7","7","7"],"name":["<?php echo $Get_goi['0']; ?>","<?php echo $Get_goi['1']; ?>","<?php echo $Get_goi['2']; ?>","<?php echo $Get_goi['3']; ?>"],"price":["<?php echo $Get_gia['0']; ?>","<?php echo $Get_gia['1']; ?>","<?php echo $Get_gia['2']; ?>","<?php echo $Get_gia['3']; ?>"],"discount":["1",null,null,null],"total":[null,null,null,null],"day":[null,null,null,null],"punish_price":[null,null,null,null],"praise_day":[null,null,null,null],"praise_price":[null,null,null,null],"send_name":["Tài Khoản","Mật Khẩu"],"send_type":["1","5"],"send_id0":[null],"send_data0":[null],"send_id1":[null],"send_data1":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
        console.log(data);


                        var purchase_name = 'VNĐ';
                
        var server = -1;

        $(".server-filter").change(function (elm, select) {
            server = parseInt($(".server-filter").val());
            $('[name="server"]').val(server);
            UpdatePrice();
        });
        server = parseInt($(".server-filter").val());
        $('[name="server"]').val(server);

    </script>



        <script>
        var itemselect = -1;
        $(document).ready(function () {
            $(".s-filter").change(function (elm, select) {
                itemselect = parseInt($(".s-filter").val());
                UpdatePrice();
            });
            itemselect = parseInt($(".s-filter").val());
            UpdatePrice();
        });

        function UpdatePrice() {
            var price = 0;
            if (itemselect == -1) {
                return;
            }

            if (data.server_mode == 1 && data.server_price == 1) {

                var s_price = data["price" + server];
                price = parseInt(s_price[itemselect]);
            }
            else {
                var s_price = data["price"];
                price = parseInt(s_price[itemselect]);
            }


            $('#txtPrice').html('Tổng: ' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ');
            $('[name="selected"]').val($(".s-filter").val());

            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
            $('tbody tr.selected').removeClass('selected');
            $('tbody tr').eq(itemselect).addClass('selected');

        }

        function ConfirmBuy(value) {
            var index = $('.server-filter').val();
            Confirm(value, index);
        }
    </script>

    <script>
        $(document).ready(function () {
            $('.load-modal').each(function (index, elem) {
                $(elem).unbind().click(function (e) {
                    e.preventDefault();
                    e.preventDefault();
                    var curModal = $('#LoadModal');
                    curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                    curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
                });
            });
        });
    </script>

<!-- END: PAGE CONTENT -->
</div>
<?php 
}
include '../tomdz/footer.php';
?>