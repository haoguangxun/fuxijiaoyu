<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Models;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->label(false)->hiddenInput(['value'=>2]);?>

    <?= $form->field($model, 'modelid')->label('模型')->dropdownList(
        Models::find()->select(['name', 'modelid'])->indexBy('modelid')->orderBy(['sort'=>SORT_ASC])->column(),
        ['prompt'=>'选择模型'],
        ['style' => 'width:200px']
    ) ?>

    <?= $form->field($model, 'parentid')->label('所属栏目')->dropdownList(
        Category::getSelectList(),
        ['style' => 'width:200px']
    ) ?>

    <?= $form->field($model, 'catname')->textInput(['maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 50, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => 500, 'style' => 'width:800px']) ?>

    <?= $form->field($model, 'pic')->widget('common\widgets\file_upload\FileUpload')?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'sort')->textInput(['style' => 'width:60px']) ?>

    <?php if($model->isNewRecord) $model->ismenu = 1; ?>
    <?= $form->field($model, 'ismenu')->radioList(
        [
            '1' => '显示',
            '0' => '不显示'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
