<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\search\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-lg-12">

        <div class="col-lg-2">
            <?= $form->field($model, 'type')->dropdownList(
                [
                    1 => '学生',
                    2 => '教师',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'id') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'realname') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'phone') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'islock')->dropdownList(
                [
                    1 => '已锁定',
                    0 => '未锁定',
                ],
                [
                    'prompt'=>'选择',
                ]
            ) ?>
        </div>

        <div class="form-group col-lg-2">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary','style'=>'margin-top:25px;']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
