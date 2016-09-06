<?php
/* @var $this PlanDetailsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plan Details',
);

$this->menu=array(
	array('label'=>'Create PlanDetails', 'url'=>array('create')),
	array('label'=>'Manage PlanDetails', 'url'=>array('admin')),
);
?>

<h1>Plan Details</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
