<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ad\models\AdPosition */

$this->title = '修改广告位: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '广告位管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->name;
?>
<div class="ad-position-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
