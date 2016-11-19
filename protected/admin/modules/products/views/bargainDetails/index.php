<?php
/* @var $this BargainDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Bargain Details',
);

$this->menu=array(
	array('label'=>'Create BargainDetails', 'url'=>array('create')),
	array('label'=>'Manage BargainDetails', 'url'=>array('admin')),
);
?>

<h1>Bargain Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
