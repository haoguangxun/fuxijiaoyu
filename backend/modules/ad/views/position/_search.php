<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\ad\models\search\AdPositionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ad-position-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-lg-12">

        <div class="col-lg-2">
            <?= $form->field($model, 'id') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'name') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'disabled')->dropdownList(
                [
                    '0' => '启用',
                    '1' => '禁用',
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
