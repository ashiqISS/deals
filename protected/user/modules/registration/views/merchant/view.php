<?php
/* @var $this MerchantController */
/* @var $model Merchant */

$this->breadcrumbs=array(
	'Merchants'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Merchant', 'url'=>array('index')),
	array('label'=>'Create Merchant', 'url'=>array('create')),
	array('label'=>'Update Merchant', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Merchant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Merchant', 'url'=>array('admin')),
);
?>

<h1>View Merchant #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'fullname',
		'email',
		'phone_number',
		'password',
		'confirm',
		'verification_code',
		'email_verification',
		'product_categories',
		'merchant_type',
		'product_count',
		'shop_name',
		'shop_logo',
		'shop_banner',
		'address',
		'pincode',
		'city',
		'locality',
		'district',
		'state',
		'country',
		'vat_tin',
		'status',
		'last_login',
		'bad_attempts',
		'CB',
		'UB',
		'DOC',
		'DOU',
		'is_payment_done',
		'field1',
		'field2',
		'field3',
	),
)); ?>
