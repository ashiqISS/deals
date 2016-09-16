<?php echo $this->renderPartial('_breadcremb'); ?>
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
                                        <!--                    <div id="m1" class="panel-collapse collapse fdggfdg">
                                                                <div class="panel-body mbb">
                                                                    <ul>
                                                                        <li><a href="#">My profile</a></li>
                                                                        <li><a href="#">Message </a></li>
                                                                        <li><a href="#">Account settings</a></li>
                                                                        <li><a href="#">Order History</a></li>
                                                                        <li><a href="#">Address Book</a></li>
                                                                        <li class="active"><a href="#">Newsletter Subscription</a></li>

                                                                        <li><a href="#">Set interest deals/ wish listed deals</a></li>
                                                                        <li><a href="#"> Submit a deal/ product </a></li>
                                                                        <li><a href="#"> My product</a></li>
                                                                        <li><a href="#">My sales Report </a></li>
                                                                        <li><a href="#"> Transaction</a></li>
                                                                        <li><a href="#"> Payment/Payout</a></li>
                                                                        <li><a href="#"> Plan details</a></li>
                                                                        <li><a href="#"> Affiliate commission</a></li>
                                                                        <li><a href="#"> Reward points</a></li>

                                                                        <li><a href="#"> Discount coupon generation</a></li>
                                                                        <li><a href="#">Used and refurbished (Return products)</a></li>
                                                                        <li><a href="#"> Paid Ad</a></li>
                                                                        <li><a href="#"> Bargain zone</a></li>
                                                                    </ul>

                                                                </div>
                                                            </div>-->
                                </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                                <div class="accountsettings">

                                        <div class="form">

                                                <?php
                                                $form = $this->beginWidget('CActiveForm', array(
                                                    'id' => 'ad-payment-adPayment-form',
                                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                    // controller action is handling ajax validation correctly.
                                                    // See class documentation of CActiveForm for details on this,
                                                    // you need to use the performAjaxValidation()-method described there.
                                                    'enableAjaxValidation' => false,
                                                ));
                                                ?>
                                                <div class="flash-success">
                                                        <?php echo Yii::app()->user->getFlash('paid'); ?>
                                                </div>

                                                <?php echo $form->errorSummary($model); ?>

                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Ad Title</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'title', array('class' => 'form-set')); ?>
                                                                </div>
                                                        </div>
                                                        <?php echo $form->error($model, 'title'); ?>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Ad Image</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form->fileField($model, 'image'); ?>
                                                                    <!--<input type="file" name="pic" accept="image/*">-->
                                                                </div>
                                                        </div>
                                                        <?php echo $form->error($model, 'image'); ?>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Location</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php
                                                                        echo $form->dropDownList($model, 'position', CHtml::listData(MasterAdLocation::model()->findAll(), 'id', 'ad_location'), array('class' => 'form-select', 'empty' => 'Select'));
                                                                        ?>

                                                                </div>
                                                        </div>
                                                        <?php echo $form->error($model, 'position'); ?>

                                                </div>

                                                <!--                        <div class="row">
                                                <?php // echo $form->labelEx($model, 'position'); ?>
                                                <?php // echo $form->textField($model, 'position'); ?>
                                                <?php // echo $form->error($model, 'position');  ?>
                                                                        </div>-->
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Display From</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php
                                                                        $from = date('Y') - 2;
                                                                        $to = date('Y') + 20;
                                                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                            'model' => $model,
                                                                            'attribute' => 'display_from',
                                                                            'value' => 'display_from',
                                                                            'options' => array(
                                                                                'dateFormat' => 'dd-mm-yy',
                                                                                'changeYear' => true, // can change year
                                                                                'changeMonth' => true, // can change month
                                                                                'yearRange' => $from . ':' . $to, // range of year
                                                                                'showButtonPanel' => true, // show button panel
                                                                            ),
                                                                            'htmlOptions' => array(
                                                                                'size' => '10', // textField size
                                                                                'maxlength' => '10', // textField maxlength
                                                                                'class' => 'form-set',
                                                                                'placeholder' => 'display_from',
                                                                            ),
                                                                        ));
                                                                        ?>
                                                                </div>
                                                        </div>
                                                        <?php echo $form->error($model, 'display_from'); ?>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Display To</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php
                                                                        $from = date('Y') - 2;
                                                                        $to = date('Y') + 20;
                                                                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                            'model' => $model,
                                                                            'attribute' => 'display_to',
                                                                            'value' => 'display_to',
                                                                            'options' => array(
                                                                                'dateFormat' => 'dd-mm-yy',
                                                                                'changeYear' => true, // can change year
                                                                                'changeMonth' => true, // can change month
                                                                                'yearRange' => $from . ':' . $to, // range of year
                                                                                'showButtonPanel' => true, // show button panel
                                                                            ),
                                                                            'htmlOptions' => array(
                                                                                'size' => '10', // textField size
                                                                                'maxlength' => '10', // textField maxlength
                                                                                'class' => 'form-set',
                                                                                'placeholder' => 'display_to',
                                                                            ),
                                                                        ));
                                                                        ?>
                                                                </div>
                                                        </div>
                                                        <?php echo $form->error($model, 'display_to'); ?>
                                                </div>
                                                <div class="ui-set">
                                                        <div class="settings1">
                                                                <div class="form-group">
                                                                        <label class="set">Ad Link</label>

                                                                </div>
                                                        </div>

                                                        <div class="settings2">
                                                                <span>:</span>
                                                        </div>

                                                        <div class="settings3">
                                                                <div class="form-group">
                                                                        <?php echo $form->textField($model, 'link', array('class' => 'form-set')); ?>
                                                                </div>
                                                        </div>
                                                        <?php echo $form->error($model, 'link'); ?>
                                                </div>

                                                <div class="row buttons">
                                                        <?php echo CHtml::submitButton('Submit', array("class=" => "hvr-shutter-in-horizontals request-btn")); ?>
                                                </div>

                                                <?php $this->endWidget(); ?>

                                        </div><!-- form -->



                                </div>
                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>