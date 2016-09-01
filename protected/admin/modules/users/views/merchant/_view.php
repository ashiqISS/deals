<?php
/* @var $this MerchantController */
/* @var $data Merchant */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fullname')); ?>:</b>
	<?php echo CHtml::encode($data->fullname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone_number')); ?>:</b>
	<?php echo CHtml::encode($data->phone_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('verification_code')); ?>:</b>
	<?php echo CHtml::encode($data->verification_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_verification')); ?>:</b>
	<?php echo CHtml::encode($data->email_verification); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('product_categories')); ?>:</b>
	<?php echo CHtml::encode($data->product_categories); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('merchant_type')); ?>:</b>
	<?php echo CHtml::encode($data->merchant_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_count')); ?>:</b>
	<?php echo CHtml::encode($data->product_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shop_name')); ?>:</b>
	<?php echo CHtml::encode($data->shop_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shop_logo')); ?>:</b>
	<?php echo CHtml::encode($data->shop_logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shop_banner')); ?>:</b>
	<?php echo CHtml::encode($data->shop_banner); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pincode')); ?>:</b>
	<?php echo CHtml::encode($data->pincode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('city')); ?>:</b>
	<?php echo CHtml::encode($data->city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locality')); ?>:</b>
	<?php echo CHtml::encode($data->locality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('landmark')); ?>:</b>
	<?php echo CHtml::encode($data->landmark); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('state')); ?>:</b>
	<?php echo CHtml::encode($data->state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country')); ?>:</b>
	<?php echo CHtml::encode($data->country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vat_tin')); ?>:</b>
	<?php echo CHtml::encode($data->vat_tin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bad_attempts')); ?>:</b>
	<?php echo CHtml::encode($data->bad_attempts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CB')); ?>:</b>
	<?php echo CHtml::encode($data->CB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('UB')); ?>:</b>
	<?php echo CHtml::encode($data->UB); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOC')); ?>:</b>
	<?php echo CHtml::encode($data->DOC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DOU')); ?>:</b>
	<?php echo CHtml::encode($data->DOU); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_payment_done')); ?>:</b>
	<?php echo CHtml::encode($data->is_payment_done); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field1')); ?>:</b>
	<?php echo CHtml::encode($data->field1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field2')); ?>:</b>
	<?php echo CHtml::encode($data->field2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('field3')); ?>:</b>
	<?php echo CHtml::encode($data->field3); ?>
	<br />

	*/ ?>

</div>