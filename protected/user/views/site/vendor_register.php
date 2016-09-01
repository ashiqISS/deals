
<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?= Yii::app()->baseUrl ?>/images/c1.jpg">
                        </div>
                </div>
        </div>
</section>

<section class="contact-form-wrp">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>vendor registration</h1>
                                <div class="contact-form contact-forms">
                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                <div class="alert alert-success">
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <strong>Danger!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'merchant-vendor_register-form',
                                            'enableClientValidation' => true,
                                            'clientOptions' => array(
                                                'validateOnSubmit' => true,
                                            ),
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>

                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->dropDownList($model, 'merchant_type', array('' => "Merchant Type", '1' => "Retailer", '2' => "Whole Seller"), array('class' => 'form-select')); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'merchant_type'); ?>
                                                </div>

                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'email', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Email</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'email'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'phone_number', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Phone Number</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'phone_number'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'password', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Password</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'password'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'confirm', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Confirm Password</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'confirm'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'shop_name', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Shop Name</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'shop_name'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'shop_logo', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Shop Logo</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'shop_logo'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'shop_banner', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Shop Banner</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'shop_banner'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textArea($model, 'address', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Address</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'address'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'pincode', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Pin Code</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'pincode'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo CHtml::activeDropDownList($model, 'country', CHtml::listData(Countries::model()->findAllByAttributes(array()), 'id', 'country_name'), array('empty' => '--Country--', 'class' => 'form-select', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'country'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo CHtml::activeDropDownList($model, 'state', CHtml::listData(States::model()->findAllByAttributes(array()), 'id', 'state_name'), array('empty' => '--State--', 'class' => 'form-select', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'state'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo CHtml::activeDropDownList($model, 'district', CHtml::listData(States::model()->findAllByAttributes(array()), 'id', 'state_name'), array('empty' => '--Destrict--', 'class' => 'form-select', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'district'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo CHtml::activeDropDownList($model, 'city', CHtml::listData(States::model()->findAllByAttributes(array()), 'id', 'state_name'), array('empty' => '--City--', 'class' => 'form-select', 'options' => array('id' => array('selected' => 'selected')))); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'city'); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php if (CCaptcha::checkRequirements()): ?>
                                                                        <div id="capche" >
                                                                                <?php echo $form->labelEx($model, 'verifyCode'); ?>
                                                                                <br/>
                                                                                <?php $this->widget('CCaptcha'); ?>
                                                                                <br/>
                                                                                <?php echo $form->textField($model, 'verifyCode', array('class' => "input-field input-field-ruri input__field input__field--ruri", 'required' => TRUE)); ?>
                                                                        <?php endif; ?>
                                                                </div>
                                                        </span>
                                                        <?php echo $form->error($model, 'verifyCode', array('class' => 'form-error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <input type="checkbox" required class="" />
                                                </div>
                                                <span class="field-span input input--ruri">
                                                        <label class="label-field label-field-ruri input__label input__label--ruri" >
                                                                Accept Terms and Condition
                                                        </label>
                                                </span>
                                                <div class="col-xs-12 col-sm-12">
                                                        <div class="row buttons">
                                                                <?php echo CHtml::submitButton('Register'); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <?php $this->endWidget(); ?>
                                </div>
                        </div>
                </div>
        </div>
</section>