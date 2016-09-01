<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Newsletter</h1>
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
                                <li><span class="last">Newsletter</span></li>

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
                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'newsletter-newsletter-form',
                                    // Please note: When you enable ajax validation, make sure the corresponding
                                    // controller action is handling ajax validation correctly.
                                    // See class documentation of CActiveForm for details on this,
                                    // you need to use the performAjaxValidation()-method described there.
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
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
                                <div class="accountsettings">
                                        <div class="common">
                                                <div class="col-sm-3 col-xs-3 zeros">
                                                        <label for="textinput" class="control-labele">Subscribe</label>
                                                </div>
                                                <div class="col-sm-1 col-xs-1 zeros">
                                                        <label for="textinput" class="control-labele">:</label>
                                                </div>
                                                <div class="col-sm-8 col-xs-8 zeros">
                                                        <label class="radio-inline sec">
                                                                <input type="radio" name="email" value="1">Yes
                                                        </label>
                                                        <label class="radio-inline sec">
                                                                <input type="radio" name="email" value="0">No
                                                        </label>
                                                </div>
                                        </div>

                                </div>
                                <div class="btn-place-1">
                                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                </div>
                                <!--                                <div class="btn-place-2">
                                <?php //echo CHtml::submitButton('Continue', array('class' => 'reward hvr-shutter-in-horizontal3 right-btn')); ?>
                                                                </div>-->
                                <div class="btn-place-2">
                                        <button type="submit" class="reward hvr-shutter-in-horizontal3 right-btn">Continue</button>
                                </div>

                                <?php $this->endWidget(); ?>

                        </div><!-- form -->
                </div>
        </div>
</section>