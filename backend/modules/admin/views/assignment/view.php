<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\Assignment */
/* @var $fullnameField string */
/* @var $roles Array */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = Yii::t('rbac-admin', '分配') . ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', '分配'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;

?>
<div class="assignment-index">

    <div class="row">
        <div class="col-lg-5">
          
              <?php $form = ActiveForm::begin(['id' => 'form-assign-role']); ?>
                 <?= $form->field($model, 'roleid')->dropDownList($roles) ?>
                <div class="form-group">
                    <?= Html::submitButton(Yii::t('rbac-admin', '保存'), ['class' => 'btn btn-primary', 'name' => 'change-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
