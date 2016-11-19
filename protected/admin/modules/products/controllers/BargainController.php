<?php

class BargainController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionAdmin() {
        $model = new Products('bargains');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Products']))
            $model->attributes = $_GET['Products'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Products the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Products::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public static function confirmBid() {
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d');
        $criteria = new CDbCriteria;
        $criteria->condition = "status = 1 AND is_admin_approved = 1 AND  product_type = 4 AND'" . $date . "' >= special_price_from AND  '" . $date . "' > special_price_to  AND ( '" . $date . "' >= sale_from AND  '" . $date . "' <= sale_to)";
        $products = Products::model()->findAll($criteria);
        foreach ($products as $bargain_products) {
            // find the maximum bid
            $bids = BargainDetails::model()->findAllByAttributes(array('product_id' => $bargain_products->id, 'status' => 1), array('order' => 'bidd_amount desc', 'limit' => '1'));
            $bids->status = 2;
            if($bids->update())
            {
                // send mail to user that their bid is confirmed;
            }
        }
    }

}
