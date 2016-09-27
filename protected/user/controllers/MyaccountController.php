<?php

class MyaccountController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionBankDetails() {
                $user_id = Yii::app()->session['merchant']['id'];
                $data = BankingDetails::model()->findAllByAttributes(array('user_id' => $user_id));
                $this->render('banking_details', array('datas' => $data));
        }

        public function actionCreateBankDetails() {
                $model = new BankingDetails;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['BankingDetails'])) {
//            print_r($_POST);
                        if ($_POST['account_type'] == 1) {
                                $model = new BankingDetails('paypal');
                        } else {
                                $model = new BankingDetails('bank');
                        }
                        $model->attributes = $_POST['BankingDetails'];
                        $model->user_id = Yii::app()->session['merchant']['id'];
                        $model->account_type = $_POST['account_type'];
                        if ($model->validate(false)) {
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('banksuccess', "Your Bank Details Successfully Added. ");
                                        $this->redirect(array('BankDetails'));
                                }
                        }
                }

                $this->render('create_bank_details', array(
                    'model' => $model,
                ));
        }

        public function actionIndex($type) {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        if ($type == 'vendor')
                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Vendorlogin');
                        else
                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['user']) {
                                $models = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                $sale = array();
                                $plans = array();
                                $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $deal = DealSubmission::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'doc DESC'));
                                $order = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'DOC DESC'));
                        } if (Yii::app()->session['merchant']) {
                                $sale = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']), array('order' => 'DOC DESC'));
                                $model = Merchant::model()->findByPk(Yii::app()->session['merchant']['id']);
                                $plans = PlanDetails::model()->findAll();
                                $deal = DealSubmission::model()->findAllByAttributes(array('user_id' => Yii::app()->session['merchant']['id']), array('order' => 'doc DESC'));
                        }
                        $this->render('index', array('model' => $model, 'deal' => $deal, 'order' => $order, 'sale' => $sale, 'plans' => $plans, 'models' => $models));
                }
        }

        public function actionResetPassword() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['user']) {
                                $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                if (isset($_POST['password1'])) {
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
                                }
                        } if (Yii::app()->session['merchant']) {
                                if (isset($_POST['password1'])) {


                                        if ($_POST['password1'] != '' || $_POST['password1'] != NULL) {
                                                $model = Merchant::model()->findByPk(Yii::app()->session['merchant']['id']);
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
                        }
                        $this->render('password_reset', array('model' => $model));
                }
        }

        public function actionAddressBook() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['user']['id'] != '') {
                                $model = AddressBook::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                                $this->render('addressbook', array('model' => $model));
                        } else {
                                $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                        }
                }
        }

        public function actionNewAddressBook() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
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
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
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
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
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

        public function actionUserSettings() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['user']) {
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
                        }
                        $this->render('account_settings', array('model' => $model));
                }
        }

        public function actionVendorSettings() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $user_id = Yii::app()->session['merchant']['id'];
                                $vendor = $this->loadModelMerchant($user_id);
                                $vendor->setScenario('settings');
                                if (isset($_POST['btn_submit'])) {
                                        $vendor->attributes = $_POST['Merchant'];
                                        $vendor->pincode = $_POST['Merchant']['pincode'];
                                        $vendor->country = $_POST['Merchant']['country'];
                                        $vendor->state = $_POST['Merchant']['state'];
                                        $vendor->city = $_POST['Merchant']['city'];
                                        $vendor->shop_name = $_POST['Merchant']['shop_name'];
                                        $vendor->account_no = $_POST['Merchant']['account_no'];
                                        $vendor->ifsc_code = $_POST['Merchant']['ifsc_code'];
                                        if ($vendor->save(false)) {
                                                Yii::app()->user->setFlash('success', "your account  has been  successfully updated");
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        } else {
                                                Yii::app()->user->setFlash('error', "Error Occured");
                                                $this->redirect(Yii::app()->request->urlReferrer);
                                        }
                                }
                        }
                }
                $this->render('vendor_account_settings', array('vendor' => $vendor));
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
                                        if (Yii::app()->session['user_type_usrid'] == 2)
                                                $this->redirect(array('myaccount/index/type/vendor'));
                                        else
                                                $this->redirect(array('myaccount/index/type/user'));
                                }
                        }
                }
                $this->render('submitdeal', array('model' => $model));
        }

        public function actionNewsletter() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['user']) {
                                $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                if (isset($_POST['newsletter_submit'])) {
                                        $model->newsletter = $_POST['BuyerDetails']['newsletter'];
                                        if ($model->save()) {
                                                Yii::app()->user->setFlash('success', "Newsletter confirmation changed successfully!!!");
                                                $this->redirect(array('myaccount/Newsletter'));
                                        } else {
                                                Yii::app()->user->setFlash('error', "Error Occured!!!");
                                                $this->redirect(array('myaccount/Newsletter'));
                                        }
                                }
                        }
                }
                $this->render('newsletter', array('model' => $model));
        }

        public function actionMyOrder() {
                if (!isset(Yii::app()->session['user'])) {

                }
        }

        public function actionWishlist() {
                if (isset(Yii::app()->session['user'])) {
                        $model = UserWishlist::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $this->render('wishlist', array(
                            'model' => $model,
                        ));
                } else {
                        $this->redirect(array('Site/logout'));
                }
        }

        public function actionPaidAd() {
                if (isset(Yii::app()->session['merchant'])) {
                        $model = new AdPayment('create');

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

                                $model->vendor_name = Yii::app()->session['merchant']['id'];
                                $model->image = $image->extensionName;
                                $model->cb = Yii::app()->session['merchant']['id'];
                                $model->doc = date('Y-m-d H:i:s');
                                $model->link = $_POST['AdPayment']['link'];
                                if ($model->validate()) {
                                        if ($model->save()) {
                                                if ($model->image != "") {
                                                        $dimension_size = MasterAdLocation::model()->findByAttributes(array('id' => $model->position));
                                                        $size = explode('X', $dimension_size->size);
                                                        $size1 = $size[0];
                                                        $size2 = $size[1];
                                                        $dimension[0] = array('width' => '116', 'height' => '155', 'name' => 'small');
                                                        $dimension[1] = array('width' => $size1, 'height' => $size2, 'name' => 'big');
                                                        Yii::app()->Upload->uploadAdImage1($image, $model->id, true, $dimension);
//
                                                }
                                                Yii::app()->user->setFlash('paid', 'Success Waiting For Admin Approve.');
                                                $this->redirect(array('PaidAd'));
                                        }
                                }
                        }
                        $this->render('paid_ad', array(
                            'model' => $model,
                        ));
                }
        }

        public function actionMessage() {
                if (isset(Yii::app()->session['merchant'])) {
                        $model = new MerchantMessage();
                        if (isset($_POST['MerchantMessage'])) {
                                $model->attributes = $_POST['MerchantMessage'];
                                $model->merchant_id = Yii::app()->session['merchant']['id'];
                                $model->doc = date('Y-m-d H:i:s');
                                $model->from_to = 1;
                                if ($model->validate()) {
                                        if ($model->save()) {
                                                $this->redirect(array('Message'));
                                        }
                                }
                        }
                        $message = MerchantMessage::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']), array('order' => 'id DESC'));
                        $this->render('message', array(
                            'model' => $model, 'messages' => $message
                        ));
                }
        }

        public function actionUserOrderHistory() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['user']) {
                                $models = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        }
                }
                $this->render('user_order_history', array('models' => $models));
        }

        public function actionVendorOrderHistory() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $model = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']), array('order' => 'id DESC'));
                        }
                }
                $this->render('vendor_order_history', array('model' => $model));
        }

        public function actionMySalesReport() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $model = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']));
                        }
                }
                $this->render('sales_report', array('model' => $model));
        }

        public function actionCustomerReport() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $model = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']));
                        }
                }
                $this->render('customer_report', array('model' => $model));
        }

        public function actionMostViewProducts() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $products = Products::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']));
                                foreach ($products as $product) {
                                        $result .= $product->id . ',';
                                }
                                $result = rtrim($result, ',');
                                $model = ProductViewed::model()->findAll(array('select' => 't.product_id', 'distinct' => true, 'condition' => "product_id IN($result)"));
                        }
                }
                $this->render('most_viewed', array('model' => $model));
        }

        public function actionReports() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/Userlogin');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $model = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']));
                        }
                }
                $this->render('reports', array('model' => $model));
        }

        public function actionSelectPlan($plan) {
                $model = new MerchantPlans;
                if (Yii::app()->session['merchant']) {
                        if ($plan != '' && $plan != 0) {
                                $merchant_plan = PlanDetails::model()->findByPk($plan);
                                var_dump($merchant_plan);
                                exit;
                                $model->plan_id = $plan;
                                $model->user_id = Yii::app()->session['merchant']['id'];
                                $model->plan_name = $merchant_plan->plan_name;
                                $model->amount = $merchant_plan->amount;
                                $model->no_of_product = $merchant_plan->no_of_products;
                                $model->no_of_product_left = $merchant_plan->no_of_products;
                                $model->no_of_ads = $merchant_plan->no_of_ads;
                                $model->no_of_ads_left = $merchant_plan->no_of_ads;
                                $model->no_of_days = $merchant_plan->no_of_days;
                                $model->no_of_days_left = $merchant_plan->no_of_days;
                                $model->date_of_creation = date('Y-m-d H:i:s');
                                $model->status = 1;
                                $model->cb = Yii::app()->session['merchant']['id'];
                                $model->doc = date('Y-m-d H:i:s');
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('plan_success', "Your Plan Successfully Created");
                                        if (Yii::app()->session['user_type_usrid'] == 2)
                                                $this->redirect(array('myaccount/index/type/vendor'));
                                        else
                                                $this->redirect(array('myaccount/index/type/user'));
                                } else {
                                        Yii::app()->user->setFlash('plan_error', "Error Occured");
                                        if (Yii::app()->session['user_type_usrid'] == 2)
                                                $this->redirect(array('myaccount/index/type/vendor'));
                                        else
                                                $this->redirect(array('myaccount/index/type/user'));
                                }
                        }
                }
        }

        public function actionChangeOrderStatus() {
                if (isset($_POST['order_id'])) {
                        $order_id = $_POST['order_id'];
                        $product_id = $_POST['product_id'];
                        $order_status = $_POST["order_status"];
                        $history = OrderHistory::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id));
                        $history->order_status = $order_status;
                        $history->order_status_comment = OrderStatus::model()->findByPk($order_status)->description;
                        if ($history->update()) {
                                Yii::app()->user->setFlash('history_update', "Order Status updated successfully.");
                                if ($order_status == 5) { // completed
                                        $productOrder = OrderProducts::model()->findByAttributes(array('order_id' => $order_id, 'product_id' => $product_id));
                                        //   Create new Sales Report
                                        $this->newSalesReport($product_id, $order_id, $productOrder);
                                }
                        } else {
                                Yii::app()->user->setFlash('history_update', "Order Status updation failed.");
                        }
                }
                $this->redirect(array('Myaccount/VendorOrderHistory'));
        }

        public function newSalesReport($product_id, $order_id, $productOrder) {
                $merchant_id = Yii::app()->user->getState('merchant_id');
                $sales = new SalesReport;
                $sales->merchant_id = $merchant_id;
                $sales->product_id = $product_id;
                $sales->order_id = $order_id;
                $sales->quantity = $productOrder->quantity;
                $sales->total_amount = $productOrder->amount;
                $sales->DOC = date('Y-m-d');
                if ($sales->save()) {
                        $type = 1; // deposit
                        $amount = $productOrder->amount;
                        MerchantModule::newTransaction($type, $amount);
                        MerchantModule::updateAccountMaster($productOrder);
                        // todo send earning mail
                }
        }

        public function actionPrintProductInvoice($id) {
                $product_order_id = $id;
                if (isset($product_order_id)) {
                        $productOrder = OrderProducts::model()->findByPk($product_order_id);
                        $product = Products::model()->findByPk($productOrder->product_id);
                        $order = Order::model()->findByPk($productOrder->order_id);
                        $user_address = AddressBook::model()->findByPk($order->ship_address_id);
                        $bill_address = AddressBook::model()->findByPk($order->bill_address_id);

                        $params = array();
                        $params['productOrder'] = $productOrder;
                        $params['order'] = $order;
                        $params['product'] = $product;
                        $params['user_address'] = $user_address;
                        $params['bill_address'] = $bill_address;

//            $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $id));
                        $this->renderPartial('_product_invoice', $params);
                }
        }

        public function actionOrderViewDetail($id) {
                $model = OrderProducts::model()->findByPk($id);
                if (!empty($model)) {
                        $this->render('order_view_detail', array(
                            'model' => $model,
                        ));
                } else {
                        $this->redirect(array('site/Error'));
                }
        }

        public function actionUserOrderDetail($id) {

                $model = OrderProducts::model()->findByPk($id);
//                $model = OrderProducts::model()->findByAttributes(array('order_id' => $id));
                if (!empty($model)) {
                        $this->render('user_order_detail', array(
                            'model' => $model,
                        ));
                } else {
                        $this->redirect(array('site/Error'));
                }
        }

        public function actionNewOrderHistory($id) {
                $model = new OrderHistory;
                $order_product = OrderProducts::model()->findByPk($id);
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

                if (isset($_POST['OrderHistory'])) {
                        $model->attributes = $_POST['OrderHistory'];
                        $model->product_id = $order_product->product_id;
                        $model->order_id = $order_product->order_id;
                        $model->date = $_POST['OrderHistory']['date'];
                        if ($model->save())
                                $this->redirect(array('Myaccount/OrderViewDetail', 'id' => $id));
                }

                $this->render('create_new_order_history', array(
                    'model' => $model,
                    'order_product' => $order_product,
                ));
        }

        public function actionPrintShippingDetail($id) {
                $product_order_id = $id;
                if (isset($product_order_id)) {
                        $productOrder = OrderProducts::model()->findByPk($product_order_id);
                        $product = Products::model()->findByPk($productOrder->product_id);
                        $order = Order::model()->findByPk($productOrder->order_id);
                        $user_address = AddressBook::model()->findByPk($order->ship_address_id);
                        $bill_address = AddressBook::model()->findByPk($order->bill_address_id);

                        $params = array();
                        $params['productOrder'] = $productOrder;
                        $params['order'] = $order;
                        $params['product'] = $product;
                        $params['user_address'] = $user_address;
                        $params['bill_address'] = $bill_address;

//            $order_details = OrderProducts::model()->findAllByAttributes(array('order_id' => $id));
                        $this->renderPartial('_product_ship_invoice', $params);
                }
        }

        public function actionMyRewards() {
                if (Yii::app()->session['user']) {
                        $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                        $rewards = RewardPointTable::model()->findByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $reward_history = RewardPointHistory::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        $this->render('rewards', array('model' => $model, 'rewards' => $rewards, 'reward_history' => $reward_history));
                }
        }

        public function actionMerchantPlanDetail($plan) {
                $model = MerchantPlans::model()->findByPk($plan);

                $this->render('merchant_plans_details', array('model' => $model));
        }

        public function actionPlanDetail($plan) {
                $model = PlanDetails::model()->findByPk($plan);

                $this->render('plan_details', array('model' => $model));
        }

        public function actionTaxClasses() {
                $model = MasterTaxClass::model()->findAll(array('condition' => 'cb = 10 OR cb =' . Yii::app()->session['merchant']['id']));
                $this->render('taxclasses', array('models' => $model));
        }

        public function actionNewTaxClasses() {
                $model = new MasterTaxClass;
                if (isset($_POST['MasterTaxClass'])) {

                        $model->attributes = $_POST['MasterTaxClass'];

                        $model->tax_rate = implode(',', $_POST['MasterTaxClass']['tax_rate']);
                        $model->doc = date('Y-m-d H:i:s');
                        $model->cb = Yii::app()->session['merchant']['id'];
                        $model->ub = Yii::app()->session['merchant']['id'];
                        $model->cb_type = 2;
                        if ($model->save()) {
                                Yii::app()->user->setFlash('taxsuccess', "Your Tax Clas Succesfully Created!!!!");
                                $this->redirect(array('TaxClasses'));
                        }
                }
                $this->render('newtaxclasses', array('model' => $model));
        }

        public function actionUpdateTaxClasses($tax) {
                $model = MasterTaxClass::model()->findByPk($tax);
                if (isset($_POST['MasterTaxClass'])) {
                        $exist = MasterTaxClass::model()->findByAttributes(array('cb_type' => 2, 'cb' => Yii::app()->session['merchant']['id'], 'id' => $tax));
                        if (!empty($exist)) {
                                $model->attributes = $_POST['MasterTaxClass'];

                                $model->tax_rate = implode(', ', $_POST['MasterTaxClass']['tax_rate']);
                                $model->cb = Yii::app()->session['merchant']['id'];
                                $model->ub = Yii::app()->session['merchant']['id'];
                                $model->cb_type = 2;
                                if ($model->save()) {
                                        Yii::app()->user->setFlash('taxsuccess', "Your Tax Clas Succesfully updated!!!!");
                                        $this->redirect(array('TaxClasses'));
                                }
                        } else {
                                Yii::app()->user->setFlash('error', "Invalid Attemp!!!!");
                                $this->redirect(array('TaxClasses'));
                        }
                }
                $this->render('newtaxclasses', array('model' => $model));
        }

        public function actionDeleteTaxClasses($tax) {
                $model = MasterTaxClass::model()->findByPk($tax);
                $exist = MasterTaxClass::model()->findByAttributes(array('cb_type' => 2, 'cb' => Yii::app()->session['merchant']['id'], 'id' => $tax));

                if (!empty($exist)) {
                        if ($model->delete()) {
                                Yii::app()->user->setFlash('taxsuccess', "Your Tax Clas Succesfully Deleted!!!!");
                                $this->redirect(array('TaxClasses'));
                        }
                } else {
                        Yii::app()->user->setFlash('error', "Invalid Attemp!!!!");
                        $this->redirect(array('TaxClasses'));
                }
                $this->render('newtaxclasses', array('model' => $model));
        }

        public function MerchantPlanHistory($data) {
                $model = new MerchantPlansHistory;
                $model->plan_id = $data;
                $plan = PlanDetails::model()->findByPk($model->plan_id);
                $model->user_id = Yii::app()->session['merchant']['id'];
                $model->plan_name = $plan->plan_name;
                $model->amount = $plan->amount;
                $model->featured = $plan->featured;
                $model->no_of_product = $plan->no_of_products;
                $model->no_of_ads = $plan->no_of_ads;
                $model->no_of_days = $plan->no_of_days;
                $model->doc = date('Y-m-d H:i:s');
                $model->dou = date('Y-m-d H:i:s');
                $model->status = 1;
                if ($model->save(false)) {
                        return true;
                }
        }

        public function actionUpgradePlan() {
                $model = new MerchantPlans;

                if (isset($_POST['PlanDetails'])) {
                        $plan_exist = MerchantPlans::model()->findByAttributes(array('user_id' => Yii::app()->session['merchant']['id']));
                        if (!empty($plan_exist)) {
                                $date = date('Y-m-d', strtotime($plan_exist->doc));
                                $exp_date = date("Y-m-d", strtotime($date . " + $plan_exist->no_of_days days"));
                                $today = date('Y-m-d');

                                if ($today > $exp_date) {
                                        $model->plan_id = $_POST['PlanDetails']['id'];
                                        $plan = PlanDetails::model()->findByPk($model->plan_id);
                                        $model->user_id = Yii::app()->session['merchant']['id'];
                                        $model->plan_name = $plan->plan_name;
                                        $model->amount = $plan->amount;
                                        $model->featured = $plan->featured;
                                        $model->featured_left = $plan->featured;
                                        $model->no_of_product = $plan->no_of_products;
                                        $model->no_of_product_left = $plan->no_of_products;
                                        $model->no_of_ads = $plan->no_of_ads;
                                        $model->no_of_ads_left = $plan->no_of_ads;
                                        $model->no_of_days = $plan->no_of_days;
                                        $model->no_of_days_left = $plan->no_of_days;
                                        $model->doc = date('Y-m-d H:i:s');
                                        $model->dou = date('Y-m-d H:i:s');
                                        $model->status = 1;
                                        if ($model->save(false)) {
                                                $this->MerchantPlanHistory($_POST['PlanDetails']['id']);
                                                $plan_exist->delete();
                                                Yii::app()->user->setFlash('success', "Your Plan Upgrade Successfully!!!!");
                                                $this->redirect(array('Myaccount/UpgradePlan'));
                                        } else {
                                                Yii::app()->user->setFlash('Error', "Error Occured!!!!");
                                                $this->redirect(array('Myaccount/UpgradePlan'));
                                        }
                                } else {
                                        $model->plan_id = $_POST['PlanDetails']['id'];
                                        $plan = PlanDetails::model()->findByPk($model->plan_id);
                                        $model->user_id = Yii::app()->session['merchant']['id'];
                                        $model->plan_name = $plan->plan_name;
                                        $model->amount = $plan->amount;
                                        $model->featured = $plan->featured + $plan_exist->featured_left;
                                        $model->featured_left = $plan->featured + $plan_exist->featured_left;
                                        $model->no_of_product = $plan->no_of_products + $plan_exist->no_of_product_left;
                                        $model->no_of_product_left = $plan->no_of_products + $plan_exist->no_of_product_left;
                                        $model->no_of_ads = $plan->no_of_ads + $plan_exist->no_of_ads_left;
                                        $model->no_of_ads_left = $plan->no_of_ads + $plan_exist->no_of_ads_left;
                                        $model->no_of_days = $plan->no_of_days + $plan_exist->no_of_days_left;
                                        $model->no_of_days_left = $plan->no_of_days + $plan_exist->no_of_days_left;
                                        $model->doc = date('Y-m-d H:i:s');
                                        $model->dou = date('Y-m-d H:i:s');
                                        $model->status = 1;
                                        if ($model->save(false)) {

                                                $this->MerchantPlanHistory($_POST['PlanDetails']['id']);
                                                $plan_exist->delete();
                                                Yii::app()->user->setFlash('success', "Your Plan Upgrade Successfully!!!!");
                                                $this->redirect(array('Myaccount/UpgradePlan'));
                                        } else {
                                                Yii::app()->user->setFlash('Error', "Error Occured!!!!");
                                                $this->redirect(array('Myaccount/UpgradePlan'));
                                        }
                                }
                        } else {
                                $model->plan_id = $_POST['PlanDetails']['id'];
                                $plan = PlanDetails::model()->findByPk($model->plan_id);
                                $model->user_id = Yii::app()->session['merchant']['id'];
                                $model->plan_name = $plan->plan_name;
                                $model->amount = $plan->amount;
                                $model->featured = $plan->featured;
                                $model->featured_left = $plan->featured;
                                $model->no_of_product = $plan->no_of_products;
                                $model->no_of_product_left = $plan->no_of_products;
                                $model->no_of_ads = $plan->no_of_ads;
                                $model->no_of_ads_left = $plan->no_of_ads;
                                $model->no_of_days = $plan->no_of_days;
                                $model->no_of_days_left = $plan->no_of_days;
                                $model->doc = date('Y-m-d H:i:s');
                                $model->dou = date('Y-m-d H:i:s');
                                $model->status = 1;
                                if ($model->save(false)) {
                                        $this->MerchantPlanHistory($_POST['PlanDetails']);
                                        Yii::app()->user->setFlash('success', "Your Plan Upgrade Successfully!!!!");
                                        $this->redirect(array('Myaccount/UpgradePlan'));
                                } else {
                                        Yii::app()->user->setFlash('Error', "Error Occured!!!!");
                                        $this->redirect(array('Myaccount/UpgradePlan'));
                                }
                        }
                }

                $allplans = PlanDetails::model()->findAllByAttributes(array('status' => 1));
                $yourplans = MerchantPlans::model()->findAllByAttributes(array('status' => 1, 'user_id' => Yii::app()->session['merchant']['id']));
                $this->render('merchant_plans', array('model' => $model, 'plan' => $plan, 'allplans' => $allplans, 'yourplans' => $yourplans));
        }

        public function actionUpgradePlanProduct() {
                $plan_id = $_POST['plan_id'];
                $plan_date = $_POST['plan_date'];
                $plan = PlanDetails::model()->findByPk($plan_id)->amount;
                $plan_featured = PlanDetails::model()->findByPk($plan_id)->featured;
                $plan_products_id = PlanDetails::model()->findByPk($plan_id)->id;
                $array = array('plan' => $plan, 'plan_featured' => $plan_featured, 'plan_products_id' => $plan_products_id);
                $json = CJSON::encode($array);
                echo $json;
        }

        public function actionUpgradePlanProductdate() {
                $plan_date = $_POST['plan_date'];
                $plan_id = $_POST['plan_id'];
                $plan = PlanDetails::model()->findByPk($plan_id)->no_of_days;
                $date = $plan_date;
                $newdate = strtotime('+' . $plan . 'day', strtotime($date));
                $newdates = date('j-m-Y', $newdate);

                echo $newdates;
                $array = array('plan_date' => $plan_date, 'newdates' => $newdates);
                $json = CJSON::encode($array);
                echo $json;
        }

        public function actionPaymentRequest() {
                $merchant_id = Yii::app()->session['merchant']['id'];
                $user_id = Yii::app()->session['merchant']['id'];
                $account = 0;
                $model = new RequestPayment;
                $merchant_account = MerchantAccountMaster::model()->findByAttributes(array('merchant_id' => $merchant_id));
                $banking_data = BankingDetails::model()->findAllByAttributes(array('user_id' => $user_id));


                if (isset($_POST['RequestPayment'])) {
                        $model->withdraw_amount = $_POST['RequestPayment']['withdraw_amount'];
                        $account = $_POST['account'];

                        if ($model->validate()) {
                                $payoutModel = new MerchantPayoutHistory;
                                $payoutModel->merchant_id = $merchant_id;
                                $payoutModel->available_balance = $merchant_account->available_balance;
                                $payoutModel->requested_amount = $model->withdraw_amount;
                                $payoutModel->payment_account = $account;
                                $payoutModel->status = 1;
                                $payoutModel->DOC = date('Y-m-d');

                                if ($payoutModel->save()) {
                                        // to create history , we refer request id
                                        MerchantPayoutHistory::model()->updateByPk($payoutModel->id, array('request_id' => $payoutModel->id));
                                        // to avoid form submissions
                                        $model = new RequestPayment;
                                        $payoutModel1 = $payoutModel;
                                        $payoutModel = new MerchantPayoutHistory;

                                        Yii::app()->user->setFlash('RequestPayment', "Your request has placed succesfully to admin. Admin will process your request and notify you soon. ");
                                        $requestStatus = 1;
                                        $this->redirect(array('PaymentRequest'));
//                    $this->mailPayoutRequest($requestStatus, $payoutModel1);
                                } else {
                                        $payoutModel1 = $payoutModel;

                                        Yii::app()->user->setFlash('RequestPayment', " Sorry, your request is not placed. Please try after some time.");
                                        $requestStatus = 0;
                                        $this->redirect(array('PaymentRequest'));
//                    $this->mailPayoutRequest($requestStatus, $payoutModel1);
                                }
                        }
                }
                $payoutHistory = MerchantPayoutHistory::model()->findAllByAttributes(array('merchant_id' => $merchant_id));

                $this->render('payment_payout', array('account_data' => $merchant_account, 'banking_data' => $banking_data, 'model' => $model, 'payoutHistory' => $payoutHistory));
        }

        public function mailPayoutRequest($requestStatus, $payoutModel) {
                Yii::import('user.extensions.yii-mail.YiiMail');
                $user_id = Yii::app()->user->getId();
                $user_model = Users::model()->findByPk($user_id);
                if ($requestStatus == 1) {
                        $subject = "Payout Request Placed";
                        $status = "placed";
                        // mail to admin
                        $message = new YiiMailMessage;
                        $message->view = "_payout_request";
                        $params = array('user_model' => $user_model, 'payoutModel' => $payoutModel);
                        $message->subject = "NewGen Shop : $subject";
                        $message->setBody($params, 'text/html');
                        $message->addTo(Yii::app()->params['adminEmail']);
                        $message->from = $user_model->email;
                        Yii::app()->mail->send($message);
                } else {
                        $subject = "Payout Request Failed";
                        $status = "failed";
                }
                // mail to user
                $message = new YiiMailMessage;
                $message->view = "_info_payout_request";
                $params = array('user_model' => $user_model, 'status' => $status, 'payoutModel' => $payoutModel);
                $message->subject = "NewGen Shop : $subject";
                $message->setBody($params, 'text/html');
                $message->addTo($user_model->email);
                $message->from = Yii::app()->params['infoEmail'];
                Yii::app()->mail->send($message);
        }

}
