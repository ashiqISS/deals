<?php
/* @var $this MastersBrandController */
/* @var $model MastersBrand */

$this->breadcrumbs=array(
	'Masters Brands'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List MastersBrand', 'url'=>array('index')),
	array('label'=>'Create MastersBrand', 'url'=>array('create')),
	array('label'=>'Update MastersBrand', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete MastersBrand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MastersBrand', 'url'=>array('admin')),
);
?>

<h1>View MastersBrand #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'brand_name',
		'cb',
		'doc',
	),
)); ?>
