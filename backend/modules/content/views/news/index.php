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

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
                'attribute' => 'title',
                'contentOptions'=>[
                    'width'=>'40%',
                ],
            ],
            [
                'label' => '栏目',
                'value' => 'category.catname',
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
