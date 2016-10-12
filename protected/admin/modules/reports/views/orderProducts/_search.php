<?php
/* @var $this OrderProductsController */
/* @var $model OrderProducts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DOC'); ?>
		<?php echo $form->textField($model,'DOC',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'order_comments'); ?>
		<?php echo $form->textField($model,'order_comments',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gift_option'); ?>
		<?php echo $form->textField($model,'gift_option',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rate'); ?>
		<?php echo $form->textField($model,'rate',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'option_id'); ?>
		<?php echo $form->textField($model,'option_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'merchant_id'); ?>
		<?php echo $form->textField($model,'merchant_id',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shipping_charge'); ?>
		<?php echo $form->textField($model,'shipping_charge',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->