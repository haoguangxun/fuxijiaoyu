<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Models */

$this->title = '创建模型';
$this->params['breadcrumbs'][] = ['label' => '模型管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
