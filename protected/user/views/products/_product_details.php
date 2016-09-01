<div class="product_details">
        <div class="deals-effect">
                <?php if ($product->main_image != "") { ?>
                        <img class="zoom"  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                        echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                        ?>/<?php echo $product->id; ?>/medium.<?php echo $product->main_image; ?>" alt=""/>
                     <?php } ?>

                <div class="overlay"></div>
                <div class="buy">
                        <?php if ($product->product_type == 2) { ?>
                                <?php echo CHtml::link('Buy Now', array('products/Detail/', 'name' => $product->canonical_name), array('class' => 'buybtn')); ?>
                        <?php } else { ?>
                                <a class="buybtn" target="_blank" href="<?php echo $product->deal_link; ?>">Buy Now</a>
                        <?php } ?>
                </div>
        </div>



        <h2><?php echo CHtml::link($product->product_name, array('products/Detail/', 'name' => $product->canonical_name)); ?></h2>
        <div class="star">
                <ul>
                        <li><i class="fa stars fa-star"></i></li>
                        <li><i class="fa stars fa-star"></i></li>
                        <li><i class="fa stars fa-star"></i></li>
                        <li><i class="fa stars fa-star-o"></i></li>
                        <li><i class="fa stars fa-star-o"></i></li>
                </ul>
        </div>


        <div class="blocked">
                <div class="social">
                        <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        </ul>
                </div>

                <div class="price">
                        <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
                </div>
        </div>
</div>