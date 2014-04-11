<?php
/* @var $this NotificationsController */
/* @var $data Notifications */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action')); ?>:</b>
	<?php echo CHtml::encode($data->action); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('object_type')); ?>:</b>
	<?php echo CHtml::encode($data->object_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('object_id')); ?>:</b>
	<?php echo CHtml::encode($data->object_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('possessive')); ?>:</b>
	<?php echo CHtml::encode($data->possessive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->from_user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('clicked')); ?>:</b>
	<?php echo CHtml::encode($data->clicked); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relevant_id')); ?>:</b>
	<?php echo CHtml::encode($data->relevant_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relevant_object')); ?>:</b>
	<?php echo CHtml::encode($data->relevant_object); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app')); ?>:</b>
	<?php echo CHtml::encode($data->app); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	*/ ?>

</div>