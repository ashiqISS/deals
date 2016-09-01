<?php

class Header extends CWidget {

    public function run() {
        ?>

        <!DOCTYPE html>
        <html lang="en">

            <!-- Mirrored from victoria-spa.themexriver.com/victoria/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 13 Apr 2016 20:33:15 GMT -->
            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Newgen </title>
                <!--        <link href="images/favicon.png" rel="icon">-->
                <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Raleway:800,700,600,300' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic' rel='stylesheet' type='text/css'>
                <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
                <!--<link href="<?php echo Yii::app()->request->baseUrl; ?>/flat-icon/flaticon.css" rel="stylesheet">-->
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.carousel.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/owl.theme.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/animate.min.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/css3-animation.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/new.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" rel="stylesheet">
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/simpleMobileMenu.css" />
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slick.css" rel="stylesheet">
                <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slick-theme.css" rel="stylesheet">

            </head>

            <body id="home-1">
                <div class="pre-loder">
                    <div class="loding"> </div>
                </div> <!-- end of pre-loder -->
                <header class="cf visible-xs visible-sm">
                </header>
                <section class="faq hidden-xs">    
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">  
                                <a class="faqs" href="#">FAQ'S<i class="fa infos fa-exclamation-circle"></i></a>
                            </div>

                        </div>
                    </div>
                </section>



                <section class="main-logo">    
                    <div class="container bods">
                        <div class="row">
                            <div class="col-md-4 col-xs-6">
                                <img class="zee" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png">
                            </div>
                            <div class="col-md-4 col-xs-6 hidden-xs">
                                <div id="custom-search-input">
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control input-lg" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="button">
                                                <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-inline list-unstyled">
                                    <li><a class="mycart" href="#">Mycart<img class="shop" src="<?php echo Yii::app()->request->baseUrl; ?>/images/shop.png"></a></li>
                                    <li><a href="#">Signin</a></li>
                                    <li><a href="#">Register</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>

                <div id="static_cnt" class="">      
                    <section class="main-head">    
                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 col-sm-4 hidden-xs">
                                    <div class="dropdown">
                                        <button class="btn btn-primary cat dropdown-toggle" type="button" data-toggle="dropdown"><img class="bars" src="<?php echo Yii::app()->request->baseUrl; ?>/images/bars.png">Categories
                                        </button>
                                        <ul class="dropdown-menu categories">
                                            <li><a href="#">menu 1</a></li>
                                            <li><a href="#">menu 2</a></li>
                                            <li><a href="#">menu 3</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-5 col-sm-8">
                                    <nav class="navbar navbar-inverse hidden-xs">
                                        <div class="nop">
                                            <!--    <div class="navbar-header">
                                                  <a class="navbar-brand" href="#">WebSiteName</a>
                                                </div>-->
                                            <ul class="nav navbar-nav">
                                                <li class="active"><a href="#">Home</a></li>
                                                <li><a href="#">About Us</a></li> 
                                                <li><a href="#">Products</a></li> 
                                                <li><a href="#">Offers & Deals</a></li> 



                                            </ul>
                                        </div>
                                    </nav>
                                </div>


                                <div class="navigation hidden-sm hidden-md hidden-lg">
                                    <nav>
                                        <a href="javascript:void(0)" class="smobitrigger ion-navicon-round"><span><i class="fa fa-align-justify"></i></span></a>
                                        <ul class="mobimenu">

                                            <div id="cssmenu">
                                                <ul>
                                                    <li> <div id="custom-search-input">
                                                            <div class="input-group col-md-12">
                                                                <input type="text" class="form-control input-lg" placeholder="Search" />
                                                                <span class="input-group-btn">
                                                                    <button class="btn btn-info btn-lg" type="button">
                                                                        <i class="glyphicon glyphicon-search"></i>
                                                                    </button>
                                                                </span>
                                                            </div>
                                                        </div></li>
                                                    <li><a href="index.html"><span>Home</span></a></li>
                                                    <li><a href="#"><span>About Us</span></a></li>
                                                    <li><a href="#"><span>Products</span></a></li>

                                                    <li><a href="#"><span>Offers & Deals</span></a></li>

                                                    <li class="has-sub"><a href="#"><span>categories</span></a>
                                                        <ul>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>

                                                        </ul>
                                                    </li>
                                                    <li class="has-sub"><a href="#"><span>categories</span></a>
                                                        <ul>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>
                                                            <li><a href="#"><span>Sub</span></a></li>

                                                        </ul>
                                                    </li>
                                                    <li><a href="#"><span>categories</span></a></li>
                                                    <li><a href="#"><span>categories</span></a></li>

                                                    <li><a href="#"><span>faqs</span></a></li>




                                                </ul>
                                            </div>

                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </section>
                </div>  

                <?php
            }

        }
        