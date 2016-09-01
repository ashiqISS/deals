<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Checkout</h1>
                        </div>
                </div>
        </div>
</section>
<?php echo $this->renderPartial('_breadcremb'); ?>
<script src="<?php echo Yii::app()->baseUrl ?>/js/jquery-1.11.3.min.js"></script>
<section class="checkout">


        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <div class="checks">
                                        <div class="checks-1">
                                                <h1>New Customer</h1>
                                                <p><strong>Register Account:</strong></p>
                                                <!--<a class="options" href="#">Register Account</a>-->
                                                <!--<a class="options" href="#">Guest Checkout</a>-->
                                                <p>By creating an account you will be able to shop faster, be up to date on an order's status,
                                                        and keep track of the orders you have  previously made.</p>
                                                <?php echo CHtml::link('Register', array('checkout/billing'), array('class' => 'regbtn')); ?>
                                        </div>
                                        <div class="checks-2">
                                                <h1>Returning Customer</h1>
                                                <p>I am a returning customer</p>
                                                <form role="form">
                                                        <div class="form-group">
                                                                <input type="email" class="form-controlq" id="email" placeholder="E-Mail">
                                                        </div>
                                                        <div class="form-group">
                                                                <input type="password" class="form-controlq" id="pwd" placeholder="Password">
                                                        </div>
                                                        <a class="forget" href="#">Forgotten Password</a>
                                                        <input type="submit" value="Login">
                                                </form>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</section>