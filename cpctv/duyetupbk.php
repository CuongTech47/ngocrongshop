<?php 
// SOURCE CODE Được viết bởi Hoàng Minh Thuận
// Không xóa dòng này để tôn trọng tác giả theme

ob_start();
session_start();
include 'header.php';

if(!$ctv_login) {
	header('Location: /index.php');
	exit;
} elseif($congtacvien['admin'] != 4 && $congtacvien['admin'] < 5) {
	header('Location: /cpctv');
	exit;
} else {
	
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>ĐƠN HÀNG ÚP BÍ KIẾP - CẢI TRANG YARDAT</h2>
            </div>
            <!-- Basic Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Danh sách đơn hàng
                            </h2>
                        </div>
                        <div class="body">
                            <?php
                            if($_GET['edit']) {
                                $id = intval($_GET['edit']);
                                $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `Service` WHERE `ID` = '".$id."' AND `status` = '1'"), 0);
                                $query = mysql_fetch_assoc(mysql_query("SELECT * FROM `Service` WHERE `ID` = '".$id."' AND `status` = '1'"));
                                $query_user = mysql_fetch_assoc(mysql_query("SELECT * FROM `Users` WHERE `username` = '".$query['username']."'"));
                                if($congtacvien['qtv_service'] == '0') {
                                    echo '<div class="alert alert-danger">
                                                <strong>Lỗi!</strong> You dont have perrmission.
                                            </div>';
                                echo '<meta http-equiv="refresh" content="1;url=/cpctv/duyetsandetu.php">';
                                } elseif($check < 1) {
                                   echo '<div class="alert alert-danger">
                                                <strong>Lỗi!</strong> Đơn  dịch vụ này không tồn tại hoặc đã được duyệt
                                            </div>';
                                echo '<meta http-equiv="refresh" content="1;url=/cpctv/duyetsandetu.php">';
                                } else {
                                ?>
                                <?php
                                if(isset($_POST['status'])) {
                                    $status = intval($_POST['status']);
                                    $mistake_by = intval($_POST['mistake_by']);
                                    $note = strip_tags($_POST['note']);
                                    if($congtacvien['admin'] == '0') {
                                        echo '<div class="alert alert-danger">
                                                    <strong>Lỗi!</strong> You dont have perrmission.
                                                </div>';
                                    echo '<meta http-equiv="refresh" content="1;url=/cpctv/duyetsandetu.php">';
                                    } elseif($check < 1) {
                                        echo '<div class="alert alert-danger">
                                                    <strong>Lỗi!</strong> Đơn dịch vụ này không tồn tại hoặc đã được duyệt
                                                </div>';
                                    echo '<meta http-equiv="refresh" content="1;url=/cpctv/duyetsandetu.php">';
                                    } else {
                                        if($status == '3') {
                                            $content = 'Hoàn tiền dịch vụ #'.$id.'';
                                            mysql_query("UPDATE `Users` SET `cash` = `cash` + '".$query['price']."' WHERE `username` = '".$query['username']."'");
                                        }
                                        mysql_query("UPDATE `Service` SET `mistake_by` = '".$mistake_by."', `note` = '".$note."', `status` = '".$status."', `time_duyet` = '".time()."' WHERE `ID` = '".$id."'");
                                        echo '<div class="alert alert-success">
                                                    Sửa tình trạng thành công !
                                                </div>';
                                        echo '<meta http-equiv="refresh" content="1;url=/cpctv/duyetsandetu.php">';
                                    }
                                }
                                ?>
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label>Gói Chọn:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $query['title']; ?>" placeholder="Tiêu đề" disabled>
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label>Tài Khoản:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $query['acc_name']; ?>" placeholder="Namesever 1" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Mật Khẩu:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="<?php echo $query['acc_pass']; ?>" placeholder="Namesever 2" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>server:</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" value=" <?php echo $query['server']; ?> Sao" placeholder="Server game" disabled>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tình trạng</label>
                                        <select name="status" class="form-control show-tick">
                                            <option value="1">Đang chờ</option>
                                            <option value="3">Từ Chối</option>
                                            <option value="4">Hoàn Thành</option>
                                            <option value="5">Thất bại</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lỗi bởi (Chỉ hoạt động khi tình trạng ở trạng thái Từ chối)</label>
                                        <select name="mistake_by" class="form-control show-tick">
                                            <option value="0">Admin</option>
                                            <option value="1">Khách</option>
                                            <option value="2">Game</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nội dung (Chỉ hoạt động khi tình trạng ở trạng thái Từ chối)</label>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="note" placeholder="Nội dung">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary waves-effect" type="submit"><span><i class="material-icons">done</i> Lưu</span></button>
                                    </div>
                                </form>
                                <?php
                           include 'footer.php';
                            exit;
                                }
                            }
                            ?>
                            <?php
                            if(isset($_POST['id'])) {
                                $id = $_POST['id'];
                                $check = mysql_result(mysql_query("SELECT COUNT(*) FROM `Deposit` WHERE `ID` = '".$id."' AND `status` = '1'"),0);
                                if($congtacvien['admin'] == 0) {
                                    echo '<div class="alert alert-danger">
                                                <strong>Lỗi!</strong> Bạn không có chức quyền để xóa đơn nạp thẻ
                                            </div>';
                                } elseif($check < 1) {
                                    echo '<div class="alert alert-danger">
                                                <strong>Lỗi!</strong> Đơn nạp thẻ #'.$id.' không tồn tại hoặc đã được duyệt
                                            </div>';
                                } else {
                                    mysql_query("DELETE FROM `Deposit` WHERE `ID` = '".$id."'");
                                    echo '<div class="alert alert-success">
                                                Xóa đơn nạp thẻ #'.$id.' thành công
                                            </div>';
                                }
                            echo '<meta http-equiv="refresh" content="1;url=/cpctv/required-card">';
                            }
                            ?>
                            <form action="" method="GET">
                                <div class="row clearfix">
                                    <div class="col-lg-3">
                                        <div class="input-group date">
        									<select name="group_id" class="form-control">
        										<option value="">Tất cả danh mục</option>
                                                <option value="1" <?php if($_GET['group_id'] == '1') { echo 'selected'; } ?>> Ngọc rồng</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="input-group date">
        									<select name="service" class="form-control">
        										<option value="">Tất cả dịch vụ</option>
                                                <option value="1" <?php if($_GET['service'] == '1') { echo 'selected'; } ?>> Săn Đệ Tử Thuê</option>
                                                <option value="2" <?php if($_GET['service'] == '2') { echo 'selected'; } ?>> Làm Nhiệm Vụ Thuê</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-info waves-effect"><i class="material-icons">search</i> <span>Tìm kiếm</span></button>
                                        <a href="/cpctv/duyetsandetu.php" class="btn btn-danger waves-effect"><i class="material-icons">cached</i><span> Tất cả</span></a>
                                    </div>
                                </div>
                            </form>
                            <div style="position: relative; overflow: auto; width: 100%;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr role="row">
                                            <th>ID</th>
                                            <th>Người thuê</th>
                                            <th>Dịch vụ</th>
                                            <th>Trị giá</th>
                                            <th>Gói Chọn</th>
                                            <th>Tài Khoản</th>
                                            <th>Mật Khẩu</th>
                                            <th>Server</th>
                                            <th>Ngày tạo</th>
                                            <th>Tình trạng</th>
                                            <th>Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(isset($_GET['group_id'])) {
                                                $group_id = $_GET['group_id'];
                                                $service = $_GET['service'];
                                                if($group_id == '') {
                                                    $getgroup_id = "`group_id` = '1'";
                                                } if($group_id == '1') {
                                                    $getgroup_id = "`group_id` = '1'";
                                                }
                                                if($service == '') {
                                                    $getservice = "`service` >= '1' AND `service` <= '7'";
                                                } if($service == '1') {
                                                    $getservice = "`service` = '1'";
                                                } if($service == '2') {
                                                    $getservice = "`service` = '2'";
                                                } if($service == '3') {
                                                    $getservice = "`service` = '3'";
                                                } if($service == '4') {
                                                    $getservice = "`service` = '4'";
                                                } if($service == '5') {
                                                    $getservice = "`service` = '5'";
                                                } if($service == '6') {
                                                    $getservice = "`service` = '6'";
                                                } if($service == '7') {
                                                    $getservice = "`service` = '7'";
                                                }
                                                $tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Service` WHERE `group_id` = ".$getgroup_id." AND `service` = ".$getservice.""), 0);
                                                $result = mysql_query("SELECT * FROM `Service` WHERE `group_id` = ".$getgroup_id." AND `service` = ".$getservice." ORDER by ID DESC LIMIT $start, $kmess");
                                            } else {
                                                $tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Service`"), 0);
                                                $result = mysql_query("SELECT * FROM `Service` ORDER by ID DESC LIMIT $start, $kmess");
                                            }
                                            if ($tong < 1) {
                                                echo '<tr><td colspan="10"><center>Không có dữ liệu<center></td></tr>';
                                            }
                                            while($row = mysql_fetch_assoc($result)) {
                                            ?>
                                            <tr>
                                                <td><?php echo $row['ID']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td>Úp Bí Kiếp - Cải Trang Yardat</td>
                                                <td><?php echo number_format($row['price']); ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><?php echo $row['acc_name']; ?></td>
                                                <td><?php echo $row['acc_pass']; ?></td>
                                                <td> <?php echo $row['server']; ?> Sao</td>
                                                <td><?php echo date('d/m/Y H:i:s', $row['time']); ?></td>
                                                <td><?php if($row['status'] == '0') {
	    echo '<span class="m-badge m-badge--danger m-badge--wide"> Đã hủy</span>';
	 } if($row['status'] == '1') {
	    echo '<span class="m-badge m-badge--info m-badge--wide"> Đang chờ</span>';
	 } if($row['status'] == '2') {
	    echo '<span class="m-badge m-badge--info m-badge--wide"> Đang thực hiện</span>';
	 } if($row['status'] == '3') {
	    echo '<span class="m-badge m-badge--danger m-badge--wide"> Từ chối</span>';
	 } if($row['status'] == '4') {
	    echo '<span class="m-badge m-badge--success m-badge--wide"> Hoàn tất</span>';
	 } if($row['status'] == '5') {
	    echo '<span class="m-badge m-badge--danger m-badge--wide"> Thất bại</span>';
	}; ?></td>
                                                <td>
                                                    <a href="/cpctv/duyetsandetu.php?edit=<?php echo $row['ID']; ?>" class="btn btn-success btn-xs"><i class="material-icons">edit</i></a>
                                                    <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteModal" title="Xóa yêu cầu"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php 
                                if ($tong > $kmess) {
                                    if(isset($_GET['group_id'])) {
                                        $group_id = $_GET['group_id'];
                                        $service = $_GET['service'];
                                        echo '<center>' . phantrang_tomdz('?group_id='.$group_id.'&service='.$service.'&', $start, $tong, $kmess) . '</center>';
                                    } else {
                                        echo '<center>' . phantrang_tomdz('?', $start, $tong, $kmess) . '</center>';
                                    }
                                }
                                ?>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
    </section>
<?php 
	}
include 'footer.php';
?>