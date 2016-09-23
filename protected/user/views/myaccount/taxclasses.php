<?php echo $this->renderPartial('_breadcremb'); ?>
<style>
        .hvr-shutter-in-horizontal {
                display: inline-block;
                vertical-align: middle;
                -webkit-transform: translateZ(0);
                transform: translateZ(0);
                box-shadow: 0 0 1px rgba(0, 0, 0, 0);
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -moz-osx-font-smoothing: grayscale;
                position: relative;
                background: #2098d1;
                -webkit-transition-property: color;
                transition-property: color;
                -webkit-transition-duration: 0.3s;
                transition-duration: 0.3s;
        }
        .reward {
                /* display: inline-block; */
                /* vertical-align: middle; */
                margin: 0;
                padding: 1em;
                cursor: pointer;
                text-decoration: none;
                color: #FFF;
                -webkit-tap-highlight-color: rgba(0,0,0,0);
                border: 1px solid #b3b3b3;
        }
        .left-btns {
                float: left;
                color: #fff !important;
                background-color: #e8820b !important;
                font-family: 'Lato', sans-serif;
                min-width: 108px;
                text-align: center;
        }
</style>
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
                                </div>
                        </div>

                        <div class="col-lg-9 col-md-8">
                                <div class="accountsettings">

                                        <div class="form">

                                                <?php if (Yii::app()->session['merchant']) { ?>
                                                        <?php if (Yii::app()->user->hasFlash('taxsuccess')): ?>
                                                                <div class="alert alert-success">
                                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('taxsuccess'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                                <div class="alert alert-danger">
                                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                                        <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                                </div>
                                                        <?php endif; ?>
                                                        <?php if (!empty($models)) { ?>


                                                                <div class="btn-place-1">
                                                                        <?php echo CHtml::link('Add New Tax Classes', array('Myaccount/NewTaxClasses'), array('class' => 'reward hvr-shutter-in-horizontal left-btns')); ?>
                                                                </div>
                                                                <br />
                                                                <br />
                                                                <br />
                                                                <span class="recentorders">Available Tax Classes</span>
                                                                <div class="comm">

                                                                        <div class="commission-1">
                                                                                <div class="head-3"><h2>Tax Class Name</h2></div>
                                                                                <div class="head-3"><h2>Taxes With Rate </h2></div>
                                                                                <div class="head-3"><h2>Status</h2></div>
                                                                                <!--                                                                                <div class="head-1"><h2>Duration</h2></div>
                                                                                                                                                                <div class="head-1"><h2>Product Limit</h2></div>-->
                                                                                <!--<div class="head-1"><h2>Quantity</h2></div>-->

                                                                                <div class="head-1"><h2></h2></div>
                                                                                <div class="head-1"><h2></h2></div>

                                                                        </div>
                                                                        <?php
                                                                        foreach ($models as $model) {
                                                                                ?>
                                                                                <div class="commission-2">
                                                                                        <div class="head-3"><h2><?= $model->tax_class_name; ?></h2></div>
                                                                                        <div class="head-3"><h2><?php
                                                                                                        $values = explode(',', $model->tax_rate);

                                                                                                        foreach ($values as $value) {
                                                                                                                $tax_rate = MaterTaxRates::model()->findByPk($value);
                                                                                                                if ($tax_rate->type == 1) {
                                                                                                                        $percentage = '%';
                                                                                                                } else {
                                                                                                                        $percentage = '';
                                                                                                                }
                                                                                                                echo $tax_rate->tax_name . ' (' . (int) ($tax_rate->tax_rate) . $percentage . ')<br />';
                                                                                                        }
                                                                                                        ?></h2></div>
                                                                                        <div class="head-3"><h2><?php
                                                                                                        if ($model->status == 1) {
                                                                                                                echo 'Enable';
                                                                                                        } else {
                                                                                                                echo 'Desable';
                                                                                                        }
                                                                                                        ?></h2></div>
                        <!--                                                                                        <div class="head-1"><h2><?= $allplan->no_of_days; ?></h2></div>
                                                                                        <div class="head-1"><h2><?= $allplan->no_of_products; ?></h2></div>-->

                                                                                        <?php if ($model->cb_type == 2 && $model->cb == Yii::app()->session['merchant']['id']) { ?>


                                                                                                <div class = "head-1"><h2><?php echo CHtml::link('<i class="fa fa-pencil"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('Myaccount/UpdateTaxClasses', 'tax' => CHtml::encode($model->id)), array('data-toggle' => 'tooltip', 'title' => 'Edit Your Tax Classes'));
                                                                                                ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo CHtml::link('<i class="fa fa-trash"  style="max-width:15%;font-size: 24px;
    color: #000;"></i>', array('Myaccount/DeleteTaxClasses', 'tax' => CHtml::encode($model->id)), array('data-toggle' => 'tooltip', 'title' => 'Delete Tax Classes')); ?></h2></div>
                                                                                        <?php } ?>
                                                                                </div>
                                                                        <?php }
                                                                        ?>
                                                                </div>
                                                        <?php }
                                                        ?>


                                                <?php } ?>

                                        </div><!-- form -->



                                </div>
                        </div>

                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>