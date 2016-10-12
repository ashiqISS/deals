<?php
/* @var $this OrderProductsController */
/* @var $model OrderProducts */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-products-form',
        'htmlOptions' => array('class' => 'form-horizontal'),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
    <br/>
    <!--<div class="form-inline">-->
            <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'order_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'order_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'order_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'product_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'product_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'product_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'quantity'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'quantity',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'quantity'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'amount'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'amount',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'amount'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'DOC'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'DOC',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'DOC'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'status'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'status'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'order_comments'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'order_comments',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
                <?php echo $form->error($model,'order_comments'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'gift_option'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'gift_option',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'gift_option'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'rate'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'rate',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'rate'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'option_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'option_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'option_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'merchant_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'merchant_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'merchant_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'shipping_charge'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'shipping_charge',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'shipping_charge'); ?>
            </div>
        </div>

            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->