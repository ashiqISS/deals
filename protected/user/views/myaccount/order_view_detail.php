<style>
        .order_detail_content{
                margin:25px 0px;
        }
        .order_detail_content h4{
                margin:25px 0px;
        }
        table.detail-view tr.odd {
                background: #e2dfda;
        }
        .table > thead > tr > th {

                padding: 3px;

        }
        .grid-view table.items th a {
                display: block;
                position: relative;
                font-size: 13px;
                color: #000;
                font-weight: bold;
                padding: 5px;
        }

        table td{

                padding: 10px;
        }
        a.btn.btn-success.manage {
                background-color: #343434;
                border: #ccc solid 1px;
        }
</style>
<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<?php echo $this->renderPartial('_breadcremb'); ?>
<section class="orderdetail">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <div class="order_detail_content">


                                        <h4>Order Details</h4>

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
                                                array('name' => 'Ship Address',
                                                    'type' => 'raw',
                                                    'value' => function($data) {
                                                            $order_id = Order::model()->findbyPk($data->order_id);
                                                            $shipp_add = AddressBook::model()->findByPk($order_id->ship_address_id);
                                                            $result .= $shipp_add->name . '<br />';
                                                            $result .= $shipp_add->address_line_1 . ' ' . $shipp_add->address_line_2 . '<br />';
                                                            $result .= $shipp_add->city . ' ' . $shipp_add->pincode . '<br />';
                                                            $result .= MasterState::model()->findByPk($shipp_add->state)->state . ' , ' . MasterCountry::model()->findByPk($shipp_add->country)->country . ' ' . '<br />';
                                                            return $result;
                                                    },
                                                ),
                                                array('name' => 'bill Address ',
                                                    'type' => 'raw',
                                                    'value' => function($data) {
                                                            $order_id = Order::model()->findbyPk($data->order_id);
                                                            $bill_add = AddressBook::model()->findByPk($order_id->bill_address_id);
                                                            $result1 .= $bill_add->name . '<br />';
                                                            $result1 .= $bill_add->address_line_1 . ' ' . $bill_add->address_line_2 . '<br />';
                                                            $result1 .= $bill_add->city . ' ' . $bill_add->pincode . '<br />';
                                                            $result1 .= MasterState::model()->findByPk($bill_add->state)->state . ' , ' . MasterCountry::model()->findByPk($bill_add->country)->country . ' ' . '<br />';

                                                            return $result1;
                                                    },
                                                ),
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
                                                <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/NewOrderHistory/id/<?php echo $model->id; ?>" class="btn  btn-success manage">Add New History</a>
                                                <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/PrintProductInvoice/id/<?php echo $model->id; ?>"  target="_blank" class="btn  btn-success manage">Print Invoice</a>
                                                <a href="<?php echo Yii::app()->baseUrl; ?>/index.php/Myaccount/PrintShippingDetail/id/<?php echo $model->id; ?>"  target="_blank"  class="btn  btn-success manage">Print Ship Details</a>
                                        </section>

                                        <?php $history = new OrderHistory('search'); ?>
                                        <?php $history->order_id = $model->order_id; ?>
                                        <?php $history->product_id = $model->product_id; ?>
                                        <?php
                                        $this->widget('booster.widgets.TbGridView', array(
                                            'type' => ' bordered condensed hover',
                                            'id' => 'order-products-grid',
//                                            'dataProvider' => $history->search(array('condition' => 'order_id = ' . $model->order_id . ' AND product_id = ' . $model->product_id)),
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
                                            ),
                                        ));
                                        ?>

                                </div>
                        </div>

                </div>
        </div>
</section>