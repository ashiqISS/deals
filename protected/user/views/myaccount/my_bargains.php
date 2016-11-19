<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<?php echo $this->renderPartial('_breadcremb'); ?>


<section class="checkout">
    <div class="container">
        <div class="row">



            <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">

                <div class="panel panel-default">
                    <div id="m1" class="panel-collapse collapse">
                        <div class="panel-body mbb">
                            <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                    </div>


                </div>


            </div>


            <div class="col-lg-9 col-md-8">
                <?php if (!empty($bargains)) { ?>
                    <div class="comm">

                        <div class="commission-1">
                            <div class="head-1" style="width: 20%;"><h2>Product Name</h2></div>
                            <div class="head-1" style="width: 20%;"><h2>Amount</h2></div>
                            <div class="head-1" style="width: 20%;"><h2>Date Of Bid</h2></div>
                            <div class="head-1" style="width: 20%;"><h2>Status</h2></div>
                            <div class="head-1" style="width: 20%;"><h2>Closing Date</h2></div>
                        </div>
                        <?php
                        foreach ($bargains as $bids) {
                            $order_products = Products::model()->findByPk($bids->product_id);

                            $dob = date_format(date_create($bids->doc), "d/m/Y");
                            $closing = date_format(date_create($order_products->special_price_to), "d/m/Y");
                             switch ($bids->status) {
                        case 1 : $status = 'Bid Placed';
                            break;
                        case 2 : $status = '<a target="_blank" href="'. Yii::app()->request->baseUrl.'/index.php/products/Detail/name/'.$order_products->canonical_name.'"><b>Bid Selected</b></a>';
                            break;
                        case 3 : $status = 'Bid Failed';
                            break;
                        case 4 : $status = 'Already CheckedOut';
                            break;
                        default : $status = 'Invalid';
                    }
                            ?>
                            <div class="commission-2">
                                <div class="head-1" style="width: 20%;"><h2><a target="_blank" style="color: #333" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/products/Detail/name/<?php echo $order_products->canonical_name; ?>"><?= $order_products->product_name; ?></a></h2></div>
                                <div class="head-1" style="width: 20%;"><h2><?php echo Yii::app()->Currency->convert($bids->bidd_amount); ?></h2></div>
                                <div class="head-1" style="width: 20%;"><h2><?= $dob ?></h2></div>
                                <div class="head-1" style="width: 20%;"><?= $status; ?></div>
                                <div class="head-1" style="width: 20%;"><h2><?= $closing ?></h2></div>
                            </div>
                        <?php } ?>
                    </div>
<!--                    <div class="btn-place-1">


                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                    </div>-->
                    <?php
                } else {
                    echo 'No Bids Placed.';
                }
                ?>
            </div>


            <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                <?php echo $this->renderPartial('_rightMenu'); ?>
            </div>
        </div>
    </div>
</section>



