
<html>
    <head>
        <title>dealsonindia</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/jquery-ui.min.css">

        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/custom.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/full_width_animated_layers_004.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/full_width_animated_layers_001.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/slick.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/slick-theme.css">
        <link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/animate.min.css">

        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Lato:400,100,300,400italic,700,100italic,300italic,700italic,900' rel='stylesheet' type='text/css'>
        <script>
                var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
                var basepath = "<?php print Yii::app()->basePath; ?>";
        </script>
        <?php $jquery = Yii::app()->request->baseUrl . '/js/jquery-1.11.3.min.js'; ?>
        <?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
        <?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>


        <script>
                //            this script is for solving error : "Cannot read property 'msie' of undefined"

                jQuery.browser = {};
                (function () {
                    jQuery.browser.msie = false;
                    jQuery.browser.version = 0;
                    if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                        jQuery.browser.msie = true;
                        jQuery.browser.version = RegExp.$1;
                    }
                })();
        </script>
        <style>
            .dropup {
                position: fixed !important;
                width: 100%;
                margin: 0 auto;
                z-index: 5000;
                top: 0;
                background-color: #fff !important;
                padding-bottom: 0px;
                box-shadow: 3px 3px 8px 1px RGBA(0, 0, 0, 0.54);
            }
        </style>
    </head>
    <body>
        <div class="visible-sm visible-xs">
            <div class="has-more">
                <span></span>

            </div>

            <div class="has-sec">

                <div class="panel-group mob-nav" id="accordion">
                    <h1>All Categories</h1>
                    <div class="panel panel-default">
                        <div class="panel-heading c1">
                            <div class="cir"></div>
                            <h4 class="panel-title">
                                <a class="accordion-toggle plus collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel1" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i>Lorem Lispum</a>
                            </h4>

                        </div>
                        <div id="panel1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul>
                                    <li>
                                        <a href="#">Lorem Lispum</a>
                                        <ul>
                                            <li><a href="">Lorem Lispum</a></li>
                                            <li><a href="">Lorem Lispum</a></li>
                                            <li><a href="">Lorem Lispum</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Lorem Lispum</a>

                                    </li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading c2">
                            <div class="cir"></div>
                            <h4 class="panel-title">
                                <a class="accordion-toggle plus collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel2" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i>Lorem Lispum</a>
                            </h4>

                        </div>
                        <div id="panel2" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul>

                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading c3">
                            <div class="cir"></div>
                            <h4 class="panel-title">
                                <a class="accordion-toggle plus collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel3" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i>Lorem Lispum</a>
                            </h4>

                        </div>
                        <div id="panel3" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading c4">
                            <div class="cir"></div>
                            <h4 class="panel-title">
                                <a class="accordion-toggle plus collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel4" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i>Lorem Lispum</a>
                            </h4>

                        </div>
                        <div id="panel4" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading c5">
                            <div class="cir"></div>
                            <h4 class="panel-title">
                                <a class="accordion-toggle plus collapsed" data-toggle="collapse" data-parent="#accordion" href="#panel5" aria-expanded="false"><i class="glyphicon glyphicon-plus"></i>Lorem Lispum</a>
                            </h4>

                        </div>
                        <div id="panel5" class="panel-collapse collapse" aria-expanded="false">
                            <div class="panel-body">
                                <ul>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                    <li><a href="#">Lorem Lispum</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="static_cnt">

            <section class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-2">
                            <a href="<?= Yii::app()->baseUrl ?>"><img class="main-logo" src="<?= Yii::app()->baseUrl ?>/images/logo.png"></a>
                        </div>

                        <div class="col-md-6 col-sm-8 col-xs-10 hidden-sm hidden-xs">
                            <div class="fix">
                                <form class="form-inline" role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/searching/SearchList" method="post">
                                    <div class="form-group">

                                        <input type="text" class="form-controls" name="Keyword" id="search" placeholder="What are you looking for">
                                    </div>
                                    <div class="form-group">

                                        <input type="text" class="form-location" name="location" id="location" placeholder="Enter Your Location">

                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary search-button"><i class="fa fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6" style="position: relative">


                            <ul class="list-unstyled abt" style="position: absolute; left:45px;">

                                <li class="has_dropdown"><a href="#" class="active_currency">
                                        <?php if (isset(Yii::app()->session['currency'])) { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?php echo Yii::app()->session['currency']['id']; ?>.<?php echo Yii::app()->session['currency']['image']; ?>" width="16" height="11" alt=""/>
                                                </i> <i class="fa <?php echo Yii::app()->session['currency']['symbol']; ?>"></i><?php echo Yii::app()->session['currency']['currency_code']; ?>
                                        <?php } else { ?>
                                                <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/1.jpg" width="16" height="11" alt=""/></i> <i class="fa fa-inr"></i> INR
                                        <?php } ?>
                                        <i class="fa fa-angle-down"></i></a>
                                    <div class="laksyah_dropdown currency_drop">
                                        <ul class="drop_menu">
                                            <?php
                                            $currencies = Currency::model()->findAll();

                                            foreach ($currencies as $currency) {
                                                    ?>
                                                    <li>
                                                        <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Site/CurrencyChange/id/<?= $currency->id; ?>" class="currency" code="<?= $currency->id; ?>">
                                                            <i class="fa currency_symbol"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/currency/<?= $currency->id; ?>.<?= $currency->image; ?>" width="16" height="11" alt=""/></i><?= $currency->currency_code; ?></a></li>
                                            <?php } ?>

                                        </ul>
                                    </div>
                                </li>

                            </ul>



                            <div class="signs">
                                <div class="sign-1 clickme  ">

                                    <a class="sg" href="#"><i class="fa fa-shopping-bag"></i>Bag</a>

                                    <div class="target cart_box">
                                        <div class="drop_cart">

                                        </div>
                                    </div>
                                </div>

                                <?php if (Yii::app()->session['user'] != "" || Yii::app()->session['merchant'] != '') {
                                        ?>
                                        <div class="sign-2 hidden-xs hidden-sm">
                                            <?php echo CHtml::link('Logout', array('site/logout'), array('class' => 'hd')); ?>
                                        </div>
                                <?php } else { ?>
                                        <div class="sign-2 hidden-xs hidden-sm">
                                            <div class="dropdowna">
                                                <a class="hd">Sign Up</a>
                                                <div class="dropdown-contenta">
                                                    <a href="<?= Yii::app()->baseUrl ?>/index.php/site/UserRegister">User</a>
                                                    <a href="<?= Yii::app()->baseUrl ?>/index.php/site/VendorRegister">Vendor</a>
                                                </div>
                                            </div>
                                            <?php //echo CHtml::link('Sign Up', array('site/UserRegister'), array('class' => 'hd')); ?>
                                        </div>
                                <?php } ?>
                                <?php if (Yii::app()->session['user'] != "") { ?>
                                        <?php if (BuyerDetails::model()->findByPk(Yii::app()->session['user'])->email_verification == 1) { ?>
                                                <div class="sign-3 hidden-xs hidden-sm">
                                                    <?php echo CHtml::link('My Account', array('Myaccount/index/type/user'), array('class' => 'hd')); ?>
                                                </div>
                                        <?php } else { ?>
                                                <div class="sign-3 hidden-xs hidden-sm">
                                                    <?php echo CHtml::link('My Account', array('Site/index'), array('class' => 'hd')); ?>
                                                </div>
                                        <?php } ?>
                                <?php } else if (Yii::app()->session['merchant'] != '') { ?>
                                        <div class="sign-3 hidden-xs hidden-sm">
                                            <?php echo CHtml::link('My Account', array('Myaccount/index/type/vendor'), array('class' => 'hd')); ?>
                                        </div>
                                <?php } else { ?>
                                        <div class="sign-3 hidden-xs hidden-sm">
                                            <div class="dropdowna">
                                                <a class="hd">Sign In</a>
                                                <div class="dropdown-contenta">
                                                    <a href="<?= Yii::app()->baseUrl ?>/index.php/site/Userlogin">User</a>
                                                    <a href="<?= Yii::app()->baseUrl ?>/index.php/site/Vendorlogin">Vendor</a>
                                                </div>
                                            </div>
                                            <?php //echo CHtml::link('Sign In', array('site/login'), array('class' => 'hd')); ?>
                                        </div>
                                <?php } ?>



                                <div class="sign-2 visible-xs visible-sm">
                                    <div class="dropdown">
                                        <button class="btn btn-primary drops dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-user"></i>
                                        </button>
                                        <ul class="dropdown-menu tt">
                                            <li><a class="sign" href="#">Sign In</a></li>
                                            <li><a class="register" href="#">Register</a></li>
                                        </ul>
                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>



        <section class="main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-sm-12 hidden-sm hidden-xs">
                        <div class="dropdown searches">
                            <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary new-btn" data-target="#">
                                <i class="fa fa-navicon"></i> ALL CATEGORIES
                            </a>
                            <!--<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">-->
                            <!--                                    <li><a href="#">Some action</a></li>-->
                            <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">

                                <?php
                                $e = Utilities::Categories();
//                                print_r($e);
                                foreach ($e as $key => $value) {
                                        ?>
                                        <li class="dropdown-submenu">
                                            <!--<a tabindex="-1" href="#">-->
                                            <?php // echo $key; ?>
                                            <?php echo CHtml::link($key, array('products/list', 'category' => $key)); ?>
                                            <!--</a>-->
                                            <?php if (!empty($value)) { ?>
                                                    <ul class="dropdown-menu menu-2">
                                                        <li>
                                                            <?php
                                                            foreach ($value as $key1 => $value1) {
                                                                    ?>
                                                                    <?php echo CHtml::link($value1, array('products/list', 'category' => $value1)); ?>
                                                                    <?php
                                                            }
                                                            ?>
                                                        </li>
                                                        <!--                                            <li class="dropdown-submenu menu-3">
                                                                                                        <a href="#">Even More..</a>
                                                                                                        <ul class="dropdown-menu levels">
                                                                                                            <li><a href="#">3rd level</a></li>
                                                                                                            <li><a href="#">3rd level</a></li>
                                                                                                        </ul>
                                                                                                    </li>
                                                                                                    <li><a href="#">Second level</a></li>
                                                                                                    <li><a href="#">Second level</a></li>-->
                                                    </ul>
                                            <?php } ?>
                                        </li>



                                        <?php
                                }
                                ?>

                                <!--
                                                                                                <li class="dropdown-submenu">
                                                                                                        <a tabindex="-1" href="#">Baby Products</a>
                                                                                                        <ul class="dropdown-menu menu-2">
                                                                                                                <li><a tabindex="-1" href="#">Second level</a></li>
                                                                                                                <li class="dropdown-submenu menu-3">
                                                                                                                        <a href="#">Even More..</a>
                                                                                                                        <ul class="dropdown-menu levels">
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                        </ul>
                                                                                                </li>


                                                                                                <li class="dropdown-submenu">
                                                                                                        <a tabindex="-1" href="#">Baby Products</a>
                                                                                                        <ul class="dropdown-menu menu-2">
                                                                                                                <li><a tabindex="-1" href="#">Second level</a></li>
                                                                                                                <li class="dropdown-submenu menu-3">
                                                                                                                        <a href="#">Even More..</a>
                                                                                                                        <ul class="dropdown-menu levels">
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                        </ul>
                                                                                                </li>



                                                                                                <li class="dropdown-submenu">
                                                                                                        <a tabindex="-1" href="#">Baby Products</a>
                                                                                                        <ul class="dropdown-menu menu-2">
                                                                                                                <li><a tabindex="-1" href="#">Second level</a></li>
                                                                                                                <li class="dropdown-submenu menu-3">
                                                                                                                        <a href="#">Even More..</a>
                                                                                                                        <ul class="dropdown-menu levels">
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                        </ul>
                                                                                                </li>



                                                                                                <li class="dropdown-submenu">
                                                                                                        <a tabindex="-1" href="#">Baby Products</a>
                                                                                                        <ul class="dropdown-menu menu-2">
                                                                                                                <li><a tabindex="-1" href="#">Second level</a></li>
                                                                                                                <li class="dropdown-submenu menu-3">
                                                                                                                        <a href="#">Even More..</a>
                                                                                                                        <ul class="dropdown-menu levels">
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                        </ul>
                                                                                                </li>


                                                                                                <li class="dropdown-submenu">
                                                                                                        <a tabindex="-1" href="#">Baby Products</a>
                                                                                                        <ul class="dropdown-menu menu-2">
                                                                                                                <li><a tabindex="-1" href="#">Second level</a></li>
                                                                                                                <li class="dropdown-submenu menu-3">
                                                                                                                        <a href="#">Even More..</a>
                                                                                                                        <ul class="dropdown-menu levels">
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                                <li><a href="#">3rd level</a></li>
                                                                                                                        </ul>
                                                                                                                </li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                                <li><a href="#">Second level</a></li>
                                                                                                        </ul>
                                                                                                </li>
                                -->



                            </ul>
                        </div>

                    </div>
                    <div class="col-md-10 col-sm-12 nop  hidden-xs">
                        <nav class="navbar navbar-inverse">


                            <div class="collapse navbar-collapse nop" id="myNavbar">
                                <ul class="nav navbar-nav">
                                    <li><?php echo CHtml::link('COUPONS', array('products/coupons')); ?></li>
                                    <li><?php echo CHtml::link('DAILY DEALS', array('products/Daily')); ?></li>
                                    <li><?php //echo CHtml::link('FLASH DEALS', array('products/Daily'));                                            ?></li>
                                    <li><?php echo CHtml::link('HOT DEALS', array('products/hot')); ?></li>
                                    <li><?php echo CHtml::link('SUBMIT A DEAL', array('myaccount/SubmitDeal')); ?></li>
                                    <li><?php echo CHtml::link('WHOLESALE DEALS', array('products/wholesale')); ?></li>
                                    <li><?php echo CHtml::link('BARGAIN ZONE', array('products/bargain')); ?></li>

                                </ul>

                            </div>

                        </nav>
                    </div>
                </div>
            </div>

        </section>


    </div>




    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbars">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="myNavbars">
                <ul class="nav navbar-nav sis">
                    <li class="active"><a href="#">Coupons</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Daily Deals
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Flash Deals</a></li>
                    <li><a href="#">Hot Deals</a></li>
                    <li><a href="#">Wholesale Deals</a></li>
                </ul>

            </div>
        </div>
    </nav>
    <div class="modal fade" id="success_social_fail" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><img class="tick" src="<?php echo yii::app()->request->baseUrl; ?>/images/wrong.png">Failed</h4>
                </div>
                <div class="modal-body">
                    <p>Failed: You have Allready Shared <strong><?php echo $products->product_name; ?></strong> to your Social Site!</p>
                </div>

            </div>

        </div>
    </div>

    <div class="modal fade" id="success_social" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><img class="tick" src="<?php echo yii::app()->request->baseUrl; ?>/images/tick.png">Success</h4>
                </div>
                <div class="modal-body">
                    <p>Success: You have Shared <strong><?php echo $products->product_name; ?></strong> to your Social Site!</p>
                </div>

            </div>

        </div>
    </div>
    <?php echo $content; ?>




    <section class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2>Subscribe</h2>
                </div>
                <div class="col-md-8">
                        <!--<form action="<?= Yii::app()->baseUrl ?>/index.php/site/PublicNewsletter" method="post">-->
                    <div class="form-group">
                        <input type="email" name="email" class="form-subs newsletter_email"  id="email" placeholder="Sign Up For Your Email">
                    </div>

                    <button type="submit" name="newsleter_subscribe" id="newsletter_reset" onclick="submit_newsletter();" class="btn btn-default submit-btn">Subscribe</button>
                    <div class="newsletter_msg"></div>
                    <!--</form>-->

                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-6 mobs foots">
                    <h1>dealsonindia</h1>
                    <ul>
                        <li><?php echo CHtml::link('About Us', array('site/aboutus')); ?></li>
                        <li><?php echo CHtml::link('Privacy Policy', array('site/privacy')); ?></li>
                        <li><?php echo CHtml::link('Terms & Conditions', array('site/terms')); ?></li>
                        <li><?php echo CHtml::link('Contact Us', array('site/contactus')); ?></li>
                    </ul>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 mobs foots">
                    <h1>Work with dealsonindia</h1>
                    <ul>
                        <li><?php echo CHtml::link('Join the Marketplace', array('site/join')); ?></li>
                        <li><?php echo CHtml::link('Run a Deal', array('/submit-deals')); ?></li>
                        <li><?php echo CHtml::link('Learn about Merchant', array('site/learn')); ?></li>
                        <li><?php echo CHtml::link('Affiliate Program', array('site/affiliate')); ?></li>
                    </ul>
                </div>
                <div class="col-md-5 foots-two">
                    <h1>Quick Links</h1>
                    <ul>
                        <li><?php echo CHtml::link('Register', array('site/UserRegister')); ?></li>
                        <li><?php
                            if (Yii::app()->session['user_type_usrid'] == 2)
                                    echo CHtml::link('Sales Report', array('Myaccount/MySalesReport'));
                            else
                                    echo CHtml::link('Wishlist', array('Myaccount/Wishlist'));
                            ?></li>
                        <li><?php echo CHtml::link('Login', array('site/Userlogin')); ?></li>
                        <li><?php
                            if (Yii::app()->session['user_type_usrid'] == 2)
                                    echo CHtml::link('My Products', array('/my-products'));
                            else
                                    echo CHtml::link('Submit a Product', array('/Myaccount/SubmitDeal'));
                            ?></li>
                        <li><?php
                            if (Yii::app()->session['user_type_usrid'] == 2)
                                    echo CHtml::link('My Account', array('Myaccount/index/type/vendor'));
                            else
                                    echo CHtml::link('My Account', array('Myaccount/index/type/user'));
                            ?></li>
                        <li><?php echo CHtml::link('Site Map', array('site/sitemap')); ?></li>
                        <li><?php
                            if (Yii::app()->session['user_type_usrid'] == 2)
                                    echo CHtml::link('Order History', array('Myaccount/order-history'));
                            else
                                    echo CHtml::link('Order History', array('Myaccount/UserOrderHistory'));
                            ?></li>
                        <li><?php
                            if (Yii::app()->session['user_type_usrid'] == 2)
                                    echo CHtml::link('Advertisements', array('Myaccount/paidAd'));
                            else
                                    echo CHtml::link('Newsletter', array('/Newsletter-Subscription'));
                            ?></li>
                    </ul>
                </div>
            </div>
            <div class="row copys">
                <div class="col-md-1">
                    <img class="img-responsive" src="<?= Yii::app()->baseUrl ?>/images/logo.png">
                </div>
                <div class="col-md-7 copy">
                    <ul>
                        <li>Copyrights 2016 , All Rights Reserved</li>
                        <li>Developed By <a href="#">Intersmart</a></li>

                    </ul>


                </div>

                <div class="col-md-4 paypal">
                    <ul>
                        <li><a href="#"><img class="imgs" src="<?= Yii::app()->baseUrl ?>/images/f1.jpg"></a></li>
                        <li><a href="#"><img class="imgs" src="<?= Yii::app()->baseUrl ?>/images/f2.jpg"></a></li>
                        <li><a href="#"><img class="imgs" src="<?= Yii::app()->baseUrl ?>/images/f3.jpg"></a></li>
                        <li><a href="#"><img class="imgs" src="<?= Yii::app()->baseUrl ?>/images/f4.jpg"></a></li>
                        <li><a href="#"><img class="imgs" src="<?= Yii::app()->baseUrl ?>/images/f5.jpg"></a></li>
                    </ul>

                </div>

            </div>


        </div>


    </footer>
    <script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>

    <script src="<?= Yii::app()->baseUrl ?>/js/custom.js"></script>
    <!--<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap.min.js"></script>-->

    <script src="<?= Yii::app()->baseUrl ?>/js/jquery.touchSwipe.min.js"></script>
    <script src="<?= Yii::app()->baseUrl ?>/js/paradise_slider_min.js"></script>
    <script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>

    <script>
                                            var selectIds = $('#panel1,#panel2,#panel3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9,#panel10,#panel11,#panel12,#panel13,#panel14');
                                            $(function ($) {
                                                selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                                    $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                                                });
                                            });


    </script>
    <script>
            jQuery(document).ready(function () {
                jQuery(window).scroll(function () {

                    var body = jQuery("html, body");

                    var threshold = 90;
                    if (jQuery(window).scrollTop() <= threshold) {
                        jQuery('#static_cnt').removeClass('dropup fadeInDown animated m2');

                    } else {
                        jQuery('#static_cnt').addClass('dropup').addClass('fadeInDown animated m2');
                    }
                });
                "use strict";
                //Top Drop Down
                //-----------------------------
                $('.has_dropdown').hover(function () {
                    $(this).find('.laksyah_dropdown').fadeIn(500);
                }, function () {
                    $(this).find('.laksyah_dropdown').fadeOut(10);
                    $(this).find('.laksyah_dropdown').removeClass('active');
                }

                );


                $('.currency_drop a').click(function () {
                    //e.preventDefault();
                    $('.currency_drop li').removeClass('active');
                    $(this).parent('li').addClass('active');
                    var selectedCurrency = $(this).html();
                    $('.active_currency').html(selectedCurrency + ' <i class="fa fa-angle-down"></i>');
                });
            });
    </script>

    <script type = "text/javascript" language = "javascript">

            $(document).ready(function () {
                $(".clickme").hover(function (event) {
                    $(".target").stop().toggle('slow');
                });
            });

    </script>

    <script>

            $('.has-more span').click(function () {
                $(this).toggleClass('active');
                $('.has-sec').slideToggle().addClass('zoomIn animated m1');


            });
    </script>
    <script>
            function submit_newsletter() {
                var email = $(".newsletter_email").val();
                if (email == '') {
                    $('.newsletter_msg').html("Please enter a Email");
                } else {
                    if (IsEmail(email) == false) {
                        $('.newsletter_msg').html("Please enter a Valid Email");
                    } else {
                        $.ajax({
                            url: baseurl + 'site/PublicNewsletter',
                            type: "POST",
                            data: {email: email},
                            success: function (data)
                            {
                                if (data == 2) {
                                    $('.newsletter_msg').html("This Email Already Subscibe the newsletter");
                                } else {
                                    $('.newsletter_msg').html("Email Sent Successfully in our newsletter!!!!");
                                    $("#newsletter_reset")[0].reset();
                                }

                            }
                        });
                    }

                }

            }
            function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                if (!regex.test(email)) {
                    return false;
                } else {
                    return true;
                }
            }

    </script>

</body>
</html>

