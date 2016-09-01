<form id="products_search" method="POST" action="<?= Yii::app()->request->baseUrl . "/index.php/products/list"; ?>">
        <?php
        if (Yii::app()->request->getParam('category')) {
                $category = Yii::app()->request->getParam('category');
        }
        ?>
        <div class="col-md-3 heading hidden-xs hidden-sm">
                <h1>Filter By Price</h1>
                <!--<input id="ex16b" type="text"/>-->
                <?php
                echo CHtml::dropDownList('price', $select, Utilities::getPriceList(), array('empty' => 'Price Range', 'class' => "form-control", 'onchange' => 'searchProduct()', 'options' => array($price => array('selected' => true))));
                ?>



                <div class="brands">
                        <h2>Brands</h2>
                        <ul class="list-unstyled">
                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Apple</li>
                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Sony</li>
                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Juccy</li>
                        </ul>
                </div>
                <div class="brands">
                        <h2>Size</h2>
                        <ul class="list-unstyled">
                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Apple</li>
                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Sony</li>
                                <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Juccy</li>
                        </ul>
                </div>


        </div>


        <div class="col-md-3 col-xs-12 heading visible-xs visible-sm">

                <div class="panel panel-default">
                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#k1"> <div class="panel-heading headz">

                                        <span class="panel-title">
                                                <i class="glyphicon gly glyphicon-plus"></i>Filter By Price
                                        </span>


                                </div>
                        </a>
                        <div id="k1" class="panel-collapse collapse">
                                <div class="panel-body">

                                        <input id="ex16bs" type="text"/>
                                        <div class="brands">
                                                <h2>Brands</h2>
                                                <ul class="list-unstyled">
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Apple</li>
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Sony</li>
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Juccy</li>
                                                </ul>
                                        </div>
                                        <div class="brands">
                                                <h2>Size</h2>
                                                <ul class="list-unstyled">
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Apple</li>
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Sony</li>
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Juccy</li>
                                                </ul>
                                        </div>

                                        <div class="brands">
                                                <h2>Brands</h2>
                                                <ul class="list-unstyled">
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Apple</li>
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike">Sony</li>
                                                        <li><input type="checkbox" class="chk" name="vehicle" value="Bike"> Juccy</li>
                                                </ul>
                                        </div>
                                </div>
                        </div>


                </div>


        </div>

        <input type="hidden" id="priceRange" name ="priceRange" value="<?= $price ?>">
        <input type="hidden" name="category" value="<?= $category ?>">
</form>

<script>
        function searchProduct()
        {
                // get value of selected barnds
//        var checkedValue = null;
//        var inputElements = document.getElementsByClassName('brands');
//        for (var i = 0; inputElements[i]; ++i) {
//            if (inputElements[i].checked) {
//                if (checkedValue == null)
//                {
//                    checkedValue = inputElements[i].value;
//                } else
//                    checkedValue = checkedValue + ',' + inputElements[i].value;
//
//            }
//        }

                // set value to hidden field
//        $("#brand_inputs").val(checkedValue);

                // get value of selected priceRange
                var e = document.getElementById("price");
                var priceRange = e.options[e.selectedIndex].value;

                // set value of selected price range
                $("#priceRange").val(priceRange);

                $('#products_search').submit();
        }
</script>
