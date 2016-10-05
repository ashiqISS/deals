
<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?php echo Yii::app()->baseUrl ?>/uploads/pages/<?php echo $pages->id; ?>/small.<?php echo $pages->image; ?>">
                        </div>
                </div>
        </div>
</section>
<section class="contactus">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h1>Contact us</h1>
                                <span class="sen">Send A MESSAGE</span></p>

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'contact-us-contact-form',
                                    'action' => Yii::app()->baseUrl . '/index.php/site/contactUs/',
                                    'htmlOptions' => array('class' => 'us'),
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <?php if (Yii::app()->user->hasFlash('success')): ?>
                                        <div class="alert alert-success normal">
                                                <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                        </div>
                                <?php endif; ?>
                                <?php if (Yii::app()->user->hasFlash('error')): ?>
                                        <div class="alert alert-danger">
                                                <strong>Sorry! </strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                        </div>
                                <?php endif; ?>
                        </div>
                        <div class="col-md-4">

                                <div class="form-group">
                                        <?php echo $form->labelEx($model, 'name'); ?>
                                        <?php echo $form->textField($model, 'name', array('size' => 60, 'class' => 'form-review2', 'value' => $name)); ?>
                                        <?php echo $form->error($model, 'name', array('style' => 'color:red')); ?>

                                </div>
                                <div class="form-group">
                                        <?php echo $form->labelEx($model, 'phone'); ?>
                                        <?php echo $form->textField($model, 'phone', array('size' => 60, 'class' => 'form-review2', 'value' => $phone)); ?>
                                        <?php echo $form->error($model, 'phone', array('style' => 'color:red')); ?>
                                </div>
                                <div class="form-group">
                                        <?php echo $form->labelEx($model, 'email'); ?>
                                        <?php echo $form->textField($model, 'email', array('size' => 60, 'class' => 'form-review2', 'value' => $email)); ?>
                                        <?php echo $form->error($model, 'email', array('style' => 'color:red')); ?>
                                </div>




                        </div>

                        <div class="col-md-8">
                                <div class="form-group">
                                        <?php echo $form->labelEx($model, 'comment'); ?>
                                        <?php echo $form->textArea($model, 'comment', array('rows' => 5, 'cols' => 60, 'class' => 'form-comment2')); ?>
                                        <?php echo $form->error($model, 'comment', array('style' => 'color:red')); ?>
                                </div>

                        </div>

                        <div class="col-md-12">
                                <input class="cont" type="submit" value="Submit">
                        </div>
                        <?php $this->endWidget(); ?>
                </div>


        </div>
</section>
