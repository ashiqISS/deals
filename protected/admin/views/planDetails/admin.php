<?php
/* @var $this PlanDetailsController */
/* @var $model PlanDetails */
?>

<section class="content-header">
        <h1>
                Plan Details    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Plan Details</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <!--<a href="<?php //echo Yii::app()->request->baseurl . '/admin.php/planDetails/create';    ?>" class='btn  btn-laksyah'>Add New PlanDetails</a>-->
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'plan-details-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                'plan_name',
                                'amount',
//                                'featured',
                                'no_of_days',
                                'no_of_products',
                                'no_of_ads',
                                array('name' => 'image',
                                    'value' => function ($data) {
                                            return '<img style="width:70px;height:70px;" src="' . Yii::app()->baseUrl . '/uploads/plan/' . $data->id . '/plan.' . $data->image . '">';
                                    },
                                    'type' => 'raw',
                                ),
                                /*
                                  'cb',
                                  'doc',
                                  'ub',
                                  'dou',
                                 */
                                array(
                                    'header' => '<font color="#61625D">Edit</font>',
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
//                                array(
//                                    'header' => '<font color="#61625D">View</font>',
//                                    'htmlOptions' => array('nowrap' => 'nowrap'),
//                                    'class' => 'booster.widgets.TbButtonColumn',
//                                    'template' => '{view}',
//                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>
</section>

