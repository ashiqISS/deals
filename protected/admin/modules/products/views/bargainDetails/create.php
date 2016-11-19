<?php
/* @var $this BargainDetailsController */
/* @var $model BargainDetails */
?>

<section class="content-header" style="margin-bottom: .5em">
    <h1>
       BargainDetails        <small>Create</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>BargainDetails</a></li>
        <li class="active">Create</li>
    </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseurl.'/bargainDetails/admin'; ?>" class='btn  btn-laksyah manage'>Manage BargainDetails</a>
<section class="content">

    <div class="box box-info">

        <div class="box-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>        </div>
    </div>
</section>
