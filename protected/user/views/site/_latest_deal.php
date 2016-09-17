<script src="<?= Yii::app()->baseUrl ?>/js/jquery.min.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/jquery.infinitescroll.min.js"></script>
<?php $jquery = Yii::app()->request->baseUrl . '/js/jquery-1.11.3.min.js'; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.min.js'] = $jquery; ?>
<?php Yii::app()->clientscript->scriptMap['jquery.js'] = $jquery; ?>
<script> //            this script is for solving error : "Cannot read property 'msie' of undefined"
        jQuery.browser = {};
        (function () {
            jQuery.browser.msie = false;
            jQuery.browser.version = 0;
            if (navigator.userAgent.match(/MSIE ([0-9]+)\./)) {
                jQuery.browser.msie = true;
                jQuery.browser.version = RegExp.$1;
            }
        })();
</script>
<style>
    .product {
        border-bottom: 1px solid #ccc;
        float: left;
        padding-bottom: 40px;
        padding-top: 40px;
    }
</style>
<div id="products">
    <div class="rows1 ">
        <?php
        $i = 1;
        foreach ($products as $product) {
                ?>
                <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects product">
                    <?php
                    echo $this->renderPartial('//products/_product_details', array('product' => $product, 'i' => $i));
                    ?>

                </div>
                <?php if (($i % 5) == 0) { ?>
                        <div class="col-md-3 col-sm-6 col-xs-6 mob deals-effects product">
                            <img class="img-responsive adz" src="<?php echo Yii::app()->request->baseUrl ?>/images/sd.jpg">


                        </div>
                <?php } ?>

                <!--<div class="visible-sm visible-xs clearfix"></div>-->

                <!--<div class="visible-sm visible-xs clearfix"></div>-->
                <?php if (($i % 4) == 0) { ?>
                    </div>
                    <div class="rows1">
                <?php } ?>
                <?php
                $i++;
        }
        ?>
    </div>
</div>