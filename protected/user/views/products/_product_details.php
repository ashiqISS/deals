<div class="product_details">
    <div class="deals-effect">
        <?php if ($product->main_image != "") { ?>
                <img class="zoom"  src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/<?php
                echo Yii::app()->Upload->folderName(0, 1000, $product->id)
                ?>/<?php echo $product->id; ?>/medium.<?php echo $product->main_image; ?>" alt=""/>
             <?php } ?>

        <div class="overlay"></div>
        <div class="buy">
            <?php if ($product->product_type == 2 || $product->product_type == 4) { ?>
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
                <li><a id="shareBtn_<?php echo $i ?>" ><i class="fa fa-facebook"></i></a></li>
                <li><a href="javascript:window.open('https://twitter.com/home?status=<?php echo "http://" . $_SERVER['SERVER_NAME'] . yii::app()->baseUrl . '/index.php/products?name=' . $product->canonical_name; ?>','mywindowtitle','width=500,height=150')"><i class="fa fa-twitter"></i></a></li>
                <li><a href="javascript:window.open('https://plus.google.com/share?url=<?php echo "http://" . $_SERVER['SERVER_NAME'] . yii::app()->baseUrl . '/index.php/products?name=' . $product->canonical_name; ?>','mywindowtitle','width=500,height=150')"><i class="fa fa-google-plus"></i></a></li>

            </ul>
            <!--                        <ul>
                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>-->
        </div>

        <div class="price">
            <h3><?php echo Yii::app()->Discount->Discount($product); ?></h3>
        </div>
    </div>
</div>
<div class="modal fade" id="success_social" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><img class="tick" src="<?php echo yii::app()->request->baseUrl; ?>/images/tick.png">Success</h4>
            </div>
            <div class="modal-body">
                <p>Success: You have Shared <strong><?php echo $product->product_name; ?></strong> to your Social Site!</p>
            </div>

        </div>

    </div>
</div>
<div class="modal fade" id="success_social_fail" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><img class="tick" src="<?php echo yii::app()->request->baseUrl; ?>/images/wrong.png">Failed</h4>
            </div>
            <div class="modal-body">
                <p>Failed: You have Allready Shared <strong><?php echo $product->product_name; ?></strong> to your Social Site!</p>
            </div>

        </div>

    </div>
</div>
<script>
        window.fbAsyncInit = function () {
            FB.init({
                appId: '166556653788041',
                xfbml: true,
                version: 'v2.7'
            });
        };

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
</script>
<script>
        document.getElementById('shareBtn_<?php echo $i ?>').onclick = function () {
            FB.ui({
                method: 'share',
                display: 'popup',
//              action_type: 'og.likes',
                href: '<?php echo "http://" . $_SERVER['SERVER_NAME'] . yii::app()->baseUrl . '/index.php/products?name=' . $product->canonical_name; ?>',
//                action_properties: JSON.stringify({
//                    object: 'https://developers.facebook.com/docs/',
//                })
            }, function (response) {
                $.ajax({
                    type: "POST",
                    data: {'product':<?php echo $product->id ?>, 'social': '1'},
                    url: baseurl + 'Products/share',
                    success: function (data) {
                        if (data == "Failed") {
                            $('#success_social_fail').modal('show');
                        } else {
                            $('#success_social').modal('show');
                        }
                    },
                });
            });
        }
</script>