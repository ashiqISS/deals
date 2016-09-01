
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
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Address Book</h1>
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
                                <li><span class="last">Address Book</span></li>

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
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'address-book-newaddress-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // See class documentation of CActiveForm for details on this,
                                    // you need to use the performAjaxValidation()-method described there.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
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
                                <div class="accountsettings">



                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'name'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'name', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'name'); ?>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'email'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'email', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'email'); ?>
                                                        </div>
                                                </div>

                                        </div>


                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set">  <?php echo $form->labelEx($model, 'phone'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'phone', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'phone'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'address_line_1'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textArea($model, 'address_line_1', array('class' => 'form-acc')); ?>
                                                                <?php echo $form->error($model, 'address_line_1'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'address_line_2'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textArea($model, 'address_line_2', array('class' => 'form-acc')); ?>
                                                                <?php echo $form->error($model, 'address_line_2'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'country'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Please select--', 'class' => 'form-select', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                                <?php echo $form->error($model, 'country'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'state'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'state', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'state'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'city'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'city', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'city'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'pincode'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'pincode', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'pincode'); ?>
                                                        </div>
                                                </div>

                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'default_billing_address'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->dropDownList($model, 'default_billing_address', array('' => "Default Billing Address", '1' => "Yes", '0' => "No"), array('class' => 'form-select')); ?>
                                                                <?php echo $form->error($model, 'default_billing_address'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'default_shipping_address'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->dropDownList($model, 'default_shipping_address', array('' => "Default Shipping Address", '1' => "Yes", '0' => "No"), array('class' => 'form-select')); ?>
                                                                <?php echo $form->error($model, 'default_shipping_address'); ?>
                                                        </div>
                                                </div>

                                        </div>
                                </div>
                                <div class="btn-place-1">
                                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                </div>
                                <!--                                <div class="btn-place-2">
                                <?php //echo CHtml::submitButton('Continue', array('class' => 'reward hvr-shutter-in-horizontal3 right-btn')); ?>
                                                                </div>-->
                                <div class="btn-place-2">
                                        <button type="submit"  name="btn_submit" class="reward hvr-shutter-in-horizontal3 right-btn">Continue</button>
                                </div>

                                <?php $this->endWidget(); ?>

                        </div>
                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>