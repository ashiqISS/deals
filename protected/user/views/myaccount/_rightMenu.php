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
        } else if ($active_menu == 'Myaccount/UpgradePlan') {
                $active14 = 'active';
        }
//    else if ($active_menu == 'myaccount/message') {
//            $active12 = 'active';
//    }
        ?>
        <li class="<?= $active1; ?>"><?php
                if (Yii::app()->session['user_type_usrid'] == 2)
                        echo CHtml::link('Dashboard', array('Myaccount/index/type/vendor'));
                else
                        echo CHtml::link('Dashboard', array('Myaccount/index/type/user'));
                ?></li>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active12; ?>"><?php echo CHtml::link('Messages', array('myaccount/message')); ?></li>

        <?php } ?>

        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active3; ?>"><?php echo CHtml::link('Account settings', array('Myaccount/UserSettings')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active3; ?>"><?php echo CHtml::link('Account settings', array('Myaccount/VendorSettings')); ?></li>
        <?php } ?>
        <li class="<?= $active2; ?>"><?php echo CHtml::link('Reset Password', array('Myaccount/ResetPassword')); ?></li>
        <?php if (Yii::app()->session['merchant']) { ?>
                                                                                                                                                                                                           <!--<li class="<?//= $active5; ?>"><?php //echo CHtml::link('Add Products', array('Products/AddProducts'));                                                             ?></li>-->
                <li class="<?= $active6; ?>"><?php echo CHtml::link('Products', array('Products/MyProducts')); ?></li>

        <?php } ?>
        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active9; ?>"><?php echo CHtml::link('My Orders', array('Myaccount/UserOrderHistory')); ?></li>
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
                <li><?php echo CHtml::link('Wish Listed Products', array('Myaccount/Wishlist')); ?></li>

                <li class="<?= $active7; ?>"><?php echo CHtml::link('Submit a Product', array('Myaccount/SubmitDeal')); ?></li>
        <?php } ?>


        <?php if (Yii::app()->session['user']) { ?>
                <li class="<?= $active8; ?>"><?php echo CHtml::link('Newsletter Subscription', array('Myaccount/Newsletter')); ?></li>
        <?php } ?>
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active10; ?>"><?php echo CHtml::link('Sales Report', array('Myaccount/MySalesReport')); ?></li>


                <li><a href="#"> Transaction</a></li>
                <li><a href="#"> Payment/Payout</a></li>
                <!--<li><a href="#"> Plans</a></li>-->
                <li class="<?= $active14; ?>"><?php echo CHtml::link('Plans', array('Myaccount/UpgradePlan')); ?></li>
        <?php } ?>
        <!--<li><a href="#"> Affiliate commission</a></li>-->
        <?php if (Yii::app()->session['user']) { ?>
                <!--<li><a href="#"> Reward points</a></li>-->
                <li class="<?= $active10; ?>"><?php echo CHtml::link('Reward points', array('Myaccount/MyRewards')); ?></li>
        <?php } ?>
        <!--<li><a href="#">Used and refurbished (Return products)</a></li>-->
        <?php if (Yii::app()->session['merchant']) { ?>
                <li class="<?= $active11; ?>"><?php echo CHtml::link('Advertisements', array('Myaccount/paidAd')); ?></li>
        <?php } ?>
        <!--<li><a href="#"> Bargain zone</a></li>-->
</ul>