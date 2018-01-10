<?php
use yii\helpers\Html;
use yii\grid\GridView;


$this->title = '教师中心-我的学生';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/personal.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/personal.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="personal-title">我的学生</div>
<div class="personal-form" style="height:600px;">


    <div class="order-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
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
                    'label' => '学生姓名',
                    'format' => 'raw',
                    'value' => function($model){
                        //var_dump($model);
                        $member = \frontend\models\Member::find()->select('realname')->where(['id'=>$model->userid])->column();
                        return $member[0] ? $member[0] : '';
                    },
                ],
                [
                    'label' => '报名时间',
                    'attribute' => 'addtime',
                    'format'=>['date','php:Y-m-d H:i:s'],
                ],
            ],
            'layout' => "{items}\n{pager}"
        ]); ?>
    </div>

</div>