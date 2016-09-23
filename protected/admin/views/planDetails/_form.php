<?php
/* @var $this PlanDetailsController */
/* @var $model PlanDetails */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'plan-details-form',
            'htmlOptions' => array('class' => "form-horizontal", 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'plan_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'plan_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'plan_name'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'amount'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'amount', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'amount'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'no_of_days'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'no_of_days', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'no_of_days'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'no_of_products'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'no_of_products', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'no_of_products'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'no_of_ads'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'no_of_ads', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'no_of_ads'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'image'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php if ($model->image != "") { ?>
                                <div style="float:left;margin:5px;position:relative;">
                                        <?php $file = Yii::app()->basePath . '/../uploads/plan/' . $model->id . '/plan' . '.' . $model->image; ?>
                                        <img width="125"  height="75"style="border: 2px solid #d2d2d2;" src="<?= Yii::app()->request->baseUrl; ?>/uploads/plan/<?= $model->id; ?>/plan.<?= $model->image; ?>" /></div>
                        <?php } ?>
                        <?php echo $form->error($model, 'image'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('' => '--Select--', '0' => 'In-Active', '1' => 'Active'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>
        </div>




        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->