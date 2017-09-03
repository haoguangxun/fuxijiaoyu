<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\form\UserForm */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $roles yii\rbac\Role[] */
/* @var $permissions yii\rbac\Permission[] */

?>
<div class="site-signup">

    <div class="row">
        <div class="col-lg-5">
          
              <?php $form = ActiveForm::begin(['id' => 'form-assign-role']); ?>
                 <?= $form->field($model, 'roleid')->label('分配权限')->dropDownList($roles) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', 'Change'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
