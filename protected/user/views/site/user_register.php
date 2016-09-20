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
                                                <div class="col-xs-12 col-sm-12">
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

