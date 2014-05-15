<?php
/* @var $this DocumentController */
/* @var $model Document */
/* @var $form CActiveForm */
?>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'document-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data')
            ));
    ?>
    <?php
    Yii::app()->clientScript->registerScript('search', "
        $('.search-button').click(function(){
                $('.doc-form').toggle();
                return false;
        });
        $('.doc-form form').submit(function(){
                $.fn.yiiGridView.update('document-grid', {
                        data: $(this).serialize()
                });
                return false;
        });
        ");
    ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'doc_name'); ?>
        <?php echo $form->textField($model, 'doc_name', array('size' => 50, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'doc_name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'doc_file'); ?>
        <?php echo $form->fileField($model, 'doc_file', array('size' => 36, 'maxlength' => 255)); ?>
        <?php echo $form->error($model, 'doc_file'); ?>
    </div>
 
    <div class="row">
        <?php echo $form->labelEx($model, 'summary'); ?>
        <?php echo $form->textArea($model, 'summary', array('rows' => 6, 'cols' => 50)); ?>
        <?php echo $form->error($model, 'summary'); ?>
    </div>
 
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    <?php $this->endWidget(); ?>
 
</div>