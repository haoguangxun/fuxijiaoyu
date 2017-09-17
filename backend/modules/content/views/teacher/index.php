<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\TeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '教师管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加教师', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'name',
                'contentOptions'=>[
                    'width'=>'40%',
                ],
            ],
            [
                'label' => '栏目',
                'value' => 'category.catname',
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
