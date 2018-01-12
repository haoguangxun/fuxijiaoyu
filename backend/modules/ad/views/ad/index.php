<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ad\models\search\AdSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告管理：'.$position->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-index">

    <p>
        <?= Html::a('添加广告', ['create','pid'=>$searchModel->attributes['pid']], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'sort',
            'id',
            'title',
            [
                'label' => '图片',
                'format' => 'raw',
                'value' => function ($model) {
                    return "<img src='".$model->fileurl."' height=100>";
                },
            ],
            'content',
            [
                'attribute' => 'addtime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            [
                'label' => '状态',
                'value' => function($model){
                    return $model->display==1 ? '显示' : '隐藏';
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
