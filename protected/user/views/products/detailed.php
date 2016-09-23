<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl; ?>/css/jquery.fancybox.css">

<style>
        .product_thumb ul li {
                width: 88px;
                height: 88px;
                border: 1px solid #ccc;
                background-color: #f7f7f7;
                margin-bottom: 5px;
        }
        .sans strong {
                color: #569277;
        }
</style>
<style>
        @import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);
        .review_content{
                border-bottom: 1px solid #ccc;
                padding-bottom: 10px;
                margin-bottom: 10px;
        }

        i.fa.stars.fa-star {
                color: #cf7116;
        }
        a.reviews{
                padding: 11px 32px;
                font-size: 13px;
                color: #fff;
                background: #122102;
                font-family: 'Lato', sans-serif;
                border: none;
                float: left;
                margin-top: 0;
                text-transform: uppercase;
        }

        hr {
                margin: 20px;
                border: none;
                border-bottom: thin solid rgba(255,255,255,.1);
        }

        div.title { font-size: 2em; }

        h1 span {
                font-weight: 300;
                color: #Fd4;
        }

        div.stars {
                //width: 270px;
                display: inline-block;
        }

        input.star { display: none; }

        label.star {
                float: right;
                padding: 10px;
                font-size: 36px;
                color: #122102;
                transition: all .2s;
        }

        input.star:checked ~ label.star:before {
                content: '\f005';
                color: #FD4;
                transition: all .25s;
        }

        input.star-5:checked ~ label.star:before {
                color: #FE7;
                text-shadow: 0 0 20px #952;
        }

        input.star-1:checked ~ label.star:before { color: #F62; }

        label.star:hover { transform: rotate(-15deg) scale(1.3); }

        label.star:before {
                content: '\f006';
                font-family: FontAwesome;
        }
</style>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery.min.js"></script>
<?php
$folder = Yii::app()->Upload->folderName(0, 1000, $products->id);
?>
<section class="product-view">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h2><?php echo $products->product_name; ?></h2>


                        </div>
                        <div class="col-xs-12">
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success mesage">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="alert alert-danger mesage">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>sorry!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                        <div class="col-xs-5 col-sm-12 col-md-5 for-mob">
                                <div class="pro">
                                        <div class="product_thumb hidden-xs">
                                                <ul id="gal1">
                                                        <?php
                                                        //  $folder = Yii::app()->Upload->folderName(0, 1000, $product->id);
                                                        $big = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $products->id . '/gallery/big';
                                                        $bigg = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/gallery/big/';
                                                        $thu = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $products->id . '/gallery/small';
                                                        $thumbs = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/gallery/small/';
                                                        $zoo = Yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $products->id . '/gallery/zoom';
                                                        $zoom = Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/gallery/zoom/';
                                                        $file_display = array('jpg', 'jpeg', 'png', 'gif');
                                                        if (file_exists($big) == false) {

                                                        } else {
                                                                $dir_contents = scandir($big);
                                                                $i = 0;
                                                                foreach ($dir_contents as $file) {
                                                                        $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                                                                ?>
                                                                                <li>
                                                                                        <a href="#" data-image="<?php echo $bigg . $file; ?>" data-zoom-image="<?php echo $zoom . $file; ?>" class="">
                                                                                                <img src="<?php echo $thumbs . $file; ?>" alt=""> </a>
                                                                                </li>
                                                                                <?php
                                                                        }
                                                                        ?>



                                                                        <?php
                                                                }
                                                                $i++;
                                                        }
                                                        ?>

                                                </ul>
                                        </div>
                                        <?php
                                        $folder = Yii::app()->Upload->folderName(0, 1000, $products->id);
                                        ?>

                                        <?php
                                        if (!empty($dir_contents)) {

                                                foreach ($dir_contents as $file1) {

                                                }
                                                ?>
                                                <div class="product_big_image hidden-xs"> <img src="<?php echo $bigg . $file1; ?>" id="laksyah_zoom" data-zoom-image="<?php echo $zoom . $file1; ?>" alt=""/>

                                                </div>
                                        <?php } else { ?>

                                                <div class="product_big_image"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $products->id ?>/big.<?= $products->main_image ?>" id="laksyah_zoom" data-zoom-image="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $products->id ?>/zoom.<?= $products->main_image ?>" alt=""/>
                                                </div>
                                        <?php } ?>


                                        <div class="clearfix"></div>

                                        <div class="visible-xs">
                                                <div class="gallery">
                                                        <?php if (file_exists($big) == false) { ?>
                                                                <div class = "item"> <img src = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $products->id ?>/big.<?= $products->main_image ?>" id = "laksyah_zoom" data-zoom-image = "<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?= $folder ?>/<?= $product->id ?>/big.<?= $product->main_image ?>"></div>
                                                                <?php
                                                        } else {
                                                                $dir_contents = scandir($big);
                                                                $i = 0;
                                                                foreach ($dir_contents as $file) {
                                                                        $file_type = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                                                                        if ($file !== '.' && $file !== '..' && in_array($file_type, $file_display) == true) {
                                                                                ?>
                                                                                <div class="item">
                                                                                        <div class="main">
                                                                                                <img src="<?php echo $bigg . $file; ?>"  >

                                                                                        </div>
                                                                                </div>
                                                                                <?php
                                                                        }
                                                                        ?>



                                                                        <?php
                                                                }
                                                                $i++;
                                                        }
                                                        ?>

                                                </div>

                                        </div>




                                </div>

                        </div>

                        <div class="col-xs-7 col-sm-12 col-md-7 for-mob">
                                <div class="soon">
                                        <!--<img class="exp sd" src="<?= Yii::app()->baseUrl; ?>/images/soon.png">-->
                                        <h5><?php echo $products->product_name; ?></h5>
                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans">Product Code</span>
                                                </div>

                                                <div class="detail-2">
                                                        <span class="sans">:</span>
                                                </div>
                                                <div class="detail-3">
                                                        <span class="sansz"><?php echo $products->product_code; ?></span>
                                                </div>

                                        </div>
                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans">Deal Published</span>
                                                </div>

                                                <div class="detail-2">
                                                        <span class="sans">:</span>
                                                </div>
                                                <div class="detail-3">
                                                        <span class="sansz"><?php echo $time; ?></span>
                                                </div>

                                        </div>


                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans">Price</span>
                                                </div>

                                                <div class="detail-2">
                                                        <span class="sans">:</span>
                                                </div>

                                                <div class="detail-3">
                                                        <span class="sans3"><?php echo Yii::app()->Discount->Discount($products); ?></span><br />
                                                        <?php if ($products->tax != 0) { ?>
                                                                <span class="extax">Ex Tax : <?php echo Yii::app()->Discount->extax($products); ?></span>
                                                        <?php } ?>
                                                </div>


                                        </div>

                                        <div class="detail">
                                                <div class="detail-1">
                                                        <span class="sans"><?php if ($products->merchant_id != 0) { ?>
                                                                        Soled By <strong><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/Products/Seller/id/<?php echo $products->merchant_id; ?>"><?php echo Merchant::model()->findByPk($products->merchant_id)->shop_name; ?></a></strong>
                                                                <?php } else {
                                                                        ?>
                                                                        Soled By <strong>Dealsonindia Fullfilled</strong>
                                                                <?php } ?> </span>
                                                </div>


                                        </div>

                                        <div class="clearfix"></div>
                                        <h4 class="option_errors"></h4>
                                        <div class="wishlist">
                                                <ul>
                                                        <?php $cart_exist = Cart::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'product_id' => $products->id)); ?>
                                                        <?php if ($products->product_type == 2) {
                                                                ?>
                                                                <input type = "hidden" value = "<?= $products->canonical_name; ?>" id="cano_name_<?= $products->id; ?>" name="cano_name">
                                                                <li><a class="cart1 add_to_cart"  id="<?= $products->id; ?>">Add to cart</a></li>
                                                                <li><a class="cart2 add_to_wishlist" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/Wishlist/id/<?= $products->id; ?>">Add to wish list</a></li>
                                                        <?php } else if ($products->product_type == 4) { ?>

                                                                <?php if (isset(Yii::app()->session['user'])) { ?>

                                                                        <?php $bidd_exist = BargainDetails::model()->findByAttributes(array('product_id' => $products->id, 'user_id' => Yii::app()->session['user']['id'])); ?>
                                                                        <?php if (!empty($bidd_exist)) { ?>
                                                                                <?php if ($bidd_exist->status == 1) {
                                                                                        ?>

                                                                                        <li class = "already_bid"><a class = "cart1 " id = "">You Already Seal the Product</a></li>
                                                                                <?php } else if ($bidd_exist->status == 2) { ?>

                                                                                        <?php if (empty($cart_exist)) { ?>
                                                                                                <input type = "hidden" value = "<?= $products->canonical_name; ?>" id="cano_name_<?= $products->id; ?>" name="cano_name">
                                                                                                <li class = "already_bid "><a class = "cart1 proceed_to_checkout " id = "<?= $products->id; ?>">Proceed to checkout</a></li>
                                                                                        <?php } else { ?>
                                                                                                <input type = "hidden" value = "<?= $products->canonical_name; ?>" id="cano_name_<?= $products->id; ?>" name="cano_name">
                                                                                                <li class = "already_bid "><a class = "cart1 " href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Cart/Mycart" id = "<?= $products->id; ?>">Proceed to checkout</a></li>
                                                                                        <?php } ?>

                                                                                <?php } else if ($bidd_exist->status == 3) { ?>
                                                                                        <li class = "already_bid"><a class = "cart1 " id = "">Your Bidd Failed</a></li>

                                                                                <?php } else if ($bidd_exist->status == 4) { ?>
                                                                                        <li class = "already_bid"><a class = "cart1 " id = "">Currently no Checkout Option</a></li>
                                                                                <?php } ?>
                                                                        <?php } else { ?>
                                                                                <li class = "bidd_submit"><input type = "text" value = "" id = "bid_value" name = "bid_name" placeholder = "Type Your Bidd Amount"></li>
                                                                                <li class = "bidd_submit"><a class = "cart1 add_to_bid" id = "<?= $products->id; ?>">Seal Your Price</a></li>
                                                                                <li class = "already_bid"></li>
                                                                        <?php }
                                                                        ?>
                                                                        <?php
                                                                } else {
                                                                        ?>
                                                                        <li><a class="cart1 " href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/Userlogin"  id="<?= $products->id; ?>">Login to Bidding</a></li>
                                                                <?php } ?>

                                                        <?php } else { ?>
                                                                <input type = "hidden" value = "<?= $products->canonical_name; ?>" id="cano_name_<?= $products->id; ?>" name="cano_name">
                                                                <li><a class="cart2" target="_blank" href="<?php echo $products->deal_link; ?>">Buy Now</a></li>
                                                        <?php } ?>
                                                </ul>
                                        </div>


                                        <div class="stars">
                                                <ul>
                                                        <?php
                                                        $j = $total_rating;
                                                        $k = 5 - $j;
                                                        ?>
                                                        <?php
                                                        for ($i = 1; $i <= $j; $i++) {
                                                                ?>
                                                                <li><i class="fa stars fa-star"></i></li>
                                                        <?php } ?>
                                                        <?php
                                                        for ($i = 1; $i <= $k; $i++) {
                                                                ?>
                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                        <?php } ?>
                                                </ul>
                                        </div>
                                        <?php if (Yii::app()->session['user']['id'] != '') { ?>
                                                <ul>
                                                        <li><a id="shareBtn" ><i class="fa dev fa-facebook"></i></a></li>
                                                        <li><a href="javascript:window.open('https://twitter.com/home?status=<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>','mywindowtitle','width=500,height=150')"><i class="fa dev fa-twitter"></i></a></li>
                                                        <!--<li><a href="javascript:window.open('https://twitter.com/home?status=http%3A//intersmarthosting.in/dealsonindia/index.php/products?name=<?php echo $products->canonical_name ?>','mywindowtitle','width=500,height=150')"><i class="fa dev fa-twitter"></i></a></li>-->
                                                        <li><a href="javascript:window.open('https://plus.google.com/share?url=<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>','mywindowtitle','width=500,height=150')"><i class="fa dev fa-google-plus"></i></a></li>
                                                        <!--<li><a href="javascript:window.open('https://plus.google.com/share?url=http%3A//intersmarthosting.in/dealsonindia/index.php/products?name=<?php echo $products->canonical_name ?>','mywindowtitle','width=500,height=150')"><i class="fa dev fa-google-plus"></i></a></li>-->
                                                        <!--<li><a id="shareBtn3"><i class="fa dev fa-linkedin"></i></a></li>-->
                                                </ul>
                                        <?php } ?>

                                </div>
                        </div>
                </div>
</section>







<section class="description">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Product Description</h1>
                                <p><?php echo $products->description; ?></p>


                        </div>
                </div>


                <div class="row">
                        <div class="col-xs-12">
                                <h1>Technical Details</h1>
                        </div>
                        <?php foreach ($product_features as $product_feature) { ?>
                                <div class="col-xs-12 col-sm-6">
                                        <div class="ink">
                                                <div class="ins1"><?php echo $product_feature->feature_heading; ?></div>
                                                <div class="ins2"><?php echo $product_feature->feature_disc; ?></div>
                                        </div>
                                </div>
                        <?php } ?>


                </div>






        </div>
</section>


<section class="deals-products">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h4>reviews</h4>
                                <?php
                                foreach ($product_reviews as $product_review) {
                                        if ($product_review->user_id != 0) {
                                                $author = BuyerDetails::model()->findByPk($product_review->user_id)->buyer_details;
                                        } else {
                                                $author = $product_review->author;
                                        }
                                        ?>
                                        <div class="review_content">
                                                <ul class="list-inline">
                                                        <?php
                                                        $j = $total_rating;
                                                        $j = $product_review->rating;
                                                        $k = 5 - $j;
                                                        ?>
                                                        <?php
                                                        for ($i = 1; $i <= $j; $i++) {
                                                                ?>
                                                                <li><i class="fa stars fa-star"></i></li>
                                                        <?php } ?>
                                                        <?php
                                                        for ($i = 1; $i <= $k; $i++) {
                                                                ?>
                                                                <li><i class="fa stars fa-star-o"></i></li>
                                                        <?php } ?>
                                                </ul>
                                                <h5>By <strong> <?php echo $author; ?></strong> On <?php echo date('d M Y', strtotime($product_review->date)); ?></h5>
                                                <p><?php echo $product_review->review; ?></p>
                                        </div>
                                <?php } ?>
                                <input type="hidden" id="review_product_id" name="" value="<?php echo $products->id; ?>" />

                                <?php if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                        ?>

                                        <form id="reviewform" class="form-inline" role="form">
                                                <div class="form-group">
                                                        <input type="text" class="form-review" id="name" value="<?php echo Yii::app()->session['user']['first_name']; ?>" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                        <input type="email" class="form-review" id="email" value="<?php echo Yii::app()->session['user']['email']; ?>" placeholder="Email address">
                                                </div>
                                                <div class="form-group">
                                                        <textarea class="form-comment" rows="5" id="comment" name="review_comment" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <div class="stars">
                                                                <input type="hidden" id="review_star" name="review_star" />
                                                                <input class="star str star-5" id="star-5-2" type="radio" value="5" name="star"/>
                                                                <label class="star  star-5" for="star-5-2"></label>
                                                                <input class="star str star-4" id="star-4-2" type="radio" value="4" name="star"/>
                                                                <label class="star star-4" for="star-4-2"></label>
                                                                <input class="star str star-3" id="star-3-2" type="radio" value="3" name="star"/>
                                                                <label class="star star-3" for="star-3-2"></label>
                                                                <input class="star str star-2" id="star-2-2" type="radio" value="2" name="star"/>
                                                                <label class="star star-2" for="star-2-2"></label>
                                                                <input class="star str star-1" id="star-1-2" type="radio" value="1" name="star"/>
                                                                <label class="star star-1" for="star-1-2"></label>

                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <input class="reviews review_submit" type="button" value="Submit">

                                                </div>

                                        </form>
                                        <div class="review_message"></div>
                                <?php } else { ?>
                                        <form id="reviewform" class="form-inline" >
                                                <div class="form-group">
                                                        <input type="text" required="" class="form-review" id="review_name" value="" placeholder="Name">
                                                </div>
                                                <div class="form-group">
                                                        <input type="email" required="" class="form-review" id="review_email" value="" placeholder="Email address">
                                                </div>
                                                <div class="form-group">
                                                        <textarea class="form-comment" rows="5" id="review_comment" placeholder="Comment"></textarea>
                                                </div>
                                                <div class="form-group">
                                                        <div class="stars">
                                                                <input type="hidden" id="review_star" name="review_star" />
                                                                <input class="star str star-5" id="star-5-2" type="radio" value="5" name="star"/>
                                                                <label class="star  star-5" for="star-5-2"></label>
                                                                <input class="star str star-4" id="star-4-2" type="radio" value="4" name="star"/>
                                                                <label class="star star-4" for="star-4-2"></label>
                                                                <input class="star str star-3" id="star-3-2" type="radio" value="3" name="star"/>
                                                                <label class="star star-3" for="star-3-2"></label>
                                                                <input class="star str star-2" id="star-2-2" type="radio" value="2" name="star"/>
                                                                <label class="star star-2" for="star-2-2"></label>
                                                                <input class="star str star-1" id="star-1-2" type="radio" value="1" name="star"/>
                                                                <label class="star star-1" for="star-1-2"></label>

                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <input class="reviews review_submit" type="button" value="Submit">

                                                </div>

                                        </form>
                                        <div class="review_message"></div>
                                        <!--                                        <div class="form-group">
                                                                                        <a href="" class="reviews" type="submit" value="Submit">Write A Review</a>
                                                                                </div>-->

                                        <br />
                                        <br />
                                <?php } ?>
                        </div>
                </div>
        </div>
</section>










<section class="deals-products">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">

                                <h4>You may also like</h4>
                                <div class="moreproducts">

                                        <?php
                                        $i = 1;
                                        foreach ($you_may_also_like as $product) {
                                                ?>
                                                <div class="item lak">
                                                        <div class="main">
                                                                <div class="mob deals-effects">
                                                                        <?php
                                                                        echo $this->renderPartial('//products/_product_details', array('product' => $product));
                                                                        ?>
                                                                </div>


                                                        </div>
                                                </div>

                                        <?php } ?>



                                </div>
                        </div>
                </div>
        </div>
</section>
<section class="deals-products">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">

                                <h4>Best Sellers</h4>
                                <div class="bestsellers">

                                        <?php
                                        $bestsellers = OrderProducts::model()->findAllByAttributes(array('status' => 1));
                                        $i = 1;
                                        foreach ($bestsellers as $bestseller) {
                                                $product = Products::model()->findByPk($bestseller->product_id);
                                                ?>
                                                <div class="item lak">
                                                        <div class="main">
                                                                <div class="mob deals-effects">
                                                                        <?php
                                                                        echo $this->renderPartial('//products/_product_details', array('product' => $product));
                                                                        ?>
                                                                </div>


                                                        </div>
                                                </div>

                                        <?php } ?>



                                </div>
                        </div>
                </div>
        </div>
</section>
<div class="modal fade" id="successcart" role="dialog">
        <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"><img class="tick" src="<?php echo yii::app()->request->baseUrl; ?>/images/tick.png">Success</h4>
                        </div>
                        <div class="modal-body">
                                <p>Success: You have added <strong><?php echo $products->product_name; ?></strong> to your shopping cart!</p>
                                <ul class="list-unstyled list-inline">
                                        <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/cart/Mycart/" class="btn proceed-cart btn-default">Go To Shopping Bag </a></li>
                                        <li><a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/cart/proceed" class="btn proceed-cart btn-default">Proceed To Checkout</a></li>
                                </ul>
                        </div>

                </div>

        </div>
</div>

<div id="fb-root"></div>
<script>
        $(document).ready(function () {
                $("#review_star").val(0);
                $(".str").click(function () {
                        var values = $(this).val();
                        $("#review_star").val(values);
                });
        });
        $(document).ready(function () {
                $(".review_submit").click(function () {
                        var name = $("#review_name").val();
                        if (name == "") {
                                alert('Name Must be filled out');
                                return false;
                        }
                        var email = $("#review_email").val();
                        if (email == "") {
                                alert('Email Must be filled out');
                                return false;
                        }
                        var comment = $("#review_comment").val();
                        var star = $("#review_star").val();
                        if (star == 0) {
                                alert('Star Must be Choosen');
                                return false;
                        }
                        var review_product_id = $("#review_product_id").val();
                        $.ajax({
                                type: "POST",
                                cache: 'false',
                                async: false,
                                url: baseurl + 'Products/Addreview',
                                data: {name: name, email: email, comment: comment, star: star, review_product_id: review_product_id}
                        }).done(function (data) {
                                $("#reviewform")[0].reset();
                                if (data == 2) {
                                        $(".review_message").html("<h5 style='color:green;'>Your Review Successfully Sent</h4>");
                                } else if (data == 1) {
                                        $(".review_message").html("<h5 style='color:red;'>You Already reviewed this Product</h4>");
                                }
                                //alert(data);

                        });
                });
        });</script>
<script>
        window.fbAsyncInit = function () {
                FB.init({
                        appId: '166556653788041',
                        xfbml: true,
                        version: 'v2.7'
                });
        };

        (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) {
                        return;
                }
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>



                <!--<script>(function (d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id))
                                return;
                            js = d.createElement(s);
                            js.id = id;
                //            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7";
                            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
                            fjs.parentNode.insertBefore(js, fjs);
                        }
                        (document, 'script', 'facebook-jssdk'));</script>-->


<script>
        document.getElementById('shareBtn').onclick = function () {
                FB.ui({
                        method: 'share',
                        display: 'popup',
                        //              action_type: 'og.likes',
                        href: '<?php echo "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']; ?>',
                        //                action_properties: JSON.stringify({
                        //                    object: 'https://developers.facebook.com/docs/',
                        //                })
                }, function (response) {
                        if (response.error_code) {
                        } else {
                                $.ajax({
                                        type: "POST",
                                        data: {'product':<?php echo $products->id ?>, 'social': '1'},
                                        url: baseurl + 'Products/share',
                                        success: function (data) {
                                                if (data == "Failed") {
                                                        $('#success_social_fail').modal('show');
                                                } else if (data == "1" || data == "2") {
                                                        $('#success_social').modal('show');
                                                }
                                        },
                                });
                        }
                });
        }
</script>
<script>

        $(document).ready(function () {

                $('.gallery').slick({
                        slidesToShow: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        slidesToScroll: 1,
                        pauseOnHover: true,
                        //            prevArrow: '<i id="prev_slide_3" class="fa fa-chevron-left"></i>',
                        //            nextArrow: '<i id="next_slide_3" class="fa fa-chevron-right"></i>',
                        responsive: [
                                {
                                        breakpoint: 1000,
                                        settings: {
                                                centerMode: false,
                                                slidesToShow: 2
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
                $('.moreproducts').slick({
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
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
                                                slidesToShow: 2
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
                $('.bestsellers').slick({
                        slidesToShow: 4,
                        autoplay: true,
                        autoplaySpeed: 3000,
                        slidesToScroll: 1,
                        pauseOnHover: false,
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
                                                slidesToShow: 2
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


<script src="<?= Yii::app()->baseUrl; ?>/js/jquery.fancybox.pack.js"></script>

<script src="<?= Yii::app()->baseUrl; ?>/js/jquery.elevatezoom.js"></script>

<script>
        $("#laksyah_zoom").elevateZoom({gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true, loadingIcon: true, responsive: true});

        //pass the images to Fancybox
        $("#laksyah_zoom").bind("click", function (e) {
                var ez = $('#laksyah_zoom').data('elevateZoom');
                $.fancybox(ez.getGalleryList());
                return false;
        });


</script>


<script>

        $(".add_to_bid").click(function () {

                var id = $(this).attr('id');
                var bid_amount = $("#bid_value").val();
                var product_price = <?php echo Yii::app()->Discount->DiscountAmount($products); ?>;
                if (bid_amount < product_price) {
                        alert('Bidd Amount Shoud be grater than Product Price');
                        return false;
                }
                $.ajax({
                        type: "POST",
                        url: baseurl + 'Products/AddToBidd',
                        data: {id: id, bid_amount: bid_amount}
                }).done(function (data) {
                        if (data == 3) {

                                alert('Somthing Error on your submission.Please Try Again');
                                return false;
                        } else if (data == 1) {
                                $(".bidd_submit").hide();
                                $(".already_bid").html("<a class='cart1'>Successfully Seal your Bidd</a>");
                        } else if (data == 2 || data == 4) {
                                alert('Somthing Error on your submission. Please Try Again');
                                return false;
                        }
                        hideLoader();
                });
        });
        $(".proceed_to_checkout").click(function () {

                var id = $(this).attr('id');
                var canname = $("#cano_name_" + id).val();
                var qty = 1;
                var option_color = 0;
                var option_size = 0;
                var master_option = 0;
                proceedcheckout(canname, qty, option_color = null, option_size = null, master_option = null);
        });
        $(".add_to_cart").click(function () {

                var id = $(this).attr('id');
                var canname = $("#cano_name_" + id).val();
                var qty = 1;
                var option_color = 0;
                var option_size = 0;
                var master_option = 0;
                addtocart(canname, qty, option_color = null, option_size = null, master_option = null);
        });
        function addtocart(canname, qty, option_color, option_size, master_option) {

                if (option_color === undefined) {
                        option_color = null;
                }
                if (option_size === undefined) {
                        option_size = null;
                }
                if (master_option === undefined) {
                        master_option = null;
                }
                $.ajax({
                        type: "POST",
                        url: baseurl + 'cart/Buynow',
                        data: {cano_name: canname, qty: qty, option_color: option_color, option_size: option_size, master_option: master_option}
                }).done(function (data) {
                        if (data == 9) {

                                $('.option_errors').html('<p>Invalid Product.Please try again</p>').show();
                        } else {
                                $('.option_errors').html("").hide();
                                $(".cart_box").html(data);
                                $('#successcart').modal('show');
                        }
                        hideLoader();
                });
        }
        function proceedcheckout(canname, qty, option_color, option_size, master_option) {

                if (option_color === undefined) {
                        option_color = null;
                }
                if (option_size === undefined) {
                        option_size = null;
                }
                if (master_option === undefined) {
                        master_option = null;
                }
                $.ajax({
                        type: "POST",
                        url: baseurl + 'cart/BuyBargain',
                        data: {cano_name: canname, qty: qty, option_color: option_color, option_size: option_size, master_option: master_option}
                }).done(function (data) {

                        if (data == 10) {
                                $('.option_errors').html('This Product Not Available');
                        } else if (data == 1) {
                                window.location.href = baseurl + "Cart/Mycart";
                        } else if (data == 2) {
                                $('.option_errors').html('Somthing Wrong Occured. Plrease Try Again');
                        } else if (data == 8) {
                                $('.option_errors').html('This Product you Already added to cart.Please Proceed to Checkout');
                        } else if (data == 11) {
                                $('.option_errors').html('You Dont have permission to checkout this product');
                        }
                        hideLoader();
                });
        }
</script>
<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap.min.js"></script>