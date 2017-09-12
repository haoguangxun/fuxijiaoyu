<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\CourseSection */

$this->title = 'Create Course Section';
$this->params['breadcrumbs'][] = ['label' => 'Course Sections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
