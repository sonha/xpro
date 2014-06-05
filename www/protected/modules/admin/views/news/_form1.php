<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<?php
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'news-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>'form-horizontal')
    ));
?>
    <div class="bg-danger">
        <?php echo $form->errorSummary($model,'Fix những lỗi sau','') ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'Người đăng',array('class'=>'control-label col-md-2','for'=>'user_id')); ?>
        <div class="col-md-8">
            <?php
                $listUserName = CHtml::listData(user::model()->findAll(array('order' => 'username')), 'id', 'username'); //table_col_name1 is value of option, table_col_name2 is label of option
                //var_dump($list);die;
                echo  $form->dropDownList($model,'user_id',$listUserName,array('class'=>'form-control','prompt'=>'Chọn user'));
            ?>
            <?php echo $form->error($model,'user_id'); ?>
        </div>
    </div>
    <div class="form-group">
        <?php echo $form->labelEx($model,'Danh mục',array('class'=>'control-label col-md-2','for'=>'catid')); ?>
        <div class="col-md-8">
            <?php
                $list = CHtml::listData(category::model()->findAll(array('order' => 'title_cat')), 'in', 'title_cat'); //table_col_name1 is value of option, table_col_name2 is label of option
                //var_dump($list);die;
                echo  $form->dropDownList($model,'catid',$list,array('class'=>'form-control','prompt'=>'Chọn danh mục'));
            ?>
            <?php echo $form->error($model,'catid'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'Tiêu đề',array('class'=>'control-label col-md-2','for'=>'id')); ?>
        <div class="col-md-8">
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'form-control','id'=>'id','placeholder'=>'Tiêu đề bài viết')); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'Nội dung',array('class'=>'control-label col-md-2','for'=>'id')); ?>
        <div class="col-md-8">
            <?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50,'class'=>'form-control','id'=>'id','placeholder'=>'Nội dung bài viết')); ?>
<!--            <input type="text" name="News[content]"/>-->
<!--             --><?php /*$this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model'=>$model,
                'attribute'=>'content',
            )); */?>
        </div>
        <?php echo $form->error($model,'content'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'thumb',array('class'=>'control-label col-md-2')); ?>
        <div class="col-md-8">
            <?php echo $form->fileField($model,'thumb',array('size'=>60,'maxlength'=>255,'class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'thumb'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'pub_time',array('class'=>'control-label col-md-2')); ?>
        <div class="col-md-8">
            <?php echo $form->dateField($model,'pub_time',array('class'=>'form-control')); ?>
        </div>
        <?php echo $form->error($model,'pub_time'); ?>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-push-2">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Đăng bài' : 'Đăng bài',array('class'=>'btn btn-primary','name'=>'singlebutton','id'=>'singlebutton')); ?>
            <?php echo CHtml::resetButton($model->isNewRecord ? 'Hủy' : 'Hủy',array('class'=>'btn btn-defalut','name'=>'singlebutton','id'=>'""')); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

