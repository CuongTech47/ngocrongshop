<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
include '../tomdz/config.php';
include '../tomdz/functions.php';
?>
<?php if($_GET['id']){ ?>
<?php $id = intval($_GET['id']); ?>
<?php $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_Nick` WHERE `ID`='$id'"), 0); ?>
<?php if($check < 1){ ?>
<?php header('Location: /'); ?>
<?php } ?>
<?php
$getloainick= array("TẦM TRUNG", "SƠ SINH");
$gethanhtinh = array("NULL", "Trái đất", "Xayda", "NaMếc");
$TOM_result = mysql_query("SELECT * FROM `TOM_Nick` WHERE ID = '$id' LIMIT 1");
while($gettom = mysql_fetch_assoc($TOM_result)){
?>

<form method="POST" action="/tran/acc" class="form-horizontal"><input type="hidden" name="id" value="<?=$gettom['ID']?>">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Xác nhận mua tài khoản random:</h4>
</div>
                <div class="modal-body" id="buy">
                        <table class="table table-striped"><tbody>
                            <tr>
                                <td>Tên game:</td>
                                <th class="text-danger">Ngọc Rồng Online</th>
                            </tr>
                            <tr>
                                <td>Thể loại:</td>
                                <th class="text-danger">Random Ngọc Rồng</th>
                            </tr>
                            <tr>
                                <td>Giá Tiền:</td>
                                <th class="text-info"><?=number_format($gettom['giatien'])?>đ</th>
                            </tr>
                            <tr>
                                <td>Mã giảm giá:</td>
                                <th>            <input type="text" class="form-control c-square c-theme " name="coupon" placeholder="Mã giảm giá"></th>
                            </tr>
                            </tbody>
                        </table>

					<?php if(empty($_SESSION['FBID'])){  ?>
                                    <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">
                   Bạn Chưa đăng nhập. Bạn hãy click vào nút Đăng nhập để mua tài khoản.
                </label>
                        <div class="modal-footer">
                            <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold load-modal" rel="#" style="display: ">Hãy Đăng Nhập Ngay</a>
                            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                        </div>
					<?php } else if($tom['sodu'] < $gettom['giatien']) { ?>
                                    <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">
                    Bạn không đủ số dư để mua tài khoản này. Bạn hãy click vào nút nạp thẻ để nạp thêm và mua tài khoản.
                </label>
                        <div class="modal-footer">
                            <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/nap-the" id="d3" style="display: ">Nạp thẻ cào</a>
                            <a class="btn c-bg-green-4 c-font-white c-btn-square c-btn-uppercase c-btn-bold load-modal" rel="/atm.php">Nạp từ ATM - Ví điện tử</a>
                            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                        </div>
					<?php } else { ?>
                        <div class="modal-footer">
							<button type="submit" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" href="/purchase/buy/<?=$gettom['ID']?>.html" name="muanick">Quất luôn</button>
                            <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                        </div>
					<?php } ?>
					                </div>
			</form>


  
 
</div>
	</div>
</div>
<script>
    $(document).ready(function () {
        $('.load-modal').each(function (index, elem) {
            $(elem).unbind().click(function (e) {
                e.preventDefault();
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(elem).attr('rel'));
            });
        });
    });
</script>
<?php } ?>  
<?php } else { ?> 
<?php header('Location: /'); ?>
<?php }  ?> 
</div>