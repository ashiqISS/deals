<?php

class ForgotPasswordController extends Controller {

        public function actionIndex() {
                if (isset($_POST['btn_submit'])) {
                        $email = $_POST['email'];
                        if ($_POST['user'] == 1) {
                                $user = BuyerDetails::model()->findByAttributes(array('email' => $email));
                        } else {
                                $user = Merchant::model()->findByAttributes(array('email' => $email));
                        }
                        if ($user != '') {
                                if ($_POST['user'] == 1) {
                                        $details = BuyerDetails::model()->findByPk($user->id);
                                } else {
                                        $details = Merchant::model()->findByPk($user->id);
                                }
                                $forgot = new ForgotPassword;
                                $forgot->user_id = $details->id;
                                $forgot->user_type = $_POST['user'];
                                $user_type = $forgot->user_type;
                                $forgot->code = rand(10000, 1000000);
                                $token = base64_encode($forgot->user_id . ':' . $forgot->code);
                                $forgot->status = 1;
                                $forgot->DOC = date('Y-m-d');
                                if ($forgot->save(FALSE)) {
                                        $this->SuccessMail($forgot, $token, $details, $user_type);
                                        Yii::app()->user->setFlash('success1', ' We’ve sent you a link to change your password');
                                        Yii::app()->user->setFlash('success2', ' We’ve sent you an email that will allow you to reset your password quickly and easily.');
                                } else {
                                        Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Invalid Email Id. Try again later..");
                        }
                }
                $this->render('index');
        }

        public function SuccessMail($forgot, $token, $details, $user_type) {
                $message = new YiiMailMessage;
                $message->view = "_forgot_password_mail_user";  // view file name
                $params = array('token' => $token, 'details' => $details, 'user_type' => $user_type); // parameters
                $message->subject = 'Please Reset Your Password';
                $message->setBody($params, 'text/html');
                $message->addTo($details->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionChangepassword($token) {
                $var = base64_decode($token);
                $arr = explode(':', $var);

                $id = $arr[0];
                $token2 = $arr[1];
                $token_test = ForgotPassword::model()->findByAttributes(array('code' => $token2, 'user_id' => $id));
                if ($token_test->user_type == 1) {
                        $pass1 = BuyerDetails::model()->findByPk($id);
                } else {
                        $pass1 = Merchant::model()->findByPk($id);
                }
                if ($token_test != '') {
                        Yii::app()->session['frgt_usrid'] = $id;
                        Yii::app()->session['user_type_usrid'] = $token_test->user_type;
                        $token_test->delete();
                        $this->render('changepassword');
                } else {
                        Yii::app()->user->setFlash('error', "Session Expired. Try again later..");
                        $this->redirect(array('index'));
                }
        }

        public function actionNewpassword() {
                if (isset($_POST['btn_submit'])) {
                        if (isset(Yii::app()->session['frgt_usrid'])) {
                                $id = Yii::app()->session['frgt_usrid'];
                                $user_type = Yii::app()->session['user_type_usrid'];
                                if ($user_type == 1) {
                                        $pass1 = BuyerDetails::model()->findByPk($id);
                                } else {
                                        $pass1 = Merchant::model()->findByPk($id);
                                }
                                $newpass = $_POST['password1'];
                                $pass1->password = $newpass;
                                $pass1->update(array('password'));
                                if ($pass1->save()) {
                                        Yii::app()->user->setFlash('success', "Your password changed successfully. Please login");
                                        $this->redirect(array('site/login'));
                                } else {
                                        Yii::app()->user->setFlash('error', "Inavlid user,..");
                                }
                                Yii::app()->session['frgt_usrid'] = '';
                                $_SESSION['frgt_usrid'] = '';
                        }
                        $this->render('changepassword');
                } else {
                        Yii::app()->user->setFlash('error', "Session Expired. Try again later..");
                        $this->redirect(array('ForgotPassword'));
                }
//                $this->render('changepassword');
        }

        public function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/dealsonindia';
        }

}
