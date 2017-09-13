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
        //'filterModel' => $searchModel,
        'columns' => [

            'sort',
            'modelid',
            'name',
            'description',
            'tablename',
            //'setting:ntext',
            [
                'attribute' => 'addtime',
                'value' => function ($model){
                    return date('Y-m-d H:i:s',$model->addtime);
                },
            ],
            // 'disabled',
            // 'category_template',
            // 'list_template',
            // 'show_template',
            // 'js_template',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update}{delete}',
                'header'=>'操作',
            ],
        ],
    ]); ?>
</div>
