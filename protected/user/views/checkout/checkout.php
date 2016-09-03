<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Checkout</h1>
                        </div>
                </div>
        </div>
</section>
<?php echo $this->renderPartial('_breadcremb'); ?>
<script src="<?php echo Yii::app()->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<section class="checkout">


        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <div class="checks">
                                        <div class="checks-1">
                                                <h1>New Customer</h1>
                                                <p><strong>Register Account:</strong></p>
                                                <!--<a class="options" href="#">Register Account</a>-->
                                                <!--<a class="options" href="#">Guest Checkout</a>-->
                                                <p>By creating an account you will be able to shop faster, be up to date on an order's status,
                                                        and keep track of the orders you have  previously made.</p>
                                                <?php echo CHtml::link('Register', array('checkout/billing'), array('class' => 'regbtn')); ?>
                                        </div>
                                        <div class="checks-2">
                                                <h1>Returning Customer</h1>
                                                <p>I am a returning customer</p>
                                                <?php
                                                $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'buyer-details-login-form',
                                                    'enableClientValidation' => true,
                                                    'clientOptions' => array(
                                                        'validateOnSubmit' => false,
                                                    ),
                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                    // controller action is handling ajax validation correctly.
                                                    // See class documentation of CActiveForm for details on this,
                                                    // you need to use the performAjaxValidation()-method described there.
                                                    'enableAjaxValidation' => false,
                                                ));
                                                ?>
                                                <div class="form-group">
                                                        <?php echo $form->textField($login, 'email', array('class' => 'form-controlq', 'placeholder' => 'Email')); ?>
                                                        <?php echo $form->error($login, 'email', array('class' => 'red')); ?>
                                                </div>
                                                <div class="form-group">
                                                        <?php echo $form->passwordField($login, 'password', array('class' => 'form-controlq', 'placeholder' => 'Password')); ?>
                                                        <?php echo $form->error($login, 'password', array('class' => 'red')); ?>
                                                </div>
                                                <a class="forget" href="#">Forgotten Password</a>
                                                <input type="submit" value="Login">
                                                <?php $this->endWidget(); ?>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>