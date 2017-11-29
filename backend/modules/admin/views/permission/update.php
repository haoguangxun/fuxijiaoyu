<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AdminPermission */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', '修改权限') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('rbac-admin', 'Update');
?>
<div class="menu-update">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>
