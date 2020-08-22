<?php require_once 'Head.php'; ?>
<body>
    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>
        <section class="box-slider-search">
            <div class="container">
                <h1 class="nocontent outline">--- Search form  ---</h1>
                <div class="row">
                    <div class="col-md-8">
                        <div id="rev_slider-wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" >
                            <div class="tp-banner-container">
                                <div class="tp-banner" >
                                    <ul>  
                                        <?php foreach (get_sliders(4) as $slider): ?> 
                                            <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" 
                                                data-saveperformance="on"  data-title="Ken Burns Slide">
                                                <!-- MAIN IMAGE -->
                                                <img src="<?= IMAGEURL.$slider['slider_images_url'] ?>"  alt="2" data-lazyload="<?= IMAGEURL.$slider['slider_images_url'] ?>" 
                                                     data-bgposition="right top" data-kenburns="off" data-duration="12000" 
                                                     data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" 
                                                     data-bgpositionend="center bottom">
                                                <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                                                     data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                                                     data-y="130" data-hoffset="0" data-x="center"
                                                     style="">
                                                    <img alt="" src="<?= IMAGEURL.$slider['slider_alt_img_url'] ?>" style="width: 110px; height: 110px;">
                                                </div>
                                                <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                                                     data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                                                     data-y="272" data-hoffset="0" data-x="center"
                                                     style="color: #fff; text-transform: uppercase; font-size: 40px; letter-spacing: 6px;
                                                     font-weight: 400;">
                                                    Mercedes-Benz
                                                </div>
                                                <div class="tp-caption tentered_white_huge lfb tp-resizeme" data-endspeed="300" 
                                                     data-easing="Power4.easeOut" data-start="800" data-speed="600" data-y="320" 
                                                     data-hoffset="0" data-x="center"
                                                     style="color: #fff; font-size: 13px; text-transform: uppercase; letter-spacing: 10px;">
                                                    <i class="fa fa-map-marker"> </i> Not caroliana 234 
                                                </div>
                                                <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                                                     data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                                                     data-y="365" data-hoffset="0" data-x="center"
                                                     style="color: #fff; text-transform: uppercase; font-size: 40px; letter-spacing: 6px;
                                                     font-family: Montserrat; font-weight: 400;">
                                                    345000 $
                                                </div>
                                                <a href="<?= site_url('home/true_value') ?>" class="pull-left tp-caption lfb tp-resizeme rs-parallaxlevel-0"
                                                   data-x="center"
                                                   data-y="420"
                                                   data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0;
                                                   scaleY:0;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
                                                   data-speed="500"
                                                   data-start="1200"
                                                   data-easing="Power3.easeInOut"
                                                   data-splitin="none"
                                                   data-splitout="none"
                                                   data-elementdelay="0.1"
                                                   data-endelementdelay="0.1"
                                                   data-linktoslide="next"
                                                   style="z-index: 12; max-width: auto; max-height: auto; white-space: nowrap;padding:15px 28px;
                                                   color: #fff;text-transform: uppercase;
                                                   border: none; background:#000;
                                                   font-size: 12px; letter-spacing: 3px;
                                                   font-family: Montserrat; border-radius: 0px;
                                                   display: table; transition: .4s;">More Details</a>

                                            </li> 
                                        <?php endforeach; ?>


                                    </ul>
                                    <div class="tp-bannertimer"></div>
                                </div>
                            </div>
                        </div><!-- END REVOLUTION SLIDER -->
                    </div>

                    <div class="col-md-4">
                        <div class="horizontal-search v-f-p"> 
                            <div class="search-form"> 
                                <h1 class="fsearch-title">
                                    <i class="fa fa-search"></i><span>SEARCH FOR VEHICLES</span>
                                </h1>

                                <form action="vehiculs.html"  method="get" class="form-inline">   
                                    <div class="search-form-content">
                                        <div class="search-form-field">  
                                            <div class="form-group col-md-12">
                                                <div class="label-select">
                                                    <select class="form-control" name="s_location">
                                                        <option>Any Manufacturer</option>
                                                        <?php foreach (list_cars('brands','brands_status') as $value):?>
                                                        <option value="<?=$value['brands_table_id'] ?>"><?=$value['brands_name'] ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <div class="label-select">  
                                                    <select class="form-control" name="anymodule">
                                                        <option>Any Model </option>
                                                        <option value="1">R8</option>
                                                        <option value="2">S500</option>
                                                        <option value="3">540i</option>
                                                        <option value="4">RX300</option>
                                                        <option value="5">Navigator</option>
                                                        <option value="6">Taurus</option>
                                                        <option value="7">Doblo</option>
                                                        <option value="8">Viper</option>
                                                    </select>
                                                </div>
                                            </div>  

                                            <div class="form-group col-md-12">
                                                <div class="label-select">
                                                    <select class="form-control" name="s_location"> 
                                                        <option>Any locations</option>
                                                        <?php foreach (list_cars('branches','Br_Status') as $value):?>
                                                        <option value="<?=$value['Br_ID'] ?>"><?=$value['Br_Place'] ?></option>
                                                        <?php endforeach;?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-md-12">
                                                <div class="label-select"> 
                                                    <select class="form-control" name="s_statu">
                                                        <option>Any Status </option>
                                                        <option value="damaged">Damaged</option>
                                                        <option value="new">New</option>
                                                        <option value="semi-new">Semi-New</option>
                                                        <option value="used">Used</option>
                                                    </select>
                                                </div>
                                            </div> 

                                            <div class="form-group col-md-12">
                                                <span class="gprice-label">Price Range</span>
                                                <input type="text" class="span2" value="" data-slider-min="0" 
                                                       data-slider-max="60000" data-slider-step="5" 
                                                       data-slider-value="[0,60000]" id="price-range" >
                                            </div>
                                            <div class="form-group col-md-12">
                                                <span class="garea-label">Mileage Range</span> 
                                                <input type="text" class="span2" value="" data-slider-min="0" 
                                                       data-slider-max="60000" data-slider-step="5" 
                                                       data-slider-value="[50,60000]" id="vehicul-geo" >
                                            </div>                                            
                                        </div> 
                                    </div>
                                    <div class="search-form-submit">
                                        <button type="submit" class="btn-search">Search</button>
                                    </div>
                                </form>
                            </div><!-- Services Sec -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="block remove-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading4">
                            <h2>RECENT VEHICULS </h2>
                            <span>Lorem ipsum dolor</span>
                        </div>
                        <div class="vehiculs-sec">
                            <div class="carousel-prop">
                                <?php foreach($cars as $car):?>
                                <div class="vehiculs-box">
                                    <div class="vehiculs-thumb">
                                        <img src="<?= base_url("Themes/cars/dark/".$car['true_value_product_image']) ?>" alt="" /> 
                                        <span class="spn-status"> <?=$car['true_value_car_condition']?></span>
                                                                               
                                        <div class="user-preview">
                                            <a class="col" href="<?= base_url("Home/true_value/car") ?>">
                                                
                                            </a> 
                                        </div>
                                        <a class="proeprty-sh-more" href="<?= base_url("Home/true_value/car") ?>"><i class="fa fa-angle-double-right"> </i><i class="fa fa-angle-double-right"> </i></a>
                                        <p class="car-info-smal">
                                            <?=$car['true_value_product_name'];?><br>
                                            <?=$car['true_value_product_brand'];?><br>
                                            <?=$car['true_value_product_fuel'];?><br>
                                            <?=$car['true_value_product_mfg_year'];?><br>
                                            <?=$car['true_value_product_kilometers'];?><br>
                                        </p>
                                    </div>
                                    <h3><a href="<?= base_url("Themes/cars/dark/") ?>vehicul.html" title="Mercedes-Benz">Mercedes-Benz<?=$car['true_value_product_name'];?>?></a></h3>
                                    <span class="price"><?=$car['true_value_product_price'];?></span>
                                </div>
                                <?php endforeach; ?>
                                 
                            </div><!-- Carousel -->
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


