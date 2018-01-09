<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord) $model->courseid = $courseid; ?>
    <?= $form->field($model, 'courseid')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 80, 'style' => 'width:300px']) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => 80, 'style' => 'width:300px']) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'sort')->textInput(['style' => 'width:60px']) ?>

    <?php if($model->isNewRecord) $model->audition = 0; ?>
    <?= $form->field($model, 'audition')->radioList(
        [
            '0' => '不可以',
            '1' => '可以',
        ]
    ) ?>

    <?php if($model->isNewRecord) $model->status = 1; ?>
    <?= $form->field($model, 'status')->radioList(
        [
            '1' => '正常',
            '2' => '下线',
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
