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
                                <h1>User Forgot Password?</h1>
                                <div class="contact-form contact-forms">

                                        <?php if (Yii::app()->user->hasFlash('success1')) { ?>
                                                <div>
                                                        <h4><?php echo Yii::app()->user->getFlash('success1'); ?></h4>
                                                        <?php echo Yii::app()->user->getFlash('success2'); ?>
                                                </div>
                                        <?php } else { ?>

                                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                        <div class="alert alert-danger">
                                                                <?php echo Yii::app()->user->getFlash('error'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <form role="form" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ForgotPassword/User" method="post">

                                                        <div class="row">
                                                                <div class="col-xs-12 col-sm-12">
                                                                        <span class="field-span input input--ruri">
                                                                                <input class="input-field input-field-ruri input__field input__field--ruri" type="email" id="input-1" required="" name="email" vk_1dd65="subscribed">
                                                                                <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                        <span class="content-filed content-filed-ruri"><i class="fa pls fa-user"></i>Email</span>
                                                                                </label>
                                                                        </span>
                                                                </div>
                                                        </div>
                                                        <button type="submit" name="btn_submit" class="ripple btn new-btn btn-default">Reset My Password</button>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 padd">
                                                                <?php echo CHtml::link('Sign Up Free', array('Site/UserRegister'), array('class' => 'forgot')); ?>

                                                        </div>
                                                </form>
                                        <?php } ?>
                                </div>

                        </div>
                </div>
        </div>
</section>


