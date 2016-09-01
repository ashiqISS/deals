<?php

class ProductsController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionDaily() {
                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $heading = "Daily Deals";
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND '" . $date . "' >= special_price_from AND  '" . $date . "' <= special_price_to ");
                $products = Products::model()->findAll($criteria);

                $this->render('deals', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                    'heading' => $heading,
                ));
        }

        public function actionCoupons() {
                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $heading = "Coupons";
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND  product_type = 3 AND ( '" . $date . "' >= sale_from AND  '" . $date . "' <= sale_to) ");
                $products = Products::model()->findAll($criteria);

                $this->render('deals', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                    'heading' => $heading,
                ));
        }

        public function actionWholesale() {
                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $heading = "Whole Sale Deals";
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND  wholesale_price != 0 AND  ( '" . $date . "' >= sale_from AND  '" . $date . "' <= sale_to) ");
                $products = Products::model()->findAll($criteria);

                $this->render('deals', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                    'heading' => $heading,
                ));
        }

        public function actionHot() {
                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                date_default_timezone_set('Asia/Kolkata');
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND is_featured = 1 AND '" . $date . "' >= special_price_from AND  '" . $date . "' <= special_price_to ");
                $products = Products::model()->findAll($criteria);

                $this->render('hot', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                ));
        }

        public function actionCategory($name) {
                $parent = ProductCategory::model()->findByAttributes(array('canonical_name' => $name));
                if (empty($parent)) {
                        $this->render('ProductNotfound');
                        return FALSE;
                }
                $category = ProductCategory::model()->findAllByAttributes(array('parent' => $parent->parent));
                $cats = ProductCategory::model()->findAllByattributes(array('parent' => $parent->id), array('condition' => "id != $parent->id"));
                $dataProvider = Yii::app()->Menu->MenuCategories($cats, $parent);
                $this->render('index', array('dataProvider' => $dataProvider, 'parent' => $parent, 'category' => $category, 'name' => $name));
                exit;
        }

        public function actionWishlist($id) {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $value = UserWishlist::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'prod_id' => $id));
                        if ($value != "") {
                                Yii::app()->user->setFlash('error', "This product is already added to your wishlist.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {

                                $model = new UserWishlist;
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->session_id = NULL;
                                $model->prod_id = $id;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Dear, item is added to your wishlist");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                } else {
                        if (!isset(Yii::app()->session['temp_user'])) {
                                Yii::app()->session['temp_user'] = microtime(true);
                        }
                        $value = UserWishlist::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user'], 'prod_id' => $id));
                        if ($value != "") {
                                Yii::app()->user->setFlash('error', "This product is already added to your wishlist.... ");
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {
                                $model = new UserWishlist;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->prod_id = $id;
                                $model->date = date('Y-m-d');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Dear, item is added to your wishlist");
                                        $this->redirect(Yii::app()->request->urlReferrer);
                                }
                        }
                }
        }

        public function actionDetail($name) {

                $prduct = Products::model()->findByAttributes(array('canonical_name' => $name, 'status' => 1, 'is_admin_approved' => 1));
                $value = trim($prduct->category_id, ",");
                $category = explode(",", $value);
                foreach ($category as $cats) {
                        $condition .= 'category_id like "%' . $cats . '%" OR ';
                }
                $condition = trim($condition, " OR ");
                $time = $this->time_elapsed_string($prduct->DOC, false);
                $you_may_also_like = Products::model()->findAll(array('condition' => 'status = 1 AND is_admin_approved = 1 AND (' . $condition . ')'));
                $product_features = ProductFeatures::model()->findAllByAttributes(array('product_id' => $prduct->id));
                $product_reviews = UserReviews::model()->findAllByAttributes(array('product_id' => $prduct->id, 'approvel' => 1));
                if (!empty($product_reviews)) {
                        foreach ($product_reviews as $product_review) {
                                $rating += $product_review->rating;
                        }

                        $total_rating = ceil($rating / (count($product_reviews)));
                }
                if (!empty($prduct)) {
                        $this->render('detailed', array('time' => $time, 'products' => $prduct, 'you_may_also_like' => $you_may_also_like, 'product_features' => $product_features, 'product_reviews' => $product_reviews, 'total_rating' => $total_rating));
                } else {
                        $this->redirect(array('Site/Error'));
                }
        }

        public function time_elapsed_string($datetime, $full = false) {
                date_default_timezone_set('Asia/Kolkata');
                $now = new DateTime;
                $ago = new DateTime($datetime);
                $diff = $now->diff($ago);


                $diff->w = floor($diff->d / 7);
                $diff->d -= $diff->w * 7;

                $string = array(
                    'y' => 'year',
                    'm' => 'month',
                    'w' => 'week',
                    'd' => 'day',
                    'h' => 'hour',
                    'i' => 'minute',
                    's' => 'second',
                );
                foreach ($string as $k => &$v) {
                        if ($diff->$k) {
                                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                        } else {
                                unset($string[$k]);
                        }
                }

                if (!$full)
                        $string = array_slice($string, 0, 1);
                return $string ? implode(', ', $string) . ' ago' : 'just now';
        }

//        public function actionCoupons() {
//                $this->render('coupons');
//        }
//        public function actionDailyDeals() {
//                $this->render('dailydeals');
//        }

        public function actionDailyDeals() {
                $this->render('dailydeals');
        }

        public function actionFlsahDeals() {
                $this->render('flashdeals');
        }

        public function actionHotDeal() {
                $this->render('hotdeal');
        }

        public function actionSalesReport() {
                $this->render('salesreport');
        }

        public function actionAddProducts() {
                $model = new Products('vendor_create');
                $features = new ProductFeatures;
                if (isset($_POST['Products'])) {
                        $model->attributes = $_POST['Products'];
                        $model->description = $_POST['Products']['description'];
                        $model->meta_description = $_POST['Products']['meta_description'];
                        $model->new_from = $_POST['Products']['new_from'];
                        $model->new_to = $_POST['Products']['new_to'];
                        $model->sale_from = $_POST['Products']['sale_from'];
                        $model->sale_to = $_POST['Products']['sale_to'];
                        $model->special_price_from = $_POST['Products']['special_price_from'];
                        $model->special_price_to = $_POST['Products']['special_price_to'];
                        $model->DOC = date('Y-m-d');
                        $model->is_admin_approved = $_POST['Products']['DOU'];

                        $image = CUploadedFile::getInstance($model, 'main_image');
                        $images = CUploadedFile::getInstancesByName('gallery_images');
                        $model->main_image = $image->extensionName;

                        $model->merchant_id = Yii::app()->session['user']['id'];
                        $model->merchant_type = Yii::app()->session['user_type_usrid'];

                        if ($model->related_products != "") {
                                $model->related_products = implode(",", $model->related_products);
                        } else {
                                $model->related_products = "";
                        }

                        if ($_POST['Products']['new_from'] != "")
                                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
                        else
                                $model->new_from = '';

                        if ($_POST['Products']['new_to'] != "")
                                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
                        else
                                $model->new_to = '';

                        if ($_POST['Products']['sale_from'] != "")
                                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
                        else
                                $model->sale_from = '';

                        if ($_POST['Products']['sale_to'] != "")
                                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
                        else
                                $model->sale_to = '';

                        if ($_POST['Products']['special_price_from'] != "")
                                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
                        else
                                $model->special_price_from = '';

                        if ($_POST['Products']['special_price_to'] != "")
                                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
                        else
                                $model->special_price_to = '';


                        if ($model->canonical_name == '') {
                                $model->canonical_name = preg_replace('#[ -]+#', '-', $model->product_name);
                                $model->canonical_name = $model->canonical_name . '_' . $model->id;
                        }

                        $model->CB = Yii::app()->session['user']['id'];
                        $model->UB = 0;
                        $model->DOC = date('Y-m-d H:i:s');
                        $model->status = 1;
//
//                        var_dump($model);
//                        exit;
//                        if ($model->validate()) {


                        if ($model->save(false)) {
                                if (isset($_POST['ProductFeatures'])) {
                                        if (isset($_POST['ProductFeatures'])) {
                                                $desc = $_POST['ProductFeatures']['feature_disc'];
                                                $heading = $_POST['ProductFeatures']['feature_heading'];
                                                for ($i = 0; $i < count($desc); $i++) {
                                                        $features = new ProductFeatures;
                                                        $features->product_id = $model->id;
                                                        $features->feature_disc = $desc[$i];
                                                        $features->feature_heading = $heading[$i];
                                                        $features->save(false);
                                                }
                                        }
                                }
                                if ($image != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
                                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
                                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
                                }

                                if ($images != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                        $dimension[1] = array('width' => '580', 'height' => '775', 'name' => 'big');
                                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
                                }
                                $model->canonical_name = $model->canonical_name . '-' . $model->id;
                                $model->save();
                                $this->redirect(array('MyProducts'));
                        }
//                        }
                }

                $this->render('add_products', array(
                    'model' => $model,
                ));
        }

        public function actionMyProducts() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user_type_usrid'] != 1) {
//                                $dataProvider = new CActiveDataProvider('Products', array(
//                                    'criteria' => array(
//                                        'condition' => 'user_id=' . Yii::app()->session['user']['id'],
//                                        'condition' => 'merchant_type=' . Yii::app()->session['user_type_usrid'],
//                                        'order' => 'DOC  desc',
//                                    ),
//                                    'pagination' => array(
//                                        'pageSize' => 4,
//                                    ),
//                                        )
//                                );
                                $model = Products::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['user']['id'], 'merchant_type' => Yii::app()->session['user_type_usrid']), array('order' => 'DOC DESC'));
                                $this->render('my_products', array('model' => $model));
                        }
                }
        }

        public function recurse_copy($src, $dst) {
                $dir = opendir($src);
                @mkdir($dst);
                while (false !== ( $file = readdir($dir))) {
                        if (( $file != '.' ) && ( $file != '..' )) {
                                if (is_dir($src . '/' . $file)) {
                                        $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                                } else {
                                        copy($src . '/' . $file, $dst . '/' . $file);
                                }
                        }
                }
                closedir($dir);
        }

        public function actionCloneProduct($id) {
                $model = new Products;
                $model1 = Products::model()->findByPk($id);
                $model->attributes = $model1->attributes;
                $model->DOC = date('Y-m-d H:i:s');
                $model->status = 1;
                $model->merchant_id = Yii::app()->session['user']['id'];

                if ($model->save(FALSE)) {
                        $model->canonical_name = str_replace(" ", "-", $model->product_name) . '-' . $model->id;
                        $model->save();
                        $folder = Yii::app()->Upload->folderName(0, 1000, $model->id) . '/';
                        $src = yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $id . '/';
                        $dst = yii::app()->basePath . '/../uploads/products/' . $folder . '/' . $model->id;
                        var_dump($dst);
//                        exit;
                        $this->recurse_copy($src, $dst);
                        $this->redirect('MyProducts');
                }
        }

        public function actionEditProduct($id) {
                $model = $this->loadModel($id);
                $model->setScenario('update');
                $features = new ProductFeatures;
                $image1 = $model->main_image;
                $image0 = $model->gallery_images;
                $image2 = $model->hover_image;
                $doc = $model->DOC;
                if (isset($_POST['Products'])) {
                        $model->attributes = $_POST['Products'];
                        $model->description = $_POST['Products']['description'];
                        $model->meta_description = $_POST['Products']['meta_description'];
                        $model->new_from = $_POST['Products']['new_from'];
                        $model->new_to = $_POST['Products']['new_to'];
                        $model->sale_from = $_POST['Products']['sale_from'];
                        $model->sale_to = $_POST['Products']['sale_to'];
                        $model->special_price_from = $_POST['Products']['special_price_from'];
                        $model->special_price_to = $_POST['Products']['special_price_to'];
                        $model->DOC = date('Y-m-d');
                        $model->is_admin_approved = $_POST['Products']['DOU'];

                        $image = CUploadedFile::getInstance($model, 'main_image');
                        $images = CUploadedFile::getInstancesByName('gallery_images');
                        $model->main_image = $image->extensionName;

                        $model->merchant_id = Yii::app()->session['user']['id'];
                        $model->merchant_type = Yii::app()->session['user_type_usrid'];

                        if ($model->related_products != "") {
                                $model->related_products = implode(",", $model->related_products);
                        } else {
                                $model->related_products = "";
                        }

                        if ($_POST['Products']['new_from'] != "")
                                $model->new_from = date("Y-m-d", strtotime($_POST['Products']['new_from']));
                        else
                                $model->new_from = '';

                        if ($_POST['Products']['new_to'] != "")
                                $model->new_to = date("Y-m-d", strtotime($_POST['Products']['new_to']));
                        else
                                $model->new_to = '';

                        if ($_POST['Products']['sale_from'] != "")
                                $model->sale_from = date("Y-m-d", strtotime($_POST['Products']['sale_from']));
                        else
                                $model->sale_from = '';

                        if ($_POST['Products']['sale_to'] != "")
                                $model->sale_to = date("Y-m-d", strtotime($_POST['Products']['sale_to']));
                        else
                                $model->sale_to = '';

                        if ($_POST['Products']['special_price_from'] != "")
                                $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
                        else
                                $model->special_price_from = '';

                        if ($_POST['Products']['special_price_to'] != "")
                                $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
                        else
                                $model->special_price_to = '';


                        if ($model->canonical_name == '') {
                                $model->canonical_name = preg_replace('#[ -]+#', '-', $model->product_name);
                                $model->canonical_name = $model->canonical_name . '_' . $model->id;
                        }

                        $model->CB = Yii::app()->session['user']['id'];
                        $model->UB = 0;
                        $model->DOC = date('Y-m-d H:i:s');
//
//                        var_dump($model);
//                        exit;
//                        if ($model->validate()) {


                        if ($model->save(false)) {
                                if (isset($_POST['ProductFeatures'])) {
                                        if (isset($_POST['ProductFeatures'])) {
                                                $desc = $_POST['ProductFeatures']['feature_disc'];
                                                $heading = $_POST['ProductFeatures']['feature_heading'];
                                                for ($i = 0; $i < count($desc); $i++) {
                                                        $features = new ProductFeatures;
                                                        $features->product_id = $model->id;
                                                        $features->feature_disc = $desc[$i];
                                                        $features->feature_heading = $heading[$i];
                                                        $features->save(false);
                                                }
                                        }
                                }
                                if ($image != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '38', 'height' => '75', 'name' => 'small');
                                        $dimension[1] = array('width' => '250', 'height' => '141', 'name' => 'medium');
                                        $dimension[2] = array('width' => '159', 'height' => '312', 'name' => 'big');
                                        $dimension[3] = array('width' => '635', 'height' => '1248', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadImage($image, $id, true, $dimension);
                                } else {
                                        $model->main_image = $image1;
                                }

                                if ($images != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                        $dimension[1] = array('width' => '580', 'height' => '775', 'name' => 'big');
                                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadMultipleImage($images, $id, true, $dimension);
                                } else {
                                        $model->gallery_images = $image0;
                                }
                                $model->canonical_name = $model->canonical_name . '-' . $model->id;
                                $model->save();
                                $this->redirect(array('MyProducts'));
                        }
//                        }
                }
                $this->render('add_products', array(
                    'model' => $model,
                ));
        }

        public function actionDeleteProduct($id) {
                $this->loadModel($id)->delete();
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('MyProducts'));
        }

        public function loadModel($id) {
                $model = Products::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionList() {

//        print_r($_POST);

                $category = '';
                $sort = '';
                $criteria = new CDbCriteria;
                $criteria->condition = 'status = 1 AND is_admin_approved = 1 AND `sale_to` >= CURDATE() ';


                if ((isset($_GET['category'])) || (isset($_POST['category']))) {
                        $cat_id = '';
                        if (isset($_GET['category'])) {
                                $category = $_GET['category'];
                        } else
                        if (isset($_POST['category'])) {
                                $category = $_POST['category'];
                        }
                        if ($category != '') {
                                $cat = ProductCategory::model()->findByAttributes(array('category_name' => $category));
                                $cat_id = $cat->id;
                                $find_in_set = " `category_id` LIKE '%" . $cat_id . "%' ";

//                $find_in_set = rtrim($find_in_set, ' OR');
                                $criteria->addCondition($find_in_set);
                        }
                }

//        if (isset($_POST['brand_inputs'])) {
//            $brands = $_POST['brand_inputs'];
//            if ($brands != '') {
//                $brs = explode(', ', $brands);
//                foreach ($brs as $brand) {
//                    $find_in_set .= "FIND_IN_SET('$brand',`brand_id`) OR ";
//                }
//                $find_in_set = rtrim($find_in_set, ' OR');
//                $criteria->addCondition($find_in_set);
//            }
//        }
                if (isset($_POST['priceRange'])) {
                        $price = $_POST['priceRange'];

                        if ($price != '') {
                                $prc = explode(', ', $price);
                                foreach ($prc as $price) {
                                        $price_condition .= "price BETWEEN $price OR ";
                                }
                                $price_condition = rtrim($price_condition, ' OR');
                                $criteria->addCondition($price_condition);
                        }
                }
                if ((isset($_POST['sort_by'])) && ($_POST['sort_by'] != '')) {
                        $sort = $_POST['sort_by'];
                        switch ($sort) {
                                case 'new_first' : $criteria->order = 'id desc';
                                        break;
                                case 'old_first' : $criteria->order = 'id asc';
                                        break;
                                case 'price_low' : $criteria->order = 'price asc';
                                        break;
                                case 'price_high' : $criteria->order = 'price desc';
                                        break;
                                default : $criteria->order = 'id desc';
                        }
                } else {
                        $criteria->order = 'id desc';
                }

                //$criteria->order = 'id desc';
                $total = Products::model()->count($criteria);

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);

                $products = Products::model()->findAll($criteria);

//
                $this->render('products', array(
                    'products' => $products,
                    'pages' => $pages,
                    'category' => $category,
//            'file_name' => '_searchresult',
//            'parameter' => $_REQUEST['saerchterm'],
//            'brandsel' => $brands,
                    'sort' => $sort,
                    'price' => $price,
//            'searchterm' => $searchterm
                ));
//        $this->render('products');
        }

}
