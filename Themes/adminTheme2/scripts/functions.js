let admin_url = 'https://codingmagic.net/harcars/admin/'
let fisrtDate = function () {
    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var month = firstDay.getMonth() + 1;
    var day = firstDay.getDate();
    var output = (month < 10 ? '0' : '') + month + '/' +
            (day < 10 ? '0' : '') + day + '/' +
            firstDay.getFullYear()
    return output
}
let lastDayDate = function () {
    var date = new Date();
    var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
    var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
    var month = lastDay.getMonth() + 1;
    var day = lastDay.getDate();
    var output = (month < 10 ? '0' : '') + month + '/' +
            (day < 10 ? '0' : '') + day + '/' +
            lastDay.getFullYear()
    return output
}
let formatDate = function (date) {
    var dates = date.split('/');
    var newfromDate = dates[2] + '-' + dates[0] + '-' + dates[1];
    return   newfromDate;

}
let get_models = function (url) {
    let options = '';
    options += '<option value="">Choose Model or Total Target</option>'
    options += '<option value="total_target">Total_Target</option>'
    $.ajax({
        type: "POST",
        url: admin_url + url,
        dataType: "JSON",
        success: function (data) {
            $.each(data, function (key, item) {
                options += '<option value=' + item.model_name + '>' + item.model_name + '</option>'
                $('#model').html(options);
            })
        }, error: function () {
            $('#model').html('<option value="">No Data found</option>');
        }
    })
}
let selectRole = function () {
    $('#emp_type').change(function () {
        $('.tableRow').remove()
            let $html = "";
            $.ajax({
                type: "POST",
                url: admin_url + 'AdminArea/list_emp',
                dataType: "JSON",
                data: {emp_type: $('#emp_type').val()},
                success: function (data) {
                    let $i = 1;
                    $.each(data, function (key, item) {
                        $html += '<tr class="tableRow">';
                        $html += '<td>' + $i + '</td>';
                        $html += '<td>';
                        $html += '<input type="text" class="form-control commonInput"  name="empID[]" id="empID_' + $i + '" readonly="readonly" value ="' + item.employe_table_employe_id + '" />';
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<input type="text" class="form-control commonInput"  name="empName[]" id="empName_' + $i + '" readonly="readonly" value ="' + item.employe_table_employe_name + '"/>';
                        $html += '</td>';
                        $html += '<td>';
                        $html += '<input type="number" class="form-control commonInput code-char targetQty"  name="targetQty[]" id="targetQty_' + $i + '" placeholder="Enter Quantity" min="1"/>';
                        $html += '</td>';
                        $html += '</tr>';
                        $i++
                    })
                    $('#contentTable').html($html);

                }, error: function () {
//                $html += '<tr class="tableRow">';
//                $html += '<td></td>';
//                $html += '<td>No</td>';
//                $html += '<td>Data</td>';
//                $html += '<td>Found</td>';
//                $html += '</tr>';
//                $('#contentTable').html($html);
                    toastr.error("No Data Found!!!");
                }
            })
        
    })
}
create_target = function () {
    let date = formatDate($('#expdate').val())
    let model = $("#model option:selected").text();
    this.formId = $('.saveForm').attr('id');
    this.form = document.getElementById(this.formId);
    this.formData = new FormData(this.form);
    this.formData.append('model', model);
    this.formData.append('date', date);

    if (validate()) {
        let data = new FormData(this.form);
        $.ajax({
            url: admin_url + 'AdminArea/set_target',
            method: 'post',
            data: this.formData,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#targetFrm")[0].reset();
                $('.tableRow').remove()
                $('#expdate').val(lastDayDate())
                if (data.response == true) {
                    toastr.success(data.message);
                } else {
                    toastr.error(data.message)
                }

            }, error: function () {
                toastr.error("some error occered try agian");
            }
        })
    } else {
        console.log('not ready')
        return false
    }


}

let validate = function () {
    let validation = false;
    if ($('.targetQty').length == 0) {
        toastr.error("No Data To Insert");
        validation = false
    } else if ($('#expdate').val() == "") {
        validation = false;
    } else {
        validation = true;
    }
    return validation
}

let dateFormater = function (field, value) {
    $("#" + field).change(function () {
        var date = $(this).datepicker("getDate");
        day = date.getDate(),
                month = date.getMonth() + 1,
                year = date.getFullYear();
        formatdate = year + '-' + month + '-' + day
        $('#' + value).val(formatdate)
    });
}
let getTargetReport = function (url) {
    $(".targetBtn").each(function () {
        $(this).on("click", function () {
            $('.tableRow').remove()
            let id = $(this).attr('data-id');
            let SfromDate = formatDate($('#repDate').val())
            let field = $(this).attr('data-field');
            $.ajax({
                url: admin_url + url,
                method: 'post',
                dataType: 'json',
                data: {
                    id: id,
                    SfromDate: SfromDate,
                    field: field
                },
                success: function (data) {
                    let $html = '';
                    if (data != 'No Record Found') {
                        $.each(data, function (key, val) {
                            $html += '<tr class="tableRow">';
                            $html += '<td class="text-dark">' + val.varient + '</td>';
                            $html += '<td>' + val.target + '</td>';
                            $html += '<td>' + val.achived + '</td>';
                            $html += '<td class="text-danger">' + val.differnce + '</td>';
                            $html += '</tr>';
                        })
                        $('#modelDetails').html($html)
                    } else {
                        toastr.error(data);
                    }



                },
                error: function () {
                    $('.tableRow').remove()
                    console.log('error')
                }
            })
        });
    });


}
//let selectRoles = function () {
//    $('#emp_type').change(function () {
//        let $html = "";
//        $.ajax({
//            type: "POST",
//            url: admin_url + 'AdminArea/list_emp',
//            dataType: "JSON",
//            data: {emp_type: $('#emp_type').val()},
//            success: function (data) {
//                $('.tableRow').remove();
//                let $i = 1;
//                $.each(data, function (key, item) {
//
//                    $html += '<tr class="tableRow">';
//                    $html += '<td>' + $i + '</td>';
//                    $html += '<td>';
//                    $html += '<input type="text" class="form-control commonInput"  name="empID[]" id="empID_' + $i + '" readonly="readonly" value ="' + item.employe_table_employe_id + '" />';
//                    $html += '</td>';
//                    $html += '<td>';
//                    $html += '<input type="text" class="form-control commonInput"  name="empName[]" id="empName_' + $i + '" readonly="readonly" value ="' + item.employe_table_employe_name + '"/>';
//                    $html += '</td>';
//                    $html += '<td>';
//                    $html += '<input type="checkbox" class="form-control selectedBox select_all"  name="selected[]" id="selected_' + $i + '"> '
//                    $html += '</td>';
//                    $html += '</tr>';
//                    $i++
//                })
//                $('#genRepTable').html($html);
//
//            }, error: function () {
//                console.log('No data found')
//            }
//        });
//    })
//    dateFormater('repToDate', 'data_report_to')
//    dateFormater('repFromDate', 'data_report_from')
//    $('#genRep').click(function () {
//        $('.selectedBox').each(function () {
//            if ($(this).not(':checked').length) {
//                $(this).closest('tr').remove()
//            }
//        })
//    })
//}

let formatedDate = function (value) {
    let datevalue = value.split('/');
    let day = datevalue[1]
    let month = datevalue[0]
    let year = datevalue[2]
    date = year + '-' + month + '-' + day
    return date

}
let currentDate = function () {
    var d = new Date();

    var month = d.getMonth() + 1;
    var day = d.getDate();

    var output = d.getFullYear() + '-' +
            (month < 10 ? '0' : '') + month + '-' +
            (day < 10 ? '0' : '') + day;
    return output
}
