<?php
/* @var $this MastersSizeController */
/* @var $model MastersSize */

$this->breadcrumbs=array(
	'Masters Sizes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MastersSize', 'url'=>array('index')),
	array('label'=>'Create MastersSize', 'url'=>array('create')),
	array('label'=>'Update MastersSize', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MastersSize', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MastersSize', 'url'=>array('admin')),
);
?>

<h1>View MastersSize #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'size',
		'cb',
		'doc',
	),
)); ?>
