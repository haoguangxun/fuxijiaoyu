<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Json;
use backend\modules\admin\AnimateAsset;
use yii\web\YiiAsset;

/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\AdminRole */

$context = $this->context;
$labels = $context->labels();
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', $labels['Items']), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


/* print_r($model->getItems());
exit; */

AnimateAsset::register($this);
YiiAsset::register($this);
$opts = Json::htmlEncode([
    'items' => $model->getItems()
]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
$animateIcon = ' <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i>';
?>
<div class="admin-role-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('rbac-admin', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('rbac-admin', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
    <div class="col-sm-11">
    <?php $status = ['1'=>'正常','0'=>'停用']; ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'order',
            [
            'attribute'=>'status',
            'value' => $status[$model->status]
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>
        </div>
    </div>
    
        <div class="row">
        <div class="col-sm-5">
            <input class="form-control search" data-target="avaliable"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for avaliable') ?>">
            <select multiple size="20" class="form-control list" data-target="avaliable"></select>
        </div>
        <div class="col-sm-1">
            <br><br>
            <?= Html::a('&gt;&gt;' . $animateIcon, ['assign', 'id' => $model->id], [
                'class' => 'btn btn-success btn-assign',
                'data-target' => 'avaliable',
                'title' => Yii::t('rbac-admin', 'Assign')
            ]) ?><br><br>
            <?= Html::a('&lt;&lt;' . $animateIcon, ['remove', 'id' => $model->id], [
                'class' => 'btn btn-danger btn-assign',
                'data-target' => 'assigned',
                'title' => Yii::t('rbac-admin', 'Remove')
            ]) ?>
        </div>
        <div class="col-sm-5">
            <input class="form-control search" data-target="assigned"
                   placeholder="<?= Yii::t('rbac-admin', 'Search for assigned') ?>">
            <select multiple size="20" class="form-control list" data-target="assigned"></select>
        </div>
    </div>
    
    
</div>
