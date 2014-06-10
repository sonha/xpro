<?php
/**
 * Created by SonHA
 * User: Son Ha Anh (sonhaanh@vccorp.vn)
 * Date: 6/10/14
 * Time: 5:23 PM
 * To change this template use File | Settings | File Templates.
/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>
<!--<div class="page-content">-->
<!--    <div class="page-header">-->
<!--        <h1>-->
<!--            Form Elements-->
<!--            <small>-->
<!--                <i class="icon-double-angle-right"></i>-->
<!--                Common form elements and layouts-->
<!--            </small>-->
<!--        </h1>-->
<!--    </div>-->
<!-- /.page-header -->

<!--    <div class="row">-->
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
        <?php echo $form->labelEx($model, 'title_cat', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'id')); ?>
        <div class="col-md-8">
                    <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'title_cat', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'title_cat', 'placeholder' => 'Tên danh mục')); ?>
                    </span>
            <!--                    <i class="icon-remove-sign"></i>-->
            <!--                    --><?php //echo $form->error($model, 'title', array('class' => 'help-block col-xs-12 col-sm-reset inline')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'id')); ?>
        <div class="col-md-8">
            <!--                    --><?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50,'class'=>'form-control','id'=>'id','placeholder'=>'Nội dung bài viết')); ?>
            <!--            <input type="text" name="News[content]"/>-->
            <?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model' => $model,
                'attribute' => 'description',
            )); ?>
        </div>
        <!--                --><?php //echo $form->error($model, 'content'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'user_id', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'id')); ?>
        <div class="col-md-8">
                    <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'user_id', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'title_cat', 'placeholder' => 'Tên danh mục')); ?>
                    </span>
            <!--                    <i class="icon-remove-sign"></i>-->
            <!--                    --><?php //echo $form->error($model, 'title', array('class' => 'help-block col-xs-12 col-sm-reset inline')); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'parent_id', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'id')); ?>
        <div class="col-md-8">
                    <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'parent_id', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'title_cat', 'placeholder' => 'Tên danh mục')); ?>
                    </span>
            <!--                    <i class="icon-remove-sign"></i>-->
            <!--                    --><?php //echo $form->error($model, 'title', array('class' => 'help-block col-xs-12 col-sm-reset inline')); ?>
        </div>
    </div>

    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Đăng bài' : 'Cập nhật', array('class' => 'btn btn-info', 'name' => 'singlebutton', 'id' => 'singlebutton')); ?>
            <?php echo CHtml::resetButton($model->isNewRecord ? 'Hủy' : 'Hủy', array('class' => 'btn', 'name' => 'singlebutton', 'id' => '""')); ?>
        </div>
    </div>

    <!--            <div class="clearfix form-actions">-->
    <!--                <div class="col-md-offset-3 col-md-9">-->
    <!--                    <button class="btn btn-info" type="submit">-->
    <!--                        <i class="icon-ok bigger-110"></i>-->
    <!--                        Submit-->
    <!--                    </button>-->
    <!---->
    <!--                    &nbsp; &nbsp; &nbsp;-->
    <!--                    <button class="btn" type="reset">-->
    <!--                        <i class="icon-undo bigger-110"></i>-->
    <!--                        Reset-->
    <!--                    </button>-->
    <!--                </div>-->
    <!--            </div>-->

    <div class="hr hr-24"></div>
    <?php $this->endWidget(); ?>
    <!-- PAGE CONTENT ENDS -->
</div>
<!-- /.col -->
<!--    </div>-->
<!-- /.row -->
<!--</div><!-- /.page-content -->-->