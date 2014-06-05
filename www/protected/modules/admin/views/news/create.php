<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<?php //if(Yii::app()->user->hasFlash('success')): ?>
<!--    <p class="bg-success">-->
<!--        --><?php //echo Yii::app()->user->getFlash('success'); ?>
<!--    </p>-->
<?php //endif; ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>