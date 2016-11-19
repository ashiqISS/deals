<?php
/* @var $this ProductsController */
/* @var $model Products */
?>

<section class="content-header">
    <h1>
        Bargain   Products    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">Products</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl . '/admin.php/products/products/create'; ?>" class='btn  btn-laksyah'>Add New Products</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php
            $this->widget('booster.widgets.TbGridView', array(
                'type' => ' bordered condensed hover',
                'id' => 'products-grid',
                'dataProvider' => $model->bargains(),
                'filter' => $model,
                'columns' => array(
                    // 'id',
                    'product_name',
                    array(
                        'name' => 'category_id',
                        'value' => function($data) {
                            $cats = explode(',', $data->category_id);
                            $catt = '';
                            foreach ($cats as $cat) {
                                unset($_SESSION['category']);
                                $category = ProductCategory::model()->findByPk($cat);
                                $catt .= Yii::app()->category->selectCategories($category) . ', ';
                            }
                            return $catt;
                        },
                    ),
                    'product_code',
                    'quantity',
                    array(
                        'name' => 'main_image',
                        'value' => function($data) {
                            if ($data->main_image == "") {
                                return;
                            } else {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $data->id);
                                return '<img width="100" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . '/uploads/products/' . $folder . '/' . $data->id . '/main.' . $data->main_image . '" />';
                            }
                        },
                        'type' => 'raw'
                    ),
                    array(
                        'name' => 'merchant',
                        'value' => function($data) {
                            if ($data->merchant == 0) {
                                return 'Admin';
                            } else {
                                //return $data->merchant;
                                $marchent_name = Merchant::model()->findByPk($data->merchant);
                                if ($marchent_name->merchant_type == 2) {
                                    $marchent_type = "Wholesaler";
                                } else if ($marchent_name->merchant_type == 3) {
                                    $marchent_type = "Retailer";
                                } else {
                                    $marchent_type = "Default";
                                }
                                return $marchent_name->first_name . '(' . $marchent_type . ')';
                            }
                        },
                        'type' => 'raw'
                    ),
                    'price',
                    array(
                        'name' => 'is_admin_approved',
                        'value' => function($data) {

                            if ($data->is_admin_approved == 0) {
                                return "<span style='color:red; font-weight:bold;'>Not Approved Admin</span>";
                            } else {
                                return "<span style='color:green; font-weight:bold;'>Approved by Admin</span>";
                            }
                        },
                        'type' => 'raw'
                    ),
                    'special_price_from',
                    'special_price_to',
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

