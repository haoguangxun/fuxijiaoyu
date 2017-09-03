<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\search\CategorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'modelid') ?>

    <?= $form->field($model, 'parentid') ?>

    <?= $form->field($model, 'arrparentid') ?>

    <?= $form->field($model, 'child') ?>

    <?php // echo $form->field($model, 'arrchildid') ?>

    <?php // echo $form->field($model, 'catname') ?>

    <?php // echo $form->field($model, 'pic') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'parentdir') ?>

    <?php // echo $form->field($model, 'catdir') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'setting') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <?php // echo $form->field($model, 'ismenu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
