<?php
/* @var $this AdPaymentController */
/* @var $model AdPayment */

$this->breadcrumbs=array(
	'Ad Payments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AdPayment', 'url'=>array('index')),
	array('label'=>'Create AdPayment', 'url'=>array('create')),
	array('label'=>'Update AdPayment', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdPayment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdPayment', 'url'=>array('admin')),
);
?>

<h1>View AdPayment #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'position',
		'image',
		'vendor_name',
		'sort_order',
		'display_from',
		'display_to',
		'payment_status',
		'cb',
		'doc',
	),
)); ?>
