<?php

class MerchantController extends Controller {

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
                'actions' => array('view', 'create', 'update', 'admin', 'delete', 'userActivation', 'completeRegistration'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('index', 'create', 'update'),
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
        $model = new Merchant('insert');

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Merchant'])) {
            $model->attributes = $_POST['Merchant'];
            if ($model->validate()) {
                $ver_id = sha1(mt_rand(10000, 99999) . time());
                $model->is_payment_done = 0;
                $model->status = "not_activated";
                $model->email_verification = $ver_id;
                $model->DOC = date("Y/m/d");
                if ($model->save()) {
                    // uncomment the following for sending activation mail
//                    $this->sendActivation($model);
                    $this->render('info_activation', array('model' => $model));
                    exit;
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function sendActivation($model) {
        Yii::import('user.extensions.yii-mail.YiiMail');
        $message = new YiiMailMessage;
        $message->view = "_user_activation_mail";
        $params = array('model' => $model);
        $message->subject = 'Welcome To eCareAgora';
        $message->setBody($params, 'text/html');
        $message->addTo('aathira@intersmart.com');
        $message->from = 'avpin1992@gmail.com';
        if (Yii::app()->mail->send($message)) {
            echo 'message send';
            exit;
        } else {
            echo 'message not send';
            exit;
        }
    }

    public function actionUserActivation($id) {
        $model = Merchant::model()->findByAttributes(array('email_verification' => $id));
        $model->staus = "payment_pending";
        $model->save();
        $this->render('user_activation', array('model' => $model));
    }

    // action will be called after successful payment
    public function actionCompleteRegistration($id) {
        $transaction_id = "12345564";
        $payment_status = "success";
        $merchant_id = $id;
        $model = Merchant::model()->findByPk($merchant_id);
        $model->status = "active";
        $model->is_payment_done = 1;
        $model->save();
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

        if (isset($_POST['Merchant'])) {
            $model->attributes = $_POST['Merchant'];
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
        $dataProvider = new CActiveDataProvider('Merchant');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Merchant('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Merchant']))
            $model->attributes = $_GET['Merchant'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Merchant the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Merchant::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Merchant $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'merchant-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public static function siteURL() {
        $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
        $domainName = $_SERVER['HTTP_HOST'];
        return $protocol . $domainName . '/newgenshopping/';
    }

}
