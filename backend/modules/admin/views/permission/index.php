<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\PermissionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$context = $this->context;
$labels = $context->labels();
$this->title = '权限';//Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = [];
?>
<div class="role-index">
    <p>
        <?= Html::a(Yii::t('rbac-admin', '添加权限'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'label' => Yii::t('rbac-admin', 'Name'),
            ],
            'created_at:datetime',
            'updated_at:datetime',
            'status',
            ['class' => 'yii\grid\ActionColumn',],
        ],
    ])
    ?>

</div>
