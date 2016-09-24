<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Checkout</h1>
                        </div>
                </div>
        </div>
</section>
<style>
        .checkbox label, .radio label {
                min-height: 20px;
                padding-left: 0px;
        }
</style>
<?php echo $this->renderPartial('_breadcremb'); ?>
<section class="checkout">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <div class="accountsettings">
                                        <form action="<?php echo yii::app()->request->baseUrl; ?>/index.php/Checkout/Payment_details" method="post">
                                                <div class="col-md-12">
                                                        <div class="ch_box"> <h1>Payment Methods </h1>
                                                                <div class="checkbox txt">
                                                                        <label class="radio-inline ">
                                                                                <input checked="" type="radio" name="payment_option" value="1">CC Avenue Payment Gateway(Internet Banking, Credit,Debit)
                                                                        </label>
                                                                </div>
                                                                <div class="checkbox txt">
                                                                        <label class="radio-inline ">
                                                                                <input type="radio" name="payment_option" value="2">Paypal Checkout
                                                                        </label>
                                                                </div>
                                                                <div class="checkbox txt">
                                                                        <label class="radio-inline ">
                                                                                <input type="radio" name="payment_option" value="3">Cash On Delivery
                                                                        </label>
                                                                </div>

                                                                <div style="clear:both"></div></div>
                                                </div>
                                                <?php
                                                $user = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                                $reward_points = RewardPointTable::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                                ?>
                                                <?php if (!empty($reward_points) && $reward_points->point != 0) { ?>



                                                        <div class = "col-md-12">
                                                                <br />
                                                                <br />
                                                                <br />
                                                                <div class = "ch_box"> <h1>Redeem Your Reward Points </h1>
                                                                        <h3>Your Reward point balance : <?php echo $reward_points->point; ?></h3>
                                                                        <p>If you want to redeem the Reward points Please Select YES.</p>

                                                                        <div class = "checkbox txt">
                                                                                <label class = "radio-inline ">
                                                                                        <input type = "radio" name = "reward_point" value = "1">Yes
                                                                                </label>
                                                                        </div>
                                                                        <div class = "checkbox txt">
                                                                                <label class = "radio-inline ">
                                                                                        <input type = "radio" name = "reward_point" value = "2">No
                                                                                </label>
                                                                        </div>

                                                                        <div style = "clear:both"></div></div>
                                                        </div>
                                                <?php } ?>
                                                <div class = "col-md-12">
                                                        <div class = "row">
                                                                <div class = "col-md-6"></div>
                                                                <div class = "col-md-6">
                                                                        <div class = "btn_upcmg">
                                                                                <div class = "btn-place-1">
                                                                                        &nbsp;
                                                                                </div>
                                                                                <div class = "btn-place-2">
                                                                                        <button type = "submit" class = "ripple btn log-btn btn-default">Continue</button>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </form>
                                </div>
                        </div>
                </div>
        </div>
</section>