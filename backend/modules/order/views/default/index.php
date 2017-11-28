<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\order\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '购买课程管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [

            'orderid',
            [
                'label' => '课程名称',
                'value' => 'course.name',
            ],
            'userid',
            [
                'label' => '学生姓名',
                'value' => 'member.realname',
            ],
            'amount',
            [
                'attribute' => 'addtime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            [
                'attribute' => 'status',
                'value' => function($model){
                    return $model->status==1 ? '已支付' : '未支付';
                },
            ],
            [
                'attribute' => 'paytime',
                'value' => function($model){
                    return $model->paytime ? date('Y-m-d H:i:s',$model->paytime) : '-';
                },
            ],
            [
                'attribute' => 'pay_number',
                'value' => function($model){
                    return $model->pay_number ? $model->pay_number : '-';
                },
            ],
            [
                'attribute' => 'pay_type',
                'value' => function($model){
                    return $model->pay_type ? $model->pay_type==1 ? '支付宝' : '微信' : '-';
                },
            ],
            'note',

        ],
    ]); ?>
</div>
