<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Models;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->label(false)->hiddenInput(['value'=>2]);?>

    <?= $form->field($model, 'modelid')->label('模型')->dropdownList(
        Models::find()->select(['name', 'modelid'])->indexBy('modelid')->orderBy(['sort'=>SORT_ASC])->column(),
        ['prompt'=>'选择模型']
    ) ?>

    <?= $form->field($model, 'parentid')->label('所属栏目')->dropdownList(
        Category::getSelectList()
    ) ?>

    <?= $form->field($model, 'catname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'ismenu')->radioList(
        [
            '1' => '显示',
            '0' => '不显示'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
