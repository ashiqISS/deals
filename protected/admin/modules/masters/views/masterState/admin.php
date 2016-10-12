<?php
/* @var $this MasterStateController */
/* @var $model MasterState */
?>

<section class="content-header">
        <h1>
                MasterState    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">MasterState</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/MasterState/create'; ?>" class='btn  btn-laksyah'>Add New MasterState</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'master-state-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array(
                                    'name' => 'country_id',
                                    'value' => '$data->country->country',
                                    'filter' => CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country')
                                ),
                                'state',
                                'status',
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
                                array(
                                    'header' => '<font color="#61625D">View</font>',
                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                    'class' => 'booster.widgets.TbButtonColumn',
                                    'template' => '{view}',
                                ),
                            ),
                        ));
                        ?>
                </div>

        </div>


</div>
</section>

