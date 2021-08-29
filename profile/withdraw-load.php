<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
$title = 'Check thông tin tài khoản #'.intval($_GET['id']).'';
include '../tomdz/dbtomdzvl.php';
?>

<?php if($_GET['id']){ ?>
<?php $id = intval($_GET['id']); ?>
<?php 
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nganhang` WHERE `username` = '".$tom['username']."' AND `id`='$id'"), 0);
if($check < 1){
	exit;
}
?>
<?php
$getnganhang = array("Không xác định", "Vũ Trụ 1 Sao", "Vũ Trụ 2 Sao", "Vũ Trụ 3 Sao", "Vũ Trụ 4 Sao", "Vũ Trụ 5 Sao", "Vũ Trụ 6 Sao", "Vũ Trụ 7 Sao", "Vũ Trụ 8 Sao", "Vũ Trụ 9 Sao", "Vũ Trụ 10 Sao", "Vũ Trụ 11 Sao", "Vũ Trụ 12 Sao");
$TOM_result = mysql_query("SELECT * FROM `DLC_Nganhang` WHERE `username` = '".$tom['username']."' AND `id` = '$id' LIMIT 1");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
<?php if ($getdlc[type] == 1) { ?>
    <div class="form-group">
        <label class="col-md-3 control-label">Sever:</label>
        <div class="col-md-6">
            <p id="bank" class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $getnganhang[$getdlc[bankaccount]];?></p>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Tên nhân vật:</label>
        <div class="col-md-6">
            <p id="stk" class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $getdlc[bankname];?></p>
        </div>
    </div>
<?php } ?>
<?php if ($getdlc[type] == 0) { ?>
    <div class="form-group">
        <label class="col-md-3 control-label">Sever:</label>
        <div class="col-md-6">
            <p id="bank" class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $getnganhang[$getdlc[bankaccount]];?></p>
        </div>
    </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Tên nhân vật:</label>
            <div class="col-md-6">
                <p id="ttk" class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $getdlc[chubank];?></p>
            </div>
        </div>
    <div class="form-group">
        <label class="col-md-3 control-label">Tên Nhân Vật:</label>
        <div class="col-md-6">
            <p id="stk" class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $getdlc[bankname];?></p>
        </div>
    </div>
<div class="form-group">
            <label class="col-md-3 control-label">Nội Dung:</label>
            <div class="col-md-6">
                <p id="brand" class="form-control c-square c-theme c-theme-static m-b-0"><?php echo $getdlc[chinhanh];?></p>
            </div>
        </div>
<?php } ?>
<div class="form-group">
    <label class="col-md-3 control-label">Số vàng cần rút:</label>
    <div class="col-md-6">
        <input id="money" class="form-control c-square c-theme" name="amount" type="text" placeholder="">
        <span class="help-block">Số vàng rút từ 20,000,000 đến 500,000,000 vàng</span>

                    <span class="help-block">Phí rút vàng là 0% tức nếu rút 100tr vàng thì nhận 100tr vàng</span>
        

    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Nội dung rút tiền:</label>
    <div class="col-md-6">
        <input class="form-control c-square c-theme" name="description" type="text" placeholder="Nhập nội dung rút tiền nếu cần thiết">
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label"><b>Mã bảo vệ:</b></label>
    <div class="col-md-6">
        <div class="input-group">
            <span class="input-group-addon" style="padding: 0px;">
                <img src="<?=$home_url;?>/captcha/captcha.php?rand=<?php echo rand();?>" height="30px" id="captchaimg" onclick="javascript: refreshCaptcha();">
            </span>
            <input type="text" class="form-control c-square" id="captcha" name="captcha" placeholder="" maxlength="3" autocomplete="off">
        </div>
    </div>
</div>

<?php } ?>  
<?php } ?>  