<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\Member */

$this->title = '会员详情';
$this->params['breadcrumbs'][] = ['label' => '会员管理'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <h1><?= Html::encode($model->realname) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
                'attribute' => 'photo',
                'format' => 'raw',
                'value' => function($model){
                    return "<img src=".$model->photo." width=300>";
                },
            ],
            'userid',
            [
                'attribute' => 'type',
                'value' => function($model){
                    return $model->type==1 ? '学生' : '教师';
                },
            ],
            'username',
            //'nickname',
            'realname',
            [
                'attribute' => 'sex',
                'value' => function($model){
                    return $model->sex==1 ? '男' : '女';
                },
            ],
            'phone',
            'email:email',
            'amount',
            'point',
            [
                'attribute' => 'regtime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'lasttime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            'regip',
            'lastip',
            'loginnum',
            [
                'attribute' => 'islock',
                'value' => function($model){
                    return $model->islock==1 ? '是' : '否';
                },
            ],
            //'vip',
            //'overduedate',
        ],
    ]) ?>

</div>
