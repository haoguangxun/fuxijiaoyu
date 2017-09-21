<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CourseSectionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程小节管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-section-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加课程小节', ['create','courseid'=>$searchModel->attributes['courseid']], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'id',
            'name',
            [
                'label' => '试听',
                'value' => function($model){
                    return $model->audition==1 ? '可试听' : '-';
                },
            ],
            [
                'label' => '状态',
                'value' => function($model){
                    return $model->status==1 ? '正常' : '下线';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template' => '{update}{delete}',
            ],
        ],
    ]); ?>
</div>
