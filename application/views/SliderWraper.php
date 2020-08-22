<div id="rev_slider-wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classicslider1" >
    <div class="tp-banner-container">
        <div class="tp-banner" >
            <ul>  
                <?php foreach (get_sliders(1)as $slider): ?>
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
                        <?= $slider['slider_images_text_1'] ?>
                    </div>
                    <div class="tp-caption tentered_white_huge lfb tp-resizeme" data-endspeed="300" 
                         data-easing="Power4.easeOut" data-start="800" data-speed="600" data-y="320" 
                         data-hoffset="0" data-x="center"
                         style="color: #fff; font-size: 13px; text-transform: uppercase; letter-spacing: 10px;">
                        <i class="fa fa-map-marker"> </i> <?= $slider['slider_images_text_2'] ?> 
                    </div>
                    <div class="tp-caption tentered_white_huge lft tp-resizeme" 
                         data-endspeed="300" data-easing="Power4.easeOut" data-start="400" data-speed="600"
                         data-y="365" data-hoffset="0" data-x="center"
                         style="color: #fff; text-transform: uppercase; font-size: 40px; letter-spacing: 6px;
                         font-family: Montserrat; font-weight: 400;">
                        <?=$slider['slider_images_text_3'] ?>
                    </div>
                    <a href="<?= site_url('Home/Category/all')?>" class="pull-left tp-caption lfb tp-resizeme rs-parallaxlevel-0"
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