<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<?php echo $this->renderPartial('_breadcremb'); ?>
<section class="checkout">
        <div class="container">
                <div class="row">
                        <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">
                                <div class="panel panel-default">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#m1"> <div class="panel-heading headz">
                                                        <span class="panel-title">
                                                                <i class="glyphicon gly glyphicon-plus"></i>Filter By Price
                                                        </span>
                                                </div>
                                        </a>
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

                                                        <div class="head-3 "><h2>Customer Name</h2></div>
                                                        <div class="head-3"><h2>Email</h2></div>
                                                        <div class="head-3"><h2>Phone</h2></div>
                                                        <div class="head-3"><h2>Order ID</h2></div>
                                                        <div class="head-3 "><h2>Product Name</h2></div>
                                                        <!--                                                        <div class="head-1"><h2>Amount</h2></div>
                                                                                                                <div class="head-1"><h2>Date of order placed</h2></div>
                                                                                                                <div class="head-1"><h2>Quantity</h2></div>-->
                                                </div>
                                                <?php
                                                foreach ($model as $order) {
                                                        $order_produ = Order::model()->findByPk($order->order_id);
                                                        $order_products = Products::model()->findByPk($order->product_id);
                                                        $user = BuyerDetails::model()->findByPk($order_produ->user_id);
                                                        ?>
                                                        <div class="commission-2">
                                                                <?php if ($order_produ->user_id == '' || $order_produ->user_id == 0) { ?>
                                                                        <div class="head-3"><h2>Guest</h2></div>
                                                                <?php } else { ?>
                                                                        <div class="head-3"><h2><?= $user->first_name; ?> <?= $user->last_name; ?></h2></div>
                                                                <?php } ?>
                                                                <div class="head-3"><h2><?= $user->email; ?></h2></div>
                                                                <div class="head-3"><h2><?= $user->phone_number; ?></h2></div>
                                                                <div class="head-3"><h2>ID-<?= $order_produ->id; ?></h2></div>
                                                                <div class="head-3"><h2><?= $order_products->product_name; ?></h2></div>
                                                        </div>
                                                <?php } ?>
                                        </div>
                                        <div class="btn-place-1">


                                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/Reports" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                        </div>
                                        <?php
                                } else {
                                        echo 'No Sales Found';
                                }
                                ?>
                        </div>


                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>



