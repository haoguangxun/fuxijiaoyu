<?php
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$context = $this->context;
$labels = $context->labels();
$this->title = '角色';//Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-role-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('rbac-admin', '添加角色'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description:ntext',
            [
                'attribute' => 'status',
                'label' => '状态',
                'filter' => ['1'=>'正常','0'=>'停用'],
                'value' => function ($model) {
                    return ($model->status == 1) ? '正常' : '停用';
                },
            ],
            [
                'attribute' => 'op_admin',
                'label' => '操作人',
                'value' => function ($model) {
                    return $model->user['username'];
                },
            ],
            [
                'attribute' => 'updated_at',
                'filter' => false,
                'value' => function ($model) {
                    return date('Y-m-d H:i:s',$model->updated_at);
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'delete' => function ($url, $model, $key) {
                        if ($model->id == 1 || Yii::$app->user->id == $model->id) {
                            return '';
                        }
                        $options = [
                            'title' => '删除',
                            'aria-label' => Yii::t('yii', 'Status'),
                            'data-confirm' => '确定要删除 '.$model->name.' 角色?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        
                        return Html::a(Html::tag('span', '', ['class' => "glyphicon glyphicon-trash"]), $url, $options);
                    },
                  
                ]
            ],
        ],
    ]); ?>
</div>
