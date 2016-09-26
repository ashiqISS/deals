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

                                        <?php if (Yii::app()->user->hasFlash('RequestPayment')): ?>
                                                <div class="alert alert-info fade in">
                                                        <?php echo Yii::app()->user->getFlash('RequestPayment'); ?>
                                                </div>
                                        <?php endif; ?>

                                        <?php
                                        if (empty($account_data)) {
                                                ?>
                                                <h4 class="fournotfour" style="padding: 2em;">No account details available right now!</h4>
                                                <?php
                                        } else {
                                                ?>
                                                <div class="form-group required mrg">
                                                        <div class="col-sm-12">
                                                                <h4 class="fournotfour" style="padding: 0 0 1em 1em;"> NEWGEN MERCHANT ACCOUNT</h4>
                                                        </div>
                                                        <div class="col-sm-12">

                                                                <div class="col-sm-3 col-xs-2 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">Merchant Id</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        <label for="textinput" class="control-label pay" style="font-size: 16px;"><?= $account_data->merchant_id; ?></label>
                                                                </div>
                                                        </div>
                                                        <div class="col-sm-12">

                                                                <div class="col-sm-3 col-xs-2 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">Account Balance</label>
                                                                </div>
                                                                <div class="col-sm-1 col-xs-1 zeros">
                                                                        <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                        <label for="textinput" class="control-label pay" style="font-size: 16px;"><?= Yii::app()->Currency->convert($account_data->available_balance); ?></label>
                                                                </div>
                                                        </div>
                                                        <?php
                                                        if (empty($banking_data)) {
                                                                ?>
                                                                <div class="col-sm-12">
                                                                        <h4 class="fournotfour" style="padding: 2em;">You haven't added any payment accounts yet.<a href='<?php echo Yii::app()->request->baseUrl . '/user.php/add-account'; ?>' style="color:#337ab7"> Click here to add account.</a></h4>
                                                                </div>
                                                                <?php
                                                        } else {
                                                                ?>
                                                                <?php
                                                                $form = $this->beginWidget('CActiveForm', array(
                                                                    'id' => 'buyer-details-form',
                                                                    'htmlOptions' => array('class' => 'form-horizontal'),
//                                                                    'action' => Yii::app()->request->baseUrl . '/user.php/request-pay',
                                                                    // Please note: When you enable ajax validation, make sure the corresponding
                                                                    // controller action is handling ajax validation correctly.
                                                                    // There is a call to performAjaxValidation() commented in generated controller code.
                                                                    // See class documentation of CActiveForm for details on this.
                                                                    'enableAjaxValidation' => false,
                                                                ));
                                                                ?>
                                                                <div class="col-sm-12">

                                                                        <div class="col-sm-3 col-xs-2 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">WIthdraw Amount</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                                <?php echo $form->textField($model, 'withdraw_amount', array('class' => 'form-control', 'onpaste' => 'return false;')); ?>
                                                                                <?php echo $form->error($model, 'withdraw_amount'); ?>
                                                                        </div>
                                                                </div>

                                                                <div class="col-sm-12" style="padding-top: 1em;">

                                                                        <div class="col-sm-3 col-xs-2 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">WIthdraw Account</label>
                                                                        </div>
                                                                        <div class="col-sm-1 col-xs-1 zeros">
                                                                                <label for="textinput" class="control-label" style="font-size: 16px;">:</label>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                                <select name="account" class="form-control">
                                                                                        <?php
                                                                                        foreach ($banking_data as $acc) {
                                                                                                if ($acc->account_type == 1) {
                                                                                                        ?>
                                                                                                        <!--paypal-->
                                                                                                        <option value="<?= $acc->id ?>"><?php echo $acc->paypal_id . ', ' . $acc->email; ?></option>
                                                                                                        <?php
                                                                                                } else {
                                                                                                        ?>
                                                                                                        <!--bank account-->
                                                                                                        <option value="<?= $acc->id ?>"><?php echo $acc->account_number . ', ' . $acc->bank_name; ?></option>
                                                                                                        <?php
                                                                                                }
                                                                                        }
                                                                                        ?>
                                                                                </select>
                                                                        </div>
                                                                </div>

                                                                <!--</div>-->

                                                                <div class="col-sm-12">
                                                                        <br><br>
                                                                        <button type="submit" class="btn btn-default btn-sm bt_up2 ">Request to Admin</button>
                                                                </div>
                                                                <?php $this->endWidget(); ?>
                                                        <?php } ?>
                                                </div>
                                                <?php
                                        }
                                        ?>

                                        <div class="clearfix"></div>
                                        <?php if (!empty($payoutHistory)) {
                                                ?>
                                                <br>
                                                <span style="font-size: 17px;">Transaction history : </span>
                                                <br> <br>

                                                <div class="table-responsive ac_up" style="max-height: 50em;overflow: auto">
                                                        <table class="table ac">
                                                                <thead class="thead-inverse ac_bg">
                                                                        <tr>
                                                                                <th>PayOutId</th>
                                                                                <th>Request Date </th>
                                                                                <th>Account Balance </th>
                                                                                <th>Requested Amount</th>
                                                                                <th>Balance Left </th>
                                                                                <!--<th>Status </th>-->
                                                                                <th>Approval Date </th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                        <?php foreach ($payoutHistory as $payOut) {
                                                                                ?>
                                                                                <tr>
                                                                                        <td><?= $payOut->id; ?></td>
                                                                                        <td>
                                                                                                <?php
                                                                                                $doc = strtotime($payOut->DOC);
                                                                                                echo date('d/m/Y', $doc);
                                                                                                ?>
                                                                                        </td>
                                                                                        <td><?= Yii::app()->Currency->convert($payOut->available_balance); ?></td>
                                                                                        <td><?= Yii::app()->Currency->convert($payOut->requested_amount); ?></td>
                                                                                        <td><?= Yii::app()->Currency->convert($payOut->available_balance - $payOut->requested_amount); ?></td>
                                                                                        <!--<td style="color: black"><? //= Utilities::getStatusMerchantPayout($payOut->status); ?></td>-->
                                                                                        <td>
                                                                                                <?php
                                                                                                if ($payOut->status == 5) {

                                                                                                        $dou = strtotime($payOut->DOU);
                                                                                                        echo date('d/m/Y', $dou);
                                                                                                } else {
                                                                                                        echo 'Nil';
                                                                                                }
                                                                                                ?>
                                                                                        </td>
                                                                                </tr>
                                                                        <?php } ?>

                                                                </tbody>
                                                        </table>

                                                </div>

                                        <?php } ?>




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