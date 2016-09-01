<div class="clearfix"></div>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/count-to.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
<script>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
</script>
<script type="text/javascript">
        $(document).ready(function () {
                $("#form1").submit(function () {
                        var pass1 = $('#password1').val();
                        var pass2 = $('#password2').val();
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
                        var pass1 = $('#password1').val();
                        var pass2 = $('#password2').val();
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
                                <h1>Reset Password</h1>
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

                                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/ForgotPassword/Newpassword/" method="post" id="form1" name="form1">




                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <input type="password" class="input-field input-field-ruri input__field input__field--ruri" id="password1" name="password1" required="required" >
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri"><i class="fa pls fa-user"></i>New Password</span>
                                                                        </label>
                                                                </span>
                                                        </div>
                                                </div>
                                                <div class="row">
                                                        <div class="col-xs-12 col-sm-12">
                                                                <span class="field-span input input--ruri">
                                                                        <input type="password" class="input-field input-field-ruri input__field input__field--ruri" id="password2" name="password2" required="required" >
                                                                        <label class="label-field label-field-ruri input__label input__label--ruri" for="input-1">
                                                                                <span class="content-filed content-filed-ruri"><i class="fa pls fa-user"></i>Confirm Password</span>
                                                                        </label>
                                                                </span>
                                                                <div id="password_error"></div>
                                                        </div>

                                                </div>

                                                <button type="submit"  name="btn_submit" class="btn new-btn btn-default">Reset my password</button>



                                        </form>
                                </div>
                        </div>

                </div>




        </div>
</section>