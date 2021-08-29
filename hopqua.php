<?php 
// Code được Viết bởi Hoàng Minh Thuận - fb.com/thuankenys
// Nhận code Các Thể loại Lh FaceBôk + Zalo : 0978442874
// Cảm ơn các bạn đã ủng hộ và sử dụng sản phẩm của mình

session_start();
include 'tomdz/header.php';
if(!$user_login) { 
	die("<script>
    window.alert('Vui lòng đăng nhập để sử dụng dịch vụ!');
    window.location.href='/index.php';
	</script>");
	exit;
} else {
?>


<div class="c-content-box c-size-md c-bg-white c-no-bottom-padding">
	<div class="container">
		<div class="c-content-product-1 c-opt-1">
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">HỘP QUÀ MAY MẮN</h3>
				<div class="c-line-center"></div>
				<p class="c-center c-font-lowercase">MUA LƯỢT QUAY TẠI ĐÂY GIÁ 10,000 VNĐ</p>
			</div>
			<div class="row">
				<div class="col-md-4 wow animate slideInUp" style="opacity: 1; visibility: visible; animation-name: slideInUp;">
					<div class="c-media">
						<img src="https://media.giphy.com/media/1msH28tGe2NERLKcoc/giphy.gif" alt="">
					</div>
				</div>
				<div class="col-md-8">
					<div class="c-body">
						<ul class="c-row">
							<li class="wow animate fadeInUp" style="opacity: 1; visibility: visible; animation-name: fadeInUp;">
								<h4>Số Lượt quay</h4>
								<p>Bạn còn <span class="c-font-bold c-font-red" id="load-luotquay"> <?php echo $tom[vongquay] ?> </span> Lượt Mở quà</p>
							</li>
							<li class="wow animate fadeInUp" style="opacity: 1; visibility: visible; animation-name: fadeInUp;">
								<h4>PHẦN THƯỞNG</h4>
								<p>
								• Giải 1 : cơ hội nhận 999k trong shop<Br/>
								• Giải 2 : nhận Nick vip bất kì ở Shop <Br/>
								• Mua lượt quay giá chỉ 10,000 Vnđ<Br/>
								• Nếu bạn may mắn sẽ trúng 1 trong 2 giải
								</p>
							</li>
						</ul>
						<button type="button" class="btn btn-md c-btn-border-2x c-btn-square c-btn-regular c-btn-uppercase c-btn-bold c-margin-b-100" onclick="mohopqua(1)">MỞ HỘP QUÀ NGAY</button>
					</div>
				</div>
			</div>
		</div>
	</div> 
</div>
<div class="c-content-box c-size-md c-bg-white c-no-bottom-padding">
	<div class="container">
<div class="col-md-3">
<div class="c-body">
					
						
					</div>
</div>
<div class="col-md-9">		
			<div class="c-content-title-1">
				<h3 class="c-center c-font-uppercase c-font-bold">MUA LƯỢT QUAY</h3>
				<div class="c-line-center"></div>
			</div>

			<div class="form-horizontal">
				<div class="form-group">
					<label class="col-md-3 control-label">Số dư:</label>
					<div class="col-md-7">
						 <p class="form-control c-square c-theme c-theme-static m-b-0"><?PHP echo $_SESSION['username']?>  <?PHP echo number_format($tom[sodu])?> VNĐ</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3 control-label">Số Lượt muốn mua:</label>
					<div class="col-md-7">
						<input class="form-control c-square c-theme"  type="number" id="soluot" placeholder="Nhập Số lượt muốn mua ..." required="required">
						<p class="help-block">Giá 1 lượt = 10,000 VNĐ.</p>
					</div>
				</div>
				<div class="form-group c-margin-t-40">
					<div class="col-md-offset-4 col-md-5">
						<button type="submit" onclick="mualuotquay()" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold btn-block">Mua Lượt Quay</button>
					</div>
				</div>
	</div>
</div>
</div>
</div>




































<script>
var _0xc1c9=["\x76\x61\x6C","\x23\x73\x6F\x6C\x75\x6F\x74","\x2F\x67\x65\x74\x68\x6F\x70\x71\x75\x61\x2E\x70\x68\x70\x3F\x68\x6F\x70\x71\x75\x61\x3D\x6D\x75\x61","\x50\x4F\x53\x54","\x70\x61\x72\x73\x65\x4A\x53\x4F\x4E","\x48\u1EC7\x20\x74\x68\u1ED1\x6E\x67\x21","\x6D\x65\x73\x73\x61\x67\x65","\x73\x74\x61\x74\x75\x73","\x76\x6F\x6E\x67\x71\x75\x61\x79","\x68\x74\x6D\x6C","\x23\x6C\x6F\x61\x64\x2D\x6C\x75\x6F\x74\x71\x75\x61\x79","\x61\x6A\x61\x78","\x42\u1EA1\x6E\x20\x43\xF3\x20\x43\x68\u1EAF\x63\x20\x43\x68\u1EAF\x6E\x20\x4D\x75\u1ED1\x6E\x20\x4D\u1EDF\x3F","\x4D\u1EDF\x20\x68\u1ED9\x70\x20\x71\x75\xE0\x20\x62\u1EA1\x6E\x20\x73\u1EBD\x20\x62\u1ECB\x20\x74\x72\u1EEB\x20\x31\x20\x6C\u01B0\u1EE3\x74\x20\x71\x75\x61\x79\x20\x74\x72\x6F\x6E\x67\x20\x74\xE0\x69\x20\x6B\x68\x6F\u1EA3\x6E","\x77\x61\x72\x6E\x69\x6E\x67","\x23\x33\x30\x38\x35\x64\x36","\x23\x64\x33\x33","\x4D\u1EDF\x20\x4C\x75\xF4\x6E","\x4F\x6F\x70\x73\x2E\x2E\x2E","\x43\xF3\x20\x6C\u1ED7\x69\x20\x78\u1EA3\x79\x20\x72\x61\x21","\x73\x75\x63\x63\x65\x73\x73\x2C\x65\x72\x72\x6F\x72","\x66\x61\x69\x6C","\x64\x6F\x6E\x65","\x67\x65\x74\x68\x6F\x70\x71\x75\x61\x2E\x70\x68\x70\x3F\x68\x6F\x70\x71\x75\x61\x3D\x6D\x6F\x68\x6F\x70","\x6A\x73\x6F\x6E"];function mualuotquay(){var _0x6055x2=$(_0xc1c9[1])[_0xc1c9[0]]();$[_0xc1c9[11]]({url:_0xc1c9[2],type:_0xc1c9[3],data:{soluot:_0x6055x2},success:function(_0x6055x3){var _0x6055x4=$[_0xc1c9[4]](_0x6055x3);swal(_0xc1c9[5],_0x6055x4[_0xc1c9[6]],_0x6055x4[_0xc1c9[7]]);$(_0xc1c9[10])[_0xc1c9[9]](_0x6055x4[_0xc1c9[8]])}})}function mohopqua(_0x6055x6){swal({title:_0xc1c9[12],text:_0xc1c9[13],type:_0xc1c9[14],showCancelButton:true,confirmButtonColor:_0xc1c9[15],cancelButtonColor:_0xc1c9[16],confirmButtonText:_0xc1c9[17],showLoaderOnConfirm:true,preConfirm:function(){return  new Promise(function(_0x6055x7){$[_0xc1c9[11]]({url:_0xc1c9[23],type:_0xc1c9[3],dataType:_0xc1c9[24]})[_0xc1c9[22]](function(_0x6055x8){setTimeout(function(){swal(_0xc1c9[5],_0x6055x8[_0xc1c9[6]],_0x6055x8[_0xc1c9[7]]);$(_0xc1c9[10])[_0xc1c9[9]](_0x6055x8[_0xc1c9[8]])})})[_0xc1c9[21]](function(){swal(_0xc1c9[18],_0xc1c9[19],_0xc1c9[20])})})},allowOutsideClick:false})}
</script>
<?php } include 'tomdz/footer.php'; ?>