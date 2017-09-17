<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Models */

$this->title = '编辑模型: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '模型管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="models-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
