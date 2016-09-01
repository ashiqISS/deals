<?php if (!empty($data)) {
        ?>
        <?php foreach ($data as $product) {
                ?>
                <div class="commission-2">
                        <?php $folder = Yii::app()->Upload->folderName(0, 1000, $product->id); ?>
                        <div class="head-1"><img class="maxs" src="<?= Yii::app()->baseUrl ?>/uploads/products/<?= $folder ?>/<?= $product->id; ?>/<?= $product->id; ?>.<?= $product->main_image; ?>"></div>
                        <div class="head-1"><h2><?= $product->product_name; ?></h2></div>
                        <div class="head-1"><h2><i class="fa rup fa-rupee"></i><?= $product->price; ?></h2></div>
                        <div class="head-2"><h2><?= $product->description; ?></h2></div>
                        <div class="head-2"><?php echo CHtml::link('clone', array('Products/CloneProduct', 'id' => $product->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                        <div class="head-2"><?php echo CHtml::link('edit', array('Products/EditProduct', 'id' => $product->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                        <div class="head-2"><?php echo CHtml::link('delete', array('Products/DeleteProduct', 'id' => $product->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                </div>
        <?php } ?>
        <?php
} else {
        echo 'No Products Found!!!!';
}
?>