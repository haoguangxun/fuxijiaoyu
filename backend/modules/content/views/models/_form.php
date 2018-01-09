<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Models */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="models-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'tablename')->textInput(['maxlength' => 20, 'style' => 'width:200px']) ?>

    <!--<?/*= $form->field($model, 'setting')->textarea(['rows' => 6]) */?>

    <?/*= $form->field($model, 'addtime')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'disabled')->textInput() */?>

    <?/*= $form->field($model, 'category_template')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'list_template')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'show_template')->textInput(['maxlength' => true]) */?>

    <?/*= $form->field($model, 'js_template')->textInput(['maxlength' => true]) */?>-->

    <?= $form->field($model, 'sort')->textInput(['style' => 'width:60px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
