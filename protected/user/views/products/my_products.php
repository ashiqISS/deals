


<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>My Products</h1>
                        </div>
                </div>
        </div>
</section>
<div class="container">
        <div class="row">
                <div class="col-xs-12">
                        <ul class="breadcrumb">
                                <li><a href="#"><i class="fa hom fa-home"></i></a></li>
                                <li><a href="#">Account</a></li>
                                <li><span class="last">My Products</span></li>
                        </ul>
                </div>
        </div>
</div>
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
                                <div class="comm">
                                        <div class="commission-1">
                                                <div class="head-1"><h2>Products</h2></div>
                                                <div class="head-1"><h2>Product Name</h2></div>
                                                <div class="head-1"><h2>price</h2></div>
                                                <div class="head-1"><h2>Description</h2></div>
                                        </div>
                                        <?php if (!empty($model)) {
                                                ?>
                                                <?php foreach ($model as $product) {
                                                        ?>
                                                        <div class="commission-2">
                                                                <?php $folder = Yii::app()->Upload->folderName(0, 1000, $product->id); ?>
                                                                <div class="head-1"><img class="maxs" src="<?= Yii::app()->baseUrl ?>/uploads/products/<?= $folder ?>/<?= $product->id; ?>/main.<?= $product->main_image; ?>"></div>
                                                                <div class="head-1"><h2><?= $product->product_name; ?></h2></div>
                                                                <div class="head-1"><h2><i class="fa rup fa-rupee"></i><?= $product->price; ?></h2></div>
                                                                <div class="head-2"><h2><?= $product->description; ?></h2></div>
                                                                <div class="head-2"><?php echo CHtml::link('clone', array('Products/CloneProduct', 'id' => $product->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                                                                <div class="head-2"><?php echo CHtml::link('edit', array('Products/EditProduct', 'id' => $product->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                                                                <div class="head-2"><?php echo CHtml::link('delete', array('Products/DeleteProduct', 'id' => $product->id), array('class' => 'outs-3 hvr-radial-out delete_product')); ?></div>
                                                        </div>
                                                <?php } ?>
                                                <?php
                                        } else {
                                                echo 'No Products Found!!!!';
                                        }
                                        ?>
                                        <?php
//                                        if (!empty($dataprovider) || $dataProvider != '') {
//                                                $this->widget('zii.widgets.CListView', array(
//                                                    'dataProvider' => $dataProvider,
//                                                    'itemView' => '_my_products',
//                                                ));
//                                        } else {
//
//                                        }
                                        ?>


                                </div>


                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>

<script>
        $(document).ready(function () {
                $(".delete_product").on('click', function()){
                        var answer = confirm("Are you want to delete?");
                        if (answer) {
                                //some code
                        }
                        else {
                                //some code
                        }
                }
        });

</script>



