<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CourseSection */

$this->title = 'Update Course Section: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Course Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="course-section-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
