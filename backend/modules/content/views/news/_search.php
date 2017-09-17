<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Category;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\modules\content\models\search\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'fieldConfig' => [
            'labelOptions' => ['style' => 'display:none;'],
        ]
    ]); ?>

    <div class="col-lg-12">
        <div class="col-lg-2">
            <?= $form->field($model, 'catid')->label('所属栏目')->dropdownList(
                Category::getSelectList(),
                [
                    'prompt'=>'所属栏目',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?= $form->field($model, 'keyword_type')->label('搜索条件')->dropdownList(
                [
                    'id' => 'ID',
                    'title' => '标题',
                    'author' => '作者',
                ],
                [
                    'prompt'=>'搜索条件',
                ]
            ) ?>
        </div>

        <div class="col-lg-2">
            <?php echo $form->field($model, 'keyword')->label('输入关键字') ?>
        </div>

        <div class="col-lg-2">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'bgDate',
                'language' => 'zh-CN',
                //'size' => 'sm',
                'options' => ['style'=>'width:200px;','class'=>'bgDate'],
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>

        <div class="col-lg-2">
            <?= DatePicker::widget([
                'model' => $model,
                'attribute' => 'edDate',
                'language' => 'zh-CN',
                //'size' => 'sm',
                'options' => ['style'=>'width:200px;','class'=>'edDate'],
                'template' => '{addon}{input}',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);?>
        </div>
        <div class="form-group col-lg-2">
            <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>


    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
    //日期插件
    $('.bgDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on("changeDate",function(){
        $(".edDate").datepicker("setStartDate", $(".bgDate").val());
    });
    $('.edDate').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
    }).on("changeDate",function(){
        $(".bgDate").datepicker("setEndDate", $(".edDate").val());
    });
JS;
$this->registerJs($js);
?>