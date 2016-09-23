

<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Checkout</h1>
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
                                <li><span class="last">Plan Details</span></li>

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



                        <div class="col-lg-9 col-md-8">
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="accountsettings">
                                                <div class="alert alert-success">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        </div>
                                <?php endif; ?>


                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="accountsettings">
                                                <div class="alert alert-danger">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        </div>
                                <?php endif; ?>


                                <?php if (Yii::app()->session['merchant']) { ?>
                                        <?php if (!empty($yourplans)) { ?>

                                                <span class="recentorders">Your Plans</span>
                                                <div class="comm">

                                                        <div class="commission-1">
                                                                <div class="head-2"><h2>Plan Name</h2></div>
                                                                <div class="head-2"><h2>Amount</h2></div>
                                                                <div class="head-2"><h2>Plan Start Date</h2></div>
                                                                <div class="head-2"><h2>Plan Expiry Date</h2></div>
                                                                <div class="head-2"><h2>Products Left</h2></div>
                                                                <div class="head-2"><h2>Ads Left</h2></div>
                                                                <div class="head-2"><h2>View</h2></div>

                                                        </div>
                                                        <?php
                                                        foreach ($yourplans as $yourplan) {
                                                                ?>
                                                                <div class="commission-2">
                                                                        <div class="head-2"><h2><?= PlanDetails::model()->findByPk($yourplan->plan_id)->plan_name; ?></h2></div>
                                                                        <div class="head-2"><h2><?= Yii::app()->Currency->convert($yourplan->amount); ?></h2></div>
                                                                        <div class="head-2"><h2><?= date('d-M-Y', strtotime($yourplan->doc)); ?></h2></div>
                                                                        <div class="head-2"><h2><?php
                                                                                        $date = date('Y-m-d', strtotime($yourplan->doc));
                                                                                        echo date("d-M-Y", strtotime($date . " +  $yourplan->no_of_days days"));
                                                                                        ?></h2></div>
                                                                        <div class="head-2"><h2><?= $yourplan->no_of_product_left; ?></h2></div>
                                                                        <div class="head-2"><h2><?= $yourplan->no_of_ads_left; ?></h2></div>

                                                                        <div class="head-2"><h2><?php echo CHtml::link('<i class="fa fa-eye"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('Myaccount/MerchantPlanDetail', 'plan' => CHtml::encode($yourplan->id)), array('data-toggle' => 'tooltip', 'title' => 'View Plans Details')); ?></h2></div>

                                                                </div>
                                                        <?php }
                                                        ?>
                                                </div>
                                        <?php }
                                        ?>


                                <?php } ?>
                                <?php if (Yii::app()->session['merchant']) { ?>
                                        <?php if (!empty($allplans)) { ?>

                                                <span class="recentorders">Available plans</span>
                                                <div class="comm">

                                                        <div class="commission-1">
                                                                <div class="head-1"><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2></div>
                                                                <div class="head-1"><h2>Plan Name</h2></div>
                                                                <div class="head-1"><h2>Amount</h2></div>
                                                                <div class="head-1"><h2>Duration</h2></div>
                                                                <div class="head-1"><h2>Product Limit</h2></div>
                                                                <!--<div class="head-1"><h2>Quantity</h2></div>-->

                                                                <div class="head-1"><h2>Upgrade</h2></div>

                                                        </div>
                                                        <?php
                                                        foreach ($allplans as $allplan) {
                                                                ?>
                                                                <div class="commission-2">
                                                                        <div class="head-1"><img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/plan/<?php echo $allplan->id; ?>/plan.<?php echo $allplan->image; ?>" /></div>
                                                                        <div class="head-1"><h2><?= $allplan->plan_name; ?></h2></div>
                                                                        <div class="head-1"><h2><?= Yii::app()->Currency->convert($allplan->amount); ?></h2></div>
                                                                        <div class="head-1"><h2><?= $allplan->no_of_days; ?></h2></div>
                                                                        <div class="head-1"><h2><?= $allplan->no_of_products; ?></h2></div>
                                                                        <div class="head-1"><h2><?php echo CHtml::link('<i class="fa fa-cart-plus"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('Myaccount/PlanDetail', 'plan' => CHtml::encode($allplan->id)), array('data-toggle' => 'tooltip', 'title' => 'Upgrade Plan')); ?></h2></div>

                                                                </div>
                                                        <?php }
                                                        ?>
                                                </div>
                                        <?php }
                                        ?>


                                <?php } ?>

                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>
<script>
        $(document).ready(function () {
                $(".plan_id").change(function () {
                        var plan_id = $('option:selected', $(this)).val();
                        var baseurl = "<?php print Yii::app()->request->baseUrl . "/index.php/"; ?>";
                        $.ajax({
                                url: baseurl + 'Myaccount/UpgradePlanProduct',
                                type: "POST",
                                cache: 'false',
                                data: {plan_id: plan_id}
                        }).done(function (data) {
                                var obj = $.parseJSON(data);
                                $("#plan_amount").val(obj.plan);
                                $("#plan_amount").val(obj.plan);
                                $("#plan_id").val(obj.plan_products_id);
                                if (obj.plan_featured == 1) {
                                        $('#plan_featured').val('Yes');
                                } else {
                                        $('#plan_featured').val('No');
                                }
                        });
                });
        });

        $(".plan_date").change(function () {
                var plan_date = $("#MerchantPlans_date_of_creation").val();
                var plan_id = $("#plan_product").val();
                $.ajax({
                        url: baseurl + 'Myaccount/UpgradePlanProductDate',
                        type: "POST",
                        cache: 'false',
                        data: {plan_date: plan_date, plan_id: plan_id}
                }).done(function (data) {
                        var obj = $.parseJSON(data);
                        $("#plan_product_date").val(obj.newdates);
                });
        });


</script>

<script>
        $(document).ready(function () {
                var selectIds = $('#m1');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>