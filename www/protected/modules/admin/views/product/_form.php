<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="col-xs-12">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    )); ?>

    <?php if ($model->hasErrors()) { ?>
        <div class="alert alert-danger">
            <?php echo $form->errorSummary($model, 'Fix những lỗi sau', '') ?>
        </div> <?php } ?>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'name', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'user_id')); ?>
        <div class="col-md-8">
            <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
            </span>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'cat_id', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'user_id')); ?>
        <div class="col-md-8">
            <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'cat_id', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
            </span>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'description', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'user_id')); ?>
        <div class="col-md-8">
            <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'description', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
            </span>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'price', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'user_id')); ?>
        <div class="col-md-8">
            <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'price', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
            </span>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'image', array('class' => 'col-xs-12 col-sm-4 col-md-2 no-padding-right', 'for' => 'user_id')); ?>
<!--        <div class="col-md-8">-->
<!--            <span class="block input-icon input-icon-right">-->
<!--                    --><?php //echo $form->textField($model, 'image', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
<!--            </span>-->
<!--        </div>-->
        <div class="col-md-8">
            <div class="ace-file-input">
                <input type="file" id="id-input-file-2">
                <label class="file-label" data-title="Choose">
            <span class="file-name" data-title="No File ...">
                <i class="icon-upload-alt"></i>
            </span>
                </label>
                <a class="remove" href="#">
                    <i class="icon-remove"></i>
                </a>
            </div>
        </div>
    </div>



    <div class="clearfix form-actions">
        <div class="col-md-offset-3 col-md-9">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Đăng bài' : 'Cập nhật', array('class' => 'btn btn-info', 'name' => 'singlebutton', 'id' => 'singlebutton')); ?>
            <?php echo CHtml::resetButton($model->isNewRecord ? 'Hủy' : 'Hủy', array('class' => 'btn', 'name' => 'singlebutton', 'id' => '""')); ?>
        </div>
    </div>

    <div class="hr hr-24"></div>

    <?php $this->endWidget(); ?>

</div><!-- form -->