<?php

class MyaccountController extends Controller {

        public function init() {
                date_default_timezone_set('Asia/Kolkata');
        }

        public function actionIndex() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user']) {
                                $model = BuyerDetails::model()->findByPk(Yii::app()->session['user']['id']);
                                $deal = DealSubmission::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'doc DESC'));
                                $order = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']), array('order' => 'DOC DESC'));
                        } if (Yii::app()->session['merchant']) {
                                $sale = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']), array('order' => 'DOC DESC'));
                                $model = Merchant::model()->findByPk(Yii::app()->session['merchant']['id']);
                                $plans = PlanDetails::model()->findAll();
                                $deal = DealSubmission::model()->findAllByAttributes(array('user_id' => Yii::app()->session['merchant']['id']), array('order' => 'doc DESC'));
                        }
                        $this->render('index', array('model' => $model, 'deal' => $deal, 'order' => $order, 'sale' => $sale, 'plans' => $plans));
                }
        }

        public function actionResetPassword() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user']) {
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
                        } if (Yii::app()->session['merchant']) {
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
                        $this->render('password_reset', array('model' => $model));
                }
        }

        public function actionAddressBook() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
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
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
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
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
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
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
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

        public function actionUserSettings() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
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
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
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
                                        $this->redirect(array('myaccount/index'));
                                }
                        }
                }
                $this->render('submitdeal', array('model' => $model));
        }

        public function actionNewsletter() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
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

        public function actionUserOrderHistory() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['user']) {
                                $model = Order::model()->findAllByAttributes(array('user_id' => Yii::app()->session['user']['id']));
                        }
                }
                $this->render('user_order_history', array('model' => $model));
        }

        public function actionVendorOrderHistory() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $model = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']));
                        }
                }
                $this->render('vendor_order_history', array('model' => $model));
        }

        public function actionMySalesReport() {
                if (!isset(Yii::app()->session['user']) && !isset(Yii::app()->session['merchant'])) {
                        $this->redirect(Yii::app()->request->baseUrl . '/index.php/site/login');
                } else {
                        if (Yii::app()->session['merchant']) {
                                $model = OrderProducts::model()->findAllByAttributes(array('merchant_id' => Yii::app()->session['merchant']['id']));
                        }
                }
                $this->render('sales_report', array('model' => $model));
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
                                        $this->redirect(array('myaccount/index'));
                                } else {
                                        Yii::app()->user->setFlash('plan_error', "Error Occured");
                                        $this->redirect(array('myaccount/index'));
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
                        $user_address = UserAddress::model()->findByPk($order->ship_address_id);
                        $bill_address = UserAddress::model()->findByPk($order->bill_address_id);

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

        public function actionViewOrderHistory($id) {
                echo $id;
        }

        public function actionNewOrderHistory($id) {
                echo $id;
        }

        public function actionPrintShippingDetail($id) {
                echo $id;
        }

}
