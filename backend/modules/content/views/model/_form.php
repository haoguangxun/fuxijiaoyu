<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Model */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tablename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setting')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'addtime')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disabled')->textInput() ?>

    <?= $form->field($model, 'category_template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'list_template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'js_template')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
