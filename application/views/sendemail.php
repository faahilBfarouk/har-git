<?php require_once 'Head.php'; ?>
<?php
    $id =  $this->uri->segment(3);
   
   $services= populate_dropdown("services","services_status");
   $selected = select_dropdown("services","services_id",$id,"services_status")

?>
<body>

    <!-- /.preloader -->
    <div id="preloader"></div>
    <div class="theme-layout">
        <?php require_once 'AccountPopupSec.php'; ?>
        <?php require_once 'Header.php'; ?>





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
                                                <input type="text" name="Ph_Num" class="form-control" placeholder="Phone Number">
                                            </div>  </div>
                                                                                            
                                                                                            <div class="col-md-12">
                                                                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Select Service</label>
                            
                                                <select class="form-control" name="service" >
                                                <?php if($id==NULL) {
                                                echo "<option value='0'>Select Service</option>";}
                                                else
                                                echo "<option value=".$selected[0]['services_id'].">".str_replace('_', ' ', $selected[0]['services_name'])."</option>" ;
                                                 
                                                ?>                                                           
                                                 
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
<?php require_once 'ClosingTag.php'; ?>