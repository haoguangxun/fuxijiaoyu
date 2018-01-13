<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\ad\models\search\AdPositionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '广告位管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-position-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//= Html::a('添加广告位', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'id',
            'name',
            [
                'label' => '类型',
                'value' => function($model){
                    return $model::$type[$model->type];
                },
            ],
            //'width',
            //'height',
            [
                'label' => '状态',
                'value' => function($model){
                    return $model->disabled==1 ? '禁用' : '启用';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template' => '{ad}{update}{delete}',
                'buttons' => [
                    'ad' => function($url, $model) {
                        $options = [
                            'title' => '管理广告',
                        ];
                        $url = \yii\helpers\Url::to(['/ad/ad/index','AdSearch[pid]'=>$model->id]);
                        return Html::a('管理广告 ', $url, $options);
                    },

                ],
            ],
        ],
    ]); ?>
</div>
