<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<?php echo $this->renderPartial('_breadcremb'); ?>


<section class="checkout">
        <div class="container">
                <div class="row">



                        <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">

                                <div class="panel panel-default">
                                        <div id="m1" class="panel-collapse collapse">
                                                <div class="panel-body mbb">
                                                        <?php echo $this->renderPartial('_rightMenu'); ?>
                                                </div>
                                        </div>


                                </div>


                        </div>


                        <div class="col-lg-9 col-md-8">
                                <?php if (!empty($model)) { ?>
                                        <div class="comm">

                                                <div class="commission-1">
                                                        <div class="head-1" style="width: 33%;"><h2>Product Name</h2></div>
                                                        <div class="head-1" style="width: 33%;"><h2>Amount</h2></div>
                                                        <div class="head-1" style="width: 33%;"><h2>Date Of Added</h2></div>
                                                </div>
                                                <?php
                                                foreach ($model as $wishlist) {
                                                        $order_products = Products::model()->findByPk($wishlist->prod_id);
                                                        ?>
                                                        <div class="commission-2">
                                                                <div class="head-1" style="width: 33%;"><h2><a target="_blank" style="color: #333" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/Detail/name/<?php echo $order_products->canonical_name; ?>"><?= $order_products->product_name; ?></a></h2></div>
                                                                <div class="head-1" style="width: 33%;"><h2><?php echo Yii::app()->Discount->extax($order_products); ?></h2></div>
                                                                <div class="head-1" style="width: 33%;"><h2><?= $wishlist->date; ?></h2></div>
                                                        </div>
                                                <?php } ?>
                                        </div>
                                        <div class="btn-place-1">


                                                <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                        </div>
                                        <?php
                                } else {
                                        echo 'No Wishlisted Products Found.';
                                }
                                ?>
                        </div>


                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>



