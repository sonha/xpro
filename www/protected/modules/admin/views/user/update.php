<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
    'News'=>array('index'),
    $model->id=>array('view','id'=>$model->id),
    'Update',
);

$this->renderPartial('_form', array('model'=>$model)); ?>


