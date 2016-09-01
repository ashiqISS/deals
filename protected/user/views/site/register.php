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
                                <h1>Registration</h1>
                                <div class="contact-form contact-forms ">
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
                                        <div class="common" id="common_login">
                                                <div class="col-sm-3 col-xs-3 zeros">
                                                        <label for="textinput" class="control-labele">Register As</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                        <label for="textinput" class="control-labele">:</label>
                                                </div>
                                                <div class="col-sm-8 col-xs-8 zeros login_common">
                                                        <label class="radio-inline active sec">
                                                                <input id="user" class="reg" checked="true" type="radio" name="user" value="1" required="true">User
                                                        </label>
                                                        <label class="radio-inline sec">
                                                                <input id="merchant" class="reg" type="radio" name="user" required="true" value="2">Merchant
                                                        </label>
                                                </div>
                                        </div>

                                        <div class="user_reg">
                                                <?php
                                                $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'buyer-details-register-form',
                                                    'enableClientValidation' => true,
                                                    'clientOptions' => array(
                                                        'validateOnSubmit' => true,
                                                    ),
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
                                                                        <?php echo $form->textField($model, 'first_name', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">First Name</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'first_name', array('class' => 'red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->textField($model, 'last_name', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">Last Name</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'last_name', array('class' => 'red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->textField($model, 'email', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">Email</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'email', array('class' => 'red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->passwordField($model, 'password', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">Password</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'password', array('class' => 'red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->passwordField($model, 'confirm', array('class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">Confirm Password</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'confirm', array('class' => 'red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php
                                                                        $from = date('Y') - 80;
                                                                        $to = date('Y') + 20;
                                                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                            'model' => $model,
                                                                            'attribute' => 'dob',
                                                                            'value' => 'dob',
                                                                            'options' => array(
                                                                                'dateFormat' => 'yy-mm-dd',
                                                                                'changeYear' => true, // can change year
                                                                                'changeMonth' => true, // can change month
                                                                                'yearRange' => $from . ':' . $to, // range of year
                                                                                'showButtonPanel' => true, // show button panel
                                                                            ),
                                                                            'htmlOptions' => array(
                                                                                'size' => '10', // textField size
                                                                                'maxlength' => '10', // textField maxlength
                                                                                'class' => 'input-field input-field-ruri input__field input__field--ruri',
                                                                            ),
                                                                        ));
                                                                        ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">Date of Birth</span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'dob', array('class' => 'red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->dropDownList($model, 'gender', array('' => "Gender", '1' => "Female", '2' => "Male"), array('class' => 'form-select')); ?>
                                                                </span>
                                                                <?php echo $form->error($model, 'gender', array('class' => 'form_error red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <?php echo $form->textField($model, 'phone_number', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri">Phone Number </span>
                                                                        </label>
                                                                </span>
                                                                <?php echo $form->error($model, 'phone_number', array('class' => 'form_error red')); ?>
                                                        </div>
                                                        <div class="col-xs-12 col-sm-12">
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
                                                                        <?php echo $form->error($model, 'verifyCode', array('class' => 'red')); ?>
                                                                </div>
                                                                <div class="checkbox checkbox2">
                                                                        <label>
                                                                                <?php echo $form->checkBox($model, 'newsletter'); ?>
                                                                                Subscribe Newsletter</label>
                                                                        <?php echo $form->error($model, 'newsletter', array('class' => 'red')); ?>
                                                                </div>

                                                                <div class="checkbox checkbox2">
                                                                        <label>
                                                                                <?php echo $form->checkBox($model, 'terms'); ?>
                                                                                I agree to the <span>Privacy Policy</span> and <span>T&C</span></label>
                                                                        <?php echo $form->error($model, 'terms', array('class' => 'red')); ?>
                                                                </div>
                                                        </div>

                                                </div>
                                                <button type="submit" class="ripple btn log-btn btn-default">Register</button>
                                                <?php // echo CHtml::submitButton('Register', array('class' => 'ripple btn log-btn btn-default')); ?>

                                                <?php $this->endWidget(); ?>

                                                <!-- form -->

                                        </div>
                                        <div class="vendor_reg">
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
                                                                        <?php echo $form1->dropDownList($vendor, 'merchant_type', array('' => "Merchant Type", '1' => "Retailer", '2' => "Whole Seller"), array('class' => 'form-select')); ?>
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

                                                <!-- form -->
                                        </div>
                                </div><!-- form -->

                        </div>
                </div>
        </div>
</section>


<script>
        $(document).ready(function () {
                $(".vendor_reg").hide();
                $(".user_reg").show();
                $('.reg').click(function () {
                        var std_value = $(".reg:checked").val();
                        if (std_value == 1) {
                                $(".vendor_reg").hide();
                                $(".user_reg").show();
                        } else {
                                $(".vendor_reg").show();
                                $(".user_reg").hide();
                        }
                });
        });
</script>