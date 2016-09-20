<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'pages-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
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
                        <?php echo $form->labelEx($model, 'name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                </div>
        </div>

        <!--   <div class="form-group">
                   <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'canonical_name'); ?>
                   </div>
                   <div class="col-sm-10">
        <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'canonical_name'); ?>
                   </div>
           </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'image'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'image', array('size' => 60, 'maxlength' => 250, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->image != '') {
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/pages/' . $model->id . '/small.' . $model->image . '" />';
                        }
                        ?>
                        <?php echo $form->error($model, 'image'); ?>
                </div>
        </div>

        <!--   <div class="form-group">
                   <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'small_description'); ?>
                   </div>
                   <div class="col-sm-10">
        <?php echo $form->textArea($model, 'small_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'small_description'); ?>
                   </div>
           </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'large_description'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                            'model' => $model,
                            'attribute' => 'large_description',
                        ));
                        ?><?php echo $form->error($model, 'large_description'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
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