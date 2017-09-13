<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'catid',
            'title',
            // 'subtitle',
            // 'thumb',
            // 'video',
            // 'keywords',
            // 'description',
            // 'posids',
            // 'url:url',
            'sort',
            // 'status',
            // 'islink',
            'author',
            'addtime',
            // 'updatetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
