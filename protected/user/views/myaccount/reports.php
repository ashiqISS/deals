<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<?php echo $this->renderPartial('_breadcremb'); ?>
<section class="checkout">
        <div class="container">
                <div class="row">
                        <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">
                                <div class="panel panel-default">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#m1"> <div class="panel-heading headz">
                                                        <span class="panel-title">
                                                                <i class="glyphicon gly glyphicon-plus"></i>Filter By Price
                                                        </span>
                                                </div>
                                        </a>
                                        <div id="m1" class="panel-collapse collapse">
                                                <div class="panel-body mbb">
                                                        <?php echo $this->renderPartial('_rightMenu'); ?>
                                                </div>
                                        </div>
                                </div>


                        </div>


                        <div class="col-lg-9 col-md-8">
                                <div class="btn-place-3">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/MySalesReport" class="reward hvr-shutter-in-horizontal left-btns">Sales Report</a>
                                </div>
                                <div class="btn-place-3">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/MostViewProducts" class="reward hvr-shutter-in-horizontal left-btns">Most Viewed Products</a>
                                </div>
                                <div class="btn-place-3">
                                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/myaccount/CustomerReport" class="reward hvr-shutter-in-horizontal left-btns">Customer Reports</a>
                                </div>
                                <!--                                <div class="btn-place-3">
                                                                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                                                </div>
                                                                <div class="btn-place-3">
                                                                        <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                                                </div>-->

                        </div>


                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>



