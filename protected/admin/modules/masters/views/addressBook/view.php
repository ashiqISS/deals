<?php
/* @var $this AddressBookController */
/* @var $model AddressBook */

$this->breadcrumbs=array(
	'Address Books'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List AddressBook', 'url'=>array('index')),
	array('label'=>'Create AddressBook', 'url'=>array('create')),
	array('label'=>'Update AddressBook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AddressBook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AddressBook', 'url'=>array('admin')),
);
?>

<h1>View AddressBook #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_type',
		'user_id',
		'name',
		'email',
		'phone',
		'address_line_1',
		'address_line_2',
		'country',
		'state',
		'city',
		'pincode',
		'map',
		'default_billing_address',
		'default_shipping_address',
		'doc',
		'cb',
		'dou',
		'ub',
		'status',
	),
)); ?>
