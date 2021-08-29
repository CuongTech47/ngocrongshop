<?php
	

		/// Đoạn này lưu log lại để test, chạy thực bỏ đoạn này đi nhé
        $myfile = fopen("log-nap.txt", "a") or die("Unable to open file!");
		$txt = $_GET['callback_sign']."|".$_GET['status']."|".$_GET['pin']."|".$_GET['serial']."|".$_GET['amount'].$_GET['message']."\n";
		fwrite($myfile, $txt);
		fclose($myfile);
		/// END Đoạn này lưu log lại để test, chạy thực bỏ đoạn này đi nhé

		require_once('config.php');
        $callback_sign = md5($this->partner_key.$_GET['tranid'].$_GET['pin'].$_GET['serial']);
        
        if($_GET['callback_sign']!=$callback_sign){
               exit();
        }

		if(isset($_GET['status'])) {
			
			if ($_GET['status'] == "1") {
				
				// status = 1 ==> thẻ đúng + Cộng tiền cho khách bằng  $_GET['amount'] tại đây
				
				//DEMO Code CộNG TIỀN cho khách nạp
				$query = mysql_fetch_assoc(mysql_query("SELECT * FROM `lichsunap` WHERE  `tranid` = '".$_GET['tranid']."' AND `mathe` = '".$_GET['pin']."'"));
				mysql_query("UPDATE `nguoidung` SET `cash` =`cash` + '".($_GET['amount'] * 100 / 100)."' WHERE `uid` = '".$query['uid']."'");
				mysql_query("UPDATE `lichsunap` SET `status` = '1',`note`='Đã duyệt' WHERE `id` = '".$query['id']."'");
					
			}
			else {
				/// Thẻ sai hoặc đã được nạp
				//DEMO cập nhật trạng thái thẻ của khách nạp
				mysql_query("UPDATE `lichsunap` SET `status` = '0',`note`='Thẻ sai' WHERE  `tranid` = '".$_GET['tranid']."' AND `mathe` = '".$_GET['pin']."'"));

			}
			
		}

?>