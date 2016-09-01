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
                                                                                                        <td><h2><?php echo Yii::app()->Discount->Discount($prod_details); ?></h2></td>
                                                                                                        <td><h2><?php echo Yii::app()->Discount->DiscountCart($prod_details, $cart->quantity); ?></h2></td>
                                                                                                </tr>
                                                                                        <?php } ?>
                                                                                        <tr>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td><h3>Sub-Totald:</h3></td>
                                                                                                <td><h3><?php echo $subtotal; ?></h3></td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td><h3>Shipping Rate:</h3></td>
                                                                                                <td><h3><?php echo Yii::app()->Currency->convert(0); ?></h3></td>
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
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td></td>
                                                                                                <td><h3>Grant Total</h3></td>
                                                                                                <td><h3><?php echo Yii::app()->Currency->convert($granttotal); ?></h3></td>
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
                                                                                <a href="<?php echo yii::app()->request->baseUrl; ?>/index.php/Checkout/Success" ><button type="submit" class="ripple btn log-btn btn-default">Proceed to pay</button></a>
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