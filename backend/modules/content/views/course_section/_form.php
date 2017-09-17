<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CourseSection */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'courseid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'audition')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
