<?php

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\member\models\search\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $searchModel->type==1 ? '学员管理' : '教师管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            //'username',
            'phone',
            //'nickname',
            'realname',
            [
                'attribute' => 'sex',
                'value' => function($model){
                    return $model->sex==1 ? '男' : '女';
                },
            ],
            // 'email:email',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return $model->type==1 ? '学生' : '教师';
                },
            ],
            // 'amount',
            // 'point',
            [
                'attribute' => 'created_at',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'login_at',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            // 'regip',
            // 'lastip',
            'loginnum',
            [
                'attribute' => 'islock',
                'value' => function($model){
                    return $model->islock==1 ? '是' : '否';
                },
            ],
            // 'vip',
            // 'overduedate',

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template' => '{view}',
            ],
        ],
    ]); ?>
</div>
