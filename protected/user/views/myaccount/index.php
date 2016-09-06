
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
                                <li><a href="#">Account</a></li>
                                <li><span class="last">My Account</span></li>

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


                        <div class="col-lg-9 col-md-8 order-history">
                                <div class="ashes">


                                        <div class="infotech">

                                                <div class="info-1">
                                                        <span class="cap"><?= $model->first_name ?></span>
                                                        <span class="industry"><?= $model->email ?>.</span>
                                                        <div class="been">

                                                                <a href="#"><i class="fa faces fa-facebook"></i></a>
                                                                <a href="#"><i class="fa faces fa-twitter"></i></a>
                                                                <a href="#"><i class="fa faces fa-youtube"></i></a>
                                                        </div>
                                                </div>
                                                <div class="info-2">
                                                        <div class="beens">
                                                                <span class="industry">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                        Lorem Ipsum has been the industry's standard .</span>
                                                        </div>
                                                        <?php if (Yii::app()->session['merchant']) { ?>

                                                                <div class="been">
                                                                        <?php foreach ($plans as $plan) { ?>
                                                                                <img data-toggle="modal" data-target="#subscribeModal" src="<?php echo Yii::app()->baseUrl; ?>/uploads/plan/<?php echo $plan->id; ?>/plan.<?php echo $plan->image; ?>">
                                                                                <?php // echo CHtml::link('<img src="' . Yii::app()->baseUrl . '/uploads/plan/' . $plan->id . '/plan.' . $plan->image . '">', array('Myaccount/SelectPlan', 'plan' => CHtml::encode($plan->id))); ?>


                                                                                <div class="modal fade" id="subscribeModal" tabindex="-2" role="dialog">
                                                                                        <div class="modal-dialog">
                                                                                                <div class="modal-content">
                                                                                                        <div class="modal-header text-left">
                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                                                                <h2 class="modal-title"></h2>
                                                                                                                <h4>Do You Want To Upgrade Your Plan?</h4>
                                                                                                        </div>
                                                                                                        <div class="modal-body">
                                                                                                                <a href="#" class="up2 hvr-radial-out">Upgrade</a>
                                                                                                                <a href="#" class="up1 hvr-radial-out">Cancel</a>
                                                                                                        </div><!-- /.modal-content -->
                                                                                                </div><!-- /.modal-dialog -->
                                                                                        </div>
                                                                                </div> <?php } ?>
                                                                </div>


                                                                <div class="clearfix"></div>
                                                                <div class="type">
                                                                        <a href="#" class="up2 hvr-radial-out">Upgrade</a>
                                                                        <a href="#" class="up1 hvr-radial-out">Message</a>
                                                                </div>
                                                        <?php } ?>
                                                </div>
                                        </div>




                                        <div class="clearfix"></div>
                                        <?php if (Yii::app()->session['user']) { ?>
                                                <span class="recentorders"> Recent Orders</span>

                                                <div class="panel-group his" id="accordion">
                                                        <?php if (!empty($order)) { ?>
                                                                <?php
                                                                foreach ($order as $myorder) {
                                                                        ?>
                                                                        <div class="panel panel-default">
                                                                                <div class="panel-heading c1">

                                                                                        <a class="accordion-toggle min collapsed" data-toggle="collapse" data-parent="#accordion" href="#n1" aria-expanded="false"><h4 class="panel-title">
                                                                                                        <i class="fa dow fa-angle-right"></i>

                                                                                                        <ul>
                                                                                                                <li>Order ID: <?= $myorder->id; ?></li>
                                                                                                                <?php
                                                                                                                $order_produtcs = OrderProducts::model()->findByPk($myorder->id);
                                                                                                                $products = Products::model()->findByPk($order_produtcs->product_id);
                                                                                                                ?>
                                                                                                                <li class="hidden-xs"><?= $products->product_name; ?></li>
                                                                                                                <li><?php
                                                                                                                        if ($myorder->status == 0) {
                                                                                                                                echo 'Not Placed';
                                                                                                                        } elseif ($myorder->status == 1) {
                                                                                                                                echo 'Not Delivered';
                                                                                                                        } elseif ($myorder->status == 2) {
                                                                                                                                echo 'Success';
                                                                                                                        } elseif ($myorder->status == 3) {
                                                                                                                                echo 'Failed';
                                                                                                                        } else {
                                                                                                                                echo 'Error';
                                                                                                                        }
                                                                                                                        ?>
                                                                                                                </li>
                                                                                                        </ul>



                                                                                                </h4>
                                                                                        </a>

                                                                                </div>
                                                                                <div id="n1" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                                                                        <div class="panel-body wall">

                                                                                                <div class="div-main hidden-xs">
                                                                                                        <div class="div-11">
                                                                                                                <h3>Product Name</h3>
                                                                                                        </div>
                                                                                                        <div class="div-2">
                                                                                                                <h3>Date</h3>
                                                                                                        </div>
                                                                                                        <div class="div-3">
                                                                                                                <h3>Status</h3>
                                                                                                        </div>
                                                                                                </div>


                                                                                                <div class="div-main">
                                                                                                        <div class="div-4">
                                                                                                                <div class="part-11">
                                                                                                                        <h2><?= $products->product_name; ?></h2>
                                                                                                                        <?php $folder = Yii::app()->Upload->folderName(0, 1000, $products->id); ?>
                                                                                                                        <img class="catz" src="<?php echo Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $products->id . '/main.' . $products->main_image ?>">
                                                                                                                </div>
                                                                                                                <div class="part-22">
                                                                                                                        <form class="form-inline" role="form">
                                                                                                                                <label class="weight">Quantity</label>
                                                                                                                                <div class="form-group">
                                                                                                                                        <select class="quan" name="carlist" form="carform">
                                                                                                                                                <option value="volvo"><?php echo $order_produtcs->quantity; ?></option>
                                                                                                                                        </select>
                                                                                                                                </div>


                                                                                                                        </form>
                                                                                                                        <h6>Unit Price <span class="unit"><i class="fa rup fa-rupee"></i><?php echo $products->price; ?></span></h6>

                                                                                                                </div>
                                                                                                        </div>
                                                                                                        <div class="div-5">
                                                                                                                <h3> <?php echo date(" F j, Y", strtotime(date($myorder->order_date))); ?></h3>
                                                                                                        </div>
                                                                                                        <div class="div-6">
                                                                                                                <h3><?php
                                                                                                                        if ($myorder->status == 0) {
                                                                                                                                echo 'Not Placed';
                                                                                                                        } elseif ($myorder->status == 1) {
                                                                                                                                echo 'Not Delivered';
                                                                                                                        } elseif ($myorder->status == 2) {
                                                                                                                                echo 'Success';
                                                                                                                        } elseif ($myorder->status == 3) {
                                                                                                                                echo 'Failed';
                                                                                                                        } else {
                                                                                                                                echo 'Error';
                                                                                                                        }
                                                                                                                        ?></h3>
                                                                                                        </div>
                                                                                                </div>



                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        <?php
                                                                }
                                                                ?>
                                                        <?php } ?>
                                                </div>
                                        <?php } ?>
                                        <div class="clearfix"></div>
                                        <?php if (Yii::app()->session['merchant']) { ?>
                                                <?php if (!empty($sale)) { ?>

                                                        <span class="recentorders">Recent sale report</span>
                                                        <div class="comm">

                                                                <div class="commission-1">
                                                                        <div class="head-1"><h2>Product Name</h2></div>
                                                                        <div class="head-1"><h2> Order Date</h2></div>
                                                                        <div class="head-1"><h2>Price</h2></div>
                                                                        <div class="head-1"><h2>Quantity</h2></div>
                                                                        <div class="head-1"><h2>Status</h2></div>

                                                                </div>
                                                                <?php
                                                                foreach ($sale as $sales) {
                                                                        $order_id = Order::model()->findByAttributes(array('id' => $sales->order_id));
                                                                        $products_name = Products::model()->findByAttributes(array('id' => $sales->product_id));
                                                                        ?>
                                                                        <div class="commission-2">
                                                                                <div class="head-1"><h2><?= $products_name->product_name; ?></h2></div>
                                                                                <div class="head-1"><h2><?= date('d - m - Y', strtotime($order_id->order_date)); ?></h2></div>
                                                                                <div class="head-1"><h2><?= $products_name->price; ?></h2></div>
                                                                                <div class="head-1"><h2><?= $sales->quantity; ?></h2></div>
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
                                                                        </div>
                                                                <?php }
                                                                ?>
                                                        <?php }
                                                        ?>
                                                </div>

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
                                <div class="pull-right">
                                        <a href="#" class=" hvr-shutter-in-horizontals request-btn">Continue</a>
                                </div>
                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
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

