<?php
/* @var $this MerchantDetailsController */
/* @var $model MerchantDetails */

$this->breadcrumbs=array(
	'Merchant Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MerchantDetails', 'url'=>array('index')),
	array('label'=>'Create MerchantDetails', 'url'=>array('create')),
	array('label'=>'Update MerchantDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MerchantDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MerchantDetails', 'url'=>array('admin')),
);
?>

<h1>View MerchantDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'fullname',
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
		'CB',
		'UB',
		'DOC',
		'DOU',
		'is_payment_done',
		'field2',
		'field3',
	),
)); ?>
