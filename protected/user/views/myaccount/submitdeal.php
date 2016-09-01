<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">


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
                                                        <?php $this->renderPartial('_rightMenu'); ?>

                                                </div>
                                        </div>


                                </div>


                        </div>


                        <div class="col-lg-9 col-md-8">
                                <div class="accountsettings">

                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'deal-submission-submitdeal-form',
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

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'full_name'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'full_name', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'full_name', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'email'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'email', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'email', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'product_name'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'product_name', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'product_name', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'product_url'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'product_url', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'product_url', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'message'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->textField($model, 'message', array('class' => 'form-acc')); ?>
                                                                <?php echo $form->error($model, 'message', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="row buttons">
                                                <?php echo CHtml::submitButton('Submit'); ?>
                                        </div>

                                        <?php $this->endWidget(); ?>

                                </div><!-- form -->
                        </div>
                </div>
        </div>
</section>