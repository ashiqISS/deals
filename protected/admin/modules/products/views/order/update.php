
<section class="content-header">
        <h1>
                Order        <small>Create</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>"><i class="fa fa-dashboard"></i>  Order</a></li>
                <li class="active">create</li>
        </ol>
</section>

<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>" class='btn  btn-success manage'>Manage Order</a>
<section class="content">
        <div class="box box-info">

                <div class="box-body">
                        <?php $this->renderPartial('_form', array('model' => $model)); ?>
                </div>

        </div>
</section>
<section class="oreder_products" style="padding: 0px 30px;">
        <h3 style="margin-bottom: 15px;">Order Products</h3>
<!--        <table class="items table table-bordered table-condensed table-hover">
                <thead>
                        <tr>
                                <th id="order-history-grid_c1"><a class="sort-link" href="">Order(#) <span class="caret"></span></a></th>
                                <th id="order-history-grid_c2"><a class="sort-link" href="">Order Status Comment <span class="caret"></span></a></th>
                                <th id="order-history-grid_c3"><a class="sort-link" href="">Order Status <span class="caret"></span></a></th>
                                <th id="order-history-grid_c4"><a class="sort-link" href="">Shipping Type <span class="caret"></span></a></th>
                                <th id="order-history-grid_c5"><a class="sort-link" href="">Tracking <span class="caret"></span></a></th>
                                <th class="button-column" id="order-history-grid_c6">Edit Order Products</th>
                                <th class="button-column" id="order-history-grid_c7">Delete Order Products</th>
                        </tr>

                </thead>
                <tbody>
                        <tr class="odd">
                                <td>29</td>
                                <td>Order Placed</td>
                                <td>1</td>
                                <td>0</td>
                                <td></td>
                                <td nowrap="nowrap"><a class="update" title="" data-toggle="tooltip" href="" data-original-title="Update"><center><i class="glyphicon glyphicon-pencil"></i></center></a></td>
                                <td nowrap="nowrap"><a class="delete" title="" data-toggle="tooltip" href="" data-original-title="Delete"><center><i class="glyphicon glyphicon-trash"></i></center></a></td>
                        </tr>
                </tbody>
        </table>-->
        <?php $model1 = new OrderProducts('search'); ?>
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id' => 'order-products-grid',
            'dataProvider' => $model1->search(array('condition' => 'order_id = ' . $model->id)),
            'filter' => $model1,
            'columns' => array(
                'order_id',
                array('name' => 'product_id',
//                        'filter' => CHtml::listData(Products::model()->findAll(), 'id', 'product_name'),
                    'value' => function($model1) {
                            $product_details = Products::model()->findByPk($model1->product_id);
                            return '<a href="' . Yii::app()->baseUrl . '/admin.php/products/products/view/id/' . $product_details->id . '" target="_blank">' . $product_details->product_name . '-' . $product_details->product_code . '</a>';
                    },
                    'type' => 'raw',
                ),
                'quantity',
                array('name' => 'amount',
                    'value' => function($model1) {
                            return 'INR ' . $model1->amount . '/-';
                    }
                ),
                array('name' => 'status',
                    'value' => function($model1) {
                            $status = OrderStatus::model()->findByAttributes(array('id' => $model1->status));
                            return $status->title;
                    }
                        ),
//                        'status',
                        'order_comments',
                        'DOC',
//		'status',
                        array(
                            'header' => '<font color="#61625D">View </font>',
                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{status}',
                            'buttons' => array(
                                'status' => array(
                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/view/id/$data->id"',
                                    'label' => '<i class="fa fa-eye" style="font-size:20px;padding:2px;"></i>',
                                    'options' => array(
                                        'data-toggle' => 'tooltip',
                                        'title' => 'View In Detail',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'header' => '<font color="#61625D">Edit</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{status}',
                            'buttons' => array(
                                'status' => array(
                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/update/id/$data->id"',
                                    'label' => '<i class="fa fa-pencil" style="font-size:20px;padding:2px;"></i>',
                                    'options' => array(
                                        'data-toggle' => 'tooltip',
                                        'title' => 'update',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'header' => '<font color="#61625D">Delete</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
                            'class' => 'booster.widgets.TbButtonColumn',
                            'template' => '{status}',
                            'buttons' => array(
                                'status' => array(
                                    'url' => 'Yii::app()->request->baseUrl."/admin.php/products/orderProducts/delete/id/$data->id"',
                                    'label' => '<i class="fa fa-trash" style="font-size:20px;padding:2px;"></i>',
                                    'options' => array(
                                        'data-toggle' => 'tooltip',
                                        'title' => 'delete',
                                    ),
                                ),
                            ),
                        ),
                        array(
                            'header' => '<font color="#61625D">Add New History</font>',
                            'htmlOptions' => array('nowrap' => 'nowrap', 'style' => 'text-align:center'),
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
                            'header' => '<font color="#61625D">Print</font>',
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

</section>