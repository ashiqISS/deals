<link href="css/hover.css" rel="stylesheet" media="all">
<section class="title">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1>Message</h1>
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
                <li><span class="last">Message</span></li>

            </ul>
        </div>
    </div>
</div>


<section class="add">
    <div class="container">
        <div class="row">







            <div class="col-lg-9 col-md-8">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'merchant-message-maas-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // See class documentation of CActiveForm for details on this,
                    // you need to use the performAjaxValidation()-method described there.
                    'enableAjaxValidation' => false,
                ));
                ?>

                <?php echo $form->errorSummary($model); ?>


                <div class="form-group form-group-full">

                    <?php echo $form->textArea($model, 'message', array('rows' => 3, 'cols' => 10, 'class' => 'form-control', 'placeholder' => 'Type Your Message Here!')); ?>
                </div>
                <div class="row buttons">
                    <?php echo CHtml::submitButton('Submit'); ?>
                </div>

                <?php $this->endWidget(); ?>
                <?php
                foreach ($messages as $mes) {
                        $to = $mes->from_to;
                        if ($to == 1) {
                                ?>
                                <div class="message-left">
                                    <div class="mess-1">
                                        <img class="msg" src="<?php echo yii::app()->baseUrl ?>/images/merchant.jpg">
                                    </div>
                                    <div class="mess-2">
                                        <span class="industry"><?php echo $mes->message ?>.</span>
                                        <span class="dat"><?php echo $mes->doc ?></span>
                                    </div>
                                </div>
                        <?php } else if ($to == 0) { ?>
                                <div class="message-right">

                                    <div class="mess-22">
                                        <span class="industry2"><?php echo $mes->message ?>.</span>
                                        <span class="dat2"><?php echo $mes->doc ?></span>
                                    </div>
                                    <div class="mess-1">
                                        <img class="msgd" src="<?php echo yii::app()->baseUrl ?>/images/admin_.jpg">
                                    </div>
                                </div>
                                <?php
                        }
                }
                ?>

                <!--                <div class="message-left">
                                    <div class="mess-1">
                                        <img class="msg" src="<?php echo yii::app()->baseUrl ?>/images/demo.jpg">
                                    </div>
                                    <div class="mess-2">
                                        <span class="industry">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard .</span>
                                        <span class="dat">27-jul-2016</span>
                                    </div>
                                </div>


                                <div class="message-right">

                                    <div class="mess-22">
                                        <span class="industry2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard .</span>
                                        <span class="dat2">27-jul-2016</span>
                                    </div>
                                    <div class="mess-1">
                                        <img class="msgd" src="<?php echo yii::app()->baseUrl ?>/images/demo.jpg">
                                    </div>
                                </div>

                                <div class="message-right">

                                    <div class="mess-22">
                                        <span class="industry2">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard .</span>
                                        <span class="dat2">27-jul-2016</span>
                                    </div>
                                    <div class="mess-1">
                                        <img class="msgd" src="<?php echo yii::app()->baseUrl ?>/images/demo.jpg">
                                    </div>
                                </div>-->

            </div>

            <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                <?php echo $this->renderPartial('_rightMenu'); ?>
            </div>
        </div>
    </div>
</section>
