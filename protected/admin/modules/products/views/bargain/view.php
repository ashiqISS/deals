<h1>Bargain Product #<?php echo $model->id; ?></h1>
<h3><?php echo $model->product_name; ?></h3>

<?php
BargainController::confirmBid();

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
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
                $catt = rtrim($catt, ', ,');
                return $catt;
            },
        ),
        'product_name',
        'product_code',
        'product_type',
        'brand_id',
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
        'merchant_type',
        array(
            'name' => 'description',
            'value' => function($data) {
                return $data->description;
            },
            'type' => 'html'
        ),
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
        'gallery_images',
        'canonical_name',
        'vendor',
        'deal_location',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'header_visibility',
        'sort_order',
        'display_category_name',
        'brand',
        array(
            'name' => 'size',
            'value' => function($data) {
                $size = explode(',', $data->size);
                $chart = '';
                foreach ($size as $s) {
                    $chart = $chart . ', ' . MastersSize::model()->findByPk($s)->size;
                }
                return substr($chart, 2);
            },
        ),
        'price',
        'wholesale_price',
        'is_discount_available',
        'discount',
        'discount_type',
        'discount_rate',
        'deal_price',
        'quantity',
        'requires_shipping',
        'shipping_rate',
        'enquiry_sale',
        array(
            'name' => 'new_from',
            'value' => function($data) {
                $date = date_create($data->new_from);
                return date_format($date, "d/m/Y");
            },
        ),
        array(
            'name' => 'new_to',
            'value' => function($data) {
                $date = date_create($data->new_to);
                return date_format($date, "d/m/Y");
            },
        ),
        array(
            'name' => 'sale_from',
            'value' => function($data) {
                $date = date_create($data->sale_from);
                return date_format($date, "d/m/Y");
            },
        ),
        array(
            'name' => 'sale_to',
            'value' => function($data) {
                $date = date_create($data->sale_to);
                return date_format($date, "d/m/Y");
            },
        ),
        array(
            'name' => 'special_price_from',
            'value' => function($data) {
                $date = date_create($data->special_price_from);
                return date_format($date, "d/m/Y");
            },
        ),
        array(
            'name' => 'special_price_to',
            'value' => function($data) {
                $date = date_create($data->special_price_to);
                return date_format($date, "d/m/Y");
            },
        ),
        'tax',
        'gift_option',
        'stock_availability',
        'video_link',
        'video',
        'weight',
        'weight_class',
        'status',
        'exchange',
        'search_tag',
        'related_products',
        'is_cod_available',
        'is_available',
        'is_featured',
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
        'CB',
        'UB',
        array(
            'name' => 'DOC',
            'value' => function($data) {
                $date = date_create($data->DOC);
                return date_format($date, "d/m/Y H:i:s");
            },
        ),
        array(
            'name' => 'DOU',
            'value' => function($data) {
                $date = date_create($data->DOU);
                return date_format($date, "d/m/Y H:i:s");
            },
        ),
    ),
));
?>

<br><br>
<h3>Bids placed for this product</h3>
<div class="col-xs-12">


    <?php
    $detailsModel = new BargainDetails('search');
//        $detailsModel->product_id = 284;
    $detailsModel->product_id = $model->id;

    $this->widget('booster.widgets.TbGridView', array(
        'type' => ' bordered condensed hover',
        'id' => 'bargain-details-grid',
        'dataProvider' => $detailsModel->search(),
        'columns' => array(
//            'id',
//                'product_id',
            array(
                'name' => 'user_id',
                'value' => function($data) {
                    $user = BuyerDetails::model()->findByPk($data->user_id);
                    $name = $user->first_name . ' ' . $user->last_name . ' (id: ' . $user->id . ')';
                    return $name;
                },
            ),
//                'user_id',
            'bidd_amount',
//            'status',
            array(
                'name' => 'status',
                'value' => function($data) {
                    switch ($data->status) {
                        case 1 : $status = 'Bid Placed';
                            break;
                        case 2 : $status = 'Bid Proceeded';
                            break;
                        case 3 : $status = 'Bid Failed';
                            break;
                        case 4 : $status = 'Already Checkouted';
                            break;
                        default : $status = 'Invalid';
                    }
                    return $status;
                },
            ),
            'doc',
        ),
    ));
    ?>
<br><br>

</div>
