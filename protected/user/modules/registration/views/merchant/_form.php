<?php
/* @var $this MerchantController */
/* @var $model Merchant */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'merchant-form',
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
            <?php echo $form->labelEx($model, 'fullname'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'fullname', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'fullname'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'email'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'email'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'phone_number'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'phone_number', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'phone_number'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'password'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'password'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'confirm'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->passwordField($model, 'confirm', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'confirm'); ?>
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'product_categories'); ?>
        </div>
        <div class="col-sm-10">
             <?php
            if (!$model->isNewRecord) {
                if (!empty($model->product_categories)) {
                    $ids = explode(',', $model->product_categories);
                    $selected = array();
                    foreach ($ids as $id) {
                        $selected[$id] = array('selected' => true);
                    }
                }
            }
            ?>
            <?php echo $form->hiddenField($model, 'product_categories'); ?>

            <?php
            $this->widget('application.user.components.CatSelect', array(
                'type' => 'category',
                'field_val' => $model->product_categories,
                'category_tag_id' => 'Merchant_product_categories', /* id of hidden field */
                'form_id' => 'merchant-form',
            ));
            ?>
            <?php echo $form->error($model, 'product_categories'); ?>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'merchant_type'); ?>
        </div>
        <div class="col-sm-10">
              <?php echo $form->dropDownList($model, 'merchant_type', array('1' => "Wholesale", '0' => "Retail", '2'=>"Default"), array('empty' => 'Select', 'class' => 'form-control')); ?>
            <?php echo $form->error($model, 'merchant_type'); ?>
        </div>
    </div>


<!--    <div class="form-group">
        <div class="col-sm-2 control-label"> 
            <?php echo $form->labelEx($model, 'is_payment_done'); ?>
        </div>
        <div class="col-sm-10">
            <?php echo $form->textField($model, 'is_payment_done', array('class' => 'form-control')); ?>
            <?php echo $form->error($model, 'is_payment_done'); ?>
        </div>
    </div>-->


    <div class="box-footer">
        <label>&nbsp;</label><br/>
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->