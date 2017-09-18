<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加课程', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute' => 'sort',
                'contentOptions'=>[
                    'width'=>'5%',
                ],
            ],
            [
                'attribute' => 'id',
                'contentOptions'=>[
                    'width'=>'5%',
                ],
            ],
            [
                'attribute' => 'name',
                'contentOptions'=>[
                    'width'=>'30%',
                ],
            ],
            [
                'label' => '栏目',
                'value' => 'category.catname',
            ],
            [
                'label' => '主讲老师',
                'value' => 'teacher.name',
            ],
            'author',
            [
                'label' => '点击量',
                'value' => 'data.click',
            ],
            [
                'attribute' => 'addtime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'header'=>'操作',
            ],
        ],
    ]); ?>
</div>
