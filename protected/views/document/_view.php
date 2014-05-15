<?php
/* @var $this DocumentController */
/* @var $data Document */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_name')); ?>:</b>
	<?php echo CHtml::encode($data->doc_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_file')); ?>:</b>
	<?php echo CHtml::encode($data->doc_file); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_type')); ?>:</b>
	<?php echo CHtml::encode($data->doc_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('doc_size')); ?>:</b>
	<?php echo CHtml::encode($data->doc_size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('up_dated')); ?>:</b>
	<?php echo CHtml::encode($data->up_dated); ?>
	<br />


</div>