<?php
// Code được Cover lại bởi Ngô Quốc Đạt - DATLECHIN
// Nhận code Các Thể loại LH Facebook: https://www.facebook.com/Dat.Viruss.Tml.Officia
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

require 'dbtomdzvl.php';
require 'Mobile_Detect.php';
$kmess = $_SESSION['kmess'] > 5 && $_SESSION['kmess'] < 12 ? $_SESSION['kmess'] : 12;
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

function getcover($id,$token) {
	$get = file_get_contents('https://graph.facebook.com/'.$id.'?fields=cover&access_token='.$token);
	$cover = json_decode($get,true);
	$image = $cover[cover][source];
	return $image;
}
?>
<?php
// Crack by Khải Phan ^^

function checkuser($fuid, $ffname, $femail) {
    $check = mysql_query("select * from TOM_Users where uid='$fuid'");
    $check = mysql_num_rows($check);
    if (empty($check)) { // if new user . Insert a new record
        $query = "INSERT INTO TOM_Users (uid,Ffname,sodu) VALUES ('" . mysql_real_escape_string($fuid) . "','" . mysql_real_escape_string($ffname) . "', '0')";
        mysql_query($query);
    } else { // If Returned user . update the user record
        $query = "UPDATE TOM_Users SET Ffname='" . mysql_real_escape_string($ffname) . "' where uid='$fuid'";
        mysql_query($query);
    }
}
function phantrang_tomdz($url, $start, $total, $kmess) {
    $out[] = '<div class="row"><center><ul class="pagination">';
    $neighbors = 2;
    if ($start >= $total) $start = max(0, $total - (($total % $kmess) == 0 ? $kmess : ($total % $kmess)));
    else $start = max(0, (int)$start - ((int)$start % (int)$kmess));
    $base_link = '<li><a class="pagenav" href="' . strtr($url, array('%' => '%%')) . 'page=%d' . '">%s</a></li>';
    $out[] = $start == 0 ? '' : sprintf($base_link, $start / $kmess, '&lt;&lt;');
    if ($start > $kmess * $neighbors) $out[] = sprintf($base_link, 1, '1');
    if ($start > $kmess * ($neighbors + 1)) $out[] = '<li><a>...</a></li>';
    for ($nCont = $neighbors;$nCont >= 1;$nCont--) if ($start >= $kmess * $nCont) {
        $tmpStart = $start - $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    $out[] = '<li class="active"><a>' . ($start / $kmess + 1) . '</a></li>';
    $tmpMaxPages = (int)(($total - 1) / $kmess) * $kmess;
    for ($nCont = 1;$nCont <= $neighbors;$nCont++) if ($start + $kmess * $nCont <= $tmpMaxPages) {
        $tmpStart = $start + $kmess * $nCont;
        $out[] = sprintf($base_link, $tmpStart / $kmess + 1, $tmpStart / $kmess + 1);
    }
    if ($start + $kmess * ($neighbors + 1) < $tmpMaxPages) $out[] = '<li><a>...</a></li>';
    if ($start + $kmess * $neighbors < $tmpMaxPages) $out[] = sprintf($base_link, $tmpMaxPages / $kmess + 1, $tmpMaxPages / $kmess + 1);
    if ($start + $kmess < $total) {
        $display_page = ($start + $kmess) > $total ? $total : ($start / $kmess + 2);
        $out[] = sprintf($base_link, $display_page, '&gt;&gt;');
    }
    $out[] = '</ul></center></div>';
    return implode('', $out);
}
?>


