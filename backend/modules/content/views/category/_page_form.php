<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($category, 'type')->label(false)->hiddenInput(['value'=>1]);?>

    <?= $form->field($category, 'modelid')->label(false)->hiddenInput(['value'=>0]);?>

    <?= $form->field($category, 'parentid')->label('所属栏目')->dropdownList(
        Category::getSelectList(),
        ['style' => 'width:200px']
    ) ?>

    <?= $form->field($category, 'catname')->textInput(['maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($page, 'title')->textInput(['maxlength' => 80, 'style' => 'width:500px']) ?>

    <?= $form->field($page, 'subtitle')->textInput(['maxlength' => 80, 'style' => 'width:500px']) ?>

    <?= $form->field($category, 'keywords')->textInput(['maxlength' => 50, 'style' => 'width:500px']) ?>

    <?= $form->field($category, 'description')->textarea(['maxlength' => 500, 'rows'=> 3, 'style' => 'width:800px']) ?>

    <?= $form->field($category, 'pic')->widget('common\widgets\file_upload\FileUpload')?>

    <!--<?/*= $form->field($page, 'content')->widget(\yii\redactor\widgets\Redactor::className(), [
        'clientOptions' => [
            'lang' => 'zh_cn'
        ]
    ]) */?>-->

    <?= $form->field($page, 'content')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
            'initialFrameWidth' => '850',
            'initialFrameHeight' => '400',
        ]
    ]) ?>

    <?= $form->field($page, 'video')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($category, 'url')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <!--<?/*= $form->field($page, 'template')->textInput() */?>-->

    <?= $form->field($category, 'sort')->textInput(['style' => 'width:60px']) ?>

    <?php if($category->isNewRecord) $category->ismenu = 1; ?>
    <?= $form->field($category, 'ismenu')->radioList(
        [
            '1' => '显示',
            '0' => '不显示'
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($category->isNewRecord ? '添加' : '修改', ['class' => $category->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
