<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\enroll\models\search\EnrollSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enroll-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-lg-12">

        <div class="col-lg-2">
            <?= $form->field($model, 'name') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'contact') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'expect_teacher') ?>
        </div>

        <div class="form-group col-lg-2">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary','style'=>'margin-top:25px;']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
