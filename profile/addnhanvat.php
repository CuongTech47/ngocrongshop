
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">×</span>
	</button>
	<h4 class="modal-title">Thêm nhân vật rút</h4>
</div>

<div class="modal-body">
	<div class="c-content-tab-4 c-opt-3" role="tabpanel">
		<ul class="nav nav-justified" role="tablist">
			<li role="presentation" class="active">
				<a href="#payment" role="tab" data-toggle="tab" class="c-font-16">Rút chậm</a>
			</li>
			<li role="presentation">
				<a href="#info" role="tab" data-toggle="tab" class="c-font-16">Rút nhanh</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="payment">
				<div class="form-horizontal">
					<div class="modal-body">
<p id="noticenh"></p>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Sever:</b></label>
							<div class="col-md-6">
								<select id="bank_nhid" class="form-control c-square c-theme">
									<option value="">
										Chọn Sever</option>
																			<option value="6">Vũ Trụ 1 Sao</option>
																			<option value="7">Vũ Trụ 2 Sao</option>
																			<option value="8">Vũ Trụ 3 Sao</option>
																			<option value="9">Vũ Trụ 4 Sao</option>
																			<option value="10">Vũ Trụ 5 Sao</option>
																			<option value="11">Vũ Trụ 6 Sao</option>
																			<option value="12">Vũ Trụ 7 Sao</option>
																	</select>
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Tên Nhân Vật:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" id="holder_name" placeholder="Chủ tài khoản" required="" autofocus="">
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Tài Khoản:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" id="account_number" placeholder="Số tài khoản" required="" autofocus="">
							</div>
						</div>



						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Mật Khẩu:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" id="brand" placeholder="Chi nhánh" required="">
							</div>
						</div>
						<div class="alert alert-success c-font-dark">
							<b>Rút vàng chậm là dưới sự giao dịch của quản lý web.</b><br>

						</div>
					</div>
					<div class="modal-footer">

						<button onclick="addnh()" id="addnh" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold"  id="d3" style="">Thêm tài khoản</button>
						<button type="submit" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="info">
				<div class="form-horizontal">
					<div class="modal-body">
<p id="noticevi"></p>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Sever:</b></label>
							<div class="col-md-6">
								<select id="bank_id" class="form-control c-square c-theme">
									<option value="">
										Chọn Sever:</option>
																			<option value="1">Vũ Trụ 1 Sao</option>
																			<option value="2">Vũ Trụ 2 Sao</option>
																			<option value="3">Vũ Trụ 3 Sao</option>
																			<option value="4">Vũ Trụ 4 Sao</option>
																			<option value="5">Vũ Trụ 5 Sao</option>
																	</select>
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Tên Nhân Vật:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" id="account_vi" placeholder="Nhập tên nhân vật...">
							</div>
						</div>
						<div class="form-group m-t-10">
							<label class="col-md-3 control-label"><b>Nhập lại tên nhân vật:</b></label>
							<div class="col-md-6">
								<input class="form-control c-square c-theme" type="text" id="account_vi_confirmation" placeholder="Nhập lại tên nhân vật...">
							</div>
						</div>

						<div class="alert alert-success c-font-dark">
							<b>Rút vàng nhanh là rút vàng hoàn toàn tự động với tư cách là nhanh gọn với vài thao tác và bạn nên lựa chọn.</b><br>

						</div>
					</div>
					<div class="modal-footer">

						<button onclick="addvi()" id="addvi" class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold">Thêm nhân vật</button>
						<button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div style="clear: both"></div>
</div>
<script>
var _0xe633=["\x76\x61\x6C","\x23\x62\x61\x6E\x6B\x5F\x69\x64","\x23\x61\x63\x63\x6F\x75\x6E\x74\x5F\x76\x69","\x23\x61\x63\x63\x6F\x75\x6E\x74\x5F\x76\x69\x5F\x63\x6F\x6E\x66\x69\x72\x6D\x61\x74\x69\x6F\x6E","\x54\x68\xEA\x6D\x20\x76\xED\x20\u0111\x69\u1EC7\x6E\x20\x74\u1EED","\x68\x74\x6D\x6C","\x23\x61\x64\x64\x76\x69","\x2F\x61\x73\x73\x65\x74\x73\x2F\x61\x6A\x61\x78\x2F\x44\x4C\x43\x5F\x61\x64\x64\x76\x69\x2E\x70\x68\x70","\x50\x4F\x53\x54","\x70\x61\x72\x73\x65\x4A\x53\x4F\x4E","\x6D\x73\x67","\x23\x6E\x6F\x74\x69\x63\x65\x76\x69","\x61\x6A\x61\x78","\x23\x62\x61\x6E\x6B\x5F\x6E\x68\x69\x64","\x23\x68\x6F\x6C\x64\x65\x72\x5F\x6E\x61\x6D\x65","\x23\x61\x63\x63\x6F\x75\x6E\x74\x5F\x6E\x75\x6D\x62\x65\x72","\x23\x62\x72\x61\x6E\x64","\x54\x68\xEA\x6D\x20\x6E\x67\xE2\x6E\x20\x68\xE0\x6E\x67","\x23\x61\x64\x64\x6E\x68","\x2F\x61\x73\x73\x65\x74\x73\x2F\x61\x6A\x61\x78\x2F\x44\x4C\x43\x5F\x61\x64\x64\x62\x61\x6E\x6B\x2E\x70\x68\x70","\x23\x6E\x6F\x74\x69\x63\x65\x6E\x68"];function addvi(){var _0xdc34x2=$(_0xe633[1])[_0xe633[0]]();var _0xdc34x3=$(_0xe633[2])[_0xe633[0]]();var _0xdc34x4=$(_0xe633[3])[_0xe633[0]]();$(_0xe633[6])[_0xe633[5]](_0xe633[4]);$[_0xe633[12]]({url:_0xe633[7],type:_0xe633[8],data:{bank:_0xdc34x2,account:_0xdc34x3,account_confirm:_0xdc34x4},success:function(_0xdc34x5){var _0xdc34x6=$[_0xe633[9]](_0xdc34x5);$(_0xe633[11])[_0xe633[5]](_0xdc34x6[_0xe633[10]]);$(_0xe633[6])[_0xe633[5]](_0xe633[4])}})}function addnh(){var _0xdc34x2=$(_0xe633[13])[_0xe633[0]]();var _0xdc34x8=$(_0xe633[14])[_0xe633[0]]();var _0xdc34x9=$(_0xe633[15])[_0xe633[0]]();var _0xdc34xa=$(_0xe633[16])[_0xe633[0]]();$(_0xe633[18])[_0xe633[5]](_0xe633[17]);$[_0xe633[12]]({url:_0xe633[19],type:_0xe633[8],data:{bank:_0xdc34x2,chutk:_0xdc34x8,stk:_0xdc34x9,chinhanh:_0xdc34xa},success:function(_0xdc34x5){var _0xdc34x6=$[_0xe633[9]](_0xdc34x5);$(_0xe633[20])[_0xe633[5]](_0xdc34x6[_0xe633[10]]);$(_0xe633[18])[_0xe633[5]](_0xe633[17])}})}
</script>
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