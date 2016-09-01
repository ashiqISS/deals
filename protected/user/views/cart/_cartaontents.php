<div class="item-1 " style="position: relative;">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php echo $folder; ?>/<?php echo $prod_details->id; ?>/small.<?php echo $prod_details->main_image; ?>" />
        <h1><?php echo $prod_details->product_name; ?></h1>
        <h2><span>Qty:</span>	<?php echo $cart_content->quantity; ?></h2>
        <h2><span>Price:</span>	<?php echo Yii::app()->Discount->Discount($prod_details); ?></h2>
        <div class="remove_item" canname="<?php echo $prod_details->canonical_name; ?>" cartid="<?php echo $cart_content->id; ?>"><a  class="cart_close1" >Remove</a></div>
</div>