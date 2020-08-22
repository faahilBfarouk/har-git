$(document).ready(function () {
            $('.select2').select2()
            loadDefaults('sales/loadStock')
            $('.buttonss').hide()
        })
        loadDefaults = function (url) {
            $.ajax({
                url: admin_url + url,
                dataType: 'json',
                success: function (data) {
                    $.each(data['models']['stock'], function (key, val) {
                        let models = new Option(val.model_name, val.model_name);
                        $('#selectModel').append(models).trigger('change')

                    })
                    $.each(data['models']['status'], function (key, val) {
                        let status = new Option(val.status, val.status_id);
                        $('#statusFilter').append(status).trigger('change')
                    })
                    $('#selectModel').on('select2:select', function (e) {
                        $('.empty').empty()
                        $('#productCode').val("");
                        $('#colorCode').val("");
                        $('.buttonss').hide()
                        let varient = new Option('Select Varient', '0')
                        $('#selectVarient').append(varient).trigger('change')
                        $.ajax({
                            url: admin_url + 'sales/loadVarient',
                            method: 'post',
                            dataType: 'json',
                            data: {model: e.params.data.text},
                            success: function (data) {
                                $.each(data['varient'], function (key, val) {
                                    varient = new Option(val.variant, val.variant)
                                    $('#selectVarient').append(varient).trigger('change')
                                })
                                $('#selectVarient').on('select2:select', function (e) {
                                    let model = $('#selectModel').val();
                                    let varient = e.params.data.text

                                    $.ajax({
                                        url: admin_url + 'sales/model',
                                        method: 'post',
                                        dataType: 'json',
                                        data: {model: model, varient: e.params.data.text},
                                        success: function (data) {
                                            $('#productCode').val(data[0].product_code);
                                            $('#Colour').empty();
                                            $('#colorCode').val("");
                                            let color = new Option('Select Colour', '0')
                                            $('#Colour').append(color).trigger('change');
                                            $.ajax({
                                                url: admin_url + 'sales/colors',
                                                method: 'post',
                                                dataType: 'json',
                                                data: {model: data[0].product_code},
                                                success: function (data) {
                                                    $('#Colour').empty();
                                                    let color = new Option('Select Colour', '0')
                                                    $('#Colour').append(color).trigger('change');
                                                    $.each(data, function (key, val) {
                                                        color = new Option(val.text, val.id)
                                                        $('#Colour').append(color).trigger('change');
                                                    })
                                                    $('#Colour').on('select2:select', function (e) {
                                                        $('#colorCode').val(e.params.data.id);
                                                        $('#colorName').val(e.params.data.text);
                                                    })
                                                    $('#checkAvailableBtn').click(function () {
                                                        $('#bookBtn').hide()
                                                        $('#createDemandBtn').hide()
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
                                                                    console.log('A'+data['avail'].length)
                                                                    console.log('P'+data['pdi'].length)
                                                                    console.log('M'+data['mark'].length)
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
                                                                    } else  {
                                                                        $('#bookBtn').hide()
                                                                        $('#createDemandBtn').hide()
                                                                    }

                                                                }

                                                            }
                                                        })
                                                    })
                                                }
                                            })
                                        }
                                    })

                                })
                            }
                        })

                    })
                }

            })
        }
