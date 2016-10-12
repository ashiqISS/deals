<?php
/* @var $this OrderProductsController */
/* @var $model OrderProducts */
?>

<section class="content-header">
        <h1>
                OrderProducts    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">OrderProducts</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <!--<a href="<?php // echo Yii::app()->request->baseurl . '/orderProducts/create';     ?>" class='btn  btn-laksyah'>Add New OrderProducts</a>-->
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'order-products-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                'order_id',
                                array(
                                    'name' => 'product_id',
                                    'value' => function($data) {
                                            $product_det = Products::model()->findByPk($data->product_id);
                                            return $product_det->product_name;
                                    },
                                    'type' => 'raw'
                                ),
                                'quantity',
                                'amount',
                                'DOC',
                            /*
                              'status',
                              'order_comments',
                              'gift_option',
                              'rate',
                              'option_id',
                              'merchant_id',
                              'shipping_charge',
                             */
//                                array(
//                                    'header' => '<font color="#61625D">Delete</font>',
//                                    'htmlOptions' => array('nowrap' => 'nowrap'),
//                                    'class' => 'booster.widgets.TbButtonColumn',
//                                'template' => '{delete}',
//                                ),
//                                array(
//                                    'header' => '<font color="#61625D">View</font>',
//                                    'htmlOptions' => array('nowrap' => 'nowrap'),
//                                    'class' => 'booster.widgets.TbButtonColumn',
//                                'template' => '{view}',
//                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>
</section>

