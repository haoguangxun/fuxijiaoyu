<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\enroll\models\search\EnrollSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '报名管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enroll-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'name',
            'contact',
            [
                'attribute' => 'learn',
                'value' => function($model){
                    return $model->learn==1 ? '学过' : '没学过';
                },
            ],
            [
                'attribute' => 'learning_level',
                'value' => function($model){
                    if($model->learning_level == 1){
                        $msg = '没有接触过';
                    }elseif($model->learning_level == 2){
                        $msg = '一般';
                    }elseif($model->learning_level == 3){
                        $msg = '想系统学习';
                    }
                    return $msg;
                },
            ],
            'expect_teacher',
            [
                'attribute' => 'addtime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            // 'admin_id',
            // 'note',
            // 'status',

        ],
    ]); ?>
</div>
