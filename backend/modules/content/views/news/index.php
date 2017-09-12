<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'catid',
            'title',
            'subtitle',
            'thumb',
            // 'video',
            // 'keywords',
            // 'description',
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
