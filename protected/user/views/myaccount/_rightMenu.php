<ul>

        <?php
        $active_menu = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
        if ($active_menu == 'myaccount/index') {
                $active1 = 'active';
        } else if ($active_menu == 'myaccount/ResetPassword') {
                $active2 = 'active';
        } else if ($active_menu == 'myaccount/UserSettings' || $active_menu == 'myaccount/VendorSettings') {
                $active3 = 'active';
        } else if ($active_menu == 'myaccount/AddressBook') {
                $active4 = 'active';
        } else if ($active_menu == 'products/AddProducts') {
                $active5 = 'active';
        } else if ($active_menu == 'products/MyProducts') {
                $active6 = 'active';
        } else if ($active_menu == 'myaccount/SubmitDeal') {
                $active7 = 'active';
        } else if ($active_menu == 'myaccount/Newsletter') {
                $active8 = 'active';
        } else if ($active_menu == 'myaccount/UserOrderHistory' || $active_menu == 'myaccount/VendorOrderHistory') {
                $active9 = 'active';
        } else if ($active_menu == 'myaccount/MySalesReport') {
                $active10 = 'active';
        } else if ($active_menu == 'myaccount/paidAd') {
                $active11 = 'active';
        } else if ($active_menu == 'myaccount/message') {
                $active12 = 'active';
        }
        ?>
        <li class="<?= $active1; ?>"><?php echo CHtml::link('Dashboard', array('Myaccount/index')); ?></li>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li><a href="#">Messages </a></li>
        <?php } ?>
        <li class="<?= $active2; ?>"><?php echo CHtml::link('Reset Password', array('Myaccount/ResetPassword')); ?></li>
        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active3; ?>"><?php echo CHtml::link('Account settings', array('Myaccount/UserSettings')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active3; ?>"><?php echo CHtml::link('Account settings', array('Myaccount/VendorSettings')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['merchant']) { ?>
                    <!--<li class="<?//= $active5; ?>"><?php //echo CHtml::link('Add Products', array('Products/AddProducts'));                            ?></li>-->
                <li class="<?= $active6; ?>"><?php echo CHtml::link('Products', array('Products/MyProducts')); ?></li>

        <?php } ?>
        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active9; ?>"><?php echo CHtml::link('My Order', array('Myaccount/UserOrderHistory')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active9; ?>"><?php echo CHtml::link('Orders', array('Myaccount/VendorOrderHistory')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active4; ?>"><?php echo CHtml::link('Address Books', array('Myaccount/AddressBook')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['merchant']) { ?>
        <!--                <li class="<?= $active5; ?>"><?php echo CHtml::link('Add Products', array('Products/AddProducts')); ?></li>
                <li class="<?= $active6; ?>"><?php echo CHtml::link('My Product', array('Products/MyProducts')); ?></li>-->
        <?php } ?>
        <?php if (Yii::app()->session['user']) { ?>
                <li><a href="#">Wishlisted Products</a></li>

                <li class="<?= $active7; ?>"><?php echo CHtml::link('Submit a product', array('Myaccount/SubmitDeal')); ?></li>
        <?php } ?>
        <li class="<?= $active8; ?>"><?php echo CHtml::link('Newsletter Subscription', array('Myaccount/Newsletter')); ?></li>

        <li><a href="#">Set interest deals/ wish listed deals</a></li>
        <li class="<?= $active7; ?>"><?php echo CHtml::link('Submit a deal/ product', array('Myaccount/SubmitDeal')); ?></li>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active10; ?>"><?php echo CHtml::link('Sales Report', array('Myaccount/MySalesReport')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active8; ?>"><?php echo CHtml::link('Newsletter Subscription', array('Myaccount/Newsletter')); ?></li>
        <?php } ?>
        <li><a href="#"> Transaction</a></li>
        <li><a href="#"> Payment/Payout</a></li>
        <li><a href="#"> Plans</a></li>
        <!--<li><a href="#"> Affiliate commission</a></li>-->
        <li><a href="#"> Reward points</a></li>
        <!--<li><a href="#">Used and refurbished (Return products)</a></li>-->
        <li class="<?= $active11; ?>"><?php echo CHtml::link('Advertisements', array('Myaccount/paidAd')); ?></li>
        <!--<li><a href="#"> Bargain zone</a></li>-->
</ul>