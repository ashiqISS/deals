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
                                <h1>Vendor Login</h1>
                                <div class="contact-form contact-forms">
                                        <?php if (Yii::app()->user->hasFlash('login_error')): ?>
                                                <div class="alert alert-danger login_error">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <?php echo Yii::app()->user->getFlash('login_error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('emailverify')): ?>
                                                <div class="alert alert-danger login_error">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <?php echo Yii::app()->user->getFlash('emailverify'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'merchant-login-form',
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>

                                        <div class="row">
                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->textField($vendor, 'email', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                        <span class="content-filed content-filed-ruri"><i class="fa pls fa-user"></i>Email</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($vendor, 'email', array('class' => 'red')); ?>
                                                </div>

                                                <div class="col-xs-12 col-sm-12">
                                                        <span class="field-span input input--ruri">
                                                                <?php echo $form->passwordField($vendor, 'password', array('size' => 60, 'maxlength' => 100, 'class' => 'input-field input-field-ruri input__field input__field--ruri')); ?>
                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-3">
                                                                        <span class="content-filed content-filed-ruri"><i class="fa pls fa-unlock-alt"></i>Password</span>
                                                                </label>
                                                        </span>
                                                        <?php echo $form->error($vendor, 'password', array('class' => 'red')); ?>
                                                </div>



                                        </div>
                                        <button type="submit" name="login_submit" class="ripple btn new-btn btn-default">Log In</button>
                                        <div class="col-md-6 col-sm-6 col-xs-6 padd">
                                                <?php echo CHtml::link('Forgot Password', array('ForgotPassword/vendor'), array('class' => 'forgot')); ?>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-6 padd">
                                                <?php echo CHtml::link('Register', array('site/VendorRegister'), array('class' => 'new')); ?>
                                        </div>

                                        <?php $this->endWidget(); ?>
                                </div>

                        </div>
                </div>
        </div>
</section>