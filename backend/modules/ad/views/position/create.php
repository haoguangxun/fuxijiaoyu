<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\ad\models\AdPosition */

$this->title = '添加广告位';
$this->params['breadcrumbs'][] = ['label' => '广告位管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
