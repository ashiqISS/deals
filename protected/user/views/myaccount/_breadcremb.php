<?php
if (Yii::app()->controller->action->id == 'index') {
        $name = 'Dashboard';
        $action = 'Myaccount/index';
} else if (Yii::app()->controller->action->id == 'NewAddressBook') {
        $name = 'New Addressbook';
        $action = 'Myaccount/index';
} else if (Yii::app()->controller->action->id == 'ResetPassword') {
        $name = 'Reset Password';
        $action = 'Myaccount/index';
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
                                <li><?php echo CHtml::link('Dashboard', array('Myaccount/index')); ?></li>
                                <?php if (Yii::app()->controller->action->id != 'index') { ?>
                                        <li><span class="last">  <?php echo $name ?></span></li>
                                        <?php } ?>

                        </ul>
                </div>
        </div>
</div>