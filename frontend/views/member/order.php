<?php
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = '学员中心-我的订单';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/personal.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/personal.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="personal-title">我的订单</div>
<div class="personal-form" style="height:600px;">


    <div class="order-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [

                'orderid',
                [
                    'label' => '课程名称',
                    'format' => 'raw',
                    'value' => function($model){
                        $url = \yii\helpers\Url::to(['/course/view','id'=>$model->courseid]);
                        return Html::a($model->course['name'], $url, ['target'=>'_blank']) ;
                    },
                ],
                'amount',
                [
                    'attribute' => 'addtime',
                    'format'=>['date','php:Y-m-d H:i:s'],
                ],
                'note',
                [
                    'attribute' => 'status',
                    'format' => 'raw',
                    'value' => function($model){
                        $url = \yii\helpers\Url::to(['order/post','id'=>$model->courseid]);
                        return $model->status==1 ? '已支付' : '未支付<br>'. Html::a('去支付 ', $url) ;
                    },
                ],
            ],
            'layout' => "{items}\n{pager}"
        ]); ?>
    </div>

</div>