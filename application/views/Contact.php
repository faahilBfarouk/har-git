
<?php 
$Counter = 1;
$branches = get_Contact();

$services= populate_dropdown("services","services_status");

?>
<?php require_once 'Head.php'; ?>
<body>

    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        
        
    <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>     

        
        <?php require_once 'onePicSliderTop.php'; ?> 
        Contact Us
        <?php require_once 'onePicSliderBottom.php'; ?> 

    <section class="block">

    <div style="background: url(<?= base_url("Themes/cars/dark/").$head[0]['Br_img'] ;?>) repeat scroll 50% 422.28px transparent; background-attachment: fixed;" class="parallax scrolly-invisible  blackish"></div><!-- PARALLAX BACKGROUND IMAGE -->	
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="vehiculs-text-bar">

                <blockquote>
                     
                <p>
                <h1>Head Office</h1>
                <h1> <?=$head[0]['Br_Place'] ?>
                    </h1>
                    <span><?=$head[0]['Br_addr'] ?> <br>
                    <i class="fa fa-phone" aria-hidden="true"></i> <?=$head[0]['Br_Ph1'] ?>
                    <br>
                    <?php
                   if (!$head[0]['Br_Ph2']==''){
                   echo '<i class="fa fa-phone" aria-hidden="true"></i>';
                   
                   echo $head[0]['Br_Ph2'];
                    echo "<br>";
                   }
                   if (!$head[0]['Br_Email']==''){
                    echo '<i class="fa fa-envelope" aria-hidden="true"></i>';
                    echo $head[0]['Br_Email'];
                     echo "<br>";
                    }
                    
                    ?>
                    </span>
                    </p>
                
                
                
                <iframe src="<?=$head[0]['Br_gMap'] ?>" frameborder="0"></iframe>
                
               
          
    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
    

<section class="block remove-top">
        <br>
        <div class="heading4">
                    <h2>Branches </h2>
                    <span>Find One Near You!</span>
        </div>
              

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="vehiculs-sec">
                    <div class="row">
                        <?php foreach($branches as $branch): ?> <!-- Change class="col-md-x" where x can be 12,6,8,4 depending on size in bootstrap -->
                        <div class="col-md-3">
                                        <div class="vehiculs-box">
                                            <div class="vehiculs-thumb">
                                            <iframe src="<?=$branch['Br_gMap'] ?>" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                                                

                                                <div class="user-preview">
                                                    
                                                </div> 
                                                <a id="myiFrame" class="proeprty-sh-more" href="<?=$branch['Br_clickable_map'] ?>"><i class="fa fa fa-map-marker"> </i></a>
                                               
                                                <p class="car-info-smal">
                                                <?=$branch['Br_addr'] ?><br>
                                                
                                        
                                        <i class="fa fa-phone" aria-hidden="true"></i> <?=$branch['Br_Ph1'] ?>
                            <br>
                            <?php
                            if (!$branch['Br_Ph2']==''){
                            echo '<i class="fa fa-phone" aria-hidden="true"></i>';
                            
                            echo $branch['Br_Ph2'];
                                echo "<br>";
                            }
                            if (!$branch['Br_Email']==''){
                                echo '<i class="fa fa-envelope" aria-hidden="true"></i>';
                                echo $branch['Br_Email'];
                                echo "<br>";
                                }
                                
                                ?>
                                        </p>
                                            </div>
                                            <span class="price"><?=$branch['Br_Place'] ?></span>
                                            
                                        </div><!-- prop Box -->
                        </div> 
                        <?php endforeach;?>
                    </div>
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
                            <h2></h2>
                        </div>
                        <div class="contact-page-sec">
                            <div class="row">
                                <div class="col-md-6 column">
                                <?php require_once "alertSuccess.php" 
                            ?>
                                                   
                                        <div class="contact-form">
          <form method="post" action="<?php echo base_url(); ?>sendemail/send" enctype="multipart/form-data">
                                       
                                            <div class="row">
                                                <div class="col-md-12">
                                                <div class="form-group">
                                                <label for="exampleFormControlInput1">Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Full Name">
                                            </div>   </div>
                                                                                            <div class="col-md-12">
                                                                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Email address</label>
                                                <input type="email" name="email" class="form-control" placeholder="name@example.com">
                                            </div>  </div>
                                            <div class="col-md-12">
                                                                                            <div class="form-group">
                                                <label for="exampleFormControlInput1">Phone Number</label>
                                                <input type="email" name="email" class="form-control" placeholder="Phone Number">
                                            </div>  </div>
                                                                                            
                                                                                            <div class="col-md-12">
                                                                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Service</label>
                            
                                                <select class="form-control" name="service" >
                                                <option value="1"> Please Select Service</option>                                                            
                                                <?php  foreach($services as $service): ?>
                                                
                                                <option value="<?=$service['services_id'] ?>"><?= str_replace('_', ' ', $service['services_name']) ?></option>            
                                               
                                                <?php endforeach;?>
                                                </select>
                                            </div>                                                </div>
                                            <div class="col-md-12">
                                                                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">Query/Message</label>
                                                <textarea class="form-control" name="message" rows="3"></textarea>
                                            </div>  </div>                             
                                                <div class="col-md-12">
                                                    <input type="submit" name="submit" value="Submit" class="flat-btn">
                                                </div>
                                            </div>
                                        </form>
                                    </div>    
                                </div>
                                <div class="col-md-6 column">
                                 PUT BEST AGENT'S CONTACT!!!  
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
