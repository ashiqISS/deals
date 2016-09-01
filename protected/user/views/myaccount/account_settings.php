
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
<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Settings</h1>
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
                                <li><span class="last">Account Settings</span></li>

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
                                <form action="<?= Yii::app()->baseUrl ?>/index.php/Myaccount/Settings" method="post" >
                                        <div class="accountsettings">

                                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                        <div class="alert alert-success">
                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                        <div class="alert alert-danger">
                                                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                        </div>
                                                <?php endif; ?>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">First Name</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <input type="text" class="form-set" id="first_name" name="first_name" value="<?php echo $model->first_name; ?>">
                                                                </div>
                                                        </div>
                                                </div>


                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Last Name</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <input type="text" class="form-set" id="last_name" name="last_name" value="<?php echo $model->last_name; ?>">
                                                                </div>
                                                        </div>
                                                </div>

                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Email</label>
                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <input type="email" class="form-set" id="email" name="email" value="<?php echo $model->email; ?>">
                                                                </div>
                                                        </div>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Telephone</label>
                                                                </div>
                                                        </div>
                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>
                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php if (Yii::app()->session['user_type_usrid'] == 1) { ?>
                                                                                <input type="text" class="form-set" id="phone" name="phone_number" value="<?php echo $model->phone_number; ?>">
                                                                        <?php } else { ?>
                                                                                <input type="text" class="form-set" id="phone" name="phone_number" value="<?php echo $model->phone_number; ?>">
                                                                        <?php } ?>
                                                                </div>
                                                        </div>
                                                </div>



                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Address</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <textarea class="form-acc" rows="5" id="comment" name="address"><?php echo $model->address; ?></textarea>
                                                                </div>
                                                        </div>
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



