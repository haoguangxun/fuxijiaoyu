<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\member\models\search\MemberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '会员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Member', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'userid',
            'username',
            'auth_key',
            'password',
            'password_reset_token',
            // 'email_validate_token:email',
            // 'nickname',
            // 'photo',
            // 'phone',
            // 'email:email',
            // 'type',
            // 'amount',
            // 'point',
            // 'regtime',
            // 'lasttime',
            // 'regip',
            // 'lastip',
            // 'loginnum',
            // 'islock',
            // 'vip',
            // 'overduedate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
