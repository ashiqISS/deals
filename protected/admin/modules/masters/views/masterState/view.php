<?php
/* @var $this MasterStateController */
/* @var $model MasterState */

$this->breadcrumbs=array(
	'Master States'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List MasterState', 'url'=>array('index')),
	array('label'=>'Create MasterState', 'url'=>array('create')),
	array('label'=>'Update MasterState', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete MasterState', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MasterState', 'url'=>array('admin')),
);
?>

<h1>View MasterState #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'country_id',
		'state',
		'status',
	),
)); ?>
