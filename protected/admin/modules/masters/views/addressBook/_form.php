<?php
/* @var $this AddressBookController */
/* @var $model AddressBook */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'address-book-form',
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
                        <?php echo $form->labelEx($model, 'user_id'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'user_id', CHtml::listData(BuyerDetails::model()->findAllByAttributes(array()), 'id', 'first_name'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'user_id'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'email'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'phone'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'phone', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'phone'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'address_line_1'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'address_line_1', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'address_line_1'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'address_line_2'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'address_line_2', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'address_line_2'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'country'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'country'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'state'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'state', CHtml::listData(MasterState::model()->findAllByAttributes(array('status' => 1)), 'Id', 'state'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'state'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'city'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'city', CHtml::listData(MasterCity::model()->findAllByAttributes(array('status' => 1)), 'id', 'city'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'city'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'pincode'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'pincode', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'pincode'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'map'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'map', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'map'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'default_billing_address'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'default_billing_address', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'default_billing_address'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'default_shipping_address'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'default_shipping_address', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'default_shipping_address'); ?>
                </div>
        </div>




        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control')); ?>
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