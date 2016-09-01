<?php
/* @var $this MastersSizeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Masters Sizes',
);

$this->menu=array(
	array('label'=>'Create MastersSize', 'url'=>array('create')),
	array('label'=>'Manage MastersSize', 'url'=>array('admin')),
);
?>

<h1>Masters Sizes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
