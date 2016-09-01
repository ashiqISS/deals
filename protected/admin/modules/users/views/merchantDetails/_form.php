<?php
/* @var $this MerchantDetailsController */
/* @var $model MerchantDetails */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'merchant-details-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php //echo $form->errorSummary($model); ?>
        <br/>
        <!--<div class="form-inline">-->


        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'fullname'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'fullname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'fullname'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_rating'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'merchant_rating', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_rating'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'merchant_type', array('1' => "Wholesale", '2' => "Retail"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_type'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_point'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'merchant_point', array('size' => 20, 'maxlength' => 20, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_point'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_badge'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'merchant_badge', array('size' => 50, 'maxlength' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_badge'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'shop_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'shop_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shop_name'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'shop_logo'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'shop_logo', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shop_logo'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'shop_banner'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'shop_banner', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shop_banner'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'address'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'address', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'address'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'pincode'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'pincode', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'pincode'); ?>
                </div>
        </div>




        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'country'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAll(), 'id', 'country_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'country'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'state'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'state', CHtml::listData(States::model()->findAll(), 'Id', 'state_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'state'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'district'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'district', CHtml::listData(Districts::model()->findAll(), 'Id', 'district_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'district'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'city'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'city'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'locality'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'locality', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'locality'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'vat_tin'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'vat_tin', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'vat_tin'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_payment_done'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_payment_done', array('1' => "Yes", '2' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_payment_done'); ?>
                </div>
        </div>


        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->