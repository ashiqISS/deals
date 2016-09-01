<?php
/* @var $this MasterCityController */
/* @var $model MasterCity */

$this->breadcrumbs=array(
	'Master Cities'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MasterCity', 'url'=>array('index')),
	array('label'=>'Create MasterCity', 'url'=>array('create')),
	array('label'=>'Update MasterCity', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MasterCity', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterCity', 'url'=>array('admin')),
);
?>

<h1>View MasterCity #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'country_id',
		'state_id',
		'city',
		'status',
		'cb',
		'ub',
		'doc',
		'dou',
	),
)); ?>
