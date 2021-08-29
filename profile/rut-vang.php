<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

ob_start();
session_start();
$title = 'Rút Vàng';
include '../tomdz/header.php';
include '../tomdz/functions.php';
?>

    <div class="c-content-box c-size-lg c-overflow-hide c-bg-white font-roboto">
        <div class="container">
            
                    </div>
        <div class="text-center" style="margin-bottom: 50px;">
            <h2 style="font-size: 30px;font-weight: bold;text-transform: uppercase">RÚT VÀNG</h2>
            <div class="row  hidden-sm hidden-md hidden-lg">
                <p style="margin-top: 15px;font-size: 23px" class="bb"><i class="fa fa-server" aria-hidden="true"></i> <a href="/dich-vu/ban-vang" style="color:#32c5d2">Ngọc rồng</a></p>

            </div>
        </div>

        <form method="POST" action="" class="" enctype="multipart/form-data">
        <div class="container detail-service">

            <div class="col-md-7" style="margin-bottom:20px;">
<?php 
if(isset($_POST['submit'])) {
$captcha = $_POST['captcha'];
$server = intval($_POST['server']);
$sotien = intval($_POST['sotien']);
$taikhoan = mysql_real_escape_string($_POST['username']);
$matkhau = mysql_real_escape_string($_POST['password']);
$sovang = $sotien*1;
	
if(!$tom['ID']) {
	echo '<div class="alert alert-danger"> Vui lòng đăng nhập để rút vàng</div>';
} elseif (empty($captcha)) {
	echo '<div class="alert alert-danger"> Bạn chưa nhập mã bảo vệ</div>';	
} elseif (strcasecmp($_SESSION['captcha'], $_POST['captcha']) != 0){ 
	echo '<div class="alert alert-danger"> Mã bảo vệ không đúng</div>';	
} elseif($server < 0 || $server > 7) {
	echo '<div class="alert alert-danger"> Server Bạn chọn không tồn tại hoặc chưa cập nhật</div>';	
} elseif($sotien < 20000000 || $sotien >200000000 ) {
	echo '<div class="alert alert-danger"> Số tiền bạn nhập phải lớn hơn 20tr và nhỏ hơn 200tr vàng.</div>';
} elseif($tom['vang'] < $sotien){
	echo '<div class="alert alert-danger"> Tài khoản của bạn không đủ vàng để rút số vàng này</div>';
} else {
	mysql_query("UPDATE TOM_Users SET `vang` = `vang` - '".$sotien."' WHERE `ID` = '".$tom['ID']."'");
	mysql_query("INSERT INTO Hplayer_rut-vang SET 
	`username` = '".$tom['username']."',
	`dichvu` = '1',
	`trigia` = '".$sotien."',
	`vangngoc` = '".$sovang."',
	`taikhoan` = '".$taikhoan."',
	`matkhau` = '".$matkhau."',
	`server` = '".$server."',
	`ngay` = '".$day."', `thang` = '".$month."', `nam` = '".$year."',
	`tinhtrang` = '0',
	`thoigian` = '".time()."'");
	$sotientt = '<span class="c-font-bold text-danger">-'.number_format($sotien).'đ</span>';
	$soducuoi = $tom[vang] - $sotien;
	$mota = 'Mua '.number_format($sotien).' Vàng';
	header('Location: /dich-vu/hentai');

}
}
?>
                <div class="row-flex-safari service-info">
                    <div class="col-md-5 hidden-xs hidden-sm">
                        <div class="row">
                            <div class="news_image">
                                <img src="https://baonga.com/FileUpload/Images/giavang0753301015729950553652092820144.jpg" alt="Rút vàng">
                            </div>
                        </div>
                        <div class="row">
                            <p style="margin-top: 15px" class="bb"><i class="fa fa-calendar-check-o" aria-hidden="true"></i> Rút vàng</p>
                            <p style="margin-top: 15px" class="bb"><i class="fa fa-server" aria-hidden="true"></i> <a href="/dich-vu/ban-vang" style="color:#32c5d2">Ngọc rồng</a></p>

                        </div>
                    </div>
                    <div class="col-md-7">
                        
                                                                                <span class="mb-15 control-label bb">Chọn máy chủ:</span>
                                                            <div class="mb-15">
                                    <select name="server" class="server-filter form-control t14" style="">
                                                                                                                                    <option value="0">Vũ trụ 1  </option>
                                                                                                                                                                                <option value="1">Vũ trụ 2  </option>
                                                                                                                                                                                
<option value="2">Vũ trụ 3  </option>  

<option value="3">Vũ trụ 4  </option>    

<option value="4">Vũ trụ 5  </option>   

<option value="5">Vũ trụ 6  </option>                                                                                                                                                                               
                                                                                                                                                                           <option value="6">Vũ trụ 7  </option>
                                                                                                                                                                                <option value="7">Vũ trụ 8  </option>
                                                                                                                                                                                <option value="8">Vũ trụ 9  </option>
                                                                                                                                                                                
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           <!--option value="1">Vũ trụ 2  </option>
                                                                                                                                                                                <option value="2">Vũ trụ 3  </option>
                                                                                                                                                                                <option value="3">Vũ trụ 4  </option>
                                                                                                                                                                                <option value="5">Vũ trụ 6  </option>
                                                                                                                                                                                <option value="6">Vũ trụ 7  </option-->
                                                                                                                        </select>
                                </div>
                                                                            





                        

                        <span class="mb-15 control-label bb">Nhập số vàng cần rút:</span>
                        <div class="mb-15">
                            <input name="sotien" autofocus="" value="20000000" class="form-control t14  " id="input_pack" type="text" placeholder="Số tiền">
                            <span style="font-size: 14px;">Số vàng rút phải từ <b style="font-weight:bold;">20,000,000</b>  đến <b style="font-weight:bold;">200,000,000</b> </span>
                        </div>
                        <span class="mb-15 control-label bb">Hệ số:</span>
                        <div class="mb-15">
                            <input type="text" id="txtDiscount" class="form-control t14" placeholder="" value="" readonly="">
                        </div>
                        

                    </div>
                </div>
            </div>
            <div class="col-md-5">


                <div class="row emply-btns">
                    <div class="col-md-8 col-md-offset-2">
                        <div class=" emply-btns text-center">
                            <input type="hidden" name="selected" value="">
                            <input type="hidden" name="server">
                            <a id="txtPrice" style="font-size: 20px;font-weight: bold" class="">Tổng: 0 Vàng</a>
							<?php if(!$_SESSION['USER']) { ?>
                                                            <button rel="<?=$home_url;?>/login.php" type="button" style="font-size: 20px;" class="followus load-modal"><i class="fa fa-sign-in" aria-hidden="true"></i> Đăng nhập để rút vàng</button>
															
							<?php } else { ?>								
                                                            <button id="btnPurchase" type="button" style="font-size: 20px;" class="followus"><i class="fa fa-credit-card" aria-hidden="true"></i> Rút Vàng</button>
							<?php }  ?>
                                                    </div>
                    </div>
                </div>
                <div class="row emply-btns box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
                    <p>Số Vàng Hiện Bạn Đang Có Là:<strong> <?php echo number_format($tom['vang']); ?>

                <div class="row emply-btns box-body" style="color: #505050;padding:20px;line-height: 2;margin-top: 30px">
        <div class="modal fade" id="homealert" role="dialog" style="display: none;" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="loader" style="text-align: center"><img src="/assets/frontend/images/loader.gif" style="width: 50px;height: 50px;display: none"></div>
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Xác nhận thông tin thanh toán</h4>

                    </div>

                    <div class="modal-body">
                                                
                                                                                                <span class="mb-15 control-label bb">Tên Nhân Vật:</span>
                                    
                                                                            <div class="mb-15">
                                            <input type="text" required name="username" class="form-control t14 " placeholder="Nhập tên nhân vật để giao dịch..." value="">
                                        </div>
                                                                                                <span class="mb-15 control-label bb">Nội Dung:</span>
                                    
                                                                            <div class="mb-15">
                                            <input type="text" required name="password" class="form-control t14 " placeholder="Nếu có những nội dung cần thiết thì nhập..." value="">
                                        </div>            
                                                                                                <span class="mb-15 control-label bb">Mã bảo vệ:</span>
                                                                <div class="mb-15">
                            <div class="input-group">
                                    <span class="input-group-addon" style="padding: 0px;">
                                        <img src="<?=$home_url;?>/captcha/captcha.php?rand=<?php echo rand();?>" height="30px" id="captchaimg" onclick="javascript: refreshCaptcha();">
                                    </span>
                                <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="3" autocomplete="off">
                            </div>                                        </div>

                                    
                                                                                    
                        


                    </div>
                    <div class="modal-footer">

                                                                                    <button name="submit" type="submit" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" style="">Xác nhận thanh toán</button>

                                                    
                        <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

                    </div>


                </div>
            </div>
        </div>
        
                    <div class="row">
                        <div class="col-lg-12 column">
                            <div class="job-details">
                                                                    <h2 style="margin-bottom: 23px;font-size: 20px;font-weight: bold;text-transform: uppercase;float: left">Vị trí giao dịch<span style="font-size:14px;margin-top: 8px;margin-left:5px;font-weight:bold;"></span></h2>
                                                                <div class="table-bot m_datatable m-datatable m-datatable--default m-datatable--loaded">
                                    <table class="table table-bordered m-table m-table--border-brand m-table--head-bg-brand">
                                        <thead class="m-datatable__head">
                                        <tr class="m-datatable__row">
                                            <th style="" class="m-datatable__cell">
                                                Server
                                            </th>
                                            <th class="m-datatable__cell">
                                                Nhân vật
                                            </th>
                                            <th style="" class="m-datatable__cell">
                                                Khu vực
                                            </th>
                                            <th style="" class="m-datatable__cell">
                                                Trạng thái
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody class="m-datatable__body-bot">
                                                                                    <tr>
                                                <td>1</td>
                                                                                                <td>Lồn</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                    <span style="color:red;font-weight: bold">[OFFLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>2</td>
                                                                                                <td>king0cltx</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                    <span style="color:red;font-weight: bold">[ONLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>3</td>
                                                                                                <td>botking4</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[ONLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>4</td>
                                                                                                <td>kingla62</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[ONLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>7</td>
                                                                                                <td>kingsb4</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[ONLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>8</td>
                                                                                                <td>Chưa Có</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[OFFLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>5</td>
                                                                                                <td>Chưa có</td>
                                                                                                
                                                <td>39</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[OFFLINE]</span>
                                            </tr>

                                                                                    <tr>
                                                <td>6</td>
                                                                                                <td>beodz03</td>
                                                                                                
                                                <td>44</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[OFFLINE]</span>
                                                </td>
                                            </tr>

                                                                                    <tr>
                                                <td>9</td>
                                                                                                <td>Chưa có</td>
                                                                                                
                                                <td>21</td>
                                                <td>
                                                     <span style="color:red;font-weight: bold">[OFFLINE]</span>
                                                </td>
                                            </tr>

                                                                                </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


        </form>
</div></div>
		<table class="table table-hover table-custom-res">
<thead>

</thead>			   
</tbody>
</table>
    </div></div>
</div>
<?php 
include '../tomdz/footer.php';
?>
 <!-- BEGIN: PAGE CONTENT -->
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

        var data = jQuery.parseJSON('{"input_auto":"1","image_oldest":"1","server_mode":"1","server_price":"1","server_id":["0","1","2","3","4","5","6"],"server_data":["Vũ trụ 1","Vũ trụ 2","Vũ trụ 3","Vũ trụ 4","Vũ trụ 5","Vũ trụ 6","Vũ trụ 7"],"filter_name":"Vàng","filter_type":"7","input_pack_min":"1000","input_pack_max":"190000","input_pack_rate":"1000","id":["7","7","7"],"name":["Vip 1","Vip 2","Vip 3"],"price0":["1000","10000","700000"],"price1":["1000","10000","700000"],"price2":["1000","10000","700000"],"price3":["1000","10000","700000"],"price4":["1000","10000","700000"],"price5":["1000","10000","700000"],"price6":["1000","10000","700000"],"discount0":["1","1","1"],"discount1":["1","1","1"],"discount2":["1","1","1"],"discount3":["1","1","1"],"discount4":["1","1","10"],"discount5":["1","1","1"],"discount6":["1","1","1"],"total0":["2500000","26000000","1820000000"],"total1":["2500000","26000000","1820000000"],"total2":["2500000","26000000","1820000000"],"total3":["2500000","26000000","1820000000"],"total4":["2500000","26000000","1820000000"],"total5":["2500000","26000000","1820000000"],"total6":["2500000","26000000","1820000000"],"day0":[null,null,null],"day1":[null,null,null],"day2":[null,null,null],"day3":[null,null,null],"day4":[null,null,null],"day5":[null,null,null],"day6":[null,null,null],"punish_price0":[null,null,null],"punish_price1":[null,null,null],"punish_price2":[null,null,null],"punish_price3":[null,null,null],"punish_price4":[null,null,null],"punish_price5":[null,null,null],"punish_price6":[null,null,null],"praise_day0":[null,null,null],"praise_day1":[null,null,null],"praise_day2":[null,null,null],"praise_day3":[null,null,null],"praise_day4":[null,null,null],"praise_day5":[null,null,null],"praise_day6":[null,null,null],"praise_price0":[null,null,null],"praise_price1":[null,null,null],"praise_price2":[null,null,null],"praise_price3":[null,null,null],"praise_price4":[null,null,null],"praise_price5":[null,null,null],"praise_price6":[null,null,null],"send_name":["Tên nhân vật"],"send_type":["1"],"send_id0":[null],"send_data0":[null],"input_send_desc":"Khi mua ngọc tại web các bạn lưu ý để trong nick 1 ngọc và đứng tại siêu thị để nhận ngọc nhanh nhé","captcha":null}');
        console.log(data);


                        var purchase_name = 'Vàng';
                
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
        var min = parseInt('20000000');
        var max = parseInt('200000000');
        $('#txtPrice').html('Tổng: 0 ' + purchase_name);

        function UpdatePrice() {

            var container = $('.m-datatable__body').html('');


            if (data.server_mode == 1 && data.server_price == 1) {

                var s_price = data["price" + server];
                var s_discount = data["discount" + server];
            }
            else {
                var s_price = data["price"];
            }


            for (var i = 0; i < data.name.length; i++) {

                var price = s_price[i];
                var discount = s_price[i];


                if (s_price != null && s_discount != null) {
                    var ptemp = '';

                    if (data.length == 1) {
                        ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a class="btn-style border-color" href="/service/purchase/2.html?selected=' + price + '&server=' + server + '">Thanh toán</a> </td> </tr>';
                    } else {
                        ptemp = '<td style="width:180px;" class="m-datatable__cell"> <a onclick="Confirm(' + price + ',' + server + ')" class="btn-style border-color">Thanh toán</a> </td> </tr>';
                    }
                    var temp = '<tr class="m-datatable__row m-datatable__row--even">' +
                        '<td style="width:30px;" class="m-datatable__cell">' + (i + 1) + '</td>' +
                        '<td class="m-datatable__cell">' + data.name[i] + '</td>' +
                        '<td style="width:150px;" class="m-datatable__cell">' + price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' VNĐ</td>' +
                        '<td style="width:250px;" class="m-datatable__cell">' + discount + '</td>' +
                        '<td style="width:180px;" class="m-datatable__cell">' + (parseInt(price * discount / 1000 * data.input_pack_rate)).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' ' + purchase_name + '</td>' + ptemp

                    $(temp).appendTo(container);
                }
            }
            UpdateTotal();
        }

        function UpdateTotal() {
            var price = parseInt($('#input_pack').val().replace(/,/g, ''));

            if (typeof price != 'number' || price < min || price > max) {
                $('button[type="submit"]').addClass('not-allow');

                $('#txtPrice').html('Tiền nhập không đúng');
                return;
            } else {
                $('button[type="submit"]').removeClass('not-allow');
            }
            var total = 0;
            var index = 0;
            var current = 0;
            var discount = 0;


            if (data.server_mode == 1 && data.server_price == 1) {

                var s_price = data["price" + server];
                var s_discount = data["discount" + server];
            }
            else {
                var s_price = data["price"];
                var s_discount = data["discount"];
            }
            for (var i = 0; i < s_price.length; i++) {

                if (price >= s_price[i] && s_price[i] != null) {
                    current = s_price[i];
                    index = i;
                    discount = s_discount[i];
                    total = price * s_discount[i];

                }
            }

            total = parseInt(total / 1000 * data.input_pack_rate);

            $('#txtDiscount').val(discount);
            $('#txtPrice').html('Tổng: ' + (total).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " " + purchase_name);
            $('#txtPrice').removeClass().addClass('bounceIn animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
                $(this).removeClass();
            });
            $('[name="selected"]').val(price);
            $('.m-datatable__body tbody tr.selected').removeClass('selected');
            $('.m-datatable__body tbody tr').eq(index).addClass('selected');
        }

        $('#input_pack').bind('focus keyup', function () {
            UpdateTotal();
        });
        $(document).ready(function () {
            UpdatePrice();
        });

        function ConfirmBuy(value) {
            var index = $('.server-filter').val();
            Confirm(value, index);
        }
    </script>
