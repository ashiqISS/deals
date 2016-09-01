<ul>

        <?php
        $active_menu = Yii::app()->controller->id . '/' . Yii::app()->controller->action->id;
        if ($active_menu == 'myaccount/myprofile') {
                $active1 = 'active';
        } else if ($active_menu == 'myaccount/message') {
                $active2 = 'active';
        } else if ($active_menu == 'myaccount/accountsetting') {
                $active3 = 'active';
        } else if ($active_menu == 'products/orderhistory') {
                $active4 = 'active';
        } else if ($active_menu == 'site/addressbook') {
                $active5 = 'active';
        } else if ($active_menu == 'site/newsletter') {
                $active6 = 'active';
        } else if ($active_menu == 'myaccount/interestDeals') {
                $active7 = 'active';
        } else if ($active_menu == 'products/SubmitDeal') {
                $active8 = 'active';
        } else if ($active_menu == 'products/myproducts') {
                $active9 = 'active';
        } else if ($active_menu == 'products/SalesReport') {
                $active10 = 'active';
        }
        ?>
        <li class="<?= $active1; ?>"><?php echo CHtml::link('My profile', array('myaccount/myprofile')); ?></li>
        <li class="<?= $active2; ?>"><?php echo CHtml::link('Message', array('myaccount/message')); ?></li>
        <li class="<?= $active3; ?>"><?php echo CHtml::link('Account settings', array('myaccount/accountsetting')); ?></li>
        <li class="<?= $active4; ?>"><?php echo CHtml::link('Order History', array('products/orderhistory')); ?></li>
        <li class="<?= $active5; ?>"><?php echo CHtml::link('Address Book', array('site/addressbook')); ?></li>
        <li class="<?= $active6; ?>"><?php echo CHtml::link('Newsletter Subscription', array('site/newsletter')); ?></li>

        <li class="<?= $active7; ?>"><?php echo CHtml::link('Set interest deals/ wish listed deals', array('myaccount/interestDeals')); ?></li>
        <li class="<?= $active8; ?>"><?php echo CHtml::link('Submit a deal/ product', array('products/SubmitDeal')); ?></li>
        <li class="<?= $active9; ?>"><?php echo CHtml::link('My product', array('products/myproducts')); ?></li>
        <li class="<?= $active10; ?>"><?php echo CHtml::link('My sales Report', array('products/SalesReport')); ?></li>
        <li><a href="#">My sales Report </a></li>
        <li><a href="#"> Transaction</a></li>
        <li><a href="#"> Payment/Payout</a></li>
        <li><a href="#"> Plan details</a></li>
        <li><a href="#"> Affiliate commission</a></li>
        <li><a href="#"> Reward points</a></li>

        <li><a href="#"> Discount coupon generation</a></li>
        <li><a href="#">Used and refurbished (Return products)</a></li>
        <li><a href="#"> Paid Ad</a></li>
        <li><a href="#"> Bargain zone</a></li>
</ul>