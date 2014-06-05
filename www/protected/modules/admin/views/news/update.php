<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List News', 'url'=>array('index')),
	array('label'=>'Create News', 'url'=>array('create')),
	array('label'=>'View News', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage News', 'url'=>array('admin')),
);
?>
<div class="panel">
    <div class="panel-heading">
        <div>Sửa tin: <strong><?php echo $model->title; ?></strong></div>
    </div>
    <div class="panel-body">
        <?php $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>


