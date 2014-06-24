<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>
<div class="col-xs-12">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-form',
//                'errorMessageCssClass'=>'help-block col-xs-12 col-sm-reset inline',
//                'errorMessageCssClass'=>'the error class you want',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    ));
    ?>
    <?php if ($model->hasErrors()) { ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model, 'Fix những lỗi sau', '') ?>
        </div> <?php } ?>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'Người đăng', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'user_id')); ?>
        <div class="col-md-8">
            <?php
            $listUserName = CHtml::listData(user::model()->findAll(array('order' => 'username')), 'id', 'username'); //table_col_name1 is value of option, table_col_name2 is label of option
            echo $form->dropDownList($model, 'user_id', $listUserName, array('class' => 'form-control', 'prompt' => 'Chọn user'));
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Danh mục', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'catid')); ?>
        <div class="col-md-8">
            <?php
            $list = CHtml::listData(category::model()->findAll(array('order' => 'title_cat')), 'id', 'title_cat'); //table_col_name1 is value of option, table_col_name2 is label of option
            echo $form->dropDownList($model, 'catid', $list, array('class' => 'form-control', 'prompt' => 'Chọn danh mục'));
            ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Tiêu đề', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'id')); ?>
        <div class="col-md-8">
                    <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
                    </span>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'Nội dung', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'id')); ?>
        <div class="col-md-8">
            <?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'content',
            )); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'thumb', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right')); ?>
        <div class="col-md-8">
            <?php echo $form->fileField($model, 'thumb', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'pub_time', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right')); ?>
        <div class="col-md-8">
            <?php echo $form->dateField($model, 'pub_time', array('class' => 'form-control')); ?>
        </div>
        <!--                --><?php //echo $form->error($model, 'pub_time'); ?>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Đăng bài' : 'Cập nhật', array('class' => 'btn btn-info', 'name' => 'singlebutton', 'id' => 'singlebutton')); ?>
            <?php echo CHtml::resetButton($model->isNewRecord ? 'Hủy' : 'Hủy', array('class' => 'btn', 'name' => 'singlebutton', 'id' => '""')); ?>
        </div>
    </div>

    <div class="hr hr-24"></div>
    <?php $this->endWidget(); ?>
    <!-- PAGE CONTENT ENDS -->
</div>