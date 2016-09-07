<?php
/* @var $this OrderProductsController */
/* @var $model OrderProducts */

$this->breadcrumbs = array(
    'Order Products' => array('index'),
    $model->id,
);
?>

<h1>View OrderProducts #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        array('name' => 'Order Id',
            //'value' => '$data->user->first_name',
            'value' => function($data) {
                    return $data->order_id;
            },
            'type' => 'raw',
        ),
        array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
            'value' => function($model) {
                    $product_details = Products::model()->findByPk($model->product_id);
                    return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $product_details->id . '" target="_blank">' . $product_details->product_name . '-' . $product_details->product_code . '</a>';
            },
            'type' => 'raw',
        ),
        array('name' => 'Merchant',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
            'value' => function($model) {

                    $product_details = Products::model()->findByPk($model->product_id);

                    if ($product_details->merchant_id != 0) {
                            $merchent = Merchant::model()->findByPk($product_details->merchant_id);
                            return $merchent->first_name;
                    } else {
                            return 'Admin';
                    }
            },
            'type' => 'raw',
        ),
        'quantity',
        'amount',
        'DOC',
        array('name' => 'status',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
            'value' => function($data) {
                    return OrderStatus::model()->findByPk($data->status)->title . ' ' . OrderStatus::model()->findByPk($data->status)->description;
            },
            'type' => 'raw',
        ),
    ),
));
?>

<section class="content-header">
        <h1>Order History</h1>
        <br />
        <a href="<?php echo Yii::app()->baseUrl; ?>/admin.php/products/orderHistory/create/id/<?php echo $model->id; ?>" class="btn  btn-success manage">Add New History</a>
</section>

<?php $history = new OrderHistory('search'); ?>
<?php
$this->widget('booster.widgets.TbGridView', array(
    'type' => ' bordered condensed hover',
    'id' => 'order-products-grid',
    'dataProvider' => $history->search(array('condition' => 'order_id = ' . $model->order_id . ' AND product_id = ' . $model->product_id)),
    'dataProvider' => $history->search(),
    //'filter' => $products,
    'columns' => array(
        'date',
        array('name' => 'status',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
            'value' => function($data) {
                    return OrderStatus::model()->findByPk($data->order_status)->title . ' ' . OrderStatus::model()->findByPk($data->order_status)->description;
            },
            'type' => 'raw',
        ),
        'order_status_comment',
        array('name' => 'shipping_type',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
            'value' => function($data) {
                    return OrderStatus::model()->findByPk($data->shipping_type)->shipping_type;
            },
            'type' => 'raw',
        ),
        'tracking_id',
        array(
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '',
        ),
    ),
));
?>
