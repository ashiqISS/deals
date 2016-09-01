<?php

class MyaccountController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user_type_usrid'] == 1) {
                                $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $deal = DealSubmission::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'doc DESC'));
                        } else {
                                $model = Merchant::model()->findByPk(Yii::app()->session['merchant']['id']);
                                $deal = DealSubmission::model()->findAllByAttributes(array('user_id' => Yii::app()->session['merchant']['id']), array('order' => 'doc DESC'));
                        }
                        $this->render('index', array('model' => $model, 'deal' => $deal));
                }
        }

        public function actionResetPassword() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user_type_usrid'] == 1) {
                                $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                if ($_POST['password1'] != '' || $_POST['password1'] != NULL) {
                                        $model->password = $_POST['password1'];

                                        if ($model->save()) {
                                                Yii::app()->user->setFlash('success', "Your password changed successfully. ");
                                        } else {
                                                Yii::app()->user->setFlash('error', "Inavlid user,..");
                                        }
                                } else {
                                        Yii::app()->user->setFlash('empty', "Internal Error Occured. ");
                                }
                        } else {
                                if ($_POST['password1'] != '' || $_POST['password1'] != NULL) {
                                        $model = Merchant::model()->findByPk(Yii::app()->session['user']['id']);
                                        $model->password = $_POST['password1'];
                                        $model->confirm = $_POST['password1'];
                                        if ($model->save(false)) {
                                                Yii::app()->user->setFlash('success', "Your password changed successfully. ");
                                        } else {
                                                Yii::app()->user->setFlash('error', "Inavlid user,..");
                                        }
                                } else {
                                        Yii::app()->user->setFlash('empty', "Internal Error Occured. ");
                                }
                        }
                        $this->render('password_reset', array('model' => $model));
                }
        }

        public function actionAddressBook() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user']['id'] != '') {
                                $model = AddressBook::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                $this->render('addressbook', array('model' => $model));
                        } else {
                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                        }
                }
        }

        public function actionNewAddressBook() {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $model = new AddressBook;
                        if (isset($_POST['AddressBook'])) {
                                $model->attributes = $_POST['AddressBook'];
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->user_type = Yii::app()->session['user_type_usrid'];
                                $model->doc = date('Y-m-d');
                                $model->cb = Yii::app()->session['user']['id'];
                                $model->status = 1;
                                $model = $this->checkDefault($model, 'default_billing_address');
                                $model = $this->checkDefault($model, 'default_shipping_address');
                                if ($model->validate()) {
                                        if ($model->save()) {
                                                Yii::app()->user->setFlash('success', "your Address has been  successfully added");
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        } else {
                                                Yii::app()->user->setFlash('error', "Sorry! There is some error..");
                                        }
                                }
                        }
                        $this->render('newaddress', array('model' => $model));
                }
        }

        public function checkDefault($model, $default) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        $default_address = AddressBook::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], $default => 1));
                        if (empty($default_address)) {
                                $model->$default = 1;
                        } elseif ($model->$default == 1) {
                                $address = AddressBook::model()->updateAll(array($default => 0), 'user_id = ' . Yii::app()->session['user']['id']);
                                $model->$default = 1;
                        } elseif ($model->$default == 0) {
                                $model->$default = 0;
                        }
                        return $model;
                }
        }

        public function actionEditAddressBook($id) {
                if (!isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {

                        $model = AddressBook::model()->findByPk($id);
                        if (isset($_POST['AddressBook'])) {
                                $model->attributes = $_POST['AddressBook'];
                                $model->user_id = Yii::app()->session['user']['id'];
                                $model->user_type = Yii::app()->session['user_type_usrid'];
                                $model->dou = date('Y-m-d');
                                $model->ub = Yii::app()->session['user']['id'];
                                $model = $this->checkDefault($model, 'default_billing_address');
                                $model = $this->checkDefault($model, 'default_shipping_address');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "your Address has been  successfully updated");
                                        $this->redirect(array('Myaccount/Addressbook'));
                                } else {
                                        Yii::app()->user->setFlash('error', "Sorry! There is some error..");
                                }
                        }
                        $this->render('newaddress', array('model' => $model));
                }
        }

        public function actionDeleteAddress() {
                if (isset($_GET['adress_id'])) {
                        $model = AddressBook::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'id' => $_GET['adress_id']));
                        $model->delete();
                }
        }

        public function actionSettings() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['user'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user_type_usrid'] == 1) {
                                $user_id = Yii::app()->session['user']['id'];
                                $model = $this->loadModelUser($user_id);
                                $model->setScenario('settings');
                                if (isset($_POST['btn_submit'])) {
                                        $model->attributes = $_POST['btn_submit'];
                                        $model->first_name = $_POST['first_name'];
                                        $model->last_name = $_POST['last_name'];
                                        $model->email = $_POST['email'];
                                        $model->phone_number = $_POST['phone_number'];
                                        $model->address = $_POST['address'];
                                        if ($model->validate()) {
                                                if ($model->save(FALSE)) {
                                                        Yii::app()->user->setFlash('success', "your account  has been  successfully updated");
                                                        $this->redirect(Yii::app()->request->urlReferrer);
                                                }
                                        } else {
                                                Yii::app()->user->setFlash('error', "Error Occured");
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        }
                                }
                        } else {
                                $model = Merchant::model()->findByPk(Yii::app()->session['user']['id']);
                        }
                        $this->render('account_settings', array('model' => $model));
                }
        }

        public function loadModelUser($id) {
                $model = BuyerDetails::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function loadModelMerchant($id) {
                $model = Merchant::model()->findByPk($id);
                if ($model === null)
                        throw new CHttpException(404, 'The requested page does not exist.');
                return $model;
        }

        public function actionCouponGeneration() {

        }

        public function actionSubmitDeal() {
                $model = new DealSubmission;
                if (isset($_POST['DealSubmission'])) {
                        $model->attributes = $_POST['DealSubmission'];
                        $model->message = $_POST['DealSubmission']['message'];
                        if (isset(Yii::app()->session['user'])) {
                                $model->user_id = Yii::app()->session['user']['id'];
                        } else if (isset(Yii::app()->session['merchant'])) {
                                $model->user_id = Yii::app()->session['merchant']['id'];
                        } else {
                                $model->user_id = "";
                        }
                        $model->doc = date('Y-m-d');
                        if ($model->validate()) {
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('success', "Deal submission completed");
                                        $this->redirect(array('myaccount/index'));
                                }
                        }
                }
                $this->render('submitdeal', array('model' => $model));
        }

        public function actionNewsletter() {
                $model = new Newsletter;
                $this->render('newsletter', array('model' => $model));
        }

}
