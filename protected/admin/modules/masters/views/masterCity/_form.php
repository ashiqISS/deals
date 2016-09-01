<?php
/* @var $this MasterCityController */
/* @var $model MasterCity */
/* @var $form CActiveForm */
?>

<div class="form">

        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'master-city-form',
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
        <div class="form-inline">
                <div class="form-group">
                        <?php echo $form->labelEx($model, 'country_id'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'country_id', CHtml::listData(MasterCountry::model()->findAllByAttributes(array('status' => 1)), 'id', 'country'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'country_id'); ?>
                </div>

                <div class="form-group"> 
                        <?php echo $form->labelEx($model, 'state_id'); ?>
                        <?php echo CHtml::activeDropDownList($model, 'state_id', CHtml::listData(MasterState::model()->findAllByAttributes(array('status' => 1)), 'id', 'state'), array('empty' => '--please select--', 'class' => 'form-control', 'options' => array('id' => array('selected' => 'selected')))); ?>
                        <?php echo $form->error($model, 'state_id'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'city'); ?>
                        <?php echo $form->textField($model, 'city', array('size' => 60, 'maxlength' => 99, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'city'); ?>
                </div>

                <div class="form-group">
                        <?php echo $form->labelEx($model, 'status'); ?>
                        <?php echo $form->dropDownList($model, 'status', array('1' => 'Enabled', '0' => 'Disabled'), array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'status'); ?>
                </div>



        </div>
        <div class="form-group btns">
                <label>&nbsp;</label><br/>
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'btn btn-secondary btn-single pull-right', 'style' => 'border-radius:0px;padding: 10px 50px;')); ?>
        </div>

        <?php $this->endWidget(); ?>

</div><!-- form -->
<script>
        $(document).ready(function () {
                var country = $('#MasterCity_country_id').val();
                if (country != '') {
                        $.ajax({
                                type: "POST",
                                url: baseurl + "ajax/selectState",
                                data: {country: country}
                        }).done(function (data) {
                                $('#MasterCity_state_id').html(data);
                        });
                } else {
                        $('#MasterCity_state_id').html("<option value=''>--Select--</option>");
                }
                $('#MasterCity_country_id').change(function () {
                        var country = $(this).val();
                        if (country != '') {
                                $.ajax({
                                        type: "POST",
                                        url: baseurl + "ajax/selectState",
                                        data: {country: country}
                                }).done(function (data) {
                                        $('#MasterCity_state_id').html(data);
                                });
                        } else {
                                $('#MasterCity_state_id').html("<option value=''>--Select--</option>");
                        }
                });

        });
</script>