<?php

class SearchingController extends Controller {

//        public function Init() {
//                if (!isset(Yii::app()->session['user']) && Yii::app()->session['user'] == '')
//                {
//                        $this->redirect(Yii::app()->baseUrl . '/index.php/site/out');
//                }
//        }


        public function actionIndex() {
                if (Yii::app()->request->isAjaxRequest) {

                        if (isset($_REQUEST['SearchValue'])) {

                                $model = ProductCategory::model()->findAll(array('select' => 'category_name', 'limit' => 10,
                                    "condition" => "category_name LIKE '" . $_REQUEST['SearchValue'] . "%'"));

                                $model1 = MasterCategoryTags::model()->findAll(array('select' => 'category_tag', 'limit' => 10,
                                    "condition" => "category_tag LIKE '" . $_REQUEST['SearchValue'] . "%'"));
                                $this->renderPartial('_ajaxSearchDealers', array('model' => array_merge($model, $model1)));
                        }
                } else {
                        die("Can't access this url.");
                }
        }

       public function actionSearchList() {
        if (isset($_REQUEST['Keyword'])) {
            $searchterm = $_REQUEST['Keyword'];
            $location = $_REQUEST['location'];
//                        if ($location != '') {
//                                $newcondition = 'deal_location LIKE ' % " . $location . " % '';
//                        } else {
//                                $newcondition = "1 == 1";
//                        }
            $criteria = new CDbCriteria;

            $criteria->addCondition("status =1  AND (product_name LIKE '%" . $searchterm . "%'"
                    . " OR search_tag LIKE '%" . $searchterm . "%' OR product_code LIKE '%" . $searchterm . "%' ) AND (deal_location LIKE '%" . $location . "%') OR `merchant_id` IN (SELECT `id` FROM `merchant` WHERE CONCAT(`first_name`,' ', `last_name`) like '%" . $searchterm . "%')");
            $products = Products::model()->findAll($criteria);

            $total = Products::model()->count($criteria);

            $pages = new CPagination($total);
            $pages->pageSize = 16;
            $pages->applyLimit($criteria);
            $heading = "Search Result";
            date_default_timezone_set('Asia/Kolkata');
            // $date = date('Y-m-d');

            $this->render('searchresult', array(
                'products' => $products,
                'keyword' => $searchterm,
                'location' => $location,
                'pages' => $pages,
                'total' => $total,
                'heading' => $heading,
            ));
            exit;
        }
        $criteria = new CDbCriteria;
        $total = Products::model()->count();

        $pages = new CPagination($total);
        $pages->pageSize = 16;
        $pages->applyLimit($criteria);
        $heading = "Search Result";
        $criteria->addCondition("status = 1 order by id desc");
        $products = Products::model()->findAll($criteria);

        $this->render('searchresult', array(
            'products' => $products,
            'pages' => $pages,
            'total' => $total,
            'heading' => $heading,
        ));
    }

}
