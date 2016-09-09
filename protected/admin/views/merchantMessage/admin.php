<?php
/* @var $this MerchantMessageController */
/* @var $model MerchantMessage */
?>

<section class="content-header">
    <h1>
        MerchantMessage    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">MerchantMessage</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/merchantMessage/create'; ?>" class='btn  btn-laksyah'>Add New MerchantMessage</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'merchant-message-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
//            		'id',
                    array(
                        'name' => 'merchant_id',
                        'filter' => CHtml::listData(Merchant::model()->findAll(array()), 'id', 'first_name'),
                        'value' => function($data) {
                        $merchant = Merchant::model()->findByAttributes(array('id' => $data->merchant_id));
                        return $merchant->first_name;
                },
                    ),
//                    'merchant_id',
                    'message',
//		'from_to',
//		'viewed',
//		'doc',
                    /*
                      'status',
                     */
//            array(
//            'header' => '<font color="#61625D">Edit</font>',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
//            'class' => 'booster.widgets.TbButtonColumn',
//            'template' => '{update}',
//            ),
//            array(
//            'header' => '<font color="#61625D">Delete</font>',
//            'htmlOptions' => array('nowrap' => 'nowrap'),
//            'class' => 'booster.widgets.TbButtonColumn',
//            'template' => '{delete}',
//            ),
                    array(
                        'htmlOptions' => array('nowrap' => 'nowrap'),
                        'class' => 'booster.widgets.TbButtonColumn',
                        'template' => '{message}',
                        'buttons' => array(
                            'message' => array(
                                'url' => 'Yii::app()->request->baseUrl."/admin.php/MerchantMessage/message/id/".$data->merchant_id',
                                'label' => '<i class="fa fa-envelope" style="font-size:15px;padding:2px;"></i>',
                                'options' => array(
                                    'data-toggle' => 'message',
                                    'title' => 'view',
                                    'target' => '_blank',
                                ),
                            ),
                        )
                    ),
                ),
            ));
            ?>
        </div>

    </div>


</div>
</section>

