<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = '学员中心-我的收藏';
$this->registerMetaTag(array("name"=>"keywords","content"=>Html::encode(Yii::$app->params['keywords'])));
$this->registerMetaTag(array("name"=>"description","content"=>Html::encode(Yii::$app->params['description'])));
$this->registerCssFile('@web/css/personal.css',['depends'=>['frontend\assets\AppAsset']]);
$this->registerJsFile('@web/js/personal.js',['depends'=>['frontend\assets\AppAsset'],'position' => $this::POS_HEAD]);
?>
<!--内容-->
<div class="personal-title">我的收藏</div>
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
                        $url = \yii\helpers\Url::to(['/course/view','id'=>$model->courseid]);
                        return Html::a($model->course['name'], $url, ['target'=>'_blank']) ;
                    },
                ],
                [
                    'label' => '主讲老师',
                    'value' => function($model){
                        $teacher = \frontend\models\Member::find()->select('realname')->where(['id'=>$model->course['teacherid']])->column();
                        return $teacher[0] ? $teacher[0] : '';
                    },
                ],
                [
                    'label' => '难度等级',
                    'value' => function($model){
                        return Yii::$app->params['difficulty_level'][$model->course['difficulty_level']];
                    },
                ],
                [
                    'label' => '课程节数',
                    'value' => function($model){
                        return $model->course['course_number'].'节';
                    },
                ],
                [
                    'label' => '每节时长',
                    'value' => function($model){
                        return $model->course['course_duration'].'分钟';
                    },
                ],

            ],
            'layout' => "{items}\n{pager}"
        ]); ?>
    </div>

</div>