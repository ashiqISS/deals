<div class="clearfix"></div>
<div class="subtotal-1">
        <span class="subs-1">subtotal</span>
</div>
<div class="subtotal-2"><span class="subs-2"> <?php echo Yii::app()->Currency->convert($subtotoal); ?></span></div>

<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/cart/Mycart/" class="btn proceed-cart btn-default">My Shopping Bag / Checkout</a>