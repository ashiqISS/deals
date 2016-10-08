<?php
/* @var $this AddressBookController */
/* @var $model AddressBook */
?>

<section class="content-header">
        <h1>
                AddressBook    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">AddressBook</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/masters/addressBook/create'; ?>" class='btn  btn-laksyah'>Add New AddressBook</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'address-book-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
                                array(
                                    'name' => 'user_id',
                                    'header' => 'User',
                                    'value' => '$data->user->first_name',
//                                            'value' => function($data) {
//
//                                                    return $data->adminPost->post_name;
//                                            },
                                    'filter' => CHtml::listData(BuyerDetails::model()->findAll(), 'id', 'first_name')
                                ),
                                'name',
                                'email',
                                'phone',
                                /*
                                  'address_line_1',
                                  'address_line_2',
                                  'country',
                                  'state',
                                  'city',
                                  'pincode',
                                  'map',
                                  'default_billing_address',
                                  'default_shipping_address',
                                  'doc',
                                  'cb',
                                  'dou',
                                  'ub',
                                  'status',
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

