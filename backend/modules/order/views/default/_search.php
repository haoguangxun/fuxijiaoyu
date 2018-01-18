<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\order\models\search\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="col-lg-12">

        <div class="col-lg-2">
            <?= $form->field($model, 'orderid') ?>
        </div>

        <div class="col-lg-1">
            <?= $form->field($model, 'userid') ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'status')->dropdownList(
                [
                    1 => '已支付',
                    0 => '未支付',
                ],
                [
                    'prompt'=>'支付状态',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'pay_type')->dropdownList(
                [
                    1 => '支付宝',
                    2 => '微信',
                    3 => '线下支付',
                ],
                [
                    'prompt'=>'支付方式',
                ]
            ) ?>
        </div>
        <div class="col-lg-2" style="padding-top: 25px;">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'bgDate',
                'language' => 'zh-CN',
                //'size' => 'sm',
                'options' => ['style'=>'width:120px;','class'=>'bgDate'],
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>

        <div class="col-lg-2" style="padding-top: 25px;">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'edDate',
                'language' => 'zh-CN',
                //'size' => 'sm',
                'options' => ['style'=>'width:120px;','class'=>'edDate'],
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>

        <div class="form-group col-lg-1">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary','style'=>'margin-top:25px;']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
