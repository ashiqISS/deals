<?php
/* @var $this MerchantController */
/* @var $model Merchant */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'merchant-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => true,
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
                        <?php echo $form->labelEx($model, 'email_verification'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'email_verification', array('1' => "Verified", '0' => "Not Verified"), array('empty' => 'Select', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'email_verification'); ?>
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
                        $this->widget('application.admin.components.CatSelect', array(
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
                        <?php echo $form->labelEx($model, 'merchant_point'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'merchant_point', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_point'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_badge'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'merchant_badge', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_badge'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_rating'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'merchant_rating', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_rating'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'merchant_type', array('1' => "Wholesale", '0' => "Retail", '2' => "Default"), array('empty' => 'Select', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_type'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_count'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'product_count', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_count'); ?>
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
                        <?php echo $form->fileField($model, 'shop_logo', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->shop_logo != '') {
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/users/merchants/shop_logo/' . $model->id . '.' . $model->shop_logo . '" />';
                        }
                        ?>
                        <?php echo $form->error($model, 'shop_logo'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'shop_banner'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->fileField($model, 'shop_banner', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->shop_banner != '') {
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/users/merchants/shop_banner/' . $model->id . '.' . $model->shop_banner . '" />';
                        }
                        ?>
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
                        <?php // echo $form->textField($model, 'state', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'state'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'district'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'district', CHtml::listData(Districts::model()->findAll(), 'Id', 'district_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php //echo $form->textField($model, 'district', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'district'); ?>
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
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>
        </div>
        <?php /*
          <div class="form-group">
          <div class="col-sm-2 control-label">
          <?php echo $form->labelEx($model, 'last_login'); ?>
          </div>
          <div class="col-sm-10">
          <?php echo $form->textField($model, 'last_login', array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'last_login'); ?>
          </div>
          </div>

          <div class="form-group">
          <div class="col-sm-2 control-label">
          <?php echo $form->labelEx($model, 'bad_attempts'); ?>
          </div>
          <div class="col-sm-10">
          <?php echo $form->textField($model, 'bad_attempts', array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'bad_attempts'); ?>
          </div>
          </div>

          <div class="form-group">
          <div class="col-sm-2 control-label">
          <?php echo $form->labelEx($model, 'CB'); ?>
          </div>
          <div class="col-sm-10">
          <?php echo $form->textField($model, 'CB', array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'CB'); ?>
          </div>
          </div>

          <div class="form-group">
          <div class="col-sm-2 control-label">
          <?php echo $form->labelEx($model, 'UB'); ?>
          </div>
          <div class="col-sm-10">
          <?php echo $form->textField($model, 'UB', array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'UB'); ?>
          </div>
          </div>

          <div class="form-group">
          <div class="col-sm-2 control-label">
          <?php echo $form->labelEx($model, 'DOC'); ?>
          </div>
          <div class="col-sm-10">
          <?php echo $form->textField($model, 'DOC', array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'DOC'); ?>
          </div>
          </div>

          <div class="form-group">
          <div class="col-sm-2 control-label">
          <?php echo $form->labelEx($model, 'DOU'); ?>
          </div>
          <div class="col-sm-10">
          <?php echo $form->textField($model, 'DOU', array('class' => 'form-control')); ?>
          <?php echo $form->error($model, 'DOU'); ?>
          </div>
          </div>
         */ ?>
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