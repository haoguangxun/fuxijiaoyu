<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Model;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->label('类型')->dropdownList(
        [
            '2'=>'栏目',
            '1'=>'单网页'
        ]
    ) ?>

    <?= $form->field($model, 'modelid')->label('模型')->dropdownList(
        Model::find()->select(['name', 'modelid'])->indexBy('modelid')->column(),
        ['prompt'=>'选择模型']
    ) ?>

    <?= $form->field($model, 'parentid')->label('所属分类')->dropdownList(
        Category::getSelectList(),
        ['prompt'=>'选择所属分类']
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
