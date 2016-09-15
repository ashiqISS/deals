<?php
/* @var $this MasterTaxClassController */
/* @var $model MasterTaxClass */
?>

<section class="content-header">
    <h1>
        MasterTaxClass    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo Yii::app()->request->baseurl.'/site/home'; ?>"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li class="active">MasterTaxClass</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <a href="<?php echo Yii::app()->request->baseurl.'/master/masterTaxClass/create'; ?>" class='btn  btn-laksyah'>Add New MasterTaxClass</a>
    <div class="col-xs-12 form-page" style="margin-top: .5em;">
        <div class="box">

            <?php $this->widget('booster.widgets.TbGridView', array(
            'type' => ' bordered condensed hover',
            'id'=>'master-tax-class-grid',
            'dataProvider'=>$model->search(),
            'filter'=>$model,
            'columns'=>array(
            		'id',
		'tax_class_name',
		'tax_rate',
		'doc',
		'dou',
		'cb',
		/*
		'ub',
		'status',
		*/
            array(
            'header' => '<font color="#61625D">Edit</font>',
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{update}',
            ),
            array(
            'header' => '<font color="#61625D">Delete</font>',
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{delete}',
            ),
            array(
            'header' => '<font color="#61625D">View</font>',
            'htmlOptions' => array('nowrap' => 'nowrap'),
            'class' => 'booster.widgets.TbButtonColumn',
            'template' => '{view}',
            ),

            ),
            )); ?>
        </div>

    </div>


</div>
</section>

