


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
                        <?php if (Yii::app()->user->hasFlash('history_update')): ?>
                                <div class="alert alert-success">
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        <?php echo Yii::app()->user->getFlash('history_update'); ?>
                                </div>
                        <?php endif; ?>
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
                                                        <?php // echo $this->renderPartial('_rightMenu'); ?>
                                                </div>
                                        </div>


                                </div>


                        </div>

                        <?php if (!empty($model)) { ?>
                                <!--<div class="col-lg-9 col-md-8">-->
                                <div class="comm">

                                        <div class="commission-1">
                                                <div class="head-1 order"><h2>Order ID</h2></div>
                                                <div class="head-1 order"><h2>Product Name</h2></div>
                                                <div class="head-1 order"><h2>Total Price</h2></div>
                                                <div class="head-1 order"><h2>Date of order placed</h2></div>
                                                <div class="head-1 order"><h2>Quantity</h2></div>
                                                <div class="head-1 order"><h2>Status</h2></div>
                                                <div class="head-1 order"><h2>View Details</h2></div>
                                                <div class="head-1 order"><h2>New History</h2></div>
                                                <div class="head-1 order"><h2>Print Invoice</h2></div>
                                                <div class="head-1 order"><h2>Print Shipping Details</h2></div>
                                        </div>
        <!--                                        <form id="setOrderStatus" method="POST" action="<?php echo Yii::app()->request->baseUrl . '/index.php/Myaccount/ChangeOrderStatus' ?>">
                                                <input type="hidden" name="order_id" id="order_id"  >
                                                <input type="hidden" name="product_id" id="product_id" >
                                                <input type="hidden" name="order_status" id="order_status" >-->
                                        <?php
                                        foreach ($model as $order) {
                                                $order_produ = Order::model()->findByPk($order->order_id);
                                                $order_products = Products::model()->findByPk($order->product_id);
                                                $user = BuyerDetails::model()->findByPk($order_produ->user_id);
                                                $orderHistory = OrderHistory::model()->findByAttributes(array('order_id' => $order->order_id, 'product_id' => $order->product_id));
                                                $bill_address = AddressBook::model()->findByPk($order_produ->bill_address_id);
                                                $ship_address = AddressBook::model()->findByPk($order_produ->ship_address_id);
                                                ?>
                                                <div class="commission-2">
                                                        <div class="head-1 order"><h2>ID-<?= $order_produ->id; ?></h2></div>
                                                        <div class="head-1 order"><h2><?= $order_products->product_name; ?></h2></div>
                                                        <div class="head-1 order"><h2><?= Yii::app()->Currency->convert($order_produ->total_amount); ?></h2></div>
                                                        <div class="head-1 order"><h2><?= date('d-m-Y', strtotime($order_produ->order_date)); ?></h2></div>
                                                        <div class="head-1 order"><h2><?= $order->quantity; ?></h2></div>
                                                        <div class="head-1 order"><h2> <?php
                                                                        if ($order->status == 0) {
                                                                                echo 'Not Placed';
                                                                        } elseif ($order->status == 1) {
                                                                                echo 'Not Delivered';
                                                                        } elseif ($order->status == 2) {
                                                                                echo 'Success';
                                                                        } elseif ($order->status == 3) {
                                                                                echo 'Failed';
                                                                        } else {
                                                                                echo 'Error';
                                                                        }
                                                                        ?></h2></div>
                                                        <div class="head-1 order"><h2><?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%"></i>', array('Myaccount/ViewOrderHistory', 'id' => CHtml::encode($order->id))); ?></h2></div>
                                                        <div class="head-1 order"><h2><?php echo CHtml::link('<i class="fa fa-list-ul" ></i>', array('Myaccount/NewOrderHistory', 'id' => CHtml::encode($order->id))); ?></h2></div>
                                                        <div class="head-1 order"><h2>
                                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/index.php/Myaccount/PrintProductInvoice/id/' . $order->id ?>" target="_blank"><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.jpg" style="max-width: 15%;" title="Print"></a>
                                                                </h2>
                                                        </div>
                                                        <div class="head-1 order"><h2>
                                                                        <a href="<?php echo Yii::app()->request->baseUrl . '/index.php/Myaccount/PrintShippingDetail/id/' . $order->id ?>" target="_blank"><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/print.jpg" style="max-width: 15%;" title="Print"></a>
                                                                </h2>
                                                        </div>
                                                </div>
                                        <?php } ?>
                                        <!--</form>-->
                                </div>
                                <div class="btn-place-1">
                                        <?php echo CHtml::link('Back', array('Myaccount/VendorSettings'), array('class' => 'reward hvr-shutter-in-horizontal left-btns')); ?>
                                </div>
                                <!--</div>-->
                                <?php
                        } else {
                                echo 'No Order History Found';
                        }
                        ?>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php // echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>

<script>
        function updateOrderStatus(productid, orderid, val)
        {
                // get value of selected priceRange
                var e = document.getElementById("order_status_option");
                var order_status = e.options[e.selectedIndex].value;
                //                alert(order_status);

                // set value of selected price range
                document.getElementById("order_status").value = val;
                document.getElementById("product_id").value = productid;
                document.getElementById("order_id").value = orderid;
//                $("#order_status").val(val);
//                $("#product_id").val(productid);
                //                $("#order_id").val(orderid);
                document.getElementById("setOrderStatus").submit();
                //                $('#setOrderStatus').submit();

        }

</script>



