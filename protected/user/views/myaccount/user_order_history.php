


<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>My Account</h1>
                        </div>
                </div>
        </div>
</section>
<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <ul class="breadcrumb">
                                <li><a href="#"><i class="fa hom fa-home"></i></a></li>
                                <li><?php echo CHtml::link('Account', array('Myaccount/index')); ?></li>
                                <li><span class="last"> Order History</span></li>

                        </ul>
                </div>
        </div>
</div>


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

                        <?php if (!empty($model)) { ?>
                                <div class="col-lg-9 col-md-8">
                                        <div class="comm">

                                                <div class="commission-1">
                                                        <div class="head-1"><h2>Order ID</h2></div>
                                                        <div class="head-1"><h2>Product Name</h2></div>
                                                        <div class="head-1"><h2>Amount</h2></div>
                                                        <div class="head-1"><h2>Date of order placed</h2></div>
                                                        <div class="head-1"><h2>Customer Name</h2></div>
                                                        <div class="head-1"><h2>Payment Status</h2></div>
                                                        <div class="head-1"><h2>Quantity</h2></div>
                                                </div>
                                                <?php
                                                foreach ($model as $order) {
                                                        $user = BuyerDetails::model()->findByPk($order->user_id);
                                                        $order_produ = OrderProducts::model()->findByAttributes(array('order_id' => $order->id));
                                                        $order_products = Products::model()->findByPk($order_produ->product_id);
                                                        ?>
                                                        <div class="commission-2">
                                                                <div class="head-1"><h2>ID-<?= $order->id; ?></h2></div>
                                                                <div class="head-1"><h2><?= $order_products->product_name; ?></h2></div>
                                                                <div class="head-1"><h2><?= Yii::app()->Currency->convert($order->total_amount); ?></h2></div>
                                                                <div class="head-1"><h2><?= date('d-m-Y', strtotime($order->order_date)); ?></h2></div>
                                                                <div class="head-1"><h2><?= $user->first_name; ?>  <?= $user->last_name; ?></h2></div>
                                                                <div class="head-1"><h2><?php
                                                                                if ($order->status == 0) {
                                                                                        echo 'Not Payed';
                                                                                } elseif ($order->status == 1) {
                                                                                        echo 'Payment Success';
                                                                                } elseif ($order->status == 2) {
                                                                                        echo 'Payment Failed';
                                                                                } else {
                                                                                        echo 'Error';
                                                                                }
                                                                                ?></h2></div>
                                                                <div class="head-1"><h2><?= $order_produ->quantity; ?></h2></div>
                                                        </div>
                                                <?php } ?>
                                        </div>
                                        <div class="btn-place-1">


                                                <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                        </div>
                                </div>
                                <?php
                        } else {
                                echo 'No Order History Found';
                        }
                        ?>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>



