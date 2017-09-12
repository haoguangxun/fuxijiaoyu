<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CourseSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Sections';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-section-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course Section', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'courseid',
            'name',
            'subtitle',
            'video',
            // 'url:url',
            // 'template',
            // 'audition',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
