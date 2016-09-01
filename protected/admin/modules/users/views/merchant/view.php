<?php
/* @var $this MerchantController */
/* @var $model Merchant */
//
//$this->breadcrumbs=array(
//	'Merchants'=>array('index'),
//	$model->id,
//);
//
//$this->menu=array(
//	array('label'=>'List Merchant', 'url'=>array('index')),
//	array('label'=>'Create Merchant', 'url'=>array('create')),
//	array('label'=>'Update Merchant', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Merchant', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Merchant', 'url'=>array('admin')),
//);
?>

<h1>View Merchant #<?php echo $model->id; ?></h1>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'fullname',
        'email',
        'phone_number',
        'password',
        'verification_code',
        'email_verification',
        array(
            'name' => 'product_categories',
            'value' => function($data) {
                $cats = explode(',', $data->product_categories);
                $catt = '';
                foreach ($cats as $cat) {
                    unset($_SESSION['category']);
                    $category = ProductCategory::model()->findByPk($cat);
                    $catt .= Yii::app()->category->selectCategories($category) . ', ';
                }
                return $catt;
            },
        ),
        'merchant_type',
        'product_count',
        'shop_name',
        array(
            'name' => 'shop_logo',
            'value' => function($data) {
                if ($data->shop_logo == "") {
                    return;
                } else {
                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/users/merchants/shop_logo/" . $data->id . "." . $data->shop_logo . '" />';
                }
            },
            'type' => 'raw'
        ),
        array(
            'name' => 'shop_banner',
            'value' => function($data) {
                if ($data->shop_banner == "") {
                    return;
                } else {
                    return '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->request->baseUrl . "/uploads/users/merchants/shop_banner/" . $data->id . "." . $data->shop_banner . '" />';
                }
            },
            'type' => 'raw'
        ),
        'address',
        'pincode',
        'city',
        'locality',
        'landmark',
        'state',
        'country',
        'vat_tin',
        'status',
        'last_login',
        'bad_attempts',
        'CB',
        'UB',
        'DOC',
        'DOU',
        'is_payment_done',
//		'field1',
//		'field2',
//		'field3',
    ),
));
