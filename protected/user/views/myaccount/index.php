
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/count-to.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
<script>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
</script>

<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/hover.css" rel="stylesheet" media="all">

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


                        <div class="col-lg-9 col-md-8 order-history">
                                <div class="ashes">


                                        <div class="infotech">

                                                <div class="info-1">
                                                        <span class="cap"><?= $model->first_name ?></span>
                                                        <span class="industry"><?= $model->email ?>.</span>
                                                        <!--                            <div class="been">

                                                                                        <a href="#"><i class="fa faces fa-facebook"></i></a>
                                                                                        <a href="#"><i class="fa faces fa-twitter"></i></a>
                                                                                        <a href="#"><i class="fa faces fa-youtube"></i></a>
                                                                                    </div>-->
                                                </div>
                                                <div class="info-2">
                                                        <div class="beens ">
                                                                <span class="industry">
                                                                        Phone Number : <?php echo $model->phone_number; ?>
                                                                </span>
                                                                <?php if (Yii::app()->session['user']) { ?>
                                                                        <span class="industry">
                                                                                Wallet Amount : <?php echo Yii::app()->Currency->convert($model->wallet_amt); ?>
                                                                        </span>
                                                                <?php } ?>
                                                                <?php if (Yii::app()->session['merchant']) { ?>
                                                                        <span class="industry">
                                                                                Current Plan : <?php
                                                                                $merchant_plan = MerchantPlans::model()->findByPk(Yii::app()->session['merchant']['id']);
                                                                                echo $merchant_plan->plan_name;
                                                                                ?>
                                                                        </span>
                                                                <?php } ?>
                                                        </div>
                                                        <?php if (Yii::app()->session['merchant']) { ?>

                                                                <div class="been">
                                                                        <?php if ($model->merchant_badge == "1") { ?>
                                                                                <img src="<?php echo Yii::app()->baseUrl . '/images/g2.png'; ?>">
                                                                        <?php } else if ($model->merchant_badge == "2") { ?>
                                                                                <img src="<?php echo Yii::app()->baseUrl . '/images/g1.png'; ?>">
                                                                        <?php } else if ($model->merchant_badge == "3") { ?>
                                                                                <img src="<?php echo Yii::app()->baseUrl . '/images/g3.png'; ?>">
                                                                        <?php } ?>

                                                                </div>
                                                                <!--                                                                <div class="been">
                                                                <?php
                                                                foreach ($plans as $plan) {
//                                                                                $plan_id .= $plan->id;
                                                                        ?>
                                                                                                                                                                                                                        <img data-toggle="modal" data-target="#subscribeModal" src="<?php echo Yii::app()->baseUrl; ?>/uploads/plan/<?php echo $plan->id; ?>/plan.<?php echo $plan->image; ?>">
                                                                        <?php // echo CHtml::link('<img src="' . Yii::app()->baseUrl . '/uploads/plan/' . $plan->id . '/plan.' . $plan->image . '">', array('Myaccount/SelectPlan', 'plan' => CHtml::encode($plan->id))); ?>
                                                                <?php } ?>

                                                                                                                                        <div class="modal fade" id="subscribeModal" tabindex="-2" role="dialog">
                                                                                                                                                <div class="modal-dialog">
                                                                                                                                                        <div class="modal-content">
                                                                                                                                                                <div class="modal-header text-left">
                                                                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                                                                                        <h2 class="modal-title"></h2>
                                                                                                                                                                        <h4>Do You Want To Create  Your Plan?</h4>
                                                                                                                                                                </div>
                                                                                                                                                                <div class="modal-body">
                                                                                                                                                                        <div class="middle_modal">
                                                                                                                                                                                <a href="<?= Yii::app()->baseUrl; ?>/index.php/Myaccount/SelectPlan/plan?=<?php echo $plan->id; ?>"  class="up2 hvr-radial-out">Submit</a>
                                                                                                                                                                                <a href="#" class="up1 hvr-radial-out">Cancel</a>
                                                                                                                                                                        </div>
                                                                                                                                                                </div> /.modal-content
                                                                                                                                                        </div> /.modal-dialog
                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>-->


                                                                <div class="clearfix"></div>
                                                                <div class="type">
                                                                        <?php echo CHtml::link('Upgrade', array('Myaccount/UpgradePlan'), array('class' => 'up2 hvr-radial-out')); ?>
                                                                        <?php echo CHtml::link('Message', array('Myaccount/Message'), array('class' => 'up1 hvr-radial-out')); ?>
                                                                </div>
                                                        <?php } ?>
                                                </div>
                                        </div>




                                        <div class="clearfix"></div>
                                        <?php if (Yii::app()->session['user']) { ?>
                                                <span class="recentorders"> Recent Orders</span>

                                                <div class="col-xs-12">
                                                        <?php if (!empty($models)) { ?>
                                                                <div class="comm">

                                                                        <div class="commission-1">
                                                                                <div class="head-4"><h2>Order ID</h2></div>
                                                                                <div class="head-1"><h2>Product Name</h2></div>
                                                                                <div class="head-4"><h2>Quantity</h2></div>
                                                                                <div class="head-1"><h2>Amount</h2></div>
                                                                                <div class="head-1"><h2>Date </h2></div>
                                                                                <!--<div class="head-1"><h2>Name</h2></div>-->
                                                                                <div class="head-1"><h2>Status</h2></div>

                                                                                <div class="head-1"><h2></h2></div>
                                                                        </div>
                                                                        <?php
                                                                        foreach ($models as $model) {
                                                                                $orders = OrderProducts::model()->findAllByAttributes(array('order_id' => $model->id));
                                                                                $user = BuyerDetails::model()->findByPk($model->user_id);
//                                                        $order_produ = OrderProducts::model()->findByAttributes(array('order_id' => $order->id));

                                                                                foreach ($orders as $order) {
                                                                                        $order_products = Products::model()->findByPk($order->product_id);
                                                                                        ?>
                                                                                        <div class="commission-2">
                                                                                                <div class="head-4"><h2>#<?= $order->order_id; ?></h2></div>
                                                                                                <div class="head-1"><h2><?= $order_products->product_name; ?></h2></div>
                                                                                                <div class="head-4"><h2><?= $order_products->quantity; ?></h2></div>
                                                                                                <div class="head-1"><h2><?= Yii::app()->Currency->convert($model->total_amount); ?></h2></div>
                                                                                                <div class="head-1"><h2><?= date('d-m-Y', strtotime($order->DOC)); ?></h2></div>
                                                                                                <!--<div class="head-1"><h2><?= $user->first_name; ?>  <?= $user->last_name; ?></h2></div>-->
                                                                                                <div class="head-1"><h2><?php
                                                                                                                if ($order->status == 0) {
                                                                                                                        echo 'Not Placed';
                                                                                                                } elseif ($order->status == 1) {
                                                                                                                        echo 'Order Processing';
                                                                                                                } elseif ($order->status == 2) {
                                                                                                                        echo 'Order Canceled';
                                                                                                                } else {
                                                                                                                        echo 'Order Returned';
                                                                                                                }
                                                                                                                ?></h2></div>

                                                                                                <div class="head-1"><h2><?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%; font-size:22px; color:#333"></i>', array('Myaccount/UserOrderDetail', 'id' => CHtml::encode($order->id))); ?></h2></div>


                                                                                        </div>
                                                                                        <?php
                                                                                }
                                                                        }
                                                                        ?>
                                                                </div>
                                                                <div class="btn-place-1">


                                                                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                                                </div>
                                                                <?php
                                                        } else {
                                                                echo 'No Orders Found';
                                                        }
                                                        ?>
                                                </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                        <?php if (Yii::app()->session['merchant']) { ?>
                                                <?php if (!empty($sale)) { ?>

                                                        <span class="recentorders">Recent Orders</span>
                                                        <div class="comm">

                                                                <div class="commission-1">
                                                                        <div class="head-1"><h2>Order ID</h2></div>
                                                                        <div class="head-1"><h2>Product Name</h2></div>
                                                                        <div class="head-1"><h2>Order Date</h2></div>
                                                                        <div class="head-1"><h2>Price</h2></div>
                                                                        <!--<div class="head-1"><h2>Quantity</h2></div>-->
                                                                        <div class="head-1"><h2>Status</h2></div>
                                                                        <div class="head-1"><h2>View Details</h2></div>

                                                                </div>
                                                                <?php
                                                                foreach ($sale as $sales) {
                                                                        $order_id = Order::model()->findByAttributes(array('id' => $sales->order_id));
                                                                        $products_name = Products::model()->findByAttributes(array('id' => $sales->product_id));
                                                                        ?>
                                                                        <div class="commission-2">
                                                                                <div class="head-1"><h2>#<?= $sales->order_id; ?></h2></div>
                                                                                <div class="head-1"><h2><?= $products_name->product_name; ?></h2></div>
                                                                                <div class="head-1"><h2><?= date('d - m - Y', strtotime($order_id->order_date)); ?></h2></div>
                                                                                <div class="head-1"><h2><?= $products_name->price; ?></h2></div>
                                                                                <!--<div class="head-1"><h2><?= $sales->quantity; ?></h2></div>-->
                                                                                <div class="head-1"><h2><?php
                                                                                                if ($order_id->status == 0) {
                                                                                                        echo 'Not Placed';
                                                                                                } elseif ($order_id->status == 1) {
                                                                                                        echo 'Not Delivered';
                                                                                                } elseif ($order_id->status == 2) {
                                                                                                        echo 'Success';
                                                                                                } elseif ($order_id->status == 3) {
                                                                                                        echo 'Failed';
                                                                                                } else {
                                                                                                        echo 'Error';
                                                                                                }
                                                                                                ?></h2></div>
                                                                                <div class="head-1"><h2><?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%;font-size: 19px;
    color: #000;"></i>', array('Myaccount/OrderViewDetail', 'id' => CHtml::encode($sales->id))); ?></h2></div>

                                                                        </div>
                                                                <?php }
                                                                ?>
                                                        </div>
                                                <?php }
                                                ?>


                                        <?php } ?>
                                        <div class="clearfix"></div>
                                        <?php if (!empty($deal)) { ?>
                                                <span class="recentorders">My Deal Products</span>
                                                <div class="comm">

                                                        <div class="commission-1">
                                                                <div class="head-1 deals1"><h2>Product Name</h2></div>
                                                                <div class="head-1 deals2"><h2>Product URL</h2></div>
                                                                <div class="head-1 deals1"><h2>Date</h2></div>
                                                        </div>

                                                        <?php foreach ($deal as $deals) { ?>
                                                                <div class="commission-2">
                                                                        <div class="head-1 deals1"><h2><?= $deals->product_name; ?></h2></div>
                                                                        <div class="head-1 deals2"><h2><?= $deals->product_url; ?></h2></div>
                                                                        <div class="head-1 deals1"><h2><?= date("d/m/Y", strtotime($deals->doc)); ?></h2></div>

                                                                </div>
                                                        <?php } ?>

                                                </div>
                                                <?php
                                        } else {

                                        }
                                        ?>

                                </div>
                                <!--                                <div class="pull-right">
                                                                        <a href="#" class=" hvr-shutter-in-horizontals request-btn">Continue</a>
                                                                </div>-->
                                <!--</div>-->


                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
</section>




<script>
        var selectIds = $('#n1,#n2,#n3,#panel4,#panel5,#panel6,#panel7,#panel8,#panel9,#panel10,#panel11,#panel12,#panel13,#panel14');
        $(function ($) {
                selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                        $(this).prev().find('.fa').toggleClass('fa-angle-right fa-angle-down').delay(6000);
                })
        });
</script>

