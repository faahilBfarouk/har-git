$(document).ready(function () {
    $('.delete').hide()
    $(".input-group.date").datepicker();
    $('.select2').select2()
    $(".invDate").val(currentDate());
    let loadDetaults = new onloadDetails()
    loadDetaults.txnNo()
    loadDetaults.stockDate('.date', '.invDate')
    loadDetaults.loadSelectModel(1, 'selectVariant')
    loadDetaults.addRow()
    loadDetaults.deleteRow()
    loadDetaults.createFrom('addStockFrm')
});
//load details on load
function onloadDetails() {
    this.txnNo = function () {
        $.ajax({
            type: "POST",
            url: admin_url + 'sales/onloadDetails',
            dataType: "JSON",
            success: function (data) {
                $('.txnNo').val(data.txnNo)
            }, error: function () {
                $('.txnNo').val('error')
            }

        })
    }
    this.stockDate = function (field, value) {
        $(field).change(function () {
            var date = $(this).datepicker("getDate");
            day = date.getDate(),
                    month = date.getMonth() + 1,
                    year = date.getFullYear();
            formatdate = year + '-' + month + '-' + day
            $(this).children(value).val(formatdate)
        });
    }
    this.loadSelectModel = function (id) {
        $.ajax({
            type: "POST",
            url: admin_url + 'sales/onloadDetails',
            dataType: "JSON",
            success: function (data) {
                $.each(data['models'], function (key, val) {
                    newOption = new Option(val.text, val.id, false, false);
                    $('#selectModel_' + id).append(newOption).trigger('change');
                });
                $.each(data['status'], function (key, val) {
                    var newOption = new Option(val.text, val.id, false, false);
                    $('#location_' + id).append(newOption).trigger('change');
                });
                $.each(data['statusTable'], function (key, val) {
                    var newOption = new Option(val.text, val.id, false, false);
                    $('#status_' + id).append(newOption).trigger('change');
                });
            },
            error: function () {
                $('.txnNo').val('error')
            }
        })
        $('#selectModel_' + id).on('select2:select', function (e) {
            $('#selectVariant_' + id).empty()
            var newOption = new Option('Select a varient', '-1', false, false);
            $('#selectVariant_' + id).append(newOption).trigger('change');
            let data = e.params.data
            $.ajax({
                type: "POST",
                url: admin_url + 'sales/varient',
                dataType: "JSON",
                data: {data: data.text},
                success: function (result) {
                    $.each(result, function (key, v) {
                        var newOption = new Option(v.text, v.id, false, false);
                        $('#selectVariant_' + id).append(newOption).trigger('change');
                    });
                }, error: function () {
                    console.log('varient error')
                }
            })
        })
        $('#selectVariant_' + id).on('select2:select', function (e) {
            $('#modelCode_' + id).val("");
            let model = $('#selectModel_' + id).val()
            let varient = e.params.data.id;
            $.ajax({
                type: "POST",
                url: admin_url + 'sales/model',
                dataType: "JSON",
                data: {
                    model: model,
                    varient: varient
                },
                success: function (result) {
                    $('#modelCode_' + id).val(result[0].product_code);
                    $('#color_' + id).empty();
                    var newOption = new Option('Select Color', '-1', false, false);
                    $('#color_' + id).append(newOption).trigger('change');
                    $.ajax({
                        type: "POST",
                        url: admin_url + 'sales/colors',
                        dataType: "JSON",
                        data: {
                            model: result[0].product_code,
                        },
                        success: function (data) {
                            $.each(data, function (k, v) {
                                var newOption = new Option(v.text, v.id, false, false);
                                $('#color_' + id).append(newOption).trigger('change');
                            })
                        }, error: function () {
                             toastr.error('color code error')
                        }
                    });
                },
                error: function () {
                    toastr.error('model code error')
                }
            });
        })
        $('#color_' + id).on('select2:select', function (e) {
            $('#colorCode_' + id).val($(this).val())
            $('#colorName_' + id).val(e.params.data.text)
        })
    }
    this.deleteRow = function () {
        $('.delete').each(function () {
            $(this).click(function () {
                $(this).closest('tr').remove()
            })
        })
    }
    this.validateRow = function (id) {
        let validate = false;
        $('.required_' + id).each(function () {
            if ($('#modelCode_' + id).val() == "") {
                validate = false;
            } else if ($('#colorCode_' + id).val() == "") {
                validate = false;
            } else if ($('#model_' + id).val() == "") {
                validate = false;
            } else if ($('#chasisNo_' + id).val() == "") {
                validate = false;
            } else if ($('#engineNo_' + id).val() == "") {
                validate = false;
            } else if ($('#chasisCode_' + id).val() == "") {
                validate = false;
            } else if ($('#ageing_' + id).val() == "") {
                validate = false;
            } else if ($('#ENUINV_' + id).val() == "") {
                validate = false;
            } else if ($('#ENUINV_' + id).val() == "") {
                validate = false;
            } else if ($('#location_' + id).val() == "0") {
                validate = false;
            } else if ($('#status_' + id).val() == "0") {
                validate = false;
            } else {
                validate = true;
            }

        })
        return validate

    }
    this.addRow = function () {
        $('.addRow').each(function () {
            $(this).click(function () {
                let loadDetaults = new onloadDetails()
                let id = $(this).attr('id').split('_')[1]
                let rowNO = parseInt(id) + 1
                if (loadDetaults.validateRow(id)) {
                    let html = "";
                    html += '<tr>';
                    html += '<td>';
                    html += '<select name="selectModel[]" class="selectModel select2 selectModel required_' + rowNO + '" id="selectModel_' + rowNO + '" required="required">';
                    html += '<option>Select Model</option>';
                    html += '</select>';
                    html += '<td>';
                    html += '<select name="selectVariant[]" class="selectVariant select2 required_' + rowNO + '"" id="selectVariant_' + rowNO + '" required="required">';
                    html += '<option>Select Variant</option>';
                    html += '</select>';
                    html += '</td>';
                    html += '<td>'
                    html += '<input type="text" class="modelCode required_' + rowNO + '"" name="modelCode[]"id="modelCode_' + rowNO + '" placeholder="Model Code" readonly="readonly" required="required"  > '
                    html += '</td>'
                    html += '<td>';
                    html += '<select name="color[]" class="color select2 required_' + rowNO + '"" id="color_' + rowNO + '" required="required" >';
                    html += '<option>Color</option> ';
                    html += '</select>';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="colorCode required_' + rowNO + '"" id="colorCode_' + rowNO + '" name="colorCode[]" placeholder="ZHJ (code)" readonly="readonly" required="required"> ';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="model required_' + rowNO + '"" name="model[]" id="model_' + rowNO + '" placeholder="2020"required="required"  >  <!-- Number -->  ';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="chasisNo required_1"id="chasisNo_' + rowNO + '" name="chasisNo[]" placeholder="123345" required="required" >';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="engineNo" name="engineNo[]" id="engineNo_' + rowNO + '" placeholder="234234" required="required" >  <!-- Number -->  ';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="chasisCode required_' + rowNO + '"" name="chasisCode[]" id="chasisCode_' + rowNO + '" placeholder="KG" required="required" >   <!-- Text -->  ';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="ageing required_1" name="ageing[]" id="ageing_' + rowNO + '" placeholder="232" required="required" >';
                    html += '</td>';
                    html += '<td>';
                    html += '<select class="location select2 required_' + rowNO + '"" name="location[]" id="location_' + rowNO + '" required="required">';
                    html += '<option>Location</option> ';
                    html += '</select>';
                    html += '</td>';
                    html += '<td>';
                    html += '<select class="status select2 required_' + rowNO + '"" name="status[]" id="status_' + rowNO + '" required="required">';
                    html += '<option>Location</option> ';
                    html += '</select>';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="ENUINV required_' + rowNO + '"" id="ENUINV_' + rowNO + '" name="ENUINV[]"  placeholder="232" required="required" >';
                    html += '</td>';
                    html += '<td>';
                    html += '<input type="text" class="remarks" name="remarks[]"  placeholder="remarks" id="remarks_' + rowNO + '"  ><input type="hidden" class="colorName" name="colorName[]" id="colorName_' + rowNO + '"  >';
                    html += '</td>';
                    html += '<td>';
                    html += '<button class="btn btn-success addRow dim " name="addRow"id="addRow_' + rowNO + '" type="button"><i class="fa fa-plus"></i></button>';
                    html += '<button class="btn btn-danger delete dim " name="delete"id="delete_' + rowNO + '" type="button"><i class="fa fa-trash"></i></button>';
                    html += '</td>';
                    html += '</tr>';
                    $('#stockBody').append(html);
                    $('.select2').select2()
                    $('#delete_' + id).show();
                    $('#delete_' + rowNO).hide();
                    var elmnt = document.getElementById("delete_" + id);
                    elmnt.scrollIntoView();
                    $(this).hide()
                    loadDetaults.loadSelectModel(rowNO, 'selectVariant')
                    loadDetaults.addRow()
                    loadDetaults.deleteRow()

                } else {
                     toastr.error('please fill all the fields')
                }
            })
        })
    }
    this.createFrom = function (formName) {
        $('#' + formName).unbind('submit').bind('submit', function () {
            this.formId = $('.addStockFrm').attr('id');
            this.form = document.getElementById(this.formId);
            this.formData = new FormData(this.form);
            $.ajax({
                url: admin_url + 'sales/insertStock',
                method: 'post',
                data: this.formData,
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    console.log(data)
                    if (data.insert == true) {
                        //console.log(data.message)
                       window.location.href = admin_url + 'sales/responce/'
                    } else {
                         toastr.error(data.message)
                    }

                }, error: function () {
                     toastr.error('Error')
                }
            })
            return false
        });
    }
}
