<?php 
    $types = get_category()[0];
    $service = get_category()[1];
?>

<header class="simple-header for-sticky ">
    <div class="top-bar">
        <div class="container">
            <ul class="contact-item">
                <li><i class="fa fa-envelope-o"></i>yourcompnay@email.com</li>
                <li><i class="fa fa-mobile"></i>+1 333 44 555 / +1 333 44 500</li>
            </ul>
            
            <div class="choose-language">
                <a href="#" title="">FR</a>
                <a href="#" title="">DE</a>
                <a href="#" title="">EN</a>
                <a href="#" title="">jp</a>
            </div>
            
        </div>
    </div><!-- Top bar -->
    <div class="menu">
        <div class="container">
            <div class="logo">
                <a href="<?= base_url() ?>" title="">
                    <i class="fa fa-get-pocket"></i>
                    <span>Har Cars</span>
                    <strong>SELL VEHICULS</strong>
                </a>
            </div><!-- LOGO -->
            <!-- Signup Disabled
            <div class="popup-client">
                <span><i class="fa fa-user"></i> /  Signup</span>
            </div>
            -->
            <span class="menu-toggle"><i class="fa fa-bars"></i></span>
            <nav>
                <h1 class="nocontent outline">--- Main Navigation ---</h1>
                <ul>
                    <li class="menu-item-has-children mega">
                        <a href="#" title="">SHOWROOM</a>
                        <ul> 
                            <li><a href="<?= base_url('Home/Category/all') ?>" title="">All</a></li> 
                            <?php foreach ($types as $type): ?>
                                <?php $formatedType = str_replace('_', ' ', $type['category_name'])?>
                                <li><a href="<?= base_url('Home/Category/'.$formatedType) ?>" title=""><?= $formatedType?></a></li> 
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="#" title="">SERVICE</a>
                        <ul>
                            <?php foreach ($service as $type): ?>
                            <?php $formatedType = str_replace('_', ' ', $type['services_name'])?>
                            <li><a href="<?= base_url('Home/Services/'.$formatedType) ?>" title=""><?=$formatedType ?></a></li>
                            <?php endforeach; ?>
                            
                        </ul>
                    </li>
                    <li><a href="<?= base_url('Home/News') ?>" title="">NEWS&EVENTS</a></li>
                    <li><a href="<?= base_url('Home/Insurance') ?>" title="">INSURANCE</a></li>
                    <li><a href="<?= base_url('Home/School') ?>" title="">MARUTI DRIVING SCHOOL</a></li>
                    <li><a href="<?= base_url("Home/true_value") ?>" title="">TRUE VALUE</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>