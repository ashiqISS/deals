<?php

class SiteController extends Controller {

        /**
         * Declares class-based actions.
         */
        public function actions() {
                return array(
// captcha action renders the CAPTCHA image displayed on the contact page
                    'captcha' => array(
                        'class' => 'CCaptchaAction',
                        'backColor' => 0xFFFFFF,
                    ),
                    // page action renders "static" pages stored under 'protected/views/site/pages'
// They can be accessed via: index.php?r=site/page&view=FileName
                    'page' => array(
                        'class' => 'CViewAction',
                    ),
                );
        }

        /**
         * This is the default 'index' action that is invoked
         * when an action is not explicitly requested by users.
         */
        public function actionLocationTag() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('city', $_REQUEST['tag'], 'AND');

                        //$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('city', $arrs, 'AND');
                        }
                        $tags = MasterCity::model()->findAll($criteria);
                        foreach ($tags as $tag) {
                                if ($_REQUEST['type'] == 'location') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub">' . $tag->city . '</div>';
                        }
                }
        }

        public function actionAboutus() {

                $model = Pages::model()->findByPk(1);
                $team = Team::model()->findAll();
                $this->render('aboutus', array('model' => $model, 'team' => $team));
        }

        public function actionPrivacy() {

                $model = Pages::model()->findByPk(2);
                $this->render('privacy', array('model' => $model));
        }

        public function actionTerms() {

                $model = Pages::model()->findByPk(3);
                $this->render('terms', array('model' => $model));
        }

        public function actionJoin() {

                $model = Pages::model()->findByPk(5);
                $this->render('join', array('model' => $model));
        }

        public function actionLearn() {

                $model = Pages::model()->findByPk(6);
                $this->render('learn', array('model' => $model));
        }

        public function actionAffiliate() {

                $model = Pages::model()->findByPk(7);
                $this->render('affiliate', array('model' => $model));
        }

        public function actionSitemap() {

                $model = Pages::model()->findByPk(8);
                $this->render('sitemap', array('model' => $model));
        }

        public function actionCurrencyChange($id) {

                $data = Currency::model()->findByPk($id);

                Yii::app()->session['currency'] = $data;
                $this->redirect(Yii::app()->request->urlReferrer);
        }

        public function actionContactus() {

                $pages = Pages::model()->findByPk(4);
                $model = new ContactUs;
                if (isset($_POST['ContactUs'])) {

                        $model->attributes = $_POST['ContactUs'];
                        $model->name = $_POST['ContactUs']['name'];
                        $model->email = $_POST['ContactUs']['email'];
                        $model->phone = $_POST['ContactUs']['phone'];
                        $model->comment = $_POST['ContactUs']['comment'];
                        $model->date = date("Y-m-d");

                        if ($model->validate()) {
                                if ($model->save()) {
                                        $this->contactmail($model);
                                        Yii::app()->user->setFlash('success', " Your email sent successfully");
                                } else {
                                        Yii::app()->user->setFlash('error', "Error Occured");
                                }

                                $this->redirect(array('site/contactUs'));
                        }
                }
                $this->render('contactus', array('model' => $model, 'pages' => $pages));
        }

        public function contactmail($model) {

                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_admin_contact_email";
                $params = array('model' => $model);
                $message->subject = 'New Enquiry';
                $message->setBody($params, 'text/html');
                // $message->addTo($model->email);
                $message->addTo("dhanyasasidhar@gmail.com");
                $message->from = 'dealsonindia@intersmart.in';

                if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionLocationTagAdd() {

                if (Yii::app()->request->isAjaxRequest) {

                        if (isset($_REQUEST['tag'])) {
                                $model = new MasterCity;
                                $model->city = $_REQUEST['tag'];
                                $model->cb = Yii::app()->session['admin']['id'];
                                $model->ub = Yii::app()->session['admin']['id'];
                                $model->doc = date('Y-m-d');
                                $model->status = 0;
                                $model->save(false);
                        }
                }
        }

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
// $model = Products::model()->findAll();

                $criteria = new CDbCriteria;
                $total = Products::model()->count();

                $pages = new CPagination($total);
                $pages->pageSize = 8;
                $pages->applyLimit($criteria);
                $date = date('Y-m-d');
                $criteria->addCondition("status = 1 AND is_admin_approved = 1 AND '" . $date . "' >= new_from AND  '" . $date . "' <= new_to AND ( '" . $date . "' >= sale_from AND  '" . $date . "' <= sale_to) ");
                $criteria->order = 'id DESC';
                $products = Products::model()->findAll($criteria);

                $this->render('index', array(
                    'products' => $products,
                    'pages' => $pages,
                    'total' => $total,
                ));
        }

        public function actionHome() {
//                $this->layout = 'main';
//                $this->render('home');
        }

        public function actionUserLogin() {

                if (isset(Yii::app()->session['user'])) {

                        $this->redirect($this->createUrl('index'));
                } else {

                        $model = new BuyerDetails();

                        if (isset($_POST['BuyerDetails'])) {
                                Yii::app()->session['user_type_usrid'] = 1;
                                $login = BuyerDetails::model()->findByAttributes(array('email' => $_POST['BuyerDetails']['email'], 'password' => $_POST['BuyerDetails']['password']));

                                if (!empty($login)) {
                                        Yii::app()->session['user'] = $login;
                                        if ($login->user_status == 0) {
                                                Yii::app()->user->setFlash('login_list', "Access Denied.Contact Dealsonindia");
                                        } else if ($login->email_verification == 0) {
                                                Yii::app()->user->setFlash('emailverify', "Email verification needed...Please check your mail and activate your account");
                                                Yii::app()->user->setFlash('verify_code', $login->id);
                                                Yii::app()->session['user_email_verify'] = $login->id;
                                        } else if ($login->email_verification == 1 && $login->status == 1) {
                                                Cart::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                CouponHistory::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                Order::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                Yii::app()->user->setFlash('emailverify', null);
                                                $this->redirect(array('site/UserLogin'));
                                        }
                                } else {
                                        Yii::app()->user->setFlash('login_error', "dealsonindia email or password invalid.Try again");
                                }
                                $this->redirect(array('Myaccount/index/type/user'));
                        }
                }
                $this->render('userlogin', array('model' => $model));
        }

        public function actionVendorLogin() {
                if (isset(Yii::app()->session['user'])) {
                        $this->redirect($this->createUrl('index'));
                } else {
                        $vendor = new Merchant();
                        if (isset($_POST['Merchant'])) {
                                Yii::app()->session['user_type_usrid'] = 2;
                                $login = Merchant::model()->findByAttributes(array('email' => $_REQUEST['Merchant']['email'], 'password' => $_REQUEST['Merchant']['password']));
                                if (!empty($login)) {
                                        Yii::app()->session['merchant'] = $login;
                                        if ($login->status == 0) {
                                                Yii::app()->user->setFlash('login_list', "Access Denied.Contact Dealsonindia");
                                        } else if ($login->email_verification == 0) {
                                                Yii::app()->user->setFlash('emailverify', "Email verification needed...Please check your mail and activate your account");
                                                Yii::app()->user->setFlash('verify_code', $login->id);
                                                Yii::app()->session['user_email_verify'] = $login->id;
                                        } else if ($login->email_verification == 1 && $login->status == 1) {
                                                if (Yii::app()->session['temp_user']) {
                                                        Cart::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                        CouponHistory::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                        Order::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                }
                                                $this->redirect(array('site/VendorLogin'));
                                        }
                                } else {
                                        Yii::app()->user->setFlash('login_error', "dealsonindia email or password invalid.Try again");
                                }
                                $this->redirect(array('Myaccount/index/type/vendor'));
                        }
                }
                $this->render('vendorlogin', array('vendor' => $vendor));
        }

        public function actionLogout() {
                Yii::app()->user->logout();
                unset(Yii::app()->session['user']);
                unset($_SESSION);
                $this->redirect(Yii::app()->homeUrl);
        }

        public function actionUserRegister() {
                $model = new BuyerDetails('create');
                if (isset($_POST['BuyerDetails'])) {
                        $model->attributes = $_POST['BuyerDetails'];

                        $model->DOC = date('Y-m-d');
                        $model->user_status = 1;
                        $date1 = $_POST['BuyerDetails']['dob'];
                        $newDate = date("Y-m-d", strtotime($date1));
                        $ver_id = mt_rand(10000, 99999) . time();
                        $model->activation_link = $ver_id;
                        if ($model->save(false)) {
                                $this->SuccessMail($model);
                                $this->SuccessMailAdmin($model, 1);
                                Yii::app()->user->setFlash('success', " You are registered successfully!!! Check your mail and verify your account");
                                $this->redirect(array('site/UserRegister'));
                        } else {
                                Yii::app()->user->setFlash('error', "Error Occured");
                                $this->redirect(array('site/UserRegister'));
                        }
                }
                $this->render('user_register', array('model' => $model));
        }

        public function actionVendorRegister() {
                $vendor = new Merchant('create');
                if (isset($_POST['Merchant'])) {
                        $vendor->attributes = $_POST['Merchant'];
                        $vendor->DOC = date('Y-m-d');
                        $vendor->status = 4;
                        $date1 = $_POST['BuyerDetails']['dob'];
                        $newDate = date("Y-m-d", strtotime($date1));
                        $ver_id = mt_rand(10000, 9999999) . time();
                        $vendor->activation_link = $ver_id;
                        if ($vendor->validate()) {
                                if ($vendor->save(false)) {
                                        $this->SuccessMailVendor($vendor);
                                        $this->SuccessMailAdmin($vendor, 2);
                                        Yii::app()->user->setFlash('success', " You are registered successfully!!! Check your mail and verify your account");
                                        $this->redirect('VendorRegister');
                                } else {
                                        Yii::app()->user->setFlash('error', "Error Occured");
                                        $this->redirect('VendorRegister');
                                }
                        }
                }
                $this->render('vendor_register', array('vendor' => $vendor));
        }

        /*     public function actionUserRegister() {
          $model = new BuyerDetails('create');
          $vendor = new Merchant('create');
          if (isset($_POST['BuyerDetails'])) {
          $model->attributes = $_POST['BuyerDetails'];
          $model->DOC = date('Y-m-d');
          $model->user_status = 1;
          $date1 = $_POST['BuyerDetails']['dob'];
          $newDate = date("Y-m-d", strtotime($date1));
          $ver_id = mt_rand(10000, 99999) . time();
          $model->activation_link = $ver_id;
          if ($model->save()) {
          $this->SuccessMail($model);
          Yii::app()->user->setFlash('success', " You are registered successfully!!! Check your mail and verify your account");
          $this->redirect(array('site/UserRegister'));
          } else {
          Yii::app()->user->setFlash('error', "Error Occured");
          $this->redirect(array('site/UserRegister'));
          }
          }
          if (isset($_POST['Merchant'])) {
          $vendor->attributes = $_POST['Merchant'];
          $vendor->DOC = date('Y-m-d');
          $vendor->status = 4;
          $date1 = $_POST['BuyerDetails']['dob'];
          $newDate = date("Y-m-d", strtotime($date1));
          $ver_id = mt_rand(10000, 9999999) . time();
          $vendor->activation_link = $ver_id;
          if ($vendor->validate()) {
          if ($vendor->save(false)) {
          $this->SuccessMailVendor($vendor);
          Yii::app()->user->setFlash('success', " You are registered successfully!!! Check your mail and verify your account");
          //                                        $this->redirect('UserRegister');
          $this->redirect(Yii::app()->user->returnUrl);
          } else {
          Yii::app()->user->setFlash('error', "Error Occured");
          //                                        $this->redirect('UserRegister');
          $this->redirect(Yii::app()->user->returnUrl);
          }
          }
          }
          $this->render('register', array('model' => $model, 'vendor' => $vendor));
          }
         */

        public function SuccessMail($model) {
                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_registration_activation_mail";
                $params = array('model' => $model);
                $message->subject = 'Welcome To Dealsonindia';
                $message->setBody($params, 'text/html');
                $message->addTo($model->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function SuccessMailAdmin($model, $id) {
                $email = AdminSettings::model()->findByAttributes(array('status' => 1), array('limit' => 1));
                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_registration_admin_mail";
                $params = array('model' => $model, 'id' => $id);
                $message->subject = 'Dealsonindia';
                $message->setBody($params, 'text/html');
                $message->addTo($email->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function SuccessMailVendor($vendor) {
                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_registration_activation_mail_vendor";
                $params = array('vendor' => $vendor);
                $message->subject = 'Welcome To Dealsonindia';
                $message->setBody($params, 'text/html');
                $message->addTo($vendor->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionUserActivation($id) {
                $model = BuyerDetails::model()->findByAttributes(array('activation_link' => $id));
                $model->user_status = 3;
                $model->email_verification = 1;
                $model->update();
                $this->render('user_activation', array('model' => $model));
        }

        public function actionVendorActivation($id) {
                $model = Merchant::model()->findByAttributes(array('activation_link' => $id));
                $model->status = 1;
                $model->email_verification = 1;
                $model->update();
                $this->render('vendor_activation', array('model' => $model));
        }

        public function VerificationMail($user) {
                $message = new YiiMailMessage;
                $message->view = "_verify_user_mail";  // view file name
                $params = array('user' => $user); // parameters
                $message->subject = 'Deals on india - ' . $user->verify_code . ' is your verification code for secure access!';
                $message->setBody($params, 'text/html');
                $message->addTo($user->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {

                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function actionCategoryCat() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('category_name', $_REQUEST['tag'], 'AND');

//$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('category_name', $arrs, 'AND');
                        }
                        $tags = ProductCategory::model()->findAll($criteria);
                        $options = array();
                        $_SESSION['category'][0] = '';
                        foreach ($tags as $tag) {
                                unset($_SESSION['category']);
                                $cat_parent = $this->findParent(ProductCategory::model()->findByPk($tag->id));
//echo $cat_parent;

                                if ($_REQUEST['type'] == 'category') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub" id="' . $tag->id . '">' . $cat_parent . '</div>';
                        }
                }
        }

        public function findParent($data) {

                $index = count($_SESSION['category']);
                if ($data->id == $data->parent) {
                        $_SESSION['category'][$index + 1] = $data->category_name;
                } else {
                        $results = ProductCategory::model()->findByPk($data->parent);
                        $_SESSION['category'][$index + 1] = $data->category_name;
                        return $this->findParent($results);
                }
                $return = '';
                $category_arr = array_reverse($_SESSION['category']);
                foreach ($category_arr as $cat) {
                        $return .=$cat . '>';
                }
                return rtrim($return, '>');
        }

        public function actionCategoryTagAdd() {

                if (Yii::app()->request->isAjaxRequest) {

                        if (isset($_REQUEST['tag'])) {
                                $model = new MasterCategoryTags;
                                $model->category_tag = $_REQUEST['tag'];
                                $model->CB = Yii::app()->session['admin']['id'];
                                $model->UB = Yii::app()->session['admin']['id'];
                                $model->DOC = date('Y-m-d');
                                $model->save(false);
                        }
                }
        }

        public function actionCategoryTag() {

                if (Yii::app()->request->isAjaxRequest) {

                        $criteria = new CDbCriteria();
                        $criteria->addSearchCondition('category_tag', $_REQUEST['tag'], 'AND');
//$criteria->compare('category_id',$_REQUEST['category'],true,'AND');
                        if ($_REQUEST['taged'] != '') {

                                $arrs = explode(',', $_REQUEST['taged']);
                                $criteria->addNotInCondition('category_tag', $arrs, 'AND');
                        }
                        $tags = MasterCategoryTags::model()->findAll($criteria);
                        foreach ($tags as $tag) {
                                if ($_REQUEST['type'] == 'category') {

                                }
                                echo '<div class="' . $_REQUEST['type'] . '_tag-sub">' . $tag->category_tag . '</div>';
                        }
                }
        }

        public function actionProduct($id) {
                $products = ProductCategory::model()->findByPk($id);
                $this->render('products', array('products' => $products));
        }

        /**
         * This is the action to handle external exceptions.
         */
        public function actionError() {
                if ($error = Yii::app()->errorHandler->error) {
                        if (Yii::app()->request->isAjaxRequest)
                                echo $error['message'];
                        else
                                $this->render('error', $error);
                }
        }

        public static function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/dealsonindia/';
        }

// if ($_POST['user'] == 1) {
//                                $login = new BuyerDetails();
//                                echo 'hiii';
//                        } else {
//                                $login = new Merchant();
//                                echo 'hloo';
//                        }
//                        if (isset($_POST['login_submit'])) {
//                                if ($_POST['user'] == 1) {
//                                        $login = new BuyerDetails();
//                                        $user = BuyerDetails::model()->findByAttributes(array('email' => $_REQUEST['BuyerDetails']['email'], 'password' => $_REQUEST['BuyerDetails']['password']));
//                                        if ($user != '' && $user !== NULL) {
//                                                Yii::app()->session['user'] = $user;
//                                                Cart::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
//                                                CouponHistory::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
//                                                Order::model()->updateAll(array("user_id" => $user->id), 'session_id=' . Yii::app()->session['temp_user']);
//                                                $this->redirect(array('Myaccount/index'));
//                                        } else {
//                                                $login->addError('email', '');
//                                                $login->addError('password', '');
//                                                Yii::app()->user->setFlash('login_error', "dealsonindia email or password invalid.Try again");
//                                        }
//                                }
//                                if ($_POST['user'] == 2) {
//                                        $login = new Merchant();
//                                        $user = Merchant::model()->findByAttributes(array('email' => $_REQUEST['Merchant']['email'], 'password' => $_REQUEST['Merchant']['password']));
////                                        var_dump($_REQUEST['Merchant']['password']);
////                                        exit;
//                                        if ($user != '' && $user !== NULL) {
//                                                Yii::app()->session['merchent'] = $user;
//                                                $this->redirect(array('Myaccount/index'));
//                                        } else {
//                                                $login->addError('email', '');
//                                                $login->addError('password', '');
//                                                Yii::app()->user->setFlash('login_error', "dealsonindia email or password invalid.Try again");
//                                        }
//                                }
//                        }
//                }



        public function actionPublicNewsletter() {
                $newsletter = new Newsletter;
                if (isset($_REQUEST['email'])) {
                        $newsletter->email = $_REQUEST['email'];
                        $newsletter->status = 1;
                        $newsletter->date = date('Y-m-d');
                        if ($newsletter->save()) {
                                $this->NewsletterMail($newsletter);
                                $this->NewsletterMailAdmin($newsletter);
                                $this->redirect(Yii::app()->request->urlReferrer);
                        } else {

                        }
                }
        }

        public function NewsletterMail($newsletter) {
                $email = Newsletter::model()->findAll();

                foreach ($email as $mail) {
                        Yii::import('user.extensions.yii-mail.YiiMail');
                        $message = new YiiMailMessage;
                        $message->view = "_newsletter_mail";
                        $params = array('model' => $newsletter);
                        $message->subject = 'Dealsonindia';
                        $message->setBody($params, 'text/html');
                        $message->addTo($mail->email);
                        $message->from = 'dealsonindia@intersmart.in';
                        if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                        } else {
                                echo 'message not send';
                                exit;
                        }
                }
        }

        public function NewsletterMailAdmin($newsletter) {
                $email = AdminSettings::model()->findByAttributes(array('status' => 1), array('limit' => 1));
                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_newsletter_mail_admin";
                $params = array('vendor' => $newsletter);
                $message->subject = 'Welcome To Dealsonindia';
                $message->setBody($params, 'text/html');
                $message->addTo($email->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                } else {
                        echo 'message not send';
                        exit;
                }
        }

}
