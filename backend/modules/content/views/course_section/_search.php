<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\search\CourseSectionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-section-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'courseid') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'subtitle') ?>

    <?= $form->field($model, 'video') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'template') ?>

    <?php // echo $form->field($model, 'audition') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
