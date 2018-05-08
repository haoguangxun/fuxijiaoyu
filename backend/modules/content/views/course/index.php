<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CourseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-index">

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加课程', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            [
                'attribute' => 'sort',
                'contentOptions'=>[
                    'width'=>'5%',
                ],
            ],
            [
                'attribute' => 'id',
                'contentOptions'=>[
                    'width'=>'5%',
                ],
            ],
            [
                'attribute' => 'name',
                'contentOptions'=>[
                    'width'=>'30%',
                ],
                'value' => function($model){
                    return "<span title='$model->name'>".mb_substr($model->name,0,20,'utf-8')."</span>";
                },
                'format' => 'raw'
            ],
            [
                'label' => '栏目',
                'value' => 'category.catname',
            ],
            [
                'label' => '主讲老师',
                'value' => 'teacher.realname',
            ],
            [
                'label' => '授课老师',
                'value' => 'teachers',
            ],
            'author',
            'price',
            [
                'label' => '状态',
                'value' => function($model){
                    return $model->status==1 ? '正常' : '下线';
                },
            ],
            [
                'attribute' => 'addtime',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'header'=>'操作',
                'template' => '{section}{update}{delete}',
                'buttons' => [
                    'section' => function($url, $model) {
                        $options = [
                            'title' => '管理课程小节',
                        ];
                        $url = \yii\helpers\Url::to(['/content/course-section/index','CourseSectionSearch[courseid]'=>$model->id]);
                        return Html::a('课程小节 ', $url, $options);
                    },

                ],
            ],
        ],
    ]); ?>
</div>
