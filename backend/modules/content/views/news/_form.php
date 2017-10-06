<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 80, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => 80, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'catid')->label('所属栏目')->dropdownList(
        Category::getSelectList(),
        ['style' => 'width:200px']
    ) ?>

    <?= $form->field($model, 'author')->textInput(['value' => Yii::$app->user->identity->username, 'maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($dataModel, 'copyfrom')->textInput(['value'=>'本站', 'maxlength' => 100, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'thumb')->widget('common\widgets\file_upload\FileUpload')?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 50, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => 200, 'rows'=> 3, 'style' => 'width:800px']) ?>

    <?= $form->field($dataModel, 'content')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
            'initialFrameWidth' => '850',
            'initialFrameHeight' => '400',
        ]
    ]) ?>

    <?= $form->field($dataModel, 'template')->textInput(['maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'video')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'sort')->textInput(['value' => 0, 'style' => 'width:60px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
