<div id="products">
        <div class="rows ">
                <?php
                foreach ($products as $product) {
                        ?>
                        <div class="col-md-4 col-sm-6 col-xs-6 mob deals-effects product" style="padding-bottom: 40px;padding-top: 40px; border-bottom: 1px solid #ccc;">
                                <?php
                                echo $this->renderPartial('//products/_product_details', array('product' => $product));
                                ?>
                        </div>

                        <!--<div class="visible-sm visible-xs clearfix"></div>-->

                        <!--<div class="visible-sm visible-xs clearfix"></div>-->

                        <?php
                }
                ?>
        </div>
</div>

