
<link rel="stylesheet" type="text/css" href="<?= Yii::app()->baseUrl ?>/css/bootstrap-slider.css">
<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="<?= Yii::app()->baseUrl ?>/images/c1.jpg">
                        </div>
                </div>
        </div>
</section>



<section class="main-products">
        <div class="container">
                <div class="row">

                        <?php echo $this->renderPartial('_left_menu', array('price' => $price, 'category' => $category)); ?>


                        <div class="clearfix visible-sm visible-xs"></div>


                        <div class="col-md-9 deals-products">
                                <div class="col-md-12 related">
                                        <h6>
                                                <?php
                                                if (isset($category)) {
                                                        echo $category;
                                                } else {
                                                        echo 'All Products';
                                                }
                                                ?>
                                        </h6>
                                        <div class="listed">
                                                <label class="sortby">Sort By</label>
                                                <div class="form-group">
                                                        <form id="products_sort" method="POST" action="<?= Yii::app()->request->baseUrl . "/index.php/products/list"; ?>" class="form-inline" role="form">
                                                                <input type="hidden" name="category" value="<?= $category ?>">
                                                                <input type="hidden" name="sort_by" id='sort_by'>
                                                                <select class="chris-select animated fadeInUp" name="product_sort" id="sel_sort" form="product_sort" onchange='sort()' selected='<?= $sort ?>' >
                                                                        <option value="">Sort</option>
                                                                        <option value="new_first">Newest First</option>
                                                                        <option value="old_first">Oldest First</option>
                                                                        <option value="price_low">Price - low to high</option>
                                                                        <option value="price_high">Price - high to low</option>

                                                                </select>
                                                        </form>
                                                </div>

                                        </div>
                                </div>

                                <?php
                                if (empty($products)) {
                                        echo '<div style="padding:2em;"> No products available </div>';
                                } else {
                                        echo $this->renderPartial('_product_list', array('products' => $products));
                                }
                                ?>
                                <?php
                                $this->widget('application.user.extensions.yiinfinite-scroll.YiinfiniteScroller', array(
                                    'contentSelector' => '#products',
                                    'itemSelector' => 'div.product',
                                    'loadingText' => 'Loading...',
                                    'donetext' => '<div class="clearfix"></div><button class="ripple">Loading Complete</button>',
                                    'pages' => $pages,
                                ));
                                ?>
                        </div>

                        <div class="clearfix"></div>
                        <!--<button type="button" class="btn btn-primary loadmore">Load More</button>-->
                </div>
        </div>


</section>
<script>
        function sort()
        {
                var e = document.getElementById("sel_sort");
                var sort = e.options[e.selectedIndex].value;

                $("#sort_by").val(sort);
                $('#products_sort').submit();
        }
</script>
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

<script src="<?= Yii::app()->baseUrl ?>/js/bootstrap-slider.js"></script>



<script>

        $("#ex16b").slider({
                min: 1000,
                max: 15000,
                value: [1000, 15000],
                focus: true
        });

</script>



<script>
        $("#ex16bs").slider({
                min: 1000,
                max: 15000,
                value: [1000, 15000],
                focus: true,
                slide: function (event, ui) {
                        alert();
                }
        });


</script>
<script>
        $(document).ready(function () {
                var selectIds = $('#k1,#k2,#k3,#k4,#k5');
                $(function ($) {
                        selectIds.on('show.bs.collapse hidden.bs.collapse', function () {
                                $(this).prev().find('.glyphicon').toggleClass('glyphicon-plus glyphicon-minus');
                        });
                });
        });
</script>

