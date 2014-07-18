<?php
/* @var $this CourseController */
/* @var $model Course */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>