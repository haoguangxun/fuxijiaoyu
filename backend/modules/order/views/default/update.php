<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\order\models\Order */

$this->title = '编辑订单: ' . $model->orderid;
$this->params['breadcrumbs'][] = ['label' => '购买课程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = '编辑订单';
?>
<div class="order-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
