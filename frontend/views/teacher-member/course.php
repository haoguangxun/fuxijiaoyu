<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = '教师中心-我的课程';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/personal.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/personal.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="personal-title">我的课程</div>
<div class="personal-form" style="height:600px;">

    <div class="order-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [

                [
                    'label' => '课程名称',
                    'format' => 'raw',
                    'value' => function($model){
                        $url = \yii\helpers\Url::to(['/course/view','id'=>$model->id]);
                        return Html::a($model->name, $url, ['target'=>'_blank']) ;
                    },
                ],
                [
                    'label' => '难度等级',
                    'value' => function($model){
                        return Yii::$app->params['difficulty_level'][$model->difficulty_level];
                    },
                ],
                /*
                [
                    'label' => '课程节数',
                    'value' => function($model){
                        return $model->course_number.'节';
                    },
                ],
                [
                    'label' => '每节时长',
                    'value' => function($model){
                        return $model->course_duration.'分钟';
                    },
                ],
                */
                'price',
                [
                    'label' => '状态',
                    'value' => function($model){
                        return $model->status==1 ? '正常' : '下线';
                    },
                ],
                'sales',
                [
                    'label' => '发布时间',
                    'attribute' => 'addtime',
                    'format'=>['date','php:Y-m-d H:i:s'],
                ],
                /*
                [
                    'label' => '更新时间',
                    'attribute' => 'updatetime',
                    'format'=>['date','php:Y-m-d H:i:s'],
                ],
                */

            ],
            'layout' => "{items}\n{pager}"
        ]); ?>
    </div>

</div>