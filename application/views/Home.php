<!-- 
Page Structure 
Head.php  -> Contains all Head Files and css Links
<body> tag open
preloader Div open and close
theme-layout div open
AccountPopupSec
Header
SliderWraper
Horizontalsearch
BlockRemoveTop
Block
Footer
theme-layout div Close
Scripts .php
Body tag close
ClosingTag any custom linsk to be added bellow script or body tag
-->
<?php require_once 'Head.php'; ?>
<body>
    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>
        <?php require_once 'SliderWraper.php'; ?>
        <?php require_once 'Horizontalsearch.php'; ?>
        <?php require_once 'Block.php'; ?> 
        <?php require_once 'BlockRemoveTop.php'; ?>
          
        <?php require_once 'Footer.php'; ?>
    </div>
    <?php require_once 'Scripts.php'; ?>
</body>
<?php require_once 'ClosingTag.php'; ?>