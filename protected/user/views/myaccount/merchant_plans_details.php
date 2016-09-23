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
                                        <h4>Your Plans Details</h4>
                                        <?php
                                        $this->widget('zii.widgets.CDetailView', array(
                                            'data' => $model,
                                            'attributes' => array(
                                                array('name' => 'Plan Name',
                                                    //'value' => '$data->user->first_name',
                                                    'value' => function($data) {
                                                            return PlanDetails::model()->findByPk($data->plan_id)->plan_name;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Plan Amount',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return Yii::app()->Currency->convert($data->amount);
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Plan Creation Date',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return Date('d-M-Y', strtotime($data->doc));
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Plan Expiration Date',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {
                                                            $date = date('Y-m-d', strtotime($data->doc));
                                                            return date("d-M-Y", strtotime($date . " +  $data->no_of_days days"));
                                                    },
                                                    'type' => 'raw',
                                                ),
//                                                array('name' => 'Featured Products Allocation',
////                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
//                                                    'value' => function($data) {
//
//                                                            return $data->featured;
//                                                    },
//                                                    'type' => 'raw',
//                                                ),
//                                                array('name' => 'Featured Products Left to Upload',
////                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
//                                                    'value' => function($data) {
//
//                                                            return $data->featured_left;
//                                                    },
//                                                    'type' => 'raw',
//                                                ),
                                                array('name' => 'Products Allocation',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_product;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Products Left To Upload',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_product_left;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Ads Allocation',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_ads;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Ads Left To Upload',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {

                                                            return $data->no_of_ads_left;
                                                    },
                                                    'type' => 'raw',
                                                ),
                                                array('name' => 'Status',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                                    'value' => function($data) {
                                                            if ($data->status == 1) {
                                                                    return 'Active';
                                                            } else {
                                                                    return 'Plan Expired';
                                                            }
                                                    },
                                                    'type' => 'raw',
                                                ),
                                            ),
                                        ));
                                        ?>
                                </div>
                                <br />

                                <div class="btn-place-1">
                                        <?php echo CHtml::link('Back', array('Myaccount/UpgradePlan'), array('class' => 'reward hvr-shutter-in-horizontal left-btns')); ?>
                                </div>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                        </div>

                </div>
        </div>
</section>