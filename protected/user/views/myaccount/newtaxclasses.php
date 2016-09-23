<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/count-to.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<?php echo $this->renderPartial('//myaccount/_breadcremb'); ?>
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
                                                        <?php echo $this->renderPartial('//myaccount/_rightMenu'); ?>
                                                </div>
                                        </div>


                                </div>


                        </div>
                        <div class="col-lg-9 col-md-8">

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'products-form',
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <div class="accountsettings">

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'tax_class_name'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'tax_class_name', array('size' => 60, 'maxlength' => 250, 'class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'tax_class_name'); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'tax_rate'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                if (!is_array($model->tax_rate)) {
                                                                        $myArray = explode(',', $model->tax_rate);
                                                                } else {
                                                                        $myArray = $model->tax_rate;
                                                                }


                                                                $related_products = array();

                                                                foreach ($myArray as $value) {
                                                                        $related_products[$value] = array('selected' => 'selected');
                                                                }
                                                                ?>

                                                                <?php echo CHtml::activeDropDownList($model, 'tax_rate', CHtml::listData(MaterTaxRates::model()->findAll(array('condition' => 'status = 1')), 'id', 'tax_name'), array('empty' => '--please select--', 'class' => 'form-select', 'multiple' => true, 'options' => $related_products)); ?>
                                                                <?php echo $form->error($model, 'tax_rate'); ?>                                                   </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'status'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-select')); ?>
                                                                <?php echo $form->error($model, 'status'); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="btn-place-1">
                                                <a href="#" class="reward hvr-shutter-in-horizontal left-btns">Back</a>
                                        </div>
                                        <div class="btn-place-2">
                                                <button type="submit"  name="btn_submit" class="reward hvr-shutter-in-horizontal3 right-btn">Continue</button>
                                        </div>
                                        <!-- form -->
                                        <?php $this->endWidget(); ?>
                                </div>

                        </div>
                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('//myaccount/_rightMenu'); ?>
                        </div>
                </div>
</section>
<script>
        $(document).ready(function () {
                $('.slug').keyup(function () {
                        $('#Products_canonical_name').val(slug($(this).val()));
                });


        });
        $(document).ready(function () {
                var name1 = $(".type_change").val();
                if (name1 == 1 || name1 == 3) {
                        $(".deal_link").show();
                } else {
                        $(".deal_link").hide();

                }
                if (name == 4) {
                        $(".bargain").show();
                } else {
                        $(".bargain").hide();

                }
                $(".type_change").change(function () {
                        var name = $(this).val();
                        if (name == 1 || name == 3) {
                                $(".deal_link").show();
                        } else {
                                $(".deal_link").hide();

                        }
                        if (name == 4) {
                                $(".bargain").show();
                        } else {
                                $(".bargain").hide();

                        }

                });


        });
        var slug = function (str) {
                var $slug = '';
                var trimmed = $.trim(str);
                $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
                        replace(/-+/g, '-').
                        replace(/^-|-$/g, '');
                return $slug.toLowerCase();
        };

</script>

<!--<script>
        $(document).ready(function () {
                var name1 = $(".type_change").val();
                if (name1 == 1 || name1 == 3) {
                        $(".deal_link").show();
                } else {
                        $(".deal_link").hide();

                }
                $(".type_change").change(function () {
                        var name = $(this).val();
                        if (name == 1 || name == 3) {
                                $(".deal_link").show();
                        } else {
                                $(".deal_link").hide();

                        }
                });


        });

</script>-->
