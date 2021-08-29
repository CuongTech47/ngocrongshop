<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
include 'dbtomdzvl.php';
include 'banquyen.html';
$titlehome = 'Hệ thống bán nick ngọc rồng tự động';
$title = isset($title) ? $title : $titlehome;
$title = html_entity_decode($title,ENT_QUOTES,'UTF-8');
$title = strip_tags($title);
$hethong = mysql_fetch_array(mysql_query("SELECT * FROM `DLC_setting` WHERE `id` = '1' LIMIT 1"));
?>

<!DOCTYPE html>
<html lang="vi">
<head>

	    <meta charset="utf-8"/>
<title><?=$title;?> - <?=$hethong[tenweb];?></title>
<meta name="description" content="Web mua bán nick game,  Acc Game, Shop Nick  Ngọc rồng - nro, ninja school - nso, avatar , Hải Tặc - HTTH, Làng Lá - LLPLK, Liên Quân, Liên Minh - LMHT - LOL , Đột kích - CF, Truy Kích, Army 2, Hiệp Sĩ - HSO, nick vip, giá rẻ , uy tín của Datlechin">
<meta name="keywords" content="Web mua bán nick game, Web mua bán Acc Game, Shop mua bán Nick game,  Ngọc rồng - nro, ninja school - nso, avatar, Hải Tặc - HTTH, Làng Lá - LLPLK, Liên Quân - LQM, Liên Minh - LMHT - LOL , Đột kích - CF, Truy Kích, Army 2, Hiệp Sĩ - HSO, nick vip, giá rẻ , uy tín, Datlechin">
<link rel="shortcut icon" href="https://nick.vn/upload-usr/images/2VBHD2pPQ0_1537094909.jpg" type="image/x-icon">
<meta content="" name="author"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="<?=$home_url;?>"/>
<meta property="og:description" content="Web mua bán nick game,  Acc Game, Shop Nick  Ngọc rồng - nro, ninja school - nso, avatar , Hải Tặc - HTTH, Làng Lá - LLPLK, Liên Quân, Liên Minh - LMHT - LOL , Đột kích - CF, Truy Kích, Army 2, Hiệp Sĩ - HSO, nick vip, giá rẻ , uy tín của Datlechin"/>

<meta property="og:image" content="https://nick.vnassets/frontend/images/image-share.jpg"/>



<script type="application/ld+json">
    {
          "@graph":
      [
          {
              "@context": "http://schema.org/",
              

                "@type":"Store",
                "image": "https://nick.vn/upload-usr/images/UKaaDuG8zi_1540820076.png",
                "name":"Nick.vn",
                "address":{
                    "@type":"PostalAddress",
                    "streetAddress":"120 Thái Hà",
                    "addressLocality":"Q. Đống Đa",
                    "addressRegion":"Hà Nội",
                    "postalCode":"100000",
                    "addressCountry":"VN"
                 },
              "priceRange": "$$",
              "geo":{
                "@type":"GeoCoordinates",
                "latitude":21.011915,
                "longitude":105.821283
              },
              "telephone":"08.6969.3000"
            
            },
            {
              "@context": "http://schema.org",
              "@type": "WebSite",
              "name": "<?=$hethong[tenweb];?>",
              "url": "<?=$home_url;?>"
          }
      ]
    }
    </script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
	<link href="/assets/frontend/theme/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN: BASE PLUGINS  -->
	<link href="/assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
	<!-- END: BASE PLUGINS -->
	<!-- BEGIN: PAGE STYLES -->
	<link href="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	<!-- END: PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->
	<link href="/assets/frontend/theme/assets/demos/default/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/demos/default/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="/assets/frontend/theme/assets/demos/default/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css"/>
	<link href="/assets/frontend/theme/assets/demos/default/css/custom.css" rel="stylesheet" type="text/css"/>
	
	<link rel="stylesheet" href="/assets/frontend/plugins/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="/assets/frontend/plugins/owl-carousel/owl.theme.css">
	<link rel="stylesheet" href="/assets/frontend/plugins/owl-carousel/owl.transitions.css">
	<script src="/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
	<script src="/assets/frontend/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="/assets/frontend/plugins/owl-carousel/owl.carousel.min.js"></script>
	<script src="/assets/frontend/plugins/owl-carousel/slider.js"></script>
	<script src="/assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
	<link href="/assets/frontend/css/style.css?v=155081361566442" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<style>
		.ui-autocomplete {
			max-height: 500px;
			overflow-y: auto;
			overflow-x: hidden;
		}

		.input-group-addon {
			background-color: #FAFAFA;
		}

		.input-group .input-group-btn > .btn, .input-group .input-group-addon {
			background-color: #FAFAFA;
		}

		.modal {
			text-align: center;
		}

		@media  screen and (min-width: 768px) {
			.modal:before {
				display: inline-block;
				vertical-align: middle;
				content: " ";
				height: 100%;
			}
		}

		@media (min-width: 992px) and (max-width: 1200px) {
			.c-layout-header-fixed.c-layout-header-topbar .c-layout-page {
				margin-top: 245px;
			}
		}

		@media  screen and (max-width: 767px) {
			.modal-dialog:before {
				margin-top: 75px;
				display: inline-block;
				vertical-align: middle;
				content: " ";
				height: 100%;
			}

			.modal-dialog {
				width: 100%;

			}

			.modal-content {
				margin-right: 20px;
			}
		}

		.modal-dialog {
			display: inline-block;
			text-align: left;


		}

		.mfp-wrap {
			z-index: 20000 !important;
		}

		.c-content-overlay .c-overlay-wrapper {
			z-index: 6;
		}

		.z7 {
			z-index: 7 !important;
		}
	</style>
    <script src="https://unpkg.com/sweetalert2@7.17.0/dist/sweetalert2.all.js"></script>
	<link href="/assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css"/>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css'>   </head>
<body class="c-layout-header-fixed c-layout-header-mobile-fixed c-layout-header-topbar c-layout-header-topbar-collapse" style="background: #fff url(https://www.taptin.vn/images/2019/01/28/image.pngxxx) no-repeat;background-attachment: fixed;"> 



	<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
		<div class="c-topbar c-topbar-light">
		<div class="container">
			<!-- BEGIN: INLINE NAV -->
			<nav class="c-top-menu c-pull-left">
				<ul class="c-icons c-theme-ul">
					<li><span><span aria-hidden="true" class="icon-user-following"></span> Admin: Co Cai Lon</span></li>
					<li><span><span aria-hidden="true" class="icon-call-out"></span> Hotline: 01242211568</span></li>
				</ul>
			</nav>
			<!-- END: INLINE NAV -->
			<!-- BEGIN: INLINE NAV -->
			<nav class="c-top-menu c-pull-right">
				<ul class="c-links c-theme-ul">
					<li><a href="#"><span aria-hidden="true" class="icon-link"></span> Liên Hệ</a></li>
					<li class="c-divider">|</li>
					<li><a href="#"><span aria-hidden="true" class="icon-support"></span> Điều Khoản</a></li>
				</ul>
				<ul class="c-ext c-theme-ul">
					<li class="c-lang dropdown c-last">
						<a href="#">Hỗ Trợ Facebook</a>
						<ul class="dropdown-menu pull-right" role="menu">
							<li class="active"><a href="https://facebook.com/TrungViet2k5">liên hệ</a></li>
							<li><a href="https://www.facebook.com/TrungViet2k5">FB Admin</a></li>
							<li><a href="javascript:()">FB Groups</a></li>
							<li><a href="javascript:()">FB Fanpage</a></li>
						</ul>
					</li>
				</ul>
			</nav>
			<!-- END: INLINE NAV -->
		</div>
	</div>
		<div class="c-navbar">
		<div class="container">
			<!-- BEGIN: BRAND -->
			<div class="c-navbar-wrapper clearfix">
				<div class="c-brand c-pull-left">
					<a href="<?=$home_url;?>" class="c-logo">
						<img width="250" src="/ccb4evbt58.png?tom=1" alt="<?=$hethong[tenweb];?>" class="c-desktop-logo">
						<img width="200" src="/ccb4evbt58.png?tom=1" alt="<?=$hethong[tenweb];?>" class="c-desktop-logo-inverse">
						<img width="200" src="/ccb4evbt58.png?tom=1" alt="<?=$hethong[tenweb];?>" class="c-mobile-logo">
					</a>
					<button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
					<span class="c-line"></span>
					<span class="c-line"></span>
					<span class="c-line"></span>
					</button>
					<button class="c-topbar-toggler" type="button">
						<i class="fa fa-ellipsis-v"></i>
					</button>
				</div>
				<!-- END: BRAND -->				
				<!-- BEGIN: HOR NAV -->
				<!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
<!-- BEGIN: MEGA MENU -->
<!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
<nav class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
	<ul class="nav navbar-nav c-theme-nav"> 
			
			<li class="c-menu-type-classic"><a class="c-link dropdown-toggle" href="/index.php">Trang Chủ</a></li>
			<li class="c-menu-type-classic"><a class="c-link dropdown-toggle" href="https://www.facebook.com/TrungViet2k5">Facebook Admin</a></li>
			<li class="c-menu-type-classic">
			<a href="javascript:()" class="c-link dropdown-toggle">Nạp tiền<span class="c-arrow c-toggler"></span></a>		
			<ul class="dropdown-menu c-menu-type-classic c-pull-left">
			<li><a href="/nap-the">Nạp tự động</a></li>
			<li><a href="/nap-cham">Nạp thẻ chậm</a></li>
			</ul>	
			</li>
			<li class="c-menu-type-classic">
			<a href="javascript:()" class="c-link dropdown-toggle">Dịch vụ game<span class="c-arrow c-toggler"></span></a>		
			<ul class="dropdown-menu c-menu-type-classic c-pull-left">
			<li><a href="/dich-vu/game-nro">Dịch vụ ngọc rồng</a></li>
			</ul>	
			</li>
						<?php if(!$_SESSION['USER']) { ?>
								                                <li>
                                            <a href="/login.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
					<i class="icon-user"></i> Đăng nhập</a>
                                </li>
                                <li>
								                                <a href="/register.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold">
					<i class="icon-key icons"></i> Đăng Ký</a>
                                </li>
                                </li>
						<?php } else { ?>
								                                <li>
                                            <a href="/user/profile" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> <?php echo $tom['username']; ?> - $ <?php echo number_format($tom['sodu']); ?></a>
                            </li>								                                <li>
                                            <a href="/logout.php" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-dark c-btn-circle c-btn-uppercase c-btn-sbold"><i class="icon-logout"></i> Đăng xuất</a>
                            </li>
						<?php } ?>		
			</ul>
</nav>
<!-- END: MEGA MENU --><!-- END: LAYOUT/HEADERS/MEGA-MENU -->
			</div>			


		</div>
	</div>
</header>
<!-- END: HEADER --><!-- END: LAYOUT/HEADERS/HEADER-1 -->




<div class="c-layout-page">
		<!-- BEGIN: PAGE CONTENT -->
		<!-- BEGIN: LAYOUT/SLIDERS/REVO-SLIDER-4 -->

<?php 
if($tom['locked'] == 1){
echo '<div class="c-content-box c-size-md c-bg-grey-1">
    <div class="container">
        <div class="c-content-bar-1 c-opt-1">
            <h3 class="c-font-uppercase c-font-bold">Tài khoản của bạn đã bị khóa</h3>
            <p class="c-font-uppercase">
                Tài khoản của bạn đã bị khóa do vi phạm chính sách tại Shop vui lòng liên hệ admin để mở hoặc biết thêm thông tin!
            </p>
        </div>
    </div> 
</div>';
include 'footer.php';
exit;
}

if ($system['system'] == 1) {
	echo '<center><img src="http://icsr2015.hou.edu.vn/img/1.png" style="max-width:100%"></center>';
	include 'footer.php';
	exit;
}
?>	

