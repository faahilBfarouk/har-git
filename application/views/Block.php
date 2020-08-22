<section class="block">
    <div style="background: url(<?= base_url("Themes/cars/dark/") ?>img/call-to-action-bg.jpg) repeat scroll 50% 422.28px transparent; background-attachment: fixed;" class="parallax scrolly-invisible  blackish"></div><!-- PARALLAX BACKGROUND IMAGE -->	
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="vehiculs-text-bar">
                    <h3>Sell or Rent  <span> vehiculs </span>Quickly ! </h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla ornare porttitor diam<br/> a accumsan justo laoreet suscipit. Maecenas at bibendum nunc</p>
                    <a href="#" title="" class="flat-btn">Joing us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="block">
    <div class="container">
        <div class="heading4">
            <h2>FEATURED VEHICULS</h2>
            <span>Lorem ipsum dolor consectetu</span>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="vehiculs-sec">
                    <div class="row"> 
                        <?php foreach (get_cars()as $cars): ?>
                        <div class="col-md-4">
                            <div class="vehiculs-box">
                                <div class="vehiculs-thumb">
                                    <img src="<?= base_url("Themes/cars/dark/") ?>img/demo/vehicul4.jpg" alt="" />
                                    <span class="spn-status"> Semi-New </span>
                                    <span class="spn-save"> <i class="ti ti-heart"></i> </span>

                                    <div class="user-preview">
                                        <a class="col" href="agent.html">
                                            <img alt="Camilė" class="avatar avatar-small" src="<?= base_url("Themes/cars/dark/") ?>img/4.png" title="Camilė">
                                        </a> 
                                    </div> 
                                    <a class="proeprty-sh-more" href="vehicul.html"><i class="fa fa-angle-double-right"> </i><i class="fa fa-angle-double-right"> </i></a>
                                    <p class="car-info-smal">
                                        Registration 2010<br>
                                        3.0 Diesel<br>
                                        230 HP<br>
                                        Body Coupe<br>
                                        80 000 Miles
                                    </p>
                                </div>
                                <h3><a href="vehicul.html" title="">Mercedes-Benz</a></h3>
                                <span class="price">$444000</span>
                                <span class="rate-it">
                                    <i title="nice" class="ti ti-star star-on-png"></i>&nbsp;
                                    <i title="nice" class="ti ti-star  star-on-png"></i>&nbsp;
                                    <i title="nice" class="ti ti-star star-on-png"></i>&nbsp;
                                    <i title="nice" class="ti ti-star off star-off-png"></i>&nbsp;
                                    <i title="nice" class="ti ti-star off star-off-png"></i> 
                                </span>
                            </div><!-- prop Box -->
                            
                        </div>      
                        <?php endforeach;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="block">
    <div style="background: transparent url(<?= base_url("Themes/cars/dark/") ?>&quot;img/call-to-action-big.jpg&quot;) repeat scroll 50% 0px; background-attachment: fixed;" class="parallax scrolly-invisible  blackish"></div>
    <div class="container">                
        <div class="row">
            <div class="col-md-12">
                <div class="heading4">
                    <h2>OUR AGENTS</h2>
                    <span>Lorem ipsum dolor</span>
                </div>
                <div class="agents-carousal-sec">
                    <ul class="carousel">
                        <li>
                            <div class="agent-content">
                                <a href="agent.html"><img src="<?= base_url("Themes/cars/dark/") ?>img/agents/agent1.jpg" alt="" /></a>
                                <h3>SUPER AGENT</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <br> sed do eiusmod tempor incidid</p>

                                <div class="agent-social-wrap">
                                    <div class="social-list agent-social">
                                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="#" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="agent-content">
                                <a href="agent.html"><img src="<?= base_url("Themes/cars/dark/") ?>img/agents/agent3.jpg" alt="" /></a>
                                <h3>SUPER AGENT</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <br> sed do eiusmod tempor incidid</p>

                                <div class="agent-social-wrap">
                                    <div class="social-list agent-social">
                                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="#" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="agent-content">
                                <a href="agent.html"><img src="<?= base_url("Themes/cars/dark/") ?>img/agents/agent5.jpg" alt="" /></a>
                                <h3>SUPER AGENT</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <br> sed do eiusmod tempor incidid</p>

                                <div class="agent-social-wrap">
                                    <div class="social-list agent-social">
                                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="#" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="agent-content">
                                <a href="agent.html"><img src="<?= base_url("Themes/cars/dark/") ?>img/agents/agent4.jpg" alt="" /></a>
                                <h3>SUPER AGENT</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur <br> sed do eiusmod tempor incidid</p>

                                <div class="agent-social-wrap">
                                    <div class="social-list agent-social">
                                        <a href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                        <a href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                        <a href="#" title="Google +" target="_blank"><i class="fa fa-google-plus"></i></a>
                                        <a href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                        <a href="#" title="Pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>
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

<section class="block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="agents-carousal-sec">
                    <div class="heading4">
                        <h2>OUR PARTNERS </h2>
                        <span>Lorem ipsum dolor</span>
                    </div>
                    <div class="our-clients-sec">
                        <ul class="carousel-client">
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client1.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client2.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client3.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client4.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client5.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client1.jpg" alt="" /></a>
                            </li>
                            <li>
                                <a href="#" title=""><img src="<?= base_url("Themes/cars/dark/") ?>img/clients/our-client3.jpg" alt="" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>