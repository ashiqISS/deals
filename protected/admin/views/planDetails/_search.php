<?php
/* @var $this PlanDetailsController */
/* @var $model PlanDetails */
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
		<?php echo $form->label($model,'plan_name'); ?>
		<?php echo $form->textField($model,'plan_name',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'amount'); ?>
		<?php echo $form->textField($model,'amount',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'featured'); ?>
		<?php echo $form->textField($model,'featured',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_days'); ?>
		<?php echo $form->textField($model,'no_of_days',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_products'); ?>
		<?php echo $form->textField($model,'no_of_products',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'no_of_ads'); ?>
		<?php echo $form->textField($model,'no_of_ads',array('size'=>60,'maxlength'=>250,'class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cb'); ?>
		<?php echo $form->textField($model,'cb',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'doc'); ?>
		<?php echo $form->textField($model,'doc',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ub'); ?>
		<?php echo $form->textField($model,'ub',array('class' => 'form-control')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dou'); ?>
		<?php echo $form->textField($model,'dou',array('class' => 'form-control')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->