<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */

$this->title = '修改单网页: ' . $model->catname;
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->catname, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="category-update-page">

    <?= $this->render('_page_form', [
        'category' => $category,
        'page' => $page,
    ]) ?>

</div>
