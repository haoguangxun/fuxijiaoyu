<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Course', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'catid',
            'name',
            'subtitle',
            'teacherid',
            // 'thumb',
            // 'keywords',
            // 'description',
            // 'price',
            // 'difficulty_level',
            // 'course_number',
            // 'course_duration',
            // 'posids',
            // 'url:url',
            // 'sort',
            // 'status',
            // 'islink',
            // 'author',
            // 'addtime',
            // 'updatetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
