<?php

class TeamController extends Controller {

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
                $model = new Team;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['Team'])) {
                        $model->attributes = $_POST['Team'];
                        $file_extension = CUploadedFile::getInstance($model, 'image');
                        $model->image = $file_extension->extensionName;
                        if ($model->save()) {
                                if ($file_extension != "") {
                                        $id = $model->id;
                                        $dimension[0] = array('width' => '265', 'height' => '260', 'name' => 'small');
// $dimension[1] = array('width' => '322', 'height' => '500', 'name' => 'medium');

                                        Yii::app()->Upload->uploadGallery($file_extension, $id, $dimension, 'team');
                                }
                                $this->redirect(array('admin'));
                        }
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
                $image = $model->image;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['Team'])) {
                        $model->attributes = $_POST['Team'];
                        $file_extension = CUploadedFile::getInstance($model, 'image');

                        $model->image = $file_extension->extensionName;
                        if ($file_extension != "") {

                                $id = $model->id;
                                $dimension[0] = array('width' => '265', 'height' => '260', 'name' => 'small');

                                Yii::app()->Upload->uploadGallery($file_extension, $id, $dimension, 'team');
                        } else {

                                $model->image = $image;
                        }
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
                $dataProvider = new CActiveDataProvider('Team');
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
                $model = new Team('search');
                $model->unsetAttributes();  // clear any default values
                if (isset($_GET['Team']))
                        $model->attributes = $_GET['Team'];

                $this->render('admin', array(
                    'model' => $model,
                ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Team the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
                $model = Team::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Team $model the model to be validated
         */
        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'team-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

}
