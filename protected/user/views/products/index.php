<section class="banner">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <img src="images/c1.jpg">
                        </div>
                </div>
        </div>
</section>



<section class="deals-products">
        <div class="container">
                <div class="row">

                        <div class="rows">
                                <div class="col-md-12">
                                        <h6>Daily Deals</h6>
                                        <div class="listed">
                                                <!--                        <form>
                                                                            <div class="form-group">
                                                                                <label for="email">Sort By</label>
                                                                                <select class="chris-select" name="carlist" form="carform">
                                                                                    <option value="volvo">Default</option>
                                                                                    <option value="saab">Saab</option>
                                                                                    <option value="opel">Opel</option>
                                                                                    <option value="audi">Audi</option>
                                                                                </select>
                                                                            </div>
                                                                        </form>-->

                                                <form class="form-inline" role="form">
                                                        <label class="sortby">Sort By</label>
                                                        <div class="form-group">

                                                                <select class="chris-select animated fadeInUp" name="carlist" form="carform">
                                                                        <option value="volvo">Default</option>
                                                                        <option value="saab">Saab</option>
                                                                        <option value="opel">Opel</option>
                                                                        <option value="audi">Audi</option>
                                                                </select>
                                                        </div>


                                                </form>





                                        </div>
                                </div>
                                <?php
                                echo $this->renderPartial('//site/_latest_deal', array('products' => $products));
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

                                <div class="clearfix"></div>
                                <button class="ripple">Load More</button>
                        </div>
                </div>


</section>

<script>
        (function (window, $) {
                $(function () {
                        $('.ripple').on('click', function (event) {
                                event.preventDefault();
                                var $div = $('<div/>'),
                                        btnOffset = $(this).offset(),
                                        xPos = event.pageX - btnOffset.left,
                                        yPos = event.pageY - btnOffset.top;
                                $div.addClass('ripple-effect');
                                var $ripple = $(".ripple-effect");

                                $ripple.css("height", $(this).height());
                                $ripple.css("width", $(this).height());
                                $div
                                        .css({
                                                top: yPos - ($ripple.height() / 2),
                                                left: xPos - ($ripple.width() / 2),
                                                background: $(this).data("ripple-color")
                                        })
                                        .appendTo($(this));

                                window.setTimeout(function () {
                                        $div.remove();
                                }, 2000);
                        });

                });

        })(window, jQuery);
</script>
<div class="container main_container product_archive">
        <div class="row">
                <?php
                $category_name = Yii::app()->request->getParam('name');
                if ($category_name != "") {
                        $get_cat_name = ProductCategory::model()->findByAttributes(array('canonical_name' => $category_name));
                }
                ?>
                <div class="col-sm-3 sidebar">

                        <?php
                        $parent = Yii::app()->Menu->findParent($get_cat_name->id);
                        echo $this->renderPartial('left_menu', array('category' => $category, 'parent' => $parent));
                        ?>
                </div>
                <div class="col-sm-9">
                        <div class="product_list">
                                <div class="row">
                                        <?php
                                        if (!empty($dataprovider) || $dataProvider != '') {
                                                $this->widget('zii.widgets.CListView', array(
                                                    'dataProvider' => $dataProvider,
                                                    'itemView' => '_view',
                                                    'template' => "{pager}\n{items}\n{pager}",
                                                ));
                                        } else {

                                        }
                                        ?>

                                </div>
                        </div>
                </div>
        </div>
</div>