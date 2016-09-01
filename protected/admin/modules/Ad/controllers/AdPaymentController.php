<?php

class AdPaymentController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        /**
         * @return array action filters
         */
        public function filters() {
                return array(
                    'accessControl', // perform access control for CRUD operations
                    'postOnly + delete', // we only allow deletion via POST request
                );
        }

        /**
         * Specifies the access control rules.
         * This method is used by the 'accessControl' filter.
         * @return array access control rules
         */
        public function accessRules() {
                return array(
                    array('allow', // allow all users to perform 'index' and 'view' actions
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete'),
                        'users' => array('*'),
                    ),
                    array('allow', // allow authenticated user to perform 'create' and 'update' actions
                        'actions' => array('create', 'update'),
                        'users' => array('@'),
                    ),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
                        'actions' => array('admin', 'delete'),
                        'users' => array('admin'),
                    ),
                    array('deny', // deny all users
                        'users' => array('*'),
                    ),
                );
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
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate() {
                $model = new AdPayment;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['AdPayment'])) {
                        $model->attributes = $_POST['AdPayment'];
                        $image = CUploadedFile::getInstance($model, 'image');
                        if ($_POST['AdPayment']['display_from'] != "")
                                $model->display_from = date("Y-m-d", strtotime($_POST['AdPayment']['display_from']));
                        else
                                $model->display_from = 0;

                        if ($_POST['AdPayment']['display_to'] != "")
                                $model->display_to = date("Y-m-d", strtotime($_POST['AdPayment']['display_to']));
                        else
                                $model->display_to = 0;

                        $model->cb = Yii::app()->session['admin']['id'];
                        $model->doc = date('Y-m-d');
                        if ($model->save())
                                if ($image != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                        $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');
                                        $dimension[2] = array('width' => '580', 'height' => '775', 'name' => 'big');
                                        $dimension[3] = array('width' => '3016', 'height' => '4030', 'name' => 'zoom');
                                        Yii::app()->Upload->uploadAdImage($image, $id, true, $dimension);
                                }
                        $this->redirect(array('admin'));
                }

                $this->render('create', array(
                    'model' => $model,
                ));
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {
                $model = $this->loadModel($id);
                if ($_POST['Products']['special_price_from'] != "")
                        $model->special_price_from = date("Y-m-d", strtotime($_POST['Products']['special_price_from']));
                else
                        $model->special_price_from = 0;

                if ($_POST['Products']['special_price_to'] != "")
                        $model->special_price_to = date("Y-m-d", strtotime($_POST['Products']['special_price_to']));
                else
                        $model->special_price_to = 0;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['AdPayment'])) {
                        $model->attributes = $_POST['AdPayment'];
                        if ($model->save())
                                $this->redirect(array('update', 'id' => $model->id));
                }

                $this->render('update', array(
                    'model' => $model,
                ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
                $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
                if (!isset($_GET['ajax']))
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
                $dataProvider = new CActiveDataProvider('AdPayment');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new AdPayment('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['AdPayment']))
                        $model->attributes = $_GET['AdPayment'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return AdPayment the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = AdPayment::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param AdPayment $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'ad-payment-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
