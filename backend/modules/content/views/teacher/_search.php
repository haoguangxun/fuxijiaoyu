<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\search\TeacherSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="col-lg-12">
        <div class="col-lg-2">
            <?= $form->field($model, 'catid')->label('所属栏目')->dropdownList(
                Category::getSelectList(),
                [
                    'prompt'=>'选择',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'id') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'name') ?>
        </div>

        <div class="form-group col-lg-2">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary','style'=>'margin-top:25px;']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
