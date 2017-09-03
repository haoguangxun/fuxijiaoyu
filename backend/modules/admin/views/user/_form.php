<?php

use backend\modules\admin\models\User;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\form\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput() ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'roleid')->dropDownList($roles) ?>
        <?= $form->field($model, 'status')->radioList(['10'=>'正常','0'=>'停用']) ?>
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div>
