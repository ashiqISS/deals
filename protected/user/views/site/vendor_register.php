
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
                                        $form1 = $this->beginWidget('CActiveForm', array(
                                            'id' => 'merchant-registration-form',
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // See class documentation of CActiveForm for details on this,
                                            // you need to use the performAjaxValidation()-method described there.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>

                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->dropDownList($vendor, 'merchant_type', array('' => "Vendor Type", '1' => "Retailer", '2' => "Whole Seller"), array('class' => 'form-select')); ?>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'merchant_type', array('class' => 'red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->textField($vendor, 'first_name', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">First Name</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'first_name', array('class' => 'red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->textField($vendor, 'last_name', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Last Name</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'last_name', array('class' => 'red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->textField($vendor, 'email', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Email</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'email', array('class' => 'red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->passwordField($vendor, 'password', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Password</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'password', array('class' => 'red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->passwordField($vendor, 'confirm', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Confirm Password</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'confirm', array('class' => 'red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->textField($vendor, 'phone_number', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Phone Number </span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'phone_number', array('class' => 'form_error red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->textArea($vendor, 'address', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Address</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'address', array('class' => 'form_error red')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form1->textField($vendor, 'pincode', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Pin Code</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form1->error($vendor, 'pincode', array('class' => 'form_error red')); ?>
                                                </div>
                                        </div>

                                        <button type="submit1" class="ripple btn log-btn btn-default">Register</button>

                                        <?php $this->endWidget(); ?>
                                </div>
                        </div>
                </div>
        </div>
</section>