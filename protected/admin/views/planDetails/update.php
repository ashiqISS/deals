<?php
/* @var $this PlanDetailsController */
/* @var $model PlanDetails */
?>
<section class="content-header" style="margin-bottom: .5em">
        <h1>
                Plan Details        <small>Update</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Update Plan Details</li>
        </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseurl . '/admin.php/planDetails/admin'; ?>" class='btn  btn-laksyah manage'>Manage Plan Details</a>
<section class="content">
        <div class="box box-info">

                <div class="box-body">
                        <?php $this->renderPartial('_form', array('model' => $model)); ?>
                </div>

        </div>

</section><!-- form -->



