<?php
use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\admin\components\Helper;
use yii\helpers\Url;
//use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\admin\models\search\User */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $roles Yii::$app->authManager */


$this->title = Yii::t('rbac-admin', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

   <!-- <h1><?= Html::encode($this->title) ?></h1> --> 
  
    <p>
        <?= Html::a('添加用户', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'columns' => [
            'id', //ID
            'username',
            [
                /*'attribute' => 'created_at',
                'value' => 'created_at',
                'format' => ['date', 'php:Y-m-d'],
                'filter' => DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'created_at',
                    'name' => 'created_at',
                    'readonly' => true,
                    'options' => ['placeholder' => '所选日期前后7天记录'],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]),*/
            ],
            [
                'attribute' => 'status',
                'label' => '状态',
                'filter' => ['10'=>'正常','0'=>'停用'],
                'value' => function ($model) {
                    return ($model->status == 10) ? '正常' : '停用';
                },
            ],
            [
                'attribute' => 'role_name',
                'label' => '所属角色',
                'filter' => $roles,
                'value' => function ($model) {
                    return $model->getRoleText($model->roleid); 
                },
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{change-password} {status} {assign-role}',
                'header'=>'操作',
                'buttons' => [
                    'status' => function ($url, $model, $key) {
                        if ($model->id == 1 || Yii::$app->user->id == $model->id) {
                            return '';
                        }
                        $options = [
                            'title' => '停用',
                            'aria-label' => Yii::t('yii', 'Status'),
                            'data-confirm' => '确定要停用'.$model->username.'用户?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        if ($model->status == 10) {
                            $op = 0;
                            $opButton = 'glyphicon-off';
                        } else {
                            $op = 10;
                            $opButton = 'glyphicon-play-circle';
                        }
                        
                        $url = Url::to(['/admin/user/status','id'=>$model->id,'op'=>$op]);
                        return Html::a('<span class="glyphicon '.$opButton.'"></span>', $url, $options);
                    },
                    'change-password' => function($url, $model) {
                        $options = [
                            'title' => '修改密码',
                            'aria-label' => '修改密码',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-edit" title="修改密码"></span>', $url, $options);
                    },
                    'assign-role' => function($url, $model, $key) {
                        if ($model->id == 1 || Yii::$app->user->id == $model->id) {
                            return '';
                        }
                        $options = [
                            'id' => 'assign-role',
                            'data-toggle' => 'modal',
                            'data-target' => '#assign-role-modal',
                            'data-id' => $key,
                            'class' => 'data-assign-role',
                            'title' => '分配权限',
                            'aria-label' => '分配权限',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', '#', $options);
                    }
                ]
            ],
        ],
    ]);
    ?>
</div>
	
<?php 
use yii\bootstrap\Modal;
Modal::begin([
    'id' => 'assign-role-modal',
    'header' => '<h4 class="modal-title">修改权限组</h4>',
    'footer' => '
    <a href="#" class="btn btn-default" data-dismiss="modal">取消</a>
    <a href="#" class="btn btn-primary">保存</a>
    ',
]);
$requestCreateUrl = yii\helpers\Url::toRoute('assign-role');
$js = <<<JS
    $('.data-assign-role').on('click', function () {
        $.get('{$requestCreateUrl}', { id: $(this).closest('tr').data('key') },
            function (data) {
                $('.modal-body').html(data);
            }  
        );
    });
    $('.btn-primary').click(function(){ 
            $("#form-assign-role").submit();
    });
JS;
$this->registerJs($js);
Modal::end();

?>
