<?php
/* @var $this UserReviewsController */
/* @var $model UserReviews */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'user-reviews-form',
            'htmlOptions' => array('class' => 'form-horizontal'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <br/>
        <!--<div class="form-inline">-->


        <?php echo $form->hiddenField($model, 'user_id', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control', 'value' => 0)); ?>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'author'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'author', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'author'); ?>
                </div>
        </div>



        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_id'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'product_id', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => 'Select A Product', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'product_id'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'review'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'review', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'review'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'approvel'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'approvel', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>

                        <?php echo $form->error($model, 'approvel'); ?>
                </div>
        </div>



        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'rating'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'rating', array('1' => "1", '2' => "2", '3' => "3", '4' => "4", '5' => "5"), array('class' => 'form-control type_change')); ?>

                        <?php echo $form->error($model, 'rating'); ?>
                </div>
        </div>

        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->