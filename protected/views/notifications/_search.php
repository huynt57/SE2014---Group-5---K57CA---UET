<?php
/* @var $this NotificationsController */
/* @var $model Notifications */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'object_type'); ?>
		<?php echo $form->textField($model,'object_type',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'object_id'); ?>
		<?php echo $form->textField($model,'object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'possessive'); ?>
		<?php echo $form->textField($model,'possessive'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'from_user_id'); ?>
		<?php echo $form->textField($model,'from_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clicked'); ?>
		<?php echo $form->textField($model,'clicked'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relevant_id'); ?>
		<?php echo $form->textField($model,'relevant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relevant_object'); ?>
		<?php echo $form->textField($model,'relevant_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'app'); ?>
		<?php echo $form->textField($model,'app',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->