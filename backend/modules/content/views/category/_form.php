<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Model;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'modelid')->dropdownList(
        Model::find()->select(['name', 'modelid'])->indexBy('modelid')->column(),
        ['prompt'=>'选择模型']
    ) ?>

    <?= $form->field($model, 'parentid')->dropdownList(
        \backend\modules\content\models\Category::getTreeList(),
        ['prompt'=>'选择模型']
    ) ?>
    <?= $form->field($model, 'parentid')->textInput() ?>

    <?= $form->field($model, 'catname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parentdir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catdir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'setting')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <?= $form->field($model, 'ismenu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
