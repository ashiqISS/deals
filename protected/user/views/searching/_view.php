<div class="col-sm-4 col-xs-6" >

        <div class="commission-2">
                <?php $folder = Yii::app()->Upload->folderName(0, 1000, $data->id); ?>
                <?php if ($data->main_image == '') { ?>
                        <div class="head-1"><img class="maxs" src="<?= Yii::app()->baseUrl ?>/uploads/products/<?= $folder ?>/<?= $data->id; ?>/<?= $data->id; ?>.<?= $product->main_image; ?>"></div>

                <?php } else { ?>
                        <div class="head-1"><img class="maxs" src="<?php echo Yii::app()->request->baseUrl; ?>/uploads/products/no-productimage.jpg"></div>
                <?php } ?>
                <div class="head-1"><h2><?= $data->product_name; ?></h2></div>
                <div class="head-1"><h2><i class="fa rup fa-rupee"></i><?= $data->price; ?></h2></div>
                <div class="head-2"><h2><?= $data->description; ?></h2></div>
                <div class="head-2"><?php echo CHtml::link('clone', array('Products/CloneProduct', 'id' => $data->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                <div class="head-2"><?php echo CHtml::link('edit', array('Products/EditProduct', 'id' => $data->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
                <div class="head-2"><?php echo CHtml::link('delete', array('Products/DeleteProduct', 'id' => $data->id), array('class' => 'outs-3 hvr-radial-out')); ?></div>
        </div>

</div>
