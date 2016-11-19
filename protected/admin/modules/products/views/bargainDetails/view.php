<?php
/* @var $this BargainDetailsController */
/* @var $model BargainDetails */

$this->breadcrumbs=array(
	'Bargain Details'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List BargainDetails', 'url'=>array('index')),
	array('label'=>'Create BargainDetails', 'url'=>array('create')),
	array('label'=>'Update BargainDetails', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete BargainDetails', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage BargainDetails', 'url'=>array('admin')),
);
?>

<h1>View BargainDetails #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'user_id',
		'bidd_amount',
		'status',
		'doc',
		'dou',
		'ub',
	),
)); ?>
