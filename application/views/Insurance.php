<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$agent=get_Best_Insurance_Agent();

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KwitaraCars - Bootstrap Cars Dealer Template </title>

    <!-- Styles -->
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/css/bootstrap.min.css")?>' type="text/css" /><!-- Bootstrap -->
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/fonts/font-awesome/css/font-awesome.min.css")?>' type="text/css" /><!-- Icons -->
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/fonts/themify-icons/themify-icons.css")?>' type="text/css" /><!-- Icons -->
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/css/owl.carousel.css")?>' type="text/css" /><!-- Owl Carousal-->
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/css/price-range.css")?>' type="text/css" /><!-- Owl Carousal -->
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/css/style.css")?>' type="text/css" /><!-- Style -->	
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/css/responsive.css")?>' type="text/css" /><!-- Responsive -->	
    <link rel="stylesheet" href='<?=base_url("Themes/cars/dark/css/colors.css")?>' type="text/css" /><!-- color -->	
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href='<?=base_url("Themes/cars/dark/js/rs-plugin/css/settings.css")?>'>
<script>

</script>
<style>

.y-us-section {
    padding: 82px 0 82px;
}
.y-us-head {
    text-align: center;
    margin: 0 0 91px;
}
.y-us-title h2 {
    color: #000;
    font-size: 30px;
    letter-spacing: 0;
    line-height: 32px;
    text-transform: uppercase;
    margin-bottom: 6px;
}
.y-us-title > p {
    color: #777777;
    line-height: 22px;
}
.y-us-title-border {
    background: #ffae11 none repeat scroll 0 0;
    border-radius: 2px;
    display: inline-block;
    height: 3px;
    position: relative;
    width: 50px;
}
.service-3 .service-box {
    margin-bottom: 18px;
}
.service-3 .service-box .iconset {
    float: left;
    text-align: center;
    width: 25%;
}
.service-3 .service-box .iconset i {
    color: #000;
    font-size: 44px;
}
.service-3 .service-box .y-us-content {
    float: left;
    width: 75%;
}
service-3 .service-box .y-us-content h4 {
    color: #3a3a3a;
    font-size: 18px;
    letter-spacing: 0;
    line-height: 22px;
    margin: 14px 0 12px;
    text-transform: uppercase;
}
.service-3 .service-box .y-us-content p {
    color: #777777;
    font-size: 13px;
    font-weight: 300;
    line-height: 24px;
}

.icon {
    color : #f4b841;
    padding:0px;
    font-size:40px;
    border: 1px solid #fdb801;
    border-radius: 100px;
    color: #fdb801;
    font-size: 28px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    width: 70px;
}

/*timeline3*/


.main-timeline3 {
    overflow: hidden;
    position: relative
}

.main-timeline3 .timeline {
    position: relative;
    margin-top: -79px
}

.main-timeline3 .timeline:first-child {
    margin-top: 0
}

.main-timeline3 .timeline-icon,
.main-timeline3 .year {
    margin: auto;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0
}

.main-timeline3 .timeline:after,
.main-timeline3 .timeline:before {
    content: "";
    display: block;
    width: 100%;
    clear: both
}

.main-timeline3 .timeline:before {
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    right: 0;
    z-index: 2
}

.main-timeline3 .timeline-icon {
    width: 210px;
    height: 210px;
    border-radius: 50%;
    border: 25px solid transparent;
    border-top-color: #f44556;
    border-right-color: #f44556;
    z-index: 1;
    transform: rotate(45deg)
}

.main-timeline3 .year {
    display: block;
    width: 110px;
    height: 110px;
    line-height: 110px;
    border-radius: 50%;
    background: #fff;
    box-shadow: 0 0 20px rgba(0, 0, 0, .4);
    font-size: 30px;
    font-weight: 700;
    color: #f44556;
    text-align: center;
    transform: rotate(-45deg)
}

.main-timeline3 .timeline-content {
    width: 35%;
    float: right;
    background: #f44556;
    padding: 30px 20px;
    margin: 50px 0;
    box-shadow: 0 10px 25px -10px rgba(72, 29, 99, .3);
    z-index: 1;
    position: relative
}

.main-timeline3 .timeline-content:before {
    content: "";
    width: 20%;
    height: 15px;
    background: #f44556;
    position: absolute;
    top: 50%;
    left: -20%;
    z-index: -1;
    transform: translateY(-50%)
}

.main-timeline3 .title {
    font-size: 20px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 10px
}

.main-timeline3 .description {
    font-size: 16px;
    color: #fff;
    line-height: 24px;
    margin: 0
}

.main-timeline3 .timeline:nth-child(2n) .timeline-icon {
    transform: rotate(-135deg);
    border-top-color: #e97e2e;
    border-right-color: #e97e2e
}

.main-timeline3 .timeline:nth-child(2n) .year {
    transform: rotate(135deg);
    color: #e97e2e
}

.main-timeline3 .timeline:nth-child(2n) .timeline-content {
    float: left
}

.main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
    left: auto;
    right: -20%
}

.main-timeline3 .timeline:nth-child(2n) .timeline-content,
.main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
    background: #e97e2e
}

.main-timeline3 .timeline:nth-child(3n) .timeline-icon {
    border-top-color: #13afae;
    border-right-color: #13afae
}

.main-timeline3 .timeline:nth-child(3n) .year {
    color: #13afae
}

.main-timeline3 .timeline:nth-child(3n) .timeline-content,
.main-timeline3 .timeline:nth-child(3n) .timeline-content:before {
    background: #13afae
}

.main-timeline3 .timeline:nth-child(4n) .timeline-icon {
    border-top-color: #105572;
    border-right-color: #105572
}

.main-timeline3 .timeline:nth-child(4n) .year {
    color: #105572
}

.main-timeline3 .timeline:nth-child(4n) .timeline-content,
.main-timeline3 .timeline:nth-child(4n) .timeline-content:before {
    background: #105572
}

@media only screen and (max-width:1199px) {
    .main-timeline3 .timeline {
        margin-top: -103px
    }
    .main-timeline3 .timeline-content:before {
        left: -18%
    }
    .main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
        right: -18%
    }
}

@media only screen and (max-width:990px) {
    .main-timeline3 .timeline {
        margin-top: -127px
    }
    .main-timeline3 .timeline-content:before {
        left: -2%
    }
    .main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
        right: -2%
    }
}

@media only screen and (max-width:767px) {
    .main-timeline3 .timeline {
        margin-top: 0;
        overflow: hidden
    }
    .main-timeline3 .timeline:before,
    .main-timeline3 .timeline:nth-child(2n):before {
        box-shadow: none
    }
    .main-timeline3 .timeline-icon,
    .main-timeline3 .timeline:nth-child(2n) .timeline-icon {
        margin-top: -30px;
        margin-bottom: 20px;
        position: relative;
        transform: rotate(135deg)
    }
    .main-timeline3 .timeline:nth-child(2n) .year,
    .main-timeline3 .year {
        transform: rotate(-135deg)
    }
    .main-timeline3 .timeline-content,
    .main-timeline3 .timeline:nth-child(2n) .timeline-content {
        width: 100%;
        float: none;
        border-radius: 0 0 20px 20px;
        text-align: center;
        padding: 25px 20px;
        margin: 0 auto
    }
    .main-timeline3 .timeline-content:before,
    .main-timeline3 .timeline:nth-child(2n) .timeline-content:before {
        width: 15px;
        height: 25px;
        position: absolute;
        top: -22px;
        left: 50%;
        z-index: -1;
        transform: translate(-50%, 0)
    }
}


</style>
</head>
<body>
    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>

<div id="rev_slider-wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" >
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>                        
                <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" 
                    data-saveperformance="on"  data-title="Ken Burns Slide">
                    <!-- MAIN IMAGE -->
                    <img src="<?= IMAGEURL ?>slides/home2.jpg"  alt="2" data-lazyload="<?= IMAGEURL ?>slides/home2.jpg" 
                         data-bgposition="right top" data-kenburns="off" data-duration="12000" 
                         data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" 
                         data-bgpositionend="center bottom">
                    <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                         data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                         data-y="130" data-hoffset="0" data-x="center"
                         style="">
                    </div>
                    
                   

                </li> 


                <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" 
                    data-saveperformance="on"  data-title="Ken Burns Slide">
                    <!-- MAIN IMAGE -->
                    <img src="<?= IMAGEURL ?>slides/home1.jpg"  alt="2" data-lazyload="<?= IMAGEURL ?>slides/home1.jpg" 
                         data-bgposition="right top" data-kenburns="off" data-duration="12000" 
                         data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" 
                         data-bgpositionend="center bottom"> 
                    <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                         data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                         data-y="130" data-hoffset="0" data-x="center"
                         style="">
                    </div>
                    
                  
                    
                    

                </li> 



                <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" 
                    data-saveperformance="on"  data-title="Ken Burns Slide">
                    <!-- MAIN IMAGE -->
                    <img src="<?= IMAGEURL ?>slides/home3.jpg"  alt="2" data-lazyload="<?= IMAGEURL ?>slides/home3.jpg" 
                         data-bgposition="right top" data-kenburns="off" data-duration="12000" 
                         data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" 
                         data-bgpositionend="center bottom"> 
                    <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                         data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                         data-y="130" data-hoffset="0" data-x="center"
                         style="">
                    </div>
                    

                </li> 
            </ul>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
</div><!-- END REVOLUTION SLIDER -->



<section>
<br><br>
<div class="text-center">
<div class="y-us-title">
                            <h2>Claiming Process</h2>
                            <p>As Easy As It Gets</p>
                        </div>
                        </div>
                        <p class="text-danger text-center"><b>------------ </b> </p>
                        
                        <div class="container">
        <h3 class="card-title"></h3>
        <div class="row">
            <div class="col-md-12">

                <div class="main-timeline3">
                <?php  foreach($title[0] as $value): ?>

                    <div class="timeline">
                            <div class="timeline-icon"><span class="year"><?='Step '.$value['process_step_num'] ?></span>
                            </div>
                        <div class="timeline-content">
                         
                        <p class="description"> <?=$value['process_description'] ?> </p>
                           <br><br><br><br>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
                
            </div>
        </div>
</div>
    
<br>


<section class="block">
    <div style="background: transparent url(<?= base_url("Themes/cars/dark/") ?>&quot;img/call-to-action-big.jpg&quot;) repeat scroll 50% 0px; background-attachment: fixed;" class="parallax scrolly-invisible  blackish"></div>
    <div class="container">                
        <div class="row">
            <div class="col-md-12">
                <div class="heading4">
                    <h2>Directly Contact </h2>
                    <span>Our Top Agent</span>
                </div>
                <div class="agents-carousal-sec">
                    <ul class="carousel">
                    <li>
                        <div class="agent-content">
                                <h3>Contact Any Of Our Branches</h3>
                                <p>For Personalised Care And Sincere Help<br>Or Our Top Agent Here! <br><br><a href="<?= base_url("sendemail/index/3") ?>" title="" class="flat-btn">Contact us</a></p>

                                <div class="agent-social-wrap">
                                    
                                </div>
                            </div>
                        </li>
                        
                        <li>
                            <div class="agent-content">
                                <a href="agent.html"><img src="<?= IMAGEURL ?>agents/agent5.jpg" alt="" /></a>
                                <h3><?=$agent[0]['Emp_name'] ?> MR. Niju Should Be Here, After actual emp DB, fetch it</h3>
    <p>                <i class="fa fa-phone" aria-hidden="true"></i> <?=$agent[0]['Emp_mobile'] ?>
                   <br> <i class="fa fa-envelope" aria-hidden="true"></i> <?=$agent[0]['Emp_email'] ?>
</p>
                                <div class="agent-social-wrap">
                                    
                                </div>
                            </div>
                        </li>
                        <li>
                        <div class="agent-content">
                        <a href="<?= base_url("sendemail/index/3") ?>" title="" >
                                <h3>Click To Renew Your Insurance!</h3>
                                <p>Fill Form And Our Agent Will Contact You<br> More Queries? Check Out Maruthi Insurance's <br>
                                </a> 
                                <br><a target ="_blank" href="https://www.marutiinsurance.com/FAQS.aspx" title="" class="flat-btn">FAQ</a></p>

                                <div class="agent-social-wrap">
                                    
                                </div>
                               
                            </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>                
    </div> 
     
               
</section>



<section>

<div class="y-us-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                    <div class="y-us-head">
                        <div class="y-us-title">
                            <h2>Why choose us</h2>
                            <p>We Are Best In Class</p>
                            <span class="y-us-title-border"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <?php  foreach($title[1] as $value): ?>
            
                
                    <div class="y-us-content">
                        <div class="service-3">
                            <div class="service-box">
                                <div class="clearfix">
                                    <div class="iconset">
                                        <span> <img src="<?= base_url("Themes/cars/dark/").$value['choose_icon'] ;?>" alt=""></span>
                                    </div>
                                    <div class="y-us-content">
                                        <h4><?=$value['choose_heading'] ?></h4>
                                        <p><?=$value['choose_desc'] ?></p>
                                       
                                    </div>
                                </div>
                            </div>
            <?php endforeach;?>
                     </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

</section>




        <?php require_once 'Footer.php'; ?>
    </div>
    <?php require_once 'Scripts.php'; ?>
</body>
<?php require_once 'ClosingTag.php'; ?>