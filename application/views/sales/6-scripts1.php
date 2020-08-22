<!-- Mainly scripts -->
<script src="<?= ADMINTHEME ?>js/jquery-3.1.1.min.js"></script>
<script src="<?= ADMINTHEME ?>js/bootstrap.min.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/dataTables/datatables.min.js"></script>
   

<!-- Custom and plugin javascript -->
<script src="<?= ADMINTHEME ?>js/inspinia.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>


 <script src="<?= ADMINTHEME ?>js/plugins/jasny/jasny-bootstrap.min.js"></script>
 


    <!-- Steps -->
    <script src="<?= ADMINTHEME ?>js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="<?= ADMINTHEME ?>js/plugins/validate/jquery.validate.min.js"></script>

    <!-- DROPZONE -->
    <script src="<?= ADMINTHEME ?>js/plugins/dropzone/dropzone.js"></script>

    <!-- CodeMirror -->
    <script src="<?= ADMINTHEME ?>js/plugins/codemirror/codemirror.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/codemirror/mode/xml/xml.js"></script>
    
   <script src="<?= ADMINTHEME ?>js/plugins/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/fullcalendar/moment.min.js"></script>

    <script src="<?= ADMINTHEME ?>js/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/sweetalert/sweetalert.min.js"></script>
    
    <!-- Peity -->
    <script src="<?= ADMINTHEME ?>js/plugins/peity/jquery.peity.min.js"></script>

    <!-- jqGrid -->
    <script src="<?= ADMINTHEME ?>js/plugins/jqGrid/i18n/grid.locale-en.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/jqGrid/jquery.jqGrid.min.js"></script>
    <script src="<?= ADMINTHEME ?>js/plugins/jquery-ui/jquery-ui.min.js"></script>
    
    <script>
        $(document).ready(function(){
            demandMessage()
        })
    function demandMessage(){
    $.ajax({
        url:'https://codingmagic.net/harcars/admin/sales/demandmessage',
        dataType:'json',
        success:function(data){
            let $msg = '';
            $msg += '<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">'
            $msg +='<i class="fa fa-envelope"></i>  <span class="label label-warning">'+data.length+'</span></a>'
            
        $('#messageaarea').html($msg)
            //console.log(data)
        }
    }).then(function() {           // on completion, restart
       setTimeout(demandMessage, 30000);  // function refers to itself
    });
}
</script>
    