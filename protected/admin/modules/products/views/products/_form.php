<?php
/* @var $this ProductsController */
/* @var $model Products */
/* @var $form CActiveForm */
?>
<style>
        .featured_details{
                margin-bottom: 25px;
        }
        .bot{
                margin-bottom: 25px;
        }
        .bargain{
                display: none;
        }
</style>
<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'products-form',
            'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data'),
            // Please note: When you enable ajax validation, make sure the corresponding
            // controller action is handling ajax validation correctly.
            // There is a call to performAjaxValidation() commented in generated controller code.
            // See class documentation of CActiveForm for details on this.
            'enableAjaxValidation' => false,
        ));
        ?>

        <p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->errorSummary($model); ?>
        <br/>
        <!--<div class="form-inline">-->
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'category_id'); ?>
                </div>
                <div class="col-sm-10">
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

                        <?php echo $form->error($model, 'category_id'); ?>

                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'product_name', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control slug')); ?>
                        <?php echo $form->error($model, 'product_name'); ?>
                </div>
        </div>


        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'canonical_name'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'canonical_name', array('size' => 60, 'maxlength' => 200, 'class' => 'form-control', 'readonly' => true)); ?>
                        <?php echo $form->error($model, 'canonical_name'); ?>
                </div>
        </div>


        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_code'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'product_code', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'product_code'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'product_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'product_type', array('' => "---Select Type---", '1' => "Deal Product", '2' => "Normal Product", '3' => "Coupon", '4' => "Bargain Product"), array('class' => 'form-control type_change')); ?>
                        <?php echo $form->error($model, 'product_type'); ?>
                </div>
        </div>
        <div class="bargain">
                <div class="form-group">
                        <div class="col-sm-2 control-label">
                                <?php echo $form->labelEx($model, 'admin_price'); ?>
                        </div>
                        <div class="col-sm-10">
                                <?php echo $form->textField($model, 'admin_price', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'admin_price'); ?>
                        </div>
                </div>
                <div class="form-group">
                        <div class="col-sm-2 control-label">
                                <?php echo $form->labelEx($model, 'bargain_price'); ?>
                        </div>
                        <div class="col-sm-10">
                                <?php echo $form->textField($model, 'bargain_price', array('class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'bargain_price'); ?>
                        </div>
                </div>
        </div>
        <div class="form-group deal_link" >

                <?php echo $form->labelEx($model, 'Deal/Coupon Link', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->textArea($model, 'deal_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                </div>
                <?php echo $form->error($model, 'deal_link'); ?>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'merchant', CHtml::listData(Merchant::model()->findAll(), 'id', 'first_name'), array('empty' => 'Admin', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'merchant_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'merchant_type', array('1' => "Admin", '2' => "Wholesale", '3' => "Retail", '4' => "Default"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'merchant_type'); ?>
                </div>
        </div>

        <div class="form-group">
                <?php echo $form->labelEx($model, 'description', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                        <?php
                        $this->widget('application.admin.extensions.eckeditor.ECKEditor', array(
                            'model' => $model,
                            'attribute' => 'description',
                        ));
                        ?>
                        <?php echo $form->error($model, 'description'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <label for="Products_category_id" >Product Features </label> </div>
                <div class="col-xs-12 col-sm-8">
                        <div class="row">
                                <?php if (!$model->isNewRecord) { ?>
                                        <?php $prod_features = ProductFeatures::model()->findAllByAttributes(array('product_id' => $model->id)); ?>
                                        <?php if (!empty($prod_features)) { ?>
                                                <?php
                                                $i = 1;
                                                foreach ($prod_features as $prod_feature) {
                                                        ?>
                                                        <div class = "featured_details" id = "f<?php echo $i; ?>"><div class = "col-sm-6 col-xs-12 "><input size = "60" maxlength = "150" class = "form-control" name = "ProductFeatures[feature_heading][]" placeholder = "Feature Heading" value="<?php echo $prod_feature->feature_heading; ?>" id = "Products_deal_location2" type = "text"></div><div class = "col-sm-6 col-xs-12 bot"><textarea rows = "2" cols = "50" class = "form-control" name = "ProductFeatures[feature_disc][]" placeholder = "Feature Descritpion" id = "Products_meta_description"><?php echo $prod_feature->feature_disc; ?></textarea></div></div>
                                                        <?php
                                                        $i++;
                                                }
                                        } else {
                                                ?>
                                                <div class = "featured_details" id = "f<?php echo $i; ?>"><div class = "col-sm-6 col-xs-12 "><input size = "60" maxlength = "150" class = "form-control" name = "ProductFeatures[feature_heading][]" placeholder = "Feature Heading" value="<?php echo $prod_feature->feature_heading; ?>" id = "Products_deal_location1" type = "text"></div><div class = "col-sm-6 col-xs-12 bot"><textarea rows = "2" cols = "50" class = "form-control" name = "ProductFeatures[feature_disc][]" placeholder = "Feature Descritpion" id = "Products_meta_description"><?php echo $prod_feature->feature_disc; ?></textarea></div></div>

                                                <?php
                                        }
                                } else {
                                        ?>
                                        <div class = "featured_details" id = "f1"><div class = "col-sm-6 col-xs-12 "><input size = "60" maxlength = "150" class = "form-control" name = "ProductFeatures[feature_heading][]" placeholder = "Feature Heading" id = "Products_deal_location4" type = "text"></div><div class = "col-sm-6 col-xs-12 bot"><textarea rows = "2" cols = "50" class = "form-control" name = "ProductFeatures[feature_disc][]" placeholder = "Feature Descritpion" id = "Products_meta_description"></textarea></div></div>
                                <?php } ?>
                                <div class="" id="file_tools"> </div>
                        </div>
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
                                        $('#file_tools').before('<div class="featured_details" id="f' + counter + '"><div class="col-sm-6 col-xs-12 "><input size="60" maxlength="150" class="form-control" name="ProductFeatures[feature_heading][]" placeholder="Feature Heading" id="Products_deal_location6" type="text"></div><div class="col-sm-6 col-xs-12 bot"><textarea rows="2" cols="50" class="form-control" name="ProductFeatures[feature_disc][]" placeholder="Feature Descritpion" id="Products_meta_description"></textarea></div></div>');
                                        $('#del_file').fadeIn(0);
                                        counter++;
                                }
                        });
                        $('#del_file').click(function () {
//                                alert();
//                                return false;
                                if (counter == 2) {
                                        $('#del_file').hide();
                                }


                                counter--;
                                $('#f' + counter).remove();
                        });
                </script>

        </div>


        <script>
                function doSomething(obj, res) { //the 'obj' is IMG tag, 'res' is base64image
                        var name = $("#image_instence").val();
                        $.ajax({
                                cache: false,
                                type: 'post',
                                url: '<?php echo Yii::app()->createUrl('products/Products/upload'); ?>',
//                                data: 'image=' + res,
                                data: {image: res, name: name},
                                success: function () {
                                        $("#image_set").val('2');
                                        obj.attr('src', res);
                                }
                        });
                }
        </script>
        <input type="hidden" name="image_set" id="image_set" />
        <input type="hidden" value="<?php echo $image_instence; ?>" name="image_instence" id="image_instence" />
        <!--<div class = "form-group">
        <?php echo $form->labelEx($model, 'Main Image ( image size : 250 X 141 )', array('class' => 'col-sm-2 control-label'));
        ?>
                <div class="col-sm-10">
        <?php
        $this->widget('admin.extensions.NavaJcrop.ImageJcrop', array(
            'config' => array(
                'title' => $model->main_image,
                'image' => $model->image_url, //required, all field below are not required.
                'id' => 'nava-jcrop',
                //'unique'=>true,
                'buttons' => array(
                    'cancel' => array(
                        'name' => 'Cancel',
                        'class' => 'button-crop',
                        'style' => 'margin-left: 5px;',
                    ),
                    /* 'edit'=>array(
                      'name'=>'Edit',
                      'class'=>'button-crop',
                      'style'=>'margin-left: 5px;',
                      ), */
                    'crop' => array(
                        'name' => 'Crop',
                        'class' => 'button-crop',
                        'style' => 'margin-left: 5px;',
                    )
                ),
                'options' => array(
                    'imageWidth' => 500,
                    'imageHeight' => 282,
                    'resultStyle' => 'position: fixed;top: 50px;max-width:350px;max-height:350px;z-index: 9999;',
                    'resultMaxWidth' => 350,
                    'resultMinWidth' => 350,
                ),
                'callBack' => array(
                    'success' => "function(obj,res){doSomething(obj,res);}",
                    'error' => "function(){alert('error');}",
                )
            )
        ));
        ?>
        <?php //echo $form->fileField($model, 'main_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <br />
        <?php
        if ($model->main_image != '' && $model->id != "") {
                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                echo '<img width="125"  height="70" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/medium' . '.' . $model->main_image . '" />';
        }
        ?>
                </div>
        <?php echo $form->error($model, 'main_image'); ?>
        </div>-->

        <div class="form-group">
                <?php echo $form->labelEx($model, 'Main Image ( image size : 250 X 141 )', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10"><?php echo $form->fileField($model, 'main_image', array('size' => 60, 'maxlength' => 100, 'class' => 'form-control')); ?>
                        <?php
                        if ($model->main_image != '' && $model->id != "") {
                                $folder = Yii::app()->Upload->folderName(0, 1000, $model->id);
                                echo '<img width="125" style="border: 2px solid #d2d2d2;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/main' . '.' . $model->main_image . '" />';
                        }
                        ?>
                </div>
                <?php echo $form->error($model, 'main_image'); ?>
        </div>


        <div class="form-group">
                <?php echo $form->labelEx($model, 'Gallery Images ( image size : 635 X 1248 )', array('class' => 'col-sm-2 control-label')); ?>
                <div class="col-sm-10">
                        <?php
                        $this->widget('CMultiFileUpload', array(
                            'name' => 'gallery_images',
                            'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                            'duplicate' => 'Duplicate file!', // useful, i think
                            'denied' => 'Invalid file type', // useful, i think
                        ));
                        ?>
                        <br />
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
                                                . ' <img style="width:75px; height:125px;" src="' . Yii::app()->baseUrl . '/uploads/products/' . $folder . '/' . $model->id . '/gallery/' . end($arry) . '"> </div>';
                                        }
                                }
                        }
                        ?>

                </div>

                <?php echo $form->error($model, 'gallery_images'); ?>
        </div>
        <br />
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'deal_location'); ?>
                </div>
                <?php echo $form->hiddenField($model, 'deal_location'); ?>
                <div class="col-sm-10">
                        <?php
                        $this->widget('application.admin.components.Location', array(
                            'type' => 'location',
                            'field_val' => $model->deal_location,
                            'category_tag_id' => 'Products_deal_location', /* id of hidden field */
                            'form_id' => 'products-form',
                        ));
                        ?>
                        <?php echo $form->error($model, 'search_tag'); ?>
                </div>
        </div>
        <!--        <div class="form-group">
                        <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'deal_location'); ?>
                        </div>
                        <div class="col-sm-10">
        <?php echo $form->textField($model, 'deal_location', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'deal_location'); ?>
                        </div>
                </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'meta_title'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'meta_title', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'meta_title'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'meta_description'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textArea($model, 'meta_description', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'meta_description'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'meta_keywords'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'meta_keywords', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'meta_keywords'); ?>
                </div>
        </div>





        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'brand'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'brand', CHtml::listData(MastersBrand::model()->findAll(), 'id', 'brand'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'brand'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'size'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'size', CHtml::listData(MastersSize::model()->findAll(), 'id', 'size'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'size'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'price'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'price', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'price'); ?>
                </div>
        </div>



        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'wholesale_price'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'wholesale_price', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'wholesale_price'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'wholesale_quantity'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'wholesale_quantity', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'wholesale_quantity'); ?>
                </div>
        </div>-

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_discount_available'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_discount_available', array('0' => "No", '1' => "Yes"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_discount_available'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'discount'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'discount', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'discount'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'discount_type'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'discount_type', array('1' => "Fixed", '0' => "Classic"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'discount_type'); ?>
                </div>
        </div>

        <!--<div class="form-group">
                <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'discount_rate'); ?>
                </div>
                <div class="col-sm-10">
        <?php echo $form->textField($model, 'discount_rate', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'discount_rate'); ?>
                </div>
        </div>-->

        <!-- <div class="form-group">
                 <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'Admin Deal Price'); ?>
                 </div>
                 <div class="col-sm-10">
        <?php echo $form->textField($model, 'deal_price', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'deal_price'); ?>
                 </div>
         </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'quantity'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'quantity', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'quantity'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'requires_shipping'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'requires_shipping', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'requires_shipping'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'shipping_rate'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'shipping_rate', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'shipping_rate'); ?>
                </div>
        </div>

        <!--   <div class="form-group">
                   <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'enquiry_sale'); ?>
                   </div>
                   <div class="col-sm-10">
        <?php echo $form->textField($model, 'enquiry_sale', array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'enquiry_sale'); ?>
                   </div>
           </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'new_from'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'new_from',
                            'value' => 'new_from',
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'new_from',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'new_from'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'new_to'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'new_to',
                            'value' => 'new_to',
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'new_to',
                            ),
                        ));
                        ?>
                        <?php echo $form->error($model, 'new_to'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'sale_from'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'sale_from',
                            'value' => 'sale_from',
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'sale_from',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'sale_from'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'sale_to'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'sale_to',
                            'value' => 'sale_to',
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'sale_to',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'sale_to'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'special_price_from'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'special_price_from',
                            'value' => 'special_price_from',
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'special_price_from',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'special_price_from'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'special_price_to'); ?>
                </div>
                <div class="col-sm-10">
                        <?php
                        $from = date('Y') - 2;
                        $to = date('Y') + 20;
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'special_price_to',
                            'value' => 'special_price_to',
                            'options' => array(
                                'dateFormat' => 'yy-mm-dd',
                                'changeYear' => true, // can change year
                                'changeMonth' => true, // can change month
                                'yearRange' => $from . ':' . $to, // range of year
                                'showButtonPanel' => true, // show button panel
                            ),
                            'htmlOptions' => array(
                                'size' => '10', // textField size
                                'maxlength' => '10', // textField maxlength
                                'class' => 'form-control',
                                'placeholder' => 'special_price_to',
                            ),
                        ));
                        ?><?php echo $form->error($model, 'special_price_to'); ?>
                </div>
        </div>
        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'tax'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'tax', CHtml::listData(MasterTaxClass::model()->findAll(array('condition' => 'status = 1')), 'id', 'tax_class_name'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'tax'); ?>
                </div>
        </div>

        <!-- <div class="form-group">
                 <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'gift_option'); ?>
                 </div>
                 <div class="col-sm-10">
        <?php echo $form->dropDownList($model, 'gift_option', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
        <?php echo $form->error($model, 'gift_option'); ?>
                 </div>
         </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'stock_availability'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'stock_availability', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'stock_availability'); ?>
                </div>
        </div>

        <!-- <div class="form-group">
                 <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'video_link'); ?>
                 </div>
                 <div class="col-sm-10">
        <?php echo $form->textField($model, 'video_link', array('size' => 60, 'maxlength' => 225, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'video_link'); ?>
                 </div>
         </div>

         <div class="form-group">
                 <div class="col-sm-2 control-label">
        <?php echo $form->labelEx($model, 'video'); ?>
                 </div>
                 <div class="col-sm-10">
        <?php echo $form->textField($model, 'video', array('size' => 60, 'maxlength' => 150, 'class' => 'form-control')); ?>
        <?php echo $form->error($model, 'video'); ?>
                 </div>
         </div>-->

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'weight'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->textField($model, 'weight', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'weight'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'weight_class'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo CHtml::activeDropDownList($model, 'weight_class', CHtml::listData(WeightClass::model()->findAll(), 'id', 'title'), array('empty' => '--Select--', 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'weight_class'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'status'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'status', array('1' => "Enabled", '0' => "Disabled"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>
        </div>



        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'search_tag'); ?>
                </div>
                <?php echo $form->hiddenField($model, 'search_tag'); ?>
                <div class="col-sm-10">
                        <?php
                        $this->widget('application.admin.components.TagSelect', array(
                            'type' => 'product',
                            'field_val' => $model->search_tag,
                            'category_tag_id' => 'Products_search_tag', /* id of hidden field */
                            'form_id' => 'products-form',
                        ));
                        ?>
                        <?php echo $form->error($model, 'search_tag'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'related_products'); ?>
                </div>
                <div class="col-sm-10">
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

                        <?php echo CHtml::activeDropDownList($model, 'related_products', CHtml::listData(Products::model()->findAll(), 'id', 'product_name'), array('empty' => '-Select-', 'class' => 'form-control', 'multiple' => true, 'options' => $related_products));
                        ?>
                        <?php echo $form->error($model, 'related_products'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_cod_available'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_cod_available', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_cod_available'); ?>
                </div>
        </div>


        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_featured'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_featured', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_featured'); ?>
                </div>
        </div>

        <div class="form-group">
                <div class="col-sm-2 control-label">
                        <?php echo $form->labelEx($model, 'is_admin_approved'); ?>
                </div>
                <div class="col-sm-10">
                        <?php echo $form->dropDownList($model, 'is_admin_approved', array('1' => "Yes", '0' => "No"), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'is_admin_approved'); ?>
                </div>
        </div>



        <!--</div>-->
        <div class="box-footer">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-laksyah pos', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->

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