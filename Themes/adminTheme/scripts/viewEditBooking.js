$(document).ready(function () {
    $('#date').val(fisrtDate());
    $('.select2').select2()
    var date_input = $('input[name="date"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'mm/dd/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date_input.datepicker(options);
    var date1_input = $('input[name="editdate"]'); //our date input has the name "date"
    var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
    var options = {
        format: 'yyyy/mm/dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    };
    date1_input.datepicker(options);
    loadDataTable('table', 'sales/ListOrder')
    $('#search').click(function () {
        let stockTable = $('.table').DataTable()
        stockTable.destroy();
        filterDataTable('table', 'sales/ListOrder')
    })

})
function loadDataTable(table, url) {
    let stockTable = $('.' + table).DataTable({
        //pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Har Cars,View Stock'},
            {extend: 'pdf', title: 'Har Cars,View Stock'},
            {extend: 'print', title: 'Har Cars,View Stock',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ],
        'paging': false,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': false,
        'autoWidth': true,
        "processing": true,
        
        "ajax": {
            'type': 'POST',
            'url': admin_url + url,

        },
        'order': []
    })
}
function filterDataTable(table, url) {
    console.log($('#date').val())
    let stockTable = $('.' + table).DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'Har Cars,View Stock'},
            {extend: 'pdf', title: 'Har Cars,View Stock'},
            {extend: 'print', title: 'Har Cars,View Stock',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ],
        'paging': false,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': false,
        'autoWidth': true,
        "processing": true,
        "serverSide": true,
        "ajax": {
            'type': 'POST',
            'url': admin_url + url,
            'data': {
                date: $('#date').val()
            },
        },
        'order': []
    })
}
//edit stock
function editstock(id,table) {
    $.ajax({
        url: admin_url + 'sales/getStockDetails',
        method: 'post',
        dataType: 'json',
        data: {
            id: id
        },
        success: function (data) {
            console.log(data.stock[0])
            $('.selectbox').empty()
            $('#stockId').val(data.stock[0]['Stock_ID'])
            $('#editdate').val(data.stock[0]['Mul_inv_date'])
            let modelOption = new Option(data.stock[0]['Model'], data.stock[0]['Model'], false, false)
            $('#selectModel').append(modelOption).trigger('change');
            let varientOption = new Option(data.stock[0]['Variant'], data.stock[0]['Variant'], false, false)
            $('#selectVariant').append(varientOption).trigger('change');
            $('#modelCode').val(data.stock[0]['Model_Code'])
            let colorOption = new Option(data.stock[0]['Colour'], data.stock[0]['Colour_Code'], false, false)
            $('#color').append(colorOption).trigger('change');
            $('#colorCode').val(data.stock[0]['Colour_Code']);
            $('#model').val(data.stock[0]['Model_Year']);
            $('#chasisNo').val(data.stock[0]['Chassis_No']);
            $('#engineNo').val(data.stock[0]['Engine_No']);
            $('#chasisCode').val(data.stock[0]['Chassis_Code']);
            $('#ageing').val(data.stock[0]['Ageing']);
            let locationOption = new Option(data.stock[0]['Status'], data.stock[0]['Status_ID'], false, false)
            $('#location').append(locationOption).trigger('change');
            let statusOption = new Option(data.stock[0]['status'], data.stock[0]['status_id'], false, false)
            $('#status').append(statusOption).trigger('change');
            $('#ENUINV').val(data.stock[0]['stock_invoice_num']);
            $('#colorName').val(data.stock[0]['Colour'])
            $('#remarks').val(data.stock[0]['remarks']);
            let loadDetaults = new onloadDetails()
            loadDetaults.loadSelectModel(1, 'selectVariant')
            
      },
        error: function () {
            console.log('error occered')
        }
    });
    $('#editStock').unbind('submit').bind('submit', function () {
        this.formId = $('.editStock').attr('id');
        this.form = document.getElementById(this.formId);
        this.formData = new FormData(this.form);
        $.ajax({
            url: admin_url + 'sales/updateStock',
            method: 'post',
            data: this.formData,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data)
                let table = $('.table').DataTable()
                table.ajax.reload()
                $('#myModal5').modal('hide');
                toastr.success('Stock Updated successfully');
            }, error: function () {
                console.log('error')
            }
        })
        return false
    })


}
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
                    $('#selectModel').append(newOption).trigger('change');
                });
                $.each(data['status'], function (key, val) {
                    var newOption = new Option(val.text, val.id, false, false);
                    $('#location').append(newOption).trigger('change');
                });
                $.each(data['statusTable'], function (key, val) {
                    var newOption = new Option(val.text, val.id, false, false);
                    $('#status').append(newOption).trigger('change');
                });
            },
            error: function () {
                $('.txnNo').val('error')
            }
        })
        $('#selectModel').on('select2:select', function (e) {
            $('#selectVariant').empty()
            var newOption = new Option('Select a varient', '-1', false, false);
            $('#selectVariant').append(newOption).trigger('change');
            let data = e.params.data
            $.ajax({
                type: "POST",
                url: admin_url + 'sales/varient',
                dataType: "JSON",
                data: {data: data.text},
                success: function (result) {
                    $.each(result, function (key, v) {
                        var newOption = new Option(v.text, v.id, false, false);
                        $('#selectVariant').append(newOption).trigger('change');
                    });
                }, error: function () {
                    console.log('varient error')
                }
            })
        })
        $('#selectVariant').on('select2:select', function (e) {
            $('#modelCode').val("");
            let model = $('#selectModel').val()
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
                    $('#modelCode').val(result[0].product_code);
                    $('#color').empty();
                    var newOption = new Option('Select Color', '-1', false, false);
                    $('#color').append(newOption).trigger('change');
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
                                $('#color').append(newOption).trigger('change');
                            })
                        }, error: function () {
                            console.log('color code error')
                        }
                    });
                },
                error: function () {
                    console.log('model code error')
                }
            });
        })
        $('#color').on('select2:select', function (e) {
            $('#colorCode').val($(this).val())
            $('#colorName').val(e.params.data.text)
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
            }else if ($('#ENUINV_' + id).val() == "") {
                validate = false;
            }else if ($('#location_' + id).val() == "0") {
                validate = false;
            }else if ($('#status_' + id).val() == "0") {
                validate = false;
            }
            else {
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
                    console.log('please fill all the fields')
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
                url: admin_url+'sales/insertStock',
                method: 'post',
                data: this.formData,
                dataType: 'JSON',
                cache: false,
                contentType: false,
                processData: false,
                success: function (data) {
                    if(data.insert = true){
                        window.location.href =admin_url+'sales/responce/'
                    }else{
                        console.log(data.message)
                    }

                }, error: function () {
                    console.log('error')
                }
            })
            return false
        });
    }
}
