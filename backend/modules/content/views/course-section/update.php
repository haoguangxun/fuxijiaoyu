<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseSection */

$this->title = '编辑课程小节: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '课程小节管理'];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = '编辑';
?>
<div class="course-section-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
