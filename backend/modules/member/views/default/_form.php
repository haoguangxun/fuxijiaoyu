<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\Member */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->radioList(
        [
            '1' => '学生',
            '2' => '教师'
        ]
    ) ?>

    <?= $form->field($model, 'islock')->radioList(
        [
            '1' => '是',
            '0' => '否'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
