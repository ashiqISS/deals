<?php
if (Yii::app()->controller->action->id == 'index') {
        $name = 'Dashboard';
        if (Yii::app()->session['user_type_usrid'] == 2)
                $action = 'Myaccount/index/type/vendor';
        else
                $action = 'Myaccount/index/type/user';
} else if (Yii::app()->controller->action->id == 'NewAddressBook') {
        $name = 'New Addressbook';
        if (Yii::app()->session['user_type_usrid'] == 2)
                $action = 'Myaccount/index/type/vendor';
        else
                $action = 'Myaccount/index/type/user';
} else if (Yii::app()->controller->action->id == 'ResetPassword') {
        $name = 'Reset Password';
        if (Yii::app()->session['user_type_usrid'] == 2)
                $action = 'Myaccount/index/type/vendor';
        else
                $action = 'Myaccount/index/type/user';
} else if (Yii::app()->controller->action->id == 'UserSettings') {
        $name = 'Account Settings';
        $action = 'Myaccount/UserSettings';
} else if (Yii::app()->controller->action->id == 'UserOrderHistory') {
        $name = 'My Orders';
        $action = 'Myaccount/UserOrderHistory';
} else if (Yii::app()->controller->action->id == 'AddressBook') {
        $name = 'Address Books';
        $action = 'Myaccount/AddressBook';
} else if (Yii::app()->controller->action->id == 'SubmitDeal') {
        $name = 'Submit Your Product';
        $action = 'Myaccount/SubmitDeal';
} else if (Yii::app()->controller->action->id == 'VendorOrderHistory') {
        $name = 'Orders';

        $action = 'Myaccount/VendorOrderHistory';
} else if (Yii::app()->controller->action->id == 'Newsletter') {
        $name = 'News Letter';
        $action = 'Myaccount/Newsletter';
} else if (Yii::app()->controller->action->id == 'MySalesReport') {
        $name = 'Sales Report';
        $action = 'Myaccount/MySalesReport';
} else if (Yii::app()->controller->action->id == 'paidAd') {
        $name = 'Advertisement';
        $action = 'Myaccount/paidAd';
} else if (Yii::app()->controller->action->id == 'EditAddressBook') {
        $name = 'Edit Address Book';
        $action = 'Myaccount/EditAddressBook';
} else if (Yii::app()->controller->action->id == 'Message') {
        $name = 'Messages';
        $action = 'Myaccount/Message';
} else if (Yii::app()->controller->action->id == 'VendorSettings') {
        $name = 'Account Settings';
        $action = 'Myaccount/EditAddressBook';
} else if (Yii::app()->controller->action->id == 'MyProducts') {
        $name = 'Products';
        $action = 'Myaccount/EditAddressBook';
} else if (Yii::app()->controller->action->id == 'AddProducts') {
        $name = 'Add New Products';
        $action = 'Myaccount/EditAddressBook';
} else if (Yii::app()->controller->action->id == 'EditProduct') {
        $name = 'Edit Products';
        $action = 'Myaccount/EditAddressBook';
} else if (Yii::app()->controller->action->id == 'Wishlist') {
        $name = 'Wishlisted Products';
        $action = 'Myaccount/Wishlist';
} else if (Yii::app()->controller->action->id == 'UserOrderDetail') {
        $name = 'Order Details';
        $action = 'Myaccount/UserOrderDetail';
} else if (Yii::app()->controller->action->id == 'MerchantPlanDetail') {
        $name = 'Your Plan Details';
        $action = 'Myaccount/MerchantPlanDetail';
} else if (Yii::app()->controller->action->id == 'PlanDetail') {
        $name = 'Plan In Details';
        $action = 'Myaccount/PlanDetail';
} else if (Yii::app()->controller->action->id == 'TaxClasses') {
        $name = 'Tax Classes';
        $action = 'Myaccount/TaxClasses';
} else if (Yii::app()->controller->action->id == 'NewTaxClasses') {
        $name = 'Add New Tax Classes';
        $action = 'Myaccount/NewTaxClasses';
} else if (Yii::app()->controller->action->id == 'MyRewards') {
        $name = 'Reward Points';
        $action = 'Myaccount/MyRewards';
} else if (Yii::app()->controller->action->id == 'CreateBankDetails') {
        $name = 'Create New Bank Details';
        $action = 'Myaccount/CreateBankDetails';
} else if (Yii::app()->controller->action->id == 'bankDetails') {
        $name = 'Bank Details';
        $action = 'Myaccount/bankDetails';
} else if (Yii::app()->controller->action->id == 'PaymentRequest') {
        $name = 'Payment Request';
        $action = 'Myaccount/PaymentRequest';
}
?>
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1><?php echo $name; ?></h1>
                        </div>
                </div>
        </div>
</section>

<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <ul class="breadcrumb">
                                <li><a href="javascript:void(0)"><i class="fa hom fa-home"></i></a></li>
                                <li><?php
                                        if (Yii::app()->session['user_type_usrid'] == 2)
                                                echo CHtml::link('Dashboard', array('Myaccount/index/type/vendor'));
                                        else
                                                echo CHtml::link('Dashboard', array('Myaccount/index/type/user'));
                                        ?></li>
                                <?php if (Yii::app()->controller->action->id != 'index') { ?>
                                        <li><span class="last">  <?php echo $name ?></span></li>
                                <?php } ?>
                                <h4 style="margin: 0px; font-size: 14px;" class="pull-right"><?php
                                        if (isset(Yii::app()->session['merchant'])) {
                                                echo 'You Are logged in as <strong>Merchant</strong>(#' . Yii::app()->session['merchant']['id'] . ')';
                                        } else if (isset(Yii::app()->session['user'])) {
                                                echo 'You Are logged in as <strong>User</strong>(#' . Yii::app()->session['merchant']['id'] . ')';
                                        }
                                        ?></h4>
                        </ul>


                </div>
        </div>
</div>