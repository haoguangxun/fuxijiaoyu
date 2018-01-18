<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\order\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'paytime')->hiddenInput(['value' => time()])->label(false) ?>

    <?= $form->field($model, 'status')->radioList(
        [
            '0' => '未支付',
            '1' => '已支付',
        ]
    ) ?>

    <?= $form->field($model, 'pay_type')->radioList(
        [
            '1' => '支付宝',
            '2' => '微信',
            '3' => '线下支付',
        ]
    ) ?>

    <?= $form->field($model, 'pay_number')->textInput(['maxlength' => 20, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => 50, 'style' => 'width:500px']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '添加' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::button('取消', ['class' => 'btn btn-default','onclick'=>'window.history.back();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
