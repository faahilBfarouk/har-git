
$(document).ready(function () {
    $(window).keydown(function (event) {
        var codeCharInput = 'input.code-char';
        
        $(codeCharInput).keyup(function(e) {
            if ((e.which == 13 || e.which == 46)) {
                let id = $(this).attr('id').split('_')[1]
                id++
                $('#targetQty_'+id).focus()
            }
        })
        if (event.keyCode == 13) {
            
            event.preventDefault();
            return false;
        }
        
    });
    $('#expdate').val(lastDayDate())
    $(".input-group.date").datepicker();
    get_models('AdminArea/get_models');
    selectEmpWithGroupHierarchy();
    $('#targetFrm').unbind('submit').bind('submit', function () {
        $('.targetQty').each(function () {
            if ($(this).val() == "") {
                $(this).closest('tr').remove()
            }
        })
        create_target()
        return false
    })

});



 