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

                                        <?php
                                        $form = $this->beginWidget('CActiveForm', array(
                                            'id' => 'banking-details-form',
                                            'htmlOptions' => array('class' => 'form-horizontal'),
                                            // Please note: When you enable ajax validation, make sure the corresponding
                                            // controller action is handling ajax validation correctly.
                                            // There is a call to performAjaxValidation() commented in generated controller code.
                                            // See class documentation of CActiveForm for details on this.
                                            'enableAjaxValidation' => false,
                                        ));
                                        ?>

                                        <?php // echo $form->errorSummary($model); ?>
                                        <br/>
                                        <!--<div class="form-inline">-->

                                        <div class="form-group">
                                                <div class="col-sm-2 control-label">
                                                        <label>Account Type</label>
                                                        <?php // echo $form->labelEx($model,'account_type');  ?>
                                                </div>
                                                <div class="col-sm-10">
                                                        <?php
                                                        if ($model->account_type != '') {

                                                        } else {
                                                                $model->account_type = 1;
                                                        }

                                                        echo $form->radioButtonList($model, 'account_type', array('1' => 'New Paypal Account', '2' => 'New Bank Account'), array('name' => 'account_type', 'onchange' => 'accountTypeChange(this.value)', 'separator' => '&nbsp', 'style' => 'margin-left: 40px;'));
                                                        ?>
                                                        <?php // echo $form->textField($model,'account_type',array('class' => 'form-control'));  ?>
                                                        <?php echo $form->error($model, 'account_type'); ?>
                                                </div>
                                        </div>
                                        <div class="bankDetails" style="color: red">
                                                <div class="form-group">
                                                        <div class="col-sm-2 control-label">
                                                                <?php echo $form->labelEx($model, 'account_holder_name'); ?>
                                                        </div>
                                                        <div class="col-sm-10">
                                                                <?php echo $form->textField($model, 'account_holder_name', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'account_holder_name'); ?>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-sm-2 control-label">
                                                                <?php echo $form->labelEx($model, 'account_number'); ?>
                                                        </div>
                                                        <div class="col-sm-10">
                                                                <?php echo $form->textField($model, 'account_number', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'account_number'); ?>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-sm-2 control-label">
                                                                <?php echo $form->labelEx($model, 'bank_name'); ?>
                                                        </div>
                                                        <div class="col-sm-10">
                                                                <?php echo $form->textField($model, 'bank_name', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'bank_name'); ?>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-sm-2 control-label">
                                                                <?php echo $form->labelEx($model, 'ifsc'); ?>
                                                        </div>
                                                        <div class="col-sm-10">
                                                                <?php echo $form->textField($model, 'ifsc', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'ifsc'); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="paypalDetails">

                                                <div class="form-group">
                                                        <div class="col-sm-2 control-label">
                                                                <?php echo $form->labelEx($model, 'paypal_id'); ?>
                                                        </div>
                                                        <div class="col-sm-10">
                                                                <?php echo $form->textField($model, 'paypal_id', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'paypal_id'); ?>
                                                        </div>
                                                </div>

                                                <div class="form-group">
                                                        <div class="col-sm-2 control-label">
                                                                <?php echo $form->labelEx($model, 'email'); ?>
                                                        </div>
                                                        <div class="col-sm-10">
                                                                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
                                                                <?php echo $form->error($model, 'email'); ?>
                                                        </div>
                                                </div>
                                        </div>


                                        <!--</div>-->
                                        <div class="box-footer">
                                                <label>&nbsp;</label><br/>
                                                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
                                        </div>

                                        <?php $this->endWidget(); ?>



                                </div>
                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>
<script>
        $(document).ready(function () {
                type = $('input[name=account_type]:checked').val();

                if (type == 1)
                {
//           alert(type)
                        $('.bankDetails').hide();
                        $('.paypalDetails').show();
                } else
                {
                        $('.paypalDetails').hide();
                        $('.bankDetails').show();
                }
        });

        function accountTypeChange(value)
        {
//        alert(value)
                if (value == 1)
                {
                        $('.bankDetails').hide();
//            document.getElementById('bankDetails').style.display = "none";
//            document.getElementById('bankDetails').style.display = "none";
                        $('.paypalDetails').show();
                } else
                {
                        $('.paypalDetails').hide();
                        $('.bankDetails').show();
                }
        }
</script>