$(document).ready(function () {
    $(".input-group.date").datepicker();
    dateFormater('repToDate', 'data_report_to')
    dateFormater('repFromDate', 'data_report_from')
    getTargetReport('AdminArea/get_model_report')
    selectRoles()
    selectAll()
    $('#genRep').click(function () {
        $('.selectedBox').each(function () {
            if ($(this).not(':checked').length) {
                $(this).closest('tr').remove()
            }
        })
        if(!validateForm()){
            return false
        }
    })
});

let selectRoles = function () {
    $('#emp_type').change(function () {
        let $html = "";
        $.ajax({
            type: "POST",
            url: admin_url + 'AdminArea/list_emp',
            dataType: "JSON",
            data: {emp_type: $('#emp_type').val()},
            success: function (data) {
                $('.tableRow').remove();
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
                    $html += '<input type="checkbox" class="form-control selectedBox select_all"  name="selected[]" id="selected_' + $i + '"> '
                    $html += '</td>';
                    $html += '</tr>';
                    $i++
                })
                $('#genRepTable').html($html);

            }, error: function () {
                console.log('No data found')
            }
        });
    })


}
let selectAll = function () {
    $('#selecte_al1').click(function () {
        if ($(this).prop("checked")) {
            $(".select_all").prop("checked", true);
        } else {
            $(".select_all").prop("checked", false);
        }
    });
    $('.checkBox').click(function () {
        if ($(".select_all").length == $(".checkBox:checked").length) {
            //if the length is same then untick 
            $("#select_all").prop("checked", false);
        } else {
            //vise versa
            $("#select_all").prop("checked", true);
        }
        $('.checkBox').click(function () {
            if ($(".checkBox").length == $(".checkBox:checked").length) {
                //if the length is same then untick 
                $("#selecte_al1").prop("checked", false);
            } else {
                //vise versa
                $("#selecte_al1").prop("checked", true);
            }
        });
    }
    );
}
validateForm = function () {
    valid = false;
    if ($('#emp_type').val() == "") {
        valid = false
        toastr.error("Employee type not selected!!!");
    } else if ($('#data_report_from').val() == "") {
        valid = false
        toastr.error("Starting Date not selected!!!");
    } else if ($('#data_report_to').val() == "") {
        valid = false
        toastr.error("Ending Date not selected!!!");
    } else if ($(".selectedBox").length == 0) {
        valid = false
        toastr.error("No select Box selected!!!");
    } else {
        valid = true;
    }
    return valid;
}
