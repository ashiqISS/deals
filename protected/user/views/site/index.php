<style>
        .slick-slide img.adv {
                height: 72px;
        }
        .slick-slide img {
                height: 279px;
        }
</style>
<section class="mob-header visible-sm visible-xs">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <div class="over">
                                        <h1>Find your best deal</h1>
                                        <form role="form">
                                                <div class="form-group">

                                                        <input type="email" class="form-deals" id="email" placeholder="What are you looking for">
                                                </div>
                                                <div class="form-group">

                                                        <input type="password" class="form-deals" id="pwd" placeholder="Enter Your Location">

                                                </div>

                                                <button type="submit" class="btn btn-default newbtn">Search</button>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</section>



<section class="deals-ads">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="centers">
                                        <div class="ads">
                                                <div class="item">
                                                        <div class="main">
                                                                <?php
                                                                $top = AdPayment::model()->findByAttributes(array('position' => 1, 'admin_approve' => 1, 'status' => 1));
//                                <?php $top = AdPayment::model()->findByAttributes(array('position' => 1, 'vendor_name' => Yii::app()->session['merchant']['id'], 'status' => 1));
                                                                if (!empty($top)) {
                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $top->id);
                                                                        ?>
                                                                        <img width="1021px" height="72px" class="adv" src="<?= Yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $top->id . '/big.' . $top->image ?>">

                                                                <?php }
                                                                ?>
                                                        </div>
                                                </div>

                                        </div>
                                </div>

                        </div>
                </div>
        </div>
</section>



<section class="deals-slider">
        <div class="container">
                <div class="row">
                        <div class="col-md-4">
                                <div class="ads-banner">
                                        <?php
                                        $top_left = AdPayment::model()->findAllByAttributes(array('position' => 2, 'admin_approve' => 1, 'status' => 1), array('order' => 'id DESC', 'limit' => 2));
//                    $top_left = AdPayment::model()->findAllByAttributes(array('position' => 2, 'vendor_name' => Yii::app()->session['merchant']['id'], 'status' => 1), array('order' => 'id DESC', 'limit' => 2));
                                        foreach ($top_left as $tp_left) {
                                                $folder = Yii::app()->Upload->folderName(0, 1000, $tp_left->id);
                                                ?>
                                                <div class="item">
                                                        <div class="main">
                                                                <img src="<?= Yii::app()->baseUrl . '/uploads/ads/' . $folder . '/' . $tp_left->id . '/big.' . $tp_left->image ?>">
                                                        </div>
                                                </div>
                                        <?php } ?>
                                </div>
                        </div>

                        <div class="col-md-8">
                                <div id="fw_al_004" class="carousel ps_zoom_i ps_control_bround swipe_x ps_easeInOut" data-ride="carousel" data-pause="hover" data-interval="5000" data-duration="2000">


                                        <div class="carousel-inner" role="listbox">


                                                <div class="item active">
                                                        <img src="<?= Yii::app()->baseUrl ?>/images/banner2.jpg" />
                                                </div>

                                                <div class="item">
                                                        <img src="<?= Yii::app()->baseUrl ?>/images/banner3.jpg" />
                                                </div>

                                        </div>


                                        <a class="left carousel-control" href="#fw_al_004" role="button" data-slide="prev">
                                                <span class="fa fa-angle-left" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                        </a>


                                        <a class="right carousel-control" href="#fw_al_004" role="button" data-slide="next">
                                                <span class="fa fa-angle-right" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                        </a>

                                </div>

                        </div>

                </div>
        </div>

</section>




<section class="deals-products">
        <div class="container">
                <div class="row">
                        <h1>latest Deals</h1>
                        <?php
                        // $this->widget('user.widgets.Products', array(
                        //   'products' => $products));
                        ?>
                        <?php
                        echo $this->renderPartial('_latest_deal', array('products' => $products));
                        ?>

                        <?php
                        $this->widget('application.user.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
                            'contentSelector' => '#products',
                            'itemSelector' => 'div.product',
                            'loadingText' => 'Loading...',
                            'donetext' => '<div class="clearfix"></div><button class="ripple">Loading Complete</button>',
                            'pages' => $pages,
                        ));
                        ?>

                        <!--                        <div class="rows">

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d3.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>


                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <img class="img-responsive adz" src="<?= Yii::app()->baseUrl ?>/images/sd.jpg">


                                                        </div>
                                                        <div class="visible-sm visible-xs clearfix"></div>

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d5.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d1.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                </div>


                                                <div class="rows">

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d4.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d5.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <img class="img-responsive adz" src="<?= Yii::app()->baseUrl ?>/images/sd.jpg">


                                                        </div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d3.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>


                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                </div>

                                                <div class="rows">

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d5.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d1.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d4.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d2.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                </div>


                                                <div class="rows">

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d4.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d5.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <img class="img-responsive adz" src="<?= Yii::app()->baseUrl ?>/images/sd.jpg">


                                                        </div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d3.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>


                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                </div>

                                                <div class="rows">

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d5.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d1.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d4.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d2.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                </div>


                                                <div class="rows">

                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d4.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d5.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>

                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <img class="img-responsive adz" src="<?= Yii::app()->baseUrl ?>/images/sd.jpg">


                                                        </div>
                                                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects">
                                                                <div class="deals-effect">
                                                                        <img class="zoom" src="<?= Yii::app()->baseUrl ?>/images/d3.jpg">
                                                                        <div class="overlay"></div>
                                                                        <div class="buy">
                                                                                <a class="buybtn" href="#">Buy Now</a>
                                                                        </div>
                                                                </div>



                                                                <h2>Big Rock CouponsFlat 35% OFF
                                                                        on Shared Hosting</h2>
                                                                <div class="star">
                                                                        <ul>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                                        </ul>
                                                                </div>


                                                                <div class="blocked">
                                                                        <div class="social">
                                                                                <ul>
                                                                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                                                                </ul>
                                                                        </div>

                                                                        <div class="price">
                                                                                <h3>249.00</h3>
                                                                        </div>
                                                                </div>
                                                        </div>


                                                        <div class="visible-sm visible-xs clearfix"></div>
                                                </div>-->
                        <!--<div class="clearfix"></div>-->
                        <!--<button class="ripple">Load More</button>-->


                </div>
        </div>
</section>

<script>

        $(document).ready(function () {
                $('.ads').slick({
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        //                    prevArrow: '<i id="prev_slide_2" class="fa fa-chevron-left"></i>',
                        //                    nextArrow: '<i id="next_slide_2" class="fa fa-chevron-right"></i>',
                        fade: true,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 480,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>
<script>

        $(document).ready(function () {

                $('.ads-banner').slick({
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
                        //                    prevArrow: '<i id="prev_slide_2" class="fa fa-chevron-left"></i>',
                        //                    nextArrow: '<i id="next_slide_2" class="fa fa-chevron-right"></i>',
                        fade: true,
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 800,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                },
                                {
                                        breakpoint: 480,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 1
                                        }
                                }
                        ]
                });

        });

</script>



<script>
        (function (window, $) {
                $(function () {
                        $('.ripple').on('click', function (event) {
                                event.preventDefault();
                                var $div = $('<div/>'),
                                        btnOffset = $(this).offset(),
                                        xPos = event.pageX - btnOffset.left,
                                        yPos = event.pageY - btnOffset.top;
                                $div.addClass('ripple-effect');
                                var $ripple = $(".ripple-effect");

                                $ripple.css("height", $(this).height());
                                $ripple.css("width", $(this).height());
                                $div
                                        .css({
                                                top: yPos - ($ripple.height() / 2),
                                                left: xPos - ($ripple.width() / 2),
                                                background: $(this).data("ripple-color")
                                        })
                                        .appendTo($(this));

                                window.setTimeout(function () {
                                        $div.remove();
                                }, 2000);
                        });

                });

        })(window, jQuery);
</script>