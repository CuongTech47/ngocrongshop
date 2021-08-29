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
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nickdamua` WHERE `nguoimua` = '".$tom['username']."' AND id = '$id'"), 0);
if($check < 1){
echo '<div class="modal-header">
        <h4 class="modal-title"><center><font color="red">CÓ PHẢI ACC CỦA MÀY ĐÂU ? CÚT HỘ BỐ</center></font></h4>
    </div>';
exit;
}
?>
<?php
$gethanhtinh = array("NULL", "Trái đất", "Xayda", "NaMếc");
$getthongtin = array("NULL", "Đkí Ảo", "Gmail", "Yahoo");
$TOM_result = mysql_query("SELECT * FROM `DLC_Nickdamua` WHERE `nguoimua` = '".$tom['username']."' AND id = '$id' LIMIT 1");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>
<form method="POST" action="<?=$home_url;?>/tran/acc/check-login" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">


    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Check thông tin tài khoản</h4>
    </div>

    <div class="modal-body">
        <div class="form-horizontal">
            <div class="form-group m-t-10">
                <label class="col-md-3 control-label"><b>Tài khoản:</b></label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme" type="text" placeholder="Tài khoản" readonly="" value="<?php echo $getdlc[taikhoan];?>">

                </div>
            </div>
            <div class="form-group m-t-10">
                <label class="col-md-3 control-label"><b>Mật khẩu:</b></label>
                <div class="col-md-6">
                    <div class="input-group c-square">
                        <input type="text" class="form-control c-square c-theme show_password" id="pass" placeholder="Mật khẩu" readonly="" value="<?php echo $getdlc[matkhau];?>" >
                        <span class="input-group-btn">
                                    <button class="btn btn-default c-font-dark" type="button" id="getpass">Copy</button>
                                </span>

                    </div>
                    <span class="help-block">Click vào nút copy để sao chép mật khẩu hoặc nhấp đúp vào ô mật khẩu để thấy mật khẩu.</span>
                </div>
            </div>
<?php if ($getdlc[loaigame] == 0) { ?>
            <div class="form-group m-t-10">
                <label class="col-md-3 control-label"><b>Server:</b></label>
                <div class="col-md-6">
                    <input class="form-control c-square c-theme" type="text" placeholder="Server" readonly="" value="Vũ Trụ <?php echo $getdlc[server];?> Sao">

                </div>
            </div>
<?php } ?>
            
            

            <p class="c-font-bold c-font-blue">
                Tài khoản mua lúc:  <?php echo date('d/m/Y - H:i:s', $getdlc['time']); ?>

            </p>
            <div class="alert alert-danger c-font-dark">
                <b>Để tránh các trường hợp xấu xảy ra, quý khách vui lòng thêm thông tin ( Email và SĐT ) để đảm bảo không có vấn đề sau khi giao dịch tại shop! Xin cảm ơn.</b>
            </div>
            <div class="alert alert-info c-font-dark">
                Sau khi nhận tài khoản mật khẩu bạn hãy thực hiện đổi mật khẩu để bảo mật.<br>
                Bạn hãy click truy cập đường dẫn sau để chuyển qua trang đổi mật khẩu.<br>
<?php if ($getdlc[loaigame] == 0) { ?>
                <a class="c-font-bold c-font-red" target="_blank" href="#">Đăng nhập và Đổi mật khẩu game Ngọc Rồng Online</a></div>
<?php } ?>
<?php if ($getdlc[loaigame] == 1) { ?>
                <a class="c-font-bold c-font-red" target="_blank" href="#">Đăng nhập và Đổi mật khẩu game Liên Quân Mobile</a></div>
<?php } ?>
<?php if ($getdlc[loaigame] == 2) { ?>
                <a class="c-font-bold c-font-red" target="_blank" href="#">Đăng nhập và Đổi mật khẩu game Làng Lá Phiêu Lưu Ký</a></div>
<?php } ?>
<?php if ($getdlc[loaigame] == 3) { ?>
                <a class="c-font-bold c-font-red" target="_blank" href="#">Đăng nhập và Đổi mật khẩu game Ngọc Rồng Online (Random)</a></div>
<?php } ?>
        </div>
    </div>
    <script>


        $(document).ready(function () {

            $('.action_area_<?php echo $getdlc['id']; ?>').html();
            $('.action_area_<?php echo $getdlc['id']; ?>').html(
                "<button type=\"button\" class=\"btn c-bg-dark c-font-white c-btn-square btn-xs  load-modal\" style=\"margin-bottom: 5px\" rel=\"/tran/acc/check-login?id=<?php echo $getdlc['id']; ?>\">Mật khẩu</button>"
                
            );

            $('.load-modal').on('click', function(e){
                e.preventDefault();
                var curModal= $('#LoadModal');
                curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/frontend/images/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");
                curModal.modal('show').find('.modal-content').load($(this).attr('rel'));
            });


        });
    </script>

<div class="modal-footer">

    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

</div>
</form>

<script>
    document.querySelector('#getpass').addEventListener('click', function (event) {
        var copyTextarea = document.querySelector('#pass');
        copyTextarea.select();

        try {
            document.execCommand('copy');
        } catch (err) {
            alert('Trình duyệt của bạn không thể thực hiện thao tác copy nhanh');
        }
        if (document.selection) {
            document.selection.empty();
        } else if (window.getSelection) {
            window.getSelection().removeAllRanges();
        }
    });
    document.querySelector('#getpassemail').addEventListener('click', function (event) {
        var copyTextarea = document.querySelector('#passemail');
        copyTextarea.select();

        try {
            document.execCommand('copy');
        } catch (err) {
            alert('Trình duyệt của bạn không thể thực hiện thao tác copy nhanh');
        }
        if (document.selection) {
            document.selection.empty();
        } else if (window.getSelection) {
            window.getSelection().removeAllRanges();
        }
    });



</script>

<?php } ?>  
<?php }  ?> 