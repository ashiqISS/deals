


<section class="content-header">
        <h1>
                Order                <small>Create</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>"><i class="fa fa-dashboard"></i>  Order</a></li>
                <li class="active">create</li>
        </ol>
</section>


<a href="<?php echo Yii::app()->request->baseUrl . '/admin.php/products/order/admin'; ?>" class='btn  btn-laksyah manage'>Manage Order</a>
<section class="content">
        <div class="box box-info">

                <div class="box-body">
                        <?php $this->renderPartial("_form", array("model" => $model)); ?>
                </div>


        </div>

</section><!-- form -->