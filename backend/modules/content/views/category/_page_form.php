<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($category, 'type')->label(false)->hiddenInput(['value'=>1]);?>

    <?= $form->field($category, 'modelid')->label(false)->hiddenInput(['value'=>0]);?>

    <?= $form->field($category, 'parentid')->label('所属栏目')->dropdownList(
        Category::getSelectList()
    ) ?>

    <?= $form->field($category, 'catname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($page, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($page, 'subtitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($category, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($category, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($page, 'content')->textInput(['maxlength' => true]) ?>

    <?= $form->field($category, 'pic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($page, 'video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($category, 'url')->textInput(['maxlength' => true]) ?>

    <!--<?/*= $form->field($page, 'template')->textInput() */?>-->

    <?= $form->field($category, 'sort')->textInput() ?>

    <?= $form->field($category, 'ismenu')->radioList(
        [
            '1' => '显示',
            '0' => '不显示'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($category->isNewRecord ? '添加' : '修改', ['class' => $category->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
