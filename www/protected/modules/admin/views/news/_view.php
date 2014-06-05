<?php
/* @var $this NewsController */
/* @var $data News */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idNews')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idNews), array('view', 'id'=>$data->idNews)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('catID')); ?>:</b>
	<?php echo CHtml::encode($data->catID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('titleNews')); ?>:</b>
	<?php echo CHtml::encode($data->titleNews); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contentNews')); ?>:</b>
	<?php echo CHtml::encode($data->contentNews); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('thumbNews')); ?>:</b>
	<?php echo CHtml::encode($data->thumbNews); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timeNews')); ?>:</b>
	<?php echo CHtml::encode($data->timeNews); ?>
	<br />


</div>