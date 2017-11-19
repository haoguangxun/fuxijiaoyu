<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\search\MemberSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="member-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <?php // echo $form->field($model, 'email_validate_token') ?>

    <?php // echo $form->field($model, 'nickname') ?>

    <?php // echo $form->field($model, 'photo') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'point') ?>

    <?php // echo $form->field($model, 'regtime') ?>

    <?php // echo $form->field($model, 'lasttime') ?>

    <?php // echo $form->field($model, 'regip') ?>

    <?php // echo $form->field($model, 'lastip') ?>

    <?php // echo $form->field($model, 'loginnum') ?>

    <?php // echo $form->field($model, 'islock') ?>

    <?php // echo $form->field($model, 'vip') ?>

    <?php // echo $form->field($model, 'overduedate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
