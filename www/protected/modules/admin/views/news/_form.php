<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>
<div class="page-content">
    <div class="page-header">
        <h1>
            Form Elements
            <small>
                <i class="icon-double-angle-right"></i>
                Common form elements and layouts
            </small>
        </h1>
    </div>
    <!-- /.page-header -->

    <div class="row">
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
            <?php if($model->hasErrors()){ ?>
            <div class="alert alert-danger">
                <?php echo $form->errorSummary($model, 'Fix những lỗi sau','') ?>
            </div> <?php } ?>
            <div class="form-group">
                <?php echo $form->labelEx($model, 'Người đăng', array('class' => 'col-sm-3 control-label no-padding-right', 'for' => 'user_id')); ?>
                <div class="col-md-8">
                    <?php
                    $listUserName = CHtml::listData(user::model()->findAll(array('order' => 'username')), 'id', 'username'); //table_col_name1 is value of option, table_col_name2 is label of option
                    echo $form->dropDownList($model, 'user_id', $listUserName, array('class' => 'form-control', 'prompt' => 'Chọn user'));
                    ?>
                    <!--                    --><?php //echo $form->error($model, 'user_id'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Danh mục', array('class' => 'col-sm-3 control-label no-padding-right', 'for' => 'catid')); ?>
                <div class="col-md-8">
                    <?php
                    $list = CHtml::listData(category::model()->findAll(array('order' => 'title_cat')), 'id', 'title_cat'); //table_col_name1 is value of option, table_col_name2 is label of option
                    //var_dump($list);die;
                    echo $form->dropDownList($model, 'catid', $list, array('class' => 'form-control', 'prompt' => 'Chọn danh mục'));
                    ?>
                    <!--                    --><?php //echo $form->error($model, 'catid'); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Tiêu đề', array('class' => 'col-sm-3 control-label no-padding-right', 'for' => 'id')); ?>
                <div class="col-md-8">
                    <span class="block input-icon input-icon-right">
                    <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control', 'id' => 'id', 'placeholder' => 'Tiêu đề bài viết')); ?>
                    </span>
                    <!--                    <i class="icon-remove-sign"></i>-->
                    <!--                    --><?php //echo $form->error($model, 'title', array('class' => 'help-block col-xs-12 col-sm-reset inline')); ?>
                </div>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'Nội dung', array('class' => 'col-sm-3 control-label no-padding-right', 'for' => 'id')); ?>
                <div class="col-md-8">
                    <!--                    --><?php //echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50,'class'=>'form-control','id'=>'id','placeholder'=>'Nội dung bài viết')); ?>
                    <!--            <input type="text" name="News[content]"/>-->
                    <?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                        'model' => $model,
                        'attribute' => 'content',
                    )); ?>
                </div>
                <!--                --><?php //echo $form->error($model, 'content'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'thumb', array('class' => 'col-sm-3 control-label no-padding-right')); ?>
                <div class="col-md-8">
                    <?php echo $form->fileField($model, 'thumb', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                </div>
                <!--                --><?php //echo $form->error($model, 'thumb'); ?>
            </div>

            <div class="form-group">
                <?php echo $form->labelEx($model, 'pub_time', array('class' => 'col-sm-3 control-label no-padding-right')); ?>
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
    </div>
    <!-- /.row -->
</div><!-- /.page-content -->