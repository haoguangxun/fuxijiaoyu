<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\Category */

$this->title = '添加单网页';
$this->params['breadcrumbs'][] = ['label' => '栏目管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create-page">

    <?= $this->render('_page_form', [
        'category' => $category,
        'page' => $page,
    ]) ?>

</div>
