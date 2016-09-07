<section class="content-header">
        <h1>
                OrderProducts                <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/orderProducts/admin'; ?>"><i class="fa fa-dashboard"></i>  OrderProducts</a></li>
                <li class="active">Manage</li>
        </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/orderProducts/create'; ?>" class='btn  btn-success manage'>Add OrderProducts</a>
<div class="col-xs-12 form-page"  style="margin-top: .5em;">
        <div class="box">
                <div class="box-body table-responsive no-padding">
                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'order-products-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//		'order_id',
                                array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                                    'value' => function($data) {
                                            return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $data->product_id . '" target="_blank">' . $data->product->product_code . '</a>';
                                    },
                                    'type' => 'raw',
                                ),
                                'quantity',
                                array('name' => 'amount',
                                    'value' => function($data) {
                                            return 'INR ' . $data->amount . '/-';
                                    }
                                ),
                                'DOC',
//		'status',
                                array(
                                    'header' => '<font color="#61625D">View</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{view}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">Update</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{update}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">Delete</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{delete}',
                                ),
                                array(
                                    'header' => '<font color="#61625D">Add New History</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{status}',
                                    'buttons' => array(
                                        'status' => array(
                                            'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderHistory/create/id/$data->id"',
                                            'label' => '<i class="fa fa-truck" style="font-size:20px;padding:2px;"></i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'History',
                                                'target' => '_blank',
                                            ),
                                        ),
                                    ),
                                ),
                                array(
                                    'header' => '<font color="#61625D">Print Invoice</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{print}',
                                    'buttons' => array(
                                        'print' => array(
                                            'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/print/id/$data->id"',
                                            'label' => '<i class="fa fa-print" style="font-size:20px;padding:2px;"></i>',
                                            'options' => array(
                                                'data-toggle' => 'tooltip',
                                                'title' => 'Print',
                                                'target' => '_blank',
                                            ),
                                        ),
                                    ),
                                ),
                            ),
                        ));
                        ?>
                </div>
        </div>
</div>
