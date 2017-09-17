<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Teacher */

$this->title = '添加教师';
$this->params['breadcrumbs'][] = ['label' => '教师管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-create">

    <?= $this->render('_form', [
        'model' => $model,
        'dataModel' => $dataModel,
    ]) ?>

</div>
