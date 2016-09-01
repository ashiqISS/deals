<?php
/* @var $this MerchantController */
/* @var $model Merchant */
/* @var $form CActiveForm */
?>

<div class="wide form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'action' => Yii::app()->createUrl($this->route),
            'method' => 'get',
        ));
        ?>

        <div class="row">
                <?php echo $form->label($model, 'id'); ?>
                <?php echo $form->textField($model, 'id', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'fullname'); ?>
                <?php echo $form->textField($model, 'fullname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'phone_number'); ?>
                <?php echo $form->textField($model, 'phone_number', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'verification_code'); ?>
                <?php echo $form->textField($model, 'verification_code', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'email_verification'); ?>
                <?php echo $form->textField($model, 'email_verification', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'product_categories'); ?>
                <?php echo $form->textField($model, 'product_categories', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
        </div>
        <div class="row">
                <?php echo $form->label($model, 'merchant_point'); ?>
                <?php echo $form->textField($model, 'merchant_point', array('class' => 'form-control')); ?>
        </div>
        <div class="row">
                <?php echo $form->label($model, 'merchant_badge'); ?>
                <?php echo $form->textField($model, 'merchant_badge', array('class' => 'form-control')); ?>
        </div>
        <div class="row">
                <?php echo $form->label($model, 'merchant_rating'); ?>
                <?php echo $form->textField($model, 'merchant_rating', array('class' => 'form-control')); ?>
        </div> 
        <div class="row">
                <?php echo $form->label($model, 'merchant_type'); ?>
                <?php echo $form->textField($model, 'merchant_type', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'product_count'); ?>
                <?php echo $form->textField($model, 'product_count', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'shop_name'); ?>
                <?php echo $form->textField($model, 'shop_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'shop_logo'); ?>
                <?php echo $form->textField($model, 'shop_logo', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'shop_banner'); ?>
                <?php echo $form->textField($model, 'shop_banner', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'address'); ?>
                <?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'pincode'); ?>
                <?php echo $form->textField($model, 'pincode', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'city'); ?>
                <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'locality'); ?>
                <?php echo $form->textField($model, 'locality', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'landmark'); ?>
                <?php echo $form->textField($model, 'landmark', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'state'); ?>
                <?php echo $form->textField($model, 'state', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'country'); ?>
                <?php echo $form->textField($model, 'country', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'vat_tin'); ?>
                <?php echo $form->textField($model, 'vat_tin', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'status'); ?>
                <?php echo $form->textField($model, 'status', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'last_login'); ?>
                <?php echo $form->textField($model, 'last_login', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'bad_attempts'); ?>
                <?php echo $form->textField($model, 'bad_attempts', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'CB'); ?>
                <?php echo $form->textField($model, 'CB', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'UB'); ?>
                <?php echo $form->textField($model, 'UB', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'DOC'); ?>
                <?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'DOU'); ?>
                <?php echo $form->textField($model, 'DOU', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'is_payment_done'); ?>
                <?php echo $form->textField($model, 'is_payment_done', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'field1'); ?>
                <?php echo $form->textField($model, 'field1', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'field2'); ?>
                <?php echo $form->textField($model, 'field2', array('class' => 'form-control')); ?>
        </div>

        <div class="row">
                <?php echo $form->label($model, 'field3'); ?>
                <?php echo $form->textField($model, 'field3', array('class' => 'form-control')); ?>
        </div>

        <div class="row buttons">
                <?php echo CHtml::submitButton('Search'); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- search-form -->