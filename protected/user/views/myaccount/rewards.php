
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
                        </div>
                        <div class="info-2">
                            <div class="beens">
                                <span class="industry">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard .</span>
                            </div>

                        </div>;
                    </div>




                    <div class="clearfix"></div>
                    <span class="recentorders"> Rewards</span>

                    <div class="panel-group his" id="accordion">
                        <?php if (!empty($rewards)) { ?>

                                <div class="panel panel-default">
                                    <div class="panel-heading c1">

                                        <a class="accordion-toggle min collapsed" data-toggle="collapse" data-parent="#accordion" href="#n<?php echo $i; ?>" aria-expanded="false"><h4 class="panel-title">
                                                <i class="fa dow fa-angle-right"></i>

                                                <ul>
                                                    <li>Total Reward Point :  <?= $rewards->point; ?></li>
                                                    <?php
                                                    $order_produtcs = OrderProducts::model()->findAllByAttributes(array('order_id' => $myorder->id));
                                                    ?>
                                                    <li class="hidden-xs"><?= $products->product_name; ?></li>
                                                    <li>Reward Point History</li>
                                                </ul>



                                            </h4>
                                        </a>

                                    </div>
                                    <div id="n<?php echo $i; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                                        <div class="panel-body wall">

                                            <div class="div-main hidden-xs">
                                                <div class="div-3">
                                                    <h3>Product Name</h3>
                                                </div>
                                                <div class="div-2">
                                                    <h3>Date</h3>
                                                </div>
                                                <div class="div-2">
                                                    <h3>Social Media</h3>
                                                </div>
                                                <div class="div-2">
                                                    <h3>Point</h3>
                                                </div>
                                            </div>
                                            <?php
                                            foreach ($reward_history as $history) {
                                                    $products = Products::model()->findByPk($history->product_id);
                                                    ?>
                                                    <div class = "div-main">
                                                        <div class = "div-3" style=" height: 42px;">
                                                            <!--<div class = "part-2">-->
                                                            <h3><?php echo $products->product_name; ?></h3>

                                                            <!--</div>-->

                                                        </div>
                                                        <div class="div-2">
                                                            <h3> <?php echo date(" F j, Y", strtotime(date($history->date))); ?></h3>
                                                        </div>
                                                        <div class="div-2">
                                                            <?php $social = MasterSocial::model()->findByPk($history->social_id) ?>
                                                            <h3><?php echo $social->site; ?></h3>
                                                        </div>
                                                        <div class="div-2">
                                                            <h3><?php echo $history->point; ?></h3>
                                                        </div>
                                                    </div>

                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>
                    <?php if (Yii::app()->session['merchant']) { ?>
                            <?php if (!empty($sale)) { ?>

                                    <span class="recentorders">Recent sale report</span>
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

