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
                                                <div class="ch_box">
                                                        <div class="ui-set">
                                                                <div class="table-responsive table_upcmg">
                                                                        <table class="table " style="margin-bottom:0px;">
                                                                                <thead>
                                                                                        <tr>
                                                                                                <th>Product Name</th>
                                                                                                <th>Product Code </th>
                                                                                                <th>Quantity</th>
                                                                                                <th>Unit Price   </th>
                                                                                                <th>Total </th>
                                                                                        </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                        <?php
                                                                                        foreach ($cart_exist as $cart) {
                                                                                                $prod_details = Products::model()->findByPk($cart->product_id);
//                                                                                                $total = $cart->quantity * Yii::app()->Discount->DiscountAmount($prod_details);
//                                                                                                $subtotoal = $subtotoal + $total;
                                                                                                ?>
                                                                                                <tr>
                                                                                                        <td><h2><?php echo $prod_details->product_name; ?></h2></td>
                                                                                                        <td><h2><?php echo $prod_details->product_code; ?></h2></td>
                                                                                                        <td><h2><?php echo $cart->quantity; ?></h2></td>
                                                                                                        <td><h2><?php echo Yii::app()->Discount->DiscountCartUnit($prod_details, $cart->quantity); ?></h2></td>
                                                                                                        <td><h2><?php echo Yii::app()->Discount->DiscountCart($prod_details, $cart->quantity); ?></h2></td>
                                                                                                </tr>
                                                                                        <?php } ?>
                                                                                        <tr>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td><h3>Sub-Totald:</h3></td>
                                                                                                <td><h3><?php echo Yii::app()->Currency->convert(Yii::app()->Discount->Subtotal()); ?></h3></td>
                                                                                        </tr>
                                                                                        <?php
                                                                                        $sumarray = array();
                                                                                        $billcat = array();
                                                                                        foreach ($cart_exist as $cart_tax) {
                                                                                                ?>
                                                                                                <?php $product_tax = Products::model()->findByPk($cart_tax->product_id); ?>
                                                                                                <?php
                                                                                                if ($product_tax->tax != 0) {
                                                                                                        $tax_exist = MasterTaxClass::model()->findByPk($product_tax->tax);
                                                                                                        if (!empty($tax_exist)) {
                                                                                                                $tax_rates = MaterTaxRates::model()->findAll(array("condition" => "id IN($tax_exist->tax_rate)"));
                                                                                                                ?>
                                                                                                                <?php
//
                                                                                                                foreach ($tax_rates as $tax_rate) {
                                                                                                                        if (array_key_exists($tax_rate->tax_name, $billcat)) {
                                                                                                                                $billcat[$tax_rate->tax_name] = $billcat[$tax_rate->tax_name] + $tax_rate->tax_rate;
                                                                                                                        } else {
                                                                                                                                $billcat[$tax_rate->tax_name] = $tax_rate->tax_rate;
                                                                                                                        }

//
//                                                                                $tax_value = Yii::app()->Discount->Taxcalculate($tax_rate->id, $product_tax);
                                                                                                                        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <!--                                                                                <tr>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td><span class="subs"><?php echo $tax_rate->tax_name; ?></span></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <td><span class="colors1"><?php echo $tax_value; ?></span></td>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </tr>-->
                                                                                                                        <?php
                                                                                                                }
                                                                                                                ?>
                                                                                                                <?php
                                                                                                        }
                                                                                                }
                                                                                                ?>
                                                                                                <?php
                                                                                        }


                                                                                        //print_r($billcat);
//                                                print_r($sumarray);
                                                                                        ?>
                                                                                        <?php
                                                                                        foreach (Yii::app()->Discount->Taxcalculate($cart_exist) as $key11 => $value11) {
                                                                                                ?>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td><h3><?php echo $key11; ?></h3></td>
                                                                                        <td><h3><?php echo Yii::app()->Currency->convert($value11); ?></h3></td>
                                                                                <?php } ?>
                                                                                <tr>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td><h3>Shipping Rate:</h3></td>
                                                                                        <td><h3><?php echo Yii::app()->Currency->convert(Yii::app()->Shipping->Calculate()); ?></h3></td>
                                                                                </tr>
                                                                                <?php if ($coupon_amount > 0) { ?>
                                                                                        <tr>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td><h3>Coupon Code  (<span style="font-size: 9px;"><?php echo $coupen_details->code; ?></span>):</h3></td>
                                                                                                <td><h3><?php echo Yii::app()->Currency->convert($coupon_amount); ?></h3></td>
                                                                                        </tr>
                                                                                <?php } ?>
                                                                                <tr>
                                                                                        <?php $payment_mode = Order::model()->findByPk(Yii::app()->session['orderid'])->payment_mode; ?>
                                                                                        <td><h5 style="font-weight: bold; text-align: center">Payment Method: <?php
                                                                                                        if ($payment_mode == 1) {
                                                                                                                echo 'Pyament Gateway';
                                                                                                        } else if ($payment_mode == 2) {
                                                                                                                echo 'Paypal Checkout';
                                                                                                        } else {
                                                                                                                echo 'Cash On delivery';
                                                                                                        }
                                                                                                        ?></h5></td>
                                                                                        <td></td>
                                                                                        <td></td>
                                                                                        <td><h3>Grant Total</h3></td>
                                                                                        <td><h3><?php echo Yii::app()->Currency->convert(Yii::app()->Discount->Granttotal()); ?></h3></td>
                                                                                </tr>
                                                                                <tr>
                                                                                </tr>
                                                                                </tbody>
                                                                        </table>
                                                                </div>

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
                                                                                <a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/Checkout/Success" ><button type="submit" class="ripple btn log-btn btn-default">Confirm Order</button></a>
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