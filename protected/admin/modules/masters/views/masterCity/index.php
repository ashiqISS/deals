<?php
/* @var $this MasterCityController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Master Cities',
);

$this->menu=array(
	array('label'=>'Create MasterCity', 'url'=>array('create')),
	array('label'=>'Manage MasterCity', 'url'=>array('admin')),
);
?>

<h1>Master Cities</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
