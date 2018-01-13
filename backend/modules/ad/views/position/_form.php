<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\ad\models\AdPosition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-position-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 50, 'style' => 'width:200px']) ?>

    <?//= $form->field($model, 'width')->textInput(['style' => 'width:80px']) ?>

    <?//= $form->field($model, 'height')->textInput(['style' => 'width:80px']) ?>

    <?php if($model->isNewRecord) $model->type = 2; ?>
    <?= $form->field($model, 'type')->radioList(
        [
            '1' => '文字',
            '2' => '图片',
            //'3' => 'Flash',
            //'4' => '视频',
        ]
    ) ?>

    <?php if($model->isNewRecord) $model->disabled = 0; ?>
    <?= $form->field($model, 'disabled')->radioList(
        [
            '0' => '启用',
            '1' => '禁用',
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
