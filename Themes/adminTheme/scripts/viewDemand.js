$(document).ready(function(){
    loadDataTable('table','sales/loadDemand')
    
})

function loadDataTable(table, url) {
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
        'paging': true,
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
