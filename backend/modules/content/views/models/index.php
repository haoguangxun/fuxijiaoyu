<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\ModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '模型管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index">

    <p>
        <?= Html::a('创建模型', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'sort',
            'modelid',
            'name',
            'description',
            'tablename',
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
