<?php
/* @var $this MastersBrandController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Masters Brands',
);

$this->menu=array(
	array('label'=>'Create MastersBrand', 'url'=>array('create')),
	array('label'=>'Manage MastersBrand', 'url'=>array('admin')),
);
?>

<h1>Masters Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
