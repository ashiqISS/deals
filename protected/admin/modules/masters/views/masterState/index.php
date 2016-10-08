<?php
/* @var $this MasterStateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master States',
);

$this->menu=array(
	array('label'=>'Create MasterState', 'url'=>array('create')),
	array('label'=>'Manage MasterState', 'url'=>array('admin')),
);
?>

<h1>Master States</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
