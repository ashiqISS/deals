<?php
/* @var $this BargainDetailsController */
/* @var $model BargainDetails */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bargain-details-form',
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
                <?php echo $form->labelEx($model,'product_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'product_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'product_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'user_id'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'user_id',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'user_id'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'bidd_amount'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'bidd_amount',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'bidd_amount'); ?>
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
                <?php echo $form->labelEx($model,'doc'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'doc'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'dou'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'dou'); ?>
            </div>
        </div>

                <div class="form-group">
            <div class="col-sm-2 control-label"> 
                <?php echo $form->labelEx($model,'ub'); ?>
            </div>
            <div class="col-sm-10">
                <?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
                <?php echo $form->error($model,'ub'); ?>
            </div>
        </div>

            <!--</div>-->
    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->