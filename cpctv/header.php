<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include '../tomdz/banquyen.html';
include '../tomdz/dbtomdzvl.php';
include '../tomdz/functions.php';
?>

<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet" />

    <!-- Bootstrap DatePicker Css -->
    <link href="plugins/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="/cpctv">HPLAYER - CONTROL PANEL v3.0</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="images/user.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin Panel</div>
                    <div class="email">hplayergamee@gmail.com</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:()"><i class="material-icons">person</i>Profile</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="changepass.php"><i class="material-icons">lock</i>Đổi mật khẩu</a></li>
                            <li><a href="#"><i class="material-icons">shopping_cart</i>Đã Bán: <b><?=$congtacvien['sonickban']?></b> Acc</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php"><i class="material-icons">input</i>Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">TIỆN ÍCH ADMIN</li>
                    <li class="active">
                        <a href="/cpctv">
                            <i class="material-icons">dashboard</i>
                            <span>Admin DashBoard</span>
                        </a>
                    </li>
<?php if($congtacvien['admin'] == 0) { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">launch</i>
                            <span>Đăng bán tài khoản</span>
                        </a>
                        <ul class="ml-menu">
                                    <li>
                                        <a href="dangnick.php">Nick Ngọc Rồng (chậm)</a>
                                    </li>
                                    <li>
                                        <a href="dangacc.php">Nick Ngọc Rồng (nhanh)</a>
                                    </li>
                                    <li>
                                        <a href="dangrandom.php">Đăng Nick Random</a>
                                    </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">input</i>
                            <span>Tài khoản Ngọc rồng</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="nickcuaban.php">Nick đang bán</a>
                            </li>
                            <li>
                                <a href="nickbandaban.php">Nick đã bán</a>
                            </li>
                        </ul>
                    </li>
<?php } ?>
<?php if($congtacvien['admin'] == 1) { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">launch</i>
                            <span>Đăng bán tài khoản</span>
                        </a>
                        <ul class="ml-menu">
                                    <li>
                                        <a href="dangnicklq.php">Nick Liên Quân</a>
                                    </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">input</i>
                            <span>Tài khoản Liên quân</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="nicklqcuaban.php">Nick Liên quân đang bán</a>
                            </li>
                            <li>
                                <a href="nicklqbandaban.php">Nick Liên quân đã bán</a>
                            </li>
                        </ul>
                    </li>
<?php } ?>
<?php if($congtacvien['admin'] == 2) { ?>
                    <li>
                        <a href="donvangngoc.php">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Đơn Vàng Ngọc <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `tinhtrang` ='0'"), 0)); ?> </button></B></span>
                        </a>
                    </li>
<?php } ?>
<?php if($congtacvien['admin'] == 3) { ?>
                    <li>
                        <a href="donvangngoc.php">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Đơn Vàng Ngọc <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `tinhtrang` ='0'"), 0)); ?> </button></B></span>
                        </a>
                    </li>
<?php } ?>
<?php if($congtacvien['admin'] >= 5) { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">launch</i>
                            <span>Đăng bán tài khoản</span>
                        </a>
                        <ul class="ml-menu">
                                    <li>
                                        <a href="dangnick.php">Nick Ngọc Rồng (chậm)</a>
                                    </li>
                                    <li>
                                        <a href="dangacc.php">Nick Ngọc Rồng (nhanh)</a>
                                    </li>
                                    <li>
                                        <a href="dangrandom.php">Nick Random</a>
                                    </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">credit_card</i>
                            <span>Danh Sách Thẻ <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Napthe` WHERE `tinhtrangduyet` ='0'"), 0)); ?> </button></B></span>
                        </a>
                        <ul class="ml-menu">
                    <li>
                        <a href="duyetgachthe.php">
                            <span>Duyệt Gạch Thẻ</span>
                        </a>
                    </li>
                    <li>
                        <a href="thedanap.php">
                            <span>Thẻ Đã Nạp</span>
                        </a>
                    </li>
                        </ul>
                    </li>
                    <li>
                        <a href="duyetnhapnick.php">
                            <i class="material-icons">directions</i>
                            <span>Thanh Lý Nick <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Nhapnick` WHERE `tinhtrang` ='0'"), 0)); ?> </button></B></span>
                        </a>
                    </li>
                    <li>
                        <a href="duyetruttien.php">
                            <i class="material-icons">card_membership</i>
                            <span>Yêu cầu Rút tiền <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `TOM_ruttien` WHERE `tinhtrang` ='0'"), 0)); ?> </button></B></span>
                        </a>
                    </li>
                    <li>
                        <a href="donvangngoc.php">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Đơn Vàng Ngọc <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_Dichvu` WHERE `tinhtrang` ='0'"), 0)); ?> </button></B></span>
                        </a>
                    </li>
                    <li>
                        <a href="duyet-dich-vu-thue">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span>Đơn dịch vụ thuê <button class="btn btn-danger btn-xs"> <b><?php echo number_format(mysql_result(mysql_query("SELECT COUNT(*) FROM `Service` WHERE `tinhtrang` ='4'"), 4)); ?> </button></B></span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">people</i>
                            <span>Cộng Tác Viên</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="khoitao.php">Create Account</a>
                            </li>
                            <li>
                                <a href="congtacvien.php">Danh sách CTV</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">input</i>
                            <span>Tài khoản Ngọc rồng</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="nickdangban.php">Nick đang bán</a>
                            </li>
                            <li>
                                <a href="nickdaban.php">Nick đã bán</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">input</i>
                            <span>Dịch Vụ Hplayer</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="https://shophplayer.com">Mua Nick Ngọc Rồng</a>
                            </li>
                            <li>
                                <a href="https://facebook.com/TrungViet2k5">Thu Mua Nick Ngoc Rồng Và Free Fire</a>
                            </li>
                        </ul>
                    </li>
<?php } ?>
                    <li class="header">PROFILE</li>
<?php if($congtacvien['admin'] >= 5) { ?>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons col-yellow">settings</i>
                            <span>System Settings</span>
                        </a>
                        <ul class="ml-menu">
						<li><a href="?setting=1" title="#"><i class="zmdi zmdi-long-arrow-right icon"></i> Cài đặt Website </a></li>
						<li><a href="?baotrihethong" title="#"><i class="zmdi zmdi-long-arrow-right icon"></i> BT Website <?php if($system['system'] == 0) {echo '<span class="label label-danger">OFF</span>';} else {echo '<span class="label label-success">ON</span>';}?></a></li>
						<li><a href="?baotrinapthe" title="#"><i class="zmdi zmdi-long-arrow-right icon"></i> BT Nạp thẻ <?php if($system['napthe'] == 0) {echo '<span class="label label-danger">OFF</span>';} else {echo '<span class="label label-success">ON</span>';}?></a></li>
						<li><a href="?baotrichuyentien" title="#"><i class="zmdi zmdi-long-arrow-right icon"></i> BT Chuyển tiền <?php if($system['chuyentien'] == 0) {echo '<span class="label label-danger">OFF</span>';} else {echo '<span class="label label-success">ON</span>';}?></a></li>
						<li><a href="?baotriruttien" title="#"><i class="zmdi zmdi-long-arrow-right icon"></i> BT Rút tiền <?php if($system['ruttien'] == 0) {echo '<span class="label label-danger">OFF</span>';} else {echo '<span class="label label-success">ON</span>';}?></a></li>
					</ul>
                    </li>
                    <li>
                        <a href="thanhvien.php">
                            <i class="material-icons col-blue">supervised_user_circle</i>
                            <span>Danh Sách Thành Viên</span>
                        </a>
                    </li>
<?php } ?>
                    <li>
                        <a href="changepass.php">
                            <i class="material-icons col-red">lock</i>
                            <span>Đổi mật khẩu</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Đăng Xuất</span>
                        </a>
                    </li>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 - 2022 <a href="javascript:void(0);">Hplayer - Panel v3.0</a>.
                </div>
                <div class="version">
                    Author:  <a href="https://www.facebook.com/TrungViet2k5"><b><font color="black">Hà Đức Hiếu</font></b></a>
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
    </section>
<?php 
if($_GET['setting']) {
$id = intval($_GET['setting']);
$getuser = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_setting` WHERE ID = '".intval($_GET['setting'])."'"), 0);
if(!$ctv_login) {
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} elseif($getuser < 1){
echo '<br/><div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Có phải nick của thím đâu mà tính sửa?
</div>';	
} else {
$TOM_result = mysql_query("SELECT * FROM `DLC_setting` WHERE `id` = '$id'");
while($getdlc = mysql_fetch_assoc($TOM_result)){
?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>CÀI ĐẶT WEBSITE</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>CÀI ĐẶT WEBSITE</B>
                            </h2>
                        </div>
                        <div class="body">
<?php 
if(isset($_POST['submit'])) {
$getuser = mysql_result(mysql_query("SELECT COUNT(*) FROM `DLC_setting` WHERE id = '".intval($_GET['setting'])."'"), 0);
if(!$ctv_login) {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Bạn làm gì thế tính bug hay lấy quyền Admin?
</div>';
} elseif($getuser >= 1){
$tenweb = mysql_real_escape_string($_POST['tenweb']);
$ho = mysql_real_escape_string($_POST['ho']);
$ten = mysql_real_escape_string($_POST['ten']);
$sdt = mysql_real_escape_string($_POST['sdt']);
$linkfb = mysql_real_escape_string($_POST['linkfb']);
$thongbao = mysql_real_escape_string($_POST['thongbao']);
mysql_query("UPDATE `DLC_setting` SET 
	`tenweb`='$tenweb',  `ho`='$ho',
	`ten`='$ten',`sdt`='$sdt',
        `linkfb`='$linkfb', `thongbao`='$thongbao'
	WHERE `id` = '$id'");
echo '<div class="alert alert-success fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Success!</strong> Sửa cài đặt thành công!
</div>';
echo '<meta http-equiv=refresh content="2; URL=?setting=1">';
} else {
echo '<div class="alert alert-danger fade in alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><FONT COLOR="red">
    <strong>Error!</strong> Không phải tài khoản của bạn thì sao sửa?.</font>
</div>';
}
}
?>
                            <form method="post" action="">
                                <label for="tenweb">Tên Website:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="tenweb" type="text" class="form-control" value="<?=$getdlc['tenweb'];?>">
                                    </div>
                                </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                <label for="ho">Họ Admin:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="ho" type="text" class="form-control" value="<?=$getdlc['ho'];?>">
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <label for="ten">Tên Admin:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="ten" type="text" class="form-control" value="<?=$getdlc['ten'];?>">
                                    </div>
                                </div>
                                </div>
                                </div>
                                <label for="sdt">SĐT Admin:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="sdt" type="number" class="form-control" value="<?=$getdlc['sdt'];?>">
                                    </div>
                                </div>
                                <label for="linkfb">Link Facebook:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="linkfb" type="text" class="form-control" value="<?=$getdlc['linkfb'];?>">
                                    </div>
                                </div>
                                <label for="thongbao">Thông Báo:</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea class="form-control" name="thongbao" rows="15"><?=$getdlc['thongbao'];?></textarea>
	</div>
	<small id="fileHelp" class="form-text text-muted">Thông báo hiện thị ngoài trang chủ.</small>
  </div>
  <button type="submit" name="submit" class="btn bg-indigo">SỬA CÀI ĐẶT</button>
</form>

                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php } ?>
</div>
<?php 	include 'footer.php';
	exit;
}
?>
<?php include 'baotri.php'; ?>