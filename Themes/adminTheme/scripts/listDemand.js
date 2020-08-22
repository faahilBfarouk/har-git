$(document).ready(function () {
    $('.buttonss').hide()
    checkAvaliable()
    
})
function checkAvaliable() {
    $('#checkAvailableBtn').click(function () {
        $('#filterText').val($("#statusFilter option:selected").text())
        $('#chassisPopulate').empty()
        $.ajax({
            url: admin_url + 'sales/loadChasisNo',
            method: 'post',
            dataType: 'json',
            data: {
                Prod_Code: $('#productCode').val(),
                Color_Code: $('#colorCode').val(),
                filter: $('#statusFilter').val(),
            },
            success: function (data) {
                console.log(data)
                if (data['chassisNo'].length > 0) {
                    console.log('196')
                    $('#chassisPopulate').empty()
                    $.each(data['chassisNo'], function (key, val) {
                        let chasisNo = new Option(val.Chassis_No, val.Chassis_No)
                        $('#chassisPopulate').append(chasisNo).trigger('change')
                        if ($('#chassisPopulate').val() > 0) {

                        }
                    })
                } else {
                    console.log('204')
                    console.log('A' + data['avail'].length)
                    console.log('P' + data['pdi'].length)
                    console.log('M' + data['mark'].length)
                    $('#chassisPopulate').empty()
                    let chasisNo = new Option('No Vehicles Found', "0");
                    $('#chassisPopulate').append(chasisNo).trigger('change')
                }
                console.log('213')
                if (data['avail'].length < 1 && data['pdi'].length < 1 && data['mark'].length < 1) {
                    console.log('210')
                    $('#bookBtn').hide()
                    $('#createDemandBtn').show()

                } else if ($('#statusFilter').val() == 1) {
                    console.log('216')
                    if (data['avail'].length > 0) {
                        console.log('218')
                        $('#bookBtn').show()
                        $('#createDemandBtn').hide()
                    } else {
                        console.log('222')
                        $('#bookBtn').hide()
                        $('#createDemandBtn').hide()
                    }

                } else if ($('#statusFilter').val() == 2) {
                    //console.log('datalemngth :' + data['total'].length)
                    if (data['avail'].length > 0 || data['pdi'].length > 0) {

                        $('#bookBtn').hide()
                        $('#createDemandBtn').hide()
                    } else {
                        $('#bookBtn').hide()
                        $('#createDemandBtn').show()
                    }

                } else if ($('#statusFilter').val() == 5) {
                    //console.log('datalemngth :' + data['total'].length)
                    if (data['pdi'].length > 0) {

                        $('#bookBtn').show()
                        $('#createDemandBtn').hide()
                    } else {
                        $('#bookBtn').hide()
                        $('#createDemandBtn').hide()
                    }

                }

            }
        });
    })
}
