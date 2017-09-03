<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '栏目管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加栏目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'sort',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->sort;
                },
            ],
            'id',
            [
                'attribute' => 'catname',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->catname;
                },
            ],
            [
                'attribute' => 'type',
                'format' => 'raw',
                'value' => function ($model) {
                    return $model->modelType;
                },
            ],
            [
                'attribute' => 'ismenu',
                'value' => function ($model){
                    return $model->ismenu == 1 ? '是' : '否';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
