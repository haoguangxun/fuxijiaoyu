<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CourseSection */

$this->title = '添加课程小节';
$this->params['breadcrumbs'][] = ['label' => '课程小节管理'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-section-create">

    <?= $this->render('_form', [
        'model' => $model,
        'courseid' => $courseid,
    ]) ?>

</div>
