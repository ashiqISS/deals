<?php

class CheckoutController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

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

        public function actionCheckOut() {
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $this->redirect(array('Checkout/Billing'));
                } else {
                        $login = new BuyerDetails;
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));

                        if (isset($_POST['BuyerDetails'])) {
                                $login_check = BuyerDetails::model()->findByAttributes(array('email' => $_POST['BuyerDetails']['email'], 'password' => $_POST['BuyerDetails']['password']));
                                if (!empty($login_check)) {
                                        Yii::app()->session['user'] = $login_check;
                                        Cart::model()->updateAll(array("user_id" => $login_check->id), 'session_id=' . Yii::app()->session['temp_user']);
                                        CouponHistory::model()->updateAll(array("user_id" => $login_check->id), 'session_id=' . Yii::app()->session['temp_user']);
                                        $default_billing = AddressBook::model()->findByAttributes(array('user_id' => $login_check->id, 'default_billing_address' => 1));
                                        if (!empty($default_billing)) {
                                                Order::model()->updateAll(array("user_id" => $login_check->id, "bill_address_id" => $default_billing->id), 'session_id=' . Yii::app()->session['temp_user']);
                                        }
                                }
                                $this->redirect(array('Checkout/Billing'));
                        }
                        if (!empty($checkout_exist)) {
                                $checkout_id = $checkout_exist->id;
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                }
                $this->render('checkout', array('checkout_id' => $checkout_id, 'login' => $login));
        }

        public function actionBilling() {
                if (isset(Yii::app()->session['orderid'])) {


                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {

                                $user_id = Yii::app()->session['user']['id'];
                                $condition = "user_id = " . $user_id;
                        } else {
                                $user_id = Yii::app()->session['temp_user'];
                                $condition = "session_id = " . $user_id;
                        }
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        if (!empty($checkout_exist)) {
                                $checkout_exist->step = 1;
                                if ($checkout_exist->save()) {
                                        $checkout_id = $checkout_exist->id;
                                }
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->step = 1;
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                        $cart_exist = Cart::model()->findAll(array('condition' => $condition));
                        if (!empty($cart_exist)) {
                                $billing = new BuyerDetails('create');
                                $address = new AddressBook;
                                $this->performAjaxValidation($billing);
                                $this->performAjaxValidation($address);
                                if (isset(Yii::app()->session['user'])) {

                                        $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                }
                                if (isset($_POST['check_address'])) {
                                        if ($_POST['check_address'] == 1) {

                                                $bill_address = $_POST['bill_address'];
                                                Order::model()->updateAll(array("bill_address_id" => $bill_address), 'session_id=' . Yii::app()->session['temp_user']);
                                                $this->redirect(array('Checkout/Shipping'));
                                        } else if ($_POST['check_address'] == 2) {

                                                if (isset($_POST['AddressBook'])) {
                                                        $address->attributes = $_POST['AddressBook'];
                                                        if ($_POST['AddressBook']['name'] == '') {
                                                                $address->name = $user_details->first_name . ' ' . $user_details->last_name;
                                                        }
                                                        $address->user_type = 1;
                                                        $address->user_id = $user_details->id;

                                                        if ($address->validate()) {
                                                                if ($address->save(false)) {
                                                                        Order::model()->updateAll(array("bill_address_id" => $address->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                                        $this->redirect(array('Checkout/Shipping'));
                                                                }
                                                        }
                                                }
                                        }
                                } else if (isset($_POST['BuyerDetails'])) {
                                        $billing->attributes = $_POST['BuyerDetails'];
                                        $billing->DOC = date('Y-m-d');
                                        $billing->user_status = 1;
//                                        $ver_id = mt_rand(10000, 99999) . time();
//                                        $billing->activation_link = $ver_id;
                                        $billing->shipping_same = $_POST['BuyerDetails']['shipping_same'];
                                        if ($billing->save(false)) {

                                                $address->attributes = $_POST['AddressBook'];
//                                        $address->DOC = date('Y-m-d');
                                                $address->user_type = 1;
                                                $address->user_id = $billing->id;
                                                $address->name = $billing->first_name . ' ' . $billing->last_name;
                                                if ($address->save(false)) {
                                                        Yii::app()->session['user'] = $billing;
                                                        Cart::model()->updateAll(array("user_id" => $billing->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                        CouponHistory::model()->updateAll(array("user_id" => $billing->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                        Order::model()->updateAll(array("user_id" => $billing->id, "bill_address_id" => $address->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                        $this->SuccessMail($billing);
                                                        Yii::app()->user->setFlash('email_sent_message', " Please varify your email to continue checkout . Check Your spam folder also .");
                                                        $this->redirect(array('Checkout/Shipping'));
                                                }
                                        }
                                }




                                $this->render('billing', array('billing' => $billing, 'address' => $address, 'checkout_id' => $checkout_id));
                        } else {
                                $this->redirect(array('Cart/Mycart'));
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function Calculateshipping($carts) {
                foreach ($carts as $cart) {
                        $product_details = Products::model()->findByPk($cart->product_id);
                        $shipping_charge += ($product_details->shipping_rate * $cart->quantity);
                }
                return $shipping_charge;
        }

        public function actionShipping() {
                if (isset(Yii::app()->session['orderid'])) {
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        if (!empty($checkout_exist)) {
                                $checkout_exist->step = 2;
                                if ($checkout_exist->save()) {
                                        $checkout_id = $checkout_exist->id;
                                }
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->step = 2;
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $user_id = Yii::app()->session['user']['id'];
                                $condition = "user_id = " . $user_id;
                        } else {
                                $user_id = Yii::app()->session['temp_user'];
                                $condition = "session_id = " . $user_id;
                        }


                        $cart_exist = Cart::model()->findAll(array('condition' => $condition));
                        //var_dump(Yii::app()->session['user']['id']);
//                exit;
                        $varification = BuyerDetails::model()->findByAttributes(array('id' => Yii::app()->session['user']['id']))->email_verification;
                        if (!empty($cart_exist)) {

                                $address = new AddressBook;
                                $this->performAjaxValidation($address);
                                if ($varification == 1) {
                                        if (isset($_POST['check_address'])) {
                                                if ($_POST['check_address'] == 1) {

                                                        $bill_address = $_POST['ship_address'];
                                                        Order::model()->updateAll(array("ship_address_id" => $bill_address), 'session_id=' . Yii::app()->session['temp_user'] . ' AND user_id =' . Yii::app()->session['user']['id']);
                                                        $this->redirect(array('Checkout/ShippingCharge'));
                                                } else if ($_POST['check_address'] == 2) {
                                                        if (isset($_POST['AddressBook'])) {
                                                                $address->attributes = $_POST['AddressBook'];
                                                                if ($_POST['AddressBook']['name'] == '') {
                                                                        $address->name = $user_details->first_name . ' ' . $user_details->last_name;
                                                                }
                                                                $address->user_type = 1;
                                                                $address->user_id = $user_details->id;
                                                                if ($address->validate()) {
                                                                        if ($address->save(false)) {
                                                                                Order::model()->updateAll(array("bill_address_id" => $address->id), 'session_id=' . Yii::app()->session['temp_user']);
                                                                                $this->redirect(array('Checkout/ShippingCharge'));
                                                                        }
                                                                }
                                                        }
                                                }
                                        }
                                }
                                $this->render('shipping', array('address' => $address, 'checkout_id' => $checkout_id, 'email_vari' => $varification));
                        } else {
                                $this->redirect(array('Cart/Mycart'));
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function actionShippingCharge() {
                if (isset(Yii::app()->session['orderid'])) {
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $varification = BuyerDetails::model()->findByAttributes(array('id' => Yii::app()->session['user']['id']))->email_verification;
                        if ($varification != 1) {
                                $this->redirect(array('Checkout/Shipping'));
                        }
                        if (!empty($checkout_exist)) {
                                $checkout_exist->step = 3;
                                if ($checkout_exist->save()) {
                                        $checkout_id = $checkout_exist->id;
                                }
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->step = 3;
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $user_id = Yii::app()->session['user']['id'];
                                $condition = "user_id = " . $user_id;
                        } else {
                                $user_id = Yii::app()->session['temp_user'];
                                $condition = "session_id = " . $user_id;
                        }


                        $cart_exist = Cart::model()->findAll(array('condition' => $condition));
                        //var_dump(Yii::app()->session['user']['id']);
                        //exit;

                        if (!empty($cart_exist)) {
                                $shipping_charge = $this->Calculateshipping($cart_exist);
                                $address = null;

                                $this->render('shipping_charges', array('shipping_charge' => $shipping_charge, 'address' => $address, 'checkout_id' => $checkout_id, 'email_vari' => $varification));
                        } else {
                                $this->redirect(array('Cart/Mycart'));
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function actionPayment_details() {
                if (isset(Yii::app()->session['orderid'])) {
                        if (isset(Yii::app()->session['orderid'])) {
                                if (isset($_POST['payment_option'])) {
                                        $model = Order::model()->findByPk(Yii::app()->session['orderid']);
                                        $model->payment_mode = $_POST['payment_option'];
                                        if ($model->save(false)) {
                                                $this->SuccessOrderMail($model);
                                                $this->SuccessMailAdmin($model);
                                                $this->redirect(array('Checkout/Confirm'));
                                        }
                                }
                                $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                                $varification = BuyerDetails::model()->findByAttributes(array('id' => Yii::app()->session['user']['id']))->email_verification;
                                if ($varification != 1) {
                                        $this->redirect(array('Checkout/Shipping'));
                                }
                                if (!empty($checkout_exist)) {
                                        $checkout_exist->step = 4;
                                        if ($checkout_exist->save()) {
                                                $checkout_id = $checkout_exist->id;
                                        }
                                } else {
                                        $model = new Checkout;
                                        $model->session_id = Yii::app()->session['temp_user'];
                                        $model->step = 4;
                                        if ($model->save()) {
                                                $checkout_id = $model->id;
                                        }
                                }
                                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                        $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                        $user_id = Yii::app()->session['user']['id'];
                                        $condition = "user_id = " . $user_id;
                                } else {
                                        $user_id = Yii::app()->session['temp_user'];
                                        $condition = "session_id = " . $user_id;
                                }


                                $cart_exist = Cart::model()->findAll(array('condition' => $condition));
                                //var_dump(Yii::app()->session['user']['id']);
//                exit;

                                if (!empty($cart_exist)) {

                                        $address = null;

                                        $this->render('payment_details', array('address' => $address, 'checkout_id' => $checkout_id, 'email_vari' => $varification));
                                } else {
                                        $this->redirect(array('Cart/Mycart'));
                                }
                        } else {
                                $this->redirect(array('Cart/Mycart'));
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function SuccessOrderMail($model) {
                $user = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_order_mail";
                $params = array('model' => $model);
                $message->subject = 'Welcome To Dealsonindia';
                $message->setBody($params, 'text/html');
                $message->addTo($user->email);
//                $message->addTo($model->email);
                $message->from = 'dealsonindia@intersmart.in';
                if (Yii::app()->mail->send($message)) {
//            echo 'message send';
//            exit;
                } else {
                        echo 'message not send';
                        exit;
                }
        }

        public function SuccessMailAdmin($model) {
                $email = AdminSettings::model()->findByAttributes(array('status' => 1), array('limit' => 1));
                Yii::import('user.extensions.yii-mail.YiiMail');
                $message = new YiiMailMessage;
                $message->view = "_admin_order_mail";
                $params = array('model' => $model);
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

        public function actionConfirm() {

                if (isset(Yii::app()->session['orderid'])) {
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $varification = BuyerDetails::model()->findByAttributes(array('id' => Yii::app()->session['user']['id']))->email_verification;
                        if ($varification != 1) {
                                $this->redirect(array('Checkout/Shipping'));
                        }
                        if (!empty($checkout_exist)) {
                                $checkout_exist->step = 5;
                                if ($checkout_exist->save()) {
                                        $checkout_id = $checkout_exist->id;
                                }
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                $model->step = 5;
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                        if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                                $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $user_id = Yii::app()->session['user']['id'];
                                $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                        } else {
                                $user_id = Yii::app()->session['temp_user'];
                                $condition = "session_id = " . $user_id;
                        }


                        $cart_exist = Cart::model()->findAll(array('condition' => $condition));


                        $coupon = CouponHistory::model()->find(array('condition' => $condition));
                        if (!empty($coupon)) {
                                $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                                $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                        } else {
                                $coupen_details = NULL;
                                $coupon_amount = 0;
                        }
                        $subtotal = $this->subtotal();

                        $granttotal = $this->granttotal();
                        if (!empty($cart_exist)) {
                                $address = null;
                                $this->render('confirm', array('address' => $address, 'coupen_details' => $coupen_details, 'coupon_amount' => $coupon_amount, 'cart_exist' => $cart_exist, 'checkout_id' => $checkout_id, 'email_vari' => $varification, 'granttotal' => $granttotal, 'subtotal' => $subtotal));
                        } else {
                                $this->redirect(array('Cart/Mycart'));
                        }
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function actionSuccess() {
                $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                $varification = BuyerDetails::model()->findByAttributes(array('id' => Yii::app()->session['user']['id']))->email_verification;
                if ($varification != 1) {
                        $this->redirect(array('Checkout/Shipping'));
                }
                if (!empty($checkout_exist)) {
                        $checkout_exist->step = 6;
                        if ($checkout_exist->save()) {
                                $checkout_id = $checkout_exist->id;
                        }
                } else {
                        $model = new Checkout;
                        $model->session_id = Yii::app()->session['temp_user'];
                        $model->step = 6;
                        if ($model->save()) {
                                $checkout_id = $model->id;
                        }
                }
                if (Yii::app()->session['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $user_details = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $user_id = Yii::app()->session['user']['id'];
                        $condition = "user_id = " . $user_id;
                } else {
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }


                if (isset(Yii::app()->session['orderid'])) {
                        Order::model()->updateAll(array("status" => 1, "payment_status" => 1, "DOC" => date('Y-m-d H:i:s')), 'id=' . Yii::app()->session['orderid']);


                        $order_products = OrderProducts::model()->findAllByAttributes(array('order_id' => Yii::app()->session['orderid']));

                        foreach ($order_products as $order_product) {

                                $order_history = new OrderHistory;
                                $order_history->order_id = Yii::app()->session['orderid'];
                                $order_history->order_status = 1;
                                $order_history->order_status_comment = 'Order Placed';
                                $order_history->date = date('Y-m-d H:i:s');
                                $order_history->status = 1;
                                $order_history->cb = Yii::app()->session['user']['id'];
                                $order_history->product_id = $order_product->product_id;
                                if ($order_history->save(false)) {
                                        $ids .= $order_product->product_id . ',';
                                }
                        }
                        $ids = rtrim($ids, ',');
                        $bargains = BargainDetails::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 2, 'product_id' => array($ids)));
//                                $bargain = BargainDetails::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id'], 'status' => 2), array('condition' => 'product_id in (select product_id from order_products where order_id=' . $order_history->order_id . ''));
                        foreach ($bargains as $bargain) {
                                BargainDetails::model()->updateAll(array("status" => 4), 'user_id = ' . Yii::app()->session['user']['id'] . ' AND product_id = ' . $bargain->product_id);
                        }

                        Cart::model()->deleteAllByAttributes(array(), array('condition' => 'user_id = ' . Yii::app()->session['user']['id']));
                        unset(Yii::app()->session['temp_user']);
                        unset(Yii::app()->session['orderid']);
                        $this->render('success');
                } else {
                        $this->redirect(array('Cart/Mycart'));
                }
        }

        public function granttotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart_items = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $user_id = Yii::app()->session['user']['id'];
                        $condition = "user_id = " . $user_id . " AND session_id = " . Yii::app()->session['temp_user'];
                } else if (isset(Yii::app()->session['temp_user'])) {
                        $cart_items = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        $user_id = Yii::app()->session['temp_user'];
                        $condition = "session_id = " . $user_id;
                }
                $coupon = CouponHistory::model()->find(array('condition' => $condition));
                if (!empty($coupon)) {
                        $coupen_details = Coupons::model()->findByPk($coupon->coupon_id);
                        $coupon_amount = Coupons::model()->findByPk($coupon->coupon_id)->discount;
                } else {
                        $coupen_details = NULL;
                        $coupon_amount = 0;
                }


                foreach ($cart_items as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }
                return $subtotal - $coupon_amount + Yii::app()->Shipping->Calculate();
        }

        public function subtotal() {
                if (isset(Yii::app()->session['user']['id'])) {
                        $cart = cart::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                } else {
                        $cart = cart::model()->findAllByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                }

                foreach ($cart as $cart_item) {
                        $product = Products::model()->findByPk($cart_item->product_id);
                        $price = Yii::app()->Discount->DiscountAmount($product);
                        $subtotal += ($price * $cart_item->quantity);
                }

                return Yii::app()->Currency->convert($subtotal);
        }

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

        public function actionRegister() {
                if (Yii::app()->session ['user'] != '' && Yii::app()->session['user'] != NULL) {
                        $model = new Users;
                        $billing = new UserAddress;
                        $this->render('register', array('model' => $model, 'billing' => $billing));
                } else {
                        $checkout_exist = Checkout::model()->findByAttributes(array('session_id' => Yii::app()->session['temp_user']));
                        if (!empty($checkout_exist)) {
                                $checkout_id = $checkout_exist->id;
                        } else {
                                $model = new Checkout;
                                $model->session_id = Yii::app()->session['temp_user'];
                                if ($model->save()) {
                                        $checkout_id = $model->id;
                                }
                        }
                }
                $this->render('checkout', array('checkout_id' => $checkout_id));
        }

        protected function performAjaxValidation($model) {
                if (isset($_POST['ajax']) && $_POST['ajax'] === 'buyer-details-checkout-form') {
                        echo CActiveForm::validate($model);
                        Yii::app()->end();
                }
        }

        public static function siteURL() {
                $protocol = isset($_SERVER['HTTPS']) ? 'https://' : 'http://';
                $domainName = $_SERVER['HTTP_HOST'];
                return $protocol . $domainName . '/dealsonindia/';
        }

}
