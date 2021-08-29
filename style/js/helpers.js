function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgb(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
    return rgb;
}

function bindingURL(idName, idURL) {
    $("#" + idName).on("propertychange change keyup paste input", function () {
        var name = $(this).val();
        var url = boDau(name);
        do {
            url = url.replace(" ", "-");
        }
        while (url.indexOf(" ") > -1);
        do {
            url = url.replace("--", "-");
        }
        while (url.indexOf("--") > -1);

        var oldURL = $("#" + idURL).val();
        if (url.startsWith(oldURL) || oldURL.startsWith(url)) {
            $("#" + idURL).val(url);
        }
    });

}

function StrRight(value, len) {
    return value.substr(value.length - len);
}

function DrawTable(ElementID, data, Fields, fieldSum) {
    var table = '';
    var row = 1;
    $.each(data.Data, function (index, item) {
        table += '<tr>';

        if (item[fieldSum] == 'Tá»•ng cá»™ng') {
            table += '<td>&nbsp</td>';
            for (var i = 0; i < Fields.length; i++) {
                table += '<td><b>' + item[Fields[i]] + '</b></td>';
            }
        } else {
            table += '<td>' + row + '</td>';
            for (var i = 0; i < Fields.length; i++) {
                table += '<td>' + item[Fields[i]] + '</td>';
            }
        }

        $('#' + ElementID).html(table);

        table += '</tr>';
        row++;
    });
}

function boDau(str) {
    str = str.toLowerCase();
    str = str.replace(/Ă |Ă¡|áº¡|áº£|Ă£|Ă¢|áº§|áº¥|áº­|áº©|áº«|Äƒ|áº±|áº¯|áº·|áº³|áºµ/g, "a");
    str = str.replace(/Ă¨|Ă©|áº¹|áº»|áº½|Ăª|á»|áº¿|á»‡|á»ƒ|á»…/g, "e");
    str = str.replace(/Ă¬|Ă­|á»‹|á»‰|Ä©/g, "i");
    str = str.replace(/Ă²|Ă³|á»|á»|Ăµ|Ă´|á»“|á»‘|á»™|á»•|á»—|Æ¡|á»|á»›|á»£|á»Ÿ|á»¡/g, "o");
    str = str.replace(/Ă¹|Ăº|á»¥|á»§|Å©|Æ°|á»«|á»©|á»±|á»­|á»¯/g, "u");
    str = str.replace(/á»³|Ă½|á»µ|á»·|á»¹/g, "y");
    str = str.replace(/Ä‘/g, "d");
    return str;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + "," + opacity + ")";
    return rgb;
}

function MakeFormReadOnly() {
    $('input').attr('disabled', 'disabled');
    $('input').attr('disabled', true);
    $('select').attr('disabled', true);
    for (instance in CKEDITOR.instances)
        CKEDITOR.instances[instance].setReadOnly(true);


}

function InitUploadFile(id) {
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var data = null;
    var config = null;
    if (url != '') {
        data = [url];
        config = [{ width: "120px", url: '/Sys_File/DeleteImage/' + key }];
    } else {
        data = [];
        config = [];
    }
    var fileCount = isMulti == 'True' ? 0 : 1;
    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        initialPreviewAsData: true,
        purifyHtml: true,
        maxFileCount: fileCount,
        initialPreview: data,
        initialPreviewConfig: config,
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        var id = data.response.initialPreviewConfig[0].key;
        var hid = $(this).attr('data-id');
        $("#" + hid).val(id);
    }).on('filedeleted', function (event, key) {
        var hid = $(this).attr('data-id');
        $("#" + hid).val('');
    });
}

function InitUploadFileMulti(id) {
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var fileCount = isMulti == 'True' ? 0 : 1;


    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        purifyHtml: true,
        initialPreviewAsData: true,
        maxFileCount: fileCount,
        initialPreview: [],
        initialPreviewConfig: [],
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        if (fileCount == 0) {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = ',' + id + ",";
            } else {
                allID += id + ",";
            }
            $("#" + hid).val(allID);
        } else {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val(id);
        }
    }).on('filedeleted', function (event, key) {
        if (fileCount == 0) {
            var id = key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = '';
            } else {
                allID = allID.replace(id + ',', "");
            }
            $("#" + hid).val(allID);
        } else {
            var id = key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val('');
        }
    }).on('fileloaded', function (event, file, previewId, index, reader) {
        console.log("fileloaded");
    });;
}

function InitUploadFileData(id, data) {
    var jsonData = jQuery.parseJSON(data);
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var fileCount = isMulti == 'True' ? 0 : 1;


    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        purifyHtml: true,
        initialPreviewAsData: true,
        maxFileCount: fileCount,
        initialPreview: jsonData.initialPreview,
        initialPreviewConfig: jsonData.initialPreviewConfig,
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        if (fileCount == 0) {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = ',' + id + ",";
            } else {
                allID += id + ",";
            }
            $("#" + hid).val(allID);
        } else {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val(id);
        }
    }).on('filedeleted', function (event, key) {
        if (fileCount == 0) {
            var id = key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = '';
            } else {
                allID = allID.replace(id + ',', "");
            }
            $("#" + hid).val(allID);
        } else {
            var id = key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val('');
        }
    }).on('fileloaded', function (event, file, previewId, index, reader) {
        console.log("fileloaded");
    });;
}

function InitUploadFileDataWithKey(id, data, keyID) {
    var jsonData = jQuery.parseJSON(data);
    var session = $("#HHT_Session").val();
    var source = $("#Nthoa_Source").val();
    var url = $("#" + id).attr('data-url');
    var key = $("#" + id).attr('data-key');
    var isMulti = $("#" + id).attr('data-mul');
    var fileCount = isMulti == 'True' ? 0 : 1;


    $('#' + id).fileinput({
        uploadUrl: "/Sys_File/UploadImage?Source=" + source + "&Session=" + session + "&isMulti=" + isMulti + "&Field=" + id + "&id= " + keyID,
        uploadAsync: false,
        showUpload: false,
        showRemove: false,
        overwriteInitial: false,
        purifyHtml: true,
        initialPreviewAsData: true,
        maxFileCount: fileCount,
        initialPreview: jsonData.initialPreview,
        initialPreviewConfig: jsonData.initialPreviewConfig,
        allowedFileExtensions: ["jpg", "png"]
    }).on("filebatchselected", function (event, files) {
        $(this).fileinput("upload");
    }).on('filebatchuploadcomplete', function (event, files, extra) {
        console.log('File batch upload complete');
    }).on('filebatchuploadsuccess', function (event, data, previewId, index) {
        if (fileCount == 0) {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = ',' + id + ",";
            } else {
                allID += id + ",";
            }
            $("#" + hid).val(allID);
        } else {
            var id = data.response.initialPreviewConfig[0].key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val(id);
        }
    }).on('filedeleted', function (event, key) {
        if (fileCount == 0) {
            var id = key;
            var hid = $(this).attr('data-id');
            var allID = $("#" + hid).val();
            if (allID == '' || allID == ',') {
                allID = '';
            } else {
                allID = allID.replace(id + ',', "");
            }
            $("#" + hid).val(allID);
        } else {
            var id = key;
            var hid = $(this).attr('data-id');
            $("#" + hid).val('');
        }

    }).on('fileloaded', function (event, file, previewId, index, reader) {
        console.log("fileloaded");
    });;

}

function DeleteGoToURL(url, id, urlBack) {
    swal({
        title: "Báº¡n cĂ³ cháº¯c cháº¯n khĂ´ng?",
        text: "Thao tĂ¡c nĂ y khĂ´ng thá»ƒ phá»¥c há»“i láº¡i Ä‘Æ°á»£c!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "VĂ¢ng, xĂ³a nĂ³!",
        cancelButtonText: "KhĂ´ng!",
        closeOnConfirm: false
    }, function () {
        $.post(url + '/' + id, function (data) {
            if (data.intStatus == 1) {
                $(document).ready(function () {
                    swal({
                        title: "ThĂ nh cĂ´ng",
                        text: "Dá»¯ liá»‡u nĂ y Ä‘Ă£ Ä‘Æ°á»£c xĂ³a",
                        type: "success"
                    },
                        function () {
                            window.location.href = urlBack;
                        });
                });
            } else {
                swal("Tháº¥t báº¡i!", data.strMess, "error");
            }
        });
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}

function Delete(url, id, divid, urlx, page) {
    //showLoading();
    swal({
        title: "Báº¡n cĂ³ cháº¯c cháº¯n khĂ´ng?",
        text: "Thao tĂ¡c nĂ y khĂ´ng thá»ƒ phá»¥c há»“i láº¡i Ä‘Æ°á»£c!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "VĂ¢ng, xĂ³a nĂ³!",
        cancelButtonText: "KhĂ´ng!",
        closeOnConfirm: false
    }, function () {
        var session = $("#HHT_Session").val();
        $.post(url + '/' + id + '?&session=' + (session == null ? '' : session), function (data) {
            if (data.intStatus == 1) {
                LoadTable(divid, urlx, page, true);
                //hideLoading();
                swal("ÄĂ£ xĂ³a!", "Dá»¯ liá»‡u Ä‘Ă£ Ä‘Æ°á»£c xĂ³a.", "success");
            } else {
                swal("Tháº¥t báº¡i!", data.strMess, "error");
            }
        });
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });

}


function DeleteTableDetail(url, divid, urlx, page) {
    //showLoading();
    swal({
        title: "Báº¡n cĂ³ cháº¯c cháº¯n khĂ´ng?",
        text: "Thao tĂ¡c nĂ y khĂ´ng thá»ƒ phá»¥c há»“i láº¡i Ä‘Æ°á»£c!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "VĂ¢ng, xĂ³a nĂ³!",
        cancelButtonText: "KhĂ´ng!",
        closeOnConfirm: false
    }, function () {
        $.post(url, function (data) {
            if (data.intStatus == 1) {
                LoadTableDetail(divid, urlx, page, true);
                //hideLoading();
                swal("ÄĂ£ xĂ³a!", "Dá»¯ liá»‡u Ä‘Ă£ Ä‘Æ°á»£c xĂ³a.", "success");
            } else {
                swal("Tháº¥t báº¡i!", data.strMess, "error");
            }
        });
        //swal("Deleted!", "Your imaginary file has been deleted.", "success");
    });
}


function ModalURL(url) {
    showLoading();
    $.get(url, function (data) {
        $("#ajaxModal").html(data);
        UpdateMask();
        $("#defaultModal").modal();
        hideLoading();
    });
}

function LoadDetail() {

}

function LoadTableDetail(divid, url, page, showaction) {
    var search = null;
    search = $("#form_search").serialize();
    var pagesize = 25;
    if (page == null) {
        if ($("#" + divid).attr('data-page')) {
            page = $("#" + divid).attr('data-page');
        } else {
            page = 1;
        }
    }

    var htmlLoading = '<div class="preloader" style="margin-left: 50%"> <div class="spinner-layer pl-green"> <div class="circle-clipper left"> <div class="circle"></div> </div> <div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div>';

    $("#" + divid).html(htmlLoading);
    var session = $("#HHT_Session").val();
    //$("#" + divid).LoadingOverlay("show");

    //var urldata = 'page=' + page + '&pagesize=' + pagesize + (search == null ? '' : '&' + search) + '&session=' + (session == null ? "" : session);

    $.post(url + '&page=' + page + '&pagesize=' + pagesize, function (data) {
        //$(".result").html(data);
        if (data.intStatus != 1) {
            showError(data.strMess);
            $("#" + divid).html(data.strMess);
            $("#" + divid).LoadingOverlay("hide");
        } else {

            var contents = '<table class="table table-hover">';
            if (data.lstHeader.length > 0) {
                contents += '<tbody><tr>';
                for (var i = 0; i < data.lstHeader.length; i++) {
                    var header = data.lstHeader[i];
                    if (header.IsShow) {
                        contents += '<th align="center">' + header.Caption + '</th>';
                    }
                }

                if (data.isShowAction && showaction) {
                    contents += '<th width="150">Thao tĂ¡c</th>';
                }

                contents += '</tr></tbody>';
            }
            contents += '<tbody>';
            if (data.lstData.length == 0) {
                var column = data.lstHeader.length;
                if (data.isShowAction && showaction) {
                    column++;
                }

                contents += '<tr><td align="center" colspan="' + column + '"><h5>KhĂ´ng cĂ³ dá»¯ liá»‡u</h5></td></tr>';
            } else {


                for (var i = 0; i < data.lstData.length; i++) {
                    contents += '<tr>';
                    var objData = data.lstData[i];
                    var col = 0;
                    $.each(objData.objData, function (index, value) {
                        var header = data.lstHeader[col];
                        col++;
                        if (header.IsShow) {
                            if (header.Format != '') {
                                if (header.Type == 2) {
                                    //Date
                                    //var date = new Date(value);
                                    if (value != null) {
                                        contents += '<td align="left" data-title="' + header.Caption + '">' + moment(value).format(header.Format) + '</td>';
                                    } else {
                                        contents += '<td align="left" data-title="' + header.Caption + '"> &nbsp;</td>';
                                    }

                                } else if (header.Type == 3) {

                                    //Time
                                    if (value == null) {
                                        contents += '<td data-title="' + header.Caption + '"> &nbsp; </td>';
                                    } else {
                                        var time = new Date('2016/11/2 ' + value);
                                        contents += '<td data-title="' + header.Caption + '">' + moment(time).format(header.Format) + '</td>';
                                    }
                                } else if (header.Type == 4) {
                                    //Boolean
                                    var split = header.Format.split("index.html");
                                    if (value == null) {
                                        contents += '<td align="center" data-title="' + header.Caption + '"> &nbsp; </td>';
                                    } else {
                                        contents += '<td align="center" data-title="' + header.Caption + '"> ' + (value ? split[0] : split[1]) + ' </td>';
                                    }
                                } else if (header.Type == 5) {
                                    //Integer
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 6) {
                                    //Decimal
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 7) {
                                    //Images
                                    contents += '<td data-title="' + header.Caption + '">' + (value == null ? '<img  width="50"  src="/Sys_File/ImageView/00000000-0000-0000-0000-000000000000"/>' : '<img width="70" src="/Sys_File/ImageView/' + value + '"/>') + '</td>';
                                } else if (header.Type == 8) {
                                    contents += '<td data-title="' + header.Caption + '">' + (value != null ? header.Format.replace("#VALUE#", value) : '') + '</td>';
                                } else {
                                    contents += '<td data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                }
                            } else {
                                if (header.Type == 5) {
                                    //Integer
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 6) {
                                    //Decimal
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 7) {
                                    //Images
                                    contents += '<td  data-title="' + header.Caption + '">' + (value == null ? '<img width="70"  src="/Sys_File/ImageView/00000000-0000-0000-0000-000000000000"/>' : '<img width="70" src="/Sys_File/ImageView/' + value + '"/>') + '</td>';
                                }
                                else if (header.Type == 8) {
                                    //Tieu De
                                    contents += '<td><b data-toggle="tooltip" title="' + data.lstData[i].Tooltips + '">' + value + '</b></td>';
                                }
                                else if (header.Type == 9) {
                                    //Tieu De
                                    contents += '<td><b>' + value + '</b></td>';
                                }
                                else {
                                    contents += '<td>' + (value == null ? '&nbsp;' : value) + '</td>';
                                }

                            }
                        }
                    });

                    if (data.isShowAction && showaction) {
                        contents += '<td style="padding: 5px;">';

                        if (data.LstExColumn.length > 0) {
                            for (var j = 0; j < objData.ExButtonShow.length; j++) {
                                var button = data.LstExColumn[j];
                                if (objData.ExButtonShow[j]) {
                                    contents += '&nbsp;<a target="' + button.target + '" title="' + button.Title + '" data-id="' + objData.ID + '"class="btn _' + button.ID + ' bg-' + button.Color + ' btn-circle waves-effect waves-circle waves-float" ' + (button.strURL == null ? "" : 'href="' + button.strURL + objData.ID + '"') + '><i class="material-icons">' + button.ICon + '</i></a>';
                                }
                            }
                        }



                        if (objData.isShowEdit) {
                            contents += '&nbsp;<a  data-id="' + objData.ID + '" class="btn ' + divid + '_btnEdit btn bg-green btn-circle waves-effect waves-circle waves-float" ><i class="material-icons">edit</i></a>';
                        }
                        if (objData.isShowDelete) {
                            contents += '&nbsp;<a class="btn ' + divid + '_btnDelete btn-danger c-btn-square btn-xs" data-id="' + objData.ID + '">XĂ³a</a>';
                        }

                        contents += '</td>';
                    }

                    contents += '</tr>';
                }
            }
            contents += '</tbody></table>';

            if (data.intTotalPage > 1) {
                contents += '<div class="text-right m-b-20">';
                contents += '<nav> <ul class="c-content-pagination c-theme">';

                var start = data.intCurrentPage - 5 > 0 ? data.intCurrentPage - 5 : 1;

                for (var i = start; i < data.intCurrentPage; i++) {
                    contents += '<li><a href="javascript:LoadTableDetail(\'' + divid + '\',\'' + url + '\',\'' + i + '\');" class="waves-effect"> ' + i + ' </a></li>';
                }
                contents += '<li class="c-active"><a class="waves-effect"> <b>' + data.intCurrentPage + '</b> </a></li>';
                for (var i = data.intCurrentPage + 1; i < data.intCurrentPage + 5 && i <= data.intTotalPage; i++) {
                    contents += '<li><a href="javascript:LoadTableDetail(\'' + divid + '\',\'' + url + '\',\'' + i + '\');" class="waves-effect"> ' + i + ' </a></li>';
                }
                contents += '</ul></nav></div>';
            }

            $("#" + divid).html(contents);
            $("#" + divid).attr('data-page', data.intCurrentPage);
            $('[data-toggle="tooltip"]').tooltip();
            //$("#" + divid).on("click",".btnModal", function () {
            //    ModalURL($(this).attr('data-url'));
            //});


            //$("#" + divid).LoadingOverlay("hide");

        }
    });
}

function LoadTable(divid, url, page, idload, loaddefault) {
    var search = null;
    search = $("#form_search").serialize();
    var pagesize = 20;
    if (page == null) {
        if ($("#" + divid).attr('data-page')) {
            page = $("#" + divid).attr('data-page');
        } else {
            page = 1;
        }
    }

    var htmlLoading = '<div class="preloader" style="margin-left: 50%"> <div class="spinner-layer pl-green"> <div class="circle-clipper left"> <div class="circle"></div> </div> <div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div>';

    $("#" + divid).html(htmlLoading);
    var session = $("#HHT_Session").val();
    //$("#" + divid).LoadingOverlay("show");
    $.post(url + '?page=' + page + '&pagesize=' + pagesize + (search == null ? '' : '&' + search) + '&session=' + (session == null ? "" : session), function (data) {
        //$(".result").html(data);
        if (data.intStatus != 1) {
            showError(data.strMess);
            $("#" + divid).html(data.strMess);
            $("#" + divid).LoadingOverlay("hide");
        } else {
            var contents = "";
            if (data.lstData.length == 0) {
                contents += '<p align="center"><h5>KhĂ´ng cĂ³ dá»¯ liá»‡u</h5></p>';
            } else {
                var idDefault = '';
                for (var i = 0; i < data.lstData.length; i++) {
                    var objData = data.lstData[i].objData;
                    if (idDefault == '') {
                        idDefault = objData.ID;
                    }
                    contents += '<div class="media btnViewDetail btnViewDetail_' + objData.ID + '" style="border-bottom: 1px dashed gray; padding: 5px 0 5px 0; cursor: pointer; cursor: hand;" data-id="' + objData.ID + '" data-url="' + data.strURLDetail + '">';
                    if (objData.Image != null) {
                        contents += '<div class="media-left">';
                        if (objData.Image.indexOf('index.html') > -1) {
                            contents += '<img class="media-object" src="' + objData.Image + '" width="64" height="64">';
                        } else {
                            contents += '<img class="media-object" src="/Files/' + objData.Image + '" width="64" height="64">';
                        }

                        contents += '</div>';
                    }
                    contents += '<div class="media-body">';
                    if (objData.Title != null) {
                        contents += '<div><b>';
                        contents += objData.Title
                        contents += '</b></div>';
                    }
                    if (objData.Line1 != null) {
                        contents += '<div>';
                        if (objData.Line1Type == 'number') {
                            contents += parseFloat(objData.Line1).format(objData.Line1Decimal, 3, '.', ',')
                        } else {
                            contents += objData.Line1
                        }
                        contents += '</div>';
                    }
                    if (objData.Line2 != null) {
                        contents += '<div>';
                        if (objData.Line2Type == 'number') {
                            contents += parseFloat(objData.Line2).format(objData.Line2Decimal, 3, '.', ',')
                        } else {
                            contents += objData.Line2
                        }
                        contents += '</div>';
                    }
                    if (objData.Line3 != null) {
                        contents += '<div>';
                        if (objData.Line3Type == 'number') {
                            contents += parseFloat(objData.Line3).format(objData.Line3Decimal, 3, '.', ',')
                        } else {
                            contents += objData.Line3
                        }
                        contents += '</div>';
                    }
                    contents += '</div>'; //Class body
                    contents += '</div>'; //Class media
                }
            }




            if (data.intTotalPage > 1) {
                contents += '<nav> <ul class="pagination pull-right" style="margin-right: 20px;">';

                var start = data.intCurrentPage - 5 > 0 ? data.intCurrentPage - 5 : 1;

                for (var i = start; i < data.intCurrentPage; i++) {
                    contents += '<li><a href="javascript:LoadTable(\'' + divid + '\',\'' + url + '\',\'' + i + '\',null,false);" class="waves-effect"> ' + i + ' </a></li>';
                }
                contents += '<li><a class="waves-effect"> <b>' + data.intCurrentPage + '</b> </a></li>';
                for (var i = data.intCurrentPage + 1; i < data.intCurrentPage + 5 && i <= data.intTotalPage; i++) {
                    contents += '<li><a href="javascript:LoadTable(\'' + divid + '\',\'' + url + '\',\'' + i + '\',null,false);" class="waves-effect"> ' + i + ' </a></li>';
                }
                contents += '</ul></nav>';
            }

            $("#" + divid).html(contents);
            $("#" + divid).attr('data-page', data.intCurrentPage);


            if (idload != null) {
                $("#" + divid + " .btnViewDetail_" + idload).click();
            } else if (loaddefault) {
                //idDefault
                $("#" + divid + " .btnViewDetail_" + idDefault).click();
            }

        }
    });
}

function UpdateMask() {
    $(".int").inputmask("integer", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });
    //$(".int").format({ format: "#.###", locale: "vi-VN" });
    $(".dec").inputmask("decimal", { radixPoint: ",", autoGroup: true, groupSeparator: ".", groupSize: 3 });

    autosize($('textarea.auto-growth'));

    //CKEDITOR.replace('.rich');
    //CKEDITOR.config.height = 300;

    //Datetimepicker plugin
    $('.datetime').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY HH:mm',
        clearButton: true,
        weekStart: 1
    });

    $('.date').bootstrapMaterialDatePicker({
        format: 'DD/MM/YYYY',
        clearButton: true,
        weekStart: 1,
        time: false
    });

    $('.time').bootstrapMaterialDatePicker({
        format: 'HH:mm',
        clearButton: true,
        date: false
    });

    $.AdminBSB.input.activate();

    //$('#defaultModal').on('hidden', function () {
    //    $("#ajaxModal").html('');
    //});
}

function showError(mess) {
    if (mess == '') {
        return;
    }
    var placementFrom = 'bottom';
    var placementAlign = 'right';
    var animateEnter = '';
    var animateExit = '';
    var colorName = 'bg-red';
    showNotification(colorName, mess, placementFrom, placementAlign, animateEnter, animateExit);
}

function showSuccess(mess) {
    if (mess == '') {
        return;
    }
    var placementFrom = 'bottom';
    var placementAlign = 'right';
    var animateEnter = '';
    var animateExit = '';
    var colorName = 'bg-green';
    showNotification(colorName, mess, placementFrom, placementAlign, animateEnter, animateExit);
}

function showLoading() {
    $.LoadingOverlay("show");
}

function hideLoading() {
    $.LoadingOverlay("hide");
}

function showAlertSuccess() {
    swal("ThĂ nh cĂ´ng!", "Thao tĂ¡c thĂ nh cĂ´ng!", "success");
}

function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'bg-black'; }
    if (text === null || text === '') { text = 'Turning standard Bootstrap alerts'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
        message: text
    },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
            template: '<div  data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} ' + (allowDismiss ? "p-r-35" : "") + '" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">Ă—</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
}

(function ($) {
    $.fn.serializeObject = function () {

        var self = this,
            json = {},
            push_counters = {},
            patterns = {
                "validate": /^[a-zA-Z][a-zA-Z0-9_]*(?:\[(?:\d*|[a-zA-Z0-9_]+)\])*$/,
                "key": /[a-zA-Z0-9_]+|(?=\[\])/g,
                "push": /^$/,
                "fixed": /^\d+$/,
                "named": /^[a-zA-Z0-9_]+$/
            };


        this.build = function (base, key, value) {
            base[key] = value;
            return base;
        };

        this.push_counter = function (key) {
            if (push_counters[key] === undefined) {
                push_counters[key] = 0;
            }
            return push_counters[key]++;
        };

        $.each($(this).serializeArray(), function () {

            // skip invalid keys
            if (!patterns.validate.test(this.name)) {
                return;
            }

            var k,
                keys = this.name.match(patterns.key),
                merge = this.value,
                reverse_key = this.name;

            while ((k = keys.pop()) !== undefined) {

                // adjust reverse_key
                reverse_key = reverse_key.replace(new RegExp("\\[" + k + "\\]$"), '');

                // push
                if (k.match(patterns.push)) {
                    merge = self.build([], self.push_counter(reverse_key), merge);
                }

                // fixed
                else if (k.match(patterns.fixed)) {
                    merge = self.build([], k, merge);
                }

                // named
                else if (k.match(patterns.named)) {
                    merge = self.build({}, k, merge);
                }
            }

            json = $.extend(true, json, merge);
        });

        return json;
    };
})(jQuery);
/*
function InitAutoComplate(elementID, elementDisplay,  urlPost) {
    elementID.keyup(function() 
    {
        var searchbox = $(this).val();
        var dataString = searchbox;
        if(searchbox=='') {

        }
        else {
            $.ajax({
                type: "POST",
                url: urlPost,
                data: dataString,
                cache: false,
                success: function(data)
                {
                    if (data.intStatus == 1) {
                        $.each(data.DataAutoComplate, function (index, item) {
                            var label = item.Label;
                            var value = item.Value;
                            var img = item.Images;
                        });
                    } else {
                        elementDisplay.html("").show();
                    }
                    
                }
            });
        }
        return false;
    });
}*/


function LoadDetailDropdown(idDropParent, idDropChildren, urlJson, valuefield, namefield) {
    $(idDropParent).change(function () {
        var idParent = this.value;
        $.ajax({
            type: 'POST',
            url: urlJson,
            contentType: "application/json; charset=utf-8",
            data: JSON.stringify({ id: idParent }),
            dataType: 'json',
            success: function (data) {
                hideLoading();
                if (data.intStatus == "1") {
                    idDropChildren.empty();
                    idDropChildren.append("<option>- Vui lĂ²ng chá»n -</option>");
                    $.each(data.Data, function (index, item) {
                        idDropChildren.append("<option value='" + item[valuefield] + "'>" + item[namefield] + "</option>");
                    });
                    $('select').selectpicker('refresh');
                } else {
                    showError(data.strMess);
                }
            },
            error: function (data) {
                hideLoading();
                // if error occured
                showError("Error");
            }
        });
    });
}

function DrawChart(ElementID, Url) {
    Chart.defaults.global.legend.display = false;
    $.post(Url, function (data) {
        var ctx = document.getElementById(ElementID);
        var myChart = new Chart(ctx, {
            type: data.ChartType,
            data: {
                labels: data.ChartDataLabels,
                datasets: [{
                    label: data.ChartTitle,
                    data: data.ChartDataValues,
                    backgroundColor: data.ChartColors,
                    borderColor: data.ChartColors
                }]
            },
            //options: {
            //    scales: {
            //        yAxes: [{
            //            scaleLabel: {
            //                display: true,
            //                labelString: 'probability',
            //            },
            //            ticks: {
            //                beginAtZero: true,
            //            }
            //        }]
            //    }
            //}
        });
    });
}

function LoadTableDetail2(divid, url, page, showaction) {
    var search = null;
    search = $("#form_search").serialize();
    var pagesize = 25;
    if (page == null) {
        if ($("#" + divid).attr('data-page')) {
            page = $("#" + divid).attr('data-page');
        } else {
            page = 1;
        }
    }

    var htmlLoading = '<div class="preloader" style="margin-left: 50%"> <div class="spinner-layer pl-green"> <div class="circle-clipper left"> <div class="circle"></div> </div> <div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div>';

    $("#" + divid).html(htmlLoading);
    var session = $("#HHT_Session").val();
    //$("#" + divid).LoadingOverlay("show");

    //var urldata = 'page=' + page + '&pagesize=' + pagesize + (search == null ? '' : '&' + search) + '&session=' + (session == null ? "" : session);

    $.post(url + '&page=' + page + '&pagesize=' + pagesize, function (data) {
        //$(".result").html(data);
        if (data.intStatus != 1) {
            showError(data.strMess);
            $("#" + divid).html(data.strMess);
            $("#" + divid).LoadingOverlay("hide");
        } else {

            var contents = '<table class="table table-hover">';
            var lastdate = '';
            if (data.lstHeader.length > 0) {
                contents += '<tbody><tr>';
                for (var i = 0; i < data.lstHeader.length; i++) {
                    var header = data.lstHeader[i];
                    if (header.IsShow) {
                        contents += '<th align="center">' + header.Caption + '</th>';
                    }
                }

                if (data.isShowAction && showaction) {
                    contents += '<th width="150">Thao tĂ¡c</th>';
                }

                contents += '</tr></tbody>';
            }
            contents += '<tbody>';
            if (data.lstData.length == 0) {
                var column = data.lstHeader.length;
                if (data.isShowAction && showaction) {
                    column++;
                }

                contents += '<tr><td align="center" colspan="' + column + '"><h5>KhĂ´ng cĂ³ dá»¯ liá»‡u</h5></td></tr>';
            } else {


                for (var i = 0; i < data.lstData.length; i++) {

                    contents += '<tr>';
                    var objData = data.lstData[i];
                    var col = 0;
                    $.each(objData.objData, function (index, value) {
                        var header = data.lstHeader[col];
                        col++;
                        if (lastdate != data.lstData[i].CreateTime) {
                            lastdate = data.lstData[i].CreateTime;
                            contents += '<tr><td colspan = "4" class="row-date" > <b>NgĂ y ' + lastdate + '</b></td></tr>';
                        }
                        if (header.IsShow) {
                            if (header.Format != '') {
                                if (header.Type == 2) {
                                    //Date
                                    //var date = new Date(value);
                                    if (value != null) {
                                        contents += '<td align="left" data-title="' + header.Caption + '">' + moment(value).format(header.Format) + '</td>';
                                    } else {
                                        contents += '<td align="left" data-title="' + header.Caption + '"> &nbsp;</td>';
                                    }

                                } else if (header.Type == 3) {

                                    //Time
                                    if (value == null) {
                                        contents += '<td data-title="' + header.Caption + '"> &nbsp; </td>';
                                    } else {
                                        var time = new Date('2016/11/2 ' + value);
                                        contents += '<td data-title="' + header.Caption + '">' + moment(time).format(header.Format) + '</td>';
                                    }
                                } else if (header.Type == 4) {
                                    //Boolean
                                    var split = header.Format.split("index.html");
                                    if (value == null) {
                                        contents += '<td align="center" data-title="' + header.Caption + '"> &nbsp; </td>';
                                    } else {
                                        contents += '<td align="center" data-title="' + header.Caption + '"> ' + (value ? split[0] : split[1]) + ' </td>';
                                    }
                                } else if (header.Type == 5) {
                                    //Integer
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 6) {
                                    //Decimal
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 7) {
                                    //Images
                                    contents += '<td data-title="' + header.Caption + '">' + (value == null ? '<img  width="50"  src="/Sys_File/ImageView/00000000-0000-0000-0000-000000000000"/>' : '<img width="70" src="/Sys_File/ImageView/' + value + '"/>') + '</td>';
                                } else if (header.Type == 8) {
                                    contents += '<td data-title="' + header.Caption + '">' + (value != null ? header.Format.replace("#VALUE#", value) : '') + '</td>';
                                } else {
                                    contents += '<td data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                }
                            } else {
                                if (header.Type == 5) {
                                    //Integer
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 6) {
                                    //Decimal
                                    contents += '<td align="right" data-title="' + header.Caption + '">' + (value == null ? '&nbsp;' : value) + '</td>';
                                } else if (header.Type == 7) {
                                    //Images
                                    contents += '<td  data-title="' + header.Caption + '">' + (value == null ? '<img width="70"  src="/Sys_File/ImageView/00000000-0000-0000-0000-000000000000"/>' : '<img width="70" src="/Sys_File/ImageView/' + value + '"/>') + '</td>';
                                }
                                else if (header.Type == 8) {
                                    //Tieu De
                                    contents += '<td><b data-toggle="tooltip" title="' + data.lstData[i].Tooltips + '">' + value + '</b></td>';
                                }
                                else if (header.Type == 9) {
                                    //Tieu De
                                    contents += '<td><b>' + value + '</b></td>';
                                }
                                else {
                                    contents += '<td>' + (value == null ? '&nbsp;' : value) + '</td>';
                                }

                            }
                        }
                    });

                    if (data.isShowAction && showaction) {
                        contents += '<td style="padding: 5px;">';

                        if (data.LstExColumn.length > 0) {
                            for (var j = 0; j < objData.ExButtonShow.length; j++) {
                                var button = data.LstExColumn[j];
                                if (objData.ExButtonShow[j]) {
                                    contents += '&nbsp;<a target="' + button.target + '" title="' + button.Title + '" data-id="' + objData.ID + '"class="btn _' + button.ID + ' bg-' + button.Color + ' btn-circle waves-effect waves-circle waves-float" ' + (button.strURL == null ? "" : 'href="' + button.strURL + objData.ID + '"') + '><i class="material-icons">' + button.ICon + '</i></a>';
                                }
                            }
                        }


                        if (objData.isShowDetail) {
                            contents += '&nbsp;<a href="' + data.lstData[i].DetailUrl + '" onclick="return false;" class="btn ' + divid + '_btnDetail btn-success c-btn-square btn-xs" data-id="' + objData.ID + '">Xem</a>';
                        }
                        if (objData.isShowEdit) {
                            if (data.lstData[i].trangthai == 1) {
                                contents += '&nbsp;<a href="' + data.lstData[i].DetailUrl + '" onclick="return false;" class="btn ' + divid + '_btnEdit btn-primary c-btn-square btn-xs" data-id="' + objData.ID + '">Tráº£ háº¿t</a>';
                            }
                            else if (data.lstData[i].trangthai == 2) {
                                contents += '&nbsp;<span color="green">ÄĂ£ Ä‘Æ°á»£c thanh toĂ¡n</span>';
                            }
                            else {
                                contents += '&nbsp;<span color="red">ÄĂ£ háº¿t háº¡n</span>';
                            }
                        }
                        if (objData.isShowDelete) {
                            contents += '&nbsp;<a class="btn ' + divid + '_btnDelete btn-danger c-btn-square btn-xs" data-id="' + objData.ID + '">XĂ³a</a>';
                        }

                        contents += '</td>';
                    }

                    contents += '</tr>';
                }
            }
            contents += '</tbody></table>';

            if (data.intTotalPage > 1) {
                contents += '<div class="text-right m-b-20">';
                contents += '<nav> <ul class="c-content-pagination c-theme">';

                var start = data.intCurrentPage - 5 > 0 ? data.intCurrentPage - 5 : 1;

                for (var i = start; i < data.intCurrentPage; i++) {
                    contents += '<li><a href="javascript:LoadTableDetail2(\'' + divid + '\',\'' + url + '\',\'' + i + '\');" class="waves-effect"> ' + i + ' </a></li>';
                }
                contents += '<li class="c-active"><a class="waves-effect"> <b>' + data.intCurrentPage + '</b> </a></li>';
                for (var i = data.intCurrentPage + 1; i < data.intCurrentPage + 5 && i <= data.intTotalPage; i++) {
                    contents += '<li><a href="javascript:LoadTableDetail2(\'' + divid + '\',\'' + url + '\',\'' + i + '\');" class="waves-effect"> ' + i + ' </a></li>';
                }
                contents += '</ul></nav></div>';
            }

            $("#" + divid).html(contents);
            $("#" + divid).attr('data-page', data.intCurrentPage);
            $('[data-toggle="tooltip"]').tooltip();
        }
    });
}