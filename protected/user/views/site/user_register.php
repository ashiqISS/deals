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
                                <h1>user registration</h1>
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
                                            'id' => 'buyer-details-form',
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
                                                                <?php echo $form->textField($model, 'first_name', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" >
                                                                        <span class="content-filed content-filed-ruri">First Name</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'first_name', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'last_name', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Last Name</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'last_name', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Email</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'email', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->passwordField($model, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri pass')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Password</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'password', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12">
                                                        <span class="field-span msg-span-fld input input--ruri">
                                                                <input class="input-field input-field-ruri input__field input__field--ruri spax pass" type="password" id="password1" required vk_1dd65="subscribed">
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-5">
                                                                        <span class="content-filed content-filed-ruri">Confirm password</span>
                                                                </label>
                                                        </span>
                                                        <div id="password_error"></div>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'phone_no_2', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Phone Number 2</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'phone_no_2', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textArea($model, 'address', array('size' => 50, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Address</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'address', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'pan_card', array('size' => 50, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Pan Card Number</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'pan_card', array('class' => 'form_error')); ?>
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
                                                        <?php echo $form->error($model, 'dob', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->dropDownList($model, 'gender', array('' => "Gender", '1' => "Female", '2' => "Male"), array('class' => 'form-select')); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'gender', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'bank_accnt_number', array('size' => 50, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Bank Account Number</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'bank_accnt_number', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'bank_ifsc_code', array('size' => 50, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Bank IFSC Code</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'bank_ifsc_code', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($model, 'company_name', array('size' => 50, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri">Company Name</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($model, 'company_name', array('class' => 'form_error')); ?>
                                                </div>
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->dropDownList($model, 'newsletter', array('' => "Newsletter", '1' => "Yes", '0' => "No"), array('class' => 'form-select')); ?>
                                                        </span>
                                                        <?php echo $form->error($model, 'newsletter', array('class' => 'form_error')); ?>
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
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" >
                                                                        Accept Terms and Condition
                                                                </label>
                                                        </span>
                                                </div>

                                        </div>
                                        <div class="form-group btns">
                                                <label>&nbsp;</label><br/>
                                                <?php echo CHtml::submitButton('Register', array('class' => 'ripple btn log-btn btn-default')); ?>
                                        </div>



                                </div><!-- form -->
                                <?php $this->endWidget(); ?>
                        </div>
                </div>
        </div>

</section>
<script type="text/javascript">
        $(document).ready(function () {
                $("#buyer-details-form").submit(function () {
                        var pass1 = $('#BuyerDetails_password').val();
                        var pass2 = $('#password1').val();
                        if (pass1 && pass2 != "") {
                                if (pass1 != pass2) {
                                        $('#password_error').text('password doesnot match');
                                        return false;
                                } else {
                                        $('#password_error').text('');
                                        return true;
                                }

                        }
                });
                $('.pass').keyup(function () {
                        var pass1 = $('#BuyerDetails_password').val();
                        var pass2 = $('#password1').val();
                        if (pass1 && pass2 != "") {
                                if (pass1 != pass2) {
                                        $('#password_error').text('password doesnot match');
                                } else {
                                        $('#password_error').text('');
                                }

                        }

                });
        });
</script>

