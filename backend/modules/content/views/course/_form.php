<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model common\models\Course */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 80, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'subtitle')->textInput(['maxlength' => 80, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'catid')->label('所属栏目')->dropdownList(
        Category::getSelectList(),
        ['style' => 'width:200px']
    ) ?>

    <?= $form->field($model, 'author')->textInput(['value' => Yii::$app->user->identity->username, 'maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'teacherid')->label('主讲老师')->dropdownList(
        \common\models\Member::find()->select(['realname','id'])->where('type=2')->indexBy('id')->column(),
        ['style' => 'width:200px']
    ) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => 11, 'style' => 'width:80px']) ?>

    <?= $form->field($model, 'course_number')->textInput(['maxlength' => 3, 'style' => 'width:80px']) ?>

    <?= $form->field($model, 'course_duration')->textInput(['maxlength' => 4, 'style' => 'width:80px']) ?>

    <?php if($model->isNewRecord) $model->difficulty_level = 1; ?>
    <?= $form->field($model, 'difficulty_level')->radioList(
        [
            '1' => '初级',
            '2' => '中级',
            '3' => '高级'
        ]
    ) ?>

    <?= $form->field($model, 'thumb')->widget('common\widgets\file_upload\FileUpload')?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 50, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => 200, 'rows'=> 3, 'style' => 'width:800px']) ?>

    <?= $form->field($dataModel, 'content')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
            'initialFrameWidth' => '850',
            'initialFrameHeight' => '400',
        ]
    ]) ?>

    <?= $form->field($dataModel, 'syllabus')->widget('common\widgets\ueditor\Ueditor',[
        'options'=>[
            'initialFrameWidth' => '850',
            'initialFrameHeight' => '400',
        ]
    ]) ?>

    <?= $form->field($dataModel, 'data')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($dataModel, 'material')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($dataModel, 'template')->textInput(['maxlength' => 30, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 100, 'style' => 'width:500px']) ?>

    <?= $form->field($model, 'sort')->textInput(['value' => 0, 'style' => 'width:60px']) ?>

    <?php if($model->isNewRecord) $model->status = 1; ?>
    <?= $form->field($model, 'status')->radioList(
        [
            '1' => '正常',
            '2' => '下线',
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
