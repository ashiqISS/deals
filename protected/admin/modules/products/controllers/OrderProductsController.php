<?php

class OrderProductsController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        public function init() {
                if (!isset(Yii::app()->session['admin']) || Yii::app()->session['post']['orders'] != 1) {
                        $this->redirect(Yii::app()->request->baseUrl . '/admin.php/site/logOut');
                }
        }

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
                        'actions' => array('index', 'view', 'create', 'update', 'admin', 'delete', 'print', 'printship'),
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

        public function actionPrint($id) {
                $order_details = OrderProducts::model()->findByAttributes(array('id' => $id));
                $order = Order::model()->findByAttributes(array('id' => $order_details->order_id));
                $user_address = AddressBook::model()->findByPk($order->ship_address_id);
                $bill_address = AddressBook::model()->findByPk($order->bill_address_id);




                $this->renderPartial('_invoice', array(
                    'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'order' => $order));
        }

        public function actionPrintship($id) {
                $order_details = OrderProducts::model()->findByAttributes(array('id' => $id));
                $order = Order::model()->findByAttributes(array('id' => $order_details->order_id));
                $user_address = AddressBook::model()->findByPk($order->ship_address_id);
                $bill_address = AddressBook::model()->findByPk($order->bill_address_id);




                $this->renderPartial('_ship', array(
                    'user_address' => $user_address, 'bill_address' => $bill_address, 'order_details' => $order_details, 'order' => $order));
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
                $model = new OrderProducts;

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['OrderProducts'])) {
                        $model->attributes = $_POST['OrderProducts'];
                        $model->DOC = date('Y-m-d');
                        if ($model->save())
                                $this->redirect(array('admin', 'id' => $model->id));
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

                // Uncomment the following line if AJAX validation is needed
                // $this->performAjaxValidation($model);

                if (isset($_POST['OrderProducts'])) {
                        $model->attributes = $_POST['OrderProducts'];
                        if ($model->save())
                                $this->redirect(array('admin', 'id' => $model->id));
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
                $dataProvider = new CActiveDataProvider('OrderProducts');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new OrderProducts('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['OrderProducts']))
                        $model->attributes = $_GET['OrderProducts'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return OrderProducts the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = OrderProducts::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param OrderProducts $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-products-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
