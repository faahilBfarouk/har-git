const admin_url = 'https://codingmagic.net/harcars/admin/';
Dropzone.autoDiscover = false;
$(document).ready(function () {
    let dataTable = tables('AdminArea/listStock', 'Har Cars Stock Report');
    $(".btn").click(function () {

        var dataTable = table
                .rows()
                .data();
        console.log( 'The table has '+dataTable.length+' records' );
    });




})



function tables(url, heading) {
    table = $('.dataTable').DataTable({
        'pageLength': 25,
        'responsive': true,
        'dom': '<"html5buttons"B>lTfgitp',
        'buttons': [
            {extend: 'copy', title: heading},
            {extend: 'csv', title: heading},
            {extend: 'excel', title: heading},
            {extend: 'pdf', title: heading},
            {extend: 'print', title: heading,
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');
                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                }
            }
        ],
        'paging': true,
        'lengthChange': false,
        'searching': true,
        'ordering': true,
        'info': true,
        'autoWidth': false,
        'ajax': admin_url + url,
        'order': []
    });
}