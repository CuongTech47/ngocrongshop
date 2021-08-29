<?php include '../tomdz/dbtomdzvl.php'; ?>
<?php
if(isset($_GET['baotrihopqua'])) {
	if($system['hopqua'] == 0) {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='1' WHERE `key` = 'hopqua'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>HỘP QUÀ MAY MẮN</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Bảo Trì hộp quà may mắn Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} else {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='0' WHERE `key` = 'hopqua'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>HỘP QUÀ MAY MẮN</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Mở khóa hộp quà may mắn Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} 
}

if(isset($_GET['baotrinapthe'])) {
	if($system['napthe'] == 0) {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='1' WHERE `key` = 'napthe'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>GẠCH THẺ CHẬM</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Bảo Trì Nạp thẻ Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} else {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='0' WHERE `key` = 'napthe'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>GẠCH THẺ CHẬM</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Mở khóa nạp thẻ Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} 
}

if(isset($_GET['baotrichuyentien'])) {
	if($system['chuyentien'] == 0) {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='1' WHERE `key` = 'chuyentien'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>CHUYỂN TIỀN CÁ NHÂN</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Bảo Trì Chuyển Tiền Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} else {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='0' WHERE `key` = 'chuyentien'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>CHUYỂN TIỀN CÁ NHÂN</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Mở khóa Chuyển tiền Website Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} 
}

if(isset($_GET['baotriruttien'])) {
	if($system['ruttien'] == 0) {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='1' WHERE `key` = 'ruttien'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>RÚT TIỀN</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Bảo Trì Rút Tiền Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} else {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='0' WHERE `key` = 'ruttien'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>RÚT TIỀN</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System!</strong> - Mở khóa Rút tiền Website Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} 
} 

if(isset($_GET['baotrihethong'])) {
	if($system['system'] == 0) {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='1' WHERE `key` = 'system'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>TRUY CẬP WEBSITE</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>Warning</strong> - Bảo Trì Truy Cập Website Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} else {
		mysql_query("UPDATE `TOM_setting` SET `tinhtrang`='0' WHERE `key` = 'system'");
		echo '<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>SYSTEM SETTINGS</h2>
            </div>
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <B>TRUY CẬP WEBSITE</B>
                            </h2>
                        </div>
                        <div class="body"><div class="alert alert-success alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<strong>System</strong> - Mở cửa Website Thành Công
			</div></section></div></div></div></div></div>';
		echo '<meta http-equiv=refresh content="2; URL=/cpctv">';
	} 
} 


?>