<?php
/* @var $this MastersBrandController */
/* @var $model MastersBrand */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'masters-brand-form',
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
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'brand_name'); ?>
                </div>
                <div class="col-sm-10">
<?php echo $form->textField($model, 'brand_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
<?php echo $form->error($model, 'brand_name'); ?>
                </div>
        </div>


        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->