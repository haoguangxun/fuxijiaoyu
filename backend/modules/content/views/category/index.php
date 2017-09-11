<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\modules\content\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\content\models\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '栏目管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加栏目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>排序</th>
            <th>栏目ID</th>
            <th>栏目名称</th>
            <th>类别</th>
            <th>是否显示</th>
            <th class="action-column">操作</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if($data){
            foreach ($data as $key => $val) {
                ?>
                <tr data-key="1">
                    <td><?=$val['sort']?></td>
                    <td><?=$val['id']?></td>
                    <td><?=$val['catname']?></td>
                    <td><?=Category::getModelType($val['type'],$val['modelid']);?></td>
                    <td><?=$val['ismenu']==1 ? '是' : '否';?></td>
                    <td>
                        <a href="/content/category/view?id=<?=$val['id']?>" title="View" aria-label="View" data-pjax="0"><span class="glyphicon glyphicon-eye-open"></span></a>
                        <a href="/content/category/update?id=<?=$val['id']?>" title="Update" aria-label="Update" data-pjax="0"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href="/content/category/delete?id=<?=$val['id']?>" title="Delete" aria-label="Delete" data-pjax="0" data-confirm="Are you sure you want to delete this item?" data-method="post"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
        </tbody>
    </table>

</div>
