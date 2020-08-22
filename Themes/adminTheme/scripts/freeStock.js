$(document).ready(function () {
    let freestock = new loadDefaults
    freestock.selectBox('sales/get_status');
    freestock.listStock('sales/get_stock_sum')
});
let loadDefaults = function () {
    this.selectBox = function (url) {
        $.ajax({
            url: admin_url + url,
            dataType: 'json',
            success: function (data) {
                let options = '';
                $.each(data['status'], function (key, item) {
                    options += '<option value=' + item.status_id + '>' + item.status + '</option>'
                    $('#statusFilter').html(options);
                })
            }
        });
    }
    this.listStock = function (url) {
        loadModel(1)
        $('#statusFilter').change(function () {
            loadModel($('#statusFilter').val())
        })
        function loadModel(filter) {
            $.ajax({
                url: admin_url + url,
                dataType: 'json',
                method: 'POST',
                data: {
                    filter: filter
                },
                success: function (data) {
                    let modelhtml = "";
                    $.each(data, function (key, val) {
                        modelhtml += '<tr>'
                        modelhtml += '<td>' + key + '</td>'
                        modelhtml += '<td>' + val + '</td>'
                        modelhtml += '<td><button class="btn btn-success varient "  name="varient"  data-toggle="modal" data-target="#varSplitModal" data-id="' + key + '" type="button">Variants</button></td>'
                        modelhtml += '<td><button class="btn btn-success colourSplitBtn " name="colourSplitBtn[]"  data-toggle="modal" data-target="#colourModal" data-id="' + key + '" type="button">Colours</button></td>'
                        modelhtml += '<td><button class="btn btn-success location " name="location"  data-toggle="modal" data-target="#locStatModal" data-id="' + key + '" type="button">Location</button></td>'
                        modelhtml += '</tr>'
                    })
                    $('#freeStockBody').html(modelhtml)
                    loadvarients('sales/loadVarients')
                    loadcolor('sales/loadcolor')
                    loadlocation('sales/loadlocation')
                }
            });
        }
        function loadvarients(url) {
            $('.varient').click(function () {
                $('.variantRow').remove()
                let id = $(this).attr('data-id')
                $.ajax({
                    url: admin_url + url,
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        id: id,
                        filter: $('#statusFilter').val()
                    },
                    success: function (data) {
                        let html = ''
                        $.each(data, function (key, val) {
                            html += '<tr variantRow>'
                            html += '<td>' + key + '</td>'
                            html += '<td>' + val + '</td>'
                            html += '</tr>'
                        })
                        $('#varSplitTableBody').html(html)
                    }
                });
            })
        }
        function loadcolor(url) {
            $('.colourSplitBtn').click(function () {
                let id = $(this).attr('data-id')
                $('.colorRow').remove();
                $.ajax({
                    url: admin_url + url,
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        id: id,
                        filter: $('#statusFilter').val()
                    },
                    success: function (data) {
                        let locHtml = '';
                        $.each(data, function (key, val) {
                            locHtml += '<tr class="colorRow">';
                            locHtml += '<td>' + key + '</td>';
                            locHtml += '<td>' + val + '</td>';
                            locHtml += '</tr>';

                        })
                        $('#colourModalTableBody').html(locHtml)
                    }
                });
            })
        }
        function loadlocation(url) {
            $('.location').click(function () {
                let id = $(this).attr('data-id')
                $('.locationRow').remove();
                $.ajax({
                    url: admin_url + url,
                    dataType: 'json',
                    method: 'POST',
                    data: {
                        id: id,
                        filter: $('#statusFilter').val()
                    },
                    success: function (data) {
                        console.log(data)
                        let locationHtml = '';
                        $.each(data, function (key, val) {
                            locationHtml += '<tr class="locationRow">';
                            locationHtml += '<td>' + key + '</td>';
                            locationHtml += '<td>' + val + '</td>';
                            locationHtml += '</tr>';

                        })
                        $('#locStatModalTableBody').html(locationHtml)
                    }
                });
            })
        }
    }
}
