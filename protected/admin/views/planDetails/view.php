<?php
/* @var $this PlanDetailsController */
/* @var $model PlanDetails */

$this->breadcrumbs = array(
    'Plan Details' => array('index'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List PlanDetails', 'url' => array('index')),
    array('label' => 'Create PlanDetails', 'url' => array('create')),
    array('label' => 'Update PlanDetails', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete PlanDetails', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage PlanDetails', 'url' => array('admin')),
);
?>

<h1>View Plan Details #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'plan_name',
        'amount',
        'featured',
        'no_of_days',
        'no_of_products',
        'no_of_ads',
        'status',
        'cb',
        'doc',
        'ub',
        'dou',
    ),
));
?>
