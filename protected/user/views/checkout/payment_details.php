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
                                        <div class="col-md-12">
                                                <div class="ch_box"> <h1>Please select  on of the the preferred Payment Method on this order</h1>
                                                        <div class="checkbox txt">
                                                                <label class="radio-inline ">
                                                                        <input type="radio" name="payment_option" value="1">CC Avenue Payment Gateway(Internet Banking, Credit,Debit)
                                                                </label>
                                                                <img src="<?php echo yii::app()->request->baseUrl; ?>/images/p-1.jpg">


                                                        </div>
                                                        <div class="checkbox txt">
                                                                <label class="radio-inline ">
                                                                        <input type="radio" name="payment_option" value="2">Paypal Checkout
                                                                </label>



                                                        </div>

                                                        <div style="clear:both"></div></div>
                                        </div>
                                        <div class="col-md-12">
                                                <div class="row">
                                                        <div class="col-md-6"></div>
                                                        <div class="col-md-6">
                                                                <div class="btn_upcmg">
                                                                        <div class="btn-place-1">
                                                                                &nbsp;
                                                                        </div>
                                                                        <div class="btn-place-2">
                                                                                <a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/Checkout/Confirm" ><button type="submit" class="ripple btn log-btn btn-default">Continue</button></a>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>