<ul>

        <?php
        $active_menu = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
        if ($active_menu == 'myaccount/index') {
                $active1 = 'active';
        } else if ($active_menu == 'myaccount/ResetPassword') {
                $active2 = 'active';
        } else if ($active_menu == 'myaccount/Settings') {
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
        }
        ?>
        <li class="<?= $active1; ?>"><?php echo CHtml::link('My Profile', array('Myaccount/index')); ?></li>
        <li><a href="#">Message </a></li>
        <li class="<?= $active2; ?>"><?php echo CHtml::link('Reset Password', array('Myaccount/ResetPassword')); ?></li>
        <li class="<?= $active3; ?>"><?php echo CHtml::link('Account settings', array('Myaccount/Settings')); ?></li>
        <li><a href="#">Order History</a></li>
        <li class="<?= $active4; ?>"><?php echo CHtml::link('Address Book', array('Myaccount/AddressBook')); ?></li>
        <?php if (Yii::app()->session['user_type_usrid'] != 1) { ?>
                <li class="<?= $active5; ?>"><?php echo CHtml::link('Add Products', array('Products/AddProducts')); ?></li>
                <li class="<?= $active6; ?>"><?php echo CHtml::link('My Product', array('Products/MyProducts')); ?></li>

        <?php } ?>
        <li class="<?= $active8; ?>"><?php echo CHtml::link('Newsletter Subscription', array('Myaccount/Newsletter')); ?></li>

        <li><a href="#">Set interest deals/ wish listed deals</a></li>
        <li class="<?= $active7; ?>"><?php echo CHtml::link('Submit a deal/ product', array('Myaccount/SubmitDeal')); ?></li>
        <li><a href="#">My sales Report </a></li>
        <li><a href="#"> Transaction</a></li>
        <li><a href="#"> Payment/Payout</a></li>
        <li><a href="#"> Plan details</a></li>
        <li><a href="#"> Affiliate commission</a></li>
        <li><a href="#"> Reward points</a></li>
        <li><a href="#">Used and refurbished (Return products)</a></li>
        <li><a href="#"> Paid Ad</a></li>
        <li><a href="#"> Bargain zone</a></li>
</ul>