<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */

$this->title = '修改单网页: ' . $category->catname;
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $category->catname, 'url' => ['view', 'id' => $category->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="category-update-page">

    <?= $this->render('_page_form', [
        'category' => $category,
        'page' => $page,
    ]) ?>

</div>
