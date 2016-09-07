<?php
/* @var $this UserReviewsController */
/* @var $model UserReviews */
?>

<section class="content-header">
        <h1>
                UserReviews    </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">UserReviews</li>
        </ol>
</section>

<!-- Main content -->
<section class="content">
        <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/userReviews/create'; ?>" class='btn  btn-laksyah'>Add New UserReviews</a>
        <div class="col-xs-12 form-page" style="margin-top: .5em;">
                <div class="box">

                        <?php
                        $this->widget('booster.widgets.TbGridView', array(
                            'type' => ' bordered condensed hover',
                            'id' => 'user-reviews-grid',
                            'dataProvider' => $model->search(),
                            'filter' => $model,
                            'columns' => array(
//                                'id',
                                array('name' => 'user_id',
                                    'value' => function($data) {
                                            if ($data->user_id == 0) {
                                                    return 'Admin';
                                            } else {
                                                    return 'User';
                                            }
                                    },
                                ),
                                'author',
//                                'user_image',
                                array('name' => 'product_id',
                                    'value' => function($data) {
                                            $product_name = Products::model()->findByPk($data->product_id);
                                            return $product_name->product_name . '(' . $product_name->product_code . ')';
                                    },
                                ),
                                'review',
                                array('name' => 'approvel',
                                    'value' => function($data) {
                                            if ($data->approvel == 0) {
                                                    return '<span style="color:red">Approvel Pending</span>';
                                            } else {
                                                    return '<span style="color:green">Approved</span>';
                                            }
                                    },
                                    'type' => 'raw',
                                ),
                                /*
                                  'approvel',
                                  'date',
                                  'rating',
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

