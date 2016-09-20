

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
                                <div class="accountsettings">
                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                <div class="alert alert-success">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'merchant-plans-form',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // See class documentation of CActiveForm for details on this,
                                            // you need to use the performAjaxValidation()-method described there.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
                        <!--<form role="form" action="<?= Yii::app()->baseUrl ?>/index.php/Myaccount/UpgradePlan" method="post">-->
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set">Plan Name</label>

                                                        </div>
                                                </div>

                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>

                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <!--<select class="form-select" id="sel1">-->
                                                                <?php echo CHtml::activeDropDownList($model, 'plan_name', CHtml::listData(PlanDetails::model()->findAll(), 'id', 'plan_name'), array('empty' => '--Select--', 'class' => 'form-select plan_id', 'id' => 'dropDownId')); ?>
                                                                <!--</select>-->
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set">Plan Duration<span class="dates">Start Date</span></label>

                                                        </div>
                                                </div>

                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>

                                                <div class="settings3">
                                                        <div class="form-group plan_date">
                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'date_of_creation',
                                                                    'value' => 'date_of_creation',
                                                                    'options' => array(
                                                                        'minDate' => '0', // this will disable previous dates from datepicker
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set',
                                                                        'placeholder' => 'Date From',
                                                                    ),
                                                                ));
                                                                ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set">Plan Duration<span class="dates">End Date</span></label>

                                                        </div>
                                                </div>

                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>

                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <input type="text" class="form-set" id="plan_product_date" value="" >
                                                        </div>
                                                </div>
                                        </div>



                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set">Plan Amount</label>

                                                        </div>
                                                </div>

                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>

                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <input type="text" name="plan_amount" class="form-set" id="plan_amount" value="">
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set">Plan Featured</label>

                                                        </div>
                                                </div>

                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>

                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <input type="text" class="form-set" id="plan_featured">
                                                                <input type="hidden" class="form-set" id="plan_duration">
                                                                <input type="hidden" class="form-set" id="plan_product">
                                                                <input type="hidden" name="plan_id" class="form-set" id="plan_id">
                                                                <!--<input type="hidden" class="form-set" id="plan_product_date">-->
                                                        </div>

                                                </div>
                                        </div>
                                        <button type="submit" name="plan_submit" class="hvr-shutter-in-horizontals request-btn">Upgrade</button>
                                        <!--<a href="#" class=" hvr-shutter-in-horizontals request-btn">Upgrade</a>-->
                                        <?php $this->endWidget(); ?>
                                </div>
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