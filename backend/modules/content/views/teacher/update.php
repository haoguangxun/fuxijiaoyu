<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Teacher */

$this->title = '编辑教师: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '教师管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="teacher-update">

    <?= $this->render('_form', [
        'model' => $model,
        'dataModel' => $dataModel,
    ]) ?>

</div>
