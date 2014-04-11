<?php
/* @var $this NotificationsController */
/* @var $model Notifications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'notifications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action'); ?>
		<?php echo $form->textField($model,'action',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'action'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'object_type'); ?>
		<?php echo $form->textField($model,'object_type',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'object_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'object_id'); ?>
		<?php echo $form->textField($model,'object_id'); ?>
		<?php echo $form->error($model,'object_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'possessive'); ?>
		<?php echo $form->textField($model,'possessive'); ?>
		<?php echo $form->error($model,'possessive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'from_user_id'); ?>
		<?php echo $form->textField($model,'from_user_id'); ?>
		<?php echo $form->error($model,'from_user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clicked'); ?>
		<?php echo $form->textField($model,'clicked'); ?>
		<?php echo $form->error($model,'clicked'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relevant_id'); ?>
		<?php echo $form->textField($model,'relevant_id'); ?>
		<?php echo $form->error($model,'relevant_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relevant_object'); ?>
		<?php echo $form->textField($model,'relevant_object'); ?>
		<?php echo $form->error($model,'relevant_object'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'app'); ?>
		<?php echo $form->textField($model,'app',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'app'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->