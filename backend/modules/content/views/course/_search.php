<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\search\CourseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="course-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'labelOptions' => ['style' => 'display:none;'],
        ]
    ]); ?>

    <div class="col-lg-12">
        <div class="col-lg-2">
            <?= $form->field($model, 'catid')->dropdownList(
                Category::getSelectList(),
                [
                    'prompt'=>'所属栏目',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'teacherid')->dropdownList(
                \common\models\MemberTeacher::find()->select(['realname','userid'])->indexBy('userid')->column(),
                [
                    'prompt'=>'主讲老师',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'keyword_type')->dropdownList(
                [
                    'id' => 'ID',
                    'name' => '课程名称',
                    'author' => '作者',
                ],
                [
                    'prompt'=>'搜索条件',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?php echo $form->field($model, 'keyword') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'status')->dropdownList(
                [
                    1 => '正常',
                    2 => '下线',
                ],
                [
                    'prompt'=>'课程状态',
                ]
            ) ?>
        </div>

        <div class="form-group col-lg-2">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php // echo $form->field($model, 'status') ?>


    <?php ActiveForm::end(); ?>

</div>
