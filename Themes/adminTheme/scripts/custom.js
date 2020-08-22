
let admin_themes = 'https://codingmagic.net/harcars/Themes/adminTheme/';
let admin_urls = 'https://codingmagic.net/harcars/admin/';
function demandMessage() {
    console.log(1)
    $.ajax({
        url: admin_urls + 'sales/demandmessage',
        dataType: 'json',
        success: function (data) {
            let $msg = '';
            let $msgBox = '';
            if (data.total != 0) {
                $msg += '<li class="dropdown">';
                $msg += '<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">';
                $msg += '<i class="fa fa-envelope" id="env"></i>';
                $msg += '</a>';
                $msg += '<ul class="dropdown-menu dropdown-messages" id="dropdown-messages">';
                $msg += '</ul>';
                $msg += '</li>';
                $msg += '<li>';
                $msg += '<span class="m-r-sm text-muted welcome-message"><i class="fa fa-user-o"></i> ' + data['values'][0]['user_emp_name'] + '</span>';
                $msg += '</li>';
                $msg += '<li>';
                $msg += '<span class="text-muted text-xs block"><i class="fa fa-id-badge"></i> ' + data['values'][0]['user_emp_id'] + ' </span>';
                $msg += '</li>';
                $('#messageaarea').html($msg)
                
                for (let i = 1; i < 5; i++) {
                    $msgBox += '<li>';
                    $msgBox += '<div class="dropdown-messages-box">';
                    $msgBox += '<a class="dropdown-item float-left" href="profile.html">';
                    $msgBox += '<img alt="image" class="rounded-circle" src="' + admin_themes + 'productImages/' + data['values'][i]['img'] + '">';
                    $msgBox += '</a>';
                    $msgBox += '<div class="media-body">';
                    $msgBox += '<small class="float-right">Expiry on ' + data['values'][i]['exp_date'] + '</small>';
                    $msgBox += '<strong>Demand Created for ' + data['values'][i]['stock_demand_prod_name'] + '</strong>. <br>';
                    $msgBox += '<small class="text-muted">' + data['values'][i]['stock_demand_prod_varinet'] + ' ' + data['values'][i]['stock_demand_booked_colour'] + '  by   ' + data['values'][i]['emp'] + '</small>';
                    $msgBox += '</div>';
                    $msgBox += '</div>';
                    $msgBox += '</li>';
                    $msgBox += '<li class="dropdown-divider"></li>';
                }
                $msgBox += '<li>';
                $msgBox += '<div class="text-center link-block">';
                $msgBox += '<a href="' + admin_urls + 'Sales/readAllMsgs" class="dropdown-item">';
                $msgBox += '<i class="fa fa-envelope"></i> <strong>Read All Messages</strong>';
                $msgBox += '</a>';
                $msgBox += '</div>';
                $msgBox += '</li>';
            }

            $('#dropdown-messages').html($msgBox)

            if (data.total > localStorage.getItem('counter')) {
                let newmsg = ''
                let count = data.total - localStorage.getItem('counter')
                $('#env').append('<span class="label label-warning">' + count + '</span>')
                playAudio()
            }
            $('.fa-envelope').click(function () {
                localStorage.setItem("counter", data.total);

                $("span.label-warning").remove();

            })
        }
    }).then(function () {           // on completion, restart
        setTimeout(demandMessage, 30000);  // function refers to itself
    });

}
function localstorage() {
    if (typeof (Storage) !== "undefined") {
        if (localStorage.getItem("counter") === null) {
            localStorage.setItem("counter", 0);
        }

    }
}
function deletestorage() {
    localStorage.removeItem("counter");
}
function playAudio() {
    var x = document.getElementById("myAudio");
    x.play();
} 