<audio id="myAudio">
    <source src="<?= ADMINTHEME ?>audio/iphone-sms-tunes-128k-50941.mp3" type="audio/mpeg">
</audio>
<script src="<?= ADMINTHEME ?>js/jquery-3.1.1.min.js"></script>
<script src="<?= ADMINTHEME ?>js/popper.min.js"></script>
<script src="<?= ADMINTHEME ?>js/bootstrap.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/dataTables/datatables.min.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="<?= ADMINTHEME ?>js/inspinia.js"></script>
<script src="<?= ADMINTHEME ?>js/plugins/pace/pace.min.js"></script>
<script src="<?= ADMINTHEME ?>scripts/Notification.js"></script>
<script>
    let admin_themes = 'https://codingmagic.net/harcars/Themes/adminTheme/';
    let admin_urls = 'https://codingmagic.net/harcars/admin/';
    let admin_theme = 'https://codingmagic.net/harcars/Themes/adminTheme/';
    $(document).ready(function () {
        demandMessage()
        
        $('#logoutfull').click(function () {
            deletestorage()
        })
    })

</script>