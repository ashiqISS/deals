<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?= Yii::app()->baseUrl ?>/images/c1.jpg">
                        </div>
                </div>
        </div>
</section>

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
                                <div class="vendor_reg">
                                        <?php
                                        $form1 = $this->beginWidget('CActiveForm', array(
                                            'id' => 'merchant-registration-form',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // See class documentation of CActiveForm for details on this,
                                            // you need to use the performAjaxValidation()-method described there.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>
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
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">First Name</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'first_name', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'first_name', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Last Name</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'last_name', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'last_name', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Email</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'email', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'email', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Phone Number</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'phone_number', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'phone_number', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Address</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'address', array('class' => 'form-acc')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'address', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Pin Code</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'pincode', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'pincode', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Country</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo CHtml::activeDropDownList($vendor, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--Select Country--', 'class' => 'form-select', 'options' => array(99 => array('selected' => 'selected')))); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'country', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">State</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo CHtml::activeDropDownList($vendor, 'state', CHtml::listData(MasterState::model()->findAllByAttributes(array('status' => 1)), 'Id', 'state'), array('empty' => '--Select State--', 'class' => 'form-select2', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'state', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">City</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'city', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'city', array('class' => 'red')); ?>
                                                        </div>
                                                </div>

                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Account Number</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'account_no', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'account_no', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">IFSC Code</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'ifsc_code', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'ifsc_code', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Shop Name</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form1->textField($vendor, 'shop_name', array('class' => 'form-set')); ?>
                                                                </div>
                                                                <?php echo $form1->error($vendor, 'shop_name', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="btn-place-1">
                                                <?php echo CHtml::link('Back', array('Myaccount/index/type/vendor'), array('class' => 'reward hvr-shutter-in-horizontal left-btns')); ?>
                                        </div>
                                        <div class="btn-place-2">
                                                <button type="submit"  name="btn_submit" class="reward hvr-shutter-in-horizontal3 right-btn">Continue</button>
                                        </div>
                                        <div class="btn-place-2">
                                                <h3 style="margin-top: 50px;"><a style="color: #e8820b; font-size: 14px; font-weight: bold; " href="<?= Yii::app()->baseUrl ?>/index.php/myaccount/ResetPassword">Reset Your Password</a></h3>
                                        </div>
                                        <?php $this->endWidget(); ?>

                                        <!-- form -->
                                </div>
                        </div><!-- form -->

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>