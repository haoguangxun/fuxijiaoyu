<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\ad\models\Ad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php if($model->isNewRecord) $model->pid = $pid; ?>
    <?= $form->field($model, 'pid')->label(false)->hiddenInput() ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 80, 'style' => 'width:300px']) ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => 200, 'style' => 'width:300px']) ?>

    <?= $form->field($model, 'fileurl')->widget('common\widgets\file_upload\FileUpload')?>

    <?= $form->field($model, 'linkurl')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'sort')->textInput(['style' => 'width:60px']) ?>

    <?php if($model->isNewRecord) $model->display = 1; ?>
    <?= $form->field($model, 'display')->radioList(
        [
            '1' => '显示',
            '2' => '隐藏',
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
