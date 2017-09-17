<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = '添加文章';
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dataModel' => $dataModel,
    ]) ?>

</div>
