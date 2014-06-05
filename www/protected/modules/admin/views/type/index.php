<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 6/2/14
 * Time: 5:24 PM
 * To change this template use File | Settings | File Templates.
 * /* @var $this TypeController
 */
/* @var $model Type */
?>
<h1>Manage Types</h1>
<div class="col-xs-12">
    <div class="table-header">
        List for "Type"
    </div>
    <!--    <div class="modal-content">-->
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'type-grid',
        'ajaxUpdate' => true,
        'dataProvider' => $model->search(),
        'filter' => $model,
        "itemsCssClass" => "table table-striped table-bordered table-hover",
        "htmlOptions" => array(
            "class" => "table-responsive"
        ),
        'summaryText' => 'Summary này có thể đổi được {start} - {end} of {count} cool records',
        'columns' => array(
            'id',
            'type_name',
            array(
                'class' => 'CButtonColumn',
                'template' => '{update}{view}{delete}',
//
                'buttons' => array(
                    'update' => array(
                        'options' => array(
                            'class' => 'btn btn-xs btn-success',
                            'title' => Yii::t('app', 'Trạng thái')),
                        'label' => '<i class="icon-ok bigger-120"></i>',
                        'imageUrl' => false,
                        'url'=>'Yii::app()->createUrl("admin/type/edit", array("id"=>$data->id))',
                    ),
                    'view' => array(
                        'options' => array(
                            'class' => 'btn btn-xs btn-info',
                            'title' => Yii::t('app', 'Chi tiết')),
                        'label' => '<i class="icon-edit bigger-120"></i>',
                        'imageUrl' => false,
                        'url'=>'Yii::app()->createUrl("admin/type/admin")',
                    ),
                    'delete' => array(
                        'options' => array(
                            'class' => 'btn btn-xs btn-danger',
                            'title' => Yii::t('app', 'Xóa')),
                        'label' => '<i class="icon-trash bigger-120"></i>',
                        'imageUrl' => false,
                    ),
                ),
            ),
        ),
    )); ?>
    <!--    </div>-->
</div>