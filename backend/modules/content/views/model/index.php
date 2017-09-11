<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\ModelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Models';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Model', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'modelid',
            'name',
            'description',
            'tablename',
            'setting:ntext',
            // 'addtime',
            // 'disabled',
            // 'category_template',
            // 'list_template',
            // 'show_template',
            // 'js_template',
            // 'sort',
            // 'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
