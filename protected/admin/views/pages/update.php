<?php
/* @var $this PagesController */
/* @var $model Pages */
?>
<section class="content-header" style="margin-bottom: .5em">
        <h1>
                Pages        <small>Update</small>
        </h1>
        <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->request->baseurl . '/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
                <li class="active">Update Pages</li>
        </ol>
</section>
&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo Yii::app()->request->baseurl . '/admin.php/pages/admin'; ?>" class='btn  btn-laksyah manage'>Manage Pages</a>
<section class="content">
        <div class="box box-info">

                <div class="box-body">
                        <?php $this->renderPartial('_form', array('model' => $model)); ?>
                </div>

        </div>

</section><!-- form -->



