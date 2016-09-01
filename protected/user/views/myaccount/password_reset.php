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
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Reset Password</h1>
                        </div>
                </div>
        </div>
</section>
<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <ul class="breadcrumb">
                                <li><a href="#"><i class="fa hom fa-home"></i></a></li>
                                <li><a href="#">Account</a></li>
                                <li><span class="last">Reset Password</span></li>

                        </ul>
                </div>
        </div>
</div>


<section class="checkout">
        <div class="container">
                <div class="row">
                        <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">
                                <div class="panel panel-default">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#m1"> <div class="panel-heading headz">
                                                        <span class="panel-title">
                                                                <i class="glyphicon gly glyphicon-plus"></i>Filter By Price
                                                        </span>
                                                </div>
                                        </a>
                                        <div id="m1" class="panel-collapse collapse">
                                                <div class="panel-body mbb">
                                                        <?php echo $this->renderPartial('_rightMenu'); ?>
                                                </div>
                                        </div>


                                </div>


                        </div>

                        <div class="col-lg-9 col-md-8">
                                <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/Myaccount/ResetPassword/" method="post" id="form1" name="form1">
                                        <div class="accountsettings">
                                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                        <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (Yii::app()->user->hasFlash('empty')): ?>
                                                        <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('empty'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                        <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                <strong>Danger!</strong><?php echo Yii::app()->user->getFlash('error'); ?>
                                                        </div>
                                                <?php endif; ?>


                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">New Password</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <input type="password" class="form-set" id="password1" name="password1" required="" >
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Confirm Password</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <input type="password" class="form-set" id="password2" name="password2" required="" >
                                                                </div>
                                                        </div>
                                                        <div id="password_error"></div>
                                                </div>

                                        </div>

                                        <div class="btn-place-1">
                                                <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                        </div>
                                        <div class="btn-place-2">
                                                <button type="submit"  name="btn_submit" class="reward hvr-shutter-in-horizontal3 right-btn">Continue</button>
                                        </div>
                                </form>

                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>


</section>


<script>
        $(document).ready(function () {
                var selectIds = $('#m1');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>