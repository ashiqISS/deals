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
                                                <div class="ch_box"> <h1>Delivery Details</h1>
                                                        <h2>DTDC Shipping</h2>
                                                        <div class="checkbox txt">
                                                                <h5>Shipping Charge : Rs.250</h5>
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
                                                                                <a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/Checkout/Payment_details" ><button type="submit" class="ripple btn log-btn btn-default">Continue</button></a>
                                                                        </div>
                                                                </div>
                                                        </div>     </div>   </div>
                                </div>
                        </div>
                </div>
        </div>
</section>