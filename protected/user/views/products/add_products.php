<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/jquery.appear.js"></script>
<script type="text/javascript" src="<?= Yii::app()->baseUrl ?>/js/count-to.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/classie.js"></script>
<script src="<?= Yii::app()->baseUrl ?>/js/slick.min.js"></script>
<link href="<?= Yii::app()->baseUrl ?>/css/hover.css" rel="stylesheet" media="all">
<section class="title">
        <div class="container">
                <div class="row">
                        <div class="col-xs-12">
                                <h1>Add Products</h1>
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
                                <li><span class="last">Add Products</span></li>

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

                                <?php
                                $form = $this->beginWidget('CActiveForm', array(
                                    'id' => 'products-form',
                                    'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                    'enableAjaxValidation' => false,
                                ));
                                ?>
                                <div class="accountsettings">
                                        <?php if (Yii::app()->user->hasFlash('success')): ?>
                                                <div class="alert alert-success">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>Success!</strong> <?php echo Yii::app()->user->getFlash('success'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <?php if (Yii::app()->user->hasFlash('error')): ?>
                                                <div class="alert alert-danger">
                                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                                        <strong>Sorry!</strong> <?php echo Yii::app()->user->getFlash('error'); ?>
                                                </div>
                                        <?php endif; ?>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'category_id'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                if (!$model->isNewRecord) {
                                                                        if (!empty($model->category_id)) {
                                                                                $ids = explode(',', $model->category_id);
                                                                                $selected = array();
                                                                                foreach ($ids as $id) {
                                                                                        $selected[$id] = array('selected' => true);
                                                                                }
                                                                        }
                                                                }
                                                                ?>
                                                                <?php echo $form->hiddenField($model, 'category_id'); ?>
                                                                <?php
                                                                $this->widget('application.admin.components.CatSelect', array(
                                                                    'type' => 'category',
                                                                    'field_val' => $model->category_id,
                                                                    'category_tag_id' => 'Products_category_id', /* id of hidden field */
                                                                    'form_id' => 'products-form',
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'category_id', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'product_name'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'product_name', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'product_name', array('class' => 'red')); ?>                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'product_code'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'product_code', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'product_code', array('class' => 'red')); ?>                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'brand_id'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo CHtml::activeDropDownList($model, 'brand_id', CHtml::listData(MastersBrand::model()->findAll(), 'id', 'brand_name'), array('empty' => '--Brand--', 'class' => 'form-select')); ?>
                                                                <?php echo $form->error($model, 'brand_id', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set ">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'product_type'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->dropDownList($model, 'product_type', array('' => "---Select Type---", '1' => "Deal Product", '2' => "Normal Product", '3' => "Coupon"), array('class' => 'form-select type_change')); ?>
                                                                <?php echo $form->error($model, 'product_type'); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set deal_link">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'deal_link'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textArea($model, 'deal_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-acc')); ?>
                                                                <?php echo $form->error($model, 'deal_link'); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'price'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'price', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'price', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'wholesale_price'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'wholesale_price', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'wholesale_price', array('class' => 'red')); ?>                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'description'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'description',
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'description', array('class' => 'red')); ?>                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'Main Image ( image size : 322 X 500 )'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->fileField($model, 'main_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-set', 'placeholder' => 'Main Image')); ?>
                                                                <?php
                                                                if ($model->main_image != '' && $model->id != "") {
                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                                                        echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/main.' . $model->main_image . '" />';
                                                                }
                                                                ?>
                                                                <?php echo $form->error($model, 'main_image', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"><?php echo $form->labelEx($model, 'Gallery Images ( image size : 3016 X 4030 )<br>', array('class' => ' control-label')); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $this->widget('CMultiFileUpload', array(
                                                                    'name' => 'gallery_images',
                                                                    'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                                                                    'duplicate' => 'Duplicate file!', // useful, i think
                                                                    'denied' => 'Invalid file type', // useful, i think
                                                                    'htmlOptions' => array('class' => 'form-set'),
                                                                ));
                                                                ?>

                                                                <?php
                                                                if (!$model->isNewRecord) {
                                                                        $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);

                                                                        // $path = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/big';

                                                                        $path = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/big';


                                                                        $path2 = Yii::getPathOfAlias('webroot') . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/';


                                                                        foreach (glob("{$path}/*") as $file) {

                                                                                $info = pathinfo($file);
                                                                                $file_name = basename($file, '.' . $info['basename']);

                                                                                //  var_dump($file_name);



                                                                                if ($file != '') {
                                                                                        $arry = explode('/', $file);
                                                                                        echo '<div style="float:left;margin:5px;position:relative;">'
                                                                                        . '<a style="position:absolute;top:43%;left:40%;color:red;" href="' . Yii::app()->baseUrl . '/admin.php/products/products/NewDelete?id=' . $model->id . '&path=' . $file_name . '"><i class="glyphicon glyphicon-trash"></i></a>'
                                                                                        . ' <img style="width:100px;height:100px;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/' . end($arry) . '"> </div>';
                                                                                }
                                                                        }
                                                                }
                                                                ?>
                                                                <?php echo $form->error($model, 'gallery_images', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'quantity'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'quantity', array('class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'quantity', array('class' => 'red')); ?>                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'weight_class'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo CHtml::activeDropDownList($model, 'weight_class', CHtml::listData(WeightClass::model()->findAll(), 'id', 'title'), array('empty' => '--Weight Class--', 'class' => 'form-set')); ?>
                                                                <?php echo $form->error($model, 'weight_class', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'sale_from'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'sale_from',
                                                                    'value' => 'sale_from',
                                                                    'options' => array(
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set',
                                                                        'placeholder' => 'sale_from',
                                                                    ),
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'sale_from', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'sale_to'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'sale_to',
                                                                    'value' => 'sale_to',
                                                                    'options' => array(
                                                                        'minDate' => '0', // this will disable previous dates from datepicker
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set',
                                                                        'placeholder' => 'Sale to',
                                                                    ),
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'sale_to', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'new_from'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'new_from',
                                                                    'value' => 'new_from',
                                                                    'options' => array(
                                                                        'minDate' => '0', // this will disable previous dates from datepicker
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set',
                                                                        'placeholder' => 'New From',
                                                                    ),
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'new_from', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'new_to'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'new_to',
                                                                    'value' => 'new_to',
                                                                    'options' => array(
                                                                        'minDate' => '0', // this will disable previous dates from datepicker
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set', 'placeholder' => 'Email', 'placeholder' => 'Email',
                                                                        'placeholder' => 'New To',
                                                                    ),
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'new_to', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'discount_type'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->dropDownList($model, 'discount_type', array('0' => "Classic", '1' => "Fixed"), array('class' => 'form-select', 'empty' => '--Discount Type--')); ?>
                                                                <?php echo $form->error($model, 'discount_type', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'discount_rate'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'discount_rate', array('class' => 'form-set', 'placeholder' => 'Discount Rate')); ?>
                                                                <?php echo $form->error($model, 'discount_rate', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'special_price_from'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'special_price_from',
                                                                    'value' => 'special_price_from',
                                                                    'options' => array(
                                                                        'minDate' => '0', // this will disable previous dates from datepicker
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set',
                                                                        'placeholder' => 'Special Price From',
                                                                    ),
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'special_price_from', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'special_price_to'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                $from = date('Y') - 2;
                                                                $to = date('Y') + 20;
                                                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                    'model' => $model,
                                                                    'attribute' => 'special_price_to',
                                                                    'value' => 'special_price_to',
                                                                    'options' => array(
                                                                        'minDate' => '0', // this will disable previous dates from datepicker
                                                                        'dateFormat' => 'dd-mm-yy',
                                                                        'changeYear' => true, // can change year
                                                                        'changeMonth' => true, // can change month
                                                                        'yearRange' => $from . ':' . $to, // range of year
                                                                        'showButtonPanel' => true, // show button panel
                                                                    ),
                                                                    'htmlOptions' => array(
                                                                        'size' => '10', // textField size
                                                                        'maxlength' => '10', // textField maxlength
                                                                        'class' => 'form-set',
                                                                        'placeholder' => 'Special Price To',
                                                                    ),
                                                                ));
                                                                ?>
                                                                <?php echo $form->error($model, 'special_price_to', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'canonical_name'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'canonical_name', array('class' => 'form-set', 'placeholder' => 'Canonical Name')); ?>
                                                                <?php echo $form->error($model, 'canonical_name', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'meta_title'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textField($model, 'meta_title', array('class' => 'form-set', 'placeholder' => 'Meta Title')); ?>
                                                                <?php echo $form->error($model, 'meta_title', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'meta_keywords'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textArea($model, 'meta_keywords', array('class' => 'form-set', 'placeholder' => 'Meta Keyword')); ?>
                                                                <?php echo $form->error($model, 'meta_keywords', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'meta_description'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textArea($model, 'meta_description', array('class' => 'form-acc', 'placeholder' => 'Meta Description')); ?>
                                                                <?php echo $form->error($model, 'meta_description', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'sort_order'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->textArea($model, 'sort_order', array('class' => 'form-set', 'placeholder' => 'Sort Order')); ?>
                                                                <?php echo $form->error($model, 'sort_order', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'requires_shipping'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php echo $form->dropDownList($model, 'requires_shipping', array('0' => "No", '1' => "Yes"), array('class' => 'form-select', 'placeholder' => 'Requires Shipping', 'empty' => '--Requires Shipping--')); ?>
                                                                <?php echo $form->error($model, 'requires_shipping', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'tax'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->textField($model, 'tax', array('class' => 'form-set', 'placeholder' => 'Tax')); ?>
                                                                <?php echo $form->error($model, 'tax', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'gift_option'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->dropDownList($model, 'gift_option', array('0' => "No", '1' => "Yes"), array('class' => 'form-select', 'placeholder' => 'Gift Option', 'empty' => '--Gift Option--')); ?>
                                                                <?php echo $form->error($model, 'gift_option', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'stock_availability'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->dropDownList($model, 'stock_availability', array('0' => "No", '1' => "Yes"), array('class' => 'form-select', 'empty' => 'Stock Availability')); ?>
                                                                <?php echo $form->error($model, 'stock_availability', array('class' => 'red')); ?>

                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'video_link'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->textField($model, 'video_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-set', 'placeholder' => 'Video Link')); ?>
                                                                <?php echo $form->error($model, 'video_link', array('class' => 'red')); ?>

                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'exchange'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->dropDownList($model, 'exchange', array('0' => "No", '1' => "Yes"), array('class' => 'form-select', 'empty' => 'Exchange')); ?>
                                                                <?php echo $form->error($model, 'exchange', array('class' => 'red')); ?>

                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'Products_search_tag'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">

                                                                <?php echo $form->hiddenField($model, 'search_tag'); ?>
                                                                <div>
                                                                        <?php
                                                                        $this->widget('application.admin.components.TagSelect', array(
                                                                            'type' => 'product',
                                                                            'field_val' => $model->search_tag,
                                                                            'category_tag_id' => 'Products_search_tag', /* id of hidden field */
                                                                            'form_id' => 'products-form',
                                                                        ));
                                                                        ?>
                                                                        <?php echo $form->error($model, 'search_tag', array('class' => 'red')); ?>

                                                                </div>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> <?php echo $form->labelEx($model, 'related_products'); ?></label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">
                                                        <div class="form-group">
                                                                <?php
                                                                if (!is_array($model->related_products)) {
                                                                        $myArray = explode(',', $model->related_products);
                                                                } else {
                                                                        $myArray = $model->related_products;
                                                                }


                                                                $related_products = array();

                                                                foreach ($myArray as $value) {
                                                                        $related_products[$value] = array('selected' => 'selected');
                                                                }
                                                                ?>

                                                                <?php echo CHtml::activeDropDownList($model, 'related_products', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-select', 'placeholder' => 'Related Products', 'multiple' => true, 'options' => $related_products));
                                                                ?>
                                                                <?php echo $form->error($model, 'related_products', array('class' => 'red')); ?>
                                                        </div>
                                                </div>
                                        </div>


                                        <div class="ui-set">
                                                <div class="settings1">
                                                        <div class="form-group">
                                                                <label class="set"> Product Features </label>
                                                        </div>
                                                </div>
                                                <div class="settings2">
                                                        <span>:</span>
                                                </div>
                                                <div class="settings3">

                                                        <?php if (!$model->isNewRecord) { ?>
                                                                <?php $prod_features = ProductFeatures::model()->findAllByAttributes(array('product_id' => $model->id)); ?>
                                                                <?php if (!empty($prod_features)) { ?>
                                                                        <?php
                                                                        $i = 1;
                                                                        foreach ($prod_features as $prod_feature) {
                                                                                ?>
                                                                                <div class = "featured_details" id = "f<?php echo $i; ?>"><div class="form-group"><input size = "60" class="form-set" maxlength = "150"  name = "ProductFeatures[feature_heading][]" placeholder = "Feature Heading" value="<?php echo $prod_feature->feature_heading; ?>" id = "Products_deal_location" type = "text"></div><div class = "bot"><textarea  class="form-acc" name = "ProductFeatures[feature_disc][]" placeholder = "Feature Descritpion" id = "Products_meta_description"><?php echo $prod_feature->feature_disc; ?></textarea></div></div>
                                                                                <?php
                                                                                $i++;
                                                                        }
                                                                } else {
                                                                        ?>
                                                                        <div class = "featured_details" id = "f<?php echo $i; ?>"><div class="form-group"><input size = "60" maxlength = "150" class="form-set" name = "ProductFeatures[feature_heading][]" placeholder = "Feature Heading" value="<?php echo $prod_feature->feature_heading; ?>" id = "Products_deal_location" type = "text"></div><div class = "bot"><textarea class="form-acc"   name = "ProductFeatures[feature_disc][]" placeholder = "Feature Descritpion" id = "Products_meta_description"><?php echo $prod_feature->feature_disc; ?></textarea></div></div>

                                                                        <?php
                                                                }
                                                        } else {
                                                                ?>
                                                                <div class = "featured_details" id = "f1"><div class="form-group"><input size = "60" maxlength = "150" class = "form-set" name = "ProductFeatures[feature_heading][]" placeholder = "Feature Heading" id = "Products_deal_location" type = "text"></div><div class = " bot"><textarea class="
                                                                                                                                                                                                                form-acc" name = "ProductFeatures[feature_disc][]" placeholder = "Feature Descritpion" id = "Products_meta_description"></textarea></div></div>
                                                                                                                                                                                                                                                                                                                                                      <?php } ?>
                                                        <div class="" id="file_tools"> </div>

                                                </div>
                                                <div class="col-sm-2 col-xs-12 ">
                                                        <i class="fa fa-plus-circle" id="add_file" style="font-size: 18px; margin-top: 20px; cursor: pointer;"></i>
                                                        <i class="fa fa-minus-circle " id="del_file" style="font-size: 18px; margin-top: 20px; cursor: pointer;"></i>
                                                </div>
                                                <script>
<?php
if (!$model->isNewRecord) {
        if (count($prod_features) > 1) {
                ?>
                                                                        var counter = <?php echo count($prod_features); ?>;

        <?php } else {
                ?>
                                                                        var counter = 2;
                <?php
        }
} else {
        ?>
                                                                var counter = 2;
<?php } ?>

                                                        //$('#del_file').hide();
                                                        $('#add_file').click(function () {
                                                                if (counter < 50)
                                                                {
                                                                        $('#file_tools').before('<div class="featured_details" id="f' + counter + '"><div class="col-sm-6 col-xs-12 "><input size="60" maxlength="150" class="form-control" name="ProductFeatures[feature_heading][]" placeholder="Feature Heading" id="Products_deal_location" type="text"></div><div class="col-sm-6 col-xs-12 bot"><textarea rows="2" cols="50" class="form-control" name="ProductFeatures[feature_disc][]" placeholder="Feature Descritpion" id="Products_meta_description"></textarea></div></div>');
                                                                        $('#del_file').fadeIn(0);
                                                                        counter++;
                                                                }
                                                        });
                                                        $('#del_file').click(function () {
                                                                if (counter == 2) {
                                                                        $('#del_file').hide();
                                                                }


                                                                counter--;
                                                                $('#f' + counter).remove();
                                                        });
                                                </script>

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
                        <div class="col-lg-3 col-md-4 mbb hidden-xs hidden-sm">
                                <?php echo $this->renderPartial('_rightMenu'); ?>
                        </div>
                </div>
        </div>
</section>


<script>
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

</script>
