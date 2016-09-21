<style>
        span.colors1 {
                color: #996600;
                font-size: 15px;
                /* font-weight: bold; */
        }
</style>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery.min.js"></script>
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Shopping Cart</h1>

                        </div>
                </div>
                <div class="row">
                        <div class="col-xs-12">
                                <?php if (Yii::app()->user->hasFlash('errorcoupon')) { ?>
                                        <div class="alert alert-danger">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Error!</strong> <?php echo Yii::app()->user->getFlash('errorcoupon'); ?>
                                        </div>

                                <?php } ?>
                                <?php if (Yii::app()->user->hasFlash('successcoupon')) { ?>
                                        <div class="alert alert-success">
                                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                <strong>Error!</strong> <?php echo Yii::app()->user->getFlash('errorcoupon'); ?>
                                        </div>

                                <?php } ?>

                        </div>
                </div>
        </div>
</section>

<section class="shoppingcart">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-9">

                                <?php foreach ($carts as $cart) { ?>
                                        <?php $product = Products::model()->findByPk($cart->product_id); ?>
                                        <div class="purchase">
                                                <div class="pur-1">
                                                        <?php if ($product->main_image != "") { ?>
                                                                <img  style="width: 100px; height: 100px;" class="cartss img-responsive"  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                                                                echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                                                                ?>/<?php echo $product->id; ?>/small.<?php echo $product->main_image; ?>" alt=""/>
                                                              <?php } ?>

                                                </div>
                                                <div class="pur-2">
                                                        <h3><?php echo $product->product_name; ?> </h3>

                                                        <div class="part1">
                                                                <h2>Product Code   :  <?php echo $product->product_code; ?></h2>
                                                        </div>
                                                        <div class="part2">
                                                                <div class="star">
                                                                        <?php
                                                                        $product_reviews = UserReviews::model()->findAllByAttributes(array('product_id' => $product->id, 'approvel' => 1), array('order' => 'id desc'));
                                                                        if (!empty($product_reviews)) {
                                                                                foreach ($product_reviews as $product_review) {
                                                                                        $rating += $product_review->rating;
                                                                                }

                                                                                $total_rating = ceil($rating / (count($product_reviews)));
                                                                        }
                                                                        ?>
                                                                        <ul>
                                                                                <?php
                                                                                $j = $total_rating;
                                                                                $k = 5 - $j;
                                                                                ?>
                                                                                <?php
                                                                                for ($i = 1; $i <= $j; $i++) {
                                                                                        ?>
                                                                                        <li><i class="fa stars fa-star"></i></li>
                                                                                <?php } ?>
                                                                                <?php
                                                                                for ($i = 1; $i <= $k; $i++) {
                                                                                        ?>
                                                                                        <li><i class="fa stars fa-star-o"></i></li>
                                                                                <?php } ?>
                                                                        </ul>
                                                                </div>
                                                        </div>

                                                        <div class="clearfix"></div>
                                                        <div class="part1">
                                                                <ul>
                                                                        <li>Quantity</li>
                                                                        <li>
                                                                                <div class="form-group">
                                                                                        <form action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/updatecart" method="post" id="qty_<?php echo $cart->id; ?>">
                                                                                                <input type="hidden" value="<?php echo $cart->id; ?>" name="cart_id" />
                                                                                                <select class="form-cart " id="<?php echo $cart->id; ?>" name="car_quantity" >
                                                                                                        <?php for ($i = 1; $i <= 10; $i++) { ?>
                                                                                                                <option <?php
                                                                                                                if ($i == $cart->quantity) {
                                                                                                                        echo 'selected';
                                                                                                                }
                                                                                                                ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                                                                <?php }
                                                                                                                ?>

                                                                                                </select>
                                                                                        </form>

                                                                                </div>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                        <div class="part3">
                                                                <ul>
                                                                        <li>Unit Price</li>
                                                                        <li><?php echo Yii::app()->Discount->Discount($product); ?></li>
                                                                </ul>
                                                        </div>
                                                </div>
                                                <div class="pur-3">
                                                        <a href="javascript:void(0)" canname="<?php echo $product->canonical_name; ?>" cartid="<?php echo $cart->id; ?>" class="remove_this"><i class="fa fa-trash"></i></a>
                                                        <h4><?php echo Yii::app()->Discount->DiscountCart($product, $cart->quantity); ?></h4>
                                                </div>


                                        </div>


                                        <div class="clearfix"></div>
                                <?php } ?>

                        </div>


                        <div class="col-xs-12 col-sm-12 col-md-3">
                                <table id="t03">
                                        <tbody>
                                                <tr>
                                                        <td><span class="subs">Sub-Total</span></td>
                                                        <td><span class="colors1"><?php echo $subtotal; ?></span></td>
                                                </tr>
                                                <?php
                                                $sumarray = array();
                                                $billcat = array();
                                                foreach ($carts as $cart_tax) {
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
                                                foreach (Yii::app()->Discount->Taxcalculate($carts) as $key11 => $value11) {
                                                        ?>
                                                        <tr>
                                                                <td><span class="subs"><?php echo $key11; ?></span></td>
                                                                <td><span class="colors1"><?php echo Yii::app()->Currency->convert($value11); ?></span></td>
                                                        </tr>
                                                <?php } ?>
                                                <tr>
                                                        <td>Shipping Charge</td>
                                                        <td><span class="colors1"><?php echo Yii::app()->Currency->convert(Yii::app()->Shipping->Calculate()); ?></span></td>
                                                </tr>

                                                <?php //echo $coupon_amount;          ?>
                                                <?php if ($coupon_amount > 0) { ?>
                                                        <tr>
                                                                <td>Coupon Code (<span style="font-size: 9px;"><?php echo $coupen_details->code; ?></span>)</td>
                                                                <td><span class="colors1"><?php echo Yii::app()->Currency->convert($coupon_amount); ?></span></td>
                                                        </tr>
                                                <?php } ?>
                                                <tr>
                                                        <td>Total</td>
                                                        <td><span class="colors"><?php echo Yii::app()->Currency->convert($granttotal); ?></span></td>
                                                </tr>
                                        </tbody>
                                </table>
                                <div class="clearfix"></div>

                                <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#p1">
                                                        <div class="panel-heading headz">

                                                                <span class="panel-title">
                                                                        <i class="glyphicon gly glyphicon-minus"></i>  Coupon Code
                                                                </span>


                                                        </div>
                                                </a>
                                                <div id="p1" class="panel-collapse collapse in">
                                                        <div class="panel-body">
                                                                <form class="form-inline" action="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/updatecoupon" method="post" >
                                                                        <div class="form-group">

                                                                                <input type="test" class="form-control" name="coupon_code"  placeholder="Enter your coupon here">
                                                                        </div>

                                                                        <button type="submit" class="btn btn-default go">Go</button>
                                                                </form>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="panel panel-default">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#p2"> <div class="panel-heading headz">

                                                                <span class="panel-title">
                                                                        <i class="glyphicon gly glyphicon-plus"></i>  Estimate Shipping
                                                                </span>


                                                        </div>
                                                </a>
                                                <div id="p2" class="panel-collapse collapse">
                                                        <div class="panel-body">
                                                                <form role="form">
                                                                        <div class="form-group">

                                                                                <input type="email" class="form-control" id="email" placeholder="Country">
                                                                        </div>
                                                                        <div class="form-group">

                                                                                <input type="password" class="form-control" id="pwd" placeholder="region/space">
                                                                        </div>
                                                                        <div class="form-group">

                                                                                <input type="password" class="form-control" id="pwd" placeholder="post code">
                                                                        </div>
                                                                </form>
                                                                <input type="submit" value="Get Quotes">
                                                        </div>
                                                </div>


                                        </div>



                                </div>
                                <div class="clearfix"></div>
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/proceed"><button type="submit" class="btn new-btn1 btn-default"> Proceed to Checkout</button></a>
                                <button type="submit" class="btn new-btn2 btn-default"> Continue Shopping</button>
                        </div>



                </div>
        </div>
</section>
<?php if (Yii::app()->user->hasFlash('success')): ?>
        <script>
                $(document).ready(function() {
                        $('#modal_success').modal('show');
                });
        </script>
        <div class="modal fade" id="modal_success" role="dialog" style="display:none">
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><img class="tick" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tick.png">Success</h4>
                                </div>
                                <div class="modal-body">
                                        <p><?php echo Yii::app()->user->getFlash('success'); ?></p>
                                </div>

                        </div>

                </div>
        </div>

<?php endif; ?>


<?php if (Yii::app()->user->hasFlash('error')): ?>
        <script>
                $(document).ready(function() {
                        $('#modal_error').modal('show');
                });</script>
        <div class="modal fade" id="modal_error" role="dialog" style="display:none">
                <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title"><img class="tick" src="<?php echo Yii::app()->request->baseUrl; ?>/images/wrong.png">Bad Luck</h4>
                                </div>
                                <div class="modal-body">
                                        <p><?php echo Yii::app()->user->getFlash('error'); ?></p>
                                </div>

                        </div>

                </div>
        </div>
        <div class="info">

        </div>
<?php endif; ?>
<script>
        $(document).ready(function() {

                $(".form-cart").change(function() {

                        var id = $(this).attr("id");
                        $("#qty_" + id).submit();
                });
        });
        $(document).ready(function() {
                var selectIds = $('#p1,#p2,#p3,#p4,#p5');
                $(function($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function() {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>