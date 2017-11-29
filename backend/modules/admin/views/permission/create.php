<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AdminPermission */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', '添加权限');
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-create">

    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

