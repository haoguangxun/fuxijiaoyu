<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\ad\models\Ad */

$this->title = '编辑广告: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '广告管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $model->title;
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="ad-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
