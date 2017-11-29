<?php
/* @var $this yii\web\View */
/* @var $model backend\modules\admin\models\UserForm */
/* @var $roles yii\rbac\Role[] */
$this->title = '添加账号';
$this->params['breadcrumbs'][] = ['label' => Yii::t('rbac-admin', 'User'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'roles' => $roles
    ]) ?>

</div>
