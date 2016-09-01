<section class="content-header">
        <h1>
                Master Cities

        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/admin.php/site/home"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active"> Manage Master Cities</li>
        </ol>
</section>
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/MasterCity/create'; ?>" class='btn  btn-laksyah manage'>Add New City</a>

        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">
                        <div class="box-body table-responsive no-padding">
                                <?php
                                $this->widget('booster.widgets.TbGridView', array(
                                    'type' => ' bordered condensed hover',
                                    'id' => 'master-city-grid',
                                    'dataProvider' => $model->search(),
                                    'filter' => $model,
                                    'columns' => array(
                                        array(
                                            'name' => 'country_id',
                                            'value' => function($data) {
                                                    return MasterCountry::model()->findByAttributes(array('status' => 1, 'id' => $data->country_id))->country;
                                            },
                                                    'filter' => CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country')
                                                ),
                                                array(
                                                    'name' => 'state_id',
                                                    'value' => function($data) {
                                                            return MasterState::model()->findByPk($data->state_id)->state;
                                                    },
                                                    'filter' => CHtml::listData(MasterState::model()->findAllByAttributes(array('status' => 1)), 'id', 'state')
                                                ),
                                                'city',
                                                array(
                                                    'name' => 'status',
                                                    'filter' => array(1 => 'Enabled', 0 => 'Disabled'),
                                                    'value' => function($data) {
                                                    return $data->status == 1 ? 'Enabled' : 'Disabled';
                                            }
                                                ),
                                                array(
                                                    'htmlOptions' => array('nowrap' => 'nowrap'),
                                                    'class' => 'booster.widgets.TbButtonColumn',
                                                    'template' => '{update}{delete}',
                                                ),
                                            ),
                                        ));
                                        ?>
                        </div>

                </div>


        </div>

</section>