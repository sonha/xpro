<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 6/2/14
 * Time: 5:24 PM
 * To change this template use File | Settings | File Templates.
 * /* @var $this TypeController
 */
/* @var $model User */
?>
<div class="col-xs-12">
    <div class="table-header">
        Danh sách bài viết
        <div class="widget-toolbar">
            <label>
                <a href="<?php echo Yii::app()->createUrl("admin/news/create")?>" class="btn btn-sm btn-danger">Thêm bài viết</a>
            </label>
        </div>
    </div>
    <!--    <div class="modal-content">-->
    <?php
    // put this somewhere on top
    $pageSize = Yii::app()->user->getState('pageSize', Yii::app()->params['defaultPageSize']);
    ?>
    <?php $this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'user-grid',
        'ajaxUpdate' => true,
        'dataProvider' => $model->search(),
       'filter' => $model,
        "itemsCssClass" => "table table-striped table-bordered table-hover",
//
        'rowCssClass'=>array(''), //neu de the nay thi se co odd va even 'rowCssClass'=>array('odd','even'),
        "htmlOptions" => array(
            "class" => "table-responsive"
        ),
//        'rowCssClassExpression' => '( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) . ( $data->id ? null : " disabled" )',
        'summaryText' => '<div id="summaryText">Hiển thị từ User {start} đến {end} trong tổng số {count} user</div>',
//        'template' => "{items}", // Cho nay de thay doi thu tu hien thi : item-> summaryText->phan trang
        'pager'=>array(
//            'class'=>'',  // use if you want to extend CLinkPager
            'htmlOptions'=>array('class'=>'pagination'),
            'header' => '',
//            'header'=>'Đây là phần header của phân trang, thích viết gì thì viết',//defalut empty
//            'footer'=>'Đây là phần footer của phân trang, thích viết gì thì viết',//defalut empty
            'cssFile'=>false,//The most important is that 'cssFile' is set to false, which will prevent CLinkPager to apply Yii default stylesheet. Other settings are really just what works best for you in your case.
//            'maxButtonCount'=>25,// to redirect from using the css file in the framework.
            // Make sure you load your defined css file as you would with any other
            'maxButtonCount'=>10,//defalut 10
            'selectedPageCssClass'=>'active',////default "selected"
            'hiddenPageCssClass'=>'disabled',//default "hidden"
            'firstPageCssClass'=>'previous',
            'lastPageCssClass'=>'next',
//            'pagerCssClass' => 'pagination',
//            'rowCssClass' => 'pagination',
//            'internalPageCssClass'=>'pager_li',//default "page"
            'firstPageLabel'=>'<<',
            'lastPageLabel'=>'>>',
            'prevPageLabel'=>'<',
            'nextPageLabel'=>'>',
        ),
        'template' => "{items}\n{summary}\n{pager}", // Cho nay de thay doi thu tu hien thi : item-> summaryText->phan trang
        'columns' => array(
            array(
                'id' => 'id',
                'class' => 'CCheckBoxColumn',
                'selectableRows' => '50',
//                'htmlOptions' => array('style' => 'width: 20px; text-align: center;', 'class' => 'zzz'),// cai nay con bi anh huong boi cai filter
            ),
            'id',
            array(
                'name' => 'title',
                'htmlOptions' => array('style' => 'text-align: left'),
            ),
            'pub_time',
            'user_id',
            array(
                'class' => 'CButtonColumn',
                'header' => CHtml::dropDownList('pageSize', $pageSize, array(10=>10, 20 => 20, 50 => 50, 100 => 100), array(
                        // change 'user-grid' to the actual id of your grid!!
                        'onchange' => "$.fn.yiiGridView.update('user-grid',{ data:{pageSize: $(this).val() }})",
                    )),
                'template' => '{update}{view}{delete}',
                'buttons' => array(
                    'update' => array(
                        'options' => array(
                            'class' => 'btn btn-xs btn-success',
                            'title' => Yii::t('app', 'Trạng thái')),
                        'label' => '<i class="icon-ok bigger-120"></i>',
                        'imageUrl' => false,
                        'url' => 'Yii::app()->createUrl("admin/news/update", array("id"=>$data->id))',
                    ),
                    'view' => array(
                        'options' => array(
                            'class' => 'btn btn-xs btn-info',
                            'title' => Yii::t('app', 'Chi tiết')),
                        'label' => '<i class="icon-edit bigger-120"></i>',
                        'imageUrl' => false,
                        'url' => 'Yii::app()->createUrl("admin/news/admin")',
                    ),
                    'delete' => array(
                        'options' => array(
                            'class' => 'btn btn-xs btn-danger',
                            'title' => Yii::t('app', 'Xóa')),
                        'label' => '<i class="icon-trash bigger-120"></i>',
                        'imageUrl' => false,
                        'url' => 'Yii::app()->createUrl("admin/news/delete", array("id"=>$data->id))',
                    ),
                ),
            ),
        ),
    )); ?>
    <!--    </div>-->
</div>